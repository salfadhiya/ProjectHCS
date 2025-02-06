@extends('layouts.master')
@section('title', 'Peserta Laporan  - Human Capital Servis')
@section('content')
<div class="section">

    <div class="card">
        <div class="card-header">
            @if ($peserta->isNotEmpty())
                @if ($peserta->first()->status_keaktifan == "aktif")
                    <h6 class="mb-4">Laporan Peserta Magang Aktif</h6>
                @else
                    <h6 class="mb-4">Laporan Peserta Magang Nonaktif</h6>
                @endif

                @if (request('tanggal_mulai') && request('tanggal_berakhir'))
                    <p class="text-muted">Data dari {{ request('tanggal_mulai') }} sampai {{ request('tanggal_berakhir') }}</p>
                @endif
            @else
                <h6 class="mb-4">Tidak ada peserta yang ditemukan.</h6>
            @endif

            <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#filterModal">
                <i class="fas fa-filter"></i> Filter Data
            </button>

            <a href="{{ route('peserta.export-pdf', request()->all()) }}" class="btn btn-success mb-3">Export PDF</a>
            <a href="/peserta" class="btn btn-secondary mb-3">Kembali</a>

            <!-- Modal Filter -->
            <div class="modal fade" id="filterModal" tabindex="-1" aria-labelledby="filterModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="filterModalLabel">Filter Data Peserta</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('laporan') }}" method="GET">
                                @csrf
                                <div class="mb-3">
                                    <label for="tanggal_mulai" class="form-label">Tanggal Mulai</label>
                                    <input type="date" class="form-control" name="tanggal_mulai" value="{{ request('tanggal_mulai') }}">
                                </div>
                                <div class="mb-3">
                                    <label for="tanggal_berakhir" class="form-label">Tanggal Berakhir</label>
                                    <input type="date" class="form-control" name="tanggal_berakhir" value="{{ request('tanggal_berakhir') }}">
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary">Terapkan Filter</button>
                                    <button type="reset" class="btn btn-secondary">Reset</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>Nomor</th>
                            <th>ID Peserta</th>
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
                            <th>Reguler/MSIB</th>
                            <th>Email</th>
                            <th>Tanggal Mulai</th>
                            <th>Tanggal Akhir</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($peserta as $p)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $p->id_peserta }}</td>
                            <td>{{ $p->id_apply }}</td>
                            <td>{{ $p->onboarding->nama }}</td>
                            <td>{{ $p->nomor_kartu }}</td>
                            <td>
                                @if($p->status_keaktifan == 'aktif')
                                    <span class="badge bg-success">Aktif</span>
                                @else
                                    <span class="badge bg-danger">Tidak Aktif</span>
                                @endif
                            </td>
                            <td>{{ $p->status_kepesertaan }}</td>
                            <td>{{ $p->jk }}</td>
                            <td>{{ $p->gdg_penempatan }}</td>
                            <td>{{ $p->pembimbing_perusahaan }}</td>
                            <td>{{ $p->unit_penempatan }}</td>
                            <td>{{ $p->jenis_pekerjaan }}</td>
                            <td>{{ $p->reguler_msib }}</td>
                            <td>{{ $p->email }}</td>
                            <td>{{ $p->onboarding->tanggal_mulai }}</td>
                            <td>{{ $p->onboarding->tanggal_berakhir }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Tabel Data -->
</div>
@endsection
