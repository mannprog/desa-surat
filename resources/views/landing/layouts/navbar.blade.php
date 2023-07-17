<!-- ======= Header ======= -->
<header id="header" class="fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center">

        <!-- Uncomment below if you prefer to use an image logo -->
        <a href="{{ route('landing.index') }}" class="logo me-3"><img src="{{ asset('landing/img/logo.png') }}"
                alt="" class="img-fluid"></a>
        <a href="{{ route('landing.index') }}" class="me-auto text-dark">
            <table class="align-items-center">
                <tbody>
                    <tr>
                        <td>
                            <h1 class="logo"><a href="{{ route('landing.index') }}">Desa Cileles</a></h1>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h4>Kabupaten Sumedang</h4>
                        </td>
                    </tr>
                </tbody>
            </table>
        </a>

        <nav id="navbar" class="navbar">
            <ul>
                <li><a href="index.html" class="active">Beranda</a></li>
                <li class="dropdown"><a href="#"><span>Profil</span> <i class="bi bi-chevron-down"></i></a>
                    <ul>
                        <li><a href="#">Tentang Desa</a></li>
                        <li><a href="#">Visi & Misi</a></li>
                        <li><a href="#">Sejarah Desa</a></li>
                        <li><a href="#">Geografis Desa</a></li>
                        <li><a href="#">Demografis Desa</a></li>
                    </ul>
                </li>
                <li class="dropdown"><a href="#"><span>Pemerintahan</span> <i class="bi bi-chevron-down"></i></a>
                    <ul>
                        <li><a href="#">Struktur Organisasi</a></li>
                        <li><a href="#">Perangkat Desa</a></li>
                        <li><a href="#">Lembaga Desa</a></li>
                    </ul>
                </li>
                <li class="dropdown"><a href="#"><span>Pelayanan</span> <i class="bi bi-chevron-down"></i></a>
                    <ul>
                        <li class="dropdown"><a href="#"><span>Surat Pengantar</span> <i
                                    class="bi bi-chevron-right"></i></a>
                            <ul>
                                <li><a href="#">KTP</a></li>
                                <li><a href="#">KK</a></li>
                                <li><a href="#">SKTM</a></li>
                                <li><a href="#">SKCK</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li class="dropdown"><a href="#"><span>Informasi</span> <i class="bi bi-chevron-down"></i></a>
                    <ul>
                        <li><a href="#">Pengumuman</a></li>
                        <li><a href="#">Berita</a></li>
                        <li><a href="#">Agenda</a></li>
                        <li><a href="#">Galeri</a></li>
                    </ul>
                </li>
                <li><a href="#">Kontak</a></li>
                <li><a href="{{ route('login') }}" class="getstarted">Login</a></li>
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->

    </div>
</header><!-- End Header -->
