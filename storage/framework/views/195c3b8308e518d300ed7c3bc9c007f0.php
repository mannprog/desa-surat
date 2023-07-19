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
                        <form class="auth-form auth-signup-form" id="itemForm" name="itemForm" method="post">
                            <?php echo csrf_field(); ?>
                            <div class="row">
                                <div class="col-6">
                                    <div class="email mb-3">
                                        <label class="sr-only" for="no_kk">No. Kartu Keluarga</label>
                                        <input id="no_kk" name="no_kk" type="text"
                                            class="form-control signup-name" placeholder="Masukkan Nomor KK"
                                            required="required">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="email mb-3">
                                        <label class="sr-only" for="nik">Nomor Induk Kependudukan</label>
                                        <input id="nik" name="nik" type="text"
                                            class="form-control signup-name" placeholder="Masukkan NIK"
                                            required="required">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="email mb-3">
                                        <label class="sr-only" for="name">Nama Lengkap</label>
                                        <input id="name" name="name" type="text"
                                            class="form-control signup-name" placeholder="Masukkan Nama Lengkap"
                                            required="required">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="email mb-3">
                                        <label for="jenis_kelamin" class="sr-only">Jenis Kelamin<span
                                                class="text-danger">*</span></label>
                                        <select class="form-select" aria-label="Default select example"
                                            name="jenis_kelamin" id="jenis_kelamin">
                                            <option selected disabled>---Pilih Jenis Kelamin---</option>
                                            <option value="l">Laki-laki</option>
                                            <option value="p">Perempuan</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="email mb-3">
                                        <label for="agama" class="sr-only">Agama<span
                                                class="text-danger">*</span></label>
                                        <select class="form-select" aria-label="Default select example" name="agama"
                                            id="agama">
                                            <option selected disabled>---Pilih Agama---</option>
                                            <option value="islam">Islam</option>
                                            <option value="katolik">Kristen Katolik</option>
                                            <option value="protestan">Kristen Protestan</option>
                                            <option value="hindu">Hindu</option>
                                            <option value="buddha">Buddha</option>
                                            <option value="khonghucu">Khonghucu</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="email mb-3">
                                        <label for="status" class="sr-only">Status Perkawinan<span
                                                class="text-danger">*</span></label>
                                        <select class="form-select" aria-label="Default select example" name="status"
                                            id="status">
                                            <option selected disabled>---Pilih Status Perkawinan---</option>
                                            <option value="belumkawin">Belum Kawin</option>
                                            <option value="kawin">Kawin</option>
                                            <option value="ceraihidup">Cerai Hidup</option>
                                            <option value="ceraimati">Cerai Mati</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="email mb-3">
                                <label class="sr-only" for="username">Username</label>
                                <input id="username" name="username" type="text"
                                    class="form-control signup-name" placeholder="Masukkan Username"
                                    required="required">
                            </div>
                            <div class="email mb-3">
                                <label class="sr-only" for="email">Email</label>
                                <input id="email" name="email" type="email"
                                    class="form-control signup-email" placeholder="Masukkan Email"
                                    required="required">
                            </div>
                            <div class="password mb-3">
                                <label class="sr-only" for="password">Password</label>
                                <input id="password" name="password" type="password"
                                    class="form-control signup-password" placeholder="Create a password"
                                    required="required">
                            </div>
                            <div class="extra mb-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value=""
                                        id="RememberPassword" required="required">
                                    <label class="form-check-label" for="RememberPassword">
                                        Saya menyetujui <a href="#" class="app-link">Ketentuan Layanan</a> dan
                                        <a href="#" class="app-link">Kebijakan Privasi</a> Portal Desa.
                                    </label>
                                </div>
                            </div>
                            <!--//extra-->

                            <div class="text-center">
                                <button type="button" class="btn app-btn-primary w-100 theme-btn mx-auto"
                                    id="saveBtn">Kirim
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

    <script src="<?php echo e(asset('admin/plugins/jquery/jquery.min.js')); ?>"></script>
    <script src="<?php echo e(asset('admin/plugins/jquery-easing/jquery.easing.min.js')); ?>"></script>

    <!-- SweetAlert2 -->
    <script src="<?php echo e(asset('library/http_cdn.jsdelivr.net_npm_sweetalert2@11.js')); ?>"></script>
    <script src="<?php echo e(asset('library/http_cdnjs.cloudflare.com_ajax_libs_toastr.js_latest_toastr.min.js')); ?>"></script>

    <script>
        $(document).ready(function() {
            $('#saveBtn').click(function(e) {
                e.preventDefault();

                var formData = new FormData($('#itemForm')[0]);
                $.ajax({
                    data: formData,
                    url: "<?php echo e(route('prosesRegister')); ?>",
                    contentType: false,
                    processData: false,
                    type: "POST",
                    success: function(response) {
                        if (response.error) {
                            Swal.fire({
                                icon: 'error',
                                title: 'Error',
                                text: response.message,
                            });
                        } else {
                            Swal.fire({
                                icon: 'success',
                                title: 'Success',
                                text: response.message,
                            }).then(function() {
                                // Redirect to the login page on success
                                window.location.href = "<?php echo e(route('login')); ?>";
                            });
                        }
                    },
                    error: function(xhr, textStatus, errorThrown) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: 'Akun Portal telah dibuat. Silahkan coba akun lain...',
                        });
                    }
                });
            });
        });
    </script>
</body>

</html>
<?php /**PATH C:\laragon\www\desa-surat\resources\views/auth/login/register.blade.php ENDPATH**/ ?>