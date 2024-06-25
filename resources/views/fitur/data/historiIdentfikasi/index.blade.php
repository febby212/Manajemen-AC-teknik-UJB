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
                                <h5 class="card-title">Riwayat Prediksi</h5>
                            </div>
                            <table class="table datatable table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">User</th>
                                        <th scope="col">Kode AC</th>
                                        <th scope="col">Kode Kerusakan</th>
                                        <th scope="col">Kode Gejala</th>
                                        <th scope="col">Kerusakan</th>
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
                                            <td>{{ $item['userPredict']['name'] }}</td>
                                            <td>{{ $item['dataACRel']['kode_AC'] }}</td>
                                            <td>{{ $item['kd_penyakit'] }}</td>
                                            <td>{{ $item['kd_gejala'] }}</td>
                                            <td>{{ $item['penyakit'] }}</td>
                                            <td>{{ Str::limit($item['solusi'], 25, '...') }}</td>
                                            <td>
                                                <div class="d-flex justify-content-center gap-1">
                                                    <button type="button" data-bs-target="#showModal{{ $item['id'] }}"
                                                        class="btn btn-primary btn-tooltip" data-bs-toggle="modal"
                                                        title="Show">
                                                        <i class="bi bi-eye"></i>
                                                    </button>
                                                    <form action="{{ route('case-base.destroy', $item['id']) }}"
                                                        method="POST">
                                                        @method('DELETE')
                                                        @csrf
                                                        <button type="button" id="deleteRow"
                                                            data-message="{{ 'no ' . $index - 1 }}"
                                                            class="btn bg-danger btn-tooltip show-alert-delete-box"
                                                            data-toggle="tooltip" title="Delete"><i class="bi bi-trash"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>

                                        <!-- Modal show -->
                                        <div class="modal fade" id="showModal{{ $item['id'] }}" data-bs-backdrop="static"
                                            data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                                            aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Histori Prediksi
                                                            <b> No. {{ Str::ucfirst($index - 1) }}</b>
                                                        </h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="row g-3">
                                                            <div class="col-md-5 position-relative">
                                                                <label for="userPredict" class="form-label">User</label>
                                                                <input type="text" class="form-control"
                                                                    id="userPredict" name="userPredict"
                                                                    value="{{ $item['userPredict']['name'] }}" disabled>
                                                            </div>
                                                            <div class="col-md-7 position-relative">
                                                                <label for="dataACRel" class="form-label">Kode AC</label>
                                                                <input type="text" class="form-control"
                                                                    id="dataACRel" name="dataACRel"
                                                                    value="{{ $item['dataACRel']['kode_AC'] }}" disabled>
                                                            </div>
                                                            <div class="col-md-12 position-relative">
                                                                <label for="kd_gejala"
                                                                class="form-label">Kode Gejala</label>
                                                                <input type="text" class="form-control"
                                                                id="kd_gejala" name="kd_gejala"
                                                                value="{{ $item['kd_gejala'] }}" disabled>
                                                            </div>
                                                            <div class="col-md-6 position-relative">
                                                                <label for="kd_penyakit"
                                                                    class="form-label">Kode Kerusakan</label>
                                                                <input type="text" class="form-control"
                                                                    id="kd_penyakit" name="kd_penyakit"
                                                                    value="{{ $item['kd_penyakit'] }}" disabled>
                                                            </div>
                                                            <div class="col-md-6 position-relative">
                                                                <label for="penyakit"
                                                                    class="form-label">Kerusakan</label>
                                                                <input type="text" class="form-control"
                                                                    id="penyakit" name="penyakit"
                                                                    value="{{ $item['penyakit'] }}" disabled>
                                                            </div>
                                                            <div class="col-md-12 position-relative">
                                                                <label for="solusi"
                                                                    class="form-label">Solusi</label>
                                                                    <textarea class="form-control"
                                                                    id="solusi"
                                                                    disabled cols="20" rows="10">{{ $item['solusi'] }}</textarea>
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

        $(function() {
            $(document).on('click', '#deleteRow', function(event) {
                var form = $(this).closest("form");
                var name = $(this).data("name");
                console.log($('.categories_table tr.active'));
                event.preventDefault();
                $.confirm({
                    icon: 'fa fa-warning',
                    title: 'Yakin Hapus Data Case base?',
                    content: 'Data Riwayat ' + $(this).data('message') +
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
