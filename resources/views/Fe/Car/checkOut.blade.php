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
                            <h2>Checkout</h2>
                            <span> <a href="index.html">Home</a> - Checkout</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @if (session()->has('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    @if (session()->has('coupon'))
        <div class="alert alert-success">
            Coupon applied successfully: {{ session('coupon')->coupon_condition }} - Discount:
            {{ session('coupon')->coupon_number }}đ
        </div>
    @endif
    <!-- Checkout section -->
    <section class="cr-checkout-section padding-tb-100">
        <div class="container">
            <div class="row">
                <!-- Sidebar Area Start -->
                <div class="cr-checkout-rightside col-lg-4 col-md-12">
                    <div class="cr-sidebar-wrap">
                        <!-- Sidebar Summary Block -->
                        <div class="cr-sidebar-block">
                            <div class="cr-sb-title">
                                <h3 class="cr-sidebar-title">Summary</h3>
                            </div>
                            <div class="cr-sb-block-content">
                                <div class="cr-checkout-summary">
                                    <div>
                                        <span class="text-left">Tổng phụ</span>
                                        <span class="text-right"> {{ number_format($totalPrice, 0, ',', '.') }}đ</span>
                                    </div>

                                    {{-- Hiển thị các mã giảm giá --}}
                                    {{-- Hiển thị các mã giảm giá --}}
                                    {{-- Hiển thị các mã giảm giá --}}
                                    @if (Session::has('coupons'))
                                        @foreach (Session::get('coupons') as $coupon)
                                            @if ($coupon->coupon_condition == 1)
                                                <div>
                                                    <span class="text-left">Giảm giá</span>
                                                    <span name="coupon"
                                                        class="text-right">-{{ number_format($totalPrice / $coupon->coupon_number) }}đ</span>
                                                </div>
                                            @elseif ($coupon->coupon_condition == 2)
                                                <div>
                                                    <span class="text-left">Giảm giá</span>
                                                    <span name="coupon"
                                                        class="text-right">-{{ number_format($coupon->coupon_number) }}đ</span>
                                                </div>
                                            @endif
                                        @endforeach
                                    @else
                                        <div>
                                            <span class="text-left">Giảm giá</span>
                                            <span class="text-right">-0đ</span>
                                        </div>
                                    @endif
                                    @if ($errors->has('coupon'))
                                        <div class="text-danger">{{ $errors->first('coupon') }}</div>
                                    @endif
                                    @if (session('success'))
                                        <p class="text-success">{{ session('success') }}</p>
                                    @endif
                                    {{-- Hiển thị tổng tiền --}}
                                    <div class="cr-checkout-summary-total">
                                        <span class="text-left">Tổng tiền</span>
                                        @php
                                            $finalTotal = $totalPrice; // Giá trị ban đầu là tổng giá trị của đơn hàng

                                            // Duyệt qua các mã giảm giá đã áp dụng
                                            if (Session::has('coupons')) {
                                                foreach (Session::get('coupons') as $coupon) {
                                                    if ($coupon->coupon_condition == 1) {
                                                        $finalTotal -= $totalPrice / $coupon->coupon_number;
                                                    } elseif ($coupon->coupon_condition == 2) {
                                                        $finalTotal -= $coupon->coupon_number;
                                                    }
                                                }
                                            }
                                        @endphp

                                        <span class="text-right">{{ number_format($finalTotal, 0, ',', '.') }}đ</span>
                                    </div>



                                </div>
                                <div class="cr-checkout-pro">
                                    @foreach ($cart as $value)
                                        <div class="col-sm-12 mb-6">
                                            <div class="cr-product-inner">
                                                <div class="cr-pro-image-outer">
                                                    <div class="cr-pro-image">
                                                        <a href="{{ route('detail', ['category' => $pro->category->parent->slug, 'slug' => $value->products->slug]) }}"
                                                            class="image">
                                                            <img class="main-image"
                                                                src="{{ asset('storage/images/' . $value->products->image) }}"
                                                                alt="Product">
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="cr-pro-content cr-product-details">
                                                    <h5 class="cr-pro-title"><a
                                                            href="product-left-sidebar.html">{{ $value->products->name }}</a>
                                                    </h5>
                                                    <p class="cr-price">
                                                        <span
                                                            class="new-price">{{ number_format($value->variants->sale_price) }}đ</span>
                                                        <span class="fw-bold ">x {{ $value->quantity }}</span>
                                                        <span
                                                            class="float-end fw-bold text-danger me-2">{{ number_format($value->variants->sale_price * $value->quantity) }}đ</span>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <!-- Sidebar Summary Block -->
                    </div>
                    <div class="cr-sidebar-wrap cr-checkout-del-wrap">
                        <!-- Sidebar Summary Block -->
                        <div class="cr-sidebar-block">
                            <div class="cr-sb-title">
                                <h3 class="cr-sidebar-title">Delivery Method</h3>
                            </div>
                            <div class="cr-sb-block-content">
                                <div class="cr-checkout-del">
                                    <div class="cr-del-desc">Please select the preferred shipping method to use on this
                                        order.</div>
                                    <form action="#">
                                        <span class="cr-del-option">
                                            <span>
                                                <span class="cr-del-opt-head">Free Shipping</span>
                                                <input type="radio" id="del1" name="radio-group-delivery"
                                                    value="1" checked>
                                                <label for="del1">Rate - $0 .00</label>
                                            </span>
                                            <span>
                                                <span class="cr-del-opt-head">Flat Rate</span>
                                                <input type="radio" id="del2" name="radio-group-delivery"
                                                    value="2">
                                                <label for="del2">Rate - $5.00</label>
                                            </span>
                                        </span>
                                        <span class="cr-del-commemt">
                                            <span class="cr-del-opt-head">Add Comments About Your Order</span>
                                            <textarea name="your-commemt" placeholder="Comments"></textarea>
                                        </span>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- Sidebar Summary Block -->
                    </div>
                    <div class="cr-sidebar-wrap cr-checkout-pay-wrap">
                        <!-- Sidebar Payment Block -->
                        <div class="cr-sidebar-block">
                            <div class="cr-sb-title">
                                <h3 class="cr-sidebar-title">Payment Method</h3>
                            </div>
                            <div class="cr-sb-block-content">
                                <div class="cr-checkout-pay">
                                    <div class="cr-pay-desc">Please select the preferred payment method to use on this
                                        order.</div>
                                    <form action="#" class="payment-options">
                                        <span class="cr-pay-option">
                                            <span>
                                                <input type="radio" id="pay1" name="radio-groups" value="1"
                                                    checked>
                                                <label for="pay1">Cash On Delivery</label>
                                            </span>
                                        </span>
                                        <span class="cr-pay-option">
                                            <span>
                                                <input type="radio" id="pay2" name="radio-groups" value="2">
                                                <label for="pay2">UPI</label>
                                            </span>
                                        </span>
                                        <span class="cr-pay-option">
                                            <span>
                                                <input type="radio" id="pay3" name="radio-groups" value="3">
                                                <label for="pay3">Bank Transfer</label>
                                            </span>
                                        </span>
                                        <span class="cr-pay-option">
                                            <span>
                                                <input type="radio" id="pay4" name="radio-groups" value="4">
                                                <label for="pay4">Thanh toán bằng VnPay</label>
                                            </span>
                                        </span>
                                    </form>

                                    <div id="order-form">
                                        <!-- Thông tin đơn hàng -->
                                        <form action="{{ route('vnPay_Payment') }}" id="vnpay-form" method="POST"
                                            class="hidden">
                                            @csrf
                                            <div hidden>
                                                <input type="hidden" name="customer_id"
                                                    value="{{ auth('customers')->user()->id }}">
                                                <span class="cr-bill-wrap cr-bill-half">
                                                    <label>First Name*</label>
                                                    <input type="text" name="name"
                                                        placeholder="Enter your first name" required
                                                        value="{{ $account->name }}">
                                                </span>
                                                <span class="cr-bill-wrap cr-bill-half">
                                                    <label>Phone*</label>
                                                    <input type="text" name="phone"
                                                        placeholder="Enter your last name" required
                                                        value="{{ $account->phone }}">
                                                </span>
                                                <span class="cr-bill-wrap">
                                                    <label>Address*</label>
                                                    <input type="text" name="address" placeholder="Address Line 1"
                                                        value="{{ $account->address }}">
                                                </span>
                                                <span class="cr-bill-wrap">
                                                    <label>Email*</label>
                                                    <input type="text" name="email" placeholder="Address Line 1"
                                                        value="{{ $account->email }}">
                                                </span>
                                                <span class="cr-bill-wrap mb-3">
                                                    <label>Note*</label>
                                                    <textarea name="note" id="" class="form-control" cols="30" rows="4"></textarea>
                                                </span>
                                                <span class="cr-bill-wrap cr-bill-half">
                                                    <label>City *</label>
                                                    <span class="cr-bl-select-inner">
                                                        <select name="cr_select_city" id="cr-select-city"
                                                            class="cr-bill-select">
                                                            <option selected disabled>City</option>
                                                            <option value="1">City 1</option>
                                                            <option value="2">City 2</option>
                                                            <option value="3">City 3</option>
                                                            <option value="4">City 4</option>
                                                            <option value="5">City 5</option>
                                                        </select>
                                                    </span>
                                                </span>
                                            </div>
                                            <input type="hidden" name="payment_id" id="payment_id">
                                                <input type="hidden" name="delivery_id" id="delivery_id">
                                            <input type="hidden" name="totalPrice"
                                                value="{{ Session::get('coupons') ? $finalTotal : $totalPrice }}">
                                            <button hidden type="submit" name="redirect" id="vnpays-form"
                                                class="btn btn-success">Thanh
                                                toán
                                                bằng vnPay</button>
                                        </form>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- Sidebar Payment Block -->
                    </div>
                    <div class="cr-sidebar-wrap cr-check-pay-img-wrap">
                        <!-- Sidebar Payment Block -->
                        <div class="cr-sidebar-block">
                            <div class="cr-sb-title">
                                <h3 class="cr-sidebar-title">Payment Method</h3>
                            </div>
                            <div class="cr-sb-block-content">
                                <div class="cr-check-pay-img-inner">
                                    <div class="cr-check-pay-img">
                                        <img src="assets/img/banner/payment.png" alt="payment">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Sidebar Payment Block -->
                    </div>
                </div>
                <div class="cr-checkout-leftside col-lg-8 col-md-12 m-t-991">
                    <!-- checkout content Start -->
                    <div class="cr-checkout-content">
                        <div class="cr-checkout-inner">
                            <div class="cr-checkout-wrap mb-30">
                                <div class="cr-checkout-block cr-check-new">
                                    <h3 class="cr-checkout-title">New Customer</h3>
                                    <div class="cr-check-block-content">

                                        <div class="cr-check-subtitle">Checkout Options</div>
                                        <form action="#">
                                            <span class="cr-new-option">
                                                <span>
                                                    <input type="radio" id="account1" name="radio-group" checked>
                                                    <label for="account1">Register Account</label>
                                                </span>
                                                <span>
                                                    <input type="radio" id="account2" name="radio-group">
                                                    <label for="account2">Guest Account</label>
                                                </span>
                                            </span>
                                        </form>
                                        <div class="cr-new-desc">By creating an account you will be able to shop
                                            faster,
                                            be up to date on an order's status, and keep track of the orders you have
                                            previously made.
                                        </div>
                                        <span>
                                            <button class="cr-button mt-30" type="submit">Continue</button>
                                        </span>
                                    </div>
                                </div>
                                <div class="cr-checkout-block cr-check-login">
                                    <h3 class="cr-checkout-title">Returning Customer</h3>
                                    <div class="cr-check-login-form">
                                        <form action="#" method="post">
                                            <span class="cr-check-login-wrap">
                                                <label>Email Address</label>
                                                <input type="text" name="name"
                                                    placeholder="Enter your email address" required>
                                            </span>
                                            <span class="cr-check-login-wrap">
                                                <label>Password</label>
                                                <input type="password" name="password" placeholder="Enter your password"
                                                    required>
                                            </span>

                                            <span class="cr-check-login-wrap cr-check-login-btn">
                                                <button class="cr-button mr-15" type="submit">Login</button>
                                                <a class="cr-check-login-fp" href="#">Forgot Password?</a>
                                            </span>
                                        </form>
                                    </div>
                                </div>

                            </div>
                            <div class="cr-checkout-wrap">
                                <div class="cr-checkout-block cr-check-bill">
                                    <h3 class="cr-checkout-title">Billing Details</h3>
                                    <div class="cr-bl-block-content">
                                        <div class="cr-check-bill-form mb-minus-24">
                                            <form id="cash" action="{{ route('cash') }}" method="post">
                                                @csrf
                                                <input type="hidden" name="customer_id"
                                                    value="{{ auth('customers')->user()->id }}">
                                                <span class="cr-bill-wrap cr-bill-half">
                                                    <label>First Name*</label>
                                                    <input type="text" name="name"
                                                        placeholder="Enter your first name" required
                                                        value="{{ $account->name }}">
                                                </span>
                                                <span class="cr-bill-wrap cr-bill-half">
                                                    <label>Phone*</label>
                                                    <input type="text" name="phone"
                                                        placeholder="Enter your last name" required
                                                        value="{{ $account->phone }}">
                                                </span>
                                                <span class="cr-bill-wrap">
                                                    <label>Address*</label>
                                                    <input type="text" name="address" placeholder="Address Line 1"
                                                        value="{{ $account->address }}">
                                                </span>
                                                <span class="cr-bill-wrap">
                                                    <label>Email*</label>
                                                    <input type="text" name="email" placeholder="Address Line 1"
                                                        value="{{ $account->email }}">
                                                </span>
                                                <span class="cr-bill-wrap mb-3">
                                                    <label>Note*</label>
                                                    <textarea name="note" id="" class="form-control" cols="30" rows="4"></textarea>
                                                </span>
                                                <input type="hidden" name="totalPrice"
                                                    value="{{ Session::get('coupons') ? $finalTotal : $totalPrice }}">
                                                <span class="cr-bill-wrap cr-bill-half">
                                                    <label>City *</label>
                                                    <span class="cr-bl-select-inner">
                                                        <select name="cr_select_city" id="cr-select-city"
                                                            class="cr-bill-select">
                                                            <option selected disabled>City</option>
                                                            <option value="1">City 1</option>
                                                            <option value="2">City 2</option>
                                                            <option value="3">City 3</option>
                                                            <option value="4">City 4</option>
                                                            <option value="5">City 5</option>
                                                        </select>
                                                    </span>
                                                </span>
                                                <span class="cr-bill-wrap cr-bill-half">
                                                    <label>Post Code</label>
                                                    <input type="text" placeholder="Post Code">
                                                </span>
                                                <span class="cr-bill-wrap cr-bill-half">
                                                    <label>Country *</label>
                                                    <span class="cr-bl-select-inner">
                                                        <select name="cr_select_country" id="cr-select-country"
                                                            class="cr-bill-select">
                                                            <option selected disabled>Country</option>
                                                            <option value="1">Country 1</option>
                                                            <option value="2">Country 2</option>
                                                            <option value="3">Country 3</option>
                                                            <option value="4">Country 4</option>
                                                            <option value="5">Country 5</option>
                                                        </select>
                                                    </span>
                                                </span>
                                                <span class="cr-bill-wrap cr-bill-half">
                                                    <label>Region State</label>
                                                    <span class="cr-bl-select-inner">
                                                        <select name="cr_select_state" id="cr-select-state"
                                                            class="cr-bill-select">
                                                            <option selected disabled>Region/State</option>
                                                            <option value="1">Region/State 1</option>
                                                            <option value="2">Region/State 2</option>
                                                            <option value="3">Region/State 3</option>
                                                            <option value="4">Region/State 4</option>
                                                            <option value="5">Region/State 5</option>
                                                        </select>
                                                    </span>
                                                </span>
                                                <input type="hidden" name="payment_id" id="payment_id">
                                                <input type="hidden" name="delivery_id" id="delivery_id">
                                                <!-- Input ẩn để lưu payment_id -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <span class="cr-check-order-btn">
                                <button type="button" class="cr-button mt-30" id="order-button">Place Order</button>
                            </span>
                            </form>
                        </div>
                    </div>
                    <!--cart content End -->
                </div>
            </div>
        </div>
    </section>
    <!-- Checkout section End -->
@endsection
@section('script')
    <script>
        document.getElementById('order-button').addEventListener('click', function() {
            // Lấy giá trị của radio button được chọn
            var selectedPayment = document.querySelector('input[name="radio-groups"]:checked');
            var selectedDelivery = document.querySelector('input[name="radio-group-delivery"]:checked');
            console.log(selectedDelivery);
            if (selectedPayment) {
                // Gán giá trị của radio button được chọn vào input ẩn
                var edd = document.getElementById('payment_id').value = selectedPayment.value;
                document.getElementById('delivery_id').value = selectedDelivery.value;
                // Kiểm tra nếu phương thức thanh toán là VNPay
                if (selectedPayment.id === 'pay4') {
                    document.getElementById('order-form').classList.add('hidden');
                    document.getElementById('vnpay-form').classList.remove('hidden');
                    document.getElementById('vnpay-form').click();
                    document.getElementById('vnpays-form').click();

                } else {
                    // Submit form cash nếu phương thức thanh toán khác VNPay
                    document.getElementById('cash').submit();
                }
            } else {
                alert('Please select a payment method');
            }
        });
    </script>
@endsection
