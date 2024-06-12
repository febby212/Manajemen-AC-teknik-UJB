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
                                <h5 class="card-title">Data Merek AC</h5>
                                <div class="d-flex justify-content-between gap-3 me-2">
                                    <div>
                                        <a href="{{ route('export.history') }}" type="button" class="btn btn-success">
                                            <i class="bi bi-file-spreadsheet"></i> Export Data Riwayat
                                        </a>
                                    </div>
                                    <div>
                                        <a href="{{ route('history.create') }}" type="button" class="btn btn-primary">
                                            <i class="bi bi-plus-square"></i> Tambah Data
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table datatable table-striped">
                                    <thead>
                                        <tr>
                                            <th scope="col">No</th>
                                            <th scope="col">Kode Ac</th>
                                            <th scope="col">Teknisi</th>
                                            <th scope="col">POS Anggaran</th>
                                            <th scope="col">Tanggal Perbaikan</th>
                                            <th scope="col">PPA</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $index = 1;
                                        @endphp
                                        @foreach ($data as $history)
                                            <tr>
                                                <th scope="row">{{ $index++ }}</th>
                                                <td>{{ $history->acDesc->kode_AC }}</td>
                                                <td>{{ $history->teknisiPerbaikan->nama_perusahaan }}</td>
                                                {{-- <td>Rp. {{ number_format($history['pos_anggaran'], 0, ',', '.') }}</td> --}}
                                                <td>{{ $history['pos_anggaran'] }}</td>
                                                <td>{{ \Carbon\Carbon::parse($history['tgl_perbaikan'])->formatLocalized('%e %B %Y') }}
                                                </td>
                                                <td>{{ $history['PPA'] }}</td>
                                                <td>
                                                    <div class="d-flex justify-content-center gap-1">
                                                        <button type="button"
                                                            data-bs-target="#showModal{{ $history['id'] }}"
                                                            class="btn btn-primary btn-tooltip" data-bs-toggle="modal"
                                                            title="Show">
                                                            <i class="bi bi-eye"></i>
                                                        </button>
                                                        <a href="{{ route('history.edit', $history->id) }}"
                                                            class="btn bg-info btn-tooltip" title="Edit"><i
                                                                class="bi bi-pencil-square"></i>
                                                        </a>
                                                        <form action="{{ route('history.destroy', $history['id']) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="button" id="deleteRow"
                                                                data-message="{{ $history->id }}"
                                                                class="btn bg-danger btn-tooltip show-alert-delete-box"
                                                                data-toggle="tooltip" title="Delete"><i
                                                                    class="bi bi-trash"></i>
                                                            </button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>

                                            <!-- Modal -->
                                            <div class="modal fade" id="showModal{{ $history['id'] }}"
                                                data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                                                aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                                    <div class="modal-content" style="overflow-y: auto;">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Riawayat
                                                                Perbaikan AC
                                                            </h1>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close"></button>
                                                        </div>
                                                        <div class="row container-fluid py-3">
                                                            <div class="col-md-12">
                                                                <div>
                                                                    <h5 class="card-title">Kerusakan</h5>
                                                                    <p class="small ms-4">
                                                                        {{ Str::ucfirst($history['kerusakan']) }}
                                                                    </p>
                                                                </div>

                                                                <div>
                                                                    <h5 class="card-title">Perbaikan</h5>
                                                                    <p class="small ms-4">
                                                                        {{ Str::ucfirst($history['perbaikan']) }}
                                                                    </p>
                                                                </div>

                                                                <h5 class="card-title">Detail AC</h5>

                                                                <div class="row my-1">
                                                                    <div class="col-md-5  label ">
                                                                        Kode AC</div>
                                                                    <div class="col-md-7">: {{ $history->acDesc->kode_AC }}
                                                                    </div>
                                                                </div>

                                                                <div class="row my-1">
                                                                    <div class="col-md-5 label">
                                                                        Ruangan</div>
                                                                    <div class="col-md-7">:
                                                                        {{ $history->acDesc->ruangan }}</div>
                                                                </div>

                                                                <div class="row my-1">
                                                                    <div class="col-md-5 label">
                                                                        Merek AC</div>
                                                                    <div class="col-md-7">:
                                                                        {{ $history->acDesc->merekAC->merek }} -
                                                                        {{ $history->acDesc->merekAC->seri }}</div>
                                                                </div>

                                                                <div class="row my-1">
                                                                    <div class="col-md-5 label">
                                                                        Teknisi</div>
                                                                    <div class="col-md-7">:
                                                                        {{ $history->teknisiPerbaikan->name }} -
                                                                        {{ $history->teknisiPerbaikan->nama_perusahaan }}
                                                                    </div>
                                                                </div>

                                                                <div class="row my-1">
                                                                    <div class="col-md-5 label">
                                                                        POS Anggaran</div>
                                                                    {{-- <div class="col-md-7">: Rp. {{ number_format($history['pos_anggaran']) }} --}}
                                                                    <div class="col-md-7">: {{ $history['pos_anggaran'] }}
                                                                    </div>
                                                                </div>

                                                                <div class="row my-1">
                                                                    <div class="col-md-5 label">
                                                                        Biaya Perbaikan</div>
                                                                    <div class="col-md-7">: Rp.
                                                                        {{ number_format($history['biaya'], 0, ',', '.') }}
                                                                    </div>
                                                                </div>

                                                                <div class="row my-1">
                                                                    <div class="col-md-5 label">
                                                                        PPA</div>
                                                                    <div class="col-md-7">:
                                                                        {{ $history['PPA'] }}</div>
                                                                </div>

                                                                <div class="row my-1">
                                                                    <div class="col-md-5 label">
                                                                        Mengetahui</div>
                                                                    <div class="col-md-7">:
                                                                        {{ isset($history['mengetahui']) ? $history['mengetahui'] : '-' }}
                                                                    </div>
                                                                </div>

                                                                <div class="row my-1">
                                                                    <div class="col-md-5 label">
                                                                        Menyetujui</div>
                                                                    <div class="col-md-7">:
                                                                        {{ isset($history['menyetujui']) ? $history['menyetujui'] : '-' }}
                                                                    </div>
                                                                </div>

                                                                <div class="row my-1">
                                                                    <div class="col-md-5 label">
                                                                        Pembuat Laporan</div>
                                                                    <div class="col-md-7">:
                                                                        {{ Str::ucfirst($history->pembuatLaporan->name) }}
                                                                    </div>
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

        $(function() {
            $(document).on('click', '#deleteRow', function(event) {
                var form = $(this).closest("form");
                var name = $(this).data("name");
                console.log($('.categories_table tr.active'));
                event.preventDefault();
                $.confirm({
                    icon: 'fa fa-warning',
                    title: 'Yakin Hapus Data Riwayat Perbaikan AC?',
                    content: 'Riwayat perbaikan AC pada tanggal ' + $(this).data('message') +
                        ' akan di hapus secara permanen',
                    type: 'orange',
                    typeAnimated: true,
                    animationSpeed: 500,
                    closeAnimation: 'zoom',
                    closeIcon: true,
                    closeIconClass: 'fa fa-close',
                    draggable: true,
                    backgroundDismiss: false,
                    backgroundDismissAnimation: 'glow',
                    buttons: {
                        delete: {
                            text: 'Hapus',
                            btnClass: 'btn-red',
                            action: function() {
                                form.submit();
                            }
                        },
                        batal: function() {}
                    }
                });
            });
        });
    </script>
@endpush
