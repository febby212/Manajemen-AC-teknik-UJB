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

                {{-- @foreach ($data as $item)
                    <div class="col-lg-4 gy-3 gx-3" data-aos="fade-up" data-aos-delay="200">
                        <div class="post-box">
                            <div class="meta">
                                <span class="post-date">dddd/</span>
                                <span class="post-author"> {{ $item->merekAc->merek }} - {{ $item->merekAc->seri }}</span>
                            </div>
                            <h3 class="post-title">{{ $item->ruangan }} - {{ $item->merekAc->merek }} -
                                {{ $item->merekAc->seri }}
                            </h3>
                            <p>Kode Ac: {{ $item->kode_AC }}</p>
                            <p>Ruangan: {{ $item->ruangan }}</p>
                            <p>Kondisi: {{ $item->kondisi }}</p>
                            <p>Kelengkapan: {{ $item->kelengkapan }}</p>
                            <a href="{{ route('detail.riwayat', $item->id) }}" class="readmore stretched-link"><span>Cek
                                    Riwayat</span><i class="bi bi-arrow-right"></i></a>
                        </div>
                    </div>
                @endforeach --}}

                @foreach ($data as $ruangan => $acDescs)
                    <div class="col-lg-4 col-sm-2 gy-3 gx-3">
                        <h2>Ruangan: {{ $ruangan }}</h2>
                        <div class="p-3">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#modal-{{ str_replace('.', '', $ruangan) }}">
                                Lihat Detail
                            </button>
                        </div>
                    </div>

                    <!-- Modal -->
                    <div class="modal fade" id="modal-{{ str_replace('.', '', $ruangan) }}" tabindex="-1"
                        aria-labelledby="modal-{{ str_replace('.', '', $ruangan) }}-label" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modal-{{ str_replace('.', '', $ruangan) }}-label">Detail AC
                                        - {{ $ruangan }}</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <ul>
                                        @foreach ($acDescs as $acDesc)
                                            <li>ID AC: {{ $acDesc['id'] }}</li>
                                            <li>Kode AC: {{ $acDesc['kode_AC'] }}</li>
                                            <!-- Mengakses relasi history -->
                                            @foreach ($acDesc['history'] as $history)
                                                <li>Tanggal Perbaikan: {{ $history['tgl_perbaikan'] }}</li>
                                                <!-- Tampilkan data lainnya sesuai kebutuhan -->
                                            @endforeach
                                            <!-- Mengakses relasi merekAC -->
                                            <li>Merek AC: {{ $acDesc['merekAC']['merek'] }}</li>
                                            <!-- Tampilkan data lainnya sesuai kebutuhan -->
                                        @endforeach
                                    </ul>
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
