@extends('layouts.master')
@section('title', 'Tambah Admin - Human Capital Servis')
@section('content')

<div class="section">
    <div class="col-12 col-lg-12">
        <div class="row">
            <div class="card">
                <div class="card-header">
                    <h6>Tambah data admin :</h6>

                </div>
                <div class="card-body">

                    <form action="/user/simpan" method="POST">
                        @csrf
                        <div class="form-floating mb-3">
                            <input required type="text" class="form-control" id="floatingInput" name="name"
                                placeholder="Masukkan Nama">
                            <label for="floatingInput">Nama</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input required type="email" class="form-control" id="floatingInput" name="email"
                                placeholder="name@example.com">
                            <label for="floatingInput">Email address</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input required type="password" class="form-control" id="floatingPassword" name="password"
                                placeholder="Password">
                            <label for="floatingPassword">Password</label>
                        </div>

                        <div class="form-floating mb-3">
                            <select required name="role" class="form-select" id="floatingSelect"
                                aria-label="Floating label select example">
                                <option selected>Pilih</option>
                                <option value="Admin General">Admin General</option>
                                <option value="Admin IN">Admin IN</option>
                                <option value="Admin Maintenace">Admin Maintenace</option>
                                <option value="Admin OUT">Admin OUT</option>
                            </select>
                            <label for="floatingSelect">Role</label>
                        </div>

                        <a href="/user" class="btn btn-primary">Kembali</a>
                        <button class="btn btn-success" type="submit">Simpan Data</button>

                    </form>


                </div>
            </div>
        </div>
    </div>
</div>





@endsection
