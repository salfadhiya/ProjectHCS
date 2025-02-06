@extends('layouts.master')
@section('title', 'Onboarding (Private) - Human Capital Service')
@section('content')

<div class="section">
    <div class="col-12 col-lg-12">
        <div class="row">
            <div class="card">
                <div class="card-header">

                    <div class="d-flex justify-content-between align-items-center">
                        <h4>Berikut data On Boarding (Private) :</h4>
                        <div class="d-flex gap-2">
                            {{-- <a href="/onboarding/interntambah" class="btn btn-primary">Tambah Data On Boarding (Private)</a> --}}
                            <a href="/onboarding" class="btn btn-info">Kembali</a>
                        </div>
                    </div>

                    {{-- <a href="/onboarding/interntambah" class="btn btn-primary">Tambah Data On Boarding (Private)</a>
                    <br><br>
                    <h6>Berikut data admin :</h6> --}}
                </div>
                <div class="card-body">

                    <table class="table table-stripped " id="table1">
                        <thead>
                            <tr>
                                <th>Nomor</th>
                                <th>Nomor Form</th>
                                <th>Nama</th>
                                <th>NIS/NIM/NIP</th>
                                <th>Kompetensi Keahlian</th>
                                <th>Katengori Peserta</th>
                                <th>Tanggal Pengajuan</th>
                                <th>Tanggal Mulai</th>
                                <th>Tanggal Berakhir</th>
                                <th>Nilai Psikotes</th>
                                <th>Nilai Wawancara</th>
                                <th>Hasil Seleksi</th>
                                <th>Nomor Surat Konfirmasi</th>
                                <th>Tanggal Surat Konfirmasi</th>
                                <th>Link Surat Konfirmasi</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($interninfo as $interninfo)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $interninfo->nomor_form }}</td>
                                    <td>{{ $interninfo->onboarding->nama ?? 'Tidak Ada Data' }}</td>
                                    <td>{{ $interninfo->nis_nim_nip }}</td>
                                    <td>{{ $interninfo->onboarding->jurusan ?? 'Tidak Ada Data' }}</td>
                                    <td>{{ $interninfo->kategori_peserta }}</td>
                                    <td>{{ $interninfo->tanggal_pengajuan }}</td>
                                    <td>{{ $interninfo->onboarding->tanggal_mulai }}</td>
                                    <td>{{ $interninfo->onboarding->tanggal_berakhir }}</td>
                                    <td>{{ $interninfo->nilai_psikotes }}</td>
                                    <td>{{ $interninfo->nilai_wawancara }}</td>
                                    <td>{{ $interninfo->hasil_seleksi }}</td>
                                    <td>{{ $interninfo->nomor_surat_konfirmasi }}</td>
                                    <td>{{ $interninfo->tanggal_surat_konfirmasi }}</td>

                                        {{-- <a href="/interninfo/{{$interninfo->id}}/edit"
                                            class="btn btn-warning">Edit</a> --}}
                                            <td><a href="{{ $interninfo->link_surat_konfirmasi }}" target="_blank">Lihat Surat</a></td>
                                            <td>
                                                <a href="/onboarding/{{$interninfo->id_apply}}/internedit" class="btn btn-warning">Edit</a>
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
