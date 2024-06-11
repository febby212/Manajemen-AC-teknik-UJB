@extends('guest.layout.app')

@section('kontenUser')
    <!-- Services Start -->
    <div class="container-fluid services pb-5 my-5">
        <div class="container py-5">
            <div class="text-center mx-auto pb-5 wow fadeIn" data-wow-delay=".3s" style="max-width: 600px;">
                @foreach ($roomName as $item)
                    <h1 class="text-primary">Ruangan {{ $item['ruangan'] }}</h1>
                @endforeach
            </div>
            <div class="row g-5 services-inner">
                @foreach ($data as $index => $item)
                    <div class="col-md-6 col-lg-4 wow fadeIn" data-wow-delay=".3s">
                        <div class="services-item bg-light">
                            <div class="p-4 text-center ">
                                <div class="-icon">
                                    {{-- <i class="fa fa-code fa-5x mb-4 text-primary"></i> --}}
                                    <i class="fa-solid fa-timeline fa-5x mb-4 text-primary"></i>
                                    {{-- <h4 class="mb-3">{{ $item->kode_AC }}</h4> --}}
                                    <p class="mb-4">Tekan tombol dibawah ini untuk melihat riwayat perbaikan AC dengan
                                        kode: <br><b>{{ $item->kode_AC }}</b>.</p>
                                    <button class="btn btn-secondary text-white px-5 py-3 rounded-pill"
                                        data-bs-toggle="modal"
                                        data-bs-target="#detailHistory{{ $index }}">Detail</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Modal -->
                    @php
                        // String input
                        $string = $item->kode_AC;
                        // Membagi string berdasarkan "/"
                        $parts = explode('/', $string);
                        // Mengambil nilai paling belakang
                        $lastPart = end($parts);
                    @endphp
                    <div class="modal fade" id="detailHistory{{ $index }}" tabindex="-1"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">History Perbaikan AC
                                        {{ $lastPart }}</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    @forelse ($item->history as $nomor => $riwayat)
                                        <div class="accordion accordion-flush" id="accordionFlushExample">
                                            <div class="accordion-item">
                                                <h2 class="accordion-header">
                                                    @php
                                                        // Mengubah string tanggal menjadi objek Carbon
                                                        $date = \Carbon\Carbon::parse(
                                                            $riwayat['tgl_perbaikan'],
                                                        )->locale('id');

                                                        // Format tanggal ke bentuk "l, d F Y"
                                                        $formattedDate = $date->translatedFormat('l, d F Y');
                                                    @endphp
                                                    <button class="accordion-button collapsed" type="button"
                                                        data-bs-toggle="collapse"
                                                        data-bs-target="#history{{ $nomor }}" aria-expanded="false"
                                                        aria-controls="history{{ $nomor }}">
                                                        <b>Perbaikan tanggal {{ $formattedDate }}</b>
                                                    </button>
                                                </h2>
                                                <div id="history{{ $nomor }}" class="accordion-collapse collapse"
                                                    data-bs-parent="#accordionFlushExample">
                                                    <div class="accordion-body">
                                                        <div>
                                                            <div class="px-2 py-2 services-content">
                                                                <div class="services-content-icon">
                                                                    <h5 class="mb-2">Kerusakan</h5>
                                                                    <p class="mb-1 text-wrap">
                                                                        {{ Str::ucfirst($riwayat->kerusakan) }}
                                                                    </p>
                                                                    <h5 class="mb-2">Perbaikan</h5>
                                                                    <p class="mb-1 text-wrap">
                                                                        {{ Str::ucfirst($riwayat->perbaikan) }}
                                                                    </p>
                                                                    <h5 class="mb-2">Teknisi</h5>
                                                                    <div class="row">
                                                                        <div class="col-6">
                                                                            <p class="mb-1">
                                                                                Nama Teknisi
                                                                            </p>
                                                                        </div>
                                                                        <div class="col-6">
                                                                            <p class="mb-1">
                                                                                : {{ Str::ucfirst($riwayat->teknisiPerbaikan->name) }}
                                                                            </p>
                                                                        </div>
                                                                        <div class="col-6">
                                                                            <p class="mb-1">
                                                                                Perusahaan
                                                                            </p>
                                                                        </div>
                                                                        <div class="col-6">
                                                                            <p class="mb-1">
                                                                                : {{ Str::ucfirst($riwayat->teknisiPerbaikan->nama_perusahaan) }}
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @empty
                                        <p>Data Riwayat Perbaikan Belum Tersedia</p>
                                    @endforelse

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary">Save changes</button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Services End -->
@endsection
