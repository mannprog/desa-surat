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
                <input type="hidden" name="petugas_id" id="petugas_id">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="name">Nama Lengkap<span class="text-danger">*</span></label>
                                <input type="text" class="form-control form-control-sm mr-2" name="name"
                                    id="name">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="username">Username<span class="text-danger">*</span></label>
                                <input type="text" class="form-control form-control-sm mr-2" name="username"
                                    id="username">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="email">Email<span class="text-danger">*</span></label>
                                <input type="email" class="form-control form-control-sm mr-2" name="email"
                                    id="email">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="password">Password<span class="text-danger">*</span></label>
                                <input type="password" class="form-control form-control-sm mr-2" name="password"
                                    id="password">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="jenis_kelamin">Jenis Kelamin<span class="text-danger">*</span></label>
                                <select name="jenis_kelamin" id="jenis_kelamin" class="form-control form-control-sm">
                                    <option selected disabled>---Pilih Jenis Kelamin---</option>
                                    <option value="l">Laki-laki</option>
                                    <option value="p">Perempuan</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="pendidikan_terakhir">Pendidikan Terakhir<span
                                        class="text-danger">*</span></label>
                                <select name="pendidikan_terakhir" id="pendidikan_terakhir"
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
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="role">Jabatan<span class="text-danger">*</span></label>
                                <select class="form-control form-control-sm" name="role" id="role">
                                    <option selected disabled>---Pilih Jabatan---</option>
                                    <option value="1">Admin</option>
                                    <option value="2">Kepala Sekolah</option>
                                    <option value="3">Petugas</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="status">Status Kepegawaian<span class="text-danger">*</span></label>
                                <select name="status" id="status" class="form-control form-control-sm">
                                    <option selected disabled>---Pilih Status Kepegawaian---</option>
                                    <option value="pns">PNS</option>
                                    <option value="nonpns">Non PNS</option>
                                </select>
                            </div>
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
