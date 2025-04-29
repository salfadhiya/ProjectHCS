@extends('layouts.master')
@section('title', 'Human Capital Servis')
@section('content')

<div class="section">
    <div class="col-12 col-lg-12">
        <div class="row">
            <div class="card">
                <div class="card-header">
                    <h6>Edit Status peserta :</h6>

                </div>
                <div class="card-body">

                    <form action="/peserta/{{$peserta->id_peserta}}/update" method="post">
                        @csrf

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="id_peserta" value="{{$peserta->id_peserta}}" readonly>
                            <label>ID Presensi</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="number" class="form-control" name="id_apply" value="{{$peserta->id_apply}}" hidden>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="number" class="form-control" name="nomor_kartu" value="{{$peserta->nomor_kartu}}" hidden >
                        </div>

                        <div class="form-floating mb-3">
                            <div class="w-50 me-2">
                                <label>Status Keaktifan</label>
                                <select name="status_keaktifan" class="form-select">
                                    <option value="" {{ old('status_keaktifan', $peserta->status_keaktifan) == '' ? 'selected' : '' }}>Pilih</option>
                                    <option value="aktif" {{ old('status_keaktifan', $peserta->status_keaktifan) == 'aktif' ? 'selected' : '' }}>Aktif</option>
                                    <option value="tidak aktif" {{ old('status_keaktifan', $peserta->status_keaktifan) == 'tidak aktif' ? 'selected' : '' }}>Tidak Aktif</option>
                                </select>
                            </div>


                            <div class="w-50">
                                <select name="status_kepesertaan" class="form-select" hidden>
                                    <option value="" {{ old('status_kepesertaan', $peserta->status_kepesertaan) == '' ? 'selected' : '' }}>Pilih</option>
                                    <option value="pkl" {{ old('status_kepesertaan', $peserta->status_kepesertaan) == 'pkl' ? 'selected' : '' }}>PKL</option>
                                    <option value="kp" {{ old('status_kepesertaan', $peserta->status_kepesertaan) == 'kp' ? 'selected' : '' }}>KP</option>
                                    <option value="ta" {{ old('status_kepesertaan', $peserta->status_kepesertaan) == 'ta' ? 'selected' : '' }}>TA</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-floating mb-3">
                            <select name="jk" class="form-select" hidden>
                                <option value="" {{ old('jk', $peserta->jk) == '' ? 'selected' : '' }}>Pilih</option>
                                <option value="laki laki" {{ old('jk', $peserta->jk) == 'laki laki' ? 'selected' : '' }}>Laki-laki</option>
                                <option value="perempuan" {{ old('jk', $peserta->jk) == 'perempuan' ? 'selected' : '' }}>Perempuan</option>
                            </select>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="gdg_penempatan" value="{{$peserta->gdg_penempatan}}" hidden >
                        </div>

                        <div class="form-floating mb-3 d-flex">
                            <div class="w-50 me-2">
                                <input type="text" class="form-control" name="pembimbing_perusahaan" value="{{$peserta->pembimbing_perusahaan}}" hidden >
                            </div>

                            <div class="w-50">
                                <input type="text" class="form-control" name="unit_penempatan" value="{{$peserta->unit_penempatan}}" hidden >
                            </div>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="jenis_pekerjaan" value="{{$peserta->jenis_pekerjaan}}" hidden >
                        </div>

                        <div class="form-floating mb-3">
                            <select name="reguler_msib" class="form-select" hidden >
                                <option value="Reguler" {{ $peserta->reguler_msib == 'Reguler' ? 'selected' : '' }}>Reguler</option>
                                <option value="MSIB" {{ $peserta->reguler_msib == 'MSIB' ? 'selected' : '' }}>MSIB</option>
                                <option value="Magenta" {{ $peserta->reguler_msib == 'Magenta' ? 'selected' : '' }}>Magenta</option>
                            </select>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="email" class="form-control" name="email" value="{{$peserta->email}}" hidden >
                        </div>

                        <div class="col">
                            <div class="form-group">
                                <input list="bulan" name="bulan_berakhir" class="form-control" value="{{$peserta->bulan_berakhir}}" hidden >
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
                            <input type="number" class="form-control" name="tahun_berakhir" value="{{$peserta->tahun_berakhir}}" hidden >
                        </div>

                        <a href="/peserta" class="btn btn-primary">Kembali</a>
                        <button class="btn btn-success" type="submit">Simpan Perubahan</button>

                    </form>


                </div>
            </div>
        </div>
    </div>
</div>





@endsection
