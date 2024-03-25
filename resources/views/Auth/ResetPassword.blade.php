<!doctype html>
<html lang="en">

<head>
    <title>Web S-Office</title>
    <meta charset="UTF-8">
    <meta name="description" content="W S-Office">
    <meta name="keywords" content="HTML5, CSS3, JavaScript">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    @include('Layout.partials.head-css')
</head>

<body class="authentication-bg">
    <div class="account-pages my-5  pt-sm-5">
        <div class="container">
            <div class="row justify-content-center">

                <div class="col-md-8 col-lg-6 col-xl-5">
                    <div>

                        <a href="index" class="mb-5 d-block auth-logo">
                            <img src="{{ asset('assets/images/logo-master.png') }}" alt="" height="120"
                                class="logo logo-dark">
                            <img src="{{ asset('assets/images/logo-master.png') }}" alt="" height="120"
                                class="logo logo-light">
                        </a>
                        <div class="card">

                            <div class="card-body p-4">

                                <div class="text-center mt-2">
                                    <h5 class="text-primary">{{ __('Login.reset_password') }}</h5>
                                </div>
                                <div class="p-2 mt-4">
                                    <div class="alert alert-success text-center mb-4" role="alert">
                                        {{ __('Login.title_reset') }}
                                    </div>
                                    @if (session('error'))
                                        <div class="alert alert-danger">
                                            {{ session('error') }}
                                        </div>
                                    @endif
                                    <form action="{{ route('checkGmail') }}" method="POST" autocomplete="off">
                                        @csrf
                                        <div class="mb-3">
                                            <label class="form-label" for="useremail">{{ __('Login.username') }}</label>
                                            <input type="email" class="form-control"
                                                placeholder="{{ __('Login.enter_email') }}" name="gmail">
                                        </div>
                                        <div class="mt-3 text-end">
                                            <button class="btn btn-primary w-sm waves-effect waves-light"
                                                type="submit">{{ __('Login.reset') }}</button>
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
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </div>

    @include('Layout.partials.vendor-scripts')
</body>

</html>
