@extends('layouts.master')
@section('title', 'Edit Admin Human Capital Servis')
@section('content')

<div class="section">
    <div class="col-12 col-lg-12">
        <div class="row">
            <div class="card">
                <div class="card-header">
                    <h6>Edit data admin: </h6>

                </div>
                <div class="card-body">

                    <form action="/user/{{$user->id}}/update" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="" class="form-label">Name</label>
                            <input
                                type="text"
                                class="form-control"
                                name="name"
                                id="name"
                                aria-describedby="helpId"
                                placeholder=""
                                value="{{$user->name}}"
                            />
                        </div>

                        <div class="mb-3">
                            <label for="" class="form-label">Email</label>
                            <input
                                type="email"
                                class="form-control"
                                name="email"
                                id="email"
                                aria-describedby="helpId"
                                placeholder=""
                                value="{{$user->email}}"
                            />
                        </div>

                        <div class="mb-3">
                            <input
                                type="password"
                                class="form-control"
                                name="password"
                                id="password"
                                aria-describedby="helpId"
                                placeholder=""
                                value="{{$user->password}}"
                                hidden
                            />
                        </div>

                        <div class="mb-3">
                            <label for="role" class="form-label">Role</label>
                            <select class="form-select" name="role" id="role">
                                <option value="Admin General" {{ $user->role == 'Admin General' ? 'selected' : '' }}>Admin General</option>
                                <option value="Admin IN" {{ $user->role == 'Admin IN' ? 'selected' : '' }}>Admin IN</option>
                                <option value="Admin Maintenance" {{ $user->role == 'Admin Maintenance' ? 'selected' : '' }}>Admin Maintenance</option>
                                <option value="Admin OUT" {{ $user->role == 'Admin OUT' ? 'selected' : '' }}>Admin OUT</option>
                            </select>
                        </div>

                        <a href="/user" class="btn btn-secondary">Kembali</a>
                        <button class="btn btn-primary" type="submit">Update</button>

                    </form>


                </div>
            </div>
        </div>
    </div>
</div>





@endsection
