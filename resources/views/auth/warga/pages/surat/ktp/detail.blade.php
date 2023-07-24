@extends('auth.warga.layouts.app', ['title' => 'Detail Permohonan'])

@section('content')
    <div class="app-content pt-3 p-md-3 p-lg-4">
        <div class="container-xl">
            <div class="row justify-content-between">
                <div class="col-auto">
                    <h1 class="app-page-title">Detail Permohonan - {{ $data->user->name }}</h1>
                </div>
                <div class="col-auto">
                    <a href="{{ route('surat.ktp.index') }}" class="btn btn-sm btn-secondary shadow">
                        Kembali</a>
                </div>
            </div>

            <div class="app-card app-card-chart h-100 shadow-sm">
                <div class="app-card-body p-3 p-lg-4">
                    <div class="row g-3 align-items-center">
                        <div class="col-12 text-start">
                            <div class="container">
                                <div class="row align-items-center">
                                    <div class="col-5 col-lg-2">
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
                                    <div class="col-5 col-lg-2">
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
                                    <div class="col-5 col-lg-2">
                                        <p>Kartu Keluarga</p>
                                    </div>
                                    <div class="col-1 col-lg-1 text-center">
                                        <p>:</p>
                                    </div>
                                    <div class="col-6 col-lg-8">
                                        <img src="{{ asset('file/permohonan/ktp/' . $data->file_kk) }}" class="img-fluid">
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
