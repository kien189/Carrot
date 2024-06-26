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
                            <form action="#">
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
                                                    <td><input type="checkbox"></input></td>
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
                                                        <span id="toTal">
                                                            {{ number_format($value->variants->sale_price * $value->quantity, 0, ',', '.') }}đ</span>
                                                    </td>
                                                    <td class="cr-cart-remove">
                                                        <a href="javascript:void(0)">
                                                            <i class="ri-delete-bin-line"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="cr-cart-update-bottom">
                                            <a href="javascript:void(0)" class="cr-links" id="continueShoppingLink">Coupon
                                                code</a>
                                            <a href="cart.html" class="cr-button">Check Out</a>
                                        </div>
                                    </div>
                                </div>

                                <!-- Div chứa thông tin mã giảm giá, giá, giá giảm và tổng tiền -->
                                <div class="row" id="discountSection" style="display: none;">
                                    <div class="col-lg-12">
                                        <div class="discount-info">
                                            <h4>Apply Discount Code</h4>
                                            <input type="text" id="discountCode" placeholder="Enter discount code" class="mb-2">
                                            <button type="button" id="applyDiscountButton" class="cr-button">Apply</button>
                                            <p>Price: <span class="fw-bold text-danger subTotal">
                                                {{ number_format($value->TotalPrice, 0, ',', '.') }}</span>
                                            </p>
                                            <p>Discounted Price: <span id="discountedPrice">-900</span>đ</p>
                                            <p>Total Price: <span class=" subTotal">{{ number_format($value->TotalPrice, 0, ',', '.') }}</span>đ</p>
                                        </div>
                                    </div>
                                </div>
                            </form>
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
                        <div class="slick-slide">
                            <div class="cr-product-card">
                                <div class="cr-product-image">
                                    <div class="cr-image-inner zoom-image-hover">
                                        <img src="assets/img/product/9.jpg" alt="product-1">
                                    </div>
                                    <div class="cr-side-view">
                                        <a href="javascript:void(0)" class="wishlist">
                                            <i class="ri-heart-line"></i>
                                        </a>
                                        <a class="model-oraganic-product" data-bs-toggle="modal" href="#quickview"
                                            role="button">
                                            <i class="ri-eye-line"></i>
                                        </a>
                                    </div>
                                    <a class="cr-shopping-bag" href="javascript:void(0)">
                                        <i class="ri-shopping-bag-line"></i>
                                    </a>
                                </div>
                                <div class="cr-product-details">
                                    <div class="cr-brand">
                                        <a href="shop-left-sidebar.html">Snacks</a>
                                        <div class="cr-star">
                                            <i class="ri-star-fill"></i>
                                            <i class="ri-star-fill"></i>
                                            <i class="ri-star-fill"></i>
                                            <i class="ri-star-fill"></i>
                                            <i class="ri-star-line"></i>
                                            <p>(4.5)</p>
                                        </div>
                                    </div>
                                    <a href="product-left-sidebar.html" class="title">Best snakes with hazel nut
                                        mix pack 200gm</a>
                                    <p class="cr-price"><span class="new-price">$120.25</span> <span
                                            class="old-price">$123.25</span></p>
                                </div>
                            </div>
                        </div>
                        <div class="slick-slide">
                            <div class="cr-product-card">
                                <div class="cr-product-image">
                                    <div class="cr-image-inner zoom-image-hover">
                                        <img src="assets/img/product/10.jpg" alt="product-1">
                                    </div>
                                    <div class="cr-side-view">
                                        <a href="javascript:void(0)" class="wishlist">
                                            <i class="ri-heart-line"></i>
                                        </a>
                                        <a class="model-oraganic-product" data-bs-toggle="modal" href="#quickview"
                                            role="button">
                                            <i class="ri-eye-line"></i>
                                        </a>
                                    </div>
                                    <a class="cr-shopping-bag" href="javascript:void(0)">
                                        <i class="ri-shopping-bag-line"></i>
                                    </a>
                                </div>
                                <div class="cr-product-details">
                                    <div class="cr-brand">
                                        <a href="shop-left-sidebar.html">Snacks</a>
                                        <div class="cr-star">
                                            <i class="ri-star-fill"></i>
                                            <i class="ri-star-fill"></i>
                                            <i class="ri-star-fill"></i>
                                            <i class="ri-star-fill"></i>
                                            <i class="ri-star-fill"></i>
                                            <p>(5.0)</p>
                                        </div>
                                    </div>
                                    <a href="product-left-sidebar.html" class="title">Sweet snakes crunchy nut
                                        mix 250gm
                                        pack</a>
                                    <p class="cr-price"><span class="new-price">$100.00</span> <span
                                            class="old-price">$110.00</span></p>
                                </div>
                            </div>
                        </div>
                        <div class="slick-slide">
                            <div class="cr-product-card">
                                <div class="cr-product-image">
                                    <div class="cr-image-inner zoom-image-hover">
                                        <img src="assets/img/product/1.jpg" alt="product-1">
                                    </div>
                                    <div class="cr-side-view">
                                        <a href="javascript:void(0)" class="wishlist">
                                            <i class="ri-heart-line"></i>
                                        </a>
                                        <a class="model-oraganic-product" data-bs-toggle="modal" href="#quickview"
                                            role="button">
                                            <i class="ri-eye-line"></i>
                                        </a>
                                    </div>
                                    <a class="cr-shopping-bag" href="javascript:void(0)">
                                        <i class="ri-shopping-bag-line"></i>
                                    </a>
                                </div>
                                <div class="cr-product-details">
                                    <div class="cr-brand">
                                        <a href="shop-left-sidebar.html">Snacks</a>
                                        <div class="cr-star">
                                            <i class="ri-star-fill"></i>
                                            <i class="ri-star-fill"></i>
                                            <i class="ri-star-fill"></i>
                                            <i class="ri-star-fill"></i>
                                            <i class="ri-star-line"></i>
                                            <p>(4.5)</p>
                                        </div>
                                    </div>
                                    <a href="product-left-sidebar.html" class="title">Best snakes with hazel nut
                                        mix pack 200gm</a>
                                    <p class="cr-price"><span class="new-price">$120.25</span> <span
                                            class="old-price">$123.25</span></p>
                                </div>
                            </div>
                        </div>
                        <div class="slick-slide">
                            <div class="cr-product-card">
                                <div class="cr-product-image">
                                    <div class="cr-image-inner zoom-image-hover">
                                        <img src="assets/img/product/2.jpg" alt="product-1">
                                    </div>
                                    <div class="cr-side-view">
                                        <a href="javascript:void(0)" class="wishlist">
                                            <i class="ri-heart-line"></i>
                                        </a>
                                        <a class="model-oraganic-product" data-bs-toggle="modal" href="#quickview"
                                            role="button">
                                            <i class="ri-eye-line"></i>
                                        </a>
                                    </div>
                                    <a class="cr-shopping-bag" href="javascript:void(0)">
                                        <i class="ri-shopping-bag-line"></i>
                                    </a>
                                </div>
                                <div class="cr-product-details">
                                    <div class="cr-brand">
                                        <a href="shop-left-sidebar.html">Snacks</a>
                                        <div class="cr-star">
                                            <i class="ri-star-fill"></i>
                                            <i class="ri-star-fill"></i>
                                            <i class="ri-star-fill"></i>
                                            <i class="ri-star-fill"></i>
                                            <i class="ri-star-fill"></i>
                                            <p>(5.0)</p>
                                        </div>
                                    </div>
                                    <a href="product-left-sidebar.html" class="title">Sweet snakes crunchy nut
                                        mix 250gm
                                        pack</a>
                                    <p class="cr-price"><span class="new-price">$100.00</span> <span
                                            class="old-price">$110.00</span></p>
                                </div>
                            </div>
                        </div>
                        <div class="slick-slide">
                            <div class="cr-product-card">
                                <div class="cr-product-image">
                                    <div class="cr-image-inner zoom-image-hover">
                                        <img src="assets/img/product/3.jpg" alt="product-1">
                                    </div>
                                    <div class="cr-side-view">
                                        <a href="javascript:void(0)" class="wishlist">
                                            <i class="ri-heart-line"></i>
                                        </a>
                                        <a class="model-oraganic-product" data-bs-toggle="modal" href="#quickview"
                                            role="button">
                                            <i class="ri-eye-line"></i>
                                        </a>
                                    </div>
                                    <a class="cr-shopping-bag" href="javascript:void(0)">
                                        <i class="ri-shopping-bag-line"></i>
                                    </a>
                                </div>
                                <div class="cr-product-details">
                                    <div class="cr-brand">
                                        <a href="shop-left-sidebar.html">Snacks</a>
                                        <div class="cr-star">
                                            <i class="ri-star-fill"></i>
                                            <i class="ri-star-fill"></i>
                                            <i class="ri-star-fill"></i>
                                            <i class="ri-star-fill"></i>
                                            <i class="ri-star-fill"></i>
                                            <p>(5.0)</p>
                                        </div>
                                    </div>
                                    <a href="product-left-sidebar.html" class="title">Sweet snakes crunchy nut
                                        mix 250gm
                                        pack</a>
                                    <p class="cr-price"><span class="new-price">$100.00</span> <span
                                            class="old-price">$110.00</span></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('script')
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
@endsection
