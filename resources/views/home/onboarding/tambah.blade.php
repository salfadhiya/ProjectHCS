@extends('layouts.master')
@section('title', 'Tambah Data Peserta On Boarding')
@section('content')

<div class="section">
    <div class="col-12 col-lg-12">
        <div class="row">
            <div class="card">
                <div class="card-header">
                    <h6>Mohon masukan data dengan benar!</h6>
                </div>
                <div class="card-body">
                <form action="{{ route('onboarding.store')}}" method="POST">
                    @if ($errors->any())
                    <div style="color: red;">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                    @csrf

                   <div class="mb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input
                        type="text"
                        class="form-control"
                        name="nama"
                        id="nama"
                        aria-describedby="helpId"
                        placeholder=""
                    />
                    <small id="helpId" class="form-text text-muted"></small>
                   </div>
                   <div class="mb-3">
                    <label for="jurusan" class="form-label">Jurusan</label>
                    <input
                        type="text"
                        class="form-control"
                        name="jurusan"
                        id="jurusan"
                        aria-describedby="helpId"
                        placeholder=""
                    />
                    <small id="helpId" class="form-text text-muted"></small>
                   </div>
                   <div class="mb-3">
                    <label for="no_telp" class="form-label">Nomor Telepon</label>
                    <input
                        type="number"
                        class="form-control"
                        name="no_telp"
                        id="no_telp"
                        aria-describedby="helpId"
                        placeholder=""
                    />
                    <small id="helpId" class="form-text text-muted"></small>
                   </div>
                   <div class="mb-3">
                    <label for="asal_instansi" class="form-label">Asal Instansi</label>
                    <input
                        type="text"
                        class="form-control"
                        name="asal_instansi"
                        id="asal_instansi"
                        aria-describedby="helpId"
                        placeholder=""
                    />
                    <small id="helpId" class="form-text text-muted"></small>
                   </div>
                   <div class="d-flex gap-3">
                    <div class="mb-3">
                        <label for="tanggal_mulai" class="form-label">Tanggal Mulai</label>
                        <input
                            type="date"
                            class="form-control"
                            name="tanggal_mulai"
                            id="tanggal_mulai"
                            aria-describedby="helpId"
                            placeholder=""
                        />
                    </div>
                    <div class="mb-3">
                        <label for="tanggal_berakhir" class="form-label">Tanggal Berakhir</label>
                        <input
                            type="date"
                            class="form-control"
                            name="tanggal_berakhir"
                            id="tanggal_berakhir"
                            aria-describedby="helpId"
                            placeholder=""
                        />
                    </div>
                   </div>
                   <a href="/onboarding" class="btn btn-primary">Kembali</a>
                   <button class="btn btn-success" type="submit">Simpan</button>
                </div>
            </div>
        </div>
    </div>
</div>





@endsection
