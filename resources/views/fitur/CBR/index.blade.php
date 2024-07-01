@extends('layout.app')

@section('konten')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>{{ $ref['title'] }}</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('teknisi.index') }}">{{ $ref['title'] }}</a></li>
                    <li class="breadcrumb-item active">Prediksi Kerusakan</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body p-3">
                            <div class="mb-2">
                                <h5 class="card-title">Form Prediksi Kerusakan</h5>
                            </div>

                            <!-- Custom Styled Validation with Tooltips -->
                            <form method="POST" action="{{ $ref['url'] }}">
                                @csrf
                                <div class="position-relative mb-3">
                                    <label for="dataAc_id" class="form-label">Data AC</label>
                                    <select class="form-select select2" id="dataAc_id" name="dataAc_id" required>
                                        <option selected disabled value="">Pilih Daftar AC</option>
                                        @foreach ($dataAc as $item)
                                            <option value="{{ $item['id'] }}"
                                                {{ old('dataAc_id') == $item['id'] ? 'selected' : '' }}>
                                                {{ $item['kode_AC'] }} - {{ $item['kondisi'] }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <div class="valid-tooltip">

                                    </div>
                                    <div class="invalid-tooltip">
                                        Masukkan daftar AC
                                    </div>
                                </div>

                                <div class="p-2">
                                    <h5 class="card-title">Pilih Gejala Kerusakan Pada AC</h5>
                                </div>

                                <div class="position-relative">
                                    <ul class="list-group list-group-flush">
                                        @foreach ($data as $item)
                                            <li class="list-group-item mb-2">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox"
                                                        id="{{ $item['kd_gejala'] }}" name="kd_gejala[]"
                                                        value="{{ $item['kd_gejala'] }}"
                                                        {{ in_array($item['kd_gejala'], old('kd_gejala', [])) ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="{{ $item['kd_gejala'] }}">
                                                        {{ Str::ucfirst($item['gejala']) }}
                                                    </label>
                                                </div>
                                            </li>
                                        @endforeach
                                        <li class="list-group-item mb-2">
                                        </li>
                                    </ul>
                                </div>

                                <div class="col-12 d-flex justify-content-end gap-3">
                                    {{-- <a href="{{ route('teknisi.index') }}" class="btn btn-danger">Cancel</a> --}}
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
@push('js')
    <script>
        $(document).ready(function() {
            $('.select2').select2();
        });
    </script>
@endpush
