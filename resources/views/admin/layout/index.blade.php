<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets') }}/images/fav.png">
    <title>Home Leader Services</title>
    <link href="{{ asset('assets') }}/extra-libs/c3/c3.min.css" rel="stylesheet">
    <link href="{{ asset('assets') }}/libs/chartist/dist/chartist.min.css" rel="stylesheet">
    <link href="{{ asset('assets') }}/extra-libs/jvector/jquery-jvectormap-2.0.2.css" rel="stylesheet" />
    <link href="{{ asset('dist') }}/css/style.min.css" rel="stylesheet">
    @yield('css')
    <link href="{{ asset('css/my-style.css') }}" rel="stylesheet">

</head>

<body>
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <div id="main-wrapper" data-theme="light" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed" data-boxed-layout="full">
        <x-topbar />
        <aside class="left-sidebar" data-sidebarbg="skin6">
            <div class="scroll-sidebar" data-sidebarbg="skin6">
                <x-sidebar />
            </div>
        </aside>

        <div class="page-wrapper">
            @yield('content')
            <x-footer />
        </div>

    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="{{ asset('assets') }}/libs/jquery/dist/jquery.min.js"></script>
    <script src="{{ asset('assets') }}/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- apps -->
    <!-- apps -->
    <script src="{{ asset('dist') }}/js/app-style-switcher.js"></script>
    <script src="{{ asset('dist') }}/js/feather.min.js"></script>
    <script src="{{ asset('assets') }}/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
    <script src="{{ asset('dist') }}/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="{{ asset('dist') }}/js/custom.min.js"></script>
    <!--This page JavaScript -->
    <script src="{{ asset('assets') }}/extra-libs/c3/d3.min.js"></script>
    <script src="{{ asset('assets') }}/extra-libs/c3/c3.min.js"></script>
    <script src="{{ asset('assets') }}/libs/chartist/dist/chartist.min.js"></script>
    {{-- <script src="{{ asset('assets') }}/libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js"></script> --}}
    {{-- <script src="{{ asset('assets') }}/extra-libs/jvector/jquery-jvectormap-2.0.2.min.js"></script> --}}
    {{-- <script src="{{ asset('assets') }}/extra-libs/jvector/jquery-jvectormap-world-mill-en.js"></script> --}}
    {{-- <script src="{{ asset('dist') }}/js/pages/dashboards/dashboard1.min.js"></script> --}}
    @yield('js')
    <script src="{{ asset('js/ajax.js') }}"></script>
</body>

</html>
