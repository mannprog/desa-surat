<!-- Modal Create And Edit -->
<div class="modal fade" id="modal-md">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="itemForm" name="itemForm" method="post">
                <?php echo csrf_field(); ?>
                <input type="hidden" name="suratkk_id" id="suratkk_id">
                <div class="modal-body">
                    <div class="col-lg-12 mb-3">
                        <label for="user_id" class="form-label">Nama Pemohon<span class="text-danger">*</span></label>
                        <select class="form-select" aria-label="Default select example" name="user_id" id="user_id">
                            <option selected disabled>---Pilih Pemohon---</option>
                            <?php $__currentLoopData = $user; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $usr): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($usr->id); ?>"><?php echo e($usr->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <label for="kk_lama" class="form-label">Upload KK Lama<span
                                    class="text-danger">*</span></label>
                            <input class="form-control" type="file" id="kk_lama" name="kk_lama"
                                aria-describedby="fileHelp">
                            <img id="img-preview" class="col-lg-6 img-fluid mt-2">
                        </div>
                        <div class="col-lg-6">
                            <label for="file_pendukung" class="form-label">Upload Buku Nikah / Surat Kelahiran<span
                                    class="text-danger">*</span></label>
                            <input class="form-control" type="file" id="file_pendukung" name="file_pendukung"
                                aria-describedby="fileHelp">
                            <img id="img-preview-2" class="col-lg-6 img-fluid mt-2">
                        </div>
                        <div id="fileHelp" class="form-text">File upload max 2MB dan berekstensi jpg/jpeg/png.
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="button" class="btn btn-primary" id="saveBtn">Simpan</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<?php $__env->startPush('custom-scripts'); ?>
    <script>
        $('#kk_lama').change(function(e) {
            var file = e.target.files[0];
            var reader = new FileReader();

            reader.onload = function(e) {
                var previewImage = $('#img-preview');
                previewImage.attr('src', e.target.result);
            };

            reader.readAsDataURL(file);
        });

        $('#file_pendukung').change(function(e) {
            var file = e.target.files[0];
            var reader = new FileReader();

            reader.onload = function(e) {
                var previewImage = $('#img-preview-2');
                previewImage.attr('src', e.target.result);
            };

            reader.readAsDataURL(file);
        });
    </script>
<?php $__env->stopPush(); ?>
<?php /**PATH C:\laragon\www\desa-surat\resources\views/auth/admin/pages/surat/kk/component/add-modal.blade.php ENDPATH**/ ?>