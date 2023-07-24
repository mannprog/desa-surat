<div id="app-sidepanel" class="app-sidepanel">
    <div id="sidepanel-drop" class="sidepanel-drop"></div>
    <div class="sidepanel-inner d-flex flex-column">
        <a href="#" id="sidepanel-close" class="sidepanel-close d-xl-none">&times;</a>
        <div class="app-branding">
            <a class="app-logo" href="<?php echo e(route('admin.index')); ?>"><img class="logo-icon me-2"
                    src="<?php echo e(asset('landing/img/logo.png')); ?>" alt="logo"><span class="logo-text">PORTAL DESA
                    CILELES</span></a>

        </div>
        <!--//app-branding-->

        <nav id="app-nav-main" class="app-nav app-nav-main flex-grow-1">
            <ul class="app-menu list-unstyled accordion" id="menu-accordion">
                <li class="nav-item">
                    <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
                    <a class="nav-link <?php echo e(Route::is('admin.index') ? 'active' : ''); ?>"
                        href="<?php echo e(route('admin.index')); ?>">
                        <span class="nav-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-house-door" viewBox="0 0 16 16">
                                <path
                                    d="M8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4.5a.5.5 0 0 0 .5-.5v-4h2v4a.5.5 0 0 0 .5.5H14a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146ZM2.5 14V7.707l5.5-5.5 5.5 5.5V14H10v-4a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5v4H2.5Z" />
                            </svg>
                        </span>
                        <span class="nav-link-text">Dashboard</span>
                    </a>
                    <!--//nav-link-->
                </li>
                <!--//nav-item-->
                <li class="nav-item has-submenu">
                    <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
                    <a class="nav-link submenu-toggle <?php echo e(Route::is('pengantar*') ? 'active' : ''); ?>" href="#"
                        data-bs-toggle="collapse" data-bs-target="#submenu-1"
                        aria-expanded="<?php echo e(Route::is('pengantar*') ? 'true' : 'false'); ?>" aria-controls="submenu-1">
                        <span class="nav-icon">
                            <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-folder"
                                fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M9.828 4a3 3 0 0 1-2.12-.879l-.83-.828A1 1 0 0 0 6.173 2H2.5a1 1 0 0 0-1 .981L1.546 4h-1L.5 3a2 2 0 0 1 2-2h3.672a2 2 0 0 1 1.414.586l.828.828A2 2 0 0 0 9.828 3v1z" />
                                <path fill-rule="evenodd"
                                    d="M13.81 4H2.19a1 1 0 0 0-.996 1.09l.637 7a1 1 0 0 0 .995.91h10.348a1 1 0 0 0 .995-.91l.637-7A1 1 0 0 0 13.81 4zM2.19 3A2 2 0 0 0 .198 5.181l.637 7A2 2 0 0 0 2.826 14h10.348a2 2 0 0 0 1.991-1.819l.637-7A2 2 0 0 0 13.81 3H2.19z" />
                            </svg>
                        </span>
                        <span class="nav-link-text">Surat Pengantar</span>
                        <span class="submenu-arrow">
                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-chevron-down"
                                fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z" />
                            </svg>
                        </span>
                        <!--//submenu-arrow-->
                    </a>
                    <!--//nav-link-->
                    <div id="submenu-1"
                        class="collapse submenu submenu-1 collapse <?php echo e(Route::is('pengantar*') ? 'show' : ''); ?>"
                        data-bs-parent="#menu-accordion">
                        <ul class="submenu-list list-unstyled">
                            <li class="submenu-item"><a
                                    class="submenu-link <?php echo e(Route::is('pengantar.ktp*') ? 'active' : ''); ?>"
                                    href="<?php echo e(route('pengantar.ktp.index')); ?>">KTP</a></li>
                            <li class="submenu-item"><a
                                    class="submenu-link <?php echo e(Route::is('pengantar.kk*') ? 'active' : ''); ?>"
                                    href="<?php echo e(route('pengantar.kk.index')); ?>">KK</a>
                            </li>
                            <li class="submenu-item"><a
                                    class="submenu-link <?php echo e(Route::is('pengantar.sktm*') ? 'active' : ''); ?>"
                                    href="<?php echo e(route('pengantar.sktm.index')); ?>">SKTM</a>
                            </li>
                            <li class="submenu-item"><a
                                    class="submenu-link <?php echo e(Route::is('pengantar.skck*') ? 'active' : ''); ?>"
                                    href="<?php echo e(route('pengantar.skck.index')); ?>">SKCK</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item has-submenu">
                    <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
                    <a class="nav-link submenu-toggle <?php echo e(Route::is('laporan*') ? 'active' : ''); ?>" href="#"
                        data-bs-toggle="collapse" data-bs-target="#submenu-2"
                        aria-expanded="<?php echo e(Route::is('laporan*') ? 'true' : 'false'); ?>" aria-controls="submenu-2">
                        <span class="nav-icon">
                            <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-folder"
                                fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M9.828 4a3 3 0 0 1-2.12-.879l-.83-.828A1 1 0 0 0 6.173 2H2.5a1 1 0 0 0-1 .981L1.546 4h-1L.5 3a2 2 0 0 1 2-2h3.672a2 2 0 0 1 1.414.586l.828.828A2 2 0 0 0 9.828 3v1z" />
                                <path fill-rule="evenodd"
                                    d="M13.81 4H2.19a1 1 0 0 0-.996 1.09l.637 7a1 1 0 0 0 .995.91h10.348a1 1 0 0 0 .995-.91l.637-7A1 1 0 0 0 13.81 4zM2.19 3A2 2 0 0 0 .198 5.181l.637 7A2 2 0 0 0 2.826 14h10.348a2 2 0 0 0 1.991-1.819l.637-7A2 2 0 0 0 13.81 3H2.19z" />
                            </svg>
                        </span>
                        <span class="nav-link-text">Laporan</span>
                        <span class="submenu-arrow">
                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-chevron-down"
                                fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z" />
                            </svg>
                        </span>
                        <!--//submenu-arrow-->
                    </a>
                    <!--//nav-link-->
                    <div id="submenu-2"
                        class="collapse submenu submenu-2 collapse <?php echo e(Route::is('laporan*') ? 'show' : ''); ?>"
                        data-bs-parent="#menu-accordion">
                        <ul class="submenu-list list-unstyled">
                            <li class="submenu-item"><a
                                    class="submenu-link <?php echo e(Route::is('laporan.ktp*') ? 'active' : ''); ?>"
                                    href="<?php echo e(route('laporan.ktp.index')); ?>">KTP</a>
                            </li>
                            <li class="submenu-item"><a
                                    class="submenu-link <?php echo e(Route::is('laporan.kk*') ? 'active' : ''); ?>"
                                    href="<?php echo e(route('laporan.kk.index')); ?>">KK</a>
                            </li>
                            <li class="submenu-item"><a
                                    class="submenu-link <?php echo e(Route::is('laporan.sktm*') ? 'active' : ''); ?>"
                                    href="<?php echo e(route('laporan.sktm.index')); ?>">SKTM</a>
                            </li>
                            <li class="submenu-item"><a
                                    class="submenu-link <?php echo e(Route::is('laporan.skck*') ? 'active' : ''); ?>"
                                    href="<?php echo e(route('laporan.skck.index')); ?>">SKCK</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <!--//nav-item-->
                <li class="nav-item has-submenu">
                    <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
                    <a class="nav-link submenu-toggle <?php echo e(Route::is('kelola*') ? 'active' : ''); ?>" href="#"
                        data-bs-toggle="collapse" data-bs-target="#submenu-3"
                        aria-expanded="<?php echo e(Route::is('kelola*') ? 'true' : 'false'); ?>" aria-controls="submenu-3">
                        <span class="nav-icon">
                            <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                fill="currentColor" class="bi bi-people" viewBox="0 0 16 16">
                                <path
                                    d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1h8Zm-7.978-1A.261.261 0 0 1 7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276.593.69.758 1.457.76 1.72l-.008.002a.274.274 0 0 1-.014.002H7.022ZM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4Zm3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0ZM6.936 9.28a5.88 5.88 0 0 0-1.23-.247A7.35 7.35 0 0 0 5 9c-4 0-5 3-5 4 0 .667.333 1 1 1h4.216A2.238 2.238 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816ZM4.92 10A5.493 5.493 0 0 0 4 13H1c0-.26.164-1.03.76-1.724.545-.636 1.492-1.256 3.16-1.275ZM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0Zm3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4Z" />
                            </svg>
                        </span>
                        <span class="nav-link-text">Users</span>
                        <span class="submenu-arrow">
                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-chevron-down"
                                fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z" />
                            </svg>
                        </span>
                        <!--//submenu-arrow-->
                    </a>
                    <!--//nav-link-->
                    <div id="submenu-3"
                        class="collapse submenu submenu-3 collapse <?php echo e(Route::is('kelola*') ? 'show' : ''); ?>"
                        data-bs-parent="#menu-accordion">
                        <ul class="submenu-list list-unstyled">
                            <li class="submenu-item"><a
                                    class="submenu-link <?php echo e(Route::is('kelola.admin*') ? 'active' : ''); ?>"
                                    href="<?php echo e(route('kelola.admin.index')); ?>">Admin</a></li>
                            <li class="submenu-item"><a
                                    class="submenu-link <?php echo e(Route::is('kelola.warga*') ? 'active' : ''); ?>"
                                    href="<?php echo e(route('kelola.warga.index')); ?>">Warga</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <!--//nav-item-->
                <!--//nav-item-->
            </ul>
            <!--//app-menu-->
        </nav>
        <!--//app-nav-->

    </div>
    <!--//sidepanel-inner-->
</div>
<?php /**PATH C:\laragon\www\desa-surat\resources\views/auth/admin/layouts/sidebar.blade.php ENDPATH**/ ?>