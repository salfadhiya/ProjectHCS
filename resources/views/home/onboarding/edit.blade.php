@extends('layouts.master')
@section('title', 'Edit Data Peserta On Boarding')
@section('content')

<div class="section">
    <div class="col-12 col-lg-12">
        <div class="row">
            <div class="card">
                <div class="card-header">
                    <h6>Mohon masukan data dengan benar!</h6>
                </div>
                <div class="card-body">
                <form action="{{ route('onboarding.update', $onboarding->id_apply) }}" method="POST">
                    @csrf
                    @method('PUT')
                   <div class="mb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input
                        type="text"
                        class="form-control"
                        name="nama"
                        value="{{$onboarding->nama}}"
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
                        value="{{$onboarding->jurusan}}"
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
                        value="{{$onboarding->no_telp}}"
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
                        value="{{$onboarding->asal_instansi}}"
                        id="asal_instansi"
                        aria-describedby="helpId"
                        placeholder=""
                    />
                    <small id="helpId" class="form-text text-muted"></small>
                   </div>
                   <div class="mb-3">
                    <label for="tanggal_mulai" class="form-label">Tanggal Mulai</label>
                    <input
                        type="date"
                        class="form-control"
                        name="tanggal_mulai"
                        value="{{$onboarding->tanggal_mulai}}"
                        id="tanggal_mulai"
                        aria-describedby="helpId"
                        placeholder=""
                    />
                    <small id="helpId" class="form-text text-muted"></small>
                   </div>
                   <div class="mb-3">
                    <label for="tanggal_berakhir" class="form-label">Tanggal Berakhir</label>
                    <input
                        type="date"
                        class="form-control"
                        name="tanggal_berakhir"
                        value="{{$onboarding->tanggal_berakhir}}"
                        id="tanggal_berakhir"
                        aria-describedby="helpId"
                        placeholder=""
                    />
                    <small id="helpId" class="form-text text-muted"></small>
                   </div>
                   <a href="/onboarding" class="btn btn-primary">Kembali</a>
                   <button class="btn btn-success" type="submit">Simpan</button>
                </div>
            </div>
        </div>
    </div>
</div>





@endsection
