@extends('layouts.master')
@section('title', 'Admin - Human Capital Servis')
@section('content')

<div class="section">
    <div class="col-12 col-lg-12">
        <div class="row">
            <div class="card">
                <div class="card-header">

                    <div class="d-flex justify-content-between align-items-center">
                        <h4>Berikut data admin :</h4>
                        <a href="/user/tambah" class="btn btn-primary">Tambah data admin</a>
                    </div>
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
                                    <a href="javascript:void(0)" class="btn btn-danger delete-btn" data-id="{{ $user->id }}">Hapus</a>
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
