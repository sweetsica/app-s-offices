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
        <div class="main-content">

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
    @yield('content-js')
    <!-- apexcharts -->
    <script src="{{ asset('assets/libs/apexcharts/apexcharts.min.js') }}"></script>

    <script src="{{ asset('assets/js/pages/dashboard.init.js') }}"></script>

    <!-- App js -->
    <script src="{{ asset('assets/js/app.js') }}"></script>

    {{-- Custom js --}}
    <script src="{{ asset('assets/js/custom.js') }}"></script>

</body>

</html>
