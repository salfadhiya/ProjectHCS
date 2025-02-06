@extends('layouts.master')
@section('title', 'On Boarding - Human Capital Service')
@section('content')

<div class="section">
    <div class="col-12 col-lg-12">
        <div class="row">
            <div class="card">
                <div class="card-header">

                    <div class="d-flex justify-content-between align-items-center">
                        <h4>Berikut data peserta on boarding:</h4>
                        <div class="d-flex gap-2">
                            <a href="/onboarding/tambah" class="btn btn-primary">Tambah Data Peserta</a>
                            <a href="/onboarding/interninfo" class="btn btn-info">Data Private</a>
                        </div>
                </div>
                <div class="card-body">

                    <table class="table table-stripped " id="table1">
                        <thead>
                            <tr>
                                <th scope="col">Nomor</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Jurusan</th>
                                <th scope="col">Nomor Telepon</th>
                                <th scope="col">Asal Instansi</th>
                                <th scope="col">Tanggal Mulai</th>
                                <th scope="col">Tanggal Berakhir</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($onboarding as $onboarding)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$onboarding->nama}}</td>
                                    <td>{{$onboarding->jurusan}}</td>
                                    <td>{{$onboarding->no_telp  }}</td>
                                    <td>{{$onboarding->asal_instansi}}</td>
                                    <td>{{$onboarding->tanggal_mulai}}</td>
                                    <td>{{$onboarding->tanggal_berakhir}}</td>
                                    <td>
                                    <a href="/onboarding/{{$onboarding->id_apply}}/edit" class="btn btn-warning">Edit</a>

                                    <form action="{{ route('onboarding.destroy', $onboarding->id_apply) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')

                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Apa Anda yakin akan menghapus data?')">Hapus</button>



                                    </form>
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
