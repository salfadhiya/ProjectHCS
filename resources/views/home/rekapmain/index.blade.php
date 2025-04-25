@extends('layouts.master')
@section('title', 'Human Capital Service')
@section('content')

<div class="section">
    <div class="col-12 col-lg-12">
        <div class="row">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white py-3">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="mb-0 fw-semibold">Data Rekap Presensi</h5>
                        <br>
                        <br>
                    </div>
                </div>

                <div class="card-body px-0">
                    <div class="table-responsive px-3">
                        <table class="table table-striped table-bordered mb-0" id="table1">
                            <thead class="text-muted small text-uppercase">
                                <tr class="border-bottom">
                                    <th class="border-end">No</th>
                                    <th class="border-end">Nama</th>
                                    <th class="border-end">Presensi</th>
                                    <th class="border-end">Status</th>
                                    <th class="border-end">Asal Instansi</th>
                                    <th class="border-end">Sakit</th>
                                    <th class="border-end">Izin</th>
                                    <th class="border-end">Alfa</th>
                                    <th class="border-end">Terlambat</th>
                                    <th class="border-end">WFH</th>
                                    <th class="border-end">Project</th>
                                    <th class="border-end">Zumba</th>
                                    <th class="border-end">Dhuha</th>
                                    <th class="border-end">Knowledge Sharing</th>
                                    <th class="border-end">Safety Induction</th>
                                    <th class="border-end">Background Checking</th>
                                    <th class="border-end">Surat Peringatan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($rekapanData as $data)
                                    <tr class="border-bottom align-middle hover-shadow-sm">
                                        <td class="fw-medium text-muted">{{ $loop->iteration }}</td>
                                        <td class="border-end">{{ $data['nama'] }}</td>
                                        <td class="border-end">{{ $data['presensi'] }}</td>
                                        <td class="border-end">{{ $data['status'] }}</td>
                                        <td class="border-end">{{ $data['asal_instansi'] }}</td>
                                        <td class="border-end">{{ $data['sakit'] }}</td>
                                        <td class="border-end">{{ $data['izin'] }}</td>
                                        <td class="border-end">{{ $data['alfa'] }}</td>
                                        <td class="border-end">{{ $data['terlambat'] }}</td>
                                        <td class="border-end">{{ $data['wfh'] }}</td>
                                        <td class="border-end">{{ $data['project'] }}</td>
                                        <td class="border-end">{{ $data['zumba'] }}</td>
                                        <td class="border-end">{{ $data['dhuha'] }}</td>
                                        <td class="border-end">
                                            @if($data['knowledge_sharing'] == 'yes')
                                                <span class="badge bg-success">Ya</span> <!-- Badge hijau jika "Ya" -->
                                            @else
                                                <span class="badge bg-danger">Tidak</span> <!-- Badge merah jika "Tidak" -->
                                            @endif
                                        </td>
                                        <td class="border-end">{{ $data['safety_induction'] }}</td>
                                        <td class="border-end">
                                            @if($data['background_checking'] == 'yes')
                                                <span class="badge bg-success">Ya</span> <!-- Badge hijau jika "Ya" -->
                                            @else
                                                <span class="badge bg-danger">Tidak</span> <!-- Badge merah jika "Tidak" -->
                                            @endif
                                        </td>
                                                                                                                        <td class="border-end">{{ $data['surat_peringatan'] }}</td>

                                        <td class="text-center">
                                            <div class="d-flex justify-content-center align-items-center">
                                                <!-- Tombol Edit -->
                                                <a href="{{ route('maintenance.edit', $data['presensi']) }}" class="btn btn-sm btn-outline-warning me-1" title="Edit">
                                                    <i class="bi bi-pencil-square me-1"></i>
                                                </a>

                                                <!-- Tombol Delete -->
                                                <button class="btn btn-sm btn-outline-danger delete-btn" data-id="{{ $data['presensi'] }}" title="Hapus">
                                                    <i class="bi bi-trash me-1"></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach

                                @if($rekapanData->count() === 0)
                                <tr>
                                    <td colspan="17" class="text-center text-muted py-4">
                                        <em>Belum ada data absensi yang terdaftar.</em>
                                    </td>
                                </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Pastikan untuk memuat Bootstrap Icons (untuk ikon Edit dan Hapus) -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

@endsection
