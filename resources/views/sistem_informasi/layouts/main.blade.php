<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width initial-scale=1.0">
    <title>Sistem Informasi Penjadwalan Keberangkatan dan Kedatangan Terminal</title>
    <!-- GLOBAL MAINLY STYLES-->
    <link href="{{ asset('assets/vendors/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/vendors/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/vendors/themify-icons/css/themify-icons.css') }}" rel="stylesheet" />
    <!-- PLUGINS STYLES-->
    <link href="{{ asset('assets/vendors/jvectormap/jquery-jvectormap-2.0.3.css') }}" rel="stylesheet" />
    <!-- THEME STYLES-->
    <link href="{{ asset('assets/css/main.min.css') }}" rel="stylesheet" />
    <!-- SWEETALERT2 -->
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.32/dist/sweetalert2.min.css" rel="stylesheet" />

    <!-- JQUERY - LANGSUNG DARI CDN UNTUK MEMASTIKAN LOADED -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <!-- PAGE LEVEL STYLES-->
</head>

<body class="fixed-navbar">
    <!-- START HEADER-->
    @include('sistem_informasi.partials.header')

    <!-- START SIDEBAR -->
    @include('sistem_informasi.partials.sidebar')

    <!-- CONTENT -->
    @yield('content')

    <!-- CORE PLUGINS (jQuery sudah dimuat di head) -->
    <script src="{{ asset('assets/vendors/popper.js/dist/umd/popper.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/vendors/bootstrap/dist/js/bootstrap.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/vendors/metisMenu/dist/metisMenu.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/vendors/jquery-slimscroll/jquery.slimscroll.min.js') }}" type="text/javascript"></script>
    <!-- PAGE LEVEL PLUGINS-->
    <script src="{{ asset('assets/vendors/chart.js/dist/Chart.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/vendors/jvectormap/jquery-jvectormap-2.0.3.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/vendors/jvectormap/jquery-jvectormap-us-aea-en.js') }}" type="text/javascript"></script>
    <!-- CORE SCRIPTS-->
    <script src="{{ asset('assets/js/app.min.js') }}" type="text/javascript"></script>
    <!-- SWEETALERT2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.32/dist/sweetalert2.all.min.js"></script>
    <!-- PAGE LEVEL SCRIPTS-->
    <script src="{{ asset('assets/js/scripts/dashboard_1_demo.js') }}" type="text/javascript"></script>

    <!-- PAGE SPECIFIC SCRIPTS -->
    @stack('scripts')
</body>

</html>