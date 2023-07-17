<!DOCTYPE html>
<html lang="en">

<head>
    <title>Desa Cileles | Daftar</title>

    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Favicons -->
    <link rel="icon" href="<?php echo e(asset('landing/img/logo.png')); ?>">
    <link rel="apple-touch-icon" href="<?php echo e(asset('landing/img/logo.png')); ?>">

    <!-- FontAwesome JS-->
    <script defer src="<?php echo e(asset('admin/plugins/fontawesome/js/all.min.js')); ?>"></script>

    <!-- App CSS -->
    <link id="theme-style" rel="stylesheet" href="<?php echo e(asset('admin/css/portal.css')); ?>">

</head>

<body class="app app-signup p-0">
    <div class="row g-0 app-auth-wrapper">
        <div class="col-12 col-md-7 col-lg-6 auth-main-col text-center p-5">
            <div class="d-flex flex-column align-content-end">
                <div class="app-auth-body mx-auto">
                    <div class="app-auth-branding mb-4"><a class="app-logo" href="<?php echo e(route('landing.index')); ?>"><img
                                class="logo-icon me-2" src="<?php echo e(asset('landing/img/logo.png')); ?>" alt="logo"></a>
                    </div>
                    <h2 class="auth-heading text-center mb-4">Buat Akun untuk Portal Desa</h2>

                    <div class="auth-form-container text-start mx-auto">
                        <form class="auth-form auth-signup-form">
                            <div class="email mb-3">
                                <label class="sr-only" for="signup-email">Your Name</label>
                                <input id="signup-name" name="signup-name" type="text"
                                    class="form-control signup-name" placeholder="Full name" required="required">
                            </div>
                            <div class="email mb-3">
                                <label class="sr-only" for="signup-email">Your Email</label>
                                <input id="signup-email" name="signup-email" type="email"
                                    class="form-control signup-email" placeholder="Email" required="required">
                            </div>
                            <div class="password mb-3">
                                <label class="sr-only" for="signup-password">Password</label>
                                <input id="signup-password" name="signup-password" type="password"
                                    class="form-control signup-password" placeholder="Create a password"
                                    required="required">
                            </div>
                            <div class="extra mb-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value=""
                                        id="RememberPassword">
                                    <label class="form-check-label" for="RememberPassword">
                                        Saya menyetujui <a href="#" class="app-link">Ketentuan Layanan</a> dan
                                        <a href="#" class="app-link">Kebijakan Privasi</a> Portal Desa.
                                    </label>
                                </div>
                            </div>
                            <!--//extra-->

                            <div class="text-center">
                                <button type="submit" class="btn app-btn-primary w-100 theme-btn mx-auto">Kirim
                                    Pendaftaran</button>
                            </div>
                        </form>
                        <!--//auth-form-->

                        <div class="auth-option text-center pt-5">Sudah punya akun? <a class="text-link"
                                href="<?php echo e(route('login')); ?>">Masuk disini.</a></div>
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
        <!--//auth-background-overlay-->
    </div>
    <!--//auth-background-col-->

    </div>
    <!--//row-->


</body>

</html>
<?php /**PATH C:\laragon\www\desa-surat\resources\views/auth/login/register.blade.php ENDPATH**/ ?>