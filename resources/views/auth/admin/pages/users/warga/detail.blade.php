@extends('auth.admin.layouts.app', ['title' => 'Detail User'])

@section('content')
    <div class="app-content pt-3 p-md-3 p-lg-4">
        <div class="container-xl">
            <div class="row justify-content-between">
                <div class="col-auto">
                    <h1 class="app-page-title">Detail - {{ $warga->name }}</h1>
                </div>
                <div class="col-auto">
                    <a href="{{ route('kelola.warga.index') }}" class="btn btn-sm btn-secondary shadow-sm">
                        Kembali</a>
                </div>
            </div>

            <div class="app-card app-card-chart h-100 shadow-sm">
                <div class="app-card-body p-3 p-lg-4">
                    <div class="row g-3 align-items-center">
                        <div class="col-12 col-lg-3 text-center mb-3 mb-lg-0">
                            <img class="img-fluid" src="{{ asset('admin/images/profiles/' . $warga->foto) }}"
                                style="height: 150px">
                        </div>
                        <!--//col-->
                        <div class="col-12 col-lg-9 text-start">
                            <div class="border-bottom">
                                <h3 class="mb-3 fw-bold">{{ $warga->name }}</h3>
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
                                            <p>{{ $warga->wargaDetail->no_kk }}</p>
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
                                            <p>{{ $warga->wargaDetail->nik }}</p>
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
                                                @if ($warga->wargaDetail->tempat_lahir)
                                                    {{ $warga->wargaDetail->tempat_lahir }},
                                                @else
                                                    -
                                                @endif
                                                @if ($warga->wargaDetail->tanggal_lahir)
                                                    {{ \Carbon\Carbon::parse($warga->wargaDetail->tanggal_lahir)->format('d M Y') }}
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
                                                @if ($warga->wargaDetail->jenis_kelamin === 'l')
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
                                                @if ($warga->wargaDetail->gol_darah === 'a')
                                                    A
                                                @elseif ($warga->wargaDetail->gol_darah === 'b')
                                                    B
                                                @elseif ($warga->wargaDetail->gol_darah === 'ab')
                                                    AB
                                                @elseif ($warga->wargaDetail->gol_darah === 'o')
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
                                                @if ($warga->wargaDetail->alamat)
                                                    {!! $warga->wargaDetail->alamat !!}
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
                                                @if ($warga->wargaDetail->agama === 'islam')
                                                    Islam
                                                @elseif ($warga->wargaDetail->agama === 'katolik')
                                                    Kristen Katolik
                                                @elseif ($warga->wargaDetail->agama === 'protestan')
                                                    Kristen Protestan
                                                @elseif ($warga->wargaDetail->agama === 'hindu')
                                                    Hindu
                                                @elseif ($warga->wargaDetail->agama === 'buddha')
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
                                                @if ($warga->wargaDetail->status === 'belumkawin')
                                                    Belum Kawin
                                                @elseif ($warga->wargaDetail->status === 'kawin')
                                                    Kawin
                                                @elseif ($warga->wargaDetail->status === 'ceraihidup')
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
                                                @if ($warga->wargaDetail->pekerjaan === 'belumbekerja')
                                                    Belum Bekerja
                                                @elseif ($warga->wargaDetail->pekerjaan)
                                                    {{ $warga->wargaDetail->pekerjaan }}
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
                                                @if ($warga->wargaDetail->no_hp)
                                                    {{ $warga->wargaDetail->no_hp }}
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
                                            <p>{{ $warga->email }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-1">
                                <h5 class="fw-bold">Data Keluarga</h5>
                                <div class="container">
                                    <div class="row align-items-center">
                                        <div class="col-5 col-lg-3">
                                            <p>Nama Ayah/Ibu</p>
                                        </div>
                                        <div class="col-1 col-lg-1 text-center">
                                            <p>:</p>
                                        </div>
                                        <div class="col-6 col-lg-8">
                                            <p>
                                                @if ($warga->wargaDetail->ayah)
                                                    {{ $warga->wargaDetail->ayah }} /
                                                @else
                                                    -
                                                @endif
                                                @if ($warga->wargaDetail->ibu)
                                                    {{ $warga->wargaDetail->ibu }}
                                                @endif
                                            </p>
                                        </div>
                                    </div>
                                    <div class="row align-items-center">
                                        <div class="col-5 col-lg-3">
                                            <p>Nama Pasangan</p>
                                        </div>
                                        <div class="col-1 col-lg-1 text-center">
                                            <p>:</p>
                                        </div>
                                        <div class="col-6 col-lg-8">
                                            <p>
                                                @if ($warga->wargaDetail->pasangan)
                                                    {{ $warga->wargaDetail->pasangan }}
                                                @else
                                                    -
                                                @endif
                                            </p>
                                        </div>
                                    </div>
                                    <div class="row align-items-center">
                                        <div class="col-5 col-lg-3">
                                            <p>Nama Anak</p>
                                        </div>
                                        <div class="col-1 col-lg-1 text-center">
                                            <p>:</p>
                                        </div>
                                        <div class="col-6 col-lg-8">
                                            <p>
                                                @if ($warga->wargaDetail->anak)
                                                    {!! $warga->wargaDetail->anak !!}
                                                @else
                                                    -
                                                @endif
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--//col-->
                    </div>
                    <!--//row-->
                </div>
            </div>
        </div>
    </div>
@endsection
