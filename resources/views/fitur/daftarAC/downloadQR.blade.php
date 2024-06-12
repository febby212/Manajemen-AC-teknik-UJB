<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Download QR Code</title>
</head>

<body>
    <!-- Tampilkan QR Code -->
    <img src="data:image/svg+xml;base64,{{ $qrBase64 }}" alt="QR Code">

    <!-- Tambahkan link URL -->
    <h2>Untuk lebih lanjut bisa kunjungi : {{ env('APP_URL') }}</h2>
</body>

</html>
