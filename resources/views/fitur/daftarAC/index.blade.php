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
                                <h5 class="card-title">Data AC</h5>
                                <a href="{{ route('daftarAC.create') }}" type="button" class="btn btn-primary">
                                    <i class="bi bi-plus-square"></i> Tambah Data
                                </a>
                                {{-- <div class="py-3 me-2">
                                </div> --}}
                            </div>
                            <div class="table-responsive">
                                <table class="table datatable table-striped">
                                    <thead>
                                        <tr>
                                            <th scope="col">No</th>
                                            <th scope="col">Kode</th>
                                            <th scope="col">Merek</th>
                                            <th scope="col">Kelengkapan</th>
                                            <th scope="col">Ruangan</th>
                                            <th scope="col">Kondisi</th>
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
                                                <td>{{ $item['kode_AC'] }}</td>
                                                <td>{{ $item->merekAC->merek }} - {{ $item->merekAC->seri }}</td>
                                                <td>{{ $item['kelengkapan'] }}</td>
                                                <td>{{ $item['ruangan'] }}</td>
                                                <td>{{ $item['kondisi'] }}</td>
                                                <td>
                                                    <div class="d-flex justify-content-center gap-1">
                                                        <button type="button" class="btn btn-success"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#modalQR{{ $item->id }}">
                                                            <i class="bi bi-qr-code"></i>
                                                        </button>
                                                        <button type="button"
                                                            data-bs-target="#showModal{{ $item['id'] }}"
                                                            class="btn btn-primary btn-tooltip" data-bs-toggle="modal"
                                                            title="Show">
                                                            <i class="bi bi-eye"></i>
                                                        </button>
                                                        <a href="{{ route('daftarAC.edit', $item->id) }}"
                                                            class="btn bg-info btn-tooltip" title="Edit"><i
                                                                class="bi bi-pencil-square"></i>
                                                        </a>
                                                        <form action="{{ route('daftarAC.destroy', $item['id']) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="button" id="deleteRow"
                                                                data-id="{{ $item->id }}"
                                                                class="btn bg-danger btn-tooltip show-alert-delete-box"
                                                                data-toggle="tooltip" title="Delete"><i
                                                                    class="bi bi-trash"></i>
                                                            </button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>

                                            <!-- Modal detail ac -->
                                            <div class="modal fade" id="showModal{{ $item['id'] }}"
                                                data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                                                aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Kode AC :
                                                                <b>{{ Str::ucfirst($item['kode_AC']) }}</b>
                                                            </h1>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body row">
                                                            <div class="col-md-8 position-relative mt-3">
                                                                <label for="jumlah" class="form-label">Kode AC</label>
                                                                <span class="form-control">{{ $item['kode_AC'] }}</span>
                                                            </div>
                                                            <div class="col-md-4 position-relative mt-3">
                                                                <label for="jumlah" class="form-label">Merek AC</label>
                                                                <span class="form-control">{{ $item->merekAC->merek }} -
                                                                    {{ $item->merekAC->seri }}</span>
                                                            </div>
                                                            <div class="col-md-4 position-relative mt-3">
                                                                <label for="jumlah" class="form-label">Kelengkapan
                                                                    AC</label>
                                                                <span
                                                                    class="form-control">{{ $item['kelengkapan'] }}</span>
                                                            </div>
                                                            <div class="col-md-4 position-relative mt-3">
                                                                <label for="jumlah" class="form-label">Ruangan</label>
                                                                <span class="form-control">{{ $item['ruangan'] }}</span>
                                                            </div>
                                                            <div class="col-md-4 position-relative mt-3">
                                                                <label for="jumlah" class="form-label">Kondisi AC</label>
                                                                <span class="form-control">{{ $item['kondisi'] }}</span>
                                                            </div>
                                                            <div class="col-md-12 position-relative mt-3">
                                                                <label for="jumlah" class="form-label">Deskripsi
                                                                    Kondisi</label>
                                                                <textarea disabled class="form-control">{{ Str::ucfirst($item['desc_kondisi']) }}</textarea>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-danger"
                                                                data-bs-dismiss="modal">Close</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Modal qr dengan simpleIOSoftware-->
                                            <div class="modal fade" id="modalQR{{ $item->id }}" tabindex="-1"
                                                aria-labelledby="modalQRLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title fs-5" id="modalQRLabel">QR Code AC</h1>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="text-center">
                                                                <h5 class="mb-1">Kode AC : </h5>
                                                                <p id="kodeAc">{{ $item->kode_AC }}</p>
                                                            </div>
                                                            <div class="d-flex justify-content-center">
                                                                <div>
                                                                    @php
                                                                        $urlApp =
                                                                            env('APP_URL') .
                                                                            'detail-riwayat/' .
                                                                            encrypt($item->id);

                                                                        $qr = QrCode::format('png')
                                                                            ->size(200)
                                                                            ->merge(
                                                                                public_path('assets/img/ujb.png'),
                                                                                0.3,
                                                                                true,
                                                                            )
                                                                            ->generate(
                                                                                $urlApp
                                                                            );

                                                                        $qrBase64 = base64_encode($qr);
                                                                    @endphp
                                                                    <img src="data:image/png+xml;base64,<?= $qrBase64 ?>" alt="QR Code">
                                                                </div>
                                                            </div>
                                                            <div class="d-flex justify-content-between p-2 mt-3 gap-3">
                                                                <a href="{{ route('daftarAC.downloadQR', encrypt($item->id)) }}"
                                                                    class="btn bg-success btn-tooltip text-light"
                                                                    target="_blank" title="Generate QR">
                                                                    Unduh QR format PDF
                                                                </a>
                                                                <a href="{{ route('daftarAC.downloadQRImg', encrypt($item->id)) }}"
                                                                    class="btn bg-primary btn-tooltip text-light downloadQRBtn"
                                                                    data-id="{{ $item->id }}"
                                                                    title="Unduh QR bentuk Image">Unduh QR
                                                                    format PNG</a>
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
    <script src="https://cdn.rawgit.com/davidshimjs/qrcodejs/gh-pages/qrcode.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/qrious/4.0.2/qrious.min.js"></script>

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
