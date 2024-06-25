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
                                @if (isset($data))
                                    <h5 class="card-title">Form Ubah Data Otorisasi Pejabat</h5>
                                @else
                                    <h5 class="card-title">Form Tambah Data Otorisasi Pejabat</h5>
                                @endif
                            </div>

                            <!-- Custom Styled Validation with Tooltips -->
                            <form class="row g-3 needs-validation" method="POST" action="{{ $ref['url'] }}"
                                novalidate="">
                                @csrf
                                @if (isset($data))
                                    @method('PUT')
                                @endif
                                <div class="col-md-6 position-relative">
                                    <label for="nama" class="form-label">Nama</label>
                                    <input type="text" class="form-control" id="nama" name="nama"
                                        value="{{ old('nama', isset($data) ? $data['nama'] : '') }}" required>
                                    <div class="valid-tooltip">
                                        
                                    </div>
                                    <div class="invalid-tooltip">
                                        Masukkan nama Otorisasi Pejabat.
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <label for="jabatan" class="form-label">Jabatan</label>
                                    <select class="form-select" id="jabatan" name="jabatan" required="">
                                        <option selected="" disabled="" value="">Pilih Jabatan</option>
                                        <option value="dekan" @selected(old('jabatan', isset($data) && $data['jabatan'] == 'dekan'))>Dekan</option>
                                        <option value="wadek II" @selected(old('jabatan', isset($data) && $data['jabatan'] == 'wadek II'))>Wadek II</option>
                                    </select>
                                    <div class="invalid-feedback">
                                        Pilih jabatan Otorisasi Pejabat.
                                    </div>
                                </div>

                                <div class="col-12 d-flex justify-content-end gap-3">
                                    <a href="{{ route('penyetuju.index') }}" class="btn btn-danger"
                                        type="submit">Cancel</a>
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
