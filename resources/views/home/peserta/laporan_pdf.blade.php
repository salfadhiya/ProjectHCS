<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Peserta</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            padding: 0;
            background-color: #ffffff;
        }

        h1 {
            text-align: center;
            font-size: 18px;
            font-weight: bold;
            text-transform: uppercase;
        }

        p {
            font-size: 14px;
            line-height: 1.5;
        }

        .table-container {
            overflow-x: auto;
            width: 100%;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 12px;
        }

        th, td {
            border: 1px solid black;
            padding: 2px;
            text-align: center;
            word-break: break-word;
        }

        th {
            background-color: #dddddd;
            font-weight: bold;
            min-width: 80px;
        }

        td {
            white-space: normal;
        }

        @media print {
            .table-container {
                overflow: visible !important;
            }

            table {
                page-break-inside: auto;
            }

            tr {
                page-break-inside: avoid;
            }
        }

    </style>
</head>
<body>
    <h1>
        @if($peserta->first()->status_keaktifan == 'tidak aktif')
              DATA PESERTA MAGANG OUT
        @else
              DATA PESERTA MAGANG IN
        @endif
    </h1>

    <br>
    @if($peserta->first()->status_keaktifan == 'tidak aktif')
    <p><strong>Ketentuan Administrasi Keluar:</strong></p>
    <ul>
        <li>Pengambilan form absensi maksimal H-5 sebelum masa magang selesai dan diserahkan kepada pembimbing unit untuk divalidasi</li>
        <li>Pengambilan form penilaian kemudian diisi oleh pembimbing unit dan diserahkan kembali kepada unit HC Services untuk pembuatan sertifikat</li>
        <li>Melaksanakan Knowledge Sharing</li>
        <li>Melaksanakan Zumba minimal 2x setiap bulan</li>
        <li>Melaksanakan Safety Induction</li>
        <li>Melakukan setoran hafalan surat pendek dan bacaan sholat (bagi yang beragama muslim)</li>
        <li>Melengkapi dokumen administrasi masuk (Surat pengantar, surat sehat, sertifikat vaksin)</li>
        <li>Mengupload Twibbon Out</li>
        <li>Mengembalikan ID Card di hari terakhir pelaksanaan magang</li>
    </ul>
    <p style="text-align: center;"><strong>Catatan: Sertifikat akan dikirimkan apabila kelengkapan administrasi keluar sudah selesai.</strong></p>
    @else
    {{-- <p style="text-align: center;"><strong>ini - aktif</strong></p> --}}
    @endif

    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>ID Presensi</th>
                    <th>Nama</th>
                    <th>Status Kepesertaan</th>
                    <th>Reguler / MSIB / Magenta</th>
                    <th>Tanggal Mulai</th>
                    <th>Tanggal Berakhir</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($peserta as $index => $peserta)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $peserta->id_peserta }}</td>
                        <td>{{ $peserta->onboarding->nama }}</td>
                        <td>{{ $peserta->status_kepesertaan }}</td>
                        <td>{{ $peserta->reguler_msib }}</td>
                        <td>{{ $peserta->onboarding->tanggal_mulai }}</td>
                        <td>{{ $peserta->onboarding->tanggal_berakhir }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
