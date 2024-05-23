<!-- ======= Header ======= -->
<header id="header" class="header fixed-top" data-scrollto-offset="0">
    <div class="container-fluid d-flex align-items-center justify-content-between">
        <a href="#" class="logo d-flex align-items-center scrollto me-auto me-lg-0">
            <!-- Uncomment the line below if you also wish to use an image logo -->
            <!-- <img src="assetsUsers/img/logo.png" alt=""> -->
            <h1>HeroBiz<span>.</span></h1>
        </a>

        <nav id="navbar" class="navbar ms-3">
            <ul>
                {{-- <li><a class="nav-link scrollto" href="#">Home</a></li>
                <li><a class="nav-link scrollto" href="index.html#faq">FAQ</a></li> --}}
                @auth
                    @if (auth()->user()->is_admin == 1 || auth()->user()->is_wadek == 1 || auth()->user()->is_dekan == 1)
                        <li><a class="nav-link scrollto" href="{{ route('dashboard.index') }}">Dashboard</a></li>
                    @else
                        <li><a class="nav-link scrollto" href="{{ route('buat.riwayat') }}">Form Riwayat</a></li>
                        <li><a class="nav-link scrollto" href="{{ route('buat.riwayat') }}">Scan</a></li>
                    @endif
                @else
                    <a class="btn-getstarted scrollto ms-2" href="{{ route('auth.teknisi') }}">Login</a>
                @endauth
            </ul>
            <i class="bi bi-list mobile-nav-toggle d-none"></i>
        </nav><!-- .navbar -->
    </div>
</header><!-- End Header -->
