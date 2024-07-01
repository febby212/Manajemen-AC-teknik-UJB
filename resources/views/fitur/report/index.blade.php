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
                    <li class="breadcrumb-item active">{{ $ref['title'] }}</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center py-3 mt-2">
                                <h5 class="card-title">Data Laporan Kerusakan AC</h5>
                                {{-- <a href="{{ route('addDataCBR.form') }}" type="button" class="btn btn-primary">
                                    <i class="bi bi-plus-square"></i> Tambah Data
                                </a> --}}
                            </div>
                            <table class="table datatable table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Kode AC</th>
                                        <th scope="col">Laporan Kerusakan</th>
                                        <th scope="col">Tanggal Laporan Masuk</th>
                                        <th scope="col">Pelapor</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $index => $item)
                                        <tr>
                                            <th scope="row">{{ $index + 1 }}</th>
                                            <td>{{ $item['reportedData']['kode_AC'] }}</td>
                                            <td>{{ $item['kerusakan'] }}</td>
                                            <td>{{ \Carbon\Carbon::parse($item['tgl_report'])->isoFormat('D MMMM YYYY') }}
                                            </td>
                                            <td>{{ $item['created_by'] }}</td>
                                            <td>
                                                @if (is_null($item['history_id']))
                                                    <span class="badge bg-danger">Belum Diperbaiki</span>
                                                @else
                                                    <span class="badge bg-success">Sudah Diperbaiki</span>
                                                @endif
                                            </td>
                                            <td>
                                                <div class="d-flex justify-content-center gap-1">
                                                    <div class="d-flex justify-content-center gap-1">
                                                        <button type="button"
                                                            data-bs-target="#detailModal{{ $item['id'] }}"
                                                            class="btn btn-info btn-tooltip" data-bs-toggle="modal"
                                                            title="Show">
                                                            <i class="bi bi-eye"></i>
                                                        </button>
                                                    </div>
                                                    @if (is_null($item['history_id']))
                                                        <div class="d-flex justify-content-center gap-1">
                                                            <button type="button"
                                                                data-bs-target="#showModal{{ $item['id'] }}"
                                                                class="btn btn-primary btn-tooltip" data-bs-toggle="modal"
                                                                title="Show">
                                                                <i class="bi bi-pencil-square"></i>
                                                            </button>
                                                        </div>
                                                    @else
                                                    @endif
                                                </div>
                                            </td>
                                        </tr>

                                        {{-- modal detail --}}
                                        <div class="modal fade" id="detailModal{{ $item['id'] }}" data-bs-keyboard="true"
                                            tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Detail Laporan
                                                            Kerusakan
                                                            <b>{{ Str::ucfirst($item['name']) }}</b>
                                                        </h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body row">
                                                        <div class="col-md-12 mb-3">
                                                            <label for="created_by" class="form-label">Kode AC
                                                            </label>
                                                            <input type="text" name="created_by" class="form-control"
                                                                id="created_by"
                                                                value="{{ $item['reportedData']['kode_AC'] }}" disabled>
                                                        </div>
                                                        <div class="col-md-12 mb-3">
                                                            <label for="created_by" class="form-label">Tanggal Laporan Masuk
                                                            </label>
                                                            <input type="text" name="created_by" class="form-control"
                                                                id="created_by"
                                                                value="{{ \Carbon\Carbon::parse($item['tgl_report'])->formatLocalized('%e %B %Y') }}"
                                                                disabled>
                                                        </div>
                                                        <div class="col-md-12 mb-3">
                                                            <label for="created_by" class="form-label">Nomor Identitas/Nama
                                                                Pelapor
                                                            </label>
                                                            <input type="text" name="created_by" class="form-control"
                                                                id="created_by" value="{{ $item['created_by'] }}" disabled>
                                                        </div>
                                                        <div class="col-md-12 mb-3">
                                                            <label for="kerusakan" class="form-label">Deskripsi
                                                                Kerusakan</label>
                                                            <textarea type="text" name="kerusakan" class="form-control" id="kerusakan" disabled>{{ Str::ucfirst($item->kerusakan) }}</textarea>
                                                        </div>
                                                        <div class="col-md-12 mb-3">
                                                            <label for="created_by" class="form-label">Status Perbaikan
                                                            </label>
                                                            <input type="text" name="created_by" class="form-control"
                                                                id="created_by"
                                                                value="{{ is_null($item['history_id']) ? 'Belum diperbaiki' : 'Sudah diperbaiki' }}"
                                                                disabled>
                                                        </div>
                                                        @if (is_null($item['history_id']))
                                                        @else
                                                            <div class="col-md-12 mb-3">
                                                                <label for="created_by" class="form-label">Kode Perbaikan
                                                                </label>
                                                                <input type="text" name="created_by"
                                                                    class="form-control" id="created_by"
                                                                    value="{{ $item['reportHistory']['kode_perbaikan'] }}"
                                                                    disabled>
                                                            </div>
                                                        @endif
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-danger"
                                                            data-bs-dismiss="modal">Close</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Modal edit -->
                                        <div class="modal fade" id="showModal{{ $item['id'] }}"
                                            data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                                            aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Bukti Report
                                                            Sudah Ditindak
                                                            <b> No. {{ Str::ucfirst($index + 1) }}</b>
                                                        </h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form class="needs-validation was-validated"
                                                            action="{{ route('laporan.update', encrypt($item['ac_desc_id'])) }}"
                                                            method="POST" novalidate="">
                                                            @csrf
                                                            @method('PUT')
                                                            <label for="history_id" class="form-label">Daftar
                                                                Kode Perbaikan</label>
                                                            <select class="form-select select2" id="history_id"
                                                                name="history_id" required>
                                                                <option selected disabled value="">Pilih Kode
                                                                    Perbaikan
                                                                </option>
                                                                @foreach ($dataHistory as $item)
                                                                    <option value="{{ $item['id'] }}"
                                                                        {{ old('id') == $item['id'] ? 'selected' : '' }}>
                                                                        {{ $item['kode_perbaikan'] }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                            <div class="valid-tooltip">
                                                            </div>
                                                            <div class="invalid-tooltip">
                                                                Masukkan Kode Perbaikan.
                                                            </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-danger"
                                                            data-bs-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary">
                                                            Submit
                                                        </button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </tbody>
                            </table>
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
            $('body').on('shown.bs.modal', '.modal', function() {
                $(this).find('.select2').select2({
                    dropdownParent: $(this)
                });
            });
        });
    </script>
@endpush
