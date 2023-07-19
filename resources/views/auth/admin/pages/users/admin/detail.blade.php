@extends('auth.admin.layouts.app', ['title' => 'Detail User'])

@section('content')
    <div class="app-content pt-3 p-md-3 p-lg-4">
        <div class="container-xl">
            <div class="row justify-content-between">
                <div class="col-auto">
                    <h1 class="app-page-title">Detail - {{ $admin->name }}</h1>
                </div>
                <div class="col-auto">
                    <a href="{{ route('kelola.admin.index') }}" class="btn btn-sm btn-secondary shadow-sm">
                        Kembali</a>
                </div>
            </div>

            <div class="app-card app-card-chart h-100 shadow-sm">
                <div class="app-card-body p-3 p-lg-4">
                    <div class="row g-3 align-items-center">
                        <div class="col-12 col-lg-3 text-center mb-3 mb-lg-0">
                            <img class="img-fluid" src="{{ asset('admin/images/profiles/' . $admin->foto) }}"
                                style="height: 150px">
                        </div>
                        <!--//col-->
                        <div class="col-12 col-lg-9 text-start">
                            <div class="border-bottom">
                                <h3 class="mb-3 fw-bold">{{ $admin->name }}</h3>
                            </div>
                            <div class="mt-3">
                                <h5 class="fw-bold">Data Tugas</h5>
                                <div class="container">
                                    <div class="row align-items-center">
                                        <div class="col-5 col-lg-3">
                                            <p>Jabatan</p>
                                        </div>
                                        <div class="col-1 col-lg-1 text-center">
                                            <p>:</p>
                                        </div>
                                        <div class="col-6 col-lg-8">
                                            <p>
                                                @if ($admin->adminDetail->jabatan === 'admin')
                                                    Admin
                                                @elseif ($admin->adminDetail->jabatan === 'kepaladesa')
                                                    Kepala Desa
                                                @else
                                                    KASI Pelayanan
                                                @endif
                                            </p>
                                        </div>
                                    </div>
                                    <div class="row align-items-center">
                                        <div class="col-5 col-lg-3">
                                            <p>No SK Pengangkatan</p>
                                        </div>
                                        <div class="col-1 col-lg-1 text-center">
                                            <p>:</p>
                                        </div>
                                        <div class="col-6 col-lg-8">
                                            <p>{{ $admin->adminDetail->no_sk }}</p>
                                        </div>
                                    </div>
                                    <div class="row align-items-center">
                                        <div class="col-5 col-lg-3">
                                            <p>TMT SK Pengangkatan</p>
                                        </div>
                                        <div class="col-1 col-lg-1 text-center">
                                            <p>:</p>
                                        </div>
                                        <div class="col-6 col-lg-8">
                                            <p>{{ \Carbon\Carbon::parse($admin->adminDetail->tmt_sk)->format('d M Y') }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-1">
                                <h5 class="fw-bold">Data Pribadi</h5>
                                <div class="container">
                                    <div class="row align-items-center">
                                        <div class="col-5 col-lg-3">
                                            <p>Tempat, Tanggal Lahir</p>
                                        </div>
                                        <div class="col-1 col-lg-1 text-center">
                                            <p>:</p>
                                        </div>
                                        <div class="col-6 col-lg-8">
                                            <p>
                                                @if ($admin->adminDetail->tempat_lahir)
                                                    {{ $admin->adminDetail->tempat_lahir }},
                                                @else
                                                    -
                                                @endif
                                                @if ($admin->adminDetail->tanggal_lahir)
                                                    {{ \Carbon\Carbon::parse($admin->adminDetail->tanggal_lahir)->format('d M Y') }}
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
                                                @if ($admin->adminDetail->jenis_kelamin === 'l')
                                                    Laki-laki
                                                @else
                                                    Perempuan
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
                                                @if ($admin->adminDetail->alamat)
                                                    {!! $admin->adminDetail->alamat !!}
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
                                                @if ($admin->adminDetail->agama === 'islam')
                                                    Islam
                                                @elseif ($admin->adminDetail->agama === 'katolik')
                                                    Kristen Katolik
                                                @elseif ($admin->adminDetail->agama === 'protestan')
                                                    Kristen Protestan
                                                @elseif ($admin->adminDetail->agama === 'hindu')
                                                    Hindu
                                                @elseif ($admin->adminDetail->agama === 'buddha')
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
                                                @if ($admin->adminDetail->status === 'belumkawin')
                                                    Belum Kawin
                                                @elseif ($admin->adminDetail->status === 'kawin')
                                                    Kawin
                                                @elseif ($admin->adminDetail->status === 'ceraihidup')
                                                    Cerai Hidup
                                                @else
                                                    Cerai Mati
                                                @endif
                                            </p>
                                        </div>
                                    </div>
                                    <div class="row align-items-center">
                                        <div class="col-5 col-lg-3">
                                            <p>Pendidikan Terakhir</p>
                                        </div>
                                        <div class="col-1 col-lg-1 text-center">
                                            <p>:</p>
                                        </div>
                                        <div class="col-6 col-lg-8">
                                            <p>
                                                @if ($admin->adminDetail->pendidikan_terakhir === 'sma')
                                                    SMA/Sederajat
                                                @elseif ($admin->adminDetail->pendidikan_terakhir === 'd1')
                                                    D1/Sederajat
                                                @elseif ($admin->adminDetail->pendidikan_terakhir === 'd2')
                                                    D2/Sederajat
                                                @elseif ($admin->adminDetail->pendidikan_terakhir === 'd3')
                                                    D3/Sederajat
                                                @elseif ($admin->adminDetail->pendidikan_terakhir === 's1')
                                                    S1/Sederajat
                                                @elseif ($admin->adminDetail->pendidikan_terakhir === 's2')
                                                    S2/Sederajat
                                                @elseif ($admin->adminDetail->pendidikan_terakhir === 's3')
                                                    S3/Sederajat
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
                                                @if ($admin->adminDetail->no_hp)
                                                    {{ $admin->adminDetail->no_hp }}
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
                                            <p>{{ $admin->email }}</p>
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
                                                @if ($admin->adminDetail->ayah)
                                                    {{ $admin->adminDetail->ayah }},
                                                @else
                                                    -
                                                @endif
                                                @if ($admin->adminDetail->ibu)
                                                    {{ $admin->adminDetail->ibu }}
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
                                                @if ($admin->adminDetail->pasangan)
                                                    {{ $admin->adminDetail->pasangan }}
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
                                                @if ($admin->adminDetail->anak)
                                                    {!! $admin->adminDetail->anak !!}
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
