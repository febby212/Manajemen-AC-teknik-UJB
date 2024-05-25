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
            <div class="card-body">
                <div id="reader" style="width: 100%;"></div>
            </div>
        </div>
        <!-- card end -->
    </div>
@endsection

@push('js')
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://unpkg.com/html5-qrcode" type="text/javascript"></script>

    <!-- Muat skrip html5-qrcode.min.js -->
    <script>
        $(document).ready(function() {
            var html5QrcodeScanner = new Html5QrcodeScanner(
                "reader", {
                    fps: 10,
                    qrbox: {
                        width: 250,
                        height: 250
                    }
                },
                false);

            function onScanSuccess(decodedText, decodedResult) {
                // Asumsikan decodedText adalah id yang dienkripsi
                html5QrcodeScanner.pause(true, true);

                // Kirim permintaan AJAX untuk mengambil detail AC berdasarkan id
                $.ajax({
                    url: '/ac/' + encodeURIComponent(decodedText),
                    method: 'GET',
                    success: function(response) {
                        // Arahkan pengguna ke halaman detail AC setelah berhasil
                        window.location.href = '/ac/' + encodeURIComponent(decodedText);
                    },
                    error: function(xhr, status, error) {
                        console.error('Error fetching AC details:', error);
                        alert('Gagal mengambil detail AC. Silakan coba lagi.');
                        html5QrcodeScanner.resume();
                    }
                });
            }

            function onScanFailure(error) {
                console.warn(`Code scan error = ${error}`);
            }

            html5QrcodeScanner.render(onScanSuccess, onScanFailure);
        });
    </script>
@endpush
