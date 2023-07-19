

<?php $__env->startSection('content'); ?>
    <div class="app-content pt-3 p-md-3 p-lg-4">
        <div class="container-xl">
            <div class="row justify-content-between">
                <div class="col-auto">
                    <h1 class="app-page-title">Detail - <?php echo e($admin->name); ?></h1>
                </div>
                <div class="col-auto">
                    <a href="<?php echo e(route('kelola.admin.index')); ?>" class="btn btn-sm btn-secondary shadow-sm">
                        Kembali</a>
                </div>
            </div>

            <div class="app-card app-card-chart h-100 shadow-sm">
                <div class="app-card-body p-3 p-lg-4">
                    <div class="row g-3 align-items-center">
                        <div class="col-12 col-lg-3 text-center mb-3 mb-lg-0">
                            <img class="profile-image rounded-circle"
                                src="<?php echo e(asset('admin/images/profiles/' . $admin->foto)); ?>" style="height: 150px">
                        </div>
                        <!--//col-->
                        <div class="col-12 col-lg-9 text-start">
                            <div class="border-bottom">
                                <h3 class="mb-3 fw-bold"><?php echo e($admin->name); ?></h3>
                            </div>
                            <div class="mt-3">
                                <h5 class="fw-bold">Data Tugas</h5>
                                <div class="container">
                                    <div class="row align-items-center">
                                        <div class="col-5 col-lg-3">
                                            <p>Jabatan</p>
                                        </div>
                                        <div class="col-1 col-lg-1 text-center">
                                            <p>:</p>
                                        </div>
                                        <div class="col-6 col-lg-8">
                                            <p>
                                                <?php if($admin->adminDetail->jabatan === 'admin'): ?>
                                                    Admin
                                                <?php elseif($admin->adminDetail->jabatan === 'kepaladesa'): ?>
                                                    Kepala Desa
                                                <?php else: ?>
                                                    KASI Pelayanan
                                                <?php endif; ?>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="row align-items-center">
                                        <div class="col-5 col-lg-3">
                                            <p>No SK Pengangkatan</p>
                                        </div>
                                        <div class="col-1 col-lg-1 text-center">
                                            <p>:</p>
                                        </div>
                                        <div class="col-6 col-lg-8">
                                            <p><?php echo e($admin->adminDetail->no_sk); ?></p>
                                        </div>
                                    </div>
                                    <div class="row align-items-center">
                                        <div class="col-5 col-lg-3">
                                            <p>TMT SK Pengangkatan</p>
                                        </div>
                                        <div class="col-1 col-lg-1 text-center">
                                            <p>:</p>
                                        </div>
                                        <div class="col-6 col-lg-8">
                                            <p><?php echo e(\Carbon\Carbon::parse($admin->adminDetail->tmt_sk)->format('d M Y')); ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-1">
                                <h5 class="fw-bold">Data Pribadi</h5>
                                <div class="container">
                                    <div class="row align-items-center">
                                        <div class="col-5 col-lg-3">
                                            <p>Tempat, Tanggal Lahir</p>
                                        </div>
                                        <div class="col-1 col-lg-1 text-center">
                                            <p>:</p>
                                        </div>
                                        <div class="col-6 col-lg-8">
                                            <p>
                                                <?php if($admin->adminDetail->tempat_lahir): ?>
                                                    <?php echo e($admin->adminDetail->tempat_lahir); ?>,
                                                <?php else: ?>
                                                    -
                                                <?php endif; ?>
                                                <?php if($admin->adminDetail->tanggal_lahir): ?>
                                                    <?php echo e(\Carbon\Carbon::parse($admin->adminDetail->tanggal_lahir)->format('d M Y')); ?>

                                                <?php endif; ?>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="row align-items-center">
                                        <div class="col-5 col-lg-3">
                                            <p>Jenis Kelamin</p>
                                        </div>
                                        <div class="col-1 col-lg-1 text-center">
                                            <p>:</p>
                                        </div>
                                        <div class="col-6 col-lg-8">
                                            <p>
                                                <?php if($admin->adminDetail->jenis_kelamin === 'l'): ?>
                                                    Laki-laki
                                                <?php else: ?>
                                                    Perempuan
                                                <?php endif; ?>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="row align-items-center">
                                        <div class="col-5 col-lg-3">
                                            <p>Alamat</p>
                                        </div>
                                        <div class="col-1 col-lg-1 text-center">
                                            <p>:</p>
                                        </div>
                                        <div class="col-6 col-lg-8">
                                            <p>
                                                <?php if($admin->adminDetail->alamat): ?>
                                                    <?php echo $admin->adminDetail->alamat; ?>

                                                <?php else: ?>
                                                    -
                                                <?php endif; ?>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="row align-items-center">
                                        <div class="col-5 col-lg-3">
                                            <p>Agama</p>
                                        </div>
                                        <div class="col-1 col-lg-1 text-center">
                                            <p>:</p>
                                        </div>
                                        <div class="col-6 col-lg-8">
                                            <p>
                                                <?php if($admin->adminDetail->agama === 'islam'): ?>
                                                    Islam
                                                <?php elseif($admin->adminDetail->agama === 'katolik'): ?>
                                                    Kristen Katolik
                                                <?php elseif($admin->adminDetail->agama === 'protestan'): ?>
                                                    Kristen Protestan
                                                <?php elseif($admin->adminDetail->agama === 'hindu'): ?>
                                                    Hindu
                                                <?php elseif($admin->adminDetail->agama === 'buddha'): ?>
                                                    Buddha
                                                <?php else: ?>
                                                    Khonghucu
                                                <?php endif; ?>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="row align-items-center">
                                        <div class="col-5 col-lg-3">
                                            <p>Status Perkawinan</p>
                                        </div>
                                        <div class="col-1 col-lg-1 text-center">
                                            <p>:</p>
                                        </div>
                                        <div class="col-6 col-lg-8">
                                            <p>
                                                <?php if($admin->adminDetail->status === 'belumkawin'): ?>
                                                    Belum Kawin
                                                <?php elseif($admin->adminDetail->status === 'kawin'): ?>
                                                    Kawin
                                                <?php elseif($admin->adminDetail->status === 'ceraihidup'): ?>
                                                    Cerai Hidup
                                                <?php else: ?>
                                                    Cerai Mati
                                                <?php endif; ?>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="row align-items-center">
                                        <div class="col-5 col-lg-3">
                                            <p>Pendidikan Terakhir</p>
                                        </div>
                                        <div class="col-1 col-lg-1 text-center">
                                            <p>:</p>
                                        </div>
                                        <div class="col-6 col-lg-8">
                                            <p>
                                                <?php if($admin->adminDetail->pendidikan_terakhir === 'sma'): ?>
                                                    SMA/Sederajat
                                                <?php elseif($admin->adminDetail->pendidikan_terakhir === 'd1'): ?>
                                                    D1/Sederajat
                                                <?php elseif($admin->adminDetail->pendidikan_terakhir === 'd2'): ?>
                                                    D2/Sederajat
                                                <?php elseif($admin->adminDetail->pendidikan_terakhir === 'd3'): ?>
                                                    D3/Sederajat
                                                <?php elseif($admin->adminDetail->pendidikan_terakhir === 's1'): ?>
                                                    S1/Sederajat
                                                <?php elseif($admin->adminDetail->pendidikan_terakhir === 's2'): ?>
                                                    S2/Sederajat
                                                <?php elseif($admin->adminDetail->pendidikan_terakhir === 's3'): ?>
                                                    S3/Sederajat
                                                <?php else: ?>
                                                    -
                                                <?php endif; ?>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="row align-items-center">
                                        <div class="col-5 col-lg-3">
                                            <p>No Handphone</p>
                                        </div>
                                        <div class="col-1 col-lg-1 text-center">
                                            <p>:</p>
                                        </div>
                                        <div class="col-6 col-lg-8">
                                            <p>
                                                <?php if($admin->adminDetail->no_hp): ?>
                                                    <?php echo e($admin->adminDetail->no_hp); ?>

                                                <?php else: ?>
                                                    -
                                                <?php endif; ?>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="row align-items-center">
                                        <div class="col-5 col-lg-3">
                                            <p>Email</p>
                                        </div>
                                        <div class="col-1 col-lg-1 text-center">
                                            <p>:</p>
                                        </div>
                                        <div class="col-6 col-lg-8">
                                            <p><?php echo e($admin->email); ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-1">
                                <h5 class="fw-bold">Data Keluarga</h5>
                                <div class="container">
                                    <div class="row align-items-center">
                                        <div class="col-5 col-lg-3">
                                            <p>Nama Ayah/Ibu</p>
                                        </div>
                                        <div class="col-1 col-lg-1 text-center">
                                            <p>:</p>
                                        </div>
                                        <div class="col-6 col-lg-8">
                                            <p>
                                                <?php if($admin->adminDetail->ayah): ?>
                                                    <?php echo e($admin->adminDetail->ayah); ?>,
                                                <?php else: ?>
                                                    -
                                                <?php endif; ?>
                                                <?php if($admin->adminDetail->ibu): ?>
                                                    <?php echo e($admin->adminDetail->ibu); ?>

                                                <?php endif; ?>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="row align-items-center">
                                        <div class="col-5 col-lg-3">
                                            <p>Nama Pasangan</p>
                                        </div>
                                        <div class="col-1 col-lg-1 text-center">
                                            <p>:</p>
                                        </div>
                                        <div class="col-6 col-lg-8">
                                            <p>
                                                <?php if($admin->adminDetail->pasangan): ?>
                                                    <?php echo e($admin->adminDetail->pasangan); ?>

                                                <?php else: ?>
                                                    -
                                                <?php endif; ?>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="row align-items-center">
                                        <div class="col-5 col-lg-3">
                                            <p>Nama Anak</p>
                                        </div>
                                        <div class="col-1 col-lg-1 text-center">
                                            <p>:</p>
                                        </div>
                                        <div class="col-6 col-lg-8">
                                            <p>
                                                <?php if($admin->adminDetail->anak): ?>
                                                    <?php echo $admin->adminDetail->anak; ?>

                                                <?php else: ?>
                                                    -
                                                <?php endif; ?>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--//col-->
                    </div>
                    <!--//row-->
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('auth.admin.layouts.app', ['title' => 'Detail User'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\desa-surat\resources\views/auth/admin/pages/users/admin/detail.blade.php ENDPATH**/ ?>