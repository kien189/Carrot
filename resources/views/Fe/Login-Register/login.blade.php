@extends('Fe.layout.master')
{{-- @extends('Admin.Login.index') --}}
@section('main_fe')
    <base href="/">
    <!-- Breadcrumb -->
    <section class="section-breadcrumb">
        <div class="cr-breadcrumb-image">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="cr-breadcrumb-title">
                            <h2>Login</h2>
                            <span> <a href="index.html">Home</a> - Login</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Login -->
    <section class="section-login padding-tb-100">
        <div class="container">
            <div class="row d-none">
                <div class="col-lg-12">
                    <div class="mb-30" data-aos="fade-up" data-aos-duration="2000" data-aos-delay="400">
                        <div class="cr-banner">
                            <h2>Login</h2>
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
                    <div class="cr-login hero-container" data-aos="fade-up" data-aos-duration="2000" data-aos-delay="400">
                        <div class="form-logo">
                            <img src="assets/img/logo/logo.png" alt="logo">
                        </div>
                        <form action="" method="POST" class="cr-content-form ">
                            @csrf
                            <div class="form-group">
                                <label>Email *</label>
                                <input type="email" placeholder="Nhập email" class="cr-form-control" name="email">
                                @error('email')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Password*</label>
                                <input type="password" placeholder="Nhập mật khẩu " class="cr-form-control" name="password">
                                @error('password')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            @if ($message = Session::get('success'))
                                <p class="text-success">{{ $message }}</p>
                            @endif
                            @if ($message = Session::get('error'))
                                <p class="text-danger">{{ $message }}</p>
                            @endif
                            <div class="remember">
                                <span class="form-group custom">
                                    <input type="checkbox" name="remember" id="html">
                                    <label for="html">Ghi nhớ đăng nhập </label>
                                </span>
                                <a class="link" href="{{ route('forgotPassword') }}">Quên mật khẩu?</a>
                            </div><br>
                            <div class="login-buttons ">
                                <button type="submit" class="cr-button w-100">Đăng nhập</button>
                                {{-- <a href="{{ route('register') }}" class="link">
                                    Đăng ký ?
                                </a> --}}
                            </div>
                            <div class="container">
                                <div class="division-lines text-center pt-4 pb-4">
                                    <p>or login with</p>
                                </div>
                                <div class="login-with-btns d-flex align-item-center justify-content-around">
                                    <a href="{{ route('auth.google') }}" type="button" class="google"
                                        style="justify-content: space-around">
                                        <i class="ri-google-fill"></i>
                                    </a>
                                    <a href="{{ route('facebook') }}" type="button" class="facebook">
                                        <i class="ri-facebook-fill"></i>
                                    </a>
                                    <a href="#" type="button" class="twitter">
                                        <i class="ri-twitter-fill"></i>
                                    </a>
                                    <a href="#" type="button" class="linkedin">
                                        <i class="ri-linkedin-fill"></i>
                                    </a>
                                </div>
                                <div class="text-center mt-3">
                                    <p>Không phải là thành viên? <a href="{{ route('register') }}">Đăng ký</a></p>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
