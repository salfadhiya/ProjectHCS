@extends('layouts.master')
@section('title', 'Human Capital Servis')
@section('content')

<div class="section">
    <div class="col-12 col-lg-12">
        <div class="row">
            <div class="card">
                <div class="card-header">
                    <h6>Lengkapi data peserta :</h6>

                </div>
                <div class="card-body">

                    <form action="/peserta/{{$peserta->id_peserta}}/update" method="post">
                        @csrf

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="id_peserta" value="{{$peserta->id_peserta}}" readonly>
                            <label>ID Presensi</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="number" class="form-control" name="id_apply" value="{{$peserta->id_apply}}" >
                            <label>ID Apply</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="number" class="form-control" name="nomor_kartu" value="{{$peserta->nomor_kartu}}" >
                            <label>Nomor Kartu</label>
                        </div>

                        <div class="form-floating mb-3 d-flex">
                            <div class="w-50 me-2">
                                <label>Status Keaktifan</label>
                                <select name="status_keaktifan" class="form-select">
                                    <option value="" {{ old('status_keaktifan', $peserta->status_keaktifan) == '' ? 'selected' : '' }}>Pilih</option>
                                    <option value="aktif" {{ old('status_keaktifan', $peserta->status_keaktifan) == 'aktif' ? 'selected' : '' }}>Aktif</option>
                                    <option value="tidak aktif" {{ old('status_keaktifan', $peserta->status_keaktifan) == 'tidak aktif' ? 'selected' : '' }}>Tidak Aktif</option>
                                </select>
                            </div>


                            <div class="w-50">
                                <label>Status Kepesertaan</label>
                                <select name="status_kepesertaan" class="form-select">
                                    <option value="" {{ old('status_kepesertaan', $peserta->status_kepesertaan) == '' ? 'selected' : '' }}>Pilih</option>
                                    <option value="pkl" {{ old('status_kepesertaan', $peserta->status_kepesertaan) == 'pkl' ? 'selected' : '' }}>PKL</option>
                                    <option value="kp" {{ old('status_kepesertaan', $peserta->status_kepesertaan) == 'kp' ? 'selected' : '' }}>KP</option>
                                    <option value="ta" {{ old('status_kepesertaan', $peserta->status_kepesertaan) == 'ta' ? 'selected' : '' }}>ta</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-floating mb-3">
                            <select name="jk" class="form-select">
                                <option value="" {{ old('jk', $peserta->jk) == '' ? 'selected' : '' }}>Pilih</option>
                                <option value="laki laki" {{ old('jk', $peserta->jk) == 'laki laki' ? 'selected' : '' }}>Laki-laki</option>
                                <option value="perempuan" {{ old('jk', $peserta->jk) == 'perempuan' ? 'selected' : '' }}>Perempuan</option>
                            </select>
                            <label>Jenis Kelamin</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="gdg_penempatan" value="{{$peserta->gdg_penempatan}}" >
                            <label>Gedung Penempatan</label>
                        </div>

                        <div class="form-floating mb-3 d-flex">
                            <div class="w-50 me-2">
                                <label>Pembimbing Perusahaan</label>
                                <input type="text" class="form-control" name="pembimbing_perusahaan" value="{{$peserta->pembimbing_perusahaan}}" >
                            </div>

                            <div class="w-50">
                                <label>Unit Penempatan</label>
                                <input type="text" class="form-control" name="unit_penempatan" value="{{$peserta->unit_penempatan}}" >
                            </div>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="jenis_pekerjaan" value="{{$peserta->jenis_pekerjaan}}" >
                            <label>Jenis Pekerjaan</label>
                        </div>

                        <div class="form-floating mb-3">
                            <select name="reguler_msib" class="form-select" >
                                <option value="Reguler" {{ $peserta->reguler_msib == 'Reguler' ? 'selected' : '' }}>Reguler</option>
                                <option value="MSIB" {{ $peserta->reguler_msib == 'MSIB' ? 'selected' : '' }}>MSIB</option>
                                <option value="Magenta" {{ $peserta->reguler_msib == 'Magenta' ? 'selected' : '' }}>Magenta</option>
                            </select>
                            <label>Reguler / MSIB / Magenta</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="email" class="form-control" name="email" value="{{$peserta->email}}" >
                            <label>Email</label>
                        </div>

                        {{-- <div class="col">
                            <div class="form-group">
                                <label>Bulan Berakhir</label>
                                <input list="bulan" name="bulan_berakhir" class="form-control" value="{{$peserta->bulan_berakhir}}" >
                                <datalist id="bulan">
                                    <option value="Januari">
                                    <option value="Februari">
                                    <option value="Maret">
                                    <option value="April">
                                    <option value="Mei">
                                    <option value="Juni">
                                    <option value="Juli">
                                    <option value="Agustus">
                                    <option value="September">
                                    <option value="Oktober">
                                    <option value="November">
                                    <option value="Desember">
                                </datalist>
                            </div>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="number" class="form-control" name="tahun_berakhir" value="{{$peserta->tahun_berakhir}}" >
                            <label>Tahun Berakhir</label>
                        </div> --}}

                        <div class="row">
                            <!-- Bulan Berakhir -->
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <input
                                        type="month"
                                        class="form-control @error('bulan_berakhir') is-invalid @enderror"
                                        name="bulan_berakhir"
                                        id="bulan_berakhir"
                                        value="{{$peserta->bulan_berakhir}}"
                                        placeholder="Pilih Bulan Berakhir">
                                    <label for="bulan_berakhir">Bulan Berakhir</label>
                                    @error('bulan_berakhir')
                                        <div class="invalid-feedback">*{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Tahun Berakhir -->
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <input
                                        type="number"
                                        class="form-control @error('tahun_berakhir') is-invalid @enderror"
                                        name="tahun_berakhir"
                                        id="tahun_berakhir"
                                        value="{{$peserta->tahun_berakhir}}"
                                        placeholder="Masukkan Tahun Berakhir"
                                        min="2000" max="2099" step="1">
                                    <label for="tahun_berakhir">Tahun Berakhir</label>
                                    @error('tahun_berakhir')
                                        <div class="invalid-feedback">*{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                          <!-- Tombol Submit -->
                    <div class="d-flex justify-content-start">
                        <a href="/peserta" class="btn btn-outline-secondary me-2">
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
