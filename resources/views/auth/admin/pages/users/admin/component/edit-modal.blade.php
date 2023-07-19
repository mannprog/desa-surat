<div class="modal fade" id="modal-edit">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="updateForm" name="updateForm" method="post">
                @csrf
                @method('PUT')
                <input type="hidden" name="admin_id" id="edit_admin_id">
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
                            <label for="tempat_lahir" class="form-label">Tempat Lahir<span
                                    class="text-danger">*</span></label>
                            <input type="text" class="form-control form-control-sm" id="tempat_lahir"
                                name="tempat_lahir">
                        </div>
                        <div class="col-lg-6">
                            <label for="tanggal_lahir" class="form-label">Tanggal Lahir<span
                                    class="text-danger">*</span></label>
                            <input type="date" class="form-control form-control-sm" id="tanggal_lahir"
                                name="tanggal_lahir">
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
                    <div class="row mb-3">
                        <div class="col-lg-6">
                            <label for="pendidikan_terakhir" class="form-label">Pendidikan Terakhir<span
                                    class="text-danger">*</span></label>
                            <select class="form-select" aria-label="Default select example" name="pendidikan_terakhir"
                                id="pendidikan_terakhir">
                                <option selected disabled>---Pilih Pendidikan Terakhir---</option>
                                <option value="sma">SMA/Sederajat</option>
                                <option value="d1">D1/Sederajat</option>
                                <option value="d2">D2/Sederajat</option>
                                <option value="d3">D3/Sederajat</option>
                                <option value="s1">S1/Sederajat</option>
                                <option value="s2">S2/Sederajat</option>
                                <option value="s3">S3/Sederajat</option>
                            </select>
                        </div>
                        <div class="col-lg-6">
                            <label for="jabatan" class="form-label">Jabatan<span
                                    class="text-danger">*</span></label>
                            <select class="form-select" aria-label="Default select example" name="jabatan"
                                id="jabatan">
                                <option selected disabled>---Pilih Jabatan---</option>
                                <option value="admin">Admin</option>
                                <option value="kepaladesa">Kepala Desa</option>
                                <option value="kasipelayanan">KASI Pelayanan</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-lg-6">
                            <label for="no_sk" class="form-label">No SK Pengangkatan<span
                                    class="text-danger">*</span></label>
                            <input type="text" class="form-control form-control-sm" id="no_sk"
                                name="no_sk">
                        </div>
                        <div class="col-lg-6">
                            <label for="tmt_sk" class="form-label">TMT SK Pengangkatan<span
                                    class="text-danger">*</span></label>
                            <input type="date" class="form-control form-control-sm" id="tmt_sk"
                                name="tmt_sk">
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
                            <label for="pasangan" class="form-label">Nama Pasangan<span
                                    class="text-danger">*</span></label>
                            <input type="text" class="form-control form-control-sm" id="pasangan"
                                name="pasangan">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-lg-6">
                            <label for="ayah" class="form-label">Nama Ayah<span
                                    class="text-danger">*</span></label>
                            <input type="text" class="form-control form-control-sm" id="ayah"
                                name="ayah">
                        </div>
                        <div class="col-lg-6">
                            <label for="ibu" class="form-label">Nama Ibu<span
                                    class="text-danger">*</span></label>
                            <input type="text" class="form-control form-control-sm" id="ibu"
                                name="ibu">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-lg-6">
                            <label for="anak" class="form-label">Nama Anak<span
                                    class="text-danger">*</span></label>
                            <input type="text" class="form-control form-control-sm" id="anak"
                                name="anak">
                        </div>
                        <div class="col-lg-6">
                            <label for="alamat" class="form-label">Alamat<span class="text-danger">*</span></label>
                            <input type="text" class="form-control form-control-sm" id="alamat"
                                name="alamat">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-lg-6">
                            <label for="no_hp" class="form-label">No Handphone<span
                                    class="text-danger">*</span></label>
                            <input type="text" class="form-control form-control-sm" id="no_hp"
                                name="no_hp">
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
                    <button type="button" class="btn btn-primary" id="updateBtn">Simpan Perubahan</button>
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
