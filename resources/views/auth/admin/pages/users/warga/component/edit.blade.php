@extends('auth.admin.layouts.app', ['title' => 'Edit User'])

@section('content')
    <div class="app-content pt-3 p-md-3 p-lg-4">
        <div class="container-xl">
            <div class="row justify-content-between">
                <div class="col-auto">
                    <h1 class="app-page-title">Edit User - {{ $warga->name }}</h1>
                </div>
                <div class="col-auto">
                    <a href="{{ route('kelola.warga.index') }}" class="btn btn-sm btn-secondary shadow-sm">
                        Kembali</a>
                </div>
            </div>

            <div class="app-card app-card-chart h-100 shadow-sm">
                <div class="app-card-body p-3 p-lg-4">
                    <form action="{{ route('kelola.warga.update', $warga->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="warga_id" id="warga_id" value="{{ $warga->id }}">
                        <div class="modal-body">
                            <div class="row mb-3">
                                <div class="col-lg-6">
                                    <label for="name" class="form-label">Nama Lengkap<span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control form-control-sm" id="name" name="name"
                                        autofocus required value="{{ old('name', $warga->name) }}">
                                </div>
                                <div class="col-lg-6">
                                    <label for="username" class="form-label">Username<span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control form-control-sm" id="username"
                                        name="username" required value="{{ old('username', $warga->username) }}">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-lg-6">
                                    <label for="email" class="form-label">Email<span class="text-danger">*</span></label>
                                    <input type="email" class="form-control form-control-sm" id="email" name="email"
                                        required value="{{ old('email', $warga->email) }}">
                                </div>
                                <div class="col-lg-6">
                                    <label for="no_hp" class="form-label">No Handphone<span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control form-control-sm" id="no_hp" name="no_hp"
                                        required value="{{ old('no_hp', $warga->wargaDetail->no_hp) }}">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-lg-6">
                                    <label for="no_kk" class="form-label">No. Kartu Keluarga<span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control form-control-sm" id="no_kk" name="no_kk"
                                        autofocus required value="{{ old('no_kk', $warga->wargaDetail->no_kk) }}">
                                </div>
                                <div class="col-lg-6">
                                    <label for="nik" class="form-label">Nomor Induk Kependudukan<span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control form-control-sm" id="nik" name="nik"
                                        required value="{{ old('nik', $warga->wargaDetail->nik) }}">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-lg-6">
                                    <label for="tempat_lahir" class="form-label">Tempat Lahir<span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control form-control-sm" id="tempat_lahir"
                                        name="tempat_lahir" required
                                        value="{{ old('tempat_lahir', $warga->wargaDetail->tempat_lahir) }}">
                                </div>
                                <div class="col-lg-6">
                                    <label for="tanggal_lahir" class="form-label">Tanggal Lahir<span
                                            class="text-danger">*</span></label>
                                    <input type="date" class="form-control form-control-sm" id="tanggal_lahir"
                                        name="tanggal_lahir" required
                                        value="{{ old('tanggal_lahir', $warga->wargaDetail->tanggal_lahir) }}">
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
                                            {{ old('jenis_kelamin', $warga->wargaDetail->jenis_kelamin) == 'l' ? 'selected' : '' }}>
                                            Laki-laki</option>
                                        <option value="p"
                                            {{ old('jenis_kelamin', $warga->wargaDetail->jenis_kelamin) == 'p' ? 'selected' : '' }}>
                                            Perempuan</option>
                                    </select>
                                </div>
                                <div class="col-lg-6">
                                    <label for="agama" class="form-label">Agama<span
                                            class="text-danger">*</span></label>
                                    <select class="form-select" aria-label="Default select example" name="agama"
                                        id="agama" required>
                                        <option selected disabled>---Pilih Agama---</option>
                                        <option value="islam"
                                            {{ old('agama', $warga->wargaDetail->agama) == 'islam' ? 'selected' : '' }}>
                                            Islam</option>
                                        <option value="katolik"
                                            {{ old('agama', $warga->wargaDetail->agama) == 'katolik' ? 'selected' : '' }}>
                                            Kristen Katolik</option>
                                        <option value="protestan"
                                            {{ old('agama', $warga->wargaDetail->agama) == 'protestan' ? 'selected' : '' }}>
                                            Kristen Protestan</option>
                                        <option value="hindu"
                                            {{ old('agama', $warga->wargaDetail->agama) == 'hindu' ? 'selected' : '' }}>
                                            Hindu</option>
                                        <option value="buddha"
                                            {{ old('agama', $warga->wargaDetail->agama) == 'buddha' ? 'selected' : '' }}>
                                            Buddha</option>
                                        <option value="khonghucu"
                                            {{ old('agama', $warga->wargaDetail->agama) == 'khonghucu' ? 'selected' : '' }}>
                                            Khonghucu</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-lg-6">
                                    <label for="gol_darah" class="form-label">Golongan Darah</label>
                                    <select class="form-select" aria-label="Default select example" name="gol_darah"
                                        id="gol_darah">
                                        <option selected disabled>---Pilih Golongan Darah---</option>
                                        <option value="a"
                                            {{ old('gol_darah', $warga->wargaDetail->gol_darah) === 'a' ? 'selected' : '' }}>
                                            A</option>
                                        <option value="b"
                                            {{ old('gol_darah', $warga->wargaDetail->gol_darah) === 'b' ? 'selected' : '' }}>
                                            B</option>
                                        <option value="ab"
                                            {{ old('gol_darah', $warga->wargaDetail->gol_darah) === 'ab' ? 'selected' : '' }}>
                                            AB</option>
                                        <option value="o"
                                            {{ old('gol_darah', $warga->wargaDetail->gol_darah) === 'o' ? 'selected' : '' }}>
                                            O</option>
                                    </select>
                                </div>
                                <div class="col-lg-6">
                                    <label for="pekerjaan" class="form-label">Pekerjaan</label>
                                    <input type="text" class="form-control form-control-sm" id="pekerjaan"
                                        name="pekerjaan" required
                                        value="{{ old('pekerjaan', $warga->wargaDetail->pekerjaan) }}">
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
                                            {{ old('status', $warga->wargaDetail->status) === 'belumkawin' ? 'selected' : '' }}>
                                            Belum Kawin</option>
                                        <option value="kawin"
                                            {{ old('status', $warga->wargaDetail->status) === 'kawin' ? 'selected' : '' }}>
                                            Kawin</option>
                                        <option value="ceraihidup"
                                            {{ old('status', $warga->wargaDetail->status) === 'ceraihidup' ? 'selected' : '' }}>
                                            Cerai Hidup</option>
                                        <option value="ceraimati"
                                            {{ old('status', $warga->wargaDetail->status) === 'ceraimati' ? 'selected' : '' }}>
                                            Cerai Mati</option>
                                    </select>
                                </div>
                                <div class="col-lg-6">
                                    <label for="pasangan" class="form-label">Nama Pasangan<span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control form-control-sm" id="pasangan"
                                        name="pasangan" required value="{{ old('pasangan', $warga->pasangan) }}"
                                        aria-describedby="pasanganHelp">
                                    <div id="pasanganHelp" class="form-text">Bila tidak ada isi -.</div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-lg-6">
                                    <label for="ayah" class="form-label">Nama Ayah<span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control form-control-sm" id="ayah"
                                        name="ayah" required value="{{ old('ayah', $warga->ayah) }}">
                                </div>
                                <div class="col-lg-6">
                                    <label for="ibu" class="form-label">Nama Ibu<span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control form-control-sm" id="ibu"
                                        name="ibu" required value="{{ old('ibu', $warga->ibu) }}">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-lg-6">
                                    <label for="anak" class="form-label">Nama Anak<span
                                            class="text-danger">*</span></label>
                                    <input id="anak" type="hidden" name="anak" required
                                        value="{{ old('anak', $warga->wargaDetail->anak) }}" aria-describedby="anakHelp">
                                    <trix-editor input="anak"></trix-editor>
                                    <div id="anakHelp" class="form-text">Bila tidak ada isi -.</div>
                                </div>
                                <div class="col-lg-6">
                                    <label for="alamat" class="form-label">Alamat Lengkap<span
                                            class="text-danger">*</span></label>
                                    <input id="alamat" type="hidden" name="alamat" required
                                        value="{{ old('alamat', $warga->wargaDetail->alamat) }}"
                                        aria-describedby="alamatHelp">
                                    <trix-editor input="alamat"></trix-editor>
                                    <div id="alamatHelp" class="form-text">Ex: Dsn.Cileles RT.001 RW.002, Ds.Cileles,
                                        Kec.Jatinangor, Kab.Sumedang 45363.</div>
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
