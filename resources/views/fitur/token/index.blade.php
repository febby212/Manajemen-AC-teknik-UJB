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
                                <h5 class="card-title">Data Kode Akses Teknisi</h5>
                                {{-- <button type="button" class="btn btn-primary addToken">
                                    <i class="bi bi-plus-square"></i> Tambah Data
                                </button> --}}
                            </div>
                            <div class="table-responsive">
                                <table class="table datatable table-striped">
                                    <thead>
                                        <tr>
                                            <th scope="col">No</th>
                                            <th scope="col">Nama</th>
                                            <th scope="col">Nama Perusahaan</th>
                                            <th scope="col">Kode Akses</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $index = 1;
                                        @endphp
                                        @foreach ($data as $token)
                                            <tr>
                                                <th scope="row">{{ $index++ }}</th>
                                                <td class="align-middle">{{ $token['teknisi']['name'] }}</td>
                                                <td class="align-middle">{{ $token['teknisi']['nama_perusahaan'] }}</td>
                                                <td class="align-middle">{{ implode(' ', str_split($token['token'])) }}</td>
                                                <td class="align-middle">
                                                    @if ($token['used'] == 1)
                                                        <span class="badge bg-success">Sudah Digunakan</span>
                                                    @else
                                                        <span class="badge bg-danger">Belum Digunakan</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if (is_null($token->deleted_at))
                                                        <div class="d-flex justify-content-between gap-1">
                                                            <form action="{{ route('token.destroy', $token['id']) }}"
                                                                method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="button" id="deleteRow"
                                                                    data-message="{{ $token->teknisi->name }}"
                                                                    class="btn bg-danger btn-tooltip show-alert-delete-box"
                                                                    data-toggle="tooltip" title="Delete"><i
                                                                        class="bi bi-trash"></i></button>
                                                            </form>
                                                        </div>
                                                    @else
                                                    @endif
                                                </td>
                                            </tr>
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
                    title: 'Yakin Hapus Kode Akses?',
                    content: 'Kode akses teknisi ' + $(this).data('message') +
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
