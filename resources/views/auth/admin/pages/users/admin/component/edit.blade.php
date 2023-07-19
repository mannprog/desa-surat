@extends('auth.admin.layouts.app', ['title' => 'Edit User'])

@section('content')
    <div class="app-content pt-3 p-md-3 p-lg-4">
        <div class="container-xl">
            <div class="row justify-content-between">
                <div class="col-auto">
                    <h1 class="app-page-title">Edit User - {{ $admin->name }}</h1>
                </div>
                <div class="col-auto">
                    <a href="{{ route('kelola.admin.index') }}" class="btn btn-sm btn-secondary shadow-sm">
                        Kembali</a>
                </div>
            </div>

            <div class="app-card app-card-chart h-100 shadow-sm">
                <div class="app-card-body p-3 p-lg-4">
                    <form action="{{ route('kelola.admin.update', $admin->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="admin_id" id="admin_id" value="{{ $admin->id }}">
                        <div class="modal-body">
                            <div class="row mb-3">
                                <div class="col-lg-6">
                                    <label for="name" class="form-label">Nama Lengkap<span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control form-control-sm" id="name" name="name"
                                        autofocus required value="{{ old('name', $admin->name) }}">
                                </div>
                                <div class="col-lg-6">
                                    <label for="username" class="form-label">Username<span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control form-control-sm" id="username"
                                        name="username" required value="{{ old('username', $admin->username) }}">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-lg-6">
                                    <label for="email" class="form-label">Email<span class="text-danger">*</span></label>
                                    <input type="email" class="form-control form-control-sm" id="email" name="email"
                                        required value="{{ old('email', $admin->email) }}">
                                </div>
                                <div class="col-lg-6">
                                    <label for="no_hp" class="form-label">No Handphone<span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control form-control-sm" id="no_hp" name="no_hp"
                                        required value="{{ old('no_hp', $admin->no_hp) }}">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-lg-6">
                                    <label for="tempat_lahir" class="form-label">Tempat Lahir<span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control form-control-sm" id="tempat_lahir"
                                        name="tempat_lahir" required
                                        value="{{ old('tempat_lahir', $admin->tempat_lahir) }}">
                                </div>
                                <div class="col-lg-6">
                                    <label for="tanggal_lahir" class="form-label">Tanggal Lahir<span
                                            class="text-danger">*</span></label>
                                    <input type="date" class="form-control form-control-sm" id="tanggal_lahir"
                                        name="tanggal_lahir" required
                                        value="{{ old('tanggal_lahir', $admin->tanggal_lahir) }}">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-lg-6">
                                    <label for="jenis_kelamin" class="form-label">Jenis Kelamin<span
                                            class="text-danger">*</span></label>
                                    <select class="form-select" aria-label="Default select example" name="jenis_kelamin"
                                        id="jenis_kelamin" required>
                                        <option selected disabled>---Pilih Jenis Kelamin---</option>
                                        <option value="l"
                                            {{ old('jenis_kelamin', $admin->adminDetail->jenis_kelamin) == 'l' ? 'selected' : '' }}>
                                            Laki-laki</option>
                                        <option value="p"
                                            {{ old('jenis_kelamin', $admin->adminDetail->jenis_kelamin) == 'p' ? 'selected' : '' }}>
                                            Perempuan</option>
                                    </select>
                                </div>
                                <div class="col-lg-6">
                                    <label for="agama" class="form-label">Agama<span class="text-danger">*</span></label>
                                    <select class="form-select" aria-label="Default select example" name="agama"
                                        id="agama" required>
                                        <option selected disabled>---Pilih Agama---</option>
                                        <option value="islam"
                                            {{ old('agama', $admin->adminDetail->agama) == 'islam' ? 'selected' : '' }}>
                                            Islam</option>
                                        <option value="katolik"
                                            {{ old('agama', $admin->adminDetail->agama) == 'katolik' ? 'selected' : '' }}>
                                            Kristen Katolik</option>
                                        <option value="protestan"
                                            {{ old('agama', $admin->adminDetail->agama) == 'protestan' ? 'selected' : '' }}>
                                            Kristen Protestan</option>
                                        <option value="hindu"
                                            {{ old('agama', $admin->adminDetail->agama) == 'hindu' ? 'selected' : '' }}>
                                            Hindu</option>
                                        <option value="buddha"
                                            {{ old('agama', $admin->adminDetail->agama) == 'buddha' ? 'selected' : '' }}>
                                            Buddha</option>
                                        <option value="khonghucu"
                                            {{ old('agama', $admin->adminDetail->agama) == 'khonghucu' ? 'selected' : '' }}>
                                            Khonghucu</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-lg-6">
                                    <label for="pendidikan_terakhir" class="form-label">Pendidikan Terakhir<span
                                            class="text-danger">*</span></label>
                                    <select class="form-select" aria-label="Default select example"
                                        name="pendidikan_terakhir" id="pendidikan_terakhir" required>
                                        <option selected disabled>---Pilih Pendidikan Terakhir---</option>
                                        <option value="sma"
                                            {{ old('pendidikan_terakhir', $admin->adminDetail->pendidikan_terakhir) === 'sma' ? 'selected' : '' }}>
                                            SMA/Sederajat</option>
                                        <option value="d1"
                                            {{ old('pendidikan_terakhir', $admin->adminDetail->pendidikan_terakhir) === 'd1' ? 'selected' : '' }}>
                                            D1/Sederajat</option>
                                        <option value="d2"
                                            {{ old('pendidikan_terakhir', $admin->adminDetail->pendidikan_terakhir) === 'd2' ? 'selected' : '' }}>
                                            D2/Sederajat</option>
                                        <option value="d3"
                                            {{ old('pendidikan_terakhir', $admin->adminDetail->pendidikan_terakhir) === 'd3' ? 'selected' : '' }}>
                                            D3/Sederajat</option>
                                        <option value="s1"
                                            {{ old('pendidikan_terakhir', $admin->adminDetail->pendidikan_terakhir) === 's1' ? 'selected' : '' }}>
                                            S1/Sederajat</option>
                                        <option value="s2"
                                            {{ old('pendidikan_terakhir', $admin->adminDetail->pendidikan_terakhir) === 's2' ? 'selected' : '' }}>
                                            S2/Sederajat</option>
                                        <option value="s3"
                                            {{ old('pendidikan_terakhir', $admin->adminDetail->pendidikan_terakhir) === 's3' ? 'selected' : '' }}>
                                            S3/Sederajat</option>
                                    </select>
                                </div>
                                <div class="col-lg-6">
                                    <label for="jabatan" class="form-label">Jabatan<span
                                            class="text-danger">*</span></label>
                                    <select class="form-select" aria-label="Default select example" name="jabatan"
                                        id="jabatan" required>
                                        <option selected disabled>---Pilih Jabatan---</option>
                                        <option value="admin"
                                            {{ old('jabatan', $admin->adminDetail->jabatan) === 'admin' ? 'selected' : '' }}>
                                            Admin</option>
                                        <option value="kepaladesa"
                                            {{ old('jabatan', $admin->adminDetail->jabatan) === 'kepaladesa' ? 'selected' : '' }}>
                                            Kepala Desa</option>
                                        <option value="kasipelayanan"
                                            {{ old('jabatan', $admin->adminDetail->jabatan) === 'kasipelayanan' ? 'selected' : '' }}>
                                            KASI Pelayanan</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-lg-6">
                                    <label for="no_sk" class="form-label">No SK Pengangkatan<span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control form-control-sm" id="no_sk"
                                        name="no_sk" required value="{{ old('no_sk', $admin->adminDetail->no_sk) }}">
                                </div>
                                <div class="col-lg-6">
                                    <label for="tmt_sk" class="form-label">TMT SK Pengangkatan<span
                                            class="text-danger">*</span></label>
                                    <input type="date" class="form-control form-control-sm" id="tmt_sk"
                                        name="tmt_sk" required value="{{ old('tmt_sk', $admin->adminDetail->tmt_sk) }}">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-lg-6">
                                    <label for="status" class="form-label">Status Perkawinan<span
                                            class="text-danger">*</span></label>
                                    <select class="form-select" aria-label="Default select example" name="status"
                                        id="status">
                                        <option selected disabled>---Pilih Status Perkawinan---</option>
                                        <option value="belumkawin"
                                            {{ old('status', $admin->adminDetail->status) === 'belumkawin' ? 'selected' : '' }}>
                                            Belum Kawin</option>
                                        <option value="kawin"
                                            {{ old('status', $admin->adminDetail->status) === 'kawin' ? 'selected' : '' }}>
                                            Kawin</option>
                                        <option value="ceraihidup"
                                            {{ old('status', $admin->adminDetail->status) === 'ceraihidup' ? 'selected' : '' }}>
                                            Cerai Hidup</option>
                                        <option value="ceraimati"
                                            {{ old('status', $admin->adminDetail->status) === 'ceraimati' ? 'selected' : '' }}>
                                            Cerai Mati</option>
                                    </select>
                                </div>
                                <div class="col-lg-6">
                                    <label for="pasangan" class="form-label">Nama Pasangan<span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control form-control-sm" id="pasangan"
                                        name="pasangan" required value="{{ old('pasangan', $admin->pasangan) }}"
                                        aria-describedby="pasanganHelp">
                                    <div id="pasanganHelp" class="form-text">Bila tidak ada isi -.</div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-lg-6">
                                    <label for="ayah" class="form-label">Nama Ayah<span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control form-control-sm" id="ayah"
                                        name="ayah" required value="{{ old('ayah', $admin->ayah) }}">
                                </div>
                                <div class="col-lg-6">
                                    <label for="ibu" class="form-label">Nama Ibu<span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control form-control-sm" id="ibu"
                                        name="ibu" required value="{{ old('ibu', $admin->ibu) }}">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-lg-6">
                                    <label for="anak" class="form-label">Nama Anak<span
                                            class="text-danger">*</span></label>
                                    <input id="anak" type="hidden" name="anak" required
                                        value="{{ old('anak', $admin->adminDetail->anak) }}" aria-describedby="anakHelp">
                                    <trix-editor input="anak"></trix-editor>
                                    <div id="anakHelp" class="form-text">Bila tidak ada isi -.</div>
                                </div>
                                <div class="col-lg-6">
                                    <label for="alamat" class="form-label">Alamat<span
                                            class="text-danger">*</span></label>
                                    <input id="alamat" type="hidden" name="alamat" required
                                        value="{{ old('alamat', $admin->adminDetail->alamat) }}">
                                    <trix-editor input="alamat"></trix-editor>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-lg-6">
                                    <label for="foto" class="form-label">Foto</label>
                                    <input class="form-control" type="file" id="foto" name="foto">
                                    <img id="img-preview" class="col-lg-6 img-fluid mt-2">
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-end">
                            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('custom-scripts')
    <script>
        document.addEventListener('trix-file-accept', function(e) {
            e.preventDefault();
        });

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
