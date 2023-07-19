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
                <input type="hidden" name="petugas_id" id="edit_petugas_id">
                <div class="modal-body">
                    <h5 class="font-weight-bold border-bottom pb-1">Data Pribadi</h5>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="name">Nama Lengkap<span class="text-danger">*</span></label>
                                <input type="text" class="form-control form-control-sm mr-2" name="name"
                                    id="edit_name">
                            </div>
                            <div class="form-group">
                                <label for="edit_nip">NIP<span class="text-danger">*</span></label>
                                <input type="text" class="form-control form-control-sm mr-2" name="nip"
                                    id="edit_nip">
                            </div>
                            <div class="form-group">
                                <label for="edit_nuptk">NUPTK<span class="text-danger">*</span></label>
                                <input type="text" class="form-control form-control-sm mr-2" name="nuptk"
                                    id="edit_nuptk">
                            </div>
                            <div class="form-group">
                                <label for="edit_nik">NIK<span class="text-danger">*</span></label>
                                <input type="text" class="form-control form-control-sm mr-2" name="nik"
                                    id="edit_nik">
                            </div>
                            <div class="form-group">
                                <label for="jenis_kelamin">Jenis Kelamin<span class="text-danger">*</span></label>
                                <select name="jenis_kelamin" id="edit_jenis_kelamin"
                                    class="form-control form-control-sm">
                                    <option selected disabled>---Pilih Jenis Kelamin---</option>
                                    <option value="l">Laki-laki</option>
                                    <option value="p">Perempuan</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="role">Jabatan<span class="text-danger">*</span></label>
                                <select class="form-control form-control-sm" name="role" id="edit_role">
                                    <option selected disabled>---Pilih Jabatan---</option>
                                    <option value="1">Admin</option>
                                    <option value="2">Kepala Sekolah</option>
                                    <option value="3">Petugas</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="status">Status Kepegawaian<span class="text-danger">*</span></label>
                                <select name="status" id="edit_status" class="form-control form-control-sm">
                                    <option selected disabled>---Pilih Status Kepegawaian---</option>
                                    <option value="pns">PNS</option>
                                    <option value="nonpns">Non PNS</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="pendidikan_terakhir">Pendidikan Terakhir<span
                                        class="text-danger">*</span></label>
                                <select name="pendidikan_terakhir" id="edit_pendidikan_terakhir"
                                    class="form-control form-control-sm">
                                    <option selected disabled>Pendidikan Terakhir</option>
                                    <option value="sma">SMA/Sederajat</option>
                                    <option value="d1">D1/Sederajat</option>
                                    <option value="d2">D2/Sederajat</option>
                                    <option value="d3">D3/Sederajat</option>
                                    <option value="s1">S1/Sederajat</option>
                                    <option value="s2">S2/Sederajat</option>
                                    <option value="s3">S3/Sederajat</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="edit_tempat_lahir">Tempat Lahir<span class="text-danger">*</span></label>
                                <input type="text" class="form-control form-control-sm mr-2" name="tempat_lahir"
                                    id="edit_tempat_lahir">
                            </div>
                            <div class="form-group">
                                <label for="edit_tanggal_lahir">Tanggal Lahir<span class="text-danger">*</span></label>
                                <input type="date" class="form-control form-control-sm mr-2" name="tanggal_lahir"
                                    id="edit_tanggal_lahir">
                            </div>
                            <div class="form-group">
                                <label for="edit_alamat">Alamat Lengkap<span class="text-danger">*</span></label>
                                <textarea class="form-control" name="alamat" id="edit_alamat" rows="4"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="foto">Foto<span class="text-danger">*</span></label>
                                <div class="input-group mb-3">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="foto"
                                            name="foto">
                                        <label class="custom-file-label" for="foto">Choose file</label>
                                    </div>
                                </div>
                                <img id="img-preview" class="col-lg-6 img-fluid">
                            </div>
                        </div>
                    </div>
                    <h5 class="font-weight-bold border-bottom pb-1">Data Kontak</h5>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="username">Username GTK<span class="text-danger">*</span></label>
                                <input type="text" class="form-control form-control-sm mr-2" name="username"
                                    id="edit_username">
                            </div>
                            <div class="form-group">
                                <label for="email">Email GTK<span class="text-danger">*</span></label>
                                <input type="email" class="form-control form-control-sm mr-2" name="email"
                                    id="edit_email">
                            </div>
                            <div class="form-group">
                                <label for="edit_no_handphone">No Handphone<span class="text-danger">*</span></label>
                                <input type="text" class="form-control form-control-sm mr-2" name="no_handphone"
                                    id="edit_no_handphone">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="edit_facebook">Facebook<span class="text-danger">*</span></label>
                                <input type="text" class="form-control form-control-sm mr-2" name="facebook"
                                    id="edit_facebook">
                            </div>
                            <div class="form-group">
                                <label for="edit_instagram">Instagram<span class="text-danger">*</span></label>
                                <input type="text" class="form-control form-control-sm mr-2" name="instagram"
                                    id="edit_instagram">
                            </div>
                            <div class="form-group">
                                <label for="edit_twitter">Twitter<span class="text-danger">*</span></label>
                                <input type="text" class="form-control form-control-sm mr-2" name="twitter"
                                    id="edit_twitter">
                            </div>
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
