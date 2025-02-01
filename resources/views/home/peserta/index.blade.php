@extends('layouts.master')
@section('title', 'Peserta - Human Capital Servis')
@section('content')

<div class="section">
    <div class="col-12 col-lg-12">
        <div class="row">
            <div class="card">
                <div class="card-header">
                    <a href="/peserta/tambah" class="btn btn-primary">Tambah Data Peserta Baru</a>
                    <br><br>
                    <h6>Berikut data peserta :</h6>
                </div>
                <div class="card-body">
                    <table class="table table-stripped " id="table1">
                        <thead>
                            <tr>
                                <th>Nomor</th>
                                <th>ID Presensi</th>
                                <th>ID Apply</th>
                                <th>Nomor Kartu</th>
                                    {{-- <th>Nama</th> --}}
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
                                <td>{{$peserta->nomor_kartu}}</td>
                                <td>
                                    @php
                                        $status = $peserta->status_keaktifan ?? 'tidak diketahui';
                                        $badgeClass = match($status) {
                                            'aktif' => 'bg-success',
                                            'nonaktif' => 'bg-danger',
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
                                            @if(collect($peserta)->contains(null) || collect($peserta)->contains(''))
                                            <a class="dropdown-item" href="/peserta/{{$peserta->id_peserta}}/edit">Lengkapi data</a>
                                            @else
                                            <a class="dropdown-item" href="/peserta/{{$peserta->id_peserta}}/edit">Edit</a>
                                            <a class="dropdown-item" href="/peserta/{{$peserta->id_peserta}}/delete">Delete</a>
                                            <a class="dropdown-item" href="/peserta/{{$peserta->id_peserta}}/nilai">Nilai Peserta</a>
                                            @endif
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

@endsection
