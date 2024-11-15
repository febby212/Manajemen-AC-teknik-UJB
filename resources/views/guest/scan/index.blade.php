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
            <div class="card-header">
                <h3>Scan disini</h3>
            </div>
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
    <script>
        function onScanSuccess(decodedText, decodedResult) {
            // handle the scanned code as you like, for example:
            let appUrl = '{{ $appUrl }}';
            window.location.href = decodedText; // Redirect to the scanned URL
        }

        let config = {
            fps: 10,
            qrbox: {
                width: 200, // Larger to capture more details
                height: 200
            },
            rememberLastUsedCamera: true,
            supportedScanTypes: [Html5QrcodeScanType.SCAN_TYPE_CAMERA],
            // disableFlip: true, // Optionally comment out this line to allow flipping
        };

        let html5QrcodeScanner = new Html5QrcodeScanner(
            "reader", config, /* verbose= */ false);
        html5QrcodeScanner.render(onScanSuccess);
    </script>
@endpush
