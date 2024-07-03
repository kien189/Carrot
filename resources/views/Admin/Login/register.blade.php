@extends('Admin.Login.index')
@section('loginAdmin')
    <base href="/">
    <main class="wrapper sb-default">
		<section class="auth-section anim">
			<div class="cr-login-page">
				<div class="container-fluid">
					<div class="row">
						<div class="offset-lg-6 col-lg-6">
							<div class="content-detail">
								<div class="main-info">
									<div class="hero-container">
										<!-- Signup form -->
										<form class="signup-form"  method="post">
                                            @csrf
											<div class="imgcontainer">
												<a href="index.html"><img src="{{ asset('assets_ad') }}/img/logo/full-logo.png" alt="logo" class="logo"></a>
											</div>
											<div class="input-control">
												<div class="row p-l-5 p-r-5">
													<div class="col-md-6 p-l-10 p-r-10">
														<input type="text" placeholder="Enter Username" name="uname"
															required>
													</div>
													<div class="col-md-6 p-l-10 p-r-10">
														<input type="email" placeholder="Enter Email" name="email"
															required>
													</div>
													<div class="col-md-6 p-l-10 p-r-10">
														<input type="password" placeholder="Enter Password" name="psw"
															class="input-checkmark" required>
													</div>
													<div class="col-md-6 p-l-10 p-r-10">
														<span class="password-field-show">
															<input class="password-field input-checkmark"
																type="password" placeholder="Re-enter Password"
																name="psw" required>
															<span data-toggle=".password-field"
																class="fa fa-fw fa-eye field-icon toggle-password"></span>
														</span>
													</div>
												</div>
												<label class="label-container">I agree with <a href="#"> privacy
														policy</a>
													<input type="checkbox">
													<span class="checkmark"></span>
												</label>
												<div class="login-btns">
													<button type="submit">Sign up</button>
												</div>
												<div class="division-lines">
													<p>or signup with</p>
												</div>
												<div class="login-with-btns">
													<a href="{{ route('auth.google') }}" type="submit" class="google">
														<i class="ri-google-fill"></i>
													</a>
													<button type="button" class="facebook">
														<i class="ri-facebook-fill"></i>
													</button>
													<button type="button" class="twitter">
														<i class="ri-twitter-fill"></i>
													</button>
													<button type="button" class="linkedin">
														<i class="ri-linkedin-fill"></i>
													</button>
													<span class="already-acc">Already you have an account? <a
															href="signin.html" class="login-btn">Login</a></span>
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
