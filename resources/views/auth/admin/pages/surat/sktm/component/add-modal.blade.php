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
                @csrf
                <input type="hidden" name="suratkk_id" id="suratkk_id">
                <div class="modal-body">
                    <div class="col-lg-12 mb-3">
                        <label for="user_id" class="form-label">Nama Pemohon<span class="text-danger">*</span></label>
                        <select class="form-select" aria-label="Default select example" name="user_id" id="user_id">
                            <option selected disabled>---Pilih Pemohon---</option>
                            @foreach ($user as $usr)
                                <option value="{{ $usr->id }}">{{ $usr->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <label for="ktp" class="form-label">Upload Kartu Tanda Penduduk<span
                                    class="text-danger">*</span></label>
                            <input class="form-control" type="file" id="ktp" name="ktp"
                                aria-describedby="fileHelp">
                            <img id="img-preview" class="col-lg-6 img-fluid mt-2">
                        </div>
                        <div class="col-lg-6">
                            <label for="kk" class="form-label">Upload Kartu Keluarga<span
                                    class="text-danger">*</span></label>
                            <input class="form-control" type="file" id="kk" name="kk"
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

@push('custom-scripts')
    <script>
        $('#ktp').change(function(e) {
            var file = e.target.files[0];
            var reader = new FileReader();

            reader.onload = function(e) {
                var previewImage = $('#img-preview');
                previewImage.attr('src', e.target.result);
            };

            reader.readAsDataURL(file);
        });

        $('#kk').change(function(e) {
            var file = e.target.files[0];
            var reader = new FileReader();

            reader.onload = function(e) {
                var previewImage = $('#img-preview-2');
                previewImage.attr('src', e.target.result);
            };

            reader.readAsDataURL(file);
        });
    </script>
@endpush
