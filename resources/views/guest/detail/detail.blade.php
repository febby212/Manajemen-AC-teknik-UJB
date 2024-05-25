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
                <h5 class="card-title">{{ $data->kode_AC }}</h5>
                <p class="card-text">{{ $data->desc_kondisi }}</p>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">
                    <span class="item-label">Kode</span>
                    <span class="item-value">:{{ $data->merekAC->merek }} - {{ $data->merekAC->seri }}</span>
                </li>
                <li class="list-group-item">
                    <span class="item-label">Ruangan</span>
                    <span class="item-value">:{{ $data->ruangan }}</span>
                </li>
                <li class="list-group-item">
                    <span class="item-label">Tahun Beli</span>
                    <span class="item-value">:{{ $year }}</span>
                </li>
                <li class="list-group-item">
                    <span class="item-label">Kelengkapan</span>
                    <span class="item-value">:{{ $data->kelengkapan }}</span>
                </li>
                <li class="list-group-item">
                    <span class="item-label">Kondisi</span>
                    <span
                        class="item-value btn {{ $data->kondisi === 'Baik' ? 'btn-success' : ($data->kondisi === 'Sedang' ? 'btn-warning' : 'btn-danger') }} btn-sm">{{ $data->kondisi }}</span>
                </li>
                @auth
                    <li class="list-group-item">
                        <a href="" class="btn btn-primary btn-sm" style="width: 100%">Tambah Riwayat</a>
                    </li>
                @endauth
            </ul>
            <div class="card-body">
                @foreach ($data->history as $item)
                    <!-- Accordion -->
                    <div class="accordion" id="accordionExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                    Perbaikan tanggal {{ $item->tgl_perbaikan }}
                                </button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <strong>This is the first item's accordion body.</strong> It is shown by default, until
                                    the collapse plugin adds the appropriate classes that we use to style each element.
                                    These classes control the overall appearance, as well as the showing and hiding via CSS
                                    transitions. You can modify any of this with custom CSS or overriding our default
                                    variables. It's also worth noting that just about any HTML can go within the
                                    <code>.accordion-body</code>, though the transition does limit overflow.
                                    <ul>
                                        <li>Satu</li>
                                        <li>Dua</li>
                                        <li>Tiga</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /end Accordion -->
                @endforeach
            </div>
        </div>
        <!-- card end -->
    </div>
@endsection
