<!DOCTYPE html>
<html lang="en">

<head>
    <title>Desa Cileles | <?php echo e($title); ?></title>

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

<body class="app">
    <header class="app-header fixed-top">
        <?php echo $__env->make('auth.admin.layouts.topbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <!--//app-header-inner-->
        <?php echo $__env->make('auth.admin.layouts.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <!--//app-sidepanel-->
    </header>
    <!--//app-header-->

    <div class="app-wrapper">

        <?php echo $__env->yieldContent('content'); ?>
        <!--//app-content-->

        <footer class="app-footer">
            <?php echo $__env->make('auth.admin.layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
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
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <form action="<?php echo e(route('logout')); ?>" method="post">
                        <?php echo csrf_field(); ?>
                        <button class="btn btn-primary">Logout</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Javascript -->
    <script src="<?php echo e(asset('admin/plugins/jquery/jquery.min.js')); ?>"></script>
    <script src="<?php echo e(asset('admin/plugins/jquery-easing/jquery.easing.min.js')); ?>"></script>
    <script src="<?php echo e(asset('admin/plugins/popper.min.js')); ?>"></script>
    <script src="<?php echo e(asset('admin/plugins/bootstrap/js/bootstrap.min.js')); ?>"></script>

    <!-- Charts JS -->
    <script src="<?php echo e(asset('admin/plugins/chart.js/chart.min.js')); ?>"></script>
    <script src="<?php echo e(asset('admin/js/index-charts.js')); ?>"></script>

    <!-- Page Specific JS -->
    <script src="<?php echo e(asset('admin/js/app.js')); ?>"></script>

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

    <?php echo $__env->yieldPushContent('custom-script'); ?>
</body>

</html>
<?php /**PATH C:\laragon\www\desa-surat\resources\views/auth/admin/layouts/app.blade.php ENDPATH**/ ?>