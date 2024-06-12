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
                                <a href="{{ route('merekAc.create') }}" type="button" class="btn btn-primary">
                                    <i class="bi bi-plus-square"></i> Tambah Data
                                </a>
                            </div>
                            <table class="table datatable table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Merek Ac</th>
                                        <th scope="col">Seri Ac</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $index = 1;
                                    @endphp
                                    @foreach ($data as $merek)
                                        <tr>
                                            <th scope="row">{{ $index++ }}</th>
                                            <td>{{ $merek['merek'] }}</td>
                                            <td>{{ $merek['seri'] }}</td>
                                            <td>
                                                <div class="d-flex justify-content-center gap-1">
                                                    <button type="button" data-bs-target="#showModal{{ $merek['id'] }}"
                                                        class="btn btn-primary btn-tooltip"
                                                        data-bs-toggle="modal" title="Show">
                                                        <i class="bi bi-eye"></i>
                                                    </button>
                                                    <a href="{{ route('merekAc.edit', $merek->id) }}"
                                                        class="btn bg-info btn-tooltip" title="Edit"><i
                                                            class="bi bi-pencil-square"></i>
                                                    </a>
                                                    <form action="{{ route('merekAc.destroy', $merek['id']) }}"
                                                        method="POST">
                                                        @method('DELETE')
                                                        @csrf
                                                        <button type="button" id="deleteRow"
                                                            data-message="{{ $merek->merek . " dengan seri " . $merek->seri }}"
                                                            class="btn bg-danger btn-tooltip show-alert-delete-box"
                                                            data-toggle="tooltip" title="Delete"><i class="bi bi-trash"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                        <!-- Modal -->
                                        <div class="modal fade" id="showModal{{ $merek['id'] }}"
                                            data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                                            aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Merek AC 
                                                            <b>{{ Str::ucfirst($merek['merek']) }}</b>
                                                        </h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body row text-center">
                                                        <div class="col-lg-6">
                                                            <div class="info-box card p-3">
                                                                <h5><b>Merek Ac</b></h5>
                                                                <p>{{ Str::ucfirst($merek['merek']) }}</p>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="info-box card p-2">
                                                                <h5><b>Seri Ac</b></h5>
                                                                <p>{{ Str::ucfirst($merek['seri']) }}</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-danger"
                                                            data-bs-dismiss="modal">Close</button>
                                                        {{-- <button type="button" class="btn btn-primary modalToken"
                                                            data-id="{{ $teknisi['id'] }}">Buat Kode Akses
                                                        </button> --}}
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

        $(function() {
            $(document).on('click', '#deleteRow', function(event) {
                var form = $(this).closest("form");
                var name = $(this).data("name");
                console.log($('.categories_table tr.active'));
                event.preventDefault();
                $.confirm({
                    icon: 'fa fa-warning',
                    title: 'Yakin Hapus Data Merek AC?',
                    content: 'Merek AC ' + $(this).data('message') +
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
