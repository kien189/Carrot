@extends('Fe.layout.master')
@section('main_fe')
    <base href="/">
    <!-- Breadcrumb -->
    <section class="section-breadcrumb">
        <div class="cr-breadcrumb-image">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="cr-breadcrumb-title">
                            <h2>Cart</h2>
                            <span> <a href="index.html">Home</a> / Cart</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Cart -->
    <section class="section-cart padding-t-100">
        <div class="container">
            <div class="row d-none">
                <div class="col-lg-12">
                    <div class="mb-30" data-aos="fade-up" data-aos-duration="2000" data-aos-delay="400">
                        <div class="cr-banner">
                            <h2>Cart</h2>
                        </div>
                        <div class="cr-banner-sub-title">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                                ut labore lacus vel facilisis. </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="cr-cart-content" data-aos="fade-up" data-aos-duration="2000" data-aos-delay="400">
                        <div class="row">
                            <div class="cr-table-content">
                                <table>
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th>Product</th>
                                            <th>price</th>
                                            <th>size</th>
                                            <th class="text-center">Quantity</th>
                                            <th>Total</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($carts as $value)
                                            <tr class="cr_cart" data-cart-id="{{ $value->id }}">
                                                <td><input type="checkbox"></td>
                                                <td class="cr-cart-name">
                                                    <a href="javascript:void(0)">
                                                        <img src="{{ asset('storage/images/' . $value->products->image) }}"
                                                            alt="product-1" class="cr-cart-img">
                                                        {{ $value->products->name }}
                                                    </a>
                                                </td>
                                                <td class="cr-cart-price">
                                                    <span class="amount"
                                                        id="price">{{ number_format($value->variants->sale_price, 0, ',', '.') }}đ</span>
                                                </td>
                                                <td>{{ $value->variants->size }}</td>
                                                <td class="cr-cart-qty">
                                                    <div class="cart-qty-plus-minus">
                                                        <button type="button" class="btnPlus plus">+</button>
                                                        <input type="text" placeholder="." id="quantityDisplay"
                                                            value="{{ $value->quantity }}" minlength="1" maxlength="20"
                                                            class="quantity">
                                                        <button type="button" class="btnMinus minus">-</button>
                                                    </div>
                                                </td>
                                                <td class="cr-cart-">
                                                    <span
                                                        id="toTal">{{ number_format($value->variants->sale_price * $value->quantity, 0, ',', '.') }}đ</span>
                                                </td>
                                                <td class="cr-cart-remove">
                                                    <a href="{{ route('deleteCart', $value->id) }}" type="submit"
                                                        onclick="return confirm('Bạn có muốn xóa sản phẩm này khỏi giỏ hàng không ?')"
                                                        class="remove btnDelete border-0"><i
                                                            class="ri-delete-bin-line"></i></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>

                                </table>
                            </div>
                            <div class="row pt-3 pb-3">
                                <div class="col-lg-6">
                                    <div class="discount-info">
                                        <form action="{{ route('checkCoupon') }}" method="post" class="pt-3 pb-3">
                                            @csrf
                                            <h4>Apply Discount Code</h4>
                                            <div class="d-flex align-items-center">
                                                <input type="text" class="form control" name="couponInput"
                                                    placeholder="Mã khuyễn mãi "
                                                    style="border:1px solid #e9e9e9;outline:none;padding:7px ;">
                                                <button type="submit" id="applyDiscountButton" style="margin-left: -11px"
                                                    class="cr-button">Apply</button>
                                            </div>
                                        </form>
                                        @if ($errors->has('coupon'))
                                            <div class="text-danger">{{ $errors->first('coupon') }}</div>
                                        @endif
                                        @if (session('success'))
                                            <p class="text-success">{{ session('success') }}</p>
                                        @endif
                                        @isset($value)
                                            @isset($value)
                                                <div>
                                                    <span class="text-left">Tổng phụ :</span>
                                                    <span class="text-right subTotal">
                                                        {{ number_format($value->totalPrice, 0, ',', '.') }}đ</span>
                                                </div>
                                                @if (Session::has('coupons'))
                                                    @foreach (Session::get('coupons') as $coupon)
                                                        @if ($coupon->coupon_condition == 1)
                                                            <div>
                                                                <span class="text-left">Giảm giá :</span>
                                                                <span
                                                                    class="text-right">-{{ number_format($value->totalPrice * ($coupon->coupon_number / 100)) }}đ</span>
                                                            </div>
                                                        @elseif ($coupon->coupon_condition == 2)
                                                            <div>
                                                                <span class="text-left">Giảm giá :</span>
                                                                <span
                                                                    class="text-right">-{{ number_format($coupon->coupon_number) }}đ</span>
                                                            </div>
                                                        @endif
                                                    @endforeach
                                                @else
                                                    <div>
                                                        <span class="text-left">Giảm giá :</span>
                                                        <span class="text-right">-0đ</span>
                                                    </div>
                                                @endif
                                                <div class="cr-checkout-summary-total">
                                                    <span class="text-left fw-bold">Tổng tiền :</span>
                                                    @if (Session::has('coupons'))
                                                        @php
                                                            $finalPrice = $value->totalPrice;
                                                            foreach (Session::get('coupons') as $coupon) {
                                                                if ($coupon->coupon_condition == 1) {
                                                                    $finalPrice -=
                                                                        $finalPrice * ($coupon->coupon_number / 100);
                                                                } elseif ($coupon->coupon_condition == 2) {
                                                                    $finalPrice -= $coupon->coupon_number;
                                                                }
                                                            }
                                                        @endphp

                                                        <span class="text-right fw-bold text-danger subTotal ">
                                                            {{ number_format($finalPrice, 0, ',', '.') }}đ</span>
                                                    @else
                                                        <span
                                                            class="text-right fw-bold text-danger subTotal ">{{ number_format($value->totalPrice, 0, ',', '.') }}đ</span>
                                                    @endif
                                                </div>
                                            @endisset
                                        @endisset
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="cr-cart-update-bottom">
                                        <a href="javascript:void(0)" class="cr-links" id="continueShoppingLink"></a>
                                        <a href="{{ route('checkout') }}" class="cr-button float-start">Check Out</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Popular products -->
    <section class="section-popular-products padding-tb-100" data-aos="fade-up" data-aos-duration="2000"
        data-aos-delay="400">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="mb-30">
                        <div class="cr-banner">
                            <h2>Popular Products</h2>
                        </div>
                        <div class="cr-banner-sub-title">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                                ut labore et viverra maecenas accumsan lacus vel facilisis. </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="cr-popular-product">
                        @foreach ($products as $value)
                            <div class="slick-slide">
                                <div class="cr-product-card">
                                    <div class="cr-product-image">
                                        <div class="cr-image-inner zoom-image-hover">
                                            <img src="{{ asset('storage/images/' . $value->image) }}" alt="product-1">
                                        </div>
                                        <div class="cr-side-view">
                                            <a href="{{ route('addFavorite',$value->id) }}" class="wishlist">
                                                <i class="ri-heart-line"></i>
                                            </a>
                                            <a class="model-oraganic-product" data-bs-toggle="modal"
                                                href="#quickview{{ $value->id }}" role="button">
                                                <i class="ri-eye-line"></i>
                                            </a>
                                        </div>
                                        <a class="cr-shopping-bag" href="javascript:void(0)">
                                            <i class="ri-shopping-bag-line"></i>
                                        </a>
                                    </div>
                                    <div class="cr-product-details">
                                        <div class="cr-brand">
                                            <a href="shop-left-sidebar.html">{{ $value->category->name }}</a>
                                            <div class="cr-star">
                                                @php
                                                    $rating = $value->averageRating();
                                                    $fullStars = floor($rating);
                                                    $halfStar = ceil($rating - $fullStars);
                                                    $emptyStars = 5 - $fullStars - $halfStar;
                                                @endphp
                                                @for ($i = 0; $i < $fullStars; $i++)
                                                    <i class="ri-star-fill" style="color:#f5885f"></i>
                                                @endfor
                                                @if ($halfStar)
                                                    <i class="ri-star-half-line"></i>
                                                @endif
                                                @for ($i = 0; $i < $emptyStars; $i++)
                                                    <i class="ri-star-line"></i>
                                                @endfor
                                                <p>({{ $rating }})</p>
                                            </div>
                                        </div>
                                        <a href="{{ route('detail', ['category' => $value->category->parent->slug, 'slug' => $value->slug]) }}"
                                            class="title">{{ $value->name }}</a>
                                        <p class="cr-price"><span
                                                class="new-price">{{ number_format($value->variants->first()->sale_price) }}đ</span>
                                            <span
                                                class="old-price">{{ number_format($value->variants->first()->price) }}đ</span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
{{-- @section('script')
    <script>
        document.getElementById('continueShoppingLink').addEventListener('click', function() {
            var discountSection = document.getElementById('discountSection');
            if (discountSection.style.display === 'none') {
                discountSection.style.display = 'block';
            } else {
                discountSection.style.display = 'none';
            }


        });
    </script>
@endsection --}}
