@extends('layouts.master')
@section('title', 'Edit Rekapan Data Absensi - Human Capital Service')
@section('content')

<style>
    .table td, .table th {
        text-align: center;
        vertical-align: middle;
    }
</style>

<div class="section">
    <div class="col-12 col-lg-12">
        <div class="row">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white">
                    <h6 class="fw-bold">Edit Data Rekapan Maintenance</h6>
                </div>

                <div class="card-body">
                    <form action="{{ route('maintenance.update', $maintenance->peserta->id_peserta) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="row g-3">
                            {{-- Data Peserta --}}
                            <div class="col-md-6">
                                <label for="nama" class="form-label fw-semibold">Nama</label>
                                <input type="text" class="form-control" id="nama" value="{{ $maintenance->peserta->onboarding->nama ?? '-' }}" disabled>
                            </div>
                            <div class="col-md-6">
                                <label for="presensi" class="form-label fw-semibold">Presensi</label>
                                <input type="text" class="form-control" id="presensi" value="{{ $maintenance->peserta->id_peserta ?? '-' }}" disabled>
                            </div>
                            <div class="col-md-6">
                                <label for="status" class="form-label fw-semibold">Status</label>
                                <input type="text" class="form-control" id="status" value="{{ $maintenance->peserta->status_keaktifan ?? '-' }}" disabled>
                            </div>
                            <div class="col-md-6">
                                <label for="asal_instansi" class="form-label fw-semibold">Asal Instansi</label>
                                <input type="text" class="form-control" id="asal_instansi" value="{{ $maintenance->peserta->onboarding->asal_instansi ?? '-' }}" disabled>
                            </div>

                            <hr class="my-4">

                            {{-- Data Absensi --}}
                            <div class="col-12">
                                <h6 class="fw-bold mb-3">Rekap Absensi</h6>
                            </div>

                            {{-- 4 kolom per baris --}}
                            <div class="col-md-3">
                                <label for="sakit" class="form-label">Sakit</label>
                                <input type="number" class="form-control" id="sakit" name="sakit" value="{{ $maintenance->sakit }}">
                            </div>
                            <div class="col-md-3">
                                <label for="izin" class="form-label">Izin</label>
                                <input type="number" class="form-control" id="izin" name="izin" value="{{ $maintenance->izin }}">
                            </div>
                            <div class="col-md-3">
                                <label for="alfa" class="form-label">Alfa</label>
                                <input type="number" class="form-control" id="alfa" name="alfa" value="{{ $maintenance->alfa }}">
                            </div>
                            <div class="col-md-3">
                                <label for="terlambat" class="form-label">Terlambat</label>
                                <input type="number" class="form-control" id="terlambat" name="terlambat" value="{{ $maintenance->terlambat }}">
                            </div>

                            <div class="col-md-3">
                                <label for="wfh" class="form-label">WFH</label>
                                <input type="number" class="form-control" id="wfh" name="wfh" value="{{ $maintenance->wfh }}">
                            </div>
                            <div class="col-md-3">
                                <label for="project" class="form-label">Project</label>
                                <input type="text" class="form-control" id="project" name="project" value="{{ $maintenance->project }}">
                            </div>
                            <div class="col-md-3">
                                <label for="zumba" class="form-label">Zumba</label>
                                <input type="number" class="form-control" id="zumba" name="zumba" value="{{ $maintenance->zumba }}" disabled>
                            </div>
                            <div class="col-md-3">
                                <label for="dhuha" class="form-label">Dhuha</label>
                                <input type="number" class="form-control" id="dhuha" name="dhuha" value="{{ $maintenance->dhuha }}" disabled>
                            </div>

                            <hr class="my-4">

                            {{-- Data Tambahan --}}
                            <div class="col-md-6">
                                <label for="knowledge_sharing" class="form-label">Knowledge Sharing</label>
                                <select class="form-select" id="knowledge_sharing" name="knowledge_sharing">
                                    <option value="yes" {{ $maintenance->sharing === 'yes' ? 'selected' : '' }}>Ya</option>
                                    <option value="no" {{ $maintenance->sharing === 'no' ? 'selected' : '' }}>Tidak</option>
                                </select>
                            </div>

                            <div class="col-md-6">
                                <label for="safety_induction" class="form-label">Safety Induction</label>
                                <select class="form-select" id="safety_induction" name="safety_induction" >
                                    <option value="yes" {{ $maintenance->saction === 'yes' ? 'selected' : '' }}>Ya</option>
                                    <option value="no" {{ $maintenance->saction === 'no' ? 'selected' : '' }}>Tidak</option>
                                </select>
                            </div>

                            <div class="col-md-6">
                                <label for="background_checking" class="form-label">Background Checking</label>
                                <select class="form-select" id="background_checking" name="background_checking">
                                    <option value="yes" {{ $maintenance->backchecking === 'yes' ? 'selected' : '' }}>Ya</option>
                                    <option value="no" {{ $maintenance->backchecking === 'no' ? 'selected' : '' }}>Tidak</option>
                                </select>
                            </div>

                            <div class="col-md-6">
                                <label for="surat_peringatan" class="form-label">Surat Peringatan</label>
                                <input type="text" class="form-control" id="surat_peringatan" name="surat_peringatan" value="{{ $maintenance->sp ?? '-' }}">
                            </div>

                            <div class="col-12 d-flex justify-content-end mt-4">
                                <button type="submit" class="btn btn-primary me-2">Simpan Perubahan</button>
                                <a href="{{ route('maintenance.index') }}" class="btn btn-secondary">Kembali</a>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
