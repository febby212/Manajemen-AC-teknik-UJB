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
                                            <td>{{ $token['teknisi']['name'] }}</td>
                                            <td>{{ $token['teknisi']['nama_perusahaan'] }}</td>
                                            <td>{{ implode(' ', str_split($token['token'])) }}</td>
                                            <td>{{ $token['used'] == 1 ? 'Sudah digunakan' : 'Belum digunakan' }}</td>
                                            <td>
                                                <div class="d-flex justify-content-between gap-1">
                                                    <form action="{{ route('teknisi.destroy', $token['id']) }}"
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
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            {{-- <div class="modal fade" id="genToken" data-bs-backdrop="static" data-bs-keyboard="false"
                                tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Buat Kode Akses Teknisi
                                            </h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body row text-center">
                                            <div class="col-lg-12">
                                                <div class="info-box card p-2">
                                                    <label class="form-label">Teknisi</label>
                                                    <div class="input-group d-flex justify-content-center">
                                                        <select id="teknisi" name="teknisi"
                                                            class="form-control bg-white select2" required>
                                                            <option value="" disabled selected>Pilih Teknisi</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger"
                                                data-bs-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary modalToken">Buat Kode
                                                Akses</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

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
                            </div> --}}

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

        // $(document).ready(function() {
        //     $('.addToken').on('click', function() {
        //         $('#genToken').modal('show');
        //     });

        //     $('#genToken').on('shown.bs.modal', function() {
        //         $.ajax({
        //             url: "{{ route('teknisiData') }}",
        //             type: 'GET',
        //             dataType: 'json',
        //             success: function(response) {
        //                 var select = $('#teknisi');
        //                 select.empty();
        //                 select.append($('<option>', {
        //                     value: '',
        //                     text: 'Pilih Teknisi',
        //                     disabled: true,
        //                     selected: true
        //                 }));
        //                 $.each(response, function(index, teknisi) {
        //                     select.append($('<option>', {
        //                         value: teknisi.id,
        //                         text: teknisi.name
        //                     }));
        //                 });
        //             },
        //             error: function(xhr, status, error) {
        //                 console.error(error);
        //                 alert("Terjadi kesalahan: " + error);
        //             }
        //         });
        //     });
        // });

        // $(document).ready(function() {
        //     $('.modalToken').click(function() {
        //         var id = $(this).data('id');
        //         console.log(id);
        //         $('#resToken').modal('show');
        //         $.ajax({
        //             url: '{{ route('generateToken') }}',
        //             type: 'GET',
        //             data: {
        //                 id: id
        //             },
        //             success: function(res) {
        //                 $('#result').text(res.data.token);
        //             },
        //             error: function(xhr, status, error) {
        //                 console.error(xhr.responseText);
        //             }
        //         });
        //     });
        // });
    </script>
@endpush
