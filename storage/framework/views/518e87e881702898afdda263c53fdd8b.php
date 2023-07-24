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
                    <div class="row">
                        <div class="col-lg-6">
                            <label for="kk_lama" class="form-label">Upload KK Lama<span
                                    class="text-danger">*</span></label>
                            <input class="form-control" type="file" id="kk_lama" name="kk_lama">
                            <img id="img-preview" class="col-lg-6 img-fluid mt-2">
                        </div>
                        <div class="col-lg-6">
                            <label for="file_pendukung" class="form-label">Upload Buku Nikah/Surat Kelahiran<span
                                    class="text-danger">*</span></label>
                            <input class="form-control" type="file" id="file_pendukung" name="file_pendukung">
                            <img id="img-preview-2" class="col-lg-6 img-fluid mt-2">
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
<?php /**PATH C:\laragon\www\desa-surat\resources\views/auth/warga/pages/surat/kk/component/add-modal.blade.php ENDPATH**/ ?>