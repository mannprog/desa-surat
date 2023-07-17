<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Desa Cileles | <?php echo e($title); ?></title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link rel="icon" href="<?php echo e(asset('landing/img/logo.png')); ?>">
    <link rel="apple-touch-icon" href="<?php echo e(asset('landing/img/logo.png')); ?>">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link rel="stylesheet" href="<?php echo e(asset('landing/vendor/animate.css/animate.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('landing/vendor/bootstrap/css/bootstrap.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('landing/vendor/bootstrap-icons/bootstrap-icons.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('landing/vendor/boxicons/css/boxicons.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('landing/vendor/glightbox/css/glightbox.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('landing/vendor/remixicon/remixicon.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('landing/vendor/swiper/swiper-bundle.min.css')); ?>">

    <!-- Template Main CSS File -->
    <link rel="stylesheet" href="<?php echo e(asset('landing/css/style.css')); ?>">
</head>

<body>

    <?php echo $__env->make('landing.layouts.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php echo $__env->make('landing.layouts.hero', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <main id="main">

        <?php echo $__env->yieldContent('main'); ?>

    </main><!-- End #main -->

    <?php echo $__env->make('landing.layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="<?php echo e(asset('landing/vendor/bootstrap/js/bootstrap.bundle.min.js')); ?>"></script>
    <script src="<?php echo e(asset('landing/vendor/glightbox/js/glightbox.min.js')); ?>"></script>
    <script src="<?php echo e(asset('landing/vendor/isotope-layout/isotope.pkgd.min.js')); ?>"></script>
    <script src="<?php echo e(asset('landing/vendor/swiper/swiper-bundle.min.js')); ?>"></script>
    <script src="<?php echo e(asset('landing/vendor/waypoints/noframework.waypoints.js')); ?>"></script>
    <script src="<?php echo e(asset('landing/vendor/php-email-form/validate.js')); ?>"></script>

    <!-- Template Main JS File -->
    <script src="<?php echo e(asset('landing/js/main.js')); ?>"></script>

</body>

</html>
<?php /**PATH C:\laragon\www\desa-surat\resources\views/landing/layouts/app.blade.php ENDPATH**/ ?>