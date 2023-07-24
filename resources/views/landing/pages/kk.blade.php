@extends('landing.pages.layout', ['title' => 'Surat Pengantar KK'])

@section('main')
    <section id="blog" class="blog">
        <div class="container" data-aos="fade-up">

            <div class="row">

                <div class="col-lg-8 entries">

                    <article class="entry entry-single">

                        {{-- <div class="entry-img">
                            <img src="assets/img/blog/blog-1.jpg" alt="" class="img-fluid">
                        </div> --}}

                        <h2 class="entry-title border-bottom pb-3">
                            Syarat dan Ketentuan Pembuatan Surat
                        </h2>

                        <div class="entry-content">
                            <p>
                                Berikut adalah syarat dan ketentuan untuk pembuatan Surat Pengantar Kartu Keluarga:
                            </p>

                            <ol>
                                <li>Login dengan akun yang telah terdaftar. Jika belum memiliki registrasi akun terlebih
                                    dahulu.</li>
                                <li>Pilih menu Surat Pengantar Kartu Keluarga.</li>
                                <li>Isi menu form tambah pengajuan dengan upload Kartu Keluarga lama dan upload Buku
                                    Nikah/Surat Kelahiran.</li>
                                <li>Tunggu status pengajuan, jika status telah selesai maka Surat Pengantar Kartu Keluarga
                                    bisa
                                    didownload.</li>
                            </ol>

                        </div>

                        {{-- <div class="entry-footer">
                            <i class="bi bi-folder"></i>
                            <ul class="cats">
                                <li><a href="#">Business</a></li>
                            </ul>

                            <i class="bi bi-tags"></i>
                            <ul class="tags">
                                <li><a href="#">Creative</a></li>
                                <li><a href="#">Tips</a></li>
                                <li><a href="#">Marketing</a></li>
                            </ul>
                        </div> --}}

                    </article>

                </div><!-- End blog entries list -->

                <div class="col-lg-4">

                    <div class="sidebar">

                        <h3 class="sidebar-title">Surat Pengantar</h3>
                        <div class="sidebar-item tags">
                            <ul>
                                <li><a href="{{ route('landing.ktp') }}">KTP</a></li>
                                <li><a href="{{ route('landing.kk') }}">KK</a></li>
                                <li><a href="{{ route('landing.sktm') }}">SKTM</a></li>
                                <li><a href="{{ route('landing.skck') }}">SKCK</a></li>
                            </ul>
                        </div><!-- End sidebar tags-->

                    </div><!-- End sidebar -->

                </div><!-- End blog sidebar -->

            </div>

        </div>
    </section>
@endsection
