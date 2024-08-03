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
                            <h2>Forgot Password</h2>
                            <span> <a href="index.html">Home</a> - Forgot Password</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Forgot page -->
    <section class="section-login padding-tb-100">
        <div class="container">
            <div class="row d-none">
                <div class="col-lg-12">
                    <div class="mb-30" data-aos="fade-up" data-aos-duration="2000" data-aos-delay="400">
                        <div class="cr-banner">
                            <h2>Nhập OTP</h2>
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
                    <div class="cr-login" data-aos="fade-up" data-aos-duration="2000" data-aos-delay="400">
                        <div class="form-logo">
                            <img src="assets/img/logo/logo.png" alt="logo">
                        </div>
                        <form action="" method="POST" class="cr-content-form">
                            @csrf
                            <div class="form-group">
                                <label>Nhập mã OTP*</label>
                                <input type="text" placeholder="Nhập mã OTP XXXXXX" class="cr-form-control text-center"
                                    name="otp">
                                @error('otp')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                                @if ($message = Session::get('success'))
                                    <p>{{ $message }}</p>
                                @endif
                                @if ($message = Session::get('error'))
                                    <p>{{ $message }}</p>
                                @endif
                            </div>
                            <div class="login-buttons">
                                <button type="submit" class="cr-button text-center w-100">Gửi</button>
                                {{-- <a href="{{ route('login') }}" class="link">
                                    Đăng nhập?
                                </a> --}}
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
