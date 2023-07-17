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
        <?php echo $__env->make('auth.warga.layouts.topbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <!--//app-header-inner-->
        <?php echo $__env->make('auth.warga.layouts.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <!--//app-sidepanel-->
    </header>
    <!--//app-header-->

    <div class="app-wrapper">

        <?php echo $__env->yieldContent('content'); ?>
        <!--//app-content-->

        <footer class="app-footer">
            <?php echo $__env->make('auth.warga.layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </footer>
        <!--//app-footer-->

    </div>
    <!--//app-wrapper-->


    <!-- Javascript -->
    <script src="<?php echo e(asset('admin/plugins/popper.min.js')); ?>"></script>
    <script src="<?php echo e(asset('admin/plugins/bootstrap/js/bootstrap.min.js')); ?>"></script>

    <!-- Charts JS -->
    <script src="<?php echo e(asset('admin/plugins/chart.js/chart.min.js')); ?>"></script>
    <script src="<?php echo e(asset('admin/js/index-charts.js')); ?>"></script>

    <!-- Page Specific JS -->
    <script src="<?php echo e(asset('admin/js/app.js')); ?>"></script>

</body>

</html>
<?php /**PATH C:\laragon\www\desa-surat\resources\views/auth/warga/layouts/app.blade.php ENDPATH**/ ?>