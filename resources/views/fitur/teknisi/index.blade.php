@extends('layout.app')

@push('css')
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
                            <div class="d-flex justify-content-between py-3">
                                <h5 class="card-title">Data Teknisi</h5>
                                <div class="py-3 me-2">
                                    <a href="{{ route('teknisi.create') }}" type="button" class="btn btn-primary"><i
                                            class="bi bi-plus-square"></i> Tambah Data</a>
                                </div>
                            </div>
                            <table class="table datatable table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Nama</th>
                                        <th scope="col">Nama Perusahaan</th>
                                        <th scope="col">Alamat Perusahaan</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $index = 1;
                                    @endphp
                                    @foreach ($data as $teknisi)
                                        <tr>
                                            <th scope="row">{{ $index++ }}</th>
                                            <td>{{ $teknisi['name'] }}</td>
                                            <td>{{ $teknisi['nama_perusahaan'] }}</td>
                                            <td>{{ $teknisi['alamat_perusahaan'] }}</td>
                                            <td>
                                                <div class="d-flex justify-content-center gap-1  py-3">
                                                    <button type="button" data-bs-target="#showModal{{ $teknisi['id'] }}"
                                                        class="btn btn-primary btn-tooltip show-teknisi"
                                                        data-bs-toggle="modal" title="Show">
                                                        <i class="bi bi-eye"></i>
                                                    </button>
                                                    <a href="{{ route('teknisi.edit', $teknisi->id) }}"
                                                        class="btn bg-info btn-tooltip" title="Edit"><i
                                                            class="bi bi-pencil-square"></i>
                                                    </a>
                                                    <form action="{{ route('teknisi.destroy', $teknisi['id']) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="button" id="deleteRow"
                                                            data-message="{{ $teknisi->name }}"
                                                            class="btn bg-danger btn-tooltip show-alert-delete-box"
                                                            data-toggle="tooltip" title="Delete"><i class="bi bi-trash"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                        <!-- Modal -->
                                        <div class="modal fade" id="showModal{{ $teknisi['id'] }}"
                                            data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                                            aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Teknisi
                                                            <b>{{ Str::ucfirst($teknisi['name']) }}</b>
                                                        </h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body row text-center">
                                                        <div class="col-lg-6">
                                                            <div class="info-box card p-3">
                                                                <h5><b>Nama</b></h5>
                                                                <p>{{ Str::ucfirst($teknisi['name']) }}</p>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="info-box card p-2">
                                                                <h5><b>Nama Perusahaan</b></h5>
                                                                <p>{{ Str::ucfirst($teknisi['nama_perusahaan']) }}</p>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-12">
                                                            <div class="info-box card p-2">
                                                                <h5><b>Alamat Perusahaan</b></h5>
                                                                <p>{{ Str::ucfirst($teknisi['alamat_perusahaan']) }}</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-danger"
                                                            data-bs-dismiss="modal">Close</button>
                                                        <button type="button" class="btn btn-primary modalToken"
                                                            data-id="{{ $teknisi['id'] }}">Buat Kode Akses
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </tbody>
                            </table>

                            <div class="modal fade" id="resToken" data-bs-backdrop="static" data-bs-keyboard="false"
                                tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Kode Akses Teknisi
                                            </h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body row text-center">
                                            <div class="col-lg-12">
                                                <div class="info-box card p-2">
                                                    <h5><b>Kode Akses</b></h5>
                                                    <p id="result" style="letter-spacing: 4px;">
                                                    </p>
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

                        </div>
                    </div>
                </div>
            </div>

        </section>
    </main>
@endsection
@push('js')
    <script>
        $(function() {
            $(document).on('click', '#deleteRow', function(event) {
                var form = $(this).closest("form");
                var name = $(this).data("name");
                console.log($('.categories_table tr.active'));
                event.preventDefault();
                $.confirm({
                    icon: 'fa fa-warning',
                    title: 'Yakin Hapus Data Teknisi?',
                    content: 'Teknisi ' + $(this).data('message') +
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

        $(document).ready(function() {
            $('.modalToken').click(function() {
                var id = $(this).data('id');
                console.log(id);
                $('#resToken').modal('show');
                $.ajax({
                    url: '{{ route('generateToken') }}',
                    type: 'GET',
                    data: {
                        id: id
                    },
                    success: function(res) {
                        $('#result').text(res.data.token);
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            });
        });
    </script>
@endpush
