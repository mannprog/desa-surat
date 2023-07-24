@extends('auth.warga.layouts.app', ['title' => 'Dashboard'])

@section('content')
    <div class="app-content pt-3 p-md-3 p-lg-4">
        <div class="container-xl">

            <h1 class="app-page-title">Dashboard Warga</h1>

            <div class="row g-4 mb-4">
                <div class="col-6 col-lg-3">
                    <div class="app-card app-card-stat shadow-sm h-100">
                        <div class="app-card-body p-3 p-lg-4">
                            <h4 class="stats-type mb-1">PERMOHONAN KTP</h4>
                            <div class="stats-figure">{{ $spktp }}</div>
                            @if ($spktp != null)
                                <div class="stats-meta">New</div>
                            @endif
                        </div>
                        <!--//app-card-body-->
                        <a class="app-card-link-mask" href="{{ route('pengantar.ktp.index') }}"></a>
                    </div>
                    <!--//app-card-->
                </div>
                <!--//col-->

                <div class="col-6 col-lg-3">
                    <div class="app-card app-card-stat shadow-sm h-100">
                        <div class="app-card-body p-3 p-lg-4">
                            <h4 class="stats-type mb-1">PERMOHONAN KK</h4>
                            <div class="stats-figure">{{ $spkk }}</div>
                            @if ($spkk != null)
                                <div class="stats-meta">New</div>
                            @endif
                        </div>
                        <!--//app-card-body-->
                        <a class="app-card-link-mask" href="{{ route('pengantar.kk.index') }}"></a>
                    </div>
                    <!--//app-card-->
                </div>
                <!--//col-->
                <div class="col-6 col-lg-3">
                    <div class="app-card app-card-stat shadow-sm h-100">
                        <div class="app-card-body p-3 p-lg-4">
                            <h4 class="stats-type mb-1">PERMOHONAN SKTM</h4>
                            <div class="stats-figure">{{ $spsktm }}</div>
                            @if ($spsktm != null)
                                <div class="stats-meta">New</div>
                            @endif
                        </div>
                        <!--//app-card-body-->
                        <a class="app-card-link-mask" href="{{ route('pengantar.sktm.index') }}"></a>
                    </div>
                    <!--//app-card-->
                </div>
                <!--//col-->
                <div class="col-6 col-lg-3">
                    <div class="app-card app-card-stat shadow-sm h-100">
                        <div class="app-card-body p-3 p-lg-4">
                            <h4 class="stats-type mb-1">PERMOHONAN SKCK</h4>
                            <div class="stats-figure">{{ $spskck }}</div>
                            @if ($spskck != null)
                                <div class="stats-meta">New</div>
                            @endif
                        </div>
                        <!--//app-card-body-->
                        <a class="app-card-link-mask" href="{{ route('pengantar.skck.index') }}"></a>
                    </div>
                    <!--//app-card-->
                </div>
                <!--//col-->
            </div>

        </div>
        <!--//container-fluid-->
    </div>
@endsection
