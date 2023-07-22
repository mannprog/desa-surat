@extends('auth.admin.layouts.app', ['title' => 'Dashboard'])

@section('content')
    <div class="app-content pt-3 p-md-3 p-lg-4">
        <div class="container-xl">

            <h1 class="app-page-title">Dashboard Admin</h1>

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
            <!--//row-->
            {{-- <div class="row g-4 mb-4">
                <div class="col-12 col-lg-6">
                    <div class="app-card app-card-chart h-100 shadow-sm">
                        <div class="app-card-header p-3">
                            <div class="row justify-content-between align-items-center">
                                <div class="col-auto">
                                    <h4 class="app-card-title">Line Chart Example</h4>
                                </div>
                                <!--//col-->
                                <div class="col-auto">
                                    <div class="card-header-action">
                                        <a href="charts.html">More charts</a>
                                    </div>
                                    <!--//card-header-actions-->
                                </div>
                                <!--//col-->
                            </div>
                            <!--//row-->
                        </div>
                        <!--//app-card-header-->
                        <div class="app-card-body p-3 p-lg-4">
                            <div class="mb-3 d-flex">
                                <select class="form-select form-select-sm ms-auto d-inline-flex w-auto">
                                    <option value="1" selected>This week</option>
                                    <option value="2">Today</option>
                                    <option value="3">This Month</option>
                                    <option value="3">This Year</option>
                                </select>
                            </div>
                            <div class="chart-container">
                                <canvas id="canvas-linechart"></canvas>
                            </div>
                        </div>
                        <!--//app-card-body-->
                    </div>
                    <!--//app-card-->
                </div>
                <!--//col-->
                <div class="col-12 col-lg-6">
                    <div class="app-card app-card-chart h-100 shadow-sm">
                        <div class="app-card-header p-3">
                            <div class="row justify-content-between align-items-center">
                                <div class="col-auto">
                                    <h4 class="app-card-title">Bar Chart Example</h4>
                                </div>
                                <!--//col-->
                                <div class="col-auto">
                                    <div class="card-header-action">
                                        <a href="charts.html">More charts</a>
                                    </div>
                                    <!--//card-header-actions-->
                                </div>
                                <!--//col-->
                            </div>
                            <!--//row-->
                        </div>
                        <!--//app-card-header-->
                        <div class="app-card-body p-3 p-lg-4">
                            <div class="mb-3 d-flex">
                                <select class="form-select form-select-sm ms-auto d-inline-flex w-auto">
                                    <option value="1" selected>This week</option>
                                    <option value="2">Today</option>
                                    <option value="3">This Month</option>
                                    <option value="3">This Year</option>
                                </select>
                            </div>
                            <div class="chart-container">
                                <canvas id="canvas-barchart"></canvas>
                            </div>
                        </div>
                        <!--//app-card-body-->
                    </div>
                    <!--//app-card-->
                </div>
                <!--//col-->

            </div> --}}
            <!--//row-->

        </div>
        <!--//container-fluid-->
    </div>
@endsection
