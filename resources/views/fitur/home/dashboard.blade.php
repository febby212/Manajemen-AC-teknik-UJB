@extends('layout.app')

@section('konten')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Dashboard</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section dashboard">
            <div class="row">

                <!-- Left side columns -->
                <div class="col-lg-12">
                    <div class="row">

                        <!-- Sales Card -->
                        <div class="col-xxl-4 col-md-4">
                            <div class="card info-card sales-card pt-3">
                                <div class="card-body">
                                    <h5 class="card-title">Teknisi <span>| Jumlah</span></h5>

                                    <div class="d-flex align-items-center">
                                        <div
                                            class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-tools"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6>{{ $countTeknisi }} Orang</h6>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div><!-- End Sales Card -->

                        <!-- Revenue Card -->
                        <div class="col-xxl-4 col-md-4">
                            <div class="card info-card revenue-card pt-3">
                                <div class="card-body">
                                    <h5 class="card-title">Data AC <span>| Jumlah</span></h5>

                                    <div class="d-flex align-items-center">
                                        <div
                                            class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-clipboard2-data"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6>{{ $countDataAC }} Unit</h6>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div><!-- End Revenue Card -->

                        <div class="col-xxl-4 col-md-4">
                            <div class="card info-card revenue-card pt-3">
                                <div class="card-body">
                                    <h5 class="card-title">Revenue <span>| This Month</span></h5>

                                    <div class="d-flex align-items-center">
                                        <div
                                            class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-currency-dollar"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6>$3,264</h6>
                                            <span class="text-success small pt-1 fw-bold">8%</span> <span
                                                class="text-muted small pt-2 ps-1">increase</span>

                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div><!-- End Revenue Card -->

                        <!-- News & Updates Traffic -->
                        <div class="card pt-3">
                            <div class="card-body">
                                <h5 class="card-title">Riwayat Perbaikan <span>| Terbaru</span></h5>

                                <div class="activity">

                                    <div class="activity-item d-flex">
                                        {{-- <div class="activite-label">{{ \Carbon\Carbon::parse($latesHistory[0]['tgl_perbaikan'])->formatLocalized('%e %B %Y') }}</div> --}}
                                        <i class='bi bi-circle-fill activity-badge text-success align-self-start'></i>
                                        <div class="activity-content">
                                            Quia quae rerum beatae
                                        </div>
                                    </div><!-- End activity item-->

                                    <div class="activity-item d-flex">
                                        <div class="activite-label">56 min</div>
                                        <i class='bi bi-circle-fill activity-badge text-danger align-self-start'></i>
                                        <div class="activity-content">
                                            Voluptatem blanditiis blanditiis eveniet
                                        </div>
                                    </div><!-- End activity item-->

                                    <div class="activity-item d-flex">
                                        <div class="activite-label">2 hrs</div>
                                        <i class='bi bi-circle-fill activity-badge text-primary align-self-start'></i>
                                        <div class="activity-content">
                                            Voluptates corrupti molestias voluptatem
                                        </div>
                                    </div><!-- End activity item-->

                                    <div class="activity-item d-flex">
                                        <div class="activite-label">1 day</div>
                                        <i class='bi bi-circle-fill activity-badge text-info align-self-start'></i>
                                        <div class="activity-content">
                                            Tempore autem saepe <a href="#" class="fw-bold text-dark">occaecati
                                                voluptatem</a> tempore
                                        </div>
                                    </div><!-- End activity item-->

                                    <div class="activity-item d-flex">
                                        <div class="activite-label">2 days</div>
                                        <i class='bi bi-circle-fill activity-badge text-warning align-self-start'></i>
                                        <div class="activity-content">
                                            Est sit eum reiciendis exercitationem
                                        </div>
                                    </div><!-- End activity item-->

                                    <div class="activity-item d-flex">
                                        <div class="activite-label">4 weeks</div>
                                        <i class='bi bi-circle-fill activity-badge text-muted align-self-start'></i>
                                        <div class="activity-content">
                                            Dicta dolorem harum nulla eius. Ut quidem quidem sit quas
                                        </div>
                                    </div><!-- End activity item-->

                                </div>

                            </div>

                        </div>
                    </div><!-- End News & Updates -->

                </div>
            </div><!-- End Left side columns -->

            </div>
        </section>

    </main>
@endsection
@push('js')
    
@endpush
