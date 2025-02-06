@extends('layouts.master')
@section('title', 'Rekapan Data Absensi - Human Capital Service')
@section('content')

    <style>
        /* Menata tabel agar teks berada di tengah */
        .table td,
        .table th {
            text-align: center;
            /* Menyusun teks secara horizontal di tengah */
            vertical-align: middle;
            /* Menyusun teks secara vertikal di tengah */
        }
    </style>

    <div class="section">
        <div class="col-12 col-lg-12">
            <div class="row">
                <div class="card">
                    <div class="card-header">
                        <h4>Berikut data Rekapan Maintenance:</h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped table-bordered" id="table1">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>Presensi</th>
                                    <th>Status</th>
                                    <th>Asal Instansi</th>
                                    <th>Sakit</th>
                                    <th>Izin</th>
                                    <th>Alfa</th>
                                    <th>Terlambat</th>
                                    <th>WFH</th>
                                    <th>Project</th>
                                    <th>Zumba</th>
                                    <th>Dhuha</th>
                                    <th>Knowledge Sharing</th>
                                    <th>Safety Induction</th>
                                    <th>Background Checking</th>
                                    <th>Surat Peringatan</th>
                                    <th>Aksi</th> <!-- Kolom untuk tombol aksi -->
                                </tr>
                            </thead>
                            <tbody>
                                {{-- @dd($rekapanData)   --}}
                                @foreach ($rekapanData as $data)
                                    <tr>
                                        <td>{{ $data['nama'] }}</td>
                                        <td>{{ $data['presensi'] }}</td>
                                        <td>{{ $data['status'] }}</td>
                                        <td>{{ $data['asal_instansi'] }}</td>
                                        <td>{{ $data['sakit'] }}</td>
                                        <td>{{ $data['izin'] }}</td>
                                        <td>{{ $data['alfa'] }}</td>
                                        <td>{{ $data['terlambat'] }}</td>
                                        <td>{{ $data['wfh'] }}</td>
                                        <td>{{ $data['project'] }}</td>
                                        <td>{{ $data['zumba'] }}</td>
                                        <td>{{ $data['dhuha'] }}</td>
                                        <td>{{ $data['knowledge_sharing'] }}</td>
                                        <td>{{ $data['safety_induction'] }}</td>
                                        <td>{{ $data['background_checking'] }}</td>
                                        <td>{{ $data['surat_peringatan'] }}</td>

                                        <td>
                                            <button class="btn btn-secondary dropdown-toggle me-1" type="button"
                                                id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="false">
                                                Aksi
                                            </button>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                <a class="dropdown-item"
                                                    href="{{ route('maintenance.edit', $data['presensi']) }}">Edit</a>
                                                <a class="dropdown-item"
                                                    href="{{ route('maintenance.destroy', $data['presensi']) }}"
                                                    onclick="event.preventDefault(); if(confirm('Apakah Anda yakin ingin menghapus data ini?')) document.getElementById('delete-form-{{ $data['presensi'] }}').submit();">
                                                    Delete
                                                </a>

                                                <form id="delete-form-{{ $data['presensi'] }}"
                                                    action="{{ route('maintenance.destroy', $data['presensi']) }}"
                                                    method="POST" style="display: none;">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>

                                            </div>
                                        </td>
                                    </tr>
                                @endforeach


                            </tbody>
                        </table>

                        <!-- Pastikan untuk memuat Bootstrap Icons (untuk ikon Edit dan Hapus) -->
                        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
