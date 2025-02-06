<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Kelengkapan Administrasi</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Custom CSS for PT Len Industri Theme */
        body {
            background-color: #f4f4f9;
            font-family: 'Arial', sans-serif;
        }

        .card {
            border: none;
            border-radius: 8px;w
        }

        .card-header {
            background-color: #003366; /* Warna biru khas PT Len Industri */
            color: #ffffff;
            font-weight: bold;
        }

        .card-body {
            background-color: #ffffff;
            border-top: 4px solid #003366;
            padding: 20px;
        }

        .form-label {
            font-weight: bold;
            color: #333333;
        }

        .form-control {
            border: 1px solid #003366;
            border-radius: 4px;
            transition: box-shadow 0.3s ease;
        }

        .form-control:focus {
            border-color: #00509e;
            box-shadow: 0 0 6px rgba(0, 80, 158, 0.6);
        }

        .btn-primary {
            background-color: #00509e;
            border-color: #00509e;
            transition: background-color 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #003366;
            border-color: #003366;
        }

        .btn-secondary {
            background-color: #cccccc;
            border-color: #cccccc;
            color: #333333;
            transition: background-color 0.3s ease;
        }

        .btn-secondary:hover {
            background-color: #999999;
            border-color: #999999;
        }

        .form-check-input:checked {
            background-color: #00509e;
            border-color: #00509e;
        }

        .text-center button {
            margin: 0 5px;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow">
                    <div class="card-header text-center">
                        <h4>Form Kelengkapan Administrasi</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('kelengkapanadministrasi.store') }}" method="POST" enctype="multipart/form-data"
                        >
                            <!-- CSRF Token (Laravel specific) -->
                            @csrf
                            @if ($errors->any())
                            <div style="color: red;">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <!-- ID Presensi -->
                            <div class="mb-3">
                                <label for="id_peserta" class="form-label">ID Presensi</label>
                                <input type="text" class="form-control" id="id_peserta" name="id_peserta"  value="{{ old('id_peserta') }}" placeholder="Masukkan ID Presensi" required>
                            </div>

                            <!-- Nama -->
                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama</label>
                                <input type="text" class="form-control" id="nama" name="nama"  value="{{ old('nama') }}" placeholder="Masukkan Nama" required>
                            </div>

                             <!-- Status Kepesertaan -->
                             <div class="mb-3">
                                <label for="status_kepesertaan" class="form-label">Status Kpesertaan</label>
                                <select class="form-control" id="status_kepesertaan" name="status_kepesertaan" required>
                                <option value="">-- Pilih Kategori --</option>
                                <option value="PKL">PKL</option>
                                <option value="KP">KP</option>
                                <option value="TA">TA</option>
                                </select>
                             </div>


                             <!-- Upload tanggal periode awal -->
                             <div class="mb-3">
                                <label for="periode_awal" class="form-label">Periode Awal</label>
                                <input type="date" class="form-control" id="periode_awal" name="periode_awal"  value="{{ old('periode_awal') }}" accept="application/pdf" required>
                            </div>

                              <!-- Upload tanggal periode akhir -->
                              <div class="mb-3">
                                <label for="periode_akhir" class="form-label">Periode Akhir</label>
                                <input type="date" class="form-control" id="periode_akhir" name="periode_akhir"  value="{{ old('periode_akhir') }}" accept="application/pdf" required>
                            </div>

                            <!-- Upload File PDF Surat Keterangan Sehat -->
                            <div class="mb-3">
                                <label for="surat_keterangan_sehat" class="form-label">Upload File Surat Keterangan Sehat (pdf)</label>
                                <input type="file" class="form-control" id="surat_keterangan_sehat" name="surat_keterangan_sehat"  value="{{ old('surat_keterangan_sehat') }}" accept="application/pdf" required>
                            </div>

                            <!-- Upload File PDF Surat Pengantar -->
                            <div class="mb-3">
                                <label for="surat_pengantar" class="form-label">Upload File Surat Pengantar (pdf)</label>
                                <input type="file" class="form-control" id="surat_pengantar" name="surat_pengantar"  value="{{ old('surat_pengantar') }}" accept="application/pdf" required>
                            </div>

                            <!-- Upload URL/Link Twibbon In -->
                            <div class="mb-3">
                                <label for="twibbon_in" class="form-label">Upload Link Instagram Twibbon In</label>
                                <input type="url" class="form-control" id="twibbon_in" name="twibbon_in" placeholder="Masukkan Link atau URL" required>
                            </div>

                            <!-- Upload File PDF Surat Pernyataan -->
                            <div class="mb-3">
                                <label for="surat_pernyataan" class="form-label">Upload File Surat Pernyataan (pdf)</label>
                                <input type="file" class="form-control" id="surat_pernyataan" name="surat_pernyataan" accept="application/pdf" required>
                            </div>

                            <!-- Tombol Submit -->
                            <div class="text-center mt-3">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <button type="reset" class="btn btn-secondary">Reset</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS (Optional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
