@extends('layouts.master')
@section('title', 'Tambah Peserta Aktif - Admin Human Capital Servis')
@section('content')


<div class="section">
    <div class="col-12 col-lg-12">
        <div class="row">
            <div class="card">
                <div class="card-header">
                    <h6>Tambah data peserta :</h6>

                </div>
                <div class="card-body">

                    <form action="/peserta/simpan" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label for="" class="form-label">ID Apply - Nama</label>
                            <select class="form-control" name="id_apply" id="id_apply">
                                @foreach ($onboarding as $item)
                                    <option value="{{ $item->id_apply }}">{{ $item->id_apply }} - {{ $item->nama }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-floating mb-3">
                            <input  type="number" class="form-control" id="floatingInput" name="nomor_kartu"
                                placeholder="Masukkan Nomor Kartu">
                            <label for="floatingInput">Nomor Kartu</label>
                        </div>

                        <div class="form-floating mb-3 d-flex">
                            <div class="w-50 me-2">
                                <label for="status_keaktifan">Status Keaktifan</label>
                                <select name="status_keaktifan" class="form-select @error('status_keaktifan') is-invalid @enderror">
                                    <option value="">Pilih</option>
                                    <option value="aktif">Aktif</option>
                                    <option value="tidak aktif">Tidak Aktif</option>
                                </select>
                                @error('status_keaktifan')
                                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="w-50">
                                <label for="status_kepesertaan">Status Kepesertaan</label>
                                <select name="status_kepesertaan" class="form-select @error('status_kepesertaan') is-invalid @enderror">
                                    <option value="">Pilih</option>
                                    <option value="PKL">PKL</option>
                                    <option value="KP">KP</option>
                                    <option value="TA">TA</option>
                                </select>
                                @error('status_kepesertaan')
                                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                            <div class="form-floating mb-3">
                            <select name="jk" class="form-select @error('jk') is-invalid @enderror">
                                <option value="">Pilih</option>
                                <option value="laki laki">Laki-Laki</option>
                                <option value="perempuan">Perempuan</option>
                            </select>
                            <label for="jk">Jenis Kelamin</label>
                            @error('jk')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <input  type="text" class="form-control" id="floatingInput" name="gdg_penempatan"
                                placeholder="Masukkan Gedung Penempatan">
                            <label for="floatingInput">Gedung Penempatan</label>
                        </div>

                        <div class="form-floating mb-3 d-flex">
                            <div class="w-50 me-2">
                                <label for="floatingInput">Pembimbing Perusahaan</label>
                                <input  type="text" class="form-control" id="floatingInput" name="pembimbing_perusahaan"
                                    placeholder="Masukkan Nama Pembimbing Perusahaan">
                            </div>

                            <div class="w-50 me-2">
                                <label for="floatingInput">Unit Penempatan</label>
                                <input  type="text" class="form-control" id="floatingInput" name="unit_penempatan"
                                    placeholder="Masukkan Unit Penempatan">
                            </div>

                            <div class="w-50">
                                <label for="floatingInput">Jenis Pekerjaan</label>
                                <input  type="text" class="form-control" id="floatingInput" name="jenis_pekerjaan"
                                    placeholder="Masukkan Jenis Pekerjaan">
                            </div>
                        </div>

                        <div class="form-floating mb-3">
                            <select name="reguler_msib" class="form-select @error('reguler_msib') is-invalid @enderror"
                                    id="floatingSelect" aria-label="Floating label select example">
                                <option value="">Pilih</option>
                                <option value="Reguler">Reguler</option>
                                <option value="MSIB">MSIB</option>
                                <option value="Magenta">Magenta</option>
                            </select>
                            <label for="floatingSelect">Reguler / MSIB / Magenta</label>

                            @error('reguler_msib')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-floating mb-3">
                            <input  type="email" class="form-control" id="floatingInput" name="email"
                                placeholder="Masukkan Email">
                            <label for="floatingInput">Email</label>
                        </div>

                        <a href="/peserta" class="btn btn-primary">Kembali</a>
                        <button class="btn btn-success" type="submit">Simpan Data</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
