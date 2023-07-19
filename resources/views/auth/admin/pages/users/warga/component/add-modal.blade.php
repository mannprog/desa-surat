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
                <input type="hidden" name="warga_id" id="warga_id">
                <div class="modal-body">
                    <div class="row mb-3">
                        <div class="col-lg-6">
                            <label for="name" class="form-label">Nama Lengkap<span
                                    class="text-danger">*</span></label>
                            <input type="text" class="form-control form-control-sm" id="name" name="name">
                        </div>
                        <div class="col-lg-6">
                            <label for="username" class="form-label">Username<span class="text-danger">*</span></label>
                            <input type="text" class="form-control form-control-sm" id="username" name="username">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-lg-6">
                            <label for="email" class="form-label">Email<span class="text-danger">*</span></label>
                            <input type="email" class="form-control form-control-sm" id="email" name="email">
                        </div>
                        <div class="col-lg-6">
                            <label for="password" class="form-label">Password<span class="text-danger">*</span></label>
                            <input type="password" class="form-control form-control-sm" id="password" name="password">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-lg-6">
                            <label for="no_kk" class="form-label">No. Kartu Keluarga<span
                                    class="text-danger">*</span></label>
                            <input type="text" class="form-control form-control-sm" id="no_kk" name="no_kk">
                        </div>
                        <div class="col-lg-6">
                            <label for="nik" class="form-label">Nomor Induk Kependudukan<span
                                    class="text-danger">*</span></label>
                            <input type="text" class="form-control form-control-sm" id="nik" name="nik">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-lg-6">
                            <label for="jenis_kelamin" class="form-label">Jenis Kelamin<span
                                    class="text-danger">*</span></label>
                            <select class="form-select" aria-label="Default select example" name="jenis_kelamin"
                                id="jenis_kelamin">
                                <option selected disabled>---Pilih Jenis Kelamin---</option>
                                <option value="l">Laki-laki</option>
                                <option value="p">Perempuan</option>
                            </select>
                        </div>
                        <div class="col-lg-6">
                            <label for="agama" class="form-label">Agama<span class="text-danger">*</span></label>
                            <select class="form-select" aria-label="Default select example" name="agama"
                                id="agama">
                                <option selected disabled>---Pilih Agama---</option>
                                <option value="islam">Islam</option>
                                <option value="katolik">Kristen Katolik</option>
                                <option value="protestan">Kristen Protestan</option>
                                <option value="hindu">Hindu</option>
                                <option value="buddha">Buddha</option>
                                <option value="khonghucu">Khonghucu</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <label for="status" class="form-label">Status Perkawinan<span
                                    class="text-danger">*</span></label>
                            <select class="form-select" aria-label="Default select example" name="status"
                                id="status">
                                <option selected disabled>---Pilih Status Perkawinan---</option>
                                <option value="belumkawin">Belum Kawin</option>
                                <option value="kawin">Kawin</option>
                                <option value="ceraihidup">Cerai Hidup</option>
                                <option value="ceraimati">Cerai Mati</option>
                            </select>
                        </div>
                        <div class="col-lg-6">
                            <label for="foto" class="form-label">Foto</label>
                            <input class="form-control" type="file" id="foto" name="foto">
                            <img id="img-preview" class="col-lg-6 img-fluid mt-2">
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
        $('#foto').change(function(e) {
            var file = e.target.files[0];
            var reader = new FileReader();

            reader.onload = function(e) {
                var previewImage = $('#img-preview');
                previewImage.attr('src', e.target.result);
            };

            reader.readAsDataURL(file);
        });
    </script>
@endpush
