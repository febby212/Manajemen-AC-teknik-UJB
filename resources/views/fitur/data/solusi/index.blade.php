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
                            <div class="d-flex justify-content-between align-items-center py-3">
                                <h5 class="card-title">Data Gejala</h5>
                                {{-- <a href="{{ route('addDataCBR.form') }}" type="button" class="btn btn-primary"><i
                                    class="bi bi-plus-square"></i> Tambah Data</a> --}}
                            </div>
                            <table class="table datatable table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Kode Kerusakan</th>
                                        <th scope="col">Jenis Kerusakan</th>
                                        <th scope="col">Solusi</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $index = 1;
                                    @endphp
                                    @foreach ($data as $item)
                                        <tr>
                                            <th scope="row">{{ $index++ }}</th>
                                            <td>{{ $item['kd_penyakit'] }}</td>
                                            <td>{{ $item['nama_penyakit'] }}</td>
                                            <td>{{ Str::limit($item['solusi'], 30, '...') }}</td>
                                            <td>
                                                <div class="d-flex justify-content-center gap-1">
                                                    <button type="button" data-bs-target="#showModal{{ $item['id'] }}"
                                                        class="btn btn-primary btn-tooltip" data-bs-toggle="modal"
                                                        title="Show">
                                                        <i class="bi bi-eye"></i>
                                                    </button>
                                                    <button type="button" data-bs-target="#editModal{{ $item['id'] }}"
                                                        class="btn btn-primary btn-tooltip" data-bs-toggle="modal"
                                                        title="Edit">
                                                        <i class="bi bi-pencil-square"></i>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>

                                        <!-- Modal edit -->
                                        <div class="modal fade" id="editModal{{ $item['id'] }}" data-bs-backdrop="static"
                                            data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                                            aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Edit Gejala
                                                            <b> {{ $item['kd_penyakit'] }}</b>
                                                        </h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form class="needs-validation was-validated"
                                                            action="{{ route('solusi.update', $item['id']) }}"
                                                            method="POST" novalidate="">
                                                            @csrf
                                                            @method('PUT')
                                                            <div class="row g-3">

                                                                <div class="col-md-12 position-relative">
                                                                    <label for="validationTooltip03" class="form-label">Jenis Kerusakan</label>
                                                                    <input type="text" class="form-control"
                                                                        id="validationTooltip03" name="nama_penyakit"
                                                                        value="{{ $item['nama_penyakit'] }}" required="">
                                                                    <div class="valid-tooltip">

                                                                    </div>
                                                                    <div class="invalid-tooltip">
                                                                        Masukkan jenis kerusakan.
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-12 position-relative">
                                                                    <label for="validationTooltip02"
                                                                        class="form-label">Solusi</label>
                                                                    <textarea class="form-control" id="validationTooltip02" name="solusi" required="" cols="15" rows="5">{{ $item['solusi'] }}</textarea>
                                                                    <div class="valid-tooltip">

                                                                    </div>
                                                                    <div class="invalid-tooltip">
                                                                        Masukkan solusi.
                                                                    </div>
                                                                </div>
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

                                        <!-- Modal show -->
                                        <div class="modal fade" id="showModal{{ $item['id'] }}" data-bs-keyboard="true"
                                            tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Detail
                                                            Kerusakan & Solusi
                                                            <b> {{ $item['kd_penyakit'] }}</b>
                                                        </h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="row g-3">
                                                            <div class="col-md-12 position-relative">
                                                                <label for="validationTooltip01" class="form-label">Kode
                                                                    Kerusakan</label>
                                                                <input type="text" class="form-control"
                                                                    id="validationTooltip01" name="kd_gejala"
                                                                    value="{{ $item['kd_penyakit'] }}" disabled>
                                                            </div>

                                                            <div class="col-md-12 position-relative">
                                                                <label for="validationTooltip03" class="form-label">Jenis Kerusakan</label>
                                                                <input type="text" class="form-control"
                                                                    id="validationTooltip03" name=""
                                                                    value="{{ $item['nama_penyakit'] }}" disabled>
                                                            </div>

                                                            <div class="col-md-12 position-relative">
                                                                <label for="validationTooltip02"
                                                                    class="form-label">Solusi</label>
                                                                <textarea class="form-control" id="validationTooltip02" name="solusi" disabled cols="10" rows="5">{{ $item['solusi'] }}</textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-danger"
                                                            data-bs-dismiss="modal">Close</button>
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
            $('.select2').select2();
        });

    </script>
@endpush
