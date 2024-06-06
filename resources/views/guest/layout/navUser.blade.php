<!-- Navbar Start -->
<div class="container-fluid bg-primary sticky-top">
    <nav class="navbar navbar-dark navbar-expand-lg py-0">
        <a href="index.html" class="navbar-brand">
            <h1 class="text-white fw-bold d-block">High<span class="text-secondary">Tech</span> </h1>
        </a>
        <button type="button" class="navbar-toggler me-0" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse bg-transparent" id="navbarCollapse">
            <div class="navbar-nav ms-auto mx-xl-auto p-0">
                <a href="index.html" class="nav-item nav-link active text-secondary">Home</a>
                <a href="#about" class="nav-item nav-link">Tentang</a>
                <a href="#AC" class="nav-item nav-link">Data Ac</a>
                <a href="{{ route('scan') }}" class="nav-item nav-link">Scan AC</a>
            </div>
            @auth
                <form action="{{ route('logout') }}" method="post">
                    @csrf
                    <button type="submit" class="btn btn-primary">
                        Logout
                    </button>
                </form>
            @else
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#authModal">
                    Sign In
                </button>
            @endauth
        </div>
    </nav>
</div>
<!-- Navbar End -->
