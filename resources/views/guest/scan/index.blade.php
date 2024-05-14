@extends('guest.layout.app')

@section('kontenUser')
    <!-- ======= Recent Blog Posts Section ======= -->
    <section id="recent-blog-posts" class="recent-blog-posts">

        <div class="container" data-aos="fade-up">

            <div class="section-header">
                <h2>Daftar Data Ac</h2>
                <p>Data semua ac di fakultas teknik Universitas Janabadra</p>
            </div>

            <div>
                <div id="scanner" style="width: 100%; height: 100vh;"></div>
            </div>

        </div>

    </section><!-- End Recent Blog Posts Section -->
@endsection
@push('jsUser')
    <script src="https://cdn.jsdelivr.net/npm/quagga"></script>
    <script>
        Quagga.init({
            inputStream: {
                name: "Live",
                type: "LiveStream",
                target: document.querySelector("#scanner"),
                constraints: {
                    width: 480,
                    height: 320,
                    facingMode: "environment" // atau "user" untuk kamera depan
                }
            },
            decoder: {
                readers: ["code_128_reader"]
            }
        }, function(err) {
            if (err) {
                console.error(err);
                return;
            }
            console.log("Quagga initialized successfully.");
            Quagga.start();
        });
    </script>
@endpush
