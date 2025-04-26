@extends('layouts.master')
@section('title', 'Human Capital Services')

@section('content')

<div class="section py-4 px-3">
    <h4 class="fw-semibold mb-4">Statistik Terkini</h4>

    {{-- Statistik Kartu --}}
    <div class="row g-3 mb-5">
        <div class="col-md-3">
            <div class="card shadow-sm border-0">
                <div class="card-body d-flex align-items-center">
                    <div class="bg-light rounded-circle p-3 me-3">
                        <i class="bi bi-people-fill fs-4 text-primary"></i>
                    </div>
                    <div>
                        <p class="mb-0 small text-muted">Peserta Aktif</p>
                        <h5 class="fw-bold">112.000</h5>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card shadow-sm border-0">
                <div class="card-body d-flex align-items-center">
                    <div class="bg-light rounded-circle p-3 me-3">
                        <i class="bi bi-person-plus-fill fs-4 text-success"></i>
                    </div>
                    <div>
                        <p class="mb-0 small text-muted">Peserta IN</p>
                        <h5 class="fw-bold">183.000</h5>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card shadow-sm border-0">
                <div class="card-body d-flex align-items-center">
                    <div class="bg-light rounded-circle p-3 me-3">
                        <i class="bi bi-person-dash-fill fs-4 text-danger"></i>
                    </div>
                    <div>
                        <p class="mb-0 small text-muted">Peserta OUT</p>
                        <h5 class="fw-bold">80.000</h5>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card shadow-sm border-0">
                <div class="card-body d-flex align-items-center">
                    <div class="bg-light rounded-circle p-3 me-3">
                        <i class="bi bi-bookmark-fill fs-4 text-warning"></i>
                    </div>
                    <div>
                        <p class="mb-0 small text-muted">Saved Post</p>
                        <h5 class="fw-bold">112</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Data Admin --}}
    <div class="card border-0 shadow-sm">
        <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center">
            <h5 class="mb-0 fw-semibold">Data Admin</h5>
            <br>
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
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($user as $admin)
                        <tr class="align-middle">
                            <td class="fw-medium text-muted">{{ $loop->iteration }}</td>
                            <td class="fw-semibold">{{ $admin->name }}</td>
                            <td>{{ $admin->email }}</td>
                            <td><span class="badge bg-light text-muted">Terenkripsi</span></td>
                            <td>
                                @if($admin->role == 'Admin IN')
                                    <span class="badge bg-primary">{{ $admin->role }}</span>
                                @elseif($admin->role == 'Admin Maintenance')
                                    <span class="badge bg-warning text-dark">{{ $admin->role }}</span>
                                @elseif($admin->role == 'Admin OUT')
                                    <span class="badge bg-danger">{{ $admin->role }}</span>
                                @else
                                    <span class="badge bg-secondary">{{ $admin->role }}</span>
                                @endif
                            </td>

                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="text-center text-muted py-4">
                                <em>Belum ada data admin yang terdaftar.</em>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection
