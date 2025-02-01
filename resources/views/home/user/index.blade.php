@extends('layouts.master')
@section('title', 'Admin - Human Capital Servis')
@section('content')

<div class="section">
    <div class="col-12 col-lg-12">
        <div class="row">
            <div class="card">
                <div class="card-header">

                    <a href="/user/tambah" class="btn btn-primary">Tambah Data Admin</a>
                    <br><br>
                    <h6>Berikut data admin :</h6>
                </div>
                <div class="card-body">

                    <table class="table table-stripped " id="table1">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Password</th>
                                <th>Role</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($user as $user)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>encrypted</td>
                                <td>{{$user->role}}</td>
                                <td>
                                    <a href="/user/{{$user->id}}/edit" class="btn btn-warning">Edit</a>
                                    <a href="/user/{{$user->id}}/delete" class="btn btn-danger" onclick= "return confirm('Apa anda yakin akan menghapus data?')">Hapus</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>


                </div>
            </div>
        </div>
    </div>
</div>





@endsection
