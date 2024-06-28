@extends('layout.app')

@section('konten')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Dashboard</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Home</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section dashboard">
            <div class="row">

                <!-- Left side columns -->
                <div class="col-lg-8">
                    <div class="row">

                        <!-- Sales Card -->
                        <div class="col-xxl-4 col-md-6">
                            <div class="card info-card sales-card">

                                <div class="card-body pt-4">
                                    <h5 class="card-title">Data AC <span>| Jumlah</span></h5>

                                    <div class="d-flex align-items-center">
                                        <div
                                            class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-fan"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6>{{ $countDataAC }} Unit</h6>

                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div><!-- End Sales Card -->

                        <!-- Revenue Card -->
                        <div class="col-xxl-4 col-md-6">
                            <div class="card info-card revenue-card">

                                <div class="card-body pt-4">
                                    <h5 class="card-title">Teknisi <span>| Jumlah</span></h5>

                                    <div class="d-flex align-items-center">
                                        <div
                                            class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-people-fill"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6>{{ $countTeknisi }} Teknisi</h6>

                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div><!-- End Revenue Card -->

                        <!-- Customers Card -->
                        <div class="col-xxl-4 col-md-6">
                            {{-- <div class="col-xxl-4 col-xl-12"> --}}

                            <div class="card info-card customers-card">

                                <div class="card-body pt-4">
                                    <h5 class="card-title">Laporan Kerusakan <span>| Jumlah</span></h5>

                                    <div class="d-flex align-items-center">
                                        <div
                                            class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-exclamation-diamond"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6>{{ $contReport }} Laporan</h6>

                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div><!-- End Customers Card -->

                        <div class="col-xxl-12 col-md-6">
                            {{-- <div class="col-xxl-4 col-xl-12"> --}}

                            <div class="card info-card history-card">

                                <div class="card-body pt-4">
                                    <h5 class="card-title">Riwayat Perbaikan <span>| Jumlah</span></h5>

                                    <div class="d-flex align-items-center">
                                        <div
                                            class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-hourglass-split"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6>{{ $countHistory }} Perbaikan</h6>

                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div><!-- End Customers Card -->

                        <!-- Reports -->
                        <div class="col-12">
                            <div class="card">

                                <div class="card-body pt-4">
                                    <h5 class="card-title">Biaya Perbaikan</h5>

                                    <!-- Line Chart -->
                                    <div id="reportsChart"></div>

                                    <script>
                                        document.addEventListener("DOMContentLoaded", function() {
                                            // Ambil data dari PHP
                                            var data = @json($biayaPerbaikan);

                                            // Pisahkan biaya dan created_at
                                            var biaya = data.map(item => parseInt(item.biaya));
                                            var createdAt = data.map(item => item.created_at);

                                            // Fungsi untuk mengubah angka menjadi format Rupiah
                                            function formatRupiah(angka) {
                                                return 'Rp' + angka.toString().replace(/\B(?=(\d{3})+(?!\d))/g, '.');
                                            }

                                            // Buat chart menggunakan ApexCharts
                                            new ApexCharts(document.querySelector("#reportsChart"), {
                                                series: [{
                                                    name: 'Biaya Perbaikan',
                                                    data: biaya,
                                                }],
                                                chart: {
                                                    height: 350,
                                                    type: 'area',
                                                    toolbar: {
                                                        show: false
                                                    },
                                                },
                                                markers: {
                                                    size: 4
                                                },
                                                colors: ['#4154f1'],
                                                fill: {
                                                    type: "gradient",
                                                    gradient: {
                                                        shadeIntensity: 1,
                                                        opacityFrom: 0.3,
                                                        opacityTo: 0.4,
                                                        stops: [0, 90, 100]
                                                    }
                                                },
                                                dataLabels: {
                                                    enabled: false
                                                },
                                                stroke: {
                                                    curve: 'smooth',
                                                    width: 2
                                                },
                                                xaxis: {
                                                    type: 'date',
                                                    categories: createdAt
                                                },
                                                tooltip: {
                                                    x: {
                                                        format: 'dd/MM/yy HH:mm'
                                                    },
                                                    y: {
                                                        formatter: function(value) {
                                                            return formatRupiah(value);
                                                        }
                                                    }
                                                }
                                            }).render();
                                        });
                                    </script>
                                    <!-- End Line Chart -->
                                </div>
                            </div>
                        </div><!-- End Reports -->

                    </div>
                </div><!-- End Left side columns -->

                <!-- Right side columns -->
                <div class="col-lg-4">

                    <!-- News & Updates Traffic -->
                    <div class="card">
                        <div class="card-body pt-3">
                            <h5 class="card-title">Laporan Kerusakan AC Terbaru</h5>

                            <div class="news">
                                @foreach ($latesReport as $item)
                                    <div class="post-item clearfix">
                                        <img src="{{ asset('assets/img/alert.png') }}" alt="">
                                        <h4>{{ $item['created_at'] }} - {{ $item['pelapor'] }}</h4>
                                        <p>{{ Str::limit($item['kerusakan'], 50, '...') }}</p>
                                    </div>
                                @endforeach

                            </div><!-- End sidebar recent posts-->

                        </div>
                    </div><!-- End News & Updates -->

                </div><!-- End Right side columns -->

                <!-- Recent Sales -->
                <div class="col-12">
                    <div class="card recent-sales overflow-auto">
                        <div class="card-body pt-4">
                            <h5 class="card-title">Riwayat Perbaikan Terbaru</h5>
                            <div class="table-responsive">
                                <table class="table table-borderless datatable">
                                    <thead>
                                        <tr>
                                            <th scope="col">No</th>
                                            <th scope="col">Kode Perbaikan</th>
                                            <th scope="col">Teknisi</th>
                                            <th scope="col">Tanggal Perbaikan</th>
                                            <th scope="col">Kerusakan</th>
                                            <th scope="col">Perbaikan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($latesHistory as $index => $item)
                                            <tr>
                                                <th>{{ $index + 1 }}</th>
                                                <td>{{ $item['kode_perbaikan'] }}</td>
                                                <td>
                                                    {{ Str::Ucfirst($item['teknisiPerbaikan']['name']) }} -
                                                    {{ Str::Ucfirst($item['teknisiPerbaikan']['nama_perusahaan']) }}</td>
                                                <td>
                                                    {{ \Carbon\Carbon::parse($item['tgl_perbaikan'])->isoFormat('D MMMM YYYY') }}
                                                </td>
                                                <td>{{ Str::limit(Str::ucfirst($item['kerusakan']), 20, '...') }}</td>
                                                <td>{{ Str::limit(Str::ucfirst($item['perbaikan']), 20, '...') }}</td>
                                            </tr>
                                        @empty
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div><!-- End Recent Sales -->

            </div>
        </section>

    </main><!-- End #main -->
@endsection
@push('js')
@endpush
