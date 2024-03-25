<!doctype html>
<html lang="en">

<head>

    {{-- <?= $title_meta ?> --}}

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
                                <h5 class="text-primary">{{ __('Login.otp') }}</h5>
                            </div>
                            <div class="p-2 mt-4">
                                @if (session('error'))
                                    <div class="alert alert-danger">
                                        {{ session('error') }}
                                    </div>
                                @endif
                                <form action="{{ route('checkCode', $userId) }}" method="POST" autocomplete="off">
                                    @csrf
                                    <div class="mb-3">
                                        <label class="form-label" for="username">{{ __('Login.code') }}</label>
                                        <input type="text" class="form-control" id="username" name="code"
                                            placeholder="{{ __('Login.otp') }}">
                                    </div>
                                    <div class="mt-3 text-end">
                                        <button class="g-recaptcha btn btn-primary w-sm waves-effect waves-light"
                                            type="submit">{{ __('Login.confirm') }}</button>
                                    </div>
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
</body>

</html>
