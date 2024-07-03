@extends('layout.app')

@section('konten')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Profile</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item">Users</li>
                    <li class="breadcrumb-item active">Profile</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section profile">
            <div class="row">
                <div class="col-xl-4">

                    <div class="card">
                        <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

                            <img src="{{ asset('assets/img/4.jpg') }}" alt="Profile" class="rounded-circle">
                            <h2>{{ Str::ucfirst($data->name) }}</h2>
                            <h3>Admin</h3>
                        </div>
                    </div>

                </div>

                <div class="col-xl-8">

                    <div class="card">
                        <div class="card-body pt-3">
                            <!-- Bordered Tabs -->
                            <ul class="nav nav-tabs nav-tabs-bordered">

                                <li class="nav-item">
                                    <button class="nav-link active" data-bs-toggle="tab"
                                        data-bs-target="#profile-change-password">Change Password</button>
                                </li>

                            </ul>
                            <div class="tab-content pt-2">

                                <div class="tab-pane fade show active pt-3" id="profile-change-password">
                                    <!-- Change Password Form -->
                                    <form action="{{ route('profile.update', encrypt($data->id)) }}" method="POST">
                                        @csrf
                                        <div class="row mb-3">
                                            <div class="col-md-12">
                                                <label for="password" class="form-label">Password Baru</label>
                                                <input name="password" type="password" class="form-control" id="password">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <div class="col-md-12">
                                                <label for="password_confirmation" class="form-label">Masukkan Kembali Password Baru</label>
                                                <input name="password_confirmation" type="password" class="form-control"
                                                    id="password_confirmation">
                                                <span id="password_match_message"></span>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-end text-center">
                                            <button type="submit" class="btn btn-primary">Change Password</button>
                                        </div>
                                    </form><!-- End Change Password Form -->

                                </div>

                            </div><!-- End Bordered Tabs -->

                        </div>
                    </div>

                </div>
            </div>
        </section>

    </main><!-- End #main -->
@endsection

@push('js')
    <script>
        $(document).ready(function() {
            $('#confirm_password').on('input', function() {
                var password = $('#password').val();
                var confirmPassword = $('#confirm_password').val();

                if (password === confirmPassword) {
                    $('#password_match_message').html('Password sesuai').css('color', '#28a745');
                } else {
                    $('#password_match_message').html('Password tidak sesuai').css('color', '#dc3545');
                }
            });
        });
    </script>
@endpush
