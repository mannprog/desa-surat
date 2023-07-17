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
                    <div class="auth-form-container text-start">
                        <form class="auth-form login-form">
                            <div class="email mb-3">
                                <label class="sr-only" for="signin-email">Email</label>
                                <input id="signin-email" name="signin-email" type="email"
                                    class="form-control signin-email" placeholder="Email address" required="required">
                            </div>
                            <!--//form-group-->
                            <div class="password mb-3">
                                <label class="sr-only" for="signin-password">Password</label>
                                <input id="signin-password" name="signin-password" type="password"
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


</body>

</html>
