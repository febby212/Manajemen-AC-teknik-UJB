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
@endpush

@section('kontenUser')
    <div class="content my-5">
        <!-- card -->
        <div class="card" style="width: 25em;">
            <img src="https://cdn.pixabay.com/photo/2018/09/15/16/36/air-conditioning-3679756_1280.png" class="card-img-top"
                alt="...">
            <div class="card-body">
                <div class="row">
                    <div class="col-8">
                        <h5 class="card-title">{{ $data->kode_AC }}</h5>
                    </div>
                    <div class="col-4 d-flex justify-content-center">
                        <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal"
                            data-bs-target="#reportDamage">Laporkan Kerusakan</button>
                    </div>
                </div>
                <p class="card-text my-2">{{ $data->desc_kondisi }}</p>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">
                    <span class="item-label">Kode</span>
                    <span class="item-value">: {{ $data->merekAC->merek }} - {{ $data->merekAC->seri }}</span>
                </li>
                <li class="list-group-item">
                    <span class="item-label">Ruangan</span>
                    <span class="item-value">: {{ $data->ruangan }}</span>
                </li>
                <li class="list-group-item">
                    <span class="item-label">Tahun Beli</span>
                    <span class="item-value">: {{ $year }}</span>
                </li>
                <li class="list-group-item">
                    <span class="item-label">Kelengkapan</span>
                    <span class="item-value">: {{ $data->kelengkapan }}</span>
                </li>
                <li class="list-group-item">
                    <span class="item-label">Kondisi</span>
                    <span
                        class="item-value btn {{ $data->kondisi === 'Baik' ? 'btn-success' : ($data->kondisi === 'Sedang' ? 'btn-warning' : 'btn-danger') }} btn-sm">{{ $data->kondisi }}</span>
                </li>
                @auth
                    <li class="list-group-item">
                        <button type="button" class="btn btn-primary btn-sm" style="width: 100%" data-bs-toggle="modal"
                            data-bs-target="#createdata{{ $data->id }}">
                            Tambah Riwayat
                        </button>
                    </li>
                @endauth
            </ul>
            <div class="card-body">
                @foreach ($data->history as $item)
                    <!-- Accordion -->
                    <div class="accordion mb-2" id="accordionExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapse{{ $item->id }}" aria-expanded="false"
                                    aria-controls="collapse{{ $item->id }}">
                                    Perbaikan tanggal {{ $item->tgl_perbaikan }}
                                </button>
                            </h2>
                            <div id="collapse{{ $item->id }}" class="accordion-collapse collapse"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <div class="px-2 py-2 services-content">
                                        <div class="services-content-icon">
                                            @auth
                                                @if ($item->created_by == auth()->user()->id)
                                                    <button type="button" class="btn btn-warning btn-sm mb-3"
                                                        style="width: 100%" data-bs-toggle="modal"
                                                        data-bs-target="#editData{{ $item->id }}">
                                                        <i class="bi bi-pencil-square"></i> Edit</button>
                                                @endif
                                            @endauth
                                            <div class="mb-2">
                                                <h5 class="mb-1">Kerusakan</h5>
                                                <p class="text-wrap">
                                                    {{ Str::ucfirst($item->kerusakan) }}
                                                </p>
                                            </div>
                                            <div class="mb-2">
                                                <h5 class="mb-2">Perbaikan</h5>
                                                <p class="mb-1 text-wrap">
                                                    {{ Str::ucfirst($item->perbaikan) }}
                                                </p>
                                            </div>
                                            <div class="mb-2">
                                                <h5 class="mb-2">Biaya</h5>
                                                <p class="mb-1 text-wrap">
                                                    Rp. {{ number_format($item->biaya, 0, ',', '.') }}
                                                </p>
                                            </div>
                                            <div class="mb-2">
                                                <h5 class="mb-2">Pejabat Pengguna Anggaran</h5>
                                                <p class="mb-1 text-wrap">
                                                    {{ Str::ucfirst($item->PPA) }}
                                                </p>
                                            </div>
                                            <div class="mb-2">
                                                <h5 class="mb-2">Teknisi</h5>
                                                <div class="row">
                                                    <div class="col-6">
                                                        <p class="mb-1">Nama Teknisi</p>
                                                    </div>
                                                    <div class="col-6">
                                                        <p class="mb-1">:
                                                            {{ Str::ucfirst($item->teknisiPerbaikan->name) }}</p>
                                                    </div>
                                                    <div class="col-6">
                                                        <p class="mb-1">Perusahaan</p>
                                                    </div>
                                                    <div class="col-6">
                                                        <p class="mb-1">:
                                                            {{ Str::ucfirst($item->teknisiPerbaikan->nama_perusahaan) }}
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /end Accordion -->

                    {{-- modal edit data --}}
                    <div class="modal fade" id="editData{{ $item->id }}" data-bs-backdrop="static"
                        data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Tambah Data Riwayat Perbaikan AC
                                    </h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form class="row g-3 needs-validation"
                                        action="{{ route('update.detail.riwayat', ['id' => encrypt($item->id)]) }}"
                                        method="POST" novalidate>
                                        @csrf
                                        @method('PUT')
                                        <div class="col-md-12">
                                            <label for="kerusakan" class="form-label">Kerusakan</label>
                                            <textarea type="text" name="kerusakan" class="form-control" id="kerusakan" required>{{ $item->kerusakan }}</textarea>
                                            <div class="invalid-feedback">
                                                Masukkan kerusakan AC.
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <label for="perbaikan" class="form-label">Perbaikan</label>
                                            <textarea type="text" name="perbaikan" class="form-control" id="perbaikan" required>{{ $item->perbaikan }}</textarea>
                                            <div class="invalid-feedback">
                                                Masukkan Perbaikan AC
                                            </div>
                                        </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Batal</button>
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- end modal edit data --}}
                @endforeach
            </div>
        </div>
        <!-- card end -->
    </div>

    <!-- Modal create data -->
    <div class="modal fade" id="createdata{{ $data->id }}" data-bs-backdrop="static" data-bs-keyboard="false"
        tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Tambah Data Riwayat Perbaikan AC</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="row g-3 needs-validation"
                        action="{{ route('store.detail.riwayat', ['id' => encrypt($data->id)]) }}" method="POST"
                        novalidate>
                        @csrf
                        <div class="col-md-12">
                            <label for="kerusakan" class="form-label">Kerusakan</label>
                            <textarea type="text" name="kerusakan" class="form-control" id="kerusakan" required></textarea>
                            <div class="invalid-feedback">
                                Masukkan kerusakan AC.
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label for="perbaikan" class="form-label">Perbaikan</label>
                            <textarea type="text" name="perbaikan" class="form-control" id="perbaikan" required></textarea>
                            <div class="invalid-feedback">
                                Masukkan Perbaikan AC
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- modal report kerusakan --}}
    <div class="modal fade" id="reportDamage" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="reportDamageLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="reportDamageLabel">Laporkan Kerusakan AC ini</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="row g-3 needs-validation"
                        action="{{ route('report.store', encrypt($data->id)) }}" method="POST"
                        novalidate>
                        @csrf
                        <div class="col-md-12">
                            <label for="created_by" class="form-label">Nomor Identitas/Nama Pelapor (Opsional)</label>
                            <input type="text" name="created_by" class="form-control" id="created_by" required>
                            <div class="invalid-feedback">
                                Masukkan nomor identitas.
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label for="kerusakan" class="form-label">Deskripsi Kerusakan</label>
                            <textarea type="text" name="kerusakan" class="form-control" id="kerusakan" required></textarea>
                            <div class="invalid-feedback">
                                Masukkan Kerusakan AC
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary"><i class="bi bi-send"></i> Kirim</button>
                </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
    <script>
        // JavaScript for disabling form submissions if there are invalid fields
        (function() {
            'use strict'

            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.querySelectorAll('.needs-validation')

            // Loop over them and prevent submission
            Array.prototype.slice.call(forms)
                .forEach(function(form) {
                    form.addEventListener('submit', function(event) {
                        if (!form.checkValidity()) {
                            event.preventDefault()
                            event.stopPropagation()
                        }

                        form.classList.add('was-validated')
                    }, false)
                })
        })()
    </script>
@endpush
