@extends('layouts.master')
@section('title', 'Human Capital Service')
@section('content')

<div class="section">
    <div class="col-12 col-lg-12">
        <div class="row">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white py-3">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="mb-0 fw-semibold">Data Peserta Aktif</h5>
                        <br>
                        <br>
                        <div class="d-flex gap-2">
                            <a href="/peserta/tambah" class="btn btn-sm btn-primary">
                                <i class="bi bi-person-plus me-1"></i> Tambah Data Peserta Baru
                            </a>
                            <a href="{{ route('laporan', ['status_keaktifan' => 'aktif']) }}" class="btn btn-sm btn-success">
                                <i class="bi bi-file-earmark-text me-1"></i> Laporan Peserta Aktif
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body px-0">
                    <div class="table-responsive px-3">
                        <table class="table table-striped table-bordered mb-0" id="table1">
                            <thead class="text-muted small text-uppercase">
                                <tr class="border-bottom">
                                    <th>No</th>
                                    <th>ID Presensi</th>
                                    <th>ID Apply</th>
                                    <th>Nama</th>
                                    <th>Nomor Kartu</th>
                                    <th>Status Keaktifan</th>
                                    <th>Status Kepesertaan</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Gedung Penempatan</th>
                                    <th>Pembimbing Perusahaan</th>
                                    <th>Unit Penempatan</th>
                                    <th>Jenis Pekerjaan</th>
                                    <th>Reguler / MSIB / Magenta</th>
                                    <th>Email</th>
                                    <th>Bulan Berakhir</th>
                                    <th>Tahun Berakhir</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($peserta as $peserta)
                                    <tr class="border-bottom align-middle hover-shadow-sm">
                                        <td class="fw-medium text-muted">{{ $loop->iteration }}</td>
                                        <td>{{ $peserta->id_peserta }}</td>
                                        <td>{{ $peserta->id_apply }}</td>
                                        <td>{{ $peserta->onboarding->nama }}</td>
                                        <td>{{ $peserta->nomor_kartu }}</td>
                                        <td>
                                            @php
                                                $status = $peserta->status_keaktifan ?? 'tidak diketahui';
                                                $badgeClass = match($status) {
                                                    'aktif' => 'bg-success',
                                                    'tidak aktif' => 'bg-danger',
                                                    default => 'bg-secondary'
                                                };
                                            @endphp
                                            <span class="badge {{ $badgeClass }}">
                                                {{ ucfirst($status) }}
                                            </span>
                                        </td>
                                        <td>{{ $peserta->status_kepesertaan }}</td>
                                        <td>{{ $peserta->jk }}</td>
                                        <td>{{ $peserta->gdg_penempatan }}</td>
                                        <td>{{ $peserta->pembimbing_perusahaan }}</td>
                                        <td>{{ $peserta->unit_penempatan }}</td>
                                        <td>{{ $peserta->jenis_pekerjaan }}</td>
                                        <td>{{ $peserta->reguler_msib }}</td>
                                        <td>{{ $peserta->email }}</td>
                                        <td>{{ $peserta->bulan_berakhir }}</td>
                                        <td>{{ $peserta->tahun_berakhir }}</td>
                                        <td>
                                            <div class="d-flex justify-content-center align-items-center">
                                                <button class="btn btn-sm btn-outline-secondary dropdown-toggle me-1" type="button"
                                                    id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="bi bi-three-dots me-1"></i> Aksi
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                    @if(collect($peserta)->contains(null) || collect($peserta)->contains(''))
                                                        <a class="dropdown-item" href="/peserta/{{$peserta->id_peserta}}/edit">Lengkapi data</a>
                                                    @else
                                                        <a class="dropdown-item" href="/peserta/{{$peserta->id_peserta}}/edit">Edit</a>
                                                        <a class="dropdown-item" href="/peserta/{{$peserta->id_peserta}}/status">Ubah Status</a>
                                                        <a class="dropdown-item" href="/peserta/{{$peserta->id_peserta}}/nilai">Nilai Peserta</a>
                                                        <a class="dropdown-item" href="/peserta/{{$peserta->id_peserta}}/delete">Delete</a>
                                                    @endif
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach

                                @if($peserta->count() === 0)
                                    <tr>
                                        <td colspan="17" class="text-center text-muted py-4">
                                            <em>Belum ada data peserta yang terdaftar.</em>
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

<!-- Pastikan untuk memuat Bootstrap Icons (untuk ikon Tambah dan Laporan) -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

@endsection
