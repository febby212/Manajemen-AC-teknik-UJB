@extends('layout.app')

@push('css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
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
                                    <h5 class="card-title">Form Ubah Data Riwayat Perbaikan AC</h5>
                                @else
                                    <h5 class="card-title">Form Tambah Data Riwayat Perbaikan AC</h5>
                                @endif
                            </div>

                            <form class="row g-3 needs-validation" method="POST" action="{{ $ref['url'] }}"
                                novalidate="">
                                @csrf
                                @if (isset($data))
                                    @method('PUT')
                                @endif

                                <div class="col-md-6 position-relative">
                                    <label for="ac_desc_id" class="form-label">Daftar AC</label>
                                    <select class="form-select select2" id="ac_desc_id" name="ac_desc_id" required>
                                        <option selected disabled value="">Pilih Daftar Ac</option>
                                        @foreach ($data_ac as $item)
                                            <option value="{{ $item['id'] }}"
                                                {{ old('ac_desc_id') == $item['id'] || (isset($data) && $data['ac_desc_id'] == $item['id']) ? 'selected' : '' }}>
                                                {{ $item['kode_AC'] }} - {{ $item['kondisi'] }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <div class="valid-tooltip">
                                        
                                    </div>
                                    <div class="invalid-tooltip">
                                        Masukkan daftar ac.
                                    </div>
                                </div>

                                <div class="col-md-6 position-relative">
                                    <label for="PPA" class="form-label">Pejabat Pengguna Anggaran</label>
                                    <input type="text" class="form-control" id="PPA" name="PPA"
                                        placeholder="Masukkan pejabat pengguna anggaran"
                                        value="{{ old('PPA', isset($data) ? $data['PPA'] : '') }}" required>
                                    <div class="valid-tooltip">
                                        
                                    </div>
                                    <div class="invalid-tooltip">
                                        Masukkan pejabat pengguna anggaran.
                                    </div>
                                </div>

                                <div class="col-md-3 position-relative">
                                    <label for="pos_anggaran" class="form-label">POS Anggaran</label>
                                    <input type="text" class="form-control" id="pos_anggaran" name="pos_anggaran"
                                        placeholder="POS anggaran"
                                        value="{{ old('pos_anggaran', isset($data) ? $data['pos_anggaran'] : '') }}"
                                        required>
                                    <div class="valid-tooltip">
                                        
                                    </div>
                                    <div class="invalid-tooltip">
                                        Masukkan POS anggaran.
                                    </div>
                                </div>

                                <div class="col-md-3 position-relative">
                                    <label for="biaya" class="form-label">Biaya Perbaikan</label>
                                    <input type="number" class="form-control" id="biaya" name="biaya"
                                        placeholder="Masukkan biaya perbaikan"
                                        value="{{ old('biaya', isset($data) ? $data['biaya'] : '') }}" required>
                                    <div class="valid-tooltip">
                                        
                                    </div>
                                    <div class="invalid-tooltip">
                                        Masukkan POS anggaran.
                                    </div>
                                </div>

                                <div class="col-md-3 position-relative">
                                    <label for="teknisi_id" class="form-label">Teknisi AC</label>
                                    <select class="form-select select2" id="teknisi_id" name="teknisi_id" required>
                                        <option selected disabled value="">Pilih Teknisi</option>
                                        @foreach ($teknisi as $item)
                                            <option value="{{ $item['id'] }}"
                                                {{ old('teknisi_id') == $item['id'] || (isset($data) && $data['teknisi_id'] == $item['id']) ? 'selected' : '' }}>
                                                {{ $item['name'] }} - {{ $item['nama_perusahaan'] }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <div class="valid-tooltip">
                                        
                                    </div>
                                    <div class="invalid-tooltip">
                                        Masukkan teknisi AC.
                                    </div>
                                </div>

                                <div class="col-md-3 position-relative">
                                    <label for="tgl_perbaikan" class="form-label">Tanggal Perbaikan</label>
                                    <input type="text" class="form-control" id="tgl_perbaikan" name="tgl_perbaikan"
                                        value="{{ old('tgl_perbaikan', isset($data) ? $data['tgl_perbaikan'] : '') }}"
                                        required>
                                    <div class="valid-tooltip">
                                        
                                    </div>
                                    <div class="invalid-tooltip">
                                        Masukkan tanggal perbaikan.
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <div class="col-md-6 position-relative">
                                        <label for="kerusakan" class="form-label">Kerusakan</label>
                                        <textarea type="text" class="form-control" id="kerusakan" name="kerusakan"
                                            placeholder="Contoh: Ac tidak dingin, Unit outdoor mati" required>{{ old('kerusakan', isset($data) ? $data['kerusakan'] : '') }}</textarea>
                                        <div class="valid-tooltip">
                                            
                                        </div>
                                        <div class="invalid-tooltip">
                                            Masukkan kerusakan AC.
                                        </div>
                                    </div>

                                    <div class="col-md-6 position-relative">
                                        <label for="perbaikan" class="form-label">Perbaikan</label>
                                        <textarea type="text" class="form-control" id="perbaikan" name="perbaikan"
                                            placeholder="Contoh: Cuci AC, Ganti compresor" required>{{ old('perbaikan', isset($data) ? $data['perbaikan'] : '') }}</textarea>
                                        <div class="valid-tooltip">
                                            
                                        </div>
                                        <div class="invalid-tooltip">
                                            Masukkan perbaikan AC.
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12 d-flex justify-content-end gap-3">
                                    <a href="{{ route('daftarAC.index') }}" class="btn btn-danger">Cancel</a>
                                    <button class="btn btn-primary" type="submit">Submit</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
@push('js')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="https://npmcdn.com/flatpickr/dist/l10n/id.js"></script>

    <script>
        $(document).ready(function() {
            $('.select2').select2();
        });

        $(document).ready(function() {
            flatpickr('#tgl_perbaikan', {
                dateFormat: 'Y-m-d',
                altFormat: 'd F Y',
                altInput: true,
                enableTime: false,
                locale: 'id',
                allowInput: true,
            });
        })
    </script>
@endpush
