@extends('layouts.master')
@section('title','Tambah Data Onboarding (Private)')
@section('content')

<div class="section">
    <div class="col-12col-lg-12">
        <div class="row">
            <div class="card">
                <div class="card-header">
            </div>
             <div class="card-body">
                <form action="/onboarding/internsimpan" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="nomor_form" class="form-label">Nomor Form</label>
                    <input
                        type="number"
                        class="form-control"
                        name="nomor_form"
                        id="nomor_form"
                        aria-describedby="helpId"
                        placeholder=""
                    />
                    <small id="helpId" class="form-text text-muted"></small>
                </div>
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
                    <label for="nis_nim_nip" class="form-label">NIS/NIM/NIP</label>
                    <input
                        type="number"
                        class="form-control"
                        name="nis_nim_nip"
                        id="nis_nim_nip"
                        aria-describedby="helpId"
                        placeholder=""
                    />
                    <small id="helpId" class="form-text text-muted"></small>
                </div>
                <div class="mb-3">
                    <label for="kompetensi_keahlian" class="form-label">Kompetensi Keahlian</label>
                    <input
                        type="text"
                        class="form-control"
                        name="kompetensi_keahlian"
                        id="kompetensi_keahlian"
                        aria-describedby="helpId"
                        placeholder=""
                    />
                    <small id="helpId" class="form-text text-muted"></small>
                </div>
                <div class="mb-3">
                    <label for="kategori_peserta" class="form-label">Kategori Peserta</label>
                    <select id="kategori_peserta" class="form-control" name="kategori_peserta">
                            <option selected>PKL</option>
                            <option>KP</option>
                            <option>TA</option>
                    </select>
                    <small id="helpId" class="form-text text-muted"></small>
                </div>
                <div class="mb-3">
                    <label for="tanggal_pengajuan" class="form-label">Tanggal Pengajuan</label>
                    <input
                        type="date"
                        class="form-control"
                        name="tanggal_pengajuan"
                        id="tanggal_pengajuan"
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
                        id="tanggal_berakhir"
                        aria-describedby="helpId"
                        placeholder=""
                    />
                    <small id="helpId" class="form-text text-muted"></small>
                </div>
                <div class="mb-3">
                    <label for="nilai_psikotes" class="form-label">Nilai Psikotes</label>
                    <input
                        type="number"
                        class="form-control"
                        name="nilai_psikotes"
                        id="nilai_psikotes"
                        aria-describedby="helpId"
                        placeholder=""
                    />
                    <small id="helpId" class="form-text text-muted"></small>
                </div>
                <div class="mb-3">
                    <label for="nilai_wawancara" class="form-label">Nilai Wawancara</label>
                    <input
                        type="number"
                        class="form-control"
                        name="nilai_wawancara"
                        id="nilai_wawancara"
                        aria-describedby="helpId"
                        placeholder=""
                    />
                    <small id="helpId" class="form-text text-muted"></small>
                </div>
                <div class="mb-3">
                    <label for="hasil_seleksi" class="form-label">Hasil Seleksi</label>
                    <select id="hasil_seleksi" class="form-control" name="hasil_seleksi">
                        <option value="">Pilih</option>
                        <option value="lulus">lulus</option>
                        <option value="tidak lulus">tidak lulus</option>
                    </select>
                    <small id="helpId" class="form-text text-muted"></small>
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Nomor Surat Konfirmasi</label>
                    <input
                        type="text"
                        class="form-control"
                        name="nomor_surat_konfirmasi"
                        id="nomor_surat_konfirmasi"
                        aria-describedby="helpId"
                        placeholder=""
                    />
                    <small id="helpId" class="form-text text-muted"></small>
                </div>
                <div class="mb-3">
                    <label for="tanggal_surat_konfirmasi" class="form-label">Tanggal Surat Konfirmasi</label>
                    <input
                        type="date"
                        class="form-control"
                        name="tanggal_surat_konfirmasi"
                        id="tanggal_surat_konfirmasi"
                        aria-describedby="helpId"
                        placeholder=""
                    />
                    <small id="helpId" class="form-text text-muted"></small>
                </div>
                <div class="mb-3">
                    <label for="link_surat_konfirmasi" class="form-label">Link Surat Konfirmasi</label>
                    <input
                        type="text"
                        class="form-control"
                        name="link_surat_konfirmasi"
                        id="link_surat_konfirmasi"
                        aria-describedby="helpId"
                        placeholder=""
                    />
                    <small id="helpId" class="form-text text-muted"></small>
                </div>
                <a href="/onboarding/{id}/interninfo" class="btn btn-primary">Kembali</a>
                    <button class="btn btn-success" type="submit">Simpan</button>
                </form>
            </div>
            </div>
        </div>
    </div>
</div>







@endsection
