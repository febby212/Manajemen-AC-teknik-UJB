@extends('guest.layout.app')

@section('kontenUser')
    <!-- ======= Recent Blog Posts Section ======= -->
    <section id="recent-blog-posts" class="recent-blog-posts">

        <div class="container" data-aos="fade-up">

            <div class="section-header">
                <h2>Daftar Data Ac</h2>
                <p>Data semua ac di fakultas teknik Universitas Janabadra</p>
            </div>

            <div class="row">
                @foreach ($data as $item)
                    <div class="col-lg-4 col-sm-2 gy-3 gx-3">
                        <h2>Ruangan: {{ $item->ruangan }}</h2>
                        <div class="p-3">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#modal-{{ $item->id }}">
                                Lihat Detail
                            </button>
                        </div>
                    </div>

                    <!-- Modal -->
                    <div class="modal fade" id="modal-{{ $item->id }}" tabindex="-1"
                        aria-labelledby="modal-{{ $item->id }}-label" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modal-{{ $item->id }}-label">Detail AC
                                        - {{ $item->id }}</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <li>ID AC: {{ $item['id'] }}</li>
                                    <li>Kode AC: {{ $item['kode_AC'] }}</li>
                                    <li>Kelengkapan: {{ $item['kelengkapan'] }}</li>
                                    <!-- Looping data history -->
                                    @forelse ($item['history'] as $history)
                                        <ul>
                                            <li>ID History: {{ $history['id'] }}</li>
                                            <li>Kerusakan: {{ $history['kerusakan'] }}</li>
                                            <li>Perbaikan: {{ $history['perbaikan'] }}</li>
                                            <li>Tanggal Perbaikan: {{ $history['tgl_perbaikan'] }}</li>
                                            <!-- Tambahkan item lain sesuai kebutuhan -->
                                        </ul>
                                    @empty
                                        <h5>Ac belum memiliki history perawatan</h5>
                                    @endforelse
                                    <!-- Tambahan item lain sesuai kebutuhan -->


                                    <!-- ======= F.A.Q Section ======= -->
                                    <section id="faq" class="faq">
                                        <div class="container-fluid" data-aos="fade-up">

                                            <div class="row gy-4">

                                                <div
                                                    class="col-lg-12 d-flex flex-column justify-content-center align-items-stretch order-2 order-lg-1">

                                                    <div class="content px-xl-5">
                                                        <h3>Frequently Asked <strong>Questions</strong></h3>
                                                    </div>

                                                    <div class="accordion accordion-flush px-xl-5" id="faqlist">

                                                        @forelse ($item['history'] as $item)
                                                            <div class="accordion-item" data-aos="fade-up"
                                                                data-aos-delay="200">
                                                                <h3 class="accordion-header">
                                                                    <button class="accordion-button collapsed"
                                                                        type="button" data-bs-toggle="collapse"
                                                                        data-bs-target="#faq-content-1">
                                                                        <i class="bi bi-question-circle question-icon"></i>
                                                                        Perbaikan tanggal {{ $item['tgl_perbaikan'] }}
                                                                    </button>
                                                                </h3>
                                                                <div id="faq-content-1" class="accordion-collapse collapse"
                                                                    data-bs-parent="#faqlist">
                                                                    <div class="accordion-body">
                                                                        Feugiat pretium nibh ipsum consequat. Tempus iaculis
                                                                        urna id volutpat lacus laoreet non curabitur
                                                                        gravida.
                                                                        Venenatis lectus magna fringilla urna porttitor
                                                                        rhoncus
                                                                        dolor purus non.
                                                                    </div>
                                                                </div>
                                                            </div><!-- # Faq item-->
                                                        @empty
                                                        @endforelse


                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </section><!-- End F.A.Q Section -->
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach



            </div>

        </div>

    </section><!-- End Recent Blog Posts Section -->
@endsection
