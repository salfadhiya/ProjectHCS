@extends('layouts.master')
@section('title', 'Edit Rekapan Data Absensi - Human Capital Service')
@section('content')

    <style>
        /* Menata tabel agar teks berada di tengah */
        .table td,
        .table th {
            text-align: center;
            /* Menyusun teks secara horizontal di tengah */
            vertical-align: middle;
            /* Menyusun teks secara vertikal di tengah */
        }
    </style>

    <div class="section">
        <div class="col-12 col-lg-12">
            <div class="row">
                <div class="card">
                    <div class="card-header">
                        <h6>Edit Data Rekapan Maintenance:</h6>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('maintenance.update', $maintenance->peserta->id_peserta) }}" method="POST">
                            @csrf
                            @method('PUT')
                            
                            <!-- Form untuk Nama -->
                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama</label>
                                <input type="text" class="form-control" id="nama" name="nama" value="{{ $maintenance->peserta->onboarding->nama ?? '-' }}" disabled>
                            </div>

                            <!-- Form untuk Presensi -->
                            <div class="mb-3">
                                <label for="presensi" class="form-label">Presensi</label>
                                <input type="text" class="form-control" id="presensi" name="presensi" value="{{ $maintenance->peserta->id_peserta ?? '-' }}" disabled>
                            </div>

                            <!-- Form untuk Status -->
                            <div class="mb-3">
                                <label for="status" class="form-label">Status</label>
                                <input type="text" class="form-control" id="status" name="status" value="{{ $maintenance->peserta->status_keaktifan ?? '-' }}" disabled>
                            </div>

                            <!-- Form untuk Asal Instansi -->
                            <div class="mb-3">
                                <label for="asal_instansi" class="form-label">Asal Instansi</label>
                                <input type="text" class="form-control" id="asal_instansi" name="asal_instansi" value="{{ $maintenance->peserta->onboarding->asal_instansi ?? '-' }}" disabled>
                            </div>

                            <!-- Form untuk Sakit -->
                            <div class="mb-3">
                                <label for="sakit" class="form-label">Sakit</label>
                                <input type="number" class="form-control" id="sakit" name="sakit" value="{{ $maintenance->sakit }}">
                            </div>

                            <!-- Form untuk Izin -->
                            <div class="mb-3">
                                <label for="izin" class="form-label">Izin</label>
                                <input type="number" class="form-control" id="izin" name="izin" value="{{ $maintenance->izin }}">
                            </div>

                            <!-- Form untuk Alfa -->
                            <div class="mb-3">
                                <label for="alfa" class="form-label">Alfa</label>
                                <input type="number" class="form-control" id="alfa" name="alfa" value="{{ $maintenance->alfa }}">
                            </div>

                            <!-- Form untuk Terlambat -->
                            <div class="mb-3">
                                <label for="terlambat" class="form-label">Terlambat</label>
                                <input type="number" class="form-control" id="terlambat" name="terlambat" value="{{ $maintenance->terlambat }}">
                            </div>

                            <!-- Form untuk WFH -->
                            <div class="mb-3">
                                <label for="wfh" class="form-label">WFH</label>
                                <input type="number" class="form-control" id="wfh" name="wfh" value="{{ $maintenance->wfh }}">
                            </div>

                            <!-- Form untuk Project -->
                            <div class="mb-3">
                                <label for="project" class="form-label">Project</label>
                                <input type="text" class="form-control" id="project" name="project" value="{{ $maintenance->project }}">
                            </div>

                            <!-- Form untuk Zumba -->
                            <div class="mb-3">
                                <label for="zumba" class="form-label">Zumba</label>
                                <input type="number" class="form-control" id="zumba" name="zumba" value="{{ $maintenance->zumba }}" disabled>
                            </div>

                            <!-- Form untuk Dhuha -->
                            <div class="mb-3">
                                <label for="dhuha" class="form-label">Dhuha</label>
                                <input type="number" class="form-control" id="dhuha" name="dhuha" value="{{ $maintenance->dhuha }}" disabled>
                            </div>

                            <!-- Form untuk Knowledge Sharing -->
                            <div class="mb-3">
                                <label for="knowledge_sharing" class="form-label">Knowledge Sharing</label>
                                <select class="form-control" id="knowledge_sharing" name="knowledge_sharing">
                                    <option value="yes" {{ $maintenance->sharing === 'yes' ? 'selected' : '' }}>Ya</option>
                                    <option value="no" {{ $maintenance->sharing === 'no' ? 'selected' : '' }}>Tidak</option>
                                </select>
                            </div>

                            <!-- Form untuk Safety Induction -->
                            <div class="mb-3">
                                <label for="safety_induction" class="form-label">Safety Induction</label>
                                <select class="form-control" id="safety_induction" name="safety_induction" disabled>
                                    <option value="yes" {{ $maintenance->saction === 'yes' ? 'selected' : '' }}>Ya</option>
                                    <option value="no" {{ $maintenance->saction === 'no' ? 'selected' : '' }}>Tidak</option>
                                </select>
                            </div>

                            <!-- Form untuk Background Checking -->
                            <div class="mb-3">
                                <label for="background_checking" class="form-label">Background Checking</label>
                                <select class="form-control" id="background_checking" name="background_checking">
                                    <option value="yes" {{ $maintenance->backchecking === 'yes' ? 'selected' : '' }}>Ya</option>
                                    <option value="no" {{ $maintenance->backchecking === 'no' ? 'selected' : '' }}>Tidak</option>
                                </select>
                            </div>

                            <!-- Form untuk Surat Peringatan -->
                            <div class="mb-3">
                                <label for="surat_peringatan" class="form-label">Surat Peringatan</label>
                                <input type="text" class="form-control" id="surat_peringatan" name="surat_peringatan" value="{{ $maintenance->sp ?? '-' }}">
                            </div>

                            <!-- Tombol Submit -->
                            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                            <a href="{{ route('maintenance.index') }}" class="btn btn-secondary">Kembali</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
