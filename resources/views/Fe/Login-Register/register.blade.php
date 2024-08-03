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
                            <h2>Register</h2>
                            <span> <a href="index.html">Home</a> - Register</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Register -->
    <section class="section-register padding-tb-100">
        <div class="container">
            <div class="row d-none">
                <div class="col-lg-12">
                    <div class="mb-30" data-aos="fade-up" data-aos-duration="2000" data-aos-delay="400">
                        <div class="cr-banner">
                            <h2>Register</h2>
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
                    <div class="cr-register" data-aos="fade-up" data-aos-duration="2000" data-aos-delay="400">
                        <div class="form-logo">
                            <img src="assets/img/logo/logo.png" alt="logo">
                        </div>
                        <form action="" method="POST" class="cr-content-form">
                            @csrf
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label>Ho và Tên *</label>
                                        <input type="text" placeholder="Họ và tên" class="cr-form-control"
                                            name="name">
                                        @error('name')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <label>Mật khẩu *</label>
                                        <input type="password" placeholder="Nhập mật khẩu" class="cr-form-control"
                                            name="password">
                                        @error('password')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <label>Xác nhận mật khẩu*</label>
                                        <input type="password" placeholder="Xác nhận mật khẩu" class="cr-form-control"
                                            name="confirmPassword">
                                        @error('confirmPassword')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <label>Email*</label>
                                        <input type="email" placeholder="Nhập email của bạn" class="cr-form-control"
                                            name="email">
                                        @error('email')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <label>Số điện thoại*</label>
                                        <input type="text" placeholder="Nhập số điện thoại của bạn"
                                            class="cr-form-control" name="phone">
                                        @error('phone')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                        @if ($message = Session::get('success'))
                                            <p class="text-success">{{ $message }}</p>
                                        @endif
                                        @if ($message = Session::get('error'))
                                            <p class="text-danger">{{ $message }}</p>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="form-group ">
                                        <label>Giới tính*</label>
                                        <div class=" pt-2 d-flex">
                                            <div class="me-5">
                                                <input type="radio" class="" name="gender" value="0"> Nam
                                            </div>
                                            <div>
                                                <input type="radio" class="" name="gender" value="1"> Nữ
                                            </div>
                                        </div>
                                        @error('gender')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label>Địa chỉ *</label>
                                        <input type="text" placeholder="Địa chỉ" class="cr-form-control" name="address">
                                        @error('address')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                {{-- <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <label>City*</label>
                                        <select class="cr-form-control" aria-label="Default select example">
                                            <option selected>City</option>
                                            <option value="1">One</option>
                                            <option value="2">Two</option>
                                            <option value="3">Three</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <label>Post Code</label>
                                        <input type="email" placeholder="Post Code" class="cr-form-control">
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <label>Country*</label>
                                        <select class="cr-form-control" aria-label="Default select example">
                                            <option selected>Country</option>
                                            <option value="1">One</option>
                                            <option value="2">Two</option>
                                            <option value="3">Three</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <label>Region State*</label>
                                        <select class="cr-form-control" aria-label="Default select example">
                                            <option selected>Region/State</option>
                                            <option value="1">One</option>
                                            <option value="2">Two</option>
                                            <option value="3">Three</option>
                                        </select>
                                    </div>
                                </div> --}}
                                <div class="cr-register-buttons">
                                    <button type="submit" class="cr-button">Đăng ký</button>
                                    <a href="{{ route('login') }}" class="link">
                                        Bạn đã có tài khoản ?
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
