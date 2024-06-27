@extends('guest.layout.app')

@push('css')
    <style>
        html,
        body {
            height: 100%;
            margin: 0;
            display: flex;
            flex-direction: column;
        }

        .content {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .footer {
            flex-shrink: 0;
            background-color: #343a40;
            color: #fff;
        }

        .card {
            margin: 20px;
        }

        .item-label {
            display: inline-block;
            width: 150px;
            font-weight: bold;
        }
    </style>
    <link href="{{ asset('assets/vendor/simple-datatables/style.css') }}" rel="stylesheet">
@endpush

@section('kontenUser')
    <div class="content my-5">
        <!-- card -->
        <div class="card" style="width: 25em;">
            <img src="{{ asset('assetsUsers/img/report.gif') }}" class="card-img-top" alt="...">
            <div class="card-body">
                <div class="my-3">
                    <h5 class="card-title">Daftar Laporan Kerusakan AC</h5>
                    {{-- <p class="card-text">Deskripsinya. Some quick example text to build on the card title and make up the
                        bulk of the card's content.</p> --}}
                </div>
                <div class="table-responsive">
                    <table class="table datatable table-striped">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Tanggal Laporan</th>
                                <th scope="col">No Identitas</th>
                                <th scope="col">Kerusakan</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $index => $item)
                                <tr>
                                    <th scope="row">{{ $index + 1 }}</th>
                                    <td>{{ \Carbon\Carbon::parse($item['tgl_report'])->isoFormat('D MMMM YYYY') }}</td>
                                    <td>{{ $item['created_by'] }}</td>
                                    <td>{{ Str::limit($item['kerusakan'], 10, '...') }}</td>
                                    <td>
                                        @if (is_null($item['history_id']))
                                            <span class="badge bg-danger">Belum Diperbaiki</span>
                                        @else
                                            <span class="badge bg-success">Sudah Diperbaiki</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="d-flex justify-content-center gap-1  py-3">
                                            <button type="button" data-bs-target="#showModal{{ $item['id'] }}"
                                                class="btn btn-primary btn-tooltip show-teknisi" data-bs-toggle="modal"
                                                title="Show">
                                                <i class="bi bi-eye"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>

                                <!-- Modal -->
                                <div class="modal fade" id="showModal{{ $item['id'] }}" data-bs-keyboard="true"
                                    tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Detail Laporan
                                                    Kerusakan
                                                    <b> No. {{ $index+1 }}</b>
                                                </h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body row">
                                                <div class="col-md-12 mb-3">
                                                    <label for="created_by" class="form-label">Kode AC
                                                    </label>
                                                    <input type="text" name="created_by" class="form-control"
                                                        id="created_by" value="{{ $item['reportedData']['kode_AC'] }}"
                                                        disabled>
                                                </div>
                                                <div class="col-md-12 mb-3">
                                                    <label for="created_by" class="form-label">Tanggal Laporan Masuk
                                                    </label>
                                                    <input type="text" name="created_by" class="form-control"
                                                        id="created_by"
                                                        value="{{ \Carbon\Carbon::parse($item['tgl_report'])->isoFormat('D MMMM YYYY') }}"
                                                        disabled>
                                                </div>
                                                <div class="col-md-12 mb-3">
                                                    <label for="created_by" class="form-label">Nomor Identitas/Nama Pelapor
                                                    </label>
                                                    <input type="text" name="created_by" class="form-control"
                                                        id="created_by" value="{{ $item['created_by'] }}" disabled>
                                                </div>
                                                <div class="col-md-12 mb-3">
                                                    <label for="created_by" class="form-label">Status Perbaikan
                                                    </label>
                                                    <input type="text" name="created_by" class="form-control"
                                                        id="created_by"
                                                        value="{{ is_null($item['history_id']) ? 'Belum diperbaiki.' : 'Sudah diperbaiki.' }}"
                                                        disabled>
                                                </div>
                                                <div class="col-md-12 mb-3">
                                                    <label for="kerusakan" class="form-label">Deskripsi Kerusakan</label>
                                                    <textarea type="text" name="kerusakan" class="form-control" id="kerusakan" disabled>{{ Str::ucfirst($item->kerusakan) }}</textarea>
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
        <!-- card end -->
    </div>
@endsection
@push('js')
    <script src="{{ asset('assets/vendor/simple-datatables/simple-datatables.js') }}"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Inisialisasi Simple DataTables
            var table = document.querySelector('.datatable');
            var dataTable = new simpleDatatables.DataTable(table);
        });
    </script>
@endpush
