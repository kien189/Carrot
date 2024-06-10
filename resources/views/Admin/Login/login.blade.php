@extends('Admin.Login.index')
@section('loginAdmin')
    <base href="/">
    <main class="wrapper sb-default">
        <section class="auth-section anim">
            <div class="cr-login-page">
                <div class="container-fluid no-gutters">
                    <div class="row">
                        <div class="offset-lg-6 col-lg-6">
                            <div class="content-detail">
                                <div class="main-info">
                                    <div class="hero-container">
                                        <!-- Login form -->
                                        <form action="" class="login-form" method="post">
                                            @csrf
                                            <div class="imgcontainer">
                                                <a><img src="{{ asset('assets_ad') }}/img/logo/full-logo.png" alt="logo"
                                                        class="logo"></a>
                                            </div>
                                            <div class="input-control">
                                                <input type="text" placeholder="Nhập tên " name="login" required autofocus>
                                                @error('name')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                                <span class="password-field-show">
                                                    <input type="password" placeholder="Nhập mật khẩu " name="password"
                                                        class="password-field" value="" required>
                                                    @error('password')
                                                        <small class="text-danger">{{ $message }}</small>
                                                    @enderror
                                                    <span data-toggle=".password-field"
                                                        class="fa fa-fw fa-eye field-icon toggle-password"></span>
                                                </span>
                                                <label class="label-container">Ghi nhớ đăng nhập
                                                    <input type="checkbox" name="remember">
                                                    <span class="checkmark"></span>
                                                </label>
                                                <span class="psw"><a href="forgot.html" class="forgot-btn">Quên mật
                                                        khẩu?</a></span>
                                                <div class="login-btns">
                                                    <button type="submit">Login</button>
                                                </div>
                                                <div class="division-lines">
                                                    <p>or login with</p>
                                                </div>
                                                <div class="login-with-btns">
                                                    <button type="button" class="google">
                                                        <i class="ri-google-fill"></i>
                                                    </button>
                                                    <button type="button" class="facebook">
                                                        <i class="ri-facebook-fill"></i>
                                                    </button>
                                                    <button type="button" class="twitter">
                                                        <i class="ri-twitter-fill"></i>
                                                    </button>
                                                    <button type="button" class="linkedin">
                                                        <i class="ri-linkedin-fill"></i>
                                                    </button>
                                                    <span class="already-acc">Not a member? <a href="signup.html"
                                                            class="signup-btn">Sign up</a></span>
                                                </div>
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
    </main>
@endsection
