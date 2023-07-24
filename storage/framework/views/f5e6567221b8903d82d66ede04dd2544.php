

<?php $__env->startSection('content'); ?>
    <div class="app-content pt-3 p-md-3 p-lg-4">
        <div class="container-xl">
            <div class="row justify-content-between">
                <div class="col-auto">
                    <h1 class="app-page-title">Profil Saya</h1>
                </div>
                <div class="col-auto">
                    <a href="<?php echo e(route('edit.warga.profil', $warga->id)); ?>" class="btn btn-sm btn-warning shadow-sm"><i
                            class="fas fa-pencil-alt me-2"></i>
                        Ubah Profil</a>
                </div>
            </div>

            <div class="app-card app-card-chart h-100 shadow-sm">
                <div class="app-card-body p-3 p-lg-4">
                    <div class="row g-3 align-items-center">
                        <div class="col-12 col-lg-3 text-center mb-3 mb-lg-0">
                            <img class="img-fluid" src="<?php echo e(asset('admin/images/profiles/' . $warga->foto)); ?>"
                                style="height: 150px">
                        </div>
                        <!--//col-->
                        <div class="col-12 col-lg-9 text-start">
                            <div class="border-bottom">
                                <h3 class="mb-3 fw-bold"><?php echo e($warga->name); ?></h3>
                            </div>
                            <div class="mt-3">
                                <h5 class="fw-bold">Data Pribadi</h5>
                                <div class="container">
                                    <div class="row align-items-center">
                                        <div class="col-5 col-lg-3">
                                            <p>Nomor Induk Kependudukan</p>
                                        </div>
                                        <div class="col-1 col-lg-1 text-center">
                                            <p>:</p>
                                        </div>
                                        <div class="col-6 col-lg-8">
                                            <p>
                                                <?php echo e($warga->wargaDetail->nik); ?>

                                            </p>
                                        </div>
                                    </div>
                                    <div class="row align-items-center">
                                        <div class="col-5 col-lg-3">
                                            <p>Tempat, Tanggal Lahir</p>
                                        </div>
                                        <div class="col-1 col-lg-1 text-center">
                                            <p>:</p>
                                        </div>
                                        <div class="col-6 col-lg-8">
                                            <p>
                                                <?php if($warga->wargaDetail->tempat_lahir): ?>
                                                    <?php echo e($warga->wargaDetail->tempat_lahir); ?>,
                                                <?php else: ?>
                                                    -
                                                <?php endif; ?>
                                                <?php if($warga->wargaDetail->tanggal_lahir): ?>
                                                    <?php echo e(\Carbon\Carbon::parse($warga->wargaDetail->tanggal_lahir)->format('d M Y')); ?>

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
                                                <?php if($warga->wargaDetail->jenis_kelamin === 'l'): ?>
                                                    Laki-laki
                                                <?php else: ?>
                                                    Perempuan
                                                <?php endif; ?>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="row align-items-center">
                                        <div class="col-5 col-lg-3">
                                            <p>Golongan Darah</p>
                                        </div>
                                        <div class="col-1 col-lg-1 text-center">
                                            <p>:</p>
                                        </div>
                                        <div class="col-6 col-lg-8">
                                            <p>
                                                <?php if($warga->wargaDetail->gol_darah !== null): ?>
                                                    <?php echo e($warga->wargaDetail->gol_darah); ?>

                                                <?php else: ?>
                                                    -
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
                                                <?php if($warga->wargaDetail->alamat): ?>
                                                    <?php echo $warga->wargaDetail->alamat; ?>

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
                                                <?php if($warga->wargaDetail->agama === 'islam'): ?>
                                                    Islam
                                                <?php elseif($warga->wargaDetail->agama === 'katolik'): ?>
                                                    Kristen Katolik
                                                <?php elseif($warga->wargaDetail->agama === 'protestan'): ?>
                                                    Kristen Protestan
                                                <?php elseif($warga->wargaDetail->agama === 'hindu'): ?>
                                                    Hindu
                                                <?php elseif($warga->wargaDetail->agama === 'buddha'): ?>
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
                                                <?php if($warga->wargaDetail->status === 'belumkawin'): ?>
                                                    Belum Kawin
                                                <?php elseif($warga->wargaDetail->status === 'kawin'): ?>
                                                    Kawin
                                                <?php elseif($warga->wargaDetail->status === 'ceraihidup'): ?>
                                                    Cerai Hidup
                                                <?php else: ?>
                                                    Cerai Mati
                                                <?php endif; ?>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="row align-items-center">
                                        <div class="col-5 col-lg-3">
                                            <p>Pekerjaan</p>
                                        </div>
                                        <div class="col-1 col-lg-1 text-center">
                                            <p>:</p>
                                        </div>
                                        <div class="col-6 col-lg-8">
                                            <p>
                                                <?php if($warga->wargaDetail->pekerjaan === 'belumbekerja'): ?>
                                                    Belum/Tidak Bekerja
                                                <?php else: ?>
                                                    <?php echo e($warga->wargaDetail->pekerjaan); ?>

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
                                                <?php if($warga->wargaDetail->no_hp): ?>
                                                    <?php echo e($warga->wargaDetail->no_hp); ?>

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
                                            <p><?php echo e($warga->email); ?></p>
                                        </div>
                                    </div>
                                </div>
                                <h5 class="fw-bold">Data Keluarga</h5>
                                <div class="container">
                                    <div class="row align-items-center">
                                        <div class="col-5 col-lg-3">
                                            <p>Nomor Kartu Keluarga</p>
                                        </div>
                                        <div class="col-1 col-lg-1 text-center">
                                            <p>:</p>
                                        </div>
                                        <div class="col-6 col-lg-8">
                                            <p>
                                                <?php echo e($warga->wargaDetail->no_kk); ?>

                                            </p>
                                        </div>
                                    </div>
                                    <div class="row align-items-center">
                                        <div class="col-5 col-lg-3">
                                            <p>Nama Ayah</p>
                                        </div>
                                        <div class="col-1 col-lg-1 text-center">
                                            <p>:</p>
                                        </div>
                                        <div class="col-6 col-lg-8">
                                            <p>
                                                <?php if($warga->wargaDetail->ayah !== null): ?>
                                                    <?php echo e($warga->wargaDetail->ayah); ?>

                                                <?php else: ?>
                                                    -
                                                <?php endif; ?>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="row align-items-center">
                                        <div class="col-5 col-lg-3">
                                            <p>Nama Ibu</p>
                                        </div>
                                        <div class="col-1 col-lg-1 text-center">
                                            <p>:</p>
                                        </div>
                                        <div class="col-6 col-lg-8">
                                            <p>
                                                <?php if($warga->wargaDetail->ibu !== null): ?>
                                                    <?php echo e($warga->wargaDetail->ibu); ?>

                                                <?php else: ?>
                                                    -
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
                                                <?php if($warga->wargaDetail->pasangan !== null): ?>
                                                    <?php echo e($warga->wargaDetail->pasangan); ?>

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
                                                <?php if($warga->wargaDetail->anak !== null): ?>
                                                    <?php echo $warga->wargaDetail->anak; ?>

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

<?php $__env->startPush('custom-scripts'); ?>
    <script>
        $(document).ready(function() {
            var successMessage = '<?php echo e(session('success')); ?>';

            if (successMessage) {
                Swal.fire({
                    icon: 'success',
                    title: 'Success',
                    text: successMessage,
                });
            }
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('auth.warga.layouts.app', ['title' => 'Profil Saya'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\desa-surat\resources\views/auth/warga/pages/profil/index.blade.php ENDPATH**/ ?>