@extends('landing.layouts.app', ['title' => 'Homepage'])

@section('main')
    <!-- ======= About Section ======= -->
    <section id="about" class="about">
        <div class="container">

            <div class="row content">
                <div class="col-lg-6 align-items-center justify-content-center">
                    <img src="{{ asset('landing/img/lg.jpg') }}" class="rounded mx-auto d-block">
                </div>
                <div class="col-lg-6 pt-4 pt-lg-0">
                    <h2 class="fw-bold">Tentang</h2>
                    <p>
                        <strong>Desa Cileles</strong> merupakan sebuah desa yang
                        berada di wilayah Kecamatan Jatinangor. Lokasinya berada di bagian utara wilayah
                        kecamatan dengan jarak tempuh ke pusat Kecamatan Jatinangor sekitar dua kilometer.
                        Wilayah Desa Cileles ini mencakup sebagian wilayah kampus Universitas Padjadjaran bagian
                        utara.
                    </p>
                    <p>
                        <strong>Desa Cileles</strong> merupakan desa induk dari dua
                        desa yang dimekarkan. Sebelum terjadi pemekaran Kecamatan Cimanggung menjadi dua
                        kecamatan, Desa Cileles menjadi bagian dari wilayah Kecamatan Cimanggung. Ketika terjadi
                        pemekaran Kecamatan Cimanggung menjadi Kecamatan Cimanggung dan Kecamatan Cikeruh, Desa
                        Cilayung menjadi bagian dari wilayah Kecamatan Cikeruh bersama lima desa lainnya.
                        Setelah terjadi pemekaran kecamatan ini, Desa Cileles dimekarkan menjadi dua desa yaitu
                        Desa Cileles dan Desa Cilayung. Desa Cileles mengambil wilayah bagian selatan sementara
                        Desa Cilayung di bagian utaranya.
                    </p>
                    <a href="#" class="btn btn-danger animate__animated animate__fadeInUp scrollto shadow">Baca
                        Selengkapnya</a>
                </div>
            </div>

        </div>
    </section><!-- End About Section -->
@endsection
