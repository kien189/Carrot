@extends('Fe.layout.master')
@section('main_fe')
    <base href="/">
    <!-- Hero slider -->
    <section class="section-hero padding-b-100 next">
        <div class="cr-slider swiper-container">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <div class="cr-hero-banner cr-banner-image-two">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="cr-left-side-contain slider-animation">
                                        <h5><span>100%</span> Organic Fruits</h5>
                                        <h1>Explore fresh & juicy fruits.</h1>
                                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Amet reiciendis
                                            beatae consequuntur.</p>
                                        <div class="cr-last-buttons">
                                            <a href="shop-left-sidebar.html" class="cr-button">
                                                shop now
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="cr-hero-banner cr-banner-image-one">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="cr-left-side-contain slider-animation">
                                        <h5><span>100%</span> Organic Vegetables</h5>
                                        <h1>The best way to stuff your wallet.</h1>
                                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Amet reiciendis
                                            beatae consequuntur.</p>
                                        <div class="cr-last-buttons">
                                            <a href="shop-left-sidebar.html" class="cr-button">
                                                shop now
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="swiper-pagination"></div>
        </div>
    </section>

    <!-- Categories -->
    {{-- <section class="section-categories padding-b-100">
        <div class="container">
            <div class="row mb-minus-24">
                <div class="col-lg-4 col-12 mb-24">
                    <div class="cr-categories">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active center-categories-inner" id="cake_milk-tab"
                                    data-bs-toggle="tab" data-bs-target="#cake_milk" type="button" role="tab"
                                    aria-controls="cake_milk" aria-selected="true">
                                    Cake & Milk <span>(65 items)</span>
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link center-categories-inner" id="meat-tab" data-bs-toggle="tab"
                                    data-bs-target="#meat" type="button" role="tab" aria-controls="meat"
                                    aria-selected="false" tabindex="-1">
                                    Fresh Meat <span>(30 items)</span>
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link center-categories-inner" id="Vegetables-tab" data-bs-toggle="tab"
                                    data-bs-target="#Vegetables" type="button" role="tab" aria-controls="Vegetables"
                                    aria-selected="false" tabindex="-1">
                                    Vegetables <span>(25 items)</span>
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link center-categories-inner" id="Custard-tab" data-bs-toggle="tab"
                                    data-bs-target="#Custard" type="button" role="tab" aria-controls="Custard"
                                    aria-selected="false" tabindex="-1">
                                    Apple & Mango <span>(45 items)</span>
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link center-categories-inner" id="Strawberry-tab" data-bs-toggle="tab"
                                    data-bs-target="#Strawberry" type="button" role="tab" aria-controls="Strawberry"
                                    aria-selected="false" tabindex="-1">
                                    Strawberry <span>(68 items)</span>
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="center-categories-inner cr-view-more" href="shop-left-sidebar.html">
                                    View More
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-8 col-12 mb-24">
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade active show" id="cake_milk" role="tabpanel"
                            aria-labelledby="cake_milk-tab">
                            <div class="row mb-minus-24">
                                <div class="col-6 cr-categories-box mb-24">
                                    <div class="cr-side-categories">
                                        <div class="categories-inner">
                                            <h4>50
                                                <span>
                                                    <small>%</small>
                                                    <small>Off</small>
                                                </span>
                                            </h4>
                                        </div>
                                        <div class="categories-contain">
                                            <div class="categories-text">
                                                <h5>Cake</h5>
                                            </div>
                                            <div class="categories-button">
                                                <a href="shop-left-sidebar.html" class="cr-button">shop now</a>
                                            </div>
                                        </div>
                                        <img src="assets/img/categories/3.jpg" alt="categories-3">
                                    </div>
                                </div>
                                <div class="col-6 cr-categories-box mb-24">
                                    <div class="cr-side-categories">
                                        <div class="categories-inner">
                                            <h4>40
                                                <span>
                                                    <small>%</small>
                                                    <small>Off</small>
                                                </span>
                                            </h4>
                                        </div>
                                        <div class="categories-contain">
                                            <div class="categories-text">
                                                <h5>Milk</h5>
                                            </div>
                                            <div class="categories-button">
                                                <a href="shop-left-sidebar.html" class="cr-button">shop now</a>
                                            </div>
                                        </div>
                                        <img src="assets/img/categories/4.jpg" alt="categories-4">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="meat" role="tabpanel" aria-labelledby="meat-tab">
                            <div class="row mb-minus-24">
                                <div class="col-6 cr-categories-box">
                                    <div class="cr-side-categories">
                                        <div class="categories-inner">
                                            <h4>35
                                                <span>
                                                    <small>%</small>
                                                    <small>Off</small>
                                                </span>
                                            </h4>
                                        </div>
                                        <div class="categories-contain">
                                            <div class="categories-text">
                                                <h5>Fish Meat</h5>
                                            </div>
                                            <div class="categories-button">
                                                <a href="shop-left-sidebar.html" class="cr-button">shop now</a>
                                            </div>
                                        </div>
                                        <img src="assets/img/categories/1.jpg" alt="categories-1">
                                    </div>
                                </div>
                                <div class="col-6 cr-categories-box">
                                    <div class="cr-side-categories">
                                        <div class="categories-inner">
                                            <h4>24
                                                <span>
                                                    <small>%</small>
                                                    <small>Off</small>
                                                </span>
                                            </h4>
                                        </div>
                                        <div class="categories-contain">
                                            <div class="categories-text">
                                                <h5>Fresh Meat</h5>
                                            </div>
                                            <div class="categories-button">
                                                <a href="shop-left-sidebar.html" class="cr-button">shop now</a>
                                            </div>
                                        </div>
                                        <img src="assets/img/categories/2.jpg" alt="categories-2">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="Vegetables" role="tabpanel" aria-labelledby="Vegetables-tab">
                            <div class="row mb-minus-24">
                                <div class="col-6 cr-categories-box mb-24">
                                    <div class="cr-side-categories">
                                        <div class="categories-inner">
                                            <h4>45
                                                <span>
                                                    <small>%</small>
                                                    <small>Off</small>
                                                </span>
                                            </h4>
                                        </div>
                                        <div class="categories-contain">
                                            <div class="categories-text">
                                                <h5>Coriander</h5>
                                            </div>
                                            <div class="categories-button">
                                                <a href="shop-left-sidebar.html" class="cr-button">shop now</a>
                                            </div>
                                        </div>
                                        <img src="assets/img/categories/5.jpg" alt="categories-5">
                                    </div>
                                </div>
                                <div class="col-6 cr-categories-box mb-24">
                                    <div class="cr-side-categories">
                                        <div class="categories-inner">
                                            <h4>20
                                                <span>
                                                    <small>%</small>
                                                    <small>Off</small>
                                                </span>
                                            </h4>
                                        </div>
                                        <div class="categories-contain">
                                            <div class="categories-text">
                                                <h5>Broccoli</h5>
                                            </div>
                                            <div class="categories-button">
                                                <a href="shop-left-sidebar.html" class="cr-button">shop now</a>
                                            </div>
                                        </div>
                                        <img src="assets/img/categories/6.jpg" alt="categories-6">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="Custard" role="tabpanel" aria-labelledby="Custard-tab">
                            <div class="row mb-minus-24">
                                <div class="col-6 cr-categories-box mb-24">
                                    <div class="cr-side-categories">
                                        <div class="categories-inner">
                                            <h4>30
                                                <span>
                                                    <small>%</small>
                                                    <small>Off</small>
                                                </span>
                                            </h4>
                                        </div>
                                        <div class="categories-contain">
                                            <div class="categories-text">
                                                <h5>Apple</h5>
                                            </div>
                                            <div class="categories-button">
                                                <a href="shop-left-sidebar.html" class="cr-button">shop now</a>
                                            </div>
                                        </div>
                                        <img src="assets/img/categories/7.jpg" alt="categories-7">
                                    </div>
                                </div>
                                <div class="col-6 cr-categories-box mb-24">
                                    <div class="cr-side-categories">
                                        <div class="categories-inner">
                                            <h4>25
                                                <span>
                                                    <small>%</small>
                                                    <small>Off</small>
                                                </span>
                                            </h4>
                                        </div>
                                        <div class="categories-contain">
                                            <div class="categories-text">
                                                <h5>Mango</h5>
                                            </div>
                                            <div class="categories-button">
                                                <a href="shop-left-sidebar.html" class="cr-button">shop now</a>
                                            </div>
                                        </div>
                                        <img src="assets/img/categories/8.jpg" alt="categories-8">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="Strawberry" role="tabpanel" aria-labelledby="Strawberry-tab">
                            <div class="row mb-minus-24">
                                <div class="col-6 cr-categories-box mb-24">
                                    <div class="cr-side-categories">
                                        <div class="categories-inner">
                                            <h4>33
                                                <span>
                                                    <small>%</small>
                                                    <small>Off</small>
                                                </span>
                                            </h4>
                                        </div>
                                        <div class="categories-contain">
                                            <div class="categories-text">
                                                <h5>Strawberry</h5>
                                            </div>
                                            <div class="categories-button">
                                                <a href="shop-left-sidebar.html" class="cr-button">shop now</a>
                                            </div>
                                        </div>
                                        <img src="assets/img/categories/9.jpg" alt="categories-9">
                                    </div>
                                </div>
                                <div class="col-6 cr-categories-box mb-24">
                                    <div class="cr-side-categories">
                                        <div class="categories-inner">
                                            <h4>15
                                                <span>
                                                    <small>%</small>
                                                    <small>Off</small>
                                                </span>
                                            </h4>
                                        </div>
                                        <div class="categories-contain">
                                            <div class="categories-text">
                                                <h5>Strawberry</h5>
                                            </div>
                                            <div class="categories-button">
                                                <a href="shop-left-sidebar.html" class="cr-button">shop now</a>
                                            </div>
                                        </div>
                                        <img src="assets/img/categories/10.jpg" alt="categories-10">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}

    <!-- Popular product -->
    <section class="section-popular-product-shape padding-b-100">
        <div class="container" data-aos="fade-up" data-aos-duration="2000">
            <div class="row">
                <div class="col-lg-12">
                    <div class="mb-30">
                        <div class="cr-banner">
                            <h2>Popular Products</h2>
                        </div>
                        <div class="cr-banner-sub-title">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                                ut labore lacus vel facilisis. </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="product-content row mb-minus-24" id="MixItUpDA2FB7">
                <div class="col-xl-3 col-lg-4 col-12 mb-24">
                    <div class="row mb-minus-24 sticky">
                        <div class="col-lg-12 col-sm-6 col-6 cr-product-box mb-24">
                            <div class="cr-product-tabs">
                                <ul>
                                    <li class="active" id="all" data-id="all">All</li>
                                    @foreach ($cate as $value)
                                        <li data-id="{{ $value->id }}" id="filter">{{ $value->name }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        {{-- Locj category theo danh mục cha  --}}
                        <div class="col-lg-12 col-sm-6 col-6 cr-product-box banner-480 mb-24">
                            <div class="cr-ice-cubes">
                                <img src="assets/img/product/product-banner.jpg" alt="product banner">
                                <div class="cr-ice-cubes-contain">
                                    <h4 class="title">Juicy </h4>
                                    <h5 class="sub-title">Fruits</h5>
                                    <span>100% Natural</span>
                                    <a href="shop-left-sidebar.html" class="cr-button">Shop Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-9 col-lg-8 col-12 mb-24">
                    <div id="filtered-products" class="row mb-minus-24">
                        @foreach ($product as $value)
                            <div class="mix vegetable col-xxl-3 col-xl-4 col-6 cr-product-box mb-24">
                                <div class="cr-product-card">
                                    <div class="cr-product-image">
                                        <div class="cr-image-inner zoom-image-hover">
                                            <img src="{{ asset('storage/images/' . $value->image) }}" alt="product-1">
                                        </div>
                                        <div class="cr-side-view">
                                            <a href="javascript:void(0)" class="wishlist">
                                                <i class="ri-heart-line"></i>
                                            </a>
                                            <a class="model-oraganic-product" data-bs-toggle="modal" href="#quickview"
                                                data_id= "{{ $value->id }}" role="button">
                                                <i class="ri-eye-line"></i>
                                            </a>
                                        </div>
                                        <a class="cr-shopping-bag" href="javascript:void(0)">
                                            <i class="ri-shopping-bag-line"></i>
                                        </a>
                                    </div>
                                    <div class="cr-product-details">
                                        <div class="cr-brand">
                                            <a>{{ $value->category->parent->name }}</a>
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
                                        <a href="{{ route('detail', ['product' => $value->category->parent->slug, 'slug' => $value->slug]) }}"
                                            class="title">{{ $value->name }}</a>
                                        <p class="cr-price">
                                            <span
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

    <!-- Product banner -->
    <section class="section-product-banner padding-b-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="cr-banner-slider swiper-container">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide" data-aos="fade-up" data-aos-duration="2000">
                                <div class="cr-product-banner-image">
                                    <img src="assets/img/product-banner/1.jpg" alt="product-banner">
                                    <div class="cr-product-banner-contain">
                                        <h5>Healthy <br> Bakery Products</h5>
                                        <p><span class="percent">30%</span> Off <span class="text">on first order</span>
                                        </p>
                                        <div class="cr-product-banner-buttons">
                                            <a href="shop-left-sidebar.html" class="cr-button">shop now</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide" data-aos="fade-up" data-aos-duration="2000">
                                <div class="cr-product-banner-image">
                                    <img src="assets/img/product-banner/2.jpg" alt="product-banner">
                                    <div class="cr-product-banner-contain">
                                        <h5>Fresh <br>Snacks & Sweets</h5>
                                        <p><span class="percent">20%</span> Off <span class="text">on first order</span>
                                        </p>
                                        <div class="cr-product-banner-buttons">
                                            <a href="shop-left-sidebar.html" class="cr-button">shop now</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide" data-aos="fade-up" data-aos-duration="2000">
                                <div class="cr-product-banner-image">
                                    <img src="assets/img/product-banner/3.jpg" alt="product-banner">
                                    <div class="cr-product-banner-contain">
                                        <h5>Fresh & healthy <br> Organic Fruits</h5>
                                        <p><span class="percent">35%</span> Off <span class="text">on first order</span>
                                        </p>
                                        <div class="cr-product-banner-buttons">
                                            <a href="shop-left-sidebar.html" class="cr-button">shop now</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Services -->
    <section class="section-services padding-b-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="cr-services-border" data-aos="fade-up" data-aos-duration="2000">
                        <div class="cr-service-slider swiper-container">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <div class="cr-services">
                                        <div class="cr-services-image">
                                            <i class="ri-red-packet-line"></i>
                                        </div>
                                        <div class="cr-services-contain">
                                            <h4>Product Packing</h4>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="cr-services">
                                        <div class="cr-services-image">
                                            <i class="ri-customer-service-2-line"></i>
                                        </div>
                                        <div class="cr-services-contain">
                                            <h4>24X7 Support</h4>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="cr-services">
                                        <div class="cr-services-image">
                                            <i class="ri-truck-line"></i>
                                        </div>
                                        <div class="cr-services-contain">
                                            <h4>Delivery in 5 Days</h4>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="cr-services">
                                        <div class="cr-services-image">
                                            <i class="ri-money-dollar-box-line"></i>
                                        </div>
                                        <div class="cr-services-contain">
                                            <h4>Payment Secure</h4>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Deal -->
    <section class="section-deal padding-b-100">
        <div class="bg-banner-deal">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="cr-deal-rightside">
                            <div class="cr-deal-content" data-aos="fade-up" data-aos-duration="2000">
                                <span><code>35%</code> OFF</span>
                                <h4 class="cr-deal-title">Great deal on organic food.</h4>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do maecenas accumsan
                                    lacus
                                    vel facilisis. </p>
                                <div id="timer" class="cr-counter">
                                    <div class="cr-counter-inner">
                                        <h4>
                                            <span id="days"></span>
                                            Days
                                        </h4>
                                        <h4>
                                            <span id="hours"></span>
                                            Hrs
                                        </h4>
                                        <h4>
                                            <span id="minutes"></span>
                                            Min
                                        </h4>
                                        <h4>
                                            <span id="seconds"></span>
                                            Sec
                                        </h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Popular product -->
    <section class="section-popular margin-b-100">
        <div class="container">
            <div class="row">
                <div class="col-xxl-7 col-xl-6 col-lg-6 col-md-12" data-aos="fade-up" data-aos-duration="2000">
                    <div class="cr-twocolumns-product">
                        @foreach ($product as $value)
                            <div class="slick-slide">
                                <div class="cr-product-card">
                                    <div class="cr-product-image">
                                        <div class="cr-image-inner zoom-image-hover">
                                            <img src="{{ asset('storage/images/' . $value->image) }}" alt="product-1">
                                        </div>
                                        <div class="cr-side-view">
                                            <a href="javascript:void(0)" class="wishlist">
                                                <i class="ri-heart-line"></i>
                                            </a>
                                            <a class="model-oraganic-product" data-bs-toggle="modal" href="#quickview"
                                                role="button" data_id= "{{ $value->id }}">
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
                                        <a href="{{ route('detail', ['product' => $value->category->parent->slug, 'slug' => $value->slug]) }}"
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
                <div class="col-xxl-5 col-xl-6 col-lg-6 col-md-12" data-aos="fade-up" data-aos-duration="2000">
                    <div class="cr-products-rightbar">
                        <img src="assets/img/product/products-rightview.jpg" alt="products-rightview">
                        <div class="cr-products-rightbar-content">
                            <h4>Organic & Healthy <br> Vegetables</h4>
                            <div class="cr-off">
                                <span>25% <code>OFF</code></span>
                            </div>
                            <div class="rightbar-buttons">
                                <a href="shop-left-sidebar.html" class="cr-button">
                                    shop now
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonial -->
    <section class="section-testimonial padding-b-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="mb-30" data-aos="fade-up" data-aos-duration="2000">
                        <div class="cr-banner">
                            <h2>Great Words From People</h2>
                        </div>
                        <div class="cr-banner-sub-title">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                                ut labore lacus vel facilisis. </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="cr-testimonial-slider swiper-container">
                        <div class="swiper-wrapper cr-testimonial-pt-50">
                            <div class="swiper-slide" data-aos="fade-up" data-aos-duration="2000">
                                <div class="cr-testimonial">
                                    <div class="cr-testimonial-image">
                                        <img src="assets/img/testimonial/1.jpg" alt="businessman">
                                    </div>
                                    <div class="cr-testimonial-inner">
                                        <span>Co Founder</span>
                                        <h4 class="title">Stephen Smith</h4>
                                        <p>“eiusmpsu dolor sit amet, conse cte tur ng elit, sed do eiusmod tem lacus vel
                                            facilisis.”
                                        </p>
                                        <div class="cr-star">
                                            <i class="ri-star-fill"></i>
                                            <i class="ri-star-fill"></i>
                                            <i class="ri-star-fill"></i>
                                            <i class="ri-star-fill"></i>
                                            <i class="ri-star-fill"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide" data-aos="fade-up" data-aos-duration="2000">
                                <div class="cr-testimonial">
                                    <div class="cr-testimonial-image">
                                        <img src="assets/img/testimonial/2.jpg" alt="businessman">
                                    </div>
                                    <div class="cr-testimonial-inner">
                                        <span>Manager</span>
                                        <h4 class="title">Lorem Robinson</h4>
                                        <p>“eiusmpsu dolor sit amet, conse cte tur ng elit, sed do eiusmod tem lacus vel
                                            facilisis.”
                                        </p>
                                        <div class="cr-star">
                                            <i class="ri-star-fill"></i>
                                            <i class="ri-star-fill"></i>
                                            <i class="ri-star-fill"></i>
                                            <i class="ri-star-fill"></i>
                                            <i class="ri-star-line"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide" data-aos="fade-up" data-aos-duration="2000">
                                <div class="cr-testimonial">
                                    <div class="cr-testimonial-image">
                                        <img src="assets/img/testimonial/3.jpg" alt="businessman">
                                    </div>
                                    <div class="cr-testimonial-inner">
                                        <span>Team Leader</span>
                                        <h4 class="title">Saddika Alard</h4>
                                        <p>“eiusmpsu dolor sit amet, conse cte tur ng elit, sed do eiusmod tem lacus vel
                                            facilisis.”
                                        </p>
                                        <div class="cr-star">
                                            <i class="ri-star-fill"></i>
                                            <i class="ri-star-fill"></i>
                                            <i class="ri-star-fill"></i>
                                            <i class="ri-star-fill"></i>
                                            <i class="ri-star-fill"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Blog -->
    <section class="section-blog padding-b-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="mb-30" data-aos="fade-up" data-aos-duration="2000">
                        <div class="cr-banner">
                            <h2>Latest News</h2>
                        </div>
                        <div class="cr-banner-sub-title">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                                ut labore lacus vel facilisis. </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="cr-blog-slider swiper-container">
                        <div class="swiper-wrapper">
                            @foreach ($blogs as $value)
                                <div class="swiper-slide" data-aos="fade-up" data-aos-duration="2000">
                                    <div class="cr-blog">
                                        <div class="cr-blog-content">
                                            <span><code>{{ $value->user->name }}</code> | <a
                                                    href="blog-left-sidebar.html">{{ $value->category->name }}</a></span>
                                            <h5>{{ $value->title }}</h5>
                                            <a class="read" href="{{ route('blogDetail', $value->slug) }}">Read
                                                More</a>
                                        </div>
                                        <div class="cr-blog-image">
                                            <img src="{{ asset('storage/images/' . $value->image) }}" alt="blog-2">
                                            <div class="cr-blog-date">
                                                <span>
                                                    {{ $value->created_at->format('d') }}
                                                    <code>{{ $value->created_at->format('M') }}</code>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="modal fade quickview-modal" id="quickview" aria-hidden="true" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered cr-modal-dialog">
            <div class="modal-content">
                <button type="button" class="cr-close-model btn-close" data-bs-dismiss="modal"
                    aria-label="Close"></button>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-5 col-sm-12 col-xs-12">
                            <div class="zoom-image-hover modal-border-image">
                                <img src="" alt="product-tab-2" class="product-image">
                            </div>
                        </div>
                        <div class="col-md-7 col-sm-12 col-xs-12">
                            <div class="cr-size-and-weight-contain">
                                <h2 class="heading"></h2>
                                <p class="description"></p>
                            </div>
                            <div class="cr-size-and-weight">
                                <div class="cr-review-star">
                                    <div class="cr-star">
                                        <i class="ri-star-fill"></i>
                                        <i class="ri-star-fill"></i>
                                        <i class="ri-star-fill"></i>
                                        <i class="ri-star-fill"></i>
                                        <i class="ri-star-fill"></i>
                                    </div>
                                    <p id="review">( 75 Review )</p>
                                </div>
                                <div class="cr-product-price">
                                    <span class="new-price"></span>
                                    <span class="old-price"></span>
                                </div>
                                <div class="cr-size-weight">
                                    <h5><span>Size</span>/<span>Weight</span> :</h5>
                                    <div class="cr-kg">
                                        <ul>
                                            <li class="active-color"></li>

                                        </ul>
                                    </div>
                                </div>
                                <div class="cr-add-card">
                                    <div class="cr-qty-main">
                                        <input type="text" placeholder="." value="1" minlength="1"
                                            maxlength="20" class="quantity">
                                        <button type="button" id="add_model" class="plus plussss">+</button>
                                        <button type="button" id="sub_model" class="minus minusss">-</button>
                                    </div>
                                    <div class="cr-add-button">
                                        <button type="button" class="cr-button cr-shopping-bag">Add to cart</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
{{-- @section('script')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var productButtons = document.querySelectorAll('.model-oraganic-product');

            productButtons.forEach(function(button) {
                button.addEventListener('click', function() {
                    const proId = button.getAttribute('data_id');

                    axios.get(`/products/${proId}`)
                        .then(res => {
                            const product = res.data;
                            console.log(
                                product
                            ); // Debug: In ra dữ liệu product để xem liệu average_rating có tồn tại không
                            var modal = document.querySelector('#quickview');
                            modal.querySelector('.heading').textContent = product.name;
                            modal.querySelector('.description').innerHTML = product
                                .sortdescription;
                            modal.querySelector('.product-image').src =
                                '{{ asset('storage/images') }}/' + product.image;

                            var variants = product.variants;
                            var variantsIds = variants.map(variant => variant
                                .id); // Lấy danh sách các ID của các biến thể
                            var defaultVariant = variants[0]; // Mặc định chọn biến thể đầu tiên
                            updatePrice(defaultVariant.price, defaultVariant
                                .sale_price); // Cập nhật giá ban đầu

                            // Hiển thị các size
                            var sizeContainer = modal.querySelector(
                                '.cr-size-weight .cr-kg ul');
                            sizeContainer.innerHTML = '';
                            variants.forEach(function(variant, index) {
                                var li = document.createElement('li');
                                li.textContent = variant.size;
                                li.classList.add('variant-size');
                                li.setAttribute('data-id', variant
                                    .id); // Thiết lập data-id cho từng size tương ứng
                                if (index === 0) {
                                    li.classList.add(
                                        'active-color'
                                    ); // Đặt lớp active cho size đầu tiên
                                }
                                sizeContainer.appendChild(li);
                            });

                            // Xử lý sự kiện click cho từng size
                            sizeContainer.addEventListener('click', function(event) {
                                var target = event.target;
                                if (target && target.classList.contains(
                                        'variant-size')) {
                                    var variantId = target.getAttribute('data-id');
                                    var selectedVariant = variants.find(variant =>
                                        variant.id === parseInt(variantId));
                                    if (selectedVariant) {
                                        updatePrice(selectedVariant.price,
                                            selectedVariant.sale_price);
                                        // Xử lý việc thay đổi lớp active khi click
                                        var currentActive = sizeContainer.querySelector(
                                            '.active-color');
                                        if (currentActive) {
                                            currentActive.classList.remove(
                                                'active-color');
                                        }
                                        target.classList.add('active-color');
                                    }
                                }
                            });

                            // Hàm cập nhật giá
                            function updatePrice(price, sale_price) {
                                var priceContainer = modal.querySelector('.cr-product-price');
                                var newPriceElement = priceContainer.querySelector(
                                    '.new-price');
                                var oldPriceElement = priceContainer.querySelector(
                                    '.old-price');

                                if (sale_price !== undefined) {
                                    newPriceElement.textContent = sale_price.toLocaleString(
                                        'vi-VN', {
                                            style: 'currency',
                                            currency: 'VND'
                                        });
                                } else {
                                    oldPriceElement.textContent =
                                        ''; // Xử lý khi giá cũ không tồn tại
                                }
                                if (price !== undefined) {
                                    oldPriceElement.textContent = price.toLocaleString(
                                        'vi-VN', {
                                            style: 'currency',
                                            currency: 'VND'
                                        });
                                } else {
                                    newPriceElement.textContent =
                                        'N/A'; // Xử lý khi giá không tồn tại
                                }


                            }


                        })
                        .catch(error => {
                            console.error('Error fetching product:', error); // Xử lý lỗi nếu có
                        });
                });
            });
        });
    </script>
@endsection --}}
@section('script')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const productButtons = document.querySelectorAll('.model-oraganic-product');

            productButtons.forEach(function(button) {
                button.addEventListener('click', function() {
                    const proId = button.getAttribute('data_id');

                    axios.get(`/products/${proId}`)
                        .then(res => {
                            const product = res.data;
                            console.log(product); // Debug: Log dữ liệu sản phẩm để kiểm tra

                            var modal = document.querySelector('#quickview');
                            modal.querySelector('.heading').textContent = product.name;
                            modal.querySelector('.description').innerHTML = product
                                .sortdescription;
                            modal.querySelector('.product-image').src =
                                '{{ asset('storage/images') }}/' + product.image;
                            modal.querySelector('#review').innerHTML =
                                `(${product.ratings.length} Review${product.ratings.length !== 1 ? 's' : ''})`;
                            var variants = product.variants;
                            var defaultVariant = variants[
                                0]; // Chọn biến thể đầu tiên làm mặc định

                            // Cập nhật giá và giá cũ
                            updatePrice(defaultVariant.price, defaultVariant.sale_price);

                            // Cập nhật số sao, số lượng đánh giá và giá bình luận
                            updateRatings(product.average_rating, product.review_count);

                            // Hiển thị các size
                            var sizeContainer = modal.querySelector(
                                '.cr-size-weight .cr-kg ul');
                            sizeContainer.innerHTML = '';
                            variants.forEach(function(variant, index) {
                                var li = document.createElement('li');
                                li.textContent = variant.size;
                                li.classList.add('variant-size');
                                li.setAttribute('data-id', variant
                                    .id); // Thiết lập data-id cho từng size tương ứng
                                if (index === 0) {
                                    li.classList.add(
                                        'active-color'
                                        ); // Đặt lớp active cho size đầu tiên
                                }
                                sizeContainer.appendChild(li);
                            });

                            // Xử lý sự kiện click cho từng size
                            sizeContainer.addEventListener('click', function(event) {
                                var target = event.target;
                                if (target && target.classList.contains(
                                        'variant-size')) {
                                    var variantId = target.getAttribute('data-id');
                                    var selectedVariant = variants.find(variant =>
                                        variant.id === parseInt(variantId));
                                    if (selectedVariant) {
                                        updatePrice(selectedVariant.price,
                                            selectedVariant.sale_price);
                                        // Xử lý việc thay đổi lớp active khi click
                                        var currentActive = sizeContainer.querySelector(
                                            '.active-color');
                                        if (currentActive) {
                                            currentActive.classList.remove(
                                                'active-color');
                                        }
                                        target.classList.add('active-color');
                                    }
                                }
                            });

                            // Sự kiện click để thêm sản phẩm vào giỏ hàng
                            modal.querySelector('.cr-button').addEventListener('click',
                                function() {
                                    var productId = product.id; // Lấy id của sản phẩm
                                    var selectedVariantId = defaultVariant
                                        .id; // Lấy id của biến thể (variant)

                                    // Gọi hàm để thêm sản phẩm vào giỏ hàng (ví dụ)
                                    addToCart(productId, selectedVariantId);
                                });

                            // Hàm cập nhật giá
                            function updatePrice(price, sale_price) {
                                var priceContainer = modal.querySelector('.cr-product-price');
                                var newPriceElement = priceContainer.querySelector(
                                    '.new-price');
                                var oldPriceElement = priceContainer.querySelector(
                                    '.old-price');

                                if (sale_price !== undefined) {
                                    newPriceElement.textContent = sale_price.toLocaleString(
                                        'vi-VN', {
                                            style: 'currency',
                                            currency: 'VND'
                                        });
                                } else {
                                    newPriceElement.textContent =
                                        'N/A'; // Xử lý khi giá không tồn tại
                                }

                                if (price !== undefined) {
                                    oldPriceElement.textContent = price.toLocaleString(
                                        'vi-VN', {
                                            style: 'currency',
                                            currency: 'VND'
                                        });
                                } else {
                                    oldPriceElement.textContent =
                                        ''; // Xử lý khi giá cũ không tồn tại
                                }
                            }

                            // Hàm cập nhật số sao, số lượng đánh giá và giá bình luận
                            function updateRatings(averageRating) {
                                var starContainer = modal.querySelector(
                                    '.cr-review-star .cr-star');

                                // Xử lý số sao
                                var numStars = 5; // Số sao tối đa hiển thị
                                var fullStars = Math.floor(averageRating);
                                var halfStars = Math.ceil(averageRating) - fullStars;

                                starContainer.innerHTML = ''; // Xóa các sao hiện tại
                                for (var i = 0; i < fullStars; i++) {
                                    var star = document.createElement('i');
                                    star.classList.add('ri-star-fill');
                                    starContainer.appendChild(star);
                                }
                                if (halfStars > 0) {
                                    var halfStar = document.createElement('i');
                                    halfStar.classList.add('ri-star-half-fill');
                                    starContainer.appendChild(halfStar);
                                }
                                var emptyStars = numStars - fullStars - (halfStars > 0 ? 1 : 0);
                                for (var j = 0; j < emptyStars; j++) {
                                    var emptyStar = document.createElement('i');
                                    emptyStar.classList.add('ri-star-line');
                                    starContainer.appendChild(emptyStar);
                                }

                                // Hiển thị số lượng đánh giá

                            }

                        })
                        .catch(error => {
                            console.error('Error fetching product:', error); // Xử lý lỗi nếu có
                        });
                });
            });

            // Hàm để thêm sản phẩm vào giỏ hàng
            function addToCart(productId, variantId) {
                var quantity = document.querySelector('.quantity').value;
                console.log(quantity);
                var button = document.querySelector('.cr-button');
                button.disabled = true;
                axios.post(`/addToCartJs/${productId}`, {
                        variant_id: variantId,
                        quantity: quantity
                    })
                    .then(response => {
                        console.log('Product added to cart:', response.data);
                    })
                    .catch(error => {
                        console.error('Error adding product to cart:', error);
                    });
            }

        });
    </script>
@endsection
