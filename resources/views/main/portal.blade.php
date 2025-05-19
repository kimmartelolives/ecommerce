@include('partials.header')

        <main class="main">
            <nav aria-label="breadcrumb" class="breadcrumb-nav border-0 mb-0">
                <div class="container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">PC Bulacan Computer Store </a></li>
                        <li class="breadcrumb-item active" aria-current="page">Login</li>
                    </ol>
                </div><!-- End .container -->
            </nav><!-- End .breadcrumb-nav -->

   
                <div class="login-page bg-image pt-8 pb-8 pt-md-12 pb-md-12 pt-lg-17 pb-lg-17" style="background-image: url('new/images/background.png')">
            	<div class="container">
            	
                    <div class="form-box">
                        <div class="form-tab">
                            <ul class="nav nav-pills nav-fill nav-border-anim" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="signin-tab" data-toggle="tab" href="#signin" role="tab" aria-controls="signin" aria-selected="true">Sign In</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="register-tab" data-toggle="tab" href="#register" role="tab" aria-controls="register" aria-selected="false">Register</a>
                                </li>
                            </ul>
                            <div class="tab-content" id="tab-content-5">
                                <div class="tab-pane fade show active" id="signin" role="tabpanel" aria-labelledby="signin-tab">
                                    <form action="/login/process" method="POST">
                                        @csrf
                                        <div class="form-group">
                                            <label for="singin-email">Email Address</label>
                                            <input type="text" class="form-control" id="singin-email" name="email" required>
                                        </div><!-- End .form-group -->
                                        @error('email')
                                        <p class="text-red-500 text-xs p-1">
                                        {{$message}}
                                        </p>  
                                        @enderror
            
                                        <div class="form-group">
                                            <label for="singin-password">Password</label>
                                            <input type="password" class="form-control" id="singin-password" name="password" required>
                                        </div><!-- End .form-group -->
                                        @error('password')
                                        <p class="text-red-500 text-xs p-1">
                                        {{$message}}
                                        </p>  
                                        @enderror
            
                                        <div class="form-footer">
                                            <button type="submit" class="btn btn-outline-primary-2">
                                                <span>LOG IN</span>
                                                <i class="icon-long-arrow-right"></i>
                                            </button>
            
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" name="remember" class="custom-control-input" id="signin-remember">
                                                <label class="custom-control-label" for="signin-remember">Remember Me</label>
                                            </div><!-- End .custom-checkbox -->
            
                                            {{-- <a href="#" class="forgot-link">Forgot Your Password?</a> --}}
                                           <a href="{{ route('password.request') }}" class="forgot-link">Forgot Your Password?</a>


                                        </div><!-- End .form-footer -->
                                    </form>
            
                                </div><!-- .End .tab-pane -->
                                <div class="tab-pane fade" id="register" role="tabpanel" aria-labelledby="register-tab">
                                    <form action="/register" method="POST">
                                        @csrf
                                        <div class="form-group">
                                            <label for="register-email">Email address</label>
                                            <input type="email" class="form-control" id="register-email" name="email" required>
                                        </div><!-- End .form-group -->
                                        @error('email')
                                        <p class="text-red-500 text-xs p-1">
                                        {{$message}}
                                        </p>  
                                        @enderror
            
                                        <div class="form-group">
                                            <label for="register-password">Password</label>
                                            <input type="password" class="form-control" id="register-password" name="password" required>
                                        </div><!-- End .form-group -->
                                        @error('password')
                                        <p class="text-red-500 text-xs p-1">
                                        {{$message}}
                                        </p>  
                                        @enderror
            
                                        <div class="form-group">
                                            <label for="register-password">Confirm Password</label>
                                            <input type="password" class="form-control" id="register-password" name="password_confirmation" required>
                                        </div><!-- End .form-group -->
                                        @error('confirm_password')
                                        <p class="text-red-500 text-xs p-1">
                                        {{$message}}
                                        </p>  
                                        @enderror

                                        <div class="form-group">
                                            <input type="hidden" class="form-control" name="role" required value="2">
                                        </div><!-- End .form-group -->
            
                                        <div class="form-footer">
                                            <button type="submit" class="btn btn-outline-primary-2">
                                                <span>SIGN UP</span>
                                                <i class="icon-long-arrow-right"></i>
                                            </button>
            
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="register-policy" required>
                                                <label class="custom-control-label" for="register-policy">I agree to the <a href="#">privacy policy</a> *</label>
                                            </div><!-- End .custom-checkbox -->
                                        </div><!-- End .form-footer -->
                                    </form>
                 
                                </div><!-- .End .tab-pane -->
                            </div><!-- End .tab-content -->
                        </div><!-- End .form-tab -->
                    </div><!-- End .form-box -->

            	</div><!-- End .container -->
            </div><!-- End .login-page section-bg -->
        </main><!-- End .main -->

@include('partials.footer')