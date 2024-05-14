<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>HeroBiz Bootstrap Template</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{ asset('assetsUsers/img/favicon.png') }}" rel="icon">
    <link href="{{ asset('assetsUsers/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Source+Sans+Pro:ital,wght@0,300;0,400;0,600;0,700;1,300;1,400;1,600;1,700&display=swap"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('assetsUsers/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assetsUsers/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assetsUsers/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('assetsUsers/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assetsUsers/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

    <!-- Variables CSS Files. Uncomment your preferred color scheme -->
    <link href="{{ asset('assetsUsers/css/variables.css') }}" rel="stylesheet">
    <!-- <link href="assetsUsers/css/variables-blue.css" rel="stylesheet"> -->
    <!-- <link href="assetsUsers/css/variables-green.css" rel="stylesheet"> -->
    <!-- <link href="assetsUsers/css/variables-orange.css" rel="stylesheet"> -->
    <!-- <link href="assetsUsers/css/variables-purple.css" rel="stylesheet"> -->
    <!-- <link href="assetsUsers/css/variables-red.css" rel="stylesheet"> -->
    <!-- <link href="assetsUsers/css/variables-pink.css" rel="stylesheet"> -->

    <!-- Template Main CSS File -->
    <link href="{{ asset('assetsUsers/css/main.css') }}" rel="stylesheet">

    @stack('cssUser')
    <!-- =======================================================
  * Template Name: HeroBiz
  * Template URL: https://bootstrapmade.com/herobiz-bootstrap-business-template/
  * Updated: Mar 17 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

    @include('guest.layout.navUser')


    <section id="hero-animated" class="hero-animated d-flex align-items-center">
        <div class="container d-flex flex-column justify-content-center align-items-center text-center position-relative"
            data-aos="zoom-out">
            <img src="assetsUsers/img/hero-carousel/hero-carousel-3.svg" class="img-fluid animated">
            <h2>Welcome to <span>HeroBiz</span></h2>
            <p>Et voluptate esse accusantium accusamus natus reiciendis quidem voluptates similique aut.</p>
            <div class="d-flex">
                <a href="#about" class="btn-get-started scrollto">Get Started</a>
                <a href="https://www.youtube.com/watch?v=LXb3EKWsInQ"
                    class="glightbox btn-watch-video d-flex align-items-center"><i
                        class="bi bi-play-circle"></i><span>Watch Video</span></a>
            </div>
        </div>
    </section>

    <main id="main">

        @yield('kontenUser')

    </main><!-- End #main -->

    @include('guest.layout.footerUser')

    <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <div id="preloader"></div>

    <!-- Vendor JS Files -->
    <script src="{{asset('assetsUsers/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="assetsUsers/vendor/aos/aos.js"></script>
    <script src="assetsUsers/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="assetsUsers/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="assetsUsers/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="assetsUsers/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="assetsUsers/js/main.js"></script>
    @stack('jsUser')
</body>

</html>
