@extends('Fe.layout.master')
@section('main_fe')
    <base href="/">
    <div class="cr-sidebar-overlay"></div>


    <!-- Breadcrumb -->
    <section class="section-breadcrumb">
        <div class="cr-breadcrumb-image">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="cr-breadcrumb-title">
                            <h2>Product</h2>
                            <span> <a href="index.html">Home</a> - product</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Product -->
    <section class="section-product padding-t-100">
        <div class="container">
            <form action="{{ route('addToCart', $product) }}" method="get">
                @csrf
                <div class="row mb-minus-24" data-aos="fade-up" data-aos-duration="2000" data-aos-delay="600">
                    <div class="col-xxl-4 col-xl-5 col-md-6 col-12 mb-24">
                        <div class="vehicle-detail-banner banner-content clearfix">
                            <div class="banner-slider">
                                <div class="slider slider-for">
                                    {{-- <div class="slider-banner-image">
                                    <div class="zoom-image-hover">
                                        <img src="{{ asset('storage/images/' . $product->image) }}" alt="product-tab-1"
                                            class="product-image">
                                    </div>
                                </div> --}}
                                    @foreach ($product->images as $item)
                                        <div class="slider-banner-image">
                                            <div class="zoom-image-hover">
                                                <img src="{{ asset('storage/images/' . $item->image) }}" alt="product-tab-2"
                                                    class="product-image">
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="slider slider-nav thumb-image">
                                    @foreach ($product->images as $value)
                                        <div class="thumbnail-image">
                                            <div class="thumbImg">
                                                <img src="{{ asset('storage/images/' . $value->image) }}"
                                                    alt="product-tab-1">
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-8 col-xl-7 col-md-6 col-12 mb-24">
                        <div class="cr-size-and-weight-contain">
                            <h2 class="heading">{{ $product->name }}</h2>
                            <p>{!! $product->sortdescription !!}</p>
                        </div>
                        <div class="cr-size-and-weight">
                            <div class="cr-review-star">
                                <div class="cr-star">
                                    @php
                                        $rating = $product->averageRating();
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
                                </div>
                                <p>( {{ $product->ratings->count() }})</p>
                            </div>
                            {{-- <div class="list">
                                <ul>
                                    <li><label>Brand <span>:</span></label>ESTA BETTERU CO</li>
                                    <li><label>Flavour <span>:</span></label>Super Saver Pack</li>
                                    <li><label>Diet Type <span>:</span></label>Vegetarian</li>
                                    <li><label>Weight <span>:</span></label>200 Grams</li>
                                    <li><label>Speciality <span>:</span></label>Gluten Free, Sugar Free</li>
                                    <li><label>Info <span>:</span></label>Egg Free, Allergen-Free</li>
                                    <li><label>Items <span>:</span></label>1</li>
                                </ul>
                            </div> --}}
                            <div class="cr-product-price">
                                <span class="new-price"
                                    id="sale-price">{{ number_format($product->variants->first()->sale_price, 0, ',', '.') }}đ</span>
                                <span class="old-price"
                                    id="product-price">{{ number_format($product->variants->first()->price, 0, ',', '.') }}đ</span>
                            </div>
                            <div class="cr-size-weight">
                                <h5><span>Size</span>/<span>Weight</span> :</h5>
                                <div class="cr-kg">
                                    <ul>
                                        @foreach ($product->variants as $key => $value)
                                            <li class="variant-size {{ $key == 0 ? 'active-color' : '' }}"
                                                data-variant-id="{{ $value->id }}" data-price="{{ $value->price }}"
                                                data-sale-price="{{ $value->sale_price }}"
                                                onclick="handleSizeSelection(this)">
                                                {{ $value->size }}
                                            </li>
                                        @endforeach
                                    </ul>
                                    <input type="hidden" id="selected-variant-id" name="variant_id"
                                        value="{{ $product->variants->first()->id }}">
                                </div>
                            </div>
                            <div class="cr-add-card">
                                <div class="cr-qty-main">
                                    <input type="text" name="quantity" placeholder="." value="1" minlength="1"
                                        maxlength="20" class="quantity">
                                    <button type="button" class="plus plussss">+</button>
                                    <button type="button" class="minus minusss">-</button>
                                </div>
                                <div class="cr-add-button">
                                    <button type="submit" class="cr-button cr-shopping-bag">Add to cart</button>
                                </div>
                                <div class="cr-card-icon">
                                    <a href="javascript:void(0)" class="wishlist">
                                        <i class="ri-heart-line"></i>
                                    </a>
                                    <a class="model-oraganic-product" data-bs-toggle="modal" href="#quickview"
                                        role="button">
                                        <i class="ri-eye-line"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
            </form>
        </div>
        <div class="row" data-aos="fade-up" data-aos-duration="2000" data-aos-delay="600">
            <div class="col-12">
                <div class="cr-paking-delivery">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="description-tab" data-bs-toggle="tab"
                                data-bs-target="#description" type="button" role="tab" aria-controls="description"
                                aria-selected="true">Description</button>
                        </li>
                        {{-- <li class="nav-item" role="presentation">
                            <button class="nav-link" id="additional-tab" data-bs-toggle="tab"
                                data-bs-target="#additional" type="button" role="tab" aria-controls="additional"
                                aria-selected="false">Information</button>
                        </li> --}}
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="review-tab" data-bs-toggle="tab" data-bs-target="#review"
                                type="button" role="tab" aria-controls="review"
                                aria-selected="false">Review</button>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="description" role="tabpanel"
                            aria-labelledby="description-tab">
                            <div class="cr-tab-content">
                                <div class="cr-description">
                                    <p>{!! $product->description !!}.</p>
                                </div>
                                {{-- <h4 class="heading">Packaging & Delivery</h4>
                                <div class="cr-description">
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Error in vero
                                        perferendis dolor! Quis vel consequuntur repellat distinctio rem. Corrupti
                                        ratione alias odio, error dolore temporibus consequatur, nobis veniam odit
                                        laborum dignissimos consectetur quae vero in perferendis provident quis.</p>
                                </div> --}}
                            </div>
                        </div>
                        {{-- <div class="tab-pane fade" id="additional" role="tabpanel" aria-labelledby="additional-tab">
                            <div class="cr-tab-content">
                                <div class="cr-description">
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Error in vero
                                        sapiente
                                        doloribus debitis corporis, eaque dicta, repellat amet, illum adipisci vel
                                        perferendis dolor! Quis vel consequuntur repellat distinctio rem. Corrupti
                                        ratione alias odio, error dolore temporibus consequatur, nobis veniam odit
                                        laborum dignissimos consectetur quae vero in perferendis provident quis.</p>
                                </div>
                                <div class="list">
                                    <ul>
                                        <li><label>Brand <span>:</span></label>ESTA BETTERU CO</li>
                                        <li><label>Flavour <span>:</span></label>Super Saver Pack</li>
                                        <li><label>Diet Type <span>:</span></label>Vegetarian</li>
                                        <li><label>Weight <span>:</span></label>200 Grams</li>
                                        <li><label>Speciality <span>:</span></label>Gluten Free, Sugar Free</li>
                                        <li><label>Info <span>:</span></label>Egg Free, Allergen-Free</li>
                                        <li><label>Items <span>:</span></label>1</li>
                                    </ul>
                                </div>
                            </div>
                        </div> --}}
                        <div class="tab-pane fade" id="review" role="tabpanel" aria-labelledby="review-tab">
                            <div class="cr-tab-content-from">
                                <div class="post" id="comments-container">
                                    @foreach ($comment as $item)
                                        <div class="content">
                                            <img src="assets/img/review/1.jpg" alt="review">
                                            <div class="details">
                                                <span class="date">{{ $item->created_at->format('d-m-Y') }}</span>
                                                <span class="name">{{ $item->customers->name }}</span>
                                            </div>
                                            <div class="cr-t-review-rating">
                                                @for ($i = 0; $i < $item->rating; $i++)
                                                    <i class="ri-star-s-fill"></i>
                                                @endfor
                                                @for ($i = $item->rating; $i < 5; $i++)
                                                    <i class="ri-star-s-line"></i>
                                                @endfor
                                            </div>
                                        </div>
                                        <p>{{ $item->content }}.</p>
                                    @endforeach
                                </div>
                                <h4 class="heading">Add a Review</h4>
                                <form id="rating-form" action="{{ route('comment', $product->id) }}" method="POST">
                                    @csrf
                                    <div class="cr-ratting-star">
                                        <span>Your rating :</span>
                                        <div class="cr-t-review-rating">
                                            <i class="ri-star ri-star-empty" data-index="1"></i>
                                            <i class="ri-star ri-star-empty" data-index="2"></i>
                                            <i class="ri-star ri-star-empty" data-index="3"></i>
                                            <i class="ri-star ri-star-empty" data-index="4"></i>
                                            <i class="ri-star ri-star-empty" data-index="5"></i>
                                        </div>
                                        <input type="hidden" name="rating" id="rating-input" value="0">
                                        <input type="hidden" name="product_id" id="product-id"
                                            value="{{ $product->id }}">
                                        <input type="hidden" name="customer_id" id="customer-id"
                                            value="{{ Auth::guard('customers')->id() }}">
                                        <input type="hidden" name="customer_id" id="customer-name"
                                            value="{{ Auth::guard('customers')->user()->name }}">
                                        <!-- Input ẩn để lưu trữ rating -->
                                    </div>
                                    <div class="cr-ratting-input form-submit">
                                        <textarea name="content" placeholder="Nhập bình luận của bạn" id="content" required=''></textarea>
                                        <button class="cr-button" type="submit" id="btnSubmit">Submit</button>
                                    </div>

                                </form>
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
                        @foreach ($getProduct as $value)
                            <div class="slick-slide">
                                <div class="cr-product-card">
                                    <div class="cr-product-image">
                                        <div class="cr-image-inner zoom-image-hover">
                                            <img src="{{ asset("storage/images/".$value->image) }}" alt="product-1">
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
                                            <a >{{ $value->category->name}}</a>
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
                                        <a href="{{ route('detail',['product'=>$value->category->parent->slug,'slug' => $value->slug]) }}" class="title">{{ $value->name }}</a>
                                        <p class="cr-price"><span class="new-price">{{ number_format($value->variants->first()->sale_price)}}đ</span> <span
                                                class="old-price">{{ number_format($value->variants->first()->price)}}đ</span></p>
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
