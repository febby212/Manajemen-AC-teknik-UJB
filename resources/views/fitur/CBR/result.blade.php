{{-- @foreach ($resData as $item)
    <ul>
        <li>{{ $item->userPredict->name }}</li>
        <li>{{ $item->dataACRel->kode_AC }}</li>
        <li>{{ $item->kd_penyakit }}</li>
        <li>{{ $item->kd_gejala }}</li>
        <li>{{ $item->penyakit }}</li>
        <li>{{ $item->solusi }}</li>
        <li>{{ $item->persentase }}</li>
    </ul>
@endforeach --}}
@extends('layout.app')

@push('css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endpush

@section('konten')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Hasil {{ $ref['title'] }}</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Home</a></li>
                    <li class="breadcrumb-item active">{{ $ref['title'] }}</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section faq">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card basic">
                        <div class="card-body">
                            <div class="mb-4 p-4">
                                <p class="fs-5 m-0" style="color: #000">
                                    Halo {{ Str::ucfirst(Auth::user()->name) }},
                                </p>
                                <p style="color: #000">
                                    Berdasarkan gejala yang Anda berikan, yaitu:
                                </p>
                                <ul>
                                    @foreach ($dataGejalaInput as $item)
                                        <li>{{ $item->gejala }}</li>
                                    @endforeach
                                </ul>

                                <p style="color: #000">
                                    Sistem kami memprediksi dua kemungkinan kerusakan utama pada AC,
                                    yaitu: <b>{{ $resData[0]->penyakit }}</b> dengan
                                    persentase <b>{{ $resData[0]->persentase }}%</b> dan
                                    <b>{{ $resData[1]->penyakit }}</b> dengan
                                    persentase <b>{{ $resData[1]->persentase }}%</b>. Untuk setiap
                                    kerusakan, kami telah memberikan solusi yang dapat Anda ikuti untuk memperbaiki atau
                                    mengatasi masalah tersebut. <p style="color: #000">Berikut solusi dari kami berdasarkan hasil prediksi
                                    kerusakan AC:</p>
                                </p>
                                <ul class="row">
                                    <li class="col-6"><b>{{ $resData[0]->penyakit }}</b>: {{ $resData[0]->solusi }}</li>
                                    <li class="col-6"><b>{{ $resData[1]->penyakit }}</b>: {{ $resData[1]->solusi }}</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
@push('js')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
@endpush
