@extends('guest.layout.app')

@section('kontenUser')
    <!-- ======= F.A.Q Section ======= -->
    <section id="faq" class="faq">
        <div class="container-fluid" data-aos="fade-up">

            <div class="row gy-4">

                <div class="col-lg-12 d-flex flex-column justify-content-center align-items-stretch  order-2 order-lg-1">

                    <div class="content px-xl-5">
                        <h3>Frequently Asked <strong>Questions</strong></h3>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                            incididunt ut labore et dolore magna aliqua. Duis aute irure dolor in reprehenderit
                        </p>
                    </div>

                    <div class="accordion accordion-flush px-xl-5" id="faqlist">

                        @forelse ($data as $item)
                            <div class="accordion-item" data-aos="fade-up" data-aos-delay="200">
                                <h3 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#faq-content-{{ $item->id }}">
                                        <i class="bi bi-question-circle question-icon"></i>
                                        Riawayat perbaikan tanggal {{ $item->tgl_perbaikan }}
                                    </button>
                                </h3>
                                <div id="faq-content-{{ $item->id }}" class="accordion-collapse collapse"
                                    data-bs-parent="#faqlist">
                                    <div class="accordion-body">
                                        <div class="mb-2">
                                            <p><b>Kerusakan :</b></p>
                                            <p class="ms-3">{{ Str::ucfirst($item->kerusakan) }}</p>
                                        </div>
                                        <div class="mb-2">
                                            <p><b>Perbaikan :</b></p>
                                            <p class="ms-3">{{ Str::ucfirst($item->perbaikan) }}</p>
                                        </div>
                                        <div>
                                            <p>Teknisi:</p>
                                            <p>{{ Str::ucfirst($item->teknisiPerbaikan->name) }} -
                                                {{ Str::ucfirst($item->teknisiPerbaikan->nama_perusahaan) }}</p>
                                        </div>
                                        <div>
                                            <p>Pembuat laporan:</p>
                                            <p>{{ Str::ucfirst($item->pembuatLaporan->name) }}</p>
                                        </div>
                                        <div>
                                            <p>AC:</p>
                                            <p>Merek: {{ Str::ucfirst($item->acDesc->merekAC->merek) }}</p>
                                            <p>Seri: {{ Str::ucfirst($item->acDesc->merekAC->seri) }}</p>
                                            <p>Ruangan: {{ Str::ucfirst($item->acDesc->ruangan) }}</p>
                                        </div>

                                    </div>
                                </div>
                            </div><!-- # Faq item-->
                        @empty
                            <div class="d-flex justify-content-center">
                                <h3>-- Untuk sementara data kosong --</h3>
                            </div>
                        @endforelse

                    </div>

                </div>

                {{-- <div class="col-lg-5 align-items-stretch order-1 order-lg-2 img"
                    style='background-image: url("assetsUsers/img/faq.jpg");'>&nbsp;</div> --}}
            </div>

        </div>
    </section><!-- End F.A.Q Section -->
@endsection
