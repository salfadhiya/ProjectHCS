@extends('layouts.master')
@section('title', 'Rekapan Data Absensi - Human Capital Service')
@section('content')

<div class="section">
    <div class="col-12 col-lg-12">
        <div class="row">
            <div class="card">
                <div class="card-header">

                    <div class="d-flex justify-content-between align-items-center">
                        <h4>Berikut data absensi:</h4>
                        <a href="{{ route('absensi.create') }}" class="btn btn-primary" target="_blank">Lihat Form Presensi</a>
                    </div>

                    {{-- <a href="{{ route('absensi.create') }}" class="btn btn-primary" target="_blank">Lihat Form Presensi</a>
                    <br><br>
                    <h6>Berikut data absensi:</h6> --}}
                </div>
                <div class="card-body">
                    {{-- @dd($absensis)   --}}
                    <table class="table table-stripped " id="table1">
                        <thead>
                            <tr>
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
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $absensi->id_peserta }}</td>
                                    <td>{{ $absensi->nama}}</td>
                                    <td>{{ $absensi->created_at }}</td>
                                    <td>{{ $absensi->presensi }}</td>
                                    <td>{{ $absensi->jenis_absensi }}</td>
                                    {{-- <td>
                                        <a href="{{ route('absensi.show', $absensi->id) }}" class="btn btn-info btn-sm">Detail</a>
                                        <a href="{{ route('absensi.edit', $absensi->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                        <form action="{{ route('absensi.destroy', $absensi->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus?')">Hapus</button>
                                        </form>
                                    </td> --}}
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
