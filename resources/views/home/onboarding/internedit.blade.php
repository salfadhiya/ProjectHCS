@extends('layouts.master')
@section('title','Edit Data Onboarding (Private) ')
@section('content')

<div class="section">
    <div class="col-12col-lg-12">
        <div class="row">
            <div class="card">
                <div class="card-header">
                <a href="/onboarding" class="btn btn-primary">Kembali</a>
            </div>
             <div class="card-body">
                <form action="{{ route('onboarding.internupdate', $interninfo->id_apply) }}" method="POST">
                    @csrf
                <div class="mb-3">
                    <label for="nomor_form" class="form-label">Nomor Form</label>
                    <input
                        type="number"
                        class="form-control"
                        name="nomor_form"
                        value="{{$interninfo->nomor_form}}"
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
                        value="{{$interninfo->onboarding->nama}}"
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
                        value="{{$interninfo->onboarding->nis_nim_nip}}"
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
                        value="{{$interninfo->onboarding->kompetensi_keahlian}}"
                        id="kompetensi_keahlian"
                        aria-describedby="helpId"
                        placeholder=""
                    />
                    <small id="helpId" class="form-text text-muted"></small>
                </div>
                <div class="mb-3">
                    <label for="kategori_peserta" class="form-label">Kategori Peserta</label>
                    <select id="kategori_peserta" class="form-control" name="kategori_peserta">
                        <option value="PKL" {{ $interninfo->onboarding->kategori_peserta == 'PKL' ? 'selected' : '' }}>PKL</option>
                        <option value="KP" {{ $interninfo->onboarding->kategori_peserta == 'KP' ? 'selected' : '' }}>KP</option>
                        <option value="TA" {{ $interninfo->onboarding->kategori_peserta == 'TA' ? 'selected' : '' }}>TA</option>
                    </select>
                    <small id="helpId" class="form-text text-muted"></small>
                </div>
                <div class="mb-3">
                    <label for="tanggal_pengajuan" class="form-label">Tanggal Pengajuan</label>
                    <input
                        type="date"
                        class="form-control"
                        name="tanggal_pengajuan"
                        value="{{$interninfo->onboarding->tanggal_pengajuan}}"
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
                        value="{{$interninfo->onboarding->tanggal_mulai}}"
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
                        value="{{$interninfo->onboarding->tanggal_berakhir}}"
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
                        value="{{$interninfo->onboarding->nilai_psikotes}}"
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
                        value="{{$interninfo->onboarding->nilai_wawancara}}"
                        id="nilai_wawancara"
                        aria-describedby="helpId"
                        placeholder=""
                    />
                    <small id="helpId" class="form-text text-muted"></small>
                </div>
                <div class="mb-3">
                    <label for="hasil_seleksi" class="form-label">Hasil Seleksi</label>
                    <select id="hasil_seleksi" class="form-control" name="hasil_seleksi">
                        <option value="lulus" {{ $interninfo->onboarding->hasil_seleksi == 'lulus' ? 'selected' : '' }}>Lulus</option>
                        <option value="tidak_lulus" {{ $interninfo->onboarding->hasil_seleksi == 'tidak_lulus' ? 'selected' : '' }}>Tidak Lulus</option>
                    </select>
                    <small id="helpId" class="form-text text-muted"></small>
                    {{-- <input
                        type="text"
                        class="form-control"
                        name="hasil_seleksi"
                        value="{{$interninfo->onboarding->hasil_seleksi}}"
                        id="hasil_seleksi"
                        aria-describedby="helpId"
                        placeholder=""
                    /> --}}
                    <small id="helpId" class="form-text text-muted"></small>
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Nomor Surat Konfirmasi</label>
                    <input
                        type="text"
                        class="form-control"
                        name="nomor_surat_konfirmasi"
                        value="{{$interninfo->onboarding->nomor_surat_konfirmasi}}"
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
                        value="{{$interninfo->onboarding->tanggal_surat_konfirmasi}}"
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
                        value="{{$interninfo->onboarding->link_surat_konfirmasi}}"
                        id="link_surat_konfirmasi"
                        aria-describedby="helpId"
                        placeholder=""
                    />
                    <small id="helpId" class="form-text text-muted"></small>
                </div>
                    <button class="btn btn-primary" type="submit">Simpan</button>
                </form>
            </div>
            </div>
        </div>
    </div>
</div>







@endsection
