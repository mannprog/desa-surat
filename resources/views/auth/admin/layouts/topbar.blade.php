<div class="app-header-inner">
    <div class="container-fluid py-2">
        <div class="app-header-content">
            <div class="row justify-content-between align-items-center">

                <div class="col-auto">
                    <a id="sidepanel-toggler" class="sidepanel-toggler d-inline-block d-xl-none" href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 30 30"
                            role="img">
                            <title>Menu</title>
                            <path stroke="currentColor" stroke-linecap="round" stroke-miterlimit="10" stroke-width="2"
                                d="M4 7h22M4 15h22M4 23h22"></path>
                        </svg>
                    </a>
                </div>
                <!--//col-->

                <div class="app-utilities col-auto">
                    <div class="app-utility-item app-notifications-dropdown dropdown">
                        <a class="dropdown-toggle no-toggle-arrow" id="notifications-dropdown-toggle"
                            data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false"
                            title="Notifications">
                            <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-bell icon"
                                fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2z" />
                                <path fill-rule="evenodd"
                                    d="M8 1.918l-.797.161A4.002 4.002 0 0 0 4 6c0 .628-.134 2.197-.459 3.742-.16.767-.376 1.566-.663 2.258h10.244c-.287-.692-.502-1.49-.663-2.258C12.134 8.197 12 6.628 12 6a4.002 4.002 0 0 0-3.203-3.92L8 1.917zM14.22 12c.223.447.481.801.78 1H1c.299-.199.557-.553.78-1C2.68 10.2 3 6.88 3 6c0-2.42 1.72-4.44 4.005-4.901a1 1 0 1 1 1.99 0A5.002 5.002 0 0 1 13 6c0 .88.32 4.2 1.22 6z" />
                            </svg>
                            @if ($ndata != null)
                                <span class="icon-badge">{{ $ndata }}</span>
                            @endif
                        </a>
                        <!--//dropdown-toggle-->

                        <div class="dropdown-menu p-0" aria-labelledby="notifications-dropdown-toggle">
                            <div class="dropdown-menu-header p-3">
                                <h5 class="dropdown-menu-title mb-0">Notifikasi</h5>
                            </div>
                            <!--//dropdown-menu-title-->
                            <div class="dropdown-menu-content">
                                @if ($nspktp != null)
                                    @foreach ($nspktp as $ktp)
                                        <div class="item p-3">
                                            <div class="row gx-2 justify-content-between align-items-center">
                                                <div class="col-auto">
                                                    <div class="app-icon-holder">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="1em"
                                                            height="1em" fill="currentColor"
                                                            class="bi bi-person-vcard" viewBox="0 0 16 16">
                                                            <path fill-rule="evenodd"
                                                                d="M5 8a2 2 0 1 0 0-4 2 2 0 0 0 0 4Zm4-2.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5ZM9 8a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4A.5.5 0 0 1 9 8Zm1 2.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1h-3a.5.5 0 0 1-.5-.5Z" />
                                                            <path fill-rule="evenodd"
                                                                d="M2 2a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2H2ZM1 4a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H8.96c.026-.163.04-.33.04-.5C9 10.567 7.21 9 5 9c-2.086 0-3.8 1.398-3.984 3.181A1.006 1.006 0 0 1 1 12V4Z" />
                                                        </svg>
                                                    </div>
                                                </div>
                                                <!--//col-->
                                                <div class="col">
                                                    <div class="info">
                                                        <div class="desc">
                                                            <span class="fw-bold">Permohonan Surat Pengantar
                                                                KTP</span>
                                                            <p class="mb-0">{{ $ktp->user->name }}</p>
                                                        </div>
                                                        <div class="meta">
                                                            @if (\Carbon\Carbon::parse($ktp->tanggal_request)->diffInMinutes(\Carbon\Carbon::now()) < 60)
                                                                {{ \Carbon\Carbon::parse($ktp->tanggal_request)->diffInMinutes(\Carbon\Carbon::now()) }}
                                                                menit lalu
                                                            @elseif (\Carbon\Carbon::parse($ktp->tanggal_request)->diffInDays(\Carbon\Carbon::now()) == 0)
                                                                Hari ini pukul
                                                                {{ \Carbon\Carbon::parse($ktp->tanggal_request)->format('H:i') }}
                                                            @elseif (\Carbon\Carbon::parse($ktp->tanggal_request)->diffInDays(\Carbon\Carbon::now()) == 1)
                                                                Kemarin pukul
                                                                {{ \Carbon\Carbon::parse($ktp->tanggal_request)->format('H:i') }}
                                                            @else
                                                                {{ \Carbon\Carbon::parse($ktp->tanggal_request)->diffInDays(\Carbon\Carbon::now()) }}
                                                                hari lalu
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--//col-->
                                            </div>
                                            <!--//row-->
                                            <a class="link-mask" href="{{ route('pengantar.ktp.show', $ktp->id) }}"></a>
                                        </div>
                                    @endforeach
                                @endif
                                @if ($nspkk != null)
                                    @foreach ($nspkk as $kk)
                                        <div class="item p-3">
                                            <div class="row gx-2 justify-content-between align-items-center">
                                                <div class="col-auto">
                                                    <div class="app-icon-holder">
                                                        <svg width="1em" height="1em" viewBox="0 0 16 16"
                                                            class="bi bi-receipt" fill="currentColor"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <path fill-rule="evenodd"
                                                                d="M1.92.506a.5.5 0 0 1 .434.14L3 1.293l.646-.647a.5.5 0 0 1 .708 0L5 1.293l.646-.647a.5.5 0 0 1 .708 0L7 1.293l.646-.647a.5.5 0 0 1 .708 0L9 1.293l.646-.647a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .801.13l.5 1A.5.5 0 0 1 15 2v12a.5.5 0 0 1-.053.224l-.5 1a.5.5 0 0 1-.8.13L13 14.707l-.646.647a.5.5 0 0 1-.708 0L11 14.707l-.646.647a.5.5 0 0 1-.708 0L9 14.707l-.646.647a.5.5 0 0 1-.708 0L7 14.707l-.646.647a.5.5 0 0 1-.708 0L5 14.707l-.646.647a.5.5 0 0 1-.708 0L3 14.707l-.646.647a.5.5 0 0 1-.801-.13l-.5-1A.5.5 0 0 1 1 14V2a.5.5 0 0 1 .053-.224l.5-1a.5.5 0 0 1 .367-.27zm.217 1.338L2 2.118v11.764l.137.274.51-.51a.5.5 0 0 1 .707 0l.646.647.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.509.509.137-.274V2.118l-.137-.274-.51.51a.5.5 0 0 1-.707 0L12 1.707l-.646.647a.5.5 0 0 1-.708 0L10 1.707l-.646.647a.5.5 0 0 1-.708 0L8 1.707l-.646.647a.5.5 0 0 1-.708 0L6 1.707l-.646.647a.5.5 0 0 1-.708 0L4 1.707l-.646.647a.5.5 0 0 1-.708 0l-.509-.51z" />
                                                            <path fill-rule="evenodd"
                                                                d="M3 4.5a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5zm8-6a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5z" />
                                                        </svg>
                                                    </div>
                                                </div>
                                                <!--//col-->
                                                <div class="col">
                                                    <div class="info">
                                                        <span class="fw-bold">Permohonan Surat Pengantar
                                                            KK</span>
                                                        <p class="mb-0">{{ $kk->user->name }}</p>
                                                        <div class="meta">
                                                            @if (\Carbon\Carbon::parse($kk->tanggal_request)->diffInMinutes(\Carbon\Carbon::now()) < 60)
                                                                {{ \Carbon\Carbon::parse($kk->tanggal_request)->diffInMinutes(\Carbon\Carbon::now()) }}
                                                                menit lalu
                                                            @elseif (\Carbon\Carbon::parse($kk->tanggal_request)->diffInDays(\Carbon\Carbon::now()) == 0)
                                                                Hari ini pukul
                                                                {{ \Carbon\Carbon::parse($kk->tanggal_request)->format('H:i') }}
                                                            @elseif (\Carbon\Carbon::parse($kk->tanggal_request)->diffInDays(\Carbon\Carbon::now()) == 1)
                                                                Kemarin pukul
                                                                {{ \Carbon\Carbon::parse($kk->tanggal_request)->format('H:i') }}
                                                            @else
                                                                {{ \Carbon\Carbon::parse($kk->tanggal_request)->diffInDays(\Carbon\Carbon::now()) }}
                                                                hari lalu
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--//col-->
                                            </div>
                                            <!--//row-->
                                            <a class="link-mask" href="{{ route('pengantar.kk.show', $kk->id) }}"></a>
                                        </div>
                                    @endforeach
                                @endif
                                @if ($nspsktm != null)
                                    @foreach ($nspsktm as $sktm)
                                        <div class="item p-3">
                                            <div class="row gx-2 justify-content-between align-items-center">
                                                <div class="col-auto">
                                                    <div class="app-icon-holder">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="1em"
                                                            height="1em" fill="currentColor"
                                                            class="bi bi-file-earmark-text" viewBox="0 0 16 16">
                                                            <path fill-rule="evenodd"
                                                                d="M5.5 7a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1h-5zM5 9.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5z" />
                                                            <path fill-rule="evenodd"
                                                                d="M9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.5L9.5 0zm0 1v2A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5z" />
                                                        </svg>
                                                    </div>
                                                </div>
                                                <!--//col-->
                                                <div class="col">
                                                    <div class="info">
                                                        <div class="desc">
                                                            <span class="fw-bold">Permohonan Surat Pengantar
                                                                SKTM</span>
                                                            <p class="mb-0">{{ $sktm->user->name }}</p>
                                                        </div>
                                                        <div class="meta">
                                                            @if (\Carbon\Carbon::parse($sktm->tanggal_request)->diffInMinutes(\Carbon\Carbon::now()) < 60)
                                                                {{ \Carbon\Carbon::parse($sktm->tanggal_request)->diffInMinutes(\Carbon\Carbon::now()) }}
                                                                menit lalu
                                                            @elseif (\Carbon\Carbon::parse($sktm->tanggal_request)->diffInDays(\Carbon\Carbon::now()) == 0)
                                                                Hari ini pukul
                                                                {{ \Carbon\Carbon::parse($sktm->tanggal_request)->format('H:i') }}
                                                            @elseif (\Carbon\Carbon::parse($sktm->tanggal_request)->diffInDays(\Carbon\Carbon::now()) == 1)
                                                                Kemarin pukul
                                                                {{ \Carbon\Carbon::parse($sktm->tanggal_request)->format('H:i') }}
                                                            @else
                                                                {{ \Carbon\Carbon::parse($sktm->tanggal_request)->diffInDays(\Carbon\Carbon::now()) }}
                                                                hari lalu
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--//col-->
                                            </div>
                                            <!--//row-->
                                            <a class="link-mask"
                                                href="{{ route('pengantar.sktm.show', $sktm->id) }}"></a>
                                        </div>
                                    @endforeach
                                @endif
                                @if ($nspskck != null)
                                    @foreach ($nspskck as $skck)
                                        <div class="item p-3">
                                            <div class="row gx-2 justify-content-between align-items-center">
                                                <div class="col-auto">
                                                    <div class="app-icon-holder">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="1em"
                                                            height="1em" fill="currentColor"
                                                            class="bi bi-file-earmark-text" viewBox="0 0 16 16">
                                                            <path fill-rule="evenodd"
                                                                d="M5.5 7a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1h-5zM5 9.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5z" />
                                                            <path fill-rule="evenodd"
                                                                d="M9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.5L9.5 0zm0 1v2A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5z" />
                                                        </svg>
                                                    </div>
                                                </div>
                                                <!--//col-->
                                                <div class="col">
                                                    <div class="info">
                                                        <div class="desc">
                                                            <span class="fw-bold">Permohonan Surat Pengantar
                                                                SKCK</span>
                                                            <p class="mb-0">{{ $skck->user->name }}</p>
                                                        </div>
                                                        <div class="meta">
                                                            @if (\Carbon\Carbon::parse($skck->tanggal_request)->diffInMinutes(\Carbon\Carbon::now()) < 60)
                                                                {{ \Carbon\Carbon::parse($skck->tanggal_request)->diffInMinutes(\Carbon\Carbon::now()) }}
                                                                menit lalu
                                                            @elseif (\Carbon\Carbon::parse($skck->tanggal_request)->diffInDays(\Carbon\Carbon::now()) == 0)
                                                                Hari ini pukul
                                                                {{ \Carbon\Carbon::parse($skck->tanggal_request)->format('H:i') }}
                                                            @elseif (\Carbon\Carbon::parse($skck->tanggal_request)->diffInDays(\Carbon\Carbon::now()) == 1)
                                                                Kemarin pukul
                                                                {{ \Carbon\Carbon::parse($skck->tanggal_request)->format('H:i') }}
                                                            @else
                                                                {{ \Carbon\Carbon::parse($skck->tanggal_request)->diffInDays(\Carbon\Carbon::now()) }}
                                                                hari lalu
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--//col-->
                                            </div>
                                            <!--//row-->
                                            <a class="link-mask"
                                                href="{{ route('pengantar.skck.show', $skck->id) }}"></a>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                            <!--//dropdown-menu-content-->

                            {{-- <div class="dropdown-menu-footer p-2 text-center">
                                <a href="#">View all</a>
                            </div> --}}

                        </div>
                        <!--//dropdown-menu-->
                    </div>

                    <div class="app-utility-item app-user-dropdown dropdown pe-lg-4">
                        <a class="dropdown-toggle" id="user-dropdown-toggle" data-bs-toggle="dropdown"
                            href="#" role="button" aria-expanded="false">
                            <span class="me-2 text-gray-600 small">{{ auth()->user()->name }}</span>
                            <img src="{{ asset('admin/images/profiles/' . auth()->user()->foto) }}"
                                class="rounded-circle">
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="user-dropdown-toggle">
                            <li><a class="dropdown-item"
                                    href="{{ route('admin.profil', auth()->user()->id) }}">Profil</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li>
                                <a class="dropdown-item" href="#" data-toggle="modal"
                                    data-target="#logoutModal">Log Out</a>
                            </li>
                        </ul>
                    </div>
                    <!--//app-user-dropdown-->
                </div>
                <!--//app-utilities-->
            </div>
            <!--//row-->
        </div>
        <!--//app-header-content-->
    </div>
    <!--//container-fluid-->
</div>
