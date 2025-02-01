<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Absensi Berhasil</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* body {
            background-color: #003366;
        } */
        .alert {
            background-color: #003366;
            color: #ffffff;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="alert alert-success text-center" role="alert">
            <h4 class="alert-heading">Pengisian Form Absensi Berhasil</h4>
            <p>Terima kasih telah mengisi absensi. Data Anda telah berhasil disimpan.</p>
            <hr>
            {{-- <p class="mb-0">Klik <a href="{{ route('home') }}" class="alert-link">di sini</a> untuk kembali ke halaman utama.</p> --}}
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
