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

    <!-- Custom text editor for this template-->
    <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.0/dist/trix.css">
    <script type="text/javascript" src="https://unpkg.com/trix@2.0.0/dist/trix.umd.min.js"></script>

    <style>
        trix-toolbar [data-trix-button-group="file-tools"] {
            display: none;
        }
    </style>

    @stack('custom-styles')
</head>

<body class="app">
    <header class="app-header fixed-top">
        @include('auth.admin.layouts.topbar')
        <!--//app-header-inner-->
        @include('auth.admin.layouts.sidebar')
        <!--//app-sidepanel-->
    </header>
    <!--//app-header-->

    <div class="app-wrapper">

        @yield('content')
        <!--//app-content-->

        <footer class="app-footer">
            @include('auth.admin.layouts.footer')
        </footer>
        <!--//app-footer-->

    </div>
    <!--//app-wrapper-->

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Apakah yakin untuk keluar?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">Pilih tombol "Logout" dibawah jika kamu yakin untuk mengakhiri sesi masuk.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Tutup</button>
                    <form action="{{ route('logout') }}" method="post">
                        @csrf
                        <button class="btn btn-primary">Logout</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Javascript -->
    <script src="{{ asset('admin/plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('admin/plugins/jquery-easing/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('admin/plugins/popper.min.js') }}"></script>
    <script src="{{ asset('admin/plugins/bootstrap/js/bootstrap.min.js') }}"></script>

    <!-- Charts JS -->
    <script src="{{ asset('admin/plugins/chart.js/chart.min.js') }}"></script>
    <script src="{{ asset('admin/js/index-charts.js') }}"></script>

    <!-- Page Specific JS -->
    <script src="{{ asset('admin/js/app.js') }}"></script>

    <!-- SweetAlert2 -->
    <script src="{{ asset('library/http_cdn.jsdelivr.net_npm_sweetalert2@11.js') }}"></script>
    <script src="{{ asset('library/http_cdnjs.cloudflare.com_ajax_libs_toastr.js_latest_toastr.min.js') }}"></script>

    <script>
        $(document).ready(function() {
            $('a[data-toggle="modal"]').click(function() {
                var target = $(this).attr('data-target');
                $(target).modal('show');
            });
            $('[data-dismiss="modal"]').click(function() {
                var target = $(this).closest('.modal');
                $(target).modal('hide');
            });
        });
    </script>

    @stack('custom-scripts')
</body>

</html>
