<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Download QR Code</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .qr-code-container {
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="qr-code-container">
        <h3>Kode AC : </h3>
        <h4>{{ $data->kode_AC }}</h4>
        <img src="data:image/png+xml;base64,<?= $qrBase64 ?>" alt="QR Code">
        <h4>Untuk lebih lanjut bisa kunjungi : {{ env('APP_URL') }}</h4>
    </div>
</body>

</html>
