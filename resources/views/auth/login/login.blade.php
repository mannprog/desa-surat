<!DOCTYPE html>
<html lang="en">

<head>
    <title>Desa Cileles | Masuk</title>

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

<body class="app app-login p-0">
    <div class="row g-0 app-auth-wrapper">
        <div class="col-12 col-md-7 col-lg-6 auth-main-col text-center p-5">
            <div class="d-flex flex-column align-content-end">
                <div class="app-auth-body mx-auto">
                    <div class="app-auth-branding mb-4"><a class="app-logo" href="{{ route('landing.index') }}"><img
                                class="logo-icon me-2" src="{{ asset('landing/img/logo.png') }}" alt="logo"></a>
                    </div>
                    <h2 class="auth-heading text-center mb-5">Masuk ke Portal Desa</h2>
                    @if (session()->has('loginError'))
                        <div class="mb-3">
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <span class="alert-text">{{ session('loginError') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                            </div>
                        </div>
                    @endif
                    <div class="auth-form-container text-start">
                        <form class="auth-form login-form" action="{{ route('prosesLogin') }}" method="POST">
                            @csrf
                            <div class="email mb-3">
                                <label class="sr-only" for="username">Username / Email</label>
                                <input id="username" name="username" type="text" class="form-control signin-email"
                                    placeholder="Masukkan Username / Alamat Email" required="required">
                            </div>
                            <!--//form-group-->
                            <div class="password mb-3">
                                <label class="sr-only" for="password">Password</label>
                                <input id="password" name="password" type="password"
                                    class="form-control signin-password" placeholder="Password" required="required">
                                <div class="extra mt-3 row justify-content-between">
                                    <div class="col-6">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value=""
                                                id="RememberPassword">
                                            <label class="form-check-label" for="RememberPassword">
                                                Remember me
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <!--//extra-->
                            </div>
                            <!--//form-group-->
                            <div class="text-center">
                                <button type="submit" class="btn app-btn-primary w-100 theme-btn mx-auto">Log
                                    In</button>
                            </div>
                        </form>

                        <div class="auth-option text-center pt-5">Belum punya akun? <a class="text-link"
                                href="{{ route('register') }}">Daftar sekarang disini</a>.</div>
                    </div>
                    <!--//auth-form-container-->

                </div>
                <!--//auth-body-->
            </div>
            <!--//flex-column-->
        </div>
        <!--//auth-main-col-->
        <div class="col-12 col-md-5 col-lg-6 h-100 auth-background-col">
            <div class="auth-background-holder">
            </div>
            <div class="auth-background-mask"></div>
        </div>
        <!--//auth-background-col-->

    </div>
    <!--//row-->


    <script src="{{ asset('admin/plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('admin/plugins/jquery-easing/jquery.easing.min.js') }}"></script>

    <script>
        $(document).ready(function() {
            $('[data-bs-dismiss="alert"]').click(function() {
                var target = $(this).closest('.alert');
                $(target).hide();
            });
        });
    </script>
</body>

</html>
