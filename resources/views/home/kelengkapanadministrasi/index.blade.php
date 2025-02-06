@extends('layouts.master')
@section('title', 'Kelengkapan Administrasi - Human Capital Service')
@section('content')

<div class="section">
    <div class="col-12 col-lg-12">
        <div class="row">
            <div class="card">
                <div class="card-header">

                    <div class="d-flex justify-content-between align-items-center">
                        <h4>Berikut data kelengkapan administrasi :</h4>
                        <a href="/kelengkapanadministrasi/form" target="_blank" class="btn btn-primary">Lihat Form Kelengkapan Administrasi</a>
                    </div>
                </div>
                <div class="card-body">

                    <table class="table table-stripped " id="table1">
                        <thead>
                            <tr>
                                <th>Nomor</th>
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
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($kelengkapanadministrasi as $kelengkapanadministrasi)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$kelengkapanadministrasi->id_peserta}}</td>
                                <td>{{$kelengkapanadministrasi->nama}}</td>
                                <td>{{$kelengkapanadministrasi->status_keaktifan}}</td>
                                <td>{{$kelengkapanadministrasi->status_kepesertaan}}</td>
                                <td>{{$kelengkapanadministrasi->periode_awal}}</td>
                                <td>{{$kelengkapanadministrasi->periode_akhir}}</td>
                                <td><a href="{{ Storage::url($kelengkapanadministrasi->surat_keterangan_sehat) }}" target="_blank">{{ ($kelengkapanadministrasi->surat_keterangan_sehat) }}</a></td>
                                <td>{{$kelengkapanadministrasi->backgorund_checking}}</td>
                                <td><a href="{{ Storage::url($kelengkapanadministrasi->surat_pengantar) }}" target="_blank">{{ ($kelengkapanadministrasi->surat_pengantar) }}</a></td>
                                <td><a href="{{$kelengkapanadministrasi->twibbon_in}}" target="_blank">{{$kelengkapanadministrasi->twibbon_in}}</a></td>
                                <td><a href="{{ Storage::url($kelengkapanadministrasi->surat_pernyataan) }}" target="_blank">{{ ($kelengkapanadministrasi->surat_pernyataan) }}</a></td>
                                {{-- <td>
                                    <a href="/kelengkapanadministrasi/{{$kelengkapanadministrasi->id}}/detail" class="btn btn-secondary   ">Detail</a>
                                </td> --}}
                                <td>
                                    {{-- <form action="{{ route('kelengkapanadministrasi.destroy', $kelengkapanadministrasi->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')

                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Apa Anda yakin akan menghapus data?')">Hapus</button>
                                    </form> --}}

                                    <a href="javascript:void(0)" class="btn btn-danger delete-btn" data-id="{{ $kelengkapanadministrasi->id }}">Hapus</a>
                                    </td>
                            </tr>
                            @endforeach
                        </tbody>

                </div>
            </div>
        </div>
    </div>
</div>





@endsection
