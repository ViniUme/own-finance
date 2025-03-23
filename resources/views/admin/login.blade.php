@extends('admin.layouts.auth')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-xl-4 col-lg-5 col-md-7 mx-auto mt-5">
                <div class="card radius-10">
                    <div class="card-body p-4">
                        <div class="text-center">
                            <h4>Sign In</h4>
                            <p>Sign In to your account</p>
                        </div>
                        <form class="form-body row g-3">
                            <div class="col-12">
                                <label for="inputEmail" class="form-label">Email</label>
                                <input type="email" class="form-control" id="inputEmail">
                            </div>
                            <div class="col-12">
                                <label for="inputPassword" class="form-label">Password</label>
                                <input type="password" class="form-control" id="inputPassword">
                            </div>
                            <div class="col-12 col-lg-6">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckRemember">
                                    <label class="form-check-label" for="flexSwitchCheckRemember">Remember Me</label>
                                </div>
                            </div>
                            <div class="col-12 col-lg-6 text-end">
                                <a href="authentication-reset-password-simple.html">Forgot Password?</a>
                            </div>
                            <div class="col-12 col-lg-12">
                                <div class="d-grid">
                                    <button type="button" class="btn btn-primary">Sign In</button>
                                </div>
                            </div>
                            <div class="col-12 col-lg-12">
                                <div class="position-relative border-bottom my-3">
                                    <div class="position-absolute seperator translate-middle-y">or continue with</div>
                                </div>
                            </div>
                            <div class="col-12 col-lg-12">
                                <div class="social-login d-flex flex-row align-items-center justify-content-center gap-2 my-2">
                                    <a href="javascript:;" class=""><img src="assets/images/icons/facebook.png" alt=""></a>
                                    <a href="javascript:;" class=""><img src="assets/images/icons/apple-black-logo.png" alt=""></a>
                                    <a href="javascript:;" class=""><img src="assets/images/icons/google.png" alt=""></a>
                                </div>
                            </div>
                            <div class="col-12 col-lg-12 text-center">
                                <p class="mb-0">Don't have an account? <a href="authentication-sign-up-simple.html">Sign up</a></p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
