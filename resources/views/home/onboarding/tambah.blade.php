@extends('layouts.master')
@section('title', '')
@section('content')

<div class="section">
    <div class="col-12 col-lg-12">
        <div class="row">
            <div class="card">
                <div class="card-header">
                    <br>
                    <h5 class="mb-0 fw-semibold">Tambah Data Peserta Onboarding</h5>
                    <br>
                </div>
                <div class="card-body">
                    <form action="{{ route('onboarding.store') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama</label>
                            <input
                                type="text"
                                class="form-control @error('nama') is-invalid @enderror"
                                name="nama"
                                id="nama"
                                value="{{ old('nama') }}"
                            />
                            @error('nama')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="jurusan" class="form-label">Jurusan</label>
                            <input
                                type="text"
                                class="form-control @error('jurusan') is-invalid @enderror"
                                name="jurusan"
                                id="jurusan"
                                value="{{ old('jurusan') }}"
                            />
                            @error('jurusan')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="no_telp" class="form-label">Nomor Telepon</label>
                            <input
                                type="number"
                                class="form-control @error('no_telp') is-invalid @enderror"
                                name="no_telp"
                                id="no_telp"
                                value="{{ old('no_telp') }}"
                            />
                            @error('no_telp')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="asal_instansi" class="form-label">Asal Instansi</label>
                            <input
                                type="text"
                                class="form-control @error('asal_instansi') is-invalid @enderror"
                                name="asal_instansi"
                                id="asal_instansi"
                                value="{{ old('asal_instansi') }}"
                            />
                            @error('asal_instansi')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="d-flex gap-3">
                            <div class="mb-3">
                                <label for="tanggal_mulai" class="form-label">Tanggal Mulai</label>
                                <input
                                    type="date"
                                    class="form-control @error('tanggal_mulai') is-invalid @enderror"
                                    name="tanggal_mulai"
                                    id="tanggal_mulai"
                                    value="{{ old('tanggal_mulai') }}"
                                />
                                @error('tanggal_mulai')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="tanggal_berakhir" class="form-label">Tanggal Berakhir</label>
                                <input
                                    type="date"
                                    class="form-control @error('tanggal_berakhir') is-invalid @enderror"
                                    name="tanggal_berakhir"
                                    id="tanggal_berakhir"
                                    value="{{ old('tanggal_berakhir') }}"
                                />
                                @error('tanggal_berakhir')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="d-flex justify-content-start">
                            <a href="/onboarding" class="btn btn-outline-secondary me-2">
                                <i class="bi bi-arrow-left-circle me-2"></i>Kembali
                            </a>
                            <button class="btn btn-success" type="submit">
                                <i class="bi bi-save me-2"></i>Simpan Data
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
