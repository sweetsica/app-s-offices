<!doctype html>
<html lang="{{ app()->getLocale() ? app()->getLocale() : vn }}">


<head>
    <title>Web S-Office</title>
    <meta charset="UTF-8">
    <meta name="description" content="W S-Office">
    <meta name="keywords" content="HTML5, CSS3, JavaScript">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    @include('Layout.partials.head-css')
    @yield('content-css')
</head>

<body>
    <!-- Begin page -->
    <div id="layout-wrapper">

        @include('Layout.partials.menu')
        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="d-flex justify-content-center align-items-center vh-100 bg-white">
            <div class="spinner-border" role="status" id="loading">
                <span class="visually-hidden">Loading...</span>
            </div>
        </div>

        <div class="main-content d-none" id="contents">

            <div class="page-content">
                <div class="container-fluid">
                    @yield('content')
                </div> <!-- container-fluid -->
            </div>
            <!-- End Page-content -->


            @include('Layout.partials.footer')
        </div>
        <!-- end main content-->

    </div>

    <!-- END layout-wrapper -->

    @include('Layout.partials.right-sidebar')

    @include('Layout.partials.vendor-scripts')
    @include('Layout.partials.plugin-js')



    <!-- App js -->
    <script src="{{ asset('assets/js/app.js') }}"></script>

    {{-- Custom js --}}
    <script src="{{ asset('assets/js/custom.js') }}"></script>
    <script src="{{ asset('assets/js/Loading.js') }}"></script>


    @yield('content-js')
    <script>
        var isSuccess = @json(session('success'));
        var isError = @json(session('error'));

        if (isSuccess && isSuccess != null) {
            Toastify({
                text: isSuccess,
                duration: 3000,
                close: true,
                gravity: 'top',
                position: 'right',
                stopOnFocus: true,
                backgroundColor: "#34c38f"
            }).showToast();
        }

        if (isError && isError != null) {
            Toastify({
                text: isError,
                duration: 3000,
                close: true,
                gravity: 'top',
                position: 'right',
                stopOnFocus: true,
                backgroundColor: "#f46a6a"
            }).showToast();
        }
    </script>
</body>

</html>
