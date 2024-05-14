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

    <!-- =======================================================
  * Template Name: HeroBiz
  * Template URL: https://bootstrapmade.com/herobiz-bootstrap-business-template/
  * Updated: Mar 17 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body style="height: 100vh">

    <main id="main"  style="height: 83.5%">

        <!-- ======= On Focus Section ======= -->
        <section id="onfocus" class="onfocus">
            <div class="container-fluid p-0">

                <div class="row g-0">
                    <div class="col-lg-6 video-play position-relative">
                        <a href="https://www.youtube.com/watch?v=0JyUysKJRFQ&ab_channel=DaikinAustraliaPtyLtd"
                            class="glightbox play-btn"></a>
                    </div>
                    <div class="col-lg-6">
                        <div class="content d-flex flex-column justify-content-center h-100">
                            <!-- ======= Contact Section ======= -->
                            <section id="contact" class="contact">
                                <div class="container">

                                    <div class="row">

                                        <div class="col-lg-12">
                                            <form action="{{ route('auth.tech') }}" method="POST" role="form"
                                                class="php-email-form">
                                                @csrf
                                                <div class="form-group mt-3">
                                                    <input type="text" class="form-control" name="token"
                                                        id="subject" placeholder="Masukkan Kode Akses" required>
                                                </div>
                                                <div class="text-center mt-3"><button type="submit">Login</button>
                                                </div>
                                            </form>
                                        </div><!-- End Contact Form -->

                                    </div>

                                </div>
                            </section><!-- End Contact Section -->
                        </div>
                    </div>
                </div>

            </div>
        </section><!-- End On Focus Section -->

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer">
        <div class="footer-legal text-center">
            <div
                class="container d-flex flex-column flex-lg-row justify-content-center justify-content-lg-between align-items-center">

                <div class="d-flex flex-column align-items-center align-items-lg-start">
                    <div class="copyright">
                        &copy; Copyright <strong><span>HeroBiz</span></strong>. All Rights Reserved
                    </div>
                    <div class="credits">
                        <!-- All the links in the footer should remain intact. -->
                        <!-- You can delete the links only if you purchased the pro version. -->
                        <!-- Licensing information: https://bootstrapmade.com/license/ -->
                        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/herobiz-bootstrap-business-template/ -->
                        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
                    </div>
                </div>

                <div class="social-links order-first order-lg-last mb-3 mb-lg-0">
                    <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                    <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                    <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                    <a href="#" class="google-plus"><i class="bi bi-skype"></i></a>
                    <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
                </div>

            </div>
        </div>

    </footer><!-- End Footer -->

    <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <div id="preloader"></div>

    <!-- Vendor JS Files -->
    <script src="{{ asset('assetsUsers/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="assetsUsers/vendor/aos/aos.js"></script>
    <script src="assetsUsers/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="assetsUsers/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="assetsUsers/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="assetsUsers/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="assetsUsers/js/main.js"></script>

</body>

</html>
