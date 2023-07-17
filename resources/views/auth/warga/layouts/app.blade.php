<!DOCTYPE html>
<html lang="en">

<head>
    <title>Desa Cileles | {{ $title }}</title>

    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Favicons -->
    <link rel="icon" href="{{ asset('landing/img/logo.png') }}">
    <link rel="apple-touch-icon" href="{{ asset('landing/img/logo.png') }}">

    <!-- FontAwesome JS-->
    <script defer src="{{ asset('admin/plugins/fontawesome/js/all.min.js') }}"></script>

    <!-- App CSS -->
    <link id="theme-style" rel="stylesheet" href="{{ asset('admin/css/portal.css') }}">

</head>

<body class="app">
    <header class="app-header fixed-top">
        @include('auth.warga.layouts.topbar')
        <!--//app-header-inner-->
        @include('auth.warga.layouts.sidebar')
        <!--//app-sidepanel-->
    </header>
    <!--//app-header-->

    <div class="app-wrapper">

        @yield('content')
        <!--//app-content-->

        <footer class="app-footer">
            @include('auth.warga.layouts.footer')
        </footer>
        <!--//app-footer-->

    </div>
    <!--//app-wrapper-->


    <!-- Javascript -->
    <script src="{{ asset('admin/plugins/popper.min.js') }}"></script>
    <script src="{{ asset('admin/plugins/bootstrap/js/bootstrap.min.js') }}"></script>

    <!-- Charts JS -->
    <script src="{{ asset('admin/plugins/chart.js/chart.min.js') }}"></script>
    <script src="{{ asset('admin/js/index-charts.js') }}"></script>

    <!-- Page Specific JS -->
    <script src="{{ asset('admin/js/app.js') }}"></script>

</body>

</html>
