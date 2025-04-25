@extends('layouts.master')
@section('title', 'Human Capital Services')

@section('content')
<div class="section">
    <div class="col-12">
        <div class="row">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white py-3">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="mb-0 fw-semibold">Data Admin</h5>
                        <br>
                        <br>
                        <a href="/user/tambah" class="btn btn-sm btn-primary d-flex align-items-center">
                            <i class="bi bi-plus-square me-1"></i> Tambah Admin
                        </a>


                    </div>
                </div>

                <div class="card-body px-0">
                    <div class="table-responsive px-3">
                        <table class="table table-striped table-bordered mb-0" id="table1">
                            <thead class="text-muted small text-uppercase">
                                <tr class="border-bottom">
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Password</th>
                                    <th>Role</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($user as $user)
                                <tr class="border-bottom align-middle hover-shadow-sm">
                                    <td class="fw-medium text-muted">{{ $loop->iteration }}</td>
                                    <td class="fw-semibold">{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td><span class="badge bg-light text-muted">Terenkripsi</span></td>
                                    <td class="text-capitalize">
                                        @if($user->role == 'Admin IN')
                                            <span class="badge bg-primary">{{ $user->role }}</span>
                                        @elseif($user->role == 'Admin Maintenance')
                                            <span class="badge bg-warning text-dark">{{ $user->role }}</span>
                                        @elseif($user->role == 'Admin OUT')
                                            <span class="badge bg-danger">{{ $user->role }}</span>
                                        @else
                                            <span class="badge bg-secondary">{{ $user->role }}</span>
                                        @endif
                                    </td>
                                        <td class="text-center">
                                        <a href="/user/{{ $user->id }}/edit" class="btn btn-sm btn-outline-warning me-1" title="Edit">
                                            <i class="bi bi-pencil-square"></i>
                                        </a>
                                        <button class="btn btn-sm btn-outline-danger delete-btn" data-id="{{ $user->id }}" title="Hapus">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                                @endforeach

                                @if($user->count() === 0)
                                <tr>
                                    <td colspan="6" class="text-center text-muted py-4">
                                        <em>Belum ada data admin yang terdaftar.</em>
                                    </td>
                                </tr>
                                @endif

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
