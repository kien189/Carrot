<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="ecommerce, market, shop, mart, cart, deal, multipurpose, marketplace">
    <meta name="description" content="Carrot - Multipurpose eCommerce HTML Template.">
    <meta name="author" content="ashishmaraviya">

    <title>Carrot - Multipurpose eCommerce HTML Template</title>

    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('assets') }}/img/logo/favicon.png">

    <!-- Icon CSS -->
    <link rel="stylesheet" href="{{ asset('assets') }}/css/vendor/materialdesignicons.min.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/css/vendor/remixicon.css">

    <!-- Vendor -->
    <link rel="stylesheet" href="{{ asset('assets') }}/css/vendor/animate.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/css/vendor/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/css/vendor/aos.min.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/css/vendor/range-slider.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/css/vendor/swiper-bundle.min.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/css/vendor/jquery.slick.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/css/vendor/slick-theme.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon/fonts/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <!-- Main CSS -->
    <link rel="stylesheet" href="{{ asset('assets') }}/css/style.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/css/css1.css">
    @vite('resources/js/app.js')
</head>

<body class="body-bg-6">

    <!-- Loader -->
    <div id="cr-overlay">
        <span class="loader"></span>
    </div>

    <!-- Header -->
    <header>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="top-header">
                        <a href="{{ route('home') }}" class="cr-logo">
                            <img src="{{ asset('assets') }}/img/logo/logo.png" alt="logo" class="logo">
                            <img src="{{ asset('assets') }}/img/logo/dark-logo.png" alt="logo" class="dark-logo">
                        </a>
                        <form class="cr-search" action="{{ route('getSearch') }}" method="get">

                            <input class="search-input" name="search" type="text" placeholder="Search For items..."
                                required=''>
                            {{-- <select class="form-select" aria-label="Default select example">
                                <option selected>All Categories</option>
                                <option value="1">Mens</option>
                                <option value="2">Womens</option>
                                <option value="3">Electronics</option>
                            </select> --}}
                            <button class="search-btn " style="border: none">
                                <i class="ri-search-line"></i>
                            </button>
                        </form>
                        <div class="cr-right-bar">
                            <ul class="navbar-nav">
                                <li class="nav-item dropdown">
                                    @if (auth('customers')->check())
                                        <a class="nav-link dropdown-toggle cr-right-bar-item aUser"
                                            href="javascript:void(0)">
                                            <span class="userspan me-2">
                                                <img src="{{ auth('customers')->user()->image }}" class="user-avatar">
                                            </span>
                                            {{ auth('customers')->user()->name }}
                                        </a>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <a class="dropdown-item" href="{{ route('profile') }}">Profile</a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item" href="{{ route('trackOrder') }}">Treck Order</a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item" href="{{ route('logout') }}">Logout</a>
                                            </li>
                                        </ul>
                                    @else
                                        <a class="nav-link dropdown-toggle cr-right-bar-item" href="javascript:void(0)">
                                            <i class="ri-user-3-line"></i>
                                            <span>Account</span>
                                        </a>
                                        <ul class="dropdown-menu">
                                            {{-- <li>
                                                <a class="dropdown-item" href="register.html">Register</a>
                                            </li> --}}
                                            {{-- <li>
                                                <a class="dropdown-item" href="checkout.html">Checkout</a>
                                            </li> --}}
                                            <li>
                                                <a class="dropdown-item" href="{{ route('login') }}">Login</a>
                                            </li>
                                        </ul>
                                    @endif
                                </li>
                            </ul>
                            <a href="{{ route('wishList') }}" class="cr-right-bar-item">
                                <i class="ri-heart-3-line"></i>
                                <span>Wishlist</span>
                                @if ($favorite->count() > 0)
                                    <span
                                        class="position-absolute start-100  translate-middle badge rounded-pill bg-danger text-white"
                                        style="margin-left:-100px;margin-top:  ">
                                        {{ $favorite->count() }}
                                    </span>
                                @else
                                    <span hidden
                                        class="position-absolute start-100  translate-middle badge rounded-pill bg-danger text-white"
                                        style="margin-left:-100px;margin-top:  ">
                                        {{ $favorite->count() }}
                                    </span>
                                @endif
                            </a>
                            <a href="javascript:void(0)" class="cr-right-bar-item Shopping-toggle">
                                <i class="ri-shopping-cart-line"></i>
                                <span class="me-3">Cart</span>
                                @if ($carts->count() > 0)
                                    <span
                                        class="position-absolute top-10 start-100 translate-middle badge rounded-pill bg-danger text-white">
                                        {{ $carts->count() }}
                                    </span>
                                @else
                                    <span hidden
                                        class="position-absolute top-10 start-100 translate-middle badge rounded-pill bg-danger text-white">
                                        {{ $carts->count() }}
                                    </span>
                                @endif
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="cr-fix" id="cr-main-menu-desk">
            <div class="container">
                <div class="cr-menu-list">
                    <div class="cr-category-icon-block">
                        {{-- <div class="cr-category-menu">
                            <div class="cr-category-toggle">
                                <i class="ri-menu-2-line"></i>
                            </div>
                        </div> --}}
                        {{-- <div class="cr-cat-dropdown">
                            <div class="cr-cat-block">
                                <div class="cr-cat-tab">
                                    <div class="cr-tab-list nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                        @foreach ($categories as $category)
                                        <button class="nav-link getCategory {{ $loop->first ? 'active' : '' }}"
                                            id="v-pills-{{ $category->id }}-tab" data-bs-toggle="pill" data-bs-target="#v-pills-{{ $category->id }}"
                                            type="button" role="tab" aria-controls="v-pills-{{ $category->id }}"
                                            aria-selected="{{ $loop->first ? 'true' : 'false' }}">
                                            {{ $category->name }}
                                        </button>
                                        @endforeach
                                        <a class="nav-link getCategory" href="{{ route('shop') }}">
                                            View All
                                        </a>
                                    </div>
                                    <div class="tab-content" id="v-pills-tabContent">
                                        @foreach ($categories as $category)
                                        <div class="tab-pane fade {{ $loop->first ? 'show active' : '' }}" id="v-pills-{{ $category->id }}"
                                            role="tabpanel" aria-labelledby="v-pills-{{ $category->id }}-tab">
                                            <div class="tab-list row">
                                                @foreach ($category->children as $child)
                                                <div class="col">
                                                    <h6 class="cr-col-title">{{ $child->name }}</h6>
                                                    <ul class="cat-list">
                                                        @foreach ($child->products as $product)
                                                        <li><a href="{{ route('product.show', $product->id) }}">{{ $product->name }}</a></li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                                @endforeach
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>

                            </div>
                        </div> --}}
                    </div>
                    <nav class="navbar navbar-expand-lg">
                        <a href="javascript:void(0)" class="navbar-toggler shadow-none">
                            <i class="ri-menu-3-line"></i>
                        </a>
                        <div class="cr-header-buttons">
                            @if (auth('customers')->check())
                                <ul class="navbar-nav">
                                    <li class="nav-item dropdown">
                                        <a class="nav-link" href="javascript:void(0)">
                                            <i class="ri-user-3-line"></i>
                                        </a>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <a class="dropdown-item" href="{{ route('profile') }}">Profile</a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item" href="{{ route('trackOrder') }}">Track Order</a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item" href="{{ route('logout') }}">Logout</a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            @else
                                <ul class="navbar-nav">
                                    <li class="nav-item dropdown">
                                        <a class="nav-link" href="javascript:void(0)">
                                            <i class="ri-user-3-line"></i>
                                        </a>
                                        <ul class="dropdown-menu">
                                            <li>
                                                {{-- <a class="dropdown-item" href="register.html">Register</a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item" href="checkout.html">Checkout</a>
                                            </li> --}}
                                            <li>
                                                <a class="dropdown-item" href="{{ route('login') }}">Login</a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            @endif
                            {{-- backup --}}
                            {{-- <ul class="navbar-nav">
                                <li class="nav-item dropdown">
                                    <a class="nav-link" href="javascript:void(0)">
                                        <i class="ri-user-3-line"></i>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a class="dropdown-item" href="register.html">Register</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="checkout.html">Checkout</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="login.html">Login</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul> --}}
                            <a href="wishlist.html" class="cr-right-bar-item">
                                <i class="ri-heart-line"></i>
                            </a>
                            <a href="javascript:void(0)" class="cr-right-bar-item Shopping-toggle">
                                <i class="ri-shopping-cart-line"></i>
                            </a>
                        </div>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('home') }}">
                                        Home
                                    </a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link " href="{{ route('shop') }}">
                                        Shop
                                    </a>
                                    {{-- <ul class="dropdown-menu">
                                        <li>
                                            <a class="dropdown-item" href="shop-left-sidebar.html">Shop Left
                                                sidebar</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="shop-right-sidebar.html">Shop
                                                Right
                                                sidebar</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="shop-full-width.html">Full
                                                Width</a>
                                        </li>
                                    </ul> --}}
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link " href="{{ route('contact') }}">
                                        Contact
                                    </a>
                                    {{-- <ul class="dropdown-menu">
                                        <li>
                                            <a class="dropdown-item" href="shop-left-sidebar.html">Shop Left
                                                sidebar</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="shop-right-sidebar.html">Shop
                                                Right
                                                sidebar</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="shop-full-width.html">Full
                                                Width</a>
                                        </li>
                                    </ul> --}}
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link " href="{{ route('cart') }}">
                                        Carts
                                    </a>
                                    {{-- <ul class="dropdown-menu">
                                        <li>
                                            <a class="dropdown-item" href="product-left-sidebar.html">product
                                                Left
                                                sidebar </a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="product-right-sidebar.html">product
                                                Right
                                                sidebar </a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="product-full-width.html">Product
                                                Full
                                                Width
                                            </a>
                                        </li>
                                    </ul> --}}
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="javascript:void(0)">
                                        Pages
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a class="dropdown-item" href="about.html">About Us</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="contact-us.html">Contact Us</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="cart.html">Cart</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="checkout.html">Checkout</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="track-order.html">Track Order</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="wishlist.html">Wishlist</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="faq.html">Faq</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="login.html">Login</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="register.html">Register</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="policy.html">Policy</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link " href="{{ route('blogs') }}">
                                        Blog
                                    </a>
                                    {{-- <ul class="dropdown-menu">
                                        <li>
                                            <a class="dropdown-item" href="blog-left-sidebar.html">Left
                                                Sidebar</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="blog-right-sidebar.html">Right
                                                Sidebar</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="blog-full-width.html">Full
                                                Width</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="blog-detail-left-sidebar.html">Detail
                                                Left
                                                Sidebar</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="blog-detail-right-sidebar.html">Detail
                                                Right
                                                Sidebar</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="blog-detail-full-width.html">Detail
                                                Full
                                                Width</a>
                                        </li>
                                    </ul> --}}
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="javascript:void(0)">
                                        Elements
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a class="dropdown-item" href="elements-products.html">Products</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="elements-typography.html">Typography</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="elements-buttons.html">Buttons</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </nav>
                    <div class="cr-calling">
                        <i class="ri-phone-line"></i>
                        <a href="javascript:void(0)">+ 033 ( 795 ) ( 5330 )</a>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Mobile menu -->
    <div class="cr-sidebar-overlay"></div>
    <div id="cr_mobile_menu" class="cr-side-cart cr-mobile-menu">
        <div class="cr-menu-title">
            <span class="menu-title">My Menu</span>
            <button type="button" class="cr-close">×</button>
        </div>
        <div class="cr-menu-inner">
            <div class="cr-menu-content">
                <ul>
                    <li class="dropdown drop-list">
                        <a href="{{ route('home') }}">Home</a>
                    </li>
                    <li class="dropdown drop-list">
                        {{-- <span class="menu-toggle"></span> --}}
                        <a href="{{ route('shop') }}" class="dropdown-list">Shop</a>
                        {{-- <ul class="sub-menu">
                            <li><a href="shop-left-sidebar.html">Shop Left sidebar</a></li>
                            <li><a href="shop-right-sidebar.html">Shop Right sidebar</a></li>
                            <li><a href="shop-full-width.html">Full Width</a></li>
                        </ul> --}}
                    </li>
                    <li class="dropdown drop-list">
                        {{-- <span class="menu-toggle"></span> --}}
                        <a href="{{ route('cart') }}" class="dropdown-list">Carts</a>
                        {{-- <ul class="sub-menu">
                            <li><a href="product-left-sidebar.html">product Left sidebar</a></li>
                            <li><a href="product-right-sidebar.html">product Right sidebar</a></li>
                            <li><a href="product-full-width.html">Product Full Width </a></li>
                        </ul> --}}
                    </li>
                    <li class="dropdown drop-list">
                        <span class="menu-toggle"></span>
                        <a href="javascript:void(0)" class="dropdown-list">Pages</a>
                        <ul class="sub-menu">
                            <li><a href="about.html">About Us</a></li>
                            <li><a href="contact-us.html">Contact Us</a></li>
                            <li><a href="cart.html">Cart</a></li>
                            <li><a href="checkout.html">Checkout</a></li>
                            <li><a href="track-order.html">Track Order</a></li>
                            <li><a href="wishlist.html">Wishlist</a></li>
                            <li><a href="faq.html">Faq</a></li>
                            <li><a href="login.html">Login</a></li>
                            <li><a href="register.html">Register</a></li>
                            <li><a href="policy.html">Policy</a></li>
                        </ul>
                    </li>
                    <li class="dropdown drop-list">
                        {{-- <span class="menu-toggle"></span> --}}
                        <a href="{{ route('blogs') }}" class="dropdown-list">Blog</a>
                        {{-- <ul class="sub-menu">
                            <li><a href="blog-left-sidebar.html">Left Sidebar</a></li>
                            <li><a href="blog-right-sidebar.html">Right Sidebar</a></li>
                            <li><a href="blog-full-width.html">Full Width</a></li>
                            <li><a href="blog-detail-left-sidebar.html">Detail Left Sidebar</a></li>
                            <li><a href="blog-detail-right-sidebar.html">Detail Right Sidebar</a></li>
                            <li><a href="blog-detail-full-width.html">Detail Full Width</a></li>
                        </ul> --}}
                    </li>
                    <li class="dropdown drop-list">
                        <span class="menu-toggle"></span>
                        <a href="javascript:void(0)">Element</a>
                        <ul class="sub-menu">
                            <li><a href="elements-products.html">Products</a></li>
                            <li><a href="elements-typography.html">Typography</a></li>
                            <li><a href="elements-buttons.html">Buttons</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    @yield('main_fe')
    <footer class="footer padding-t-100 bg-off-white">
        <div class="container">
            <div class="row footer-top padding-b-100">
                <div class="col-xl-4 col-lg-6 col-sm-12 col-12 cr-footer-border">
                    <div class="cr-footer-logo">
                        <div class="image">
                            <img src="{{ asset('assets') }}/img/logo/logo.png" alt="logo" class="logo">
                            <img src="{{ asset('assets') }}/img/logo/dark-logo.png" alt="logo"
                                class="dark-logo">
                        </div>
                        <p>Carrot is the biggest market of grocery products. Get your daily needs from our store.</p>
                    </div>
                    <div class="cr-footer">
                        <h4 class="cr-sub-title cr-title-hidden">
                            Contact us
                            <span class="cr-heading-res"></span>
                        </h4>
                        <ul class="cr-footer-links cr-footer-dropdown">
                            <li class="location-icon">
                                Tiên Phương , Chương Mỹ , Hà Nội.
                            </li>
                            <li class="mail-icon">
                                <a href="javascript:void(0)">carrot@gmai.com</a>
                            </li>
                            <li class="phone-icon">
                                <a href="javascript:void(0)"> +033 7955 330</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-3 col-sm-12 col-12 cr-footer-border">
                    <div class="cr-footer">
                        <h4 class="cr-sub-title">
                            Company
                            <span class="cr-heading-res"></span>
                        </h4>
                        <ul class="cr-footer-links cr-footer-dropdown">
                            <li><a href="about.html">About Us</a></li>
                            <li><a href="track-order.html">Delivery Information</a></li>
                            <li><a href="policy.html">Privacy Policy</a></li>
                            <li><a href="terms.html">Terms & Conditions</a></li>
                            <li><a href="{{ route('contact') }}">contact Us</a></li>
                            <li><a href="faq.html">Support Center</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-3 col-sm-12 col-12 cr-footer-border">
                    <div class="cr-footer">
                        <h4 class="cr-sub-title">
                            Category
                            <span class="cr-heading-res"></span>
                        </h4>
                        <ul class="cr-footer-links cr-footer-dropdown">
                            <li><a href="shop-left-sidebar.html">Dairy & Bakery</a></li>
                            <li><a href="shop-left-sidebar.html">Fruits & Vegetable</a></li>
                            <li><a href="shop-left-sidebar.html">Snack & Spice</a></li>
                            <li><a href="shop-left-sidebar.html">Juice & Drinks</a></li>
                            <li><a href="shop-left-sidebar.html">Chicken & Meat</a></li>
                            <li><a href="shop-left-sidebar.html">Fast Food</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-12 col-sm-12 col-12 cr-footer-border">
                    <div class="cr-footer cr-newsletter">
                        <h4 class="cr-sub-title">
                            Subscribe Our Newsletter
                            <span class="cr-heading-res"></span>
                        </h4>
                        <div class="cr-footer-links cr-footer-dropdown">
                            <form class="cr-search-footer">
                                <input class="search-input" type="text" placeholder="Search here..."
                                    required=''>
                                <a href="javascript:void(0)" class="search-btn">
                                    <i class="ri-send-plane-fill"></i>
                                </a>
                            </form>
                        </div>
                        <div class="cr-social-media">
                            <span><a href="javascript:void(0)"><i class="ri-facebook-line"></i></a></span>
                            <span><a href="javascript:void(0)"><i class="ri-twitter-x-line"></i></a></span>
                            <span><a href="javascript:void(0)"><i class="ri-dribbble-line"></i></a></span>
                            <span><a href="javascript:void(0)"><i class="ri-instagram-line"></i></a></span>
                        </div>
                        <div class="cr-payment">
                            <div class="cr-insta-slider swiper-container">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide">
                                        <a href="#" class="cr-payment-image">
                                            <img src="{{ asset('assets') }}/img/insta/1.jpg" alt="insta">
                                            <div class="payment-overlay"></div>
                                        </a>
                                    </div>
                                    <div class="swiper-slide">
                                        <a href="#" class="cr-payment-image">
                                            <img src="{{ asset('assets') }}/img/insta/2.jpg" alt="insta">
                                            <div class="payment-overlay"></div>
                                        </a>
                                    </div>
                                    <div class="swiper-slide">
                                        <a href="#" class="cr-payment-image">
                                            <img src="{{ asset('assets') }}/img/insta/3.jpg" alt="insta">
                                            <div class="payment-overlay"></div>
                                        </a>
                                    </div>
                                    <div class="swiper-slide">
                                        <a href="#" class="cr-payment-image">
                                            <img src="{{ asset('assets') }}/img/insta/4.jpg" alt="insta">
                                            <div class="payment-overlay"></div>
                                        </a>
                                    </div>
                                    <div class="swiper-slide">
                                        <a href="#" class="cr-payment-image">
                                            <img src="{{ asset('assets') }}/img/insta/5.jpg" alt="insta">
                                            <div class="payment-overlay"></div>
                                        </a>
                                    </div>
                                    <div class="swiper-slide">
                                        <a href="#" class="cr-payment-image">
                                            <img src="{{ asset('assets') }}/img/insta/6.jpg" alt="insta">
                                            <div class="payment-overlay"></div>
                                        </a>
                                    </div>
                                    <div class="swiper-slide">
                                        <a href="#" class="cr-payment-image">
                                            <img src="{{ asset('assets') }}/img/insta/7.jpg" alt="insta">
                                            <div class="payment-overlay"></div>
                                        </a>
                                    </div>
                                    <div class="swiper-slide">
                                        <a href="#" class="cr-payment-image">
                                            <img src="{{ asset('assets') }}/img/insta/8.jpg" alt="insta">
                                            <div class="payment-overlay"></div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="cr-last-footer">
                <p>&copy; <span id="copyright_year"></span> <a href="index.html">Carrot</a>, All rights reserved.</p>
            </div>
        </div>
    </footer>

    <!-- Tab to top -->
    <a href="#Top" class="back-to-top result-placeholder">
        <i class="ri-arrow-up-line"></i>
        <div class="back-to-top-wrap">
            <svg viewBox="-1 -1 102 102">
                <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
            </svg>
        </div>
    </a>

    <!-- Model -->
    @foreach ($products as $value)
        <div class="modal fade quickview-modal" id="quickview{{ $value->id }}" aria-hidden="true"
            tabindex="-1">
            <div class="modal-dialog modal-dialog-centered cr-modal-dialog">
                <div class="modal-content">
                    <button type="button" class="cr-close-model btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                    <div class="modal-body">
                        <form action="{{ route('addToCart', $value->id) }}" method="get">
                            @csrf
                            <div class="row">
                                <div class="col-md-5 col-sm-12 col-xs-12">
                                    <div class="zoom-image-hover modal-border-image">
                                        <img src="{{ asset('storage/images/' . $value->image) }}" alt="product-tab-2"
                                            class="product-image">
                                    </div>
                                </div>
                                <div class="col-md-7 col-sm-12 col-xs-12">
                                    <div class="cr-size-and-weight-contain">
                                        <h2 class="heading">{{ $value->name }}{{ $value->id }}</h2>
                                        <p class="description"></p>
                                    </div>
                                    <div class="cr-size-and-weight">
                                        <div class="cr-review-star">
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
                                            </div>
                                            <p>( {{ $value->ratings->count() }} Review )</p>
                                        </div>

                                        <div class="cr-product-price">
                                            <span
                                                class="new-price sale-price">{{ number_format($value->variants->first()->sale_price, 0, ',', '.') }}đ</span>
                                            <span
                                                class="old-price product-price">{{ number_format($value->variants->first()->price, 0, ',', '.') }}đ</span>
                                        </div>
                                        <div class="cr-size-weight">
                                            <h5><span>Size</span>/<span>Weight</span> :</h5>
                                            <div class="cr-kg">
                                                <ul>
                                                    @foreach ($value->variants as $key => $items)
                                                        <li class="variant-size "
                                                            data-variant-id="{{ $items->id }}"
                                                            data-price="{{ $items->price }}"
                                                            data-sale-price="{{ $items->sale_price }}"
                                                            onclick="handleSizeSelection(this)">
                                                            {{ $items->size }}
                                                        </li>
                                                    @endforeach
                                                </ul>
                                                <input type="hidden" id="selected-variant-id" name="variant_id"
                                                    value="{{ $value->variants->first()->id }}"
                                                    data-product-id="{{ $value->id }}">
                                            </div>
                                        </div>
                                        <div class="cr-add-card">
                                            <div class="cr-qty-main">
                                                <input type="text" name="quantity" placeholder="." value="1"
                                                    minlength="1" maxlength="20" class="quantity">
                                                <button type="button" class="plus plussss">+</button>
                                                <button type="button" class="minus minusss">-</button>
                                            </div>
                                            <div class="cr-add-button">
                                                <button type="submit" class=" cr-button cr-shopping-bag">Add to
                                                    cart</button>
                                            </div>
                                            <div class="cr-card-icon">
                                                <a href="javascript:void(0)" class="wishlist">
                                                    <i class="ri-heart-line"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        </div>
    @endforeach
    <!-- Cart -->
    <div class="cr-cart-overlay"></div>
    <div class="cr-cart-view">
        <div class="cr-cart-inner">
            <div class="cr-cart-top">
                <div class="cr-cart-title">
                    <h6>My Cart</h6>
                    <button type="button" class="close-cart">×</button>
                </div>
                <!-- resources/views/cart/index.blade.php -->

                <ul class="crcart-pro-items">
                    @foreach ($carts as $value)
                        <li data-cart-id="{{ $value->id }}">
                            <a href="product-left-sidebar.html" class="crside_pro_img">
                                <img src="{{ asset('storage/images/' . $value->products->image) }}" alt="product-1">
                            </a>
                            <div class="cr-pro-content">
                                <a href="product-left-sidebar.html"
                                    class="cart_pro_title">{{ $value->products->name }}</a>
                                <div class="d-flex align-items-center justify-content-between">
                                    <div>
                                        <span class="cart-price">
                                            <span
                                                id="price">{{ number_format($value->variants->sale_price, 0, ',', '.') }}đ</span>
                                            x <span id="quantityDisplay">{{ $value->quantity }}</span>
                                        </span>
                                    </div>
                                    <div>
                                        <p class="fw-bold pt-2 text-danger">
                                            <span
                                                id="toTal">{{ number_format($value->variants->sale_price * $value->quantity, 0, ',', '.') }}đ</span>
                                        </p>
                                    </div>
                                </div>
                                <div class="cr-cart-qty">
                                    <div class="cart-qty-plus-minus">
                                        <button type="button" class="btnPlus plus">+</button>
                                        <input type="text" value="{{ $value->quantity }}" id="quantityDisplay"
                                            class="quantity">
                                        <button type="button" class="btnMinus minus">-</button>
                                    </div>
                                </div>
                                <a href="{{ route('deleteCart', $value->id) }}" class="remove btnDelete"
                                    data-cart-id="{{ $value->id }}">×</a>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="cr-cart-bottom">
                <div class="cart-sub-total">
                    <table class="table cart-table">
                        @isset($value)
                            <tbody>
                                <tr>
                                    <td class="text-left">Sub-Total :</td>

                                    <td class="text-right subTotal">
                                        {{ number_format($value->TotalPrice, 0, ',', '.') }}đ
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-left">Sale :</td>
                                    <td class="text-right">0 đ</td>
                                </tr>
                                <tr>
                                    <td class="text-left">Total :</td>
                                    <td class="text-right primary-color"> {{ number_format($value->TotalPrice, 0, ',', '.') }}đ</td>
                                </tr>
                            </tbody>
                        @endisset

                    </table>
                </div>
                <div class="cart_btn">
                    <a href="{{ route('cart') }}" class="cr-button">View Cart</a>
                    <a href="{{ route('checkout') }}" class="cr-btn-secondary">Checkout</a>
            </div>
        </div>
    </div>

    <!-- Side-tool -->
    <div class="cr-tool-overlay"></div>
    {{-- <div class="cr-tool">
        <div class="cr-tool-btn">
            <a href="javascript:void(0)" class="btn-cr-tool result-placeholder">
                <i class="ri-settings-line"></i>
            </a>
            <div class="color-variant">
                <div class="cr-bar-title">
                    <h6>Tools</h6>
                    <a href="javascript:void(0)" class="close-tools">
                        <i class="ri-close-line"></i>
                    </a>
                </div>
                <div class="cr-tools-detail">
                    <div class="heading">
                        <h2>Select Color</h2>
                    </div>
                    <ul class="cr-color">
                        <li class="colors c1 active-colors">
                        </li>
                        <li class="colors c2">
                        </li>
                        <li class="colors c3">
                        </li>
                        <li class="colors c4">
                        </li>
                        <li class="colors c5">
                        </li>
                        <li class="colors c6">
                        </li>
                        <li class="colors c7">
                        </li>
                        <li class="colors c8">
                        </li>
                        <li class="colors c9">
                        </li>
                        <li class="colors c10">
                        </li>
                    </ul>
                </div>
                <div class="cr-tools-detail">
                    <div class="heading">
                        <h2>Dark mode</h2>
                    </div>
                    <ul class="dark-mode">
                        <li class="dark">
                        </li>
                        <li class="white active-dark-mode">
                        </li>
                    </ul>
                </div>
                <div class="cr-tools-detail">
                    <div class="heading">
                        <h2>Backgrounds</h2>
                    </div>
                    <ul class="bg-panel">
                        <li class="bg-1">
                            <img src="{{asset('assets')}}/img/shape/bg-shape-1.png" alt="bg-shape-1">
                        </li>
                        <li class="bg-2">
                            <img src="{{asset('assets')}}/img/shape/bg-shape-2.png" alt="bg-shape-2">
                        </li>
                        <li class="bg-3">
                            <img src="{{asset('assets')}}/img/shape/bg-shape-3.png" alt="bg-shape-3">
                        </li>
                        <li class="bg-4">
                            <img src="{{asset('assets')}}/img/shape/bg-shape-4.png" alt="bg-shape-4">
                        </li>
                        <li class="bg-5">
                            <img src="{{asset('assets')}}/img/shape/bg-shape-5.png" alt="bg-shape-5">
                        </li>
                        <li class="bg-6 active-bg-panel">
                            <img src="{{asset('assets')}}/img/shape/bg-shape-6.png" alt="bg-shape-6">
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div> --}}

    <!-- Vendor Custom -->
    <script src="{{ asset('assets') }}/js/vendor/jquery-3.6.4.min.js"></script>
    <script src="{{ asset('assets') }}/js/vendor/jquery.zoom.min.js"></script>
    <script src="{{ asset('assets') }}/js/vendor/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('assets') }}/js/vendor/mixitup.min.js"></script>

    <script src="{{ asset('assets') }}/js/vendor/range-slider.js"></script>
    <script src="{{ asset('assets') }}/js/vendor/aos.min.js"></script>
    <script src="{{ asset('assets') }}/js/vendor/swiper-bundle.min.js"></script>
    <script src="{{ asset('assets') }}/js/vendor/slick.min.js"></script>
    @yield('script')
    <!-- Main Custom -->
    <script src="{{ asset('assets') }}/js/main.js"></script>
    <script src="{{ asset('assets') }}/js/filter.js"></script>
    <script src="{{ asset('assets') }}/js/cart.js"></script>
    <script src="{{ asset('assets') }}/js/search.js"></script>
    <script src="{{ asset('assets') }}/js/variants.js"></script>
    <script src="{{ asset('assets') }}/js/modal.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script>var updateCartRoute = '{{ route('updateCart') }}';</script>
    <script> var filterByCategoryRoute = "{{ route('filterByCategory', ['id' => ':categoryId']) }}";</script>
    <script>var comment = "{{ route('comment', ['id' => ':product_id']) }}";</script>
    <script> var assetUrl = "{{ asset('storage/images') }}";</script>
    <script src="https://esgoo.net/scripts/jquery.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
</body>


<!-- Mirrored from maraviyainfotech.com/projects/carrot/carrot-v2/carrot-html/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 04 Jun 2024 17:46:40 GMT -->

</html>
