<!DOCTYPE html>
<html lang="en">

<head>
    @if (isset($data->kode_AC))
        @php
            // String input
            $string = $data->kode_AC;
            // Membagi string berdasarkan "/"
            $parts = explode('/', $string);
            // Mengambil nilai paling belakang
            $lastPart = end($parts);
        @endphp
    @endif
    <meta charset="utf-8">
    <title>{{ $ref['title'] }} {{ isset($data->kode_AC) ? $lastPart : '' }} - SIMAC UJB</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicons -->
    <link href="assets/img/logo-180.png" rel="icon">
    {{-- <link href="{{ asset('assets/img/favicon.png') }}" rel="icon"> --}}
    <link href="assets/img/logo-180.png" rel="apple-touch-icon">
    {{-- <link href="{{ asset('assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon"> --}}

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&family=Saira:wght@500;600;700&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    {{-- <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet"> --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('assetsUsers/lib/animate/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assetsUsers/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('assetsUsers/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ asset('assetsUsers/css/style.css') }}" rel="stylesheet">
    @stack('css')
</head>

<body>
    <!-- Spinner Start -->
    <div id="spinner"
        class="show position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-grow text-primary" role="status"></div>
    </div>
    <!-- Spinner End -->


    @include('guest.layout.navUser')

    @yield('kontenUser')

    {{-- modal auth --}}
    <div class="modal fade" id="authModal" aria-hidden="true" aria-labelledby="authModalLabel" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <h1 class="modal-title fs-5" id="authModalLabel">Autentikasi</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Apakah Anda <b>teknisi</b> atau <b>admin</b> dari aplikasi ini?
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary" data-bs-target="#authModal2" data-bs-toggle="modal">Teknisi</button>
                    <a href="{{ route('login') }}" class="btn btn-primary">Admin</a>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="authModal2" data-bs-backdrop="static" data-bs-keyboard="false" aria-hidden="true"
        aria-labelledby="authModalLabel2" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="authModalLabel2">Kode Akses</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('login.teknisi') }}" method="post">
                        @csrf
                        <div class="form-group mt-3">
                            <input type="text" class="form-control" name="token" id="subject"
                                placeholder="Masukkan Kode Akses" required>
                        </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary" data-bs-target="#authModal" data-bs-toggle="modal">Submit</button>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal"
                        aria-label="Close">Cancel</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @include('guest.layout.footerUser')


    <!-- Back to Top -->
    <a href="#" class="btn btn-secondary btn-square rounded-circle back-to-top"><i
            class="fa fa-arrow-up text-white"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/js/all.min.js"
        integrity="sha512-u3fPA7V8qQmhBPNT5quvaXVa1mnnLSXUep5PS1qo5NRzHwG19aHmNJnj1Q8hpA/nBWZtZD4r4AX6YOt5ynLN2g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="{{ asset('assetsUsers/lib/wow/wow.min.js') }}"></script>
    <script src="{{ asset('assetsUsers/lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('assetsUsers/lib/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ asset('assetsUsers/lib/owlcarousel/owl.carousel.min.js') }}"></script>

    <!-- Template Javascript -->
    <script src="{{ asset('assetsUsers/js/main.js') }}"></script>
    <script>
        toastr.options = {
            "closeButton": true,
            "newestOnTop": false,
            "progressBar": true,
            "positionClass": "toast-top-full-width",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "3000",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut",
        }
    </script>
    @include('layout.alert')
    @stack('js')
</body>

</html>
