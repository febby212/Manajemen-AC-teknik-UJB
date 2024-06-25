@extends('layout.app')

@section('konten')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>{{ $ref['title'] }}</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('teknisi.index') }}">{{ $ref['title'] }}</a></li>
                    @if (isset($data))
                        <li class="breadcrumb-item active">Ubah Data</li>
                    @else
                        <li class="breadcrumb-item active">Tambah Data</li>
                    @endif
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body p-3">
                            <div class="mb-5">
                                <h5 class="card-title">Form Tambah Data Prediksi</h5>
                            </div>

                            <!-- Custom Styled Validation with Tooltips -->
                            <form class="row g-3 needs-validation" method="POST" action="{{ $ref['url'] }}"
                                novalidate="">
                                @csrf
                                <div class="col-md-2 position-relative">
                                    <label for="bobot" class="form-label">Bobot</label>
                                    <select class="form-select" name="bobot" id="bobot" required="">
                                        <option selected="" disabled="" value="">Pilih Bobot</option>
                                        <option value="1" {{ old('bobot') == 1 ? 'selected' : '' }}>1</option>
                                        <option value="3" {{ old('bobot') == 3 ? 'selected' : '' }}>3</option>
                                        <option value="5" {{ old('bobot') == 5 ? 'selected' : '' }}>5</option>
                                    </select>
                                    <div class="valid-tooltip">

                                    </div>
                                    <div class="invalid-tooltip">
                                        Pilih bobot.
                                    </div>
                                </div>
                                <div class="col-md-2 position-relative">
                                    <label for="kd_gejjala" class="form-label">Kode Gejala</label>
                                    <input type="text" class="form-control" id="kd_gejjala" name="kd_gejala"
                                        value="{{ old('kd_gejala') }}" required>
                                        <p class="fs-6 fst-italic text-danger mt-1">Contoh: G010</p>
                                    <div class="valid-tooltip">

                                    </div>
                                    <div class="invalid-tooltip">
                                        Masukkan kode gejala.
                                    </div>
                                </div>

                                <div class="col-md-2 position-relative">
                                    <label for="kd_penyakit" class="form-label">Kode Kerusakan</label>
                                    <input type="text" class="form-control" id="kd_penyakit" name="kd_penyakit"
                                        value="{{ old('kd_penyakit') }}" required>
                                    <p class="fs-6 fst-italic text-danger mt-1">Contoh: P004</p>
                                    <div class="valid-tooltip">

                                    </div>
                                    <div class="invalid-tooltip">
                                        Masukkan kode penyakit.
                                    </div>
                                </div>

                                <div class="col-md-6 position-relative">
                                    <label for="penyakit" class="form-label">Nama Kerusakan</label>
                                    <input type="text" class="form-control" id="penyakit" name="nama_penyakit"
                                        value="{{ old('nama_penyakit') }}" required>
                                    <div class="valid-tooltip">

                                    </div>
                                    <div class="invalid-tooltip">
                                        Masukkan nama penyakit.
                                    </div>
                                </div>
                                <div class="col-md-6 position-relative">
                                    <label for="gejala" class="form-label">Gejala</label>
                                    <textarea class="form-control" id="gejala" name="gejala" required cols="15" rows="5">{{ old('gejala') }}</textarea>
                                    <div class="valid-tooltip">

                                    </div>
                                    <div class="invalid-tooltip">
                                        Masukkan gejala.
                                    </div>
                                </div>
                                <div class="col-md-6 position-relative">
                                    <label for="solusi" class="form-label">Solusi</label>
                                    <textarea class="form-control" id="solusi" name="solusi" required cols="15" rows="5">{{ old('solusi') }}</textarea>
                                    <div class="valid-tooltip">

                                    </div>
                                    <div class="invalid-tooltip">
                                        Masukkan solusi.
                                    </div>
                                </div>
                                <div class="col-12 d-flex justify-content-end gap-3">
                                    <a href="{{ url()->previous() }}" class="btn btn-danger">Cancel</a>
                                    <button class="btn btn-primary" type="submit">Submit</button>
                                </div>
                            </form><!-- End Custom Styled Validation with Tooltips -->

                        </div>
                    </div>

                </div>
            </div>
        </section>

    </main>
@endsection
