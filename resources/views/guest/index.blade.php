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
                            <h6 class="text-secondary h4 animated fadeInUp">Best IT Solutions</h6>
                            <h1 class="text-white display-1 mb-4 animated fadeInRight">An Innovative IT Solutions Agency
                            </h1>
                            <p class="mb-4 text-white fs-5 animated fadeInDown">Lorem ipsum dolor sit amet elit. Sed
                                efficitur quis purus ut interdum. Pellentesque aliquam dolor eget urna ultricies
                                tincidunt.</p>
                            <a href="" class="me-2"><button type="button"
                                    class="px-4 py-sm-3 px-sm-5 btn btn-primary rounded-pill carousel-content-btn1 animated fadeInLeft">Read
                                    More</button></a>
                            <a href="" class="ms-2"><button type="button"
                                    class="px-4 py-sm-3 px-sm-5 btn btn-primary rounded-pill carousel-content-btn2 animated fadeInRight">Contact
                                    Us</button></a>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="assetsUsers/img/carousel-2.jpg" class="img-fluid" alt="Second slide">
                    <div class="carousel-caption">
                        <div class="container carousel-content">
                            <h6 class="text-secondary h4 animated fadeInUp">Best IT Solutions</h6>
                            <h1 class="text-white display-1 mb-4 animated fadeInLeft">Quality Digital Services You
                                Really Need!</h1>
                            <p class="mb-4 text-white fs-5 animated fadeInDown">Lorem ipsum dolor sit amet elit. Sed
                                efficitur quis purus ut interdum. Pellentesque aliquam dolor eget urna ultricies
                                tincidunt.</p>
                            <a href="" class="me-2"><button type="button"
                                    class="px-4 py-sm-3 px-sm-5 btn btn-primary rounded-pill carousel-content-btn1 animated fadeInLeft">Read
                                    More</button></a>
                            <a href="" class="ms-2"><button type="button"
                                    class="px-4 py-sm-3 px-sm-5 btn btn-primary rounded-pill carousel-content-btn2 animated fadeInRight">Contact
                                    Us</button></a>
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


    <!-- Fact Start -->
    {{-- <div class="container-fluid bg-secondary py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 wow fadeIn" data-wow-delay=".1s">
                    <div class="d-flex counter">
                        <h1 class="me-3 text-primary counter-value">99</h1>
                        <h5 class="text-white mt-1">Success in getting happy customer</h5>
                    </div>
                </div>
                <div class="col-lg-3 wow fadeIn" data-wow-delay=".3s">
                    <div class="d-flex counter">
                        <h1 class="me-3 text-primary counter-value">25</h1>
                        <h5 class="text-white mt-1">Thousands of successful business</h5>
                    </div>
                </div>
                <div class="col-lg-3 wow fadeIn" data-wow-delay=".5s">
                    <div class="d-flex counter">
                        <h1 class="me-3 text-primary counter-value">120</h1>
                        <h5 class="text-white mt-1">Total clients who love HighTech</h5>
                    </div>
                </div>
                <div class="col-lg-3 wow fadeIn" data-wow-delay=".7s">
                    <div class="d-flex counter">
                        <h1 class="me-3 text-primary counter-value">5</h1>
                        <h5 class="text-white mt-1">Stars reviews given by satisfied clients</h5>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    <!-- Fact End -->


    <!-- About Start -->
    <div class="container-fluid py-5 my-5" id="about">
        <div class="container pt-5">
            <div class="row g-5">
                <div class="col-lg-5 col-md-6 col-sm-12 wow fadeIn" data-wow-delay=".3s">
                    <div class="h-100 position-relative">
                        <img src="assetsUsers/img/about-1.jpg" class="img-fluid w-75 rounded" alt=""
                            style="margin-bottom: 25%;">
                        <div class="position-absolute w-75" style="top: 25%; left: 25%;">
                            <img src="assetsUsers/img/about-2.jpg" class="img-fluid w-100 rounded" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-lg-7 col-md-6 col-sm-12 wow fadeIn" data-wow-delay=".5s">
                    <h5 class="text-primary">About Us</h5>
                    <h1 class="mb-4">About HighTech Agency And It's Innovative IT Solutions</h1>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed efficitur quis purus ut interdum.
                        Pellentesque aliquam dolor eget urna ultricies tincidunt. Nam volutpat libero sit amet leo
                        cursus, ac viverra eros tristique. Morbi quis quam mi. Cras vel gravida eros. Proin scelerisque
                        quam nec elementum viverra. Suspendisse viverra hendrerit diam in tempus. Etiam gravida justo
                        nec erat vestibulum, et malesuada augue laoreet.</p>
                    <p class="mb-4">Pellentesque aliquam dolor eget urna ultricies tincidunt. Nam volutpat libero sit
                        amet leo cursus, ac viverra eros tristique. Morbi quis quam mi. Cras vel gravida eros. Proin
                        scelerisque quam nec elementum viverra. Suspendisse viverra hendrerit diam in tempus.</p>
                    <a href="" class="btn btn-secondary rounded-pill px-5 py-3 text-white">More Details</a>
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
                @foreach ($data as $item)
                    <div class="col-lg-6 col-xl-4 wow fadeIn" data-wow-delay=".3s">
                        <div class="blog-item position-relative bg-light rounded">
                            <img src="assetsUsers/img/blog-1.jpg" class="img-fluid w-100 rounded-top" alt="">
                            <span class="position-absolute px-4 py-3 bg-primary text-white rounded"
                                style="top: -28px; right: 20px;">R. {{ $item->ruangan }}</span>
                            <div class="blog-btn d-flex justify-content-center px-3" style="margin-top:  -75px;">
                                <div class="blog-icon btn btn-secondary px-3 rounded-pill my-auto">
                                    <a href="{{ route('dataAc.guest', encrypt($item->id_jumlah)) }}" class="btn text-white">Lihat Detail</a>
                                </div>
                            </div>
                            <div
                                class="blog-coment px-4 py-2 border bg-primary rounded-bottom mt-3">
                                <a href="" class="text-white"><small>Tekan tombol diatas untuk melihat detail AC pada ruangan {{ $item->ruangan }}.</small></a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- Blog End -->
@endsection
