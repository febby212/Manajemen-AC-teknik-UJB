@extends('layout.app')

@section('konten')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>{{ $ref['title'] }}</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('teknisi.index') }}">{{ $ref['title'] }}</a></li>
                    @if (isset($data))
                    <li class="breadcrumb-item active">Ubah Data</li>
                    @else
                    <li class="breadcrumb-item active">Tambah Data</li>
                    @endif
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body p-3">
                            @if (isset($data))
                            <h5 class="card-title">Form Ubah Data Merek AC</h5>
                            @else
                            <h5 class="card-title">Form Tambah Data Merek AC</h5>
                            @endif

                            <!-- Custom Styled Validation with Tooltips -->
                            <form class="row g-3 needs-validation" method="POST" action="{{ $ref['url'] }}"
                                novalidate="">
                                @csrf
                                @if (isset($data))
                                    @method('PUT')
                                @endif
                                <div class="col-md-6 position-relative">
                                    <label for="merek" class="form-label">Merek AC</label>
                                    <input type="text" class="form-control" id="merek" name="merek"
                                        value="{{ old('merek', isset($data) ? $data['merek'] : '') }}" required>
                                    <div class="valid-tooltip">
                                        Mantappp!!!
                                    </div>
                                    <div class="invalid-tooltip">
                                        Masukkan merek ac.
                                    </div>
                                </div>
                                <div class="col-md-6 position-relative">
                                    <label for="seri" class="form-label">Seri AC</label>
                                    <input type="text" class="form-control" id="seri" name="seri"
                                        value="{{ old('seri', isset($data) ? $data['seri'] : '') }}" required>
                                    <div class="valid-tooltip">
                                        Mantappp!!!
                                    </div>
                                    <div class="invalid-tooltip">
                                        Masukkan seri ac.
                                    </div>
                                </div>
                                <div class="col-12 d-flex justify-content-end gap-3">
                                    <a href="{{ route('merekAc.index') }}" class="btn btn-danger" type="submit">Cancel</a>
                                    <button class="btn btn-primary" type="submit">Submit</button>
                                </div>
                            </form><!-- End Custom Styled Validation with Tooltips -->

                        </div>
                    </div>

                </div>
            </div>
        </section>

    </main>
@endsection
