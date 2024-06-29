@extends('guest.layout.app')

@section('kontenUser')
    <!-- Carousel Start -->
    <div class="container-fluid px-0">
        <div id="carouselId" class="carousel slide" data-bs-ride="carousel">
            <ol class="carousel-indicators">
                <li data-bs-target="#carouselId" data-bs-slide-to="0" class="active" aria-current="true"
                    aria-label="First slide"></li>
                <li data-bs-target="#carouselId" data-bs-slide-to="1" aria-label="Second slide"></li>
            </ol>
            <div class="carousel-inner" role="listbox">
                <div class="carousel-item active">
                    <img src="assetsUsers/img/carousel-1.jpg" class="img-fluid" alt="First slide">
                    <div class="carousel-caption">
                        <div class="container carousel-content">
                            <h6 class="text-secondary h4 animated fadeInUp">Selamat Datang di SIMAC</h6>
                            <h1 class="text-white display-1 mb-4 animated fadeInLeft">Sistem Manajemen AC untuk Universitas
                                Janabadra</h1>
                            <p class="mb-4 text-white fs-5 animated fadeInDown">SIMAC dirancang untuk mengelola
                                pemeliharaan AC di Fakultas Teknik Universitas
                                Janabadra, untuk menciptakan lingkungan belajar yang nyaman dan efisien.
                            </p>
                            <a href="#about" class="me-2"><button type="button"
                                    class="px-4 py-sm-3 px-sm-5 btn btn-primary rounded-pill carousel-content-btn1 animated fadeInLeft">Pelajari
                                    Lebih Lanjut</button></a>
                            {{-- <a href="#footer" class="ms-2"><button type="button"
                                    class="px-4 py-sm-3 px-sm-5 btn btn-primary rounded-pill carousel-content-btn2 animated fadeInRight">Hubungi
                                    Kami</button></a> --}}
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="assetsUsers/img/ujb.jpg" class="img-fluid" alt="Second slide">
                    <div class="carousel-caption">
                        <div class="container carousel-content">
                            <h6 class="text-secondary h4 animated fadeInUp">SIMAC - Sistem Manajemen AC</h6>
                            <h1 class="text-white display-1 mb-4 animated fadeInRight">Solusi Manajemen AC yang Efisien dan
                                Optimal</h1>
                            <p class="mb-4 text-white fs-5 animated fadeInDown">Menyederhanakan pemeliharaan AC dengan
                                pelacakan real-time dan fitur manajemen yang komprehensif.</p>
                            <a href="#about" class="me-2"><button type="button"
                                    class="px-4 py-sm-3 px-sm-5 btn btn-primary rounded-pill carousel-content-btn1 animated fadeInLeft">Pelajari
                                    Lebih Lanjut</button></a>
                            {{-- <a href="#footer" class="ms-2"><button type="button"
                                    class="px-4 py-sm-3 px-sm-5 btn btn-primary rounded-pill carousel-content-btn2 animated fadeInRight">Hubungi
                                    Kami</button></a> --}}
                        </div>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselId" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselId" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
    <!-- Carousel End -->

    <!-- About Start -->
    <div class="container-fluid py-5 my-5" id="about">
        <div class="container pt-5">
            <div class="row g-5">
                <div class="col-lg-5 col-md-6 col-sm-12 wow fadeIn" data-wow-delay=".3s">
                    <div class="h-100 position-relative">
                        <img src="assetsUsers/img/simac-logo.png" class="img-fluid w-75 rounded" alt=""
                            style="margin-bottom: 25%;">
                        <div class="position-absolute w-75" style="top: 25%; left: 25%;">
                            {{-- <img src="assetsUsers/img/simac-logo.png" class="img-fluid w-100 rounded" alt=""> --}}
                        </div>
                    </div>
                </div>
                <div class="col-lg-7 col-md-6 col-sm-12 wow fadeIn" data-wow-delay=".5s">
                    <h5 class="text-primary">About Us</h5>
                    <h1 class="mb-4">SIMAC-UJB (Sistem Manajemen AC Universitas Janabadra)</h1>
                    {{-- <p class="mb-4">Aplikasi SIMAC dirancang untuk mempermudah pengelolaan dan
                        pemeliharaan AC di Fakultas Teknik Universitas Janabadra. Aplikasi ini memungkinkan pengguna untuk
                        memantau kondisi AC secara real-time. Dilengkapi dengan fitur QR Code, aplikasi ini memudahkan
                        pengguna dalam memindai dan mengakses informasi detail tentang setiap unit AC, termasuk riwayat
                        perbaikan, identifikasi kerusakan, dan solusi perbaikan yang sesuai.</p> --}}
                    <p class="mb-4">Aplikasi SIMAC dirancang khusus untuk mempermudah pengelolaan dan pemeliharaan AC di
                        Fakultas Teknik Universitas Janabadra. Dengan antarmuka yang ramah pengguna dan fitur-fitur canggih,
                        SIMAC memungkinkan pengguna untuk memantau kondisi AC secara real-time. Notifikasi otomatis memberi
                        tahu teknisi tentang kebutuhan perawatan rutin atau masalah mendesak, sehingga tindakan preventif
                        dapat diambil dengan cepat. Hal ini meningkatkan efisiensi perawatan dan memperpanjang umur
                        pemakaian perangkat AC.

                    <p>Salah satu fitur unggulan SIMAC adalah kemampuan pemindaian QR Code yang memudahkan akses informasi
                        detail tentang setiap unit AC. Dengan hanya memindai QR Code, pengguna dapat melihat riwayat
                        perbaikan, identifikasi kerusakan, dan solusi perbaikan yang sesuai. Fitur ini memastikan bahwa
                        semua informasi yang relevan selalu tersedia dan terorganisir dengan baik, mendukung proses
                        pengelolaan AC yang lebih efisien dan efektif.
                    </p>
                    </p>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->



    <!-- Blog Start -->
    <div class="container-fluid blog py-5 mb-5" id="AC">
        <div class="container">
            <div class="text-center mx-auto pb-5 wow fadeIn" data-wow-delay=".3s" style="max-width: 600px;">
                <h5 class="text-primary">Data AC</h5>
                <h1>Data AC Berdasarkan Ruangan</h1>
            </div>

            <div class="row g-5 justify-content-center">
                @forelse ($data as $item)
                    <div class="col-lg-6 col-xl-4 wow fadeIn" data-wow-delay=".3s">
                        <div class="blog-item position-relative bg-light rounded">
                            <img src="assetsUsers/img/ac-room.jpg" class="img-fluid w-100 rounded-top" alt="">
                            <span class="position-absolute px-4 py-3 bg-primary text-white rounded"
                                style="top: -28px; right: 20px;">R. {{ $item->ruangan }}</span>
                            <div class="blog-btn d-flex justify-content-center px-3" style="margin-top:  -75px;">
                                <div class="blog-icon btn btn-secondary px-3 rounded-pill my-auto">
                                    <a href="{{ route('dataAc.guest', encrypt($item->ruangan)) }}"
                                        class="btn text-white">Lihat Detail</a>
                                </div>
                            </div>
                            <div class="blog-coment px-4 py-2 border bg-primary rounded-bottom mt-3">
                                <a href="" class="text-white"><small>Tekan tombol diatas untuk melihat detail AC
                                        pada ruangan {{ $item->ruangan }}.</small></a>
                            </div>
                        </div>
                    </div>
                @empty
                <div class="d-flex justify-content-center">
                    <div class="text-center">
                        <h4> Data Belum Tersedia </h4>
                    </div>
                </div>
                @endforelse
            </div>
        </div>
    </div>

    <!-- Blog End -->
@endsection
