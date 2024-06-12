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
                            <div class="d-flex justify-content-between align-items-center py-3">
                                <h5 class="card-title">Data Pejabat Penyetuju</h5>
                                @if ($count >= 2)
                                @else
                                    <a href="{{ route('penyetuju.create') }}" type="button" class="btn btn-primary">
                                        <i class="bi bi-plus-square"></i> Tambah Data
                                    </a>
                                @endif
                            </div>
                            <table class="table datatable table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Nama</th>
                                        <th scope="col">Jabatan</th>
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
                                            <td>{{ $item['nama'] }}</td>
                                            <td>{{ Str::ucfirst($item['jabatan']) }}</td>
                                            <td>
                                                <div class="d-flex justify-content-center gap-1">
                                                    {{-- <button type="button" data-bs-target="#showModal{{ $item['id'] }}"
                                                        class="btn btn-primary btn-tooltip"
                                                        data-bs-toggle="modal" title="Show">
                                                        <i class="bi bi-eye"></i>
                                                    </button> --}}
                                                    <a href="{{ route('penyetuju.edit', $item->id) }}"
                                                        class="btn bg-info btn-tooltip" title="Edit"><i
                                                            class="bi bi-pencil-square"></i>
                                                    </a>
                                                    {{-- <form action="{{ route('merekAc.destroy', $item['id']) }}"
                                                        method="POST">
                                                        @method('DELETE')
                                                        @csrf
                                                        <button type="button" id="deleteRow"
                                                            data-message="{{ $item->merek . " dengan seri " . $item->seri }}"
                                                            class="btn bg-danger btn-tooltip show-alert-delete-box"
                                                            data-toggle="tooltip" title="Delete"><i class="bi bi-trash"></i>
                                                        </button>
                                                    </form> --}}
                                                </div>
                                            </td>
                                        </tr>
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
@endpush
