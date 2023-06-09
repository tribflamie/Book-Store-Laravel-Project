@extends('layouts.layout-login')

@section('content')
    <!--=== page-title-section start ===-->
    <section class="title-hero-bg login-cover-bg" data-stellar-background-ratio="0.2">
        <div class="table-display">
            <div class="login v-align text-center">
                <div class="signup-box">
                    <ul id="signup-tabs" class="nav nav-tabs">
                        <li class="active"><a data-toggle="tab" href="#login">Login</a></li>
                    </ul>
                    <div id="signup-content" class="tab-content">
                        <div id="login" class="tab-pane fade in active">
                            <!--=== Form ===-->
                            <form method="post" action="{{ route('login') }}" class="form login_type text-center">
                                @csrf

                                <!--=== Username (Email) ===-->
                                <div class="form-group">
                                    <input id="email" type="email" placeholder="Email" name="email"
                                        class="form-control mb-20 @error('email') is-invalid @enderror"
                                        value="{{ old('email') }}" required autocomplete="email" autofocus>
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <!--=== Password ===-->
                                <div class="form-group">
                                    <input id="password" type="password" placeholder="Password"
                                        class="form-control mb-20 @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="current-password">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <!--=== Remember-Forgot ===-->
                                <div class="remember-forgot mb-20">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                                        {{ __('Remember Me') }}
                                    </label>
                                    <a href="{{ route('password.request') }}">
                                        <strong>{{ __('Forgot Password?') }}</strong>
                                    </a>
                                </div>
                                <!--=== Submit ===-->
                                <button type="submit" class="btn btn-color btn-circle full-width">
                                    {{ __('Login') }}
                                </button>
                            </form>
                            <!--=== End Form ===-->
                            <a href="{{ route('register') }}">
                                <h5 class="mt-20 gray-light">Don't have an account? <strong>Register</strong></h5>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--=== page-title-section end ===-->
@endsection
