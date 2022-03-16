<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Vrent Car, Tempat Rental Mobil, Sewa Mobil">
    <meta name="author" content="Creative Tim">
    <title>Vrent Car</title>
    <!-- Favicon -->
    <link rel="icon" href="{{ asset('assets/img/brand/favicon.png') }}" type="image/png">
    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
    <!-- Icons -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/nucleo/css/nucleo.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/vendor/@fortawesome/fontawesome-free-6.0.0-web/css/all.min.css') }}" type="text/css">
    <!-- Page plugins -->
    <!-- Argon CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/argon.css?v=1.2.0') }}" type="text/css">
    
    <link rel="stylesheet" href="{{ asset('assets/ownplug/css/ownStyle.css') }}" type="text/css">

    <style type="text/css">
        @keyframes chartjs-render-animation {
            from {
                opacity: .99
            }

            to {
                opacity: 1
            }
        }

        .chartjs-render-monitor {
            animation: chartjs-render-animation 1ms
        }

        .chartjs-size-monitor,
        .chartjs-size-monitor-expand,
        .chartjs-size-monitor-shrink {
            position: absolute;
            direction: ltr;
            left: 0;
            top: 0;
            right: 0;
            bottom: 0;
            overflow: hidden;
            pointer-events: none;
            visibility: hidden;
            z-index: -1
        }

        .chartjs-size-monitor-expand>div {
            position: absolute;
            width: 1000000px;
            height: 1000000px;
            left: 0;
            top: 0
        }

        .chartjs-size-monitor-shrink>div {
            position: absolute;
            width: 200%;
            height: 200%;
            left: 0;
            top: 0
        }
    </style>
    
</head>


<body>
    <div id="allScreen" class="clear-fix w-100 h-100 bg-dark position-absolute bg-transparent d-none" style="z-index: 100;"></div>
    <!-- Sidenav -->
    @include('KaryawanPage.ZTemplate.sidebar')
    <!-- /Sidenav -->
    <!-- Main content -->
    <div class="main-content" id="panel">
        <!-- Topnav -->
        @include('KaryawanPage.ZTemplate.navbar')
        <!-- /Topnav -->
        <!-- Header -->
        @yield('header')
        <!-- /Header -->
        <!-- Page content -->
        @yield('content')
        <!-- /Page content -->
    </div>
    <!-- Argon Scripts -->
    <!-- Core -->
    <script src="{{ asset('assets/vendor/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/js-cookie/js.cookie.js') }}"></script>
    <script src="{{ asset('assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js') }}"></script>
    <!-- Optional JS -->
    <script src="{{ asset('assets/vendor/chart.js/dist/Chart.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/chart.js/dist/Chart.extension.js') }}"></script>
    <!-- Argon JS -->
    <script src="{{ asset('assets/js/argon.js?v=1.2.0') }}"></script>
    <!-- SweetAlert2 -->
    <script src="{{ asset('assets/ownplug/sweetalert2/SweetAlert2.js') }}"></script>
    <!-- DatePicker-->
    <script src="{{ asset('assets/ownplug/js/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('js-vrcar/script.js') }}" ></script>
    
    @yield('otherscript')

    @include('KaryawanPage.ALayout.ZAlert')
    
</body>

</html>