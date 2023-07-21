@extends('auth.admin.layouts.app', ['title' => 'Detail Permohonan'])

@section('content')
    <div class="app-content pt-3 p-md-3 p-lg-4">
        <div class="container-xl">
            <div class="row justify-content-between">
                <div class="col-auto">
                    <h1 class="app-page-title">Detail Permohonan - {{ $data->user->name }}</h1>
                </div>
                <div class="col-auto">
                    <a href="{{ route('pengantar.skck.index') }}" class="btn btn-sm btn-secondary shadow">
                        Kembali</a>
                </div>
            </div>

            <div class="app-card app-card-chart h-100 shadow-sm">
                @if ($data->status === 'belumditentukan')
                    <div class="app-card-header p-3">
                        <a href="#" class="btn btn-sm btn-primary shadow" data-toggle="modal"
                            data-target="#accModal">Setuju</a>
                        <a href="#" class="btn btn-sm btn-danger shadow" data-toggle="modal"
                            data-target="#rejModal">Tolak</a>

                        @include('auth.admin.pages.surat.skck.component.accOrRej')
                    </div>
                @elseif ($data->status === 'proses')
                    <div class="app-card-header p-3">
                        <a href="#" class="btn btn-sm btn-success shadow" data-toggle="modal"
                            data-target="#uploadModal">Upload
                            Surat</a>
                        @include('auth.admin.pages.surat.skck.component.upload')
                    </div>
                @endif
                <div class="app-card-body p-3 p-lg-4">
                    <div class="row g-3 align-items-center">
                        <div class="col-12 col-lg-3 text-center mb-3 mb-lg-0">
                            <img class="img-fluid" src="{{ asset('admin/images/profiles/' . $data->user->foto) }}"
                                style="height: 150px">
                        </div>
                        <div class="col-12 col-lg-9 text-start">
                            <h5 class="fw-bold">Data Permohonan</h5>
                            <div class="container">
                                <div class="row align-items-center">
                                    <div class="col-5 col-lg-3">
                                        <p>Tanggal Permohonan</p>
                                    </div>
                                    <div class="col-1 col-lg-1 text-center">
                                        <p>:</p>
                                    </div>
                                    <div class="col-6 col-lg-8">
                                        <p>{{ \Carbon\Carbon::parse($data->tanggal_request)->format('d M Y H:i') }}</p>
                                    </div>
                                </div>
                                <div class="row align-items-center">
                                    <div class="col-5 col-lg-3">
                                        <p>Status Permohonan</p>
                                    </div>
                                    <div class="col-1 col-lg-1 text-center">
                                        <p>:</p>
                                    </div>
                                    <div class="col-6 col-lg-8">
                                        <p>
                                            @if ($data->status === 'selesai')
                                                Surat Pengantar Telah Selesai Dibuat
                                            @elseif ($data->status === 'tolak')
                                                Permohonan Ditolak
                                            @elseif ($data->status === 'proses')
                                                Surat Pengantar Sedang Diproses
                                            @else
                                                Belum Ditentukan
                                            @endif
                                        </p>
                                    </div>
                                </div>
                                <div class="row align-items-center">
                                    <div class="col-5 col-lg-3">
                                        <p>Kartu Tanda Penduduk</p>
                                    </div>
                                    <div class="col-1 col-lg-1 text-center">
                                        <p>:</p>
                                    </div>
                                    <div class="col-6 col-lg-8">
                                        <img src="{{ asset('file/permohonan/skck/' . $data->ktp) }}" class="img-fluid py-2">
                                    </div>
                                </div>
                                <div class="row align-items-center">
                                    <div class="col-5 col-lg-3">
                                        <p>Kartu Keluarga</p>
                                    </div>
                                    <div class="col-1 col-lg-1 text-center">
                                        <p>:</p>
                                    </div>
                                    <div class="col-6 col-lg-8">
                                        <img src="{{ asset('file/permohonan/skck/' . $data->kk) }}" class="img-fluid py-2">
                                    </div>
                                </div>
                            </div>
                            <div class="mt-3">
                                <h5 class="fw-bold">Data Pribadi</h5>
                                <div class="container">
                                    <div class="row align-items-center">
                                        <div class="col-5 col-lg-3">
                                            <p>No. Kartu Keluarga</p>
                                        </div>
                                        <div class="col-1 col-lg-1 text-center">
                                            <p>:</p>
                                        </div>
                                        <div class="col-6 col-lg-8">
                                            <p>{{ $data->user->wargaDetail->no_kk }}</p>
                                        </div>
                                    </div>
                                    <div class="row align-items-center">
                                        <div class="col-5 col-lg-3">
                                            <p>Nomor Induk Kependudukan</p>
                                        </div>
                                        <div class="col-1 col-lg-1 text-center">
                                            <p>:</p>
                                        </div>
                                        <div class="col-6 col-lg-8">
                                            <p>{{ $data->user->wargaDetail->nik }}</p>
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
                                                @if ($data->user->wargaDetail->tempat_lahir)
                                                    {{ $data->user->wargaDetail->tempat_lahir }},
                                                @else
                                                    -
                                                @endif
                                                @if ($data->user->wargaDetail->tanggal_lahir)
                                                    {{ \Carbon\Carbon::parse($data->user->wargaDetail->tanggal_lahir)->format('d M Y') }}
                                                @endif
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
                                                @if ($data->user->wargaDetail->jenis_kelamin === 'l')
                                                    Laki-laki
                                                @else
                                                    Perempuan
                                                @endif
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
                                                @if ($data->user->wargaDetail->gol_darah === 'a')
                                                    A
                                                @elseif ($data->user->wargaDetail->gol_darah === 'b')
                                                    B
                                                @elseif ($data->user->wargaDetail->gol_darah === 'ab')
                                                    AB
                                                @elseif ($data->user->wargaDetail->gol_darah === 'o')
                                                    O
                                                @else
                                                    -
                                                @endif
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
                                                @if ($data->user->wargaDetail->alamat)
                                                    {!! $data->user->wargaDetail->alamat !!}
                                                @else
                                                    -
                                                @endif
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
                                                @if ($data->user->wargaDetail->agama === 'islam')
                                                    Islam
                                                @elseif ($data->user->wargaDetail->agama === 'katolik')
                                                    Kristen Katolik
                                                @elseif ($data->user->wargaDetail->agama === 'protestan')
                                                    Kristen Protestan
                                                @elseif ($data->user->wargaDetail->agama === 'hindu')
                                                    Hindu
                                                @elseif ($data->user->wargaDetail->agama === 'buddha')
                                                    Buddha
                                                @else
                                                    Khonghucu
                                                @endif
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
                                                @if ($data->user->wargaDetail->status === 'belumkawin')
                                                    Belum Kawin
                                                @elseif ($data->user->wargaDetail->status === 'kawin')
                                                    Kawin
                                                @elseif ($data->user->wargaDetail->status === 'ceraihidup')
                                                    Cerai Hidup
                                                @else
                                                    Cerai Mati
                                                @endif
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
                                                @if ($data->user->wargaDetail->pekerjaan === 'belumbekerja')
                                                    Belum Bekerja
                                                @elseif ($data->user->wargaDetail->pekerjaan)
                                                    {{ $data->user->wargaDetail->pekerjaan }}
                                                @else
                                                    -
                                                @endif
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
                                                @if ($data->user->wargaDetail->no_hp)
                                                    {{ $data->user->wargaDetail->no_hp }}
                                                @else
                                                    -
                                                @endif
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
                                            <p>{{ $data->user->email }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('custom-scripts')
    <script src="{{ asset('library/http_cdn.datatables.net_1.13.4_js_jquery.dataTables.js') }}"></script>

    <script>
        $(document).ready(function() {
            var successMessage = '{{ session('success') }}';
            var errorMessage = '{{ session('error') }}';

            if (successMessage) {
                Swal.fire({
                    icon: 'success',
                    title: 'Success',
                    text: successMessage,
                });
            } else if (errorMessage) {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: errorMessage,
                });
            }
        });
    </script>
@endpush
