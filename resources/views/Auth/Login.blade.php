<!doctype html>
<html lang="en">

<head>
    <title>Web S-Office</title>
    <meta charset="UTF-8">
    <meta name="description" content="W S-Office">
    <meta name="keywords" content="HTML5, CSS3, JavaScript">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- <link rel="shortcut icon" href="{{ asset('assets/images/favicon.png') }}"> --}}
    @include('Layout.partials.head-css')
</head>
{{-- <script src="https://www.google.com/recaptcha/api.js" async defer></script> --}}
<script src="https://www.google.com/recaptcha/api.js"></script>

<body class="authentication-bg">
    <div class="account-pages my-5 pt-sm-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-center">
                        <a href="" class="mb-5 d-block auth-logo">
                            <img src="{{ asset('assets/images/logo-master.png') }}" alt="" height="120"
                                class="logo logo-dark">
                            <img src="{{ asset('assets/images/logo-master.png') }}" alt="" height="120"
                                class="logo logo-light">
                        </a>
                    </div>
                </div>
            </div>
            <div class="row align-items-center justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <div class="card">

                        <div class="card-body p-4">
                            <div class="text-center mt-2">
                                <h5 class="text-primary">{{ __('Login.welcome') }}</h5>
                                <p class="text-muted">{{ __('Login.title_login') }}</p>
                            </div>
                            <div class="p-2 mt-4">
                                @if (session('loginError'))
                                    <div class="alert alert-danger">
                                        {{ session('loginError') }}
                                    </div>
                                @endif
                                @if (session('success'))
                                    <div class="alert alert-success">
                                        {{ session('success') }}
                                    </div>
                                @endif
                                <form action="{{ route('login') }}" method="POST" autocomplete="off" id="loginForm">
                                    @csrf

                                    <div class="mb-3">
                                        <label class="form-label" for="username">{{ __('Login.username') }}</label>
                                        <input type="text" class="form-control" id="username" name="username"
                                            placeholder="{{ __('Login.enter_username') }}">
                                    </div>

                                    <div class="mb-3">
                                        <div class="float-end">
                                            <a href="{{ route('Auth.formResetPassword') }}"
                                                class="text-muted">{{ __('Login.reset_password') }}</a>
                                        </div>
                                        <label class="form-label" for="userpassword">{{ __('Login.password') }}</label>
                                        <input type="password" class="form-control" id="userpassword"
                                            name="userpassword" placeholder="{{ __('Login.enter_password') }}">
                                    </div>
                                    <div class="mt-3 text-end">
                                        <button class="g-recaptcha btn btn-primary w-sm waves-effect waves-light"
                                            data-callback='onSubmit'
                                            data-sitekey="{{ config('services.recaptcha.site_key') }}">{{ __('Login.log_in') }}</button>
                                    </div>



                                    {{-- <div class="mt-4 text-center">
                                        <div class="signin-other-title">
                                            <h5 class="font-size-14 mb-3 title">Sign in with</h5>
                                        </div>


                                        <ul class="list-inline">
                                            <li class="list-inline-item">
                                                <a href="javascript:void()"
                                                    class="social-list-item bg-primary text-white border-primary">
                                                    <i class="mdi mdi-facebook"></i>
                                                </a>
                                            </li>
                                            <li class="list-inline-item">
                                                <a href="javascript:void()"
                                                    class="social-list-item bg-info text-white border-info">
                                                    <i class="mdi mdi-twitter"></i>
                                                </a>
                                            </li>
                                            <li class="list-inline-item">
                                                <a href="javascript:void()"
                                                    class="social-list-item bg-danger text-white border-danger">
                                                    <i class="mdi mdi-google"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div> --}}

                                    {{-- <div class="mt-4 text-center">
                                        <p class="mb-0">Don't have an account ? <a href="auth-register"
                                                class="fw-medium text-primary"> Signup now </a> </p>
                                    </div> --}}
                                </form>
                            </div>

                        </div>
                    </div>

                    <div class="mt-5 text-center">
                        <p>©
                            <script>
                                document.write(new Date().getFullYear())
                            </script> Powered by Steam
                        </p>
                    </div>

                </div>
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </div>

    @include('Layout.partials.vendor-scripts')
    <!-- App js
        <script src="assets/js/app.js"></script>-->
    <script>
        function onSubmit(token) {
            document.getElementById("loginForm").submit();
        }
    </script>

</body>

</html>
