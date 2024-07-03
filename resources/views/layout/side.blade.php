<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link {{ $ref['title'] == 'Dashboard' ? '' : 'collapsed' }}"
                href="{{ route('dashboard.index') }}">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li><!-- End Dashboard Nav -->

        <li class="nav-item">
            <a class="nav-link {{ $ref['title'] == 'Laporan Kerusakan AC' ? '' : 'collapsed' }}"
                href="{{ route('laporan.index') }}">
                <i class="bi bi-exclamation-triangle"></i>
                <span>Laporan Kerusakan AC</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link {{ $ref['title'] == 'Riwayat Perbaikan AC' ? '' : 'collapsed' }}"
                href="{{ route('history.index') }}">
                <i class="bi bi-clock-history"></i>
                <span>Riwayat Perbaikan AC</span>
            </a>
        </li>
        <!-- End Profile Page Nav -->

        <li class="nav-item">
            <a class="nav-link {{ $ref['title'] == 'Data AC' ? '' : 'collapsed' }}"
                href="{{ route('daftarAC.index') }}">
                <i class="bi bi-card-list"></i>
                <span>Data AC</span>
            </a>
        </li><!-- End F.A.Q Page Nav -->

        <li class="nav-item">
            <a class="nav-link {{ $ref['title'] == 'Data Histori Prediksi' ? '' : 'collapsed' }}"
                data-bs-target="#cbr" data-bs-toggle="collapse" href="#">
                <i class="bi bi-search"></i><span>Identifikasi Kerusakan</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="cbr"
                class="nav-content collapse {{ $ref['title'] == 'Data Histori Prediksi' ? 'show' : 'collapse' }}"
                data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ route('prediksi.form') }}" class="{{ $ref['title'] == 'Prediksi Kerusakan' ? 'active' : '' }}">
                        <i class="bi bi-circle"></i><span>Prediksi Kerusakan</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('histori-identifikasi.index') }}" class="{{ $ref['title'] == 'Data Histori Prediksi' ? 'active' : '' }}">
                        <i class="bi bi-circle"></i><span>Riwayat Identifikasi</span>
                    </a>
                </li>
            </ul>
        </li>
        
        <li class="nav-item">
            <a class="nav-link {{ $ref['title'] == 'Teknisi' || $ref['title'] == 'Kode akses' ? '' : 'collapsed' }}"
                data-bs-target="#teknisi" data-bs-toggle="collapse" href="#">
                <i class="bi bi-tools"></i><span>Teknisi</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="teknisi"
                class="nav-content collapse {{ $ref['title'] == 'Teknisi' || $ref['title'] == 'Kode akses' ? 'show' : 'collapse' }}"
                data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ route('teknisi.index') }}" class="{{ $ref['title'] == 'Teknisi' ? 'active' : '' }}">
                        <i class="bi bi-circle"></i><span>Daftar Teknisi</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('token.index') }}" class="{{ $ref['title'] == 'Kode akses' ? 'active' : '' }}">
                        <i class="bi bi-circle"></i><span>Kode Akses</span>
                    </a>
                </li>
            </ul>
        </li>

        <li class="nav-item">
            <a class="nav-link {{ $ref['title'] == 'Data Merek AC' || $ref['title'] == 'Otorisasi Pejabat' || $ref['title'] == 'Data Solusi' || $ref['title'] == 'Data Gejala' || $ref['title'] == 'Data Case Base' ? '' : 'collapsed' }}"
                data-bs-target="#master" data-bs-toggle="collapse" href="#">
                <i class="bi bi-database"></i><span>Master Data</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="master"
                class="nav-content collapse {{ $ref['title'] == 'Data Merek AC' || $ref['title'] == 'Otorisasi Pejabat' || $ref['title'] == 'Data Solusi' || $ref['title'] == 'Data Gejala' || $ref['title'] == 'Data Case Base' ? 'show' : 'collapse' }}"
                data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ route('merekAc.index') }}" class="{{ $ref['title'] == 'Data Merek AC' ? 'active' : '' }}">
                        <i class="bi bi-circle"></i><span>Merek AC</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('penyetuju.index') }}" class="{{ $ref['title'] == 'Otorisasi Pejabat' ? 'active' : '' }}">
                        <i class="bi bi-circle"></i><span>Otoritas Pejabat</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('gejala.index') }}" class="{{ $ref['title'] == 'Data Gejala' ? 'active' : '' }}">
                        <i class="bi bi-circle"></i><span>Data Gejala</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('solusi.index') }}" class="{{ $ref['title'] == 'Data Solusi' ? 'active' : '' }}">
                        <i class="bi bi-circle"></i><span>Data Solusi</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('case-base.index') }}" class="{{ $ref['title'] == 'Data Case Base' ? 'active' : '' }}">
                        <i class="bi bi-circle"></i><span>Case Base</span>
                    </a>
                </li>
            </ul>
        </li>
    </ul>

</aside>
