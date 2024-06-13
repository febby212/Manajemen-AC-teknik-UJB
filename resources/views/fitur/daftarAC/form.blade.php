@extends('layout.app')

@push('css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endpush

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
                                    <h5 class="card-title">Form Ubah Data AC</h5>
                                @else
                                    <h5 class="card-title">Form Tambah Data AC</h5>
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
                                    <label for="merek_id" class="form-label">Merek AC</label>
                                    <select class="form-select select2" id="merek_id" name="merek_id" required>
                                        <option selected disabled value="">Pilih Merek</option>
                                        @foreach ($merek as $item)
                                            <option value="{{ $item['id'] }}"
                                                {{ old('merek_id') == $item['id'] || (isset($data) && $data['merek_id'] == $item['id']) ? 'selected' : '' }}>
                                                {{ $item['merek'] }} - {{ $item['seri'] }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <div class="valid-tooltip">
                                        
                                    </div>
                                    <div class="invalid-tooltip">
                                        Masukkan merek ac.
                                    </div>
                                </div>

                                <div class="col-md-4 position-relative">
                                    <label for="kelengkapan" class="form-label">Kelengkapan AC</label>
                                    <select class="form-select select2" id="kelengkapan" name="kelengkapan" required>
                                        <option selected disabled value="">Pilih Kelengkapan</option>
                                        <option value="Lengkap"
                                            {{ old('kelengkapan') == 'Lengkap' || (isset($data) && $data['kelengkapan'] == 'Lengkap') ? 'selected' : '' }}>
                                            Lengkap (AC + Remote)
                                        </option>
                                        <option value="Unit AC"
                                            {{ old('kelengkapan') == 'Unit AC' || (isset($data) && $data['kelengkapan'] == 'Unit AC') ? 'selected' : '' }}>
                                            Unit AC (Indoor & Outdoor)
                                        </option>
                                        <option value="Indoor"
                                            {{ old('kelengkapan') == 'Indoor' || (isset($data) && $data['kelengkapan'] == 'Indoor') ? 'selected' : '' }}>
                                            Unit Indoor
                                        </option>
                                        <option value="Outdoor"
                                            {{ old('kelengkapan') == 'Outdoor' || (isset($data) && $data['kelengkapan'] == 'Outdoor') ? 'selected' : '' }}>
                                            Unit Outdoor
                                        </option>
                                    </select>
                                    <div class="valid-tooltip">
                                        
                                    </div>
                                    <div class="invalid-tooltip">
                                        Masukkan kelengkapan ac.
                                    </div>
                                </div>

                                <div class="col-md-4 position-relative">
                                    <label for="ruangan" class="form-label">Ruangan</label>
                                    <input type="text" class="form-control" id="ruangan" name="ruangan"
                                        value="{{ old('ruangan', isset($data) ? $data['ruangan'] : '') }}" required>
                                    <div class="valid-tooltip">
                                        
                                    </div>
                                    <div class="invalid-tooltip">
                                        Masukkan ruangan tempat ac.
                                    </div>
                                </div>

                                <div class="col-md-4 position-relative">
                                    <label for="kondisi" class="form-label">Kondisi AC</label>
                                    <select class="form-select select2" id="kondisi" name="kondisi" required>
                                        <option selected disabled value="">Pilih Kondisi AC</option>
                                        <option value="Baik"
                                            {{ old('kondisi') == 'Baik' || (isset($data) && $data['kondisi'] == 'Baik') ? 'selected' : '' }}>
                                            Baik
                                        </option>
                                        <option value="Sedang"
                                            {{ old('kondisi') == 'Sedang' || (isset($data) && $data['kondisi'] == 'Sedang') ? 'selected' : '' }}>
                                            Sedang
                                        </option>
                                        <option value="Rusak"
                                            {{ old('kondisi') == 'Rusak' || (isset($data) && $data['kondisi'] == 'Rusak') ? 'selected' : '' }}>
                                            Rusak
                                        </option>
                                    </select>
                                    <div class="valid-tooltip">
                                        
                                    </div>
                                    <div class="invalid-tooltip">
                                        Masukkan kondisi AC.
                                    </div>
                                </div>

                                <div class="col-md-4 position-relative">
                                    <label for="jumlah" class="form-label">Jumlah AC</label>
                                    <input type="number" class="form-control" id="jumlah" name="jumlah"
                                        value="{{ old('jumlah', isset($data) ? $jumlahAc : '') }}" required>
                                    <div class="valid-tooltip">
                                        
                                    </div>
                                    <div class="invalid-tooltip">
                                        Masukkan jumlah AC.
                                    </div>
                                </div>

                                <div class="col-md-4 position-relative">
                                    <label for="tahun_pembelian" class="form-label">Tahun Pembelian AC</label>
                                    <input type="text" class="form-control" id="tahun_pembelian" name="tahun_pembelian"
                                        value="{{ old('tahun_pembelian', isset($data) ? $tahun_pembelian : '') }}" required>
                                    <div class="valid-tooltip">
                                        
                                    </div>
                                    <div class="invalid-tooltip">
                                        Masukkan jumlah AC.
                                    </div>
                                </div>

                                <div class="col-md-12 position-relative">
                                    <label for="Deskripsi">Deskripsi</label>
                                    <textarea class="form-control" placeholder="Deskripsi" name="desc_kondisi" id="Deskripsi" style="height: 100px;" required>{{ old('desc_kondisi', isset($data) ? $data['desc_kondisi'] : '') }}</textarea>
                                    <div class="valid-tooltip">
                                        
                                    </div>
                                    <div class="invalid-tooltip">
                                        Masukkan deskripsi.
                                    </div>
                                </div>
                                <div class="col-12 d-flex justify-content-end gap-3">
                                    <a href="{{ route('daftarAC.index') }}" class="btn btn-danger">Cancel</a>
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
@push('js')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.select2').select2();
        });
    </script>
@endpush
