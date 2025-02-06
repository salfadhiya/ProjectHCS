@extends('layouts.master')
@section('title', 'Peserta NonAktif - Human Capital Servis')
@section('content')
<div class="section">
    <div class="col-12 col-lg-12">
        <div class="row">
            <div class="card">
                <div class="card-header">

                    <div class="d-flex justify-content-between align-items-center">
                        <h4>Berikut data peserta nonaktif:</h4>
                        <a href="{{ route('laporan', ['status_keaktifan' => 'tidak aktif']) }}"  class="btn btn-danger">Laporan Peserta Nonaktif</a>
                    </div>

                    {{-- <a href="{{ route('laporan', ['status_keaktifan' => 'tidak aktif']) }}" class="btn btn-danger">Laporan Peserta Nonaktif</a>
                    <br><br>
                    <h6>Berikut data peserta nonaktif:</h6> --}}
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped" id="table1">
                            <thead>
                                <tr>
                                    <th>Nomor</th>
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
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$peserta->id_peserta}}</td>
                                    <td>{{$peserta->id_apply}}</td>
                                    <td>{{$peserta->onboarding->nama}}</td>
                                    <td>{{$peserta->nomor_kartu}}</td>
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
                                    <td>{{$peserta->status_kepesertaan}}</td>
                                    <td>{{$peserta->jk}}</td>
                                    <td>{{$peserta->gdg_penempatan}}</td>
                                    <td>{{$peserta->pembimbing_perusahaan}}</td>
                                    <td>{{$peserta->unit_penempatan}}</td>
                                    <td>{{$peserta->jenis_pekerjaan}}</td>
                                    <td>{{$peserta->reguler_msib}}</td>
                                    <td>{{$peserta->email}}</td>
                                    <td>{{$peserta->bulan_berakhir}}</td>
                                    <td>{{$peserta->tahun_berakhir}}</td>
                                    <td>
                                        <button class="btn btn-secondary dropdown-toggle me-1" type="button"
                                            id="dropdownMenuButton" data-bs-toggle="dropdown"
                                            aria-haspopup="true" aria-expanded="false">
                                            Aksi
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <a class="dropdown-item" href="/peserta/{{$peserta->id_peserta}}/status">Ubah Status</a>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection



