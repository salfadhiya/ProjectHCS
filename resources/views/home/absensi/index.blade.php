@extends('layouts.master')
@section('title', 'Human Capital Service')
@section('content')

<div class="section">
    <div class="col-12 col-lg-12">
        <div class="row">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white py-3">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="mb-0 fw-semibold">Presensi Masuk</h5>
                        <br>
                        <br>
                        <a href="{{ route('absensi.create') }}" class="btn btn-sm btn-primary d-flex align-items-center" target="_blank">
                            <i class="bi bi-file-earmark-check me-1"></i> Lihat Form Presensi
                        </a>
                    </div>
                </div>
                <div class="card-body px-0">
                    <div class="table-responsive px-3">
                        <table class="table table-striped table-bordered mb-0" id="table1">
                            <thead class="text-muted small text-uppercase">
                                <tr class="border-bottom">
                                    <th>ID</th>
                                    <th>ID Presensi</th>
                                    <th>Nama</th>
                                    <th>Tanggal</th>
                                    <th>Presensi</th>
                                    <th>Jenis Absensi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($absensis as $absensi)
                                    <tr class="border-bottom align-middle hover-shadow-sm">
                                        <td class="fw-medium text-muted">{{ $loop->iteration }}</td>
                                        <td>{{ $absensi->id_peserta }}</td>
                                        <td>{{ $absensi->nama }}</td>
                                        <td>{{ $absensi->created_at->format('d M Y') }}</td>
                                        <td>{{ $absensi->presensi }}</td>
                                        <td>{{ $absensi->jenis_absensi }}</td>
                                    </tr>
                                @endforeach

                                @if($absensis->count() === 0)
                                    <tr>
                                        <td colspan="6" class="text-center text-muted py-4">
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

<!-- Pastikan untuk memuat Bootstrap Icons (untuk ikon Lihat Form Presensi) -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

@endsection
