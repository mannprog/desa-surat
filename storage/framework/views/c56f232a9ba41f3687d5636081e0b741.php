

<?php $__env->startSection('content'); ?>
    <div class="app-content pt-3 p-md-3 p-lg-4">
        <div class="container-xl">

            <h1 class="app-page-title">Dashboard Admin</h1>

            <div class="row g-4 mb-4">
                <div class="col-6 col-lg-3">
                    <div class="app-card app-card-stat shadow-sm h-100">
                        <div class="app-card-body p-3 p-lg-4">
                            <h4 class="stats-type mb-1">PERMOHONAN KTP</h4>
                            <div class="stats-figure"><?php echo e($spktp); ?></div>
                            <?php if($spktp != null): ?>
                                <div class="stats-meta">New</div>
                            <?php endif; ?>
                        </div>
                        <!--//app-card-body-->
                        <a class="app-card-link-mask" href="<?php echo e(route('pengantar.ktp.index')); ?>"></a>
                    </div>
                    <!--//app-card-->
                </div>
                <!--//col-->

                <div class="col-6 col-lg-3">
                    <div class="app-card app-card-stat shadow-sm h-100">
                        <div class="app-card-body p-3 p-lg-4">
                            <h4 class="stats-type mb-1">PERMOHONAN KK</h4>
                            <div class="stats-figure"><?php echo e($spkk); ?></div>
                            <?php if($spkk != null): ?>
                                <div class="stats-meta">New</div>
                            <?php endif; ?>
                        </div>
                        <!--//app-card-body-->
                        <a class="app-card-link-mask" href="<?php echo e(route('pengantar.kk.index')); ?>"></a>
                    </div>
                    <!--//app-card-->
                </div>
                <!--//col-->
                <div class="col-6 col-lg-3">
                    <div class="app-card app-card-stat shadow-sm h-100">
                        <div class="app-card-body p-3 p-lg-4">
                            <h4 class="stats-type mb-1">PERMOHONAN SKTM</h4>
                            <div class="stats-figure"><?php echo e($spsktm); ?></div>
                            <?php if($spsktm != null): ?>
                                <div class="stats-meta">New</div>
                            <?php endif; ?>
                        </div>
                        <!--//app-card-body-->
                        <a class="app-card-link-mask" href="<?php echo e(route('pengantar.sktm.index')); ?>"></a>
                    </div>
                    <!--//app-card-->
                </div>
                <!--//col-->
                <div class="col-6 col-lg-3">
                    <div class="app-card app-card-stat shadow-sm h-100">
                        <div class="app-card-body p-3 p-lg-4">
                            <h4 class="stats-type mb-1">PERMOHONAN SKCK</h4>
                            <div class="stats-figure"><?php echo e($spskck); ?></div>
                            <?php if($spskck != null): ?>
                                <div class="stats-meta">New</div>
                            <?php endif; ?>
                        </div>
                        <!--//app-card-body-->
                        <a class="app-card-link-mask" href="<?php echo e(route('pengantar.skck.index')); ?>"></a>
                    </div>
                    <!--//app-card-->
                </div>
                <!--//col-->
            </div>
            <!--//row-->
            
            <!--//row-->

        </div>
        <!--//container-fluid-->
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('auth.admin.layouts.app', ['title' => 'Dashboard'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\desa-surat\resources\views/auth/admin/dashboard.blade.php ENDPATH**/ ?>