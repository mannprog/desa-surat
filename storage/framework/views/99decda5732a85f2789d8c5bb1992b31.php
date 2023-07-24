

<?php $__env->startSection('content'); ?>
    <div class="app-content pt-3 p-md-3 p-lg-4">
        <div class="container-xl">
            <div class="row justify-content-between">
                <div class="col-auto">
                    <h1 class="app-page-title">Detail Permohonan - <?php echo e($data->user->name); ?></h1>
                </div>
                <div class="col-auto">
                    <a href="<?php echo e(route('surat.skck.index')); ?>" class="btn btn-sm btn-secondary shadow">
                        Kembali</a>
                </div>
            </div>

            <div class="app-card app-card-chart h-100 shadow-sm">
                <div class="app-card-body p-3 p-lg-4">
                    <div class="row g-3 align-items-center">
                        <div class="col-12 text-start">
                            <div class="container">
                                <div class="row align-items-center">
                                    <div class="col-5 col-lg-2">
                                        <p>Tanggal Permohonan</p>
                                    </div>
                                    <div class="col-1 col-lg-1 text-center">
                                        <p>:</p>
                                    </div>
                                    <div class="col-6 col-lg-8">
                                        <p><?php echo e(\Carbon\Carbon::parse($data->tanggal_request)->format('d M Y H:i')); ?></p>
                                    </div>
                                </div>
                                <div class="row align-items-center">
                                    <div class="col-5 col-lg-2">
                                        <p>Status Permohonan</p>
                                    </div>
                                    <div class="col-1 col-lg-1 text-center">
                                        <p>:</p>
                                    </div>
                                    <div class="col-6 col-lg-8">
                                        <p>
                                            <?php if($data->status === 'selesai'): ?>
                                                Surat Pengantar Telah Selesai Dibuat
                                            <?php elseif($data->status === 'tolak'): ?>
                                                Permohonan Ditolak
                                            <?php elseif($data->status === 'proses'): ?>
                                                Surat Pengantar Sedang Diproses
                                            <?php else: ?>
                                                Belum Ditentukan
                                            <?php endif; ?>
                                        </p>
                                    </div>
                                </div>
                                <div class="row align-items-center">
                                    <div class="col-5 col-lg-2">
                                        <p>Kartu Tanda Penduduk</p>
                                    </div>
                                    <div class="col-1 col-lg-1 text-center">
                                        <p>:</p>
                                    </div>
                                    <div class="col-6 col-lg-8">
                                        <img src="<?php echo e(asset('file/permohonan/skck/' . $data->ktp)); ?>" class="img-fluid">
                                    </div>
                                </div>
                                <div class="row align-items-center">
                                    <div class="col-5 col-lg-2">
                                        <p>Kartu Keluarga</p>
                                    </div>
                                    <div class="col-1 col-lg-1 text-center">
                                        <p>:</p>
                                    </div>
                                    <div class="col-6 col-lg-8">
                                        <img src="<?php echo e(asset('file/permohonan/skck/' . $data->kk)); ?>" class="img-fluid">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('auth.warga.layouts.app', ['title' => 'Detail Permohonan'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\desa-surat\resources\views/auth/warga/pages/surat/skck/detail.blade.php ENDPATH**/ ?>