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
                                    <h5 class="card-title">Form Ubah Data Teknisi</h5>
                                @else
                                    <h5 class="card-title">Form Tambah Data Teknisi</h5>
                                @endif
                            </div>

                            <!-- Custom Styled Validation with Tooltips -->
                            <form class="row g-3 needs-validation" method="POST" action="{{ $ref['url'] }}"
                                novalidate="">
                                @csrf
                                @if (isset($data))
                                    @method('PUT')
                                @endif
                                <div class="col-md-4 position-relative">
                                    <label for="nama" class="form-label">Nama Teknisi</label>
                                    <input type="text" class="form-control" id="nama" name="name"
                                        value="{{ old('name', isset($data) ? $data['name'] : '') }}" required>
                                    <div class="valid-tooltip">
                                        
                                    </div>
                                    <div class="invalid-tooltip">
                                        Masukkan nama teknisi.
                                    </div>
                                </div>
                                <div class="col-md-4 position-relative">
                                    <label for="perusahaan" class="form-label">Nama Perusahaan</label>
                                    <input type="text" class="form-control" id="perusahaan" name="nama_perusahaan"
                                        value="{{ old('nama_perusahaan', isset($data) ? $data['nama_perusahaan'] : '') }}"
                                        required>
                                    <div class="valid-tooltip">
                                        
                                    </div>
                                    <div class="invalid-tooltip">
                                        Masukkan nama perusahaan.
                                    </div>
                                </div>
                                <div class="col-md-4 position-relative">
                                    <label for="alamatPerusahaan" class="form-label">Alamat Perusahaan</label>
                                    <input type="text" class="form-control" id="alamatPerusahaan"
                                        name="alamat_perusahaan"
                                        value="{{ old('alamat_perusahaan', isset($data) ? $data['alamat_perusahaan'] : '') }}"
                                        required>
                                    <div class="valid-tooltip">
                                        
                                    </div>
                                    <div class="invalid-tooltip">
                                        Masukkan alamat perusahaan.
                                    </div>
                                </div>
                                <div class="col-md-4 position-relative">
                                    <label for="no_telp" class="form-label">Nomor Telpon</label>
                                    <input type="text" class="form-control" id="no_telp"
                                        name="no_telp"
                                        value="{{ old('no_telp', isset($data) ? $data['no_telp'] : '') }}"
                                        required>
                                    <div class="valid-tooltip">
                                        
                                    </div>
                                    <div class="invalid-tooltip">
                                        Masukkan nomor telp.
                                    </div>
                                </div>
                                {{-- <div class="col-md-3 position-relative">
                                    <label for="validationTooltip04" class="form-label">State</label>
                                    <select class="form-select" id="validationTooltip04" required="">
                                        <option selected="" disabled="" value="">Choose...</option>
                                        <option>...</option>
                                    </select>
                                    <div class="invalid-tooltip">
                                        Please select a valid state.
                                    </div>
                                </div>
                                <div class="col-md-3 position-relative">
                                    <label for="validationTooltip05" class="form-label">Zip</label>
                                    <input type="text" class="form-control" id="validationTooltip05" required="">
                                    <div class="invalid-tooltip">
                                        Please provide a valid zip.
                                    </div>
                                </div> --}}
                                <div class="col-12 d-flex justify-content-end gap-3">
                                    <a href="{{ route('teknisi.index') }}" class="btn btn-danger">Cancel</a>
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
