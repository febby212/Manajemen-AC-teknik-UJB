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
                                <button class="btn btn-primary" data-bs-target="#modalForm" data-bs-toggle="modal">
                                    <i class="bi bi-plus-square"></i> Buat Kode Akses
                                </button>
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
                                                    @if (is_null($token['deleted_at']))
                                                        <span class="badge bg-danger">Belum Digunakan</span>
                                                    @else
                                                        <span class="badge bg-success">Sudah Digunakan</span>
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

                                {{-- buat kode akses --}}
                                <div class="modal fade" id="modalForm" aria-hidden="true" aria-labelledby="modalFormLabel"
                                    data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="modalFormLabel">Form Buat Kode
                                                    Akses</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form class="row g-3 needs-validation" method="POST"
                                                    action="{{ $ref['url'] }}" novalidate="">
                                                    @csrf
                                                    <div class="d-flex justify-content-center">
                                                        <div class="col-md-8 position-relative">
                                                            <label for="teknisi_id" class="form-label">Daftar
                                                                Teknisi</label>
                                                            <select class="form-select" id="teknisi_id" name="teknisi_id"
                                                                required>
                                                                <option selected disabled value="">Pilih Daftar
                                                                    Teknisi
                                                                </option>
                                                                @foreach ($teknisi_ac as $item)
                                                                    <option value="{{ $item['id'] }}"
                                                                        {{ old('id') == $item['id'] ? 'selected' : '' }}>
                                                                        {{ $item['name'] }} -
                                                                        {{ $item['nama_perusahaan'] }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                            <div class="valid-tooltip">
                                                            </div>
                                                            <div class="invalid-tooltip">
                                                                Masukkan Teknisi.
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger"
                                                    data-bs-dismiss="modal">Close</button>
                                                <button class="btn btn-primary modalToken" data-bs-toggle="modal">Buat Kode Akses</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {{-- res kode akses --}}
                                <div class="modal fade" id="modalKodeAkses" aria-hidden="true"
                                    aria-labelledby="modalKodeAksesLabel" data-bs-backdrop="static" data-bs-keyboard="false"
                                    tabindex="-1">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="modalKodeAksesLabel">Kode Akses</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close" onclick="location.reload();"></button>
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
                                                <button type="button" class="btn btn-primary" data-bs-dismiss="modal"
                                                    onclick="location.reload();">Selesai</button>
                                            </div>
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
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.select2').select2();

            $(selector).click(function(e) {
                e.preventDefault();

            });
        });
        $(document).ready(function() {
            $('.modalToken').click(function() {
                var id = $('#teknisi_id').val();
                console.log(id);
                $('#modalKodeAkses').modal('show');
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
