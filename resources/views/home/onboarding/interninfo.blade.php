@extends('layouts.master')
@section('title', 'Human Capital Service')
@section('content')

<div class="section">
    <div class="row">
        <div class="col-12 mb-4">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white d-flex justify-content-between align-items-center">
                    <h5 class="mb-0 fw-semibold text-uppercase">Data Peserta OnBoarding Private</h5>
                    <div class="d-flex gap-2">
                        <a href="{{ url('/onboarding') }}" class="btn btn-outline-secondary btn-sm">
                            <i class="bx bx-arrow-back"></i> Kembali
                        </a>
                        <button form="form-update" type="submit" class="btn btn-primary btn-sm">
                            <i class="bx bx-edit-alt"></i> Lengkapi Data
                        </button>
                    </div>
                </div>

                <div class="card-body">
                    <form id="form-update" action="{{ route('onboarding.internupdate', $interninfo->id_apply) }}" method="POST">
                        @csrf
                        <div class="row g-4">
                            {{-- Kolom Kiri --}}
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label class="form-label fw-semibold">ID Apply</label>
                                    <input type="text" class="form-control" value="{{ $interninfo->id_apply }}" readonly>
                                </div>
                                <div class="form-group mb-3">
                                    <label class="form-label fw-semibold">Nama</label>
                                    <input type="text" class="form-control" value="{{ $interninfo->onboarding->nama }}" readonly>
                                </div>
                                <div class="form-group mb-3">
                                    <label class="form-label fw-semibold">NIS/NIM/NIP</label>
                                    <input type="text" class="form-control" name="nis_nim_nip" value="{{ $interninfo->nis_nim_nip }}">
                                </div>
                                <div class="form-group mb-3">
                                    <label class="form-label fw-semibold">Jurusan</label>
                                    <input type="text" class="form-control" value="{{ $interninfo->onboarding->jurusan }}" readonly>
                                </div>
                                <div class="form-group mb-3">
                                    <label class="form-label fw-semibold">Kategori Peserta</label>
                                    <select id="kategori_peserta" name="kategori_peserta" class="form-select">
                                        <option value="PKL" {{ $interninfo->onboarding->kategori_peserta == 'PKL' ? 'selected' : '' }}>PKL</option>
                                        <option value="KP" {{ $interninfo->onboarding->kategori_peserta == 'KP' ? 'selected' : '' }}>KP</option>
                                        <option value="TA" {{ $interninfo->onboarding->kategori_peserta == 'TA' ? 'selected' : '' }}>TA</option>
                                    </select>
                                </div>
                                <div class="form-group mb-3">
                                    <label class="form-label fw-semibold">Tanggal Pengajuan</label>
                                    <input type="date" class="form-control" name="tanggal_pengajuan" value="{{ $interninfo->tanggal_pengajuan }}">
                                </div>
                                <div class="form-group mb-3">
                                    <label class="form-label fw-semibold">Tanggal Mulai</label>
                                    <input type="date" class="form-control" name="tanggal_mulai" value="{{ $interninfo->tanggal_mulai }}">
                                </div>
                                <div class="form-group mb-3">
                                    <label class="form-label fw-semibold">Tanggal Berakhir</label>
                                    <input type="date" class="form-control" name="tanggal_berakhir" value="{{ $interninfo->tanggal_berakhir }}">
                                </div>
                            </div>

                            {{-- Kolom Kanan --}}
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label class="form-label fw-semibold">Nilai Psikotes</label>
                                    <input type="text" class="form-control" name="nilai_psikotes" value="{{ $interninfo->nilai_psikotes }}">
                                </div>
                                <div class="form-group mb-3">
                                    <label class="form-label fw-semibold">Nilai Wawancara</label>
                                    <input type="text" class="form-control" name="nilai_wawancara" value="{{ $interninfo->nilai_wawancara }}">
                                </div>
                                <div class="form-group mb-3">
                                    <label class="form-label fw-semibold">Hasil Seleksi</label>
                                    <input type="text" class="form-control" name="hasil_seleksi" value="{{ $interninfo->hasil_seleksi }}">
                                </div>
                                <div class="form-group mb-3">
                                    <label class="form-label fw-semibold">Nomor Surat Konfirmasi</label>
                                    <input type="text" class="form-control" name="nomor_surat_konfirmasi" value="{{ $interninfo->nomor_surat_konfirmasi }}">
                                </div>
                                <div class="form-group mb-3">
                                    <label class="form-label fw-semibold">Tanggal Surat Konfirmasi</label>
                                    <input type="date" class="form-control" name="tanggal_surat_konfirmasi" value="{{ $interninfo->tanggal_surat_konfirmasi }}">
                                </div>
                                <div class="form-group mb-3">
                                    <label class="form-label fw-semibold">Link Surat Konfirmasi</label>
                                    @if($interninfo->link_surat_konfirmasi)
                                        <a href="{{ $interninfo->link_surat_konfirmasi }}" target="_blank" class="btn btn-outline-primary w-100">
                                            Lihat Surat
                                        </a>
                                    @else
                                        <input type="text" class="form-control" value="Tidak Ada" readonly>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </form>
                </div> <!-- end card-body -->
            </div> <!-- end card -->
        </div>
    </div>
</div>

@endsection
