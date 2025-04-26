@extends('layouts.master')
@section('title', 'Human Capital Service')
@section('content')

<div class="section">
    <div class="col-12 col-lg-12">
        <div class="row">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white py-3">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="mb-0 fw-semibold">Data Peserta OnBoarding</h5>
                        <div class="d-flex gap-2">
                            <a href="/onboarding/tambah" class="btn btn-sm btn-primary d-flex align-items-center">
                                <i class="bi bi-plus-square me-1"></i> Tambah Data Peserta
                            </a>
                            {{-- <a href="/onboarding/interninfo" class="btn btn-sm btn-info d-flex align-items-center">
                                <i class="bi bi-person-lines-fill me-1"></i> Data Private --}}
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body px-0">
                    <div class="table-responsive px-3">
                        <table class="table table-striped table-bordered mb-0" id="table1">
                            <thead class="text-muted small text-uppercase">
                                <tr class="border-bottom">
                                    <th scope="col">Nomor</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Jurusan</th>
                                    <th scope="col">Nomor Telepon</th>
                                    <th scope="col">Asal Instansi</th>
                                    <th scope="col">Tanggal Mulai</th>
                                    <th scope="col">Tanggal Berakhir</th>
                                    <th scope="col" class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($onboarding as $data)
                                <tr class="border-bottom align-middle hover-shadow-sm">
                                    <td class="fw-medium text-muted">{{ $loop->iteration }}</td>
                                    <td class="fw-semibold">{{ $data->nama }}</td>
                                    <td>{{ $data->jurusan }}</td>
                                    <td>{{ $data->no_telp }}</td>
                                    <td>{{ $data->asal_instansi }}</td>
                                    <td>{{ $data->tanggal_mulai }}</td>
                                    <td>{{ $data->tanggal_berakhir }}</td>
                                    <td class="text-center">
                                        <div class="d-flex justify-content-center align-items-center">
                                            <!-- Tombol Edit -->
                                            <a href="/onboarding/{{$data->id_apply}}/edit" class="btn btn-sm btn-outline-warning me-1" title="Edit">
                                                <i class="bi bi-pencil-square me-1"></i>
                                            </a>
                                            <a href="/onboarding/{{$data->id_apply}}/edit" class="btn btn-sm btn-outline-success me-1" title="Edit">
                                                <i class="bi bi-arrow-left-circle me-2"></i>
                                            </a>

                                            <button class="btn btn-sm btn-outline-danger delete-btn" data-id="{{ $data->id }}" title="Hapus">
                                                <i class="bi bi-trash"></i>
                                            </button>

                                            {{-- <!-- Tombol Hapus -->
                                            <form action="{{ route('onboarding.destroy', $data->id_apply) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Apa Anda yakin akan menghapus data?')" title="Hapus">
                                                    <i class="bi bi-trash me-1"></i>
                                                </button>
                                            </form> --}}
                                        </div>
                                    </td>
                                </tr>
                                @endforeach

                                @if($onboarding->count() === 0)
                                <tr>
                                    <td colspan="8" class="text-center text-muted py-4">
                                        <em>Belum ada peserta on boarding yang terdaftar.</em>
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
