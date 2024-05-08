<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link {{ $ref['title'] == 'Dashboard' ? '' : 'collapsed'}}" href="{{ route('dashboard.index') }}">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li><!-- End Dashboard Nav -->

        <li class="nav-item">
            <a class="nav-link {{ $ref['title'] == 'Teknisi' || $ref['title'] == 'Kode akses' ? '' : 'collapsed' }}" data-bs-target="#teknisi" data-bs-toggle="collapse" href="#">
                <i class="bi bi-tools"></i><span>Teknisi</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="teknisi" class="nav-content collapse {{ $ref['title'] == 'Teknisi' || $ref['title'] == 'Kode akses' ? 'show' : 'collapse' }}" data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ route('teknisi.index') }}" class="{{ $ref['title'] == 'Teknisi' ? 'active' : ''}}">
                        <i class="bi bi-circle"></i><span>Dafatar Teknisi</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('token.index') }}" class="{{ $ref['title'] == 'Kode akses' ? 'active' : ''}}">
                        <i class="bi bi-circle"></i><span>Kode Akses</span>
                    </a>
                </li>
            </ul>
        </li>

        <li class="nav-item">
            <a class="nav-link {{ $ref['title'] == 'Data AC' || $ref['title'] == 'Riwayat Perbaikan AC' ? '' : 'collapsed' }}" data-bs-target="#AC-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-fan"></i><span>AC</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="AC-nav" class="nav-content collapse {{ $ref['title'] == 'Data AC' || $ref['title'] == 'Riwayat Perbaikan AC' ? 'show' : 'collapse' }}" data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ route('daftarAC.index') }}" class="{{ $ref['title'] == 'Data AC' ? 'active' : ''}}">
                        <i class="bi bi-circle"></i><span>Daftar AC</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('history.index') }}" class="{{ $ref['title'] == 'Riwayat Perbaikan AC' ? 'active' : ''}}">
                        <i class="bi bi-circle"></i><span>Riwayat Servis</span>
                    </a>
                </li>
            </ul>
        </li>

        <li class="nav-item">
            {{-- <a class="nav-link {{ $ref['title'] == 'Data AC' || $ref['title'] == 'Riwayat Servis' ? '' : 'collapsed' }}" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#"> --}}
            <a class="nav-link {{ $ref['title'] == 'Data Merek AC' ? '' : 'collapsed' }}" data-bs-target="#Data-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-database"></i><span>Master Data</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="Data-nav" class="nav-content collapse {{ $ref['title'] == 'Data Merek AC' ? 'show' : 'collapse' }}" data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ route('merekAc.index') }}" class="{{ $ref['title'] == 'Data Merek AC' ? 'active' : ''}}">
                        <i class="bi bi-circle"></i><span>Merek AC</span>
                    </a>
                </li>
                {{-- <li>
                    <a href="{{ route('token.index') }}" class="{{ $ref['title'] == 'Riwayat Servis' ? 'active' : ''}}">
                        <i class="bi bi-circle"></i><span>Riwayat Servis</span>
                    </a>
                </li> --}}
            </ul>
        </li>
        <!-- End Forms Nav -->

        {{-- <li class="nav-heading">Pages</li> --}}

        {{-- <li class="nav-item">
            <a class="nav-link {{ $ref['title'] == 'Teknisi' ? '' : 'collapsed'}}" href="{{ route('teknisi.index') }}">
                <i class="bi bi-person"></i>
                <span>Teknisi</span>
            </a>
        </li> --}}
        <!-- End Profile Page Nav -->

        {{-- <li class="nav-item">
            <a class="nav-link collapsed" href="pages-faq.html">
                <i class="bi bi-question-circle"></i>
                <span>F.A.Q</span>
            </a>
        </li><!-- End F.A.Q Page Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" href="pages-contact.html">
                <i class="bi bi-envelope"></i>
                <span>Contact</span>
            </a>
        </li><!-- End Contact Page Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" href="pages-register.html">
                <i class="bi bi-card-list"></i>
                <span>Register</span>
            </a>
        </li><!-- End Register Page Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" href="pages-login.html">
                <i class="bi bi-box-arrow-in-right"></i>
                <span>Login</span>
            </a>
        </li><!-- End Login Page Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" href="pages-error-404.html">
                <i class="bi bi-dash-circle"></i>
                <span>Error 404</span>
            </a>
        </li><!-- End Error 404 Page Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" href="pages-blank.html">
                <i class="bi bi-file-earmark"></i>
                <span>Blank</span>
            </a>
        </li> --}}
        <!-- End Blank Page Nav -->

    </ul>

</aside>
