@extends('layouts.master')
@section('title', 'Human Capital Service')
@section('content')

<div class="section">
    <div class="col-12 col-lg-12">
        <div class="row">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white py-3">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="mb-0 fw-semibold">Data Administrasi</h5>
                        <br>
                        <br>
                        <a href="/kelengkapanadministrasi/form" target="_blank" class="btn btn-sm btn-primary d-flex align-items-center">
                            <i class="bi bi-file-earmark-check me-1"></i> Lihat Form Kelengkapan Administrasi
                        </a>
                    </div>
                </div>
                <div class="card-body px-0">
                    <div class="table-responsive px-3">
                        <table class="table table-striped table-bordered mb-0" id="table1">
                            <thead class="text-muted small text-uppercase">
                                <tr class="border-bottom">
                                    <th>No</th>
                                    <th>ID Presensi</th>
                                    <th>Nama</th>
                                    <th>Status Keaktifan</th>
                                    <th>Status Kepersetaan</th>
                                    <th>Periode Awal</th>
                                    <th>Periode Akhir</th>
                                    <th>Surat Keterangan Sehat</th>
                                    <th>Background Checking</th>
                                    <th>Surat Pengantar</th>
                                    <th>Twibbon In</th>
                                    <th>Surat Pernyataan</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($kelengkapanadministrasi as $data)
                                <tr class="border-bottom align-middle hover-shadow-sm">
                                    <td class="fw-medium text-muted">{{ $loop->iteration }}</td>
                                    <td>{{ $data->id_peserta }}</td>
                                    <td>{{ $data->nama }}</td>
                                    <td>{{ $data->status_keaktifan }}</td>
                                    <td>{{ $data->status_kepesertaan }}</td>
                                    <td>{{ $data->periode_awal }}</td>
                                    <td>{{ $data->periode_akhir }}</td>
                                    <td>
                                        <a href="{{ Storage::url($data->surat_keterangan_sehat) }}" target="_blank" class="badge bg-secondary">{{ basename($data->surat_keterangan_sehat) }}</a>
                                    </td>
                                    <td>
                                        @if($data->backgorund_checking)
                                            <span class="badge bg-success">Lengkap</span>
                                        @else
                                            <span class="badge bg-danger">Tidak Lengkap</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ Storage::url($data->surat_pengantar) }}" target="_blank" class="badge bg-secondary">{{ basename($data->surat_pengantar) }}</a>
                                    </td>
                                    <td>
                                        <a href="{{ $data->twibbon_in }}" target="_blank" class="badge bg-secondary">{{ basename($data->twibbon_in) }}</a>
                                    </td>
                                    <td>
                                        <a href="{{ Storage::url($data->surat_pernyataan) }}" target="_blank" class="badge bg-secondary">{{ basename($data->surat_pernyataan) }}</a>
                                    </td>
                                    <td class="text-center">
                                        <a href="javascript:void(0)" class="btn btn-sm btn-outline-danger delete-btn" data-id="{{ $data->id }}" title="Hapus">
                                            <i class="bi bi-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach

                                @if($kelengkapanadministrasi->count() === 0)
                                <tr>
                                    <td colspan="13" class="text-center text-muted py-4">
                                        <em>Belum ada data kelengkapan administrasi yang terdaftar.</em>
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

<!-- Pastikan untuk memuat Bootstrap Icons (untuk ikon Hapus) -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

@endsection
