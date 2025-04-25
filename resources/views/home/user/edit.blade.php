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

                    <form action="/user/{{$user->id}}/update" method="post" id="editAdminForm">
                        @csrf

                        <!-- Nama -->
                        <div class="mb-3">
                            <label for="name" class="form-label">Nama</label>
                            <input
                                type="text"
                                class="form-control"
                                name="name"
                                id="name"
                                value="{{$user->name}}"
                            />
                            <div class="invalid-feedback" id="nameError">*Nama lengkap harus diisi.</div>
                        </div>

                        <!-- Email -->
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input
                                type="email"
                                class="form-control"
                                name="email"
                                id="email"
                                value="{{$user->email}}"
                            />
                            <div class="invalid-feedback" id="emailError">*Silakan masukkan email yang valid.</div>
                        </div>

                        <!-- Password -->
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input
                                type="password"
                                class="form-control"
                                name="password"
                                id="password"
                                placeholder="Isi jika ingin mengganti password"
                            />
                            <div class="invalid-feedback" id="passwordError">*Password tidak boleh kosong.</div>
                        </div>

                        <!-- Role -->
                        <div class="mb-3">
                            <label for="role" class="form-label">Role</label>
                            <select class="form-select" name="role" id="role">
                                <option value="Admin General" {{ $user->role == 'Admin General' ? 'selected' : '' }}>Admin General</option>
                                <option value="Admin IN" {{ $user->role == 'Admin IN' ? 'selected' : '' }}>Admin IN</option>
                                <option value="Admin Maintenance" {{ $user->role == 'Admin Maintenance' ? 'selected' : '' }}>Admin Maintenance</option>
                                <option value="Admin OUT" {{ $user->role == 'Admin OUT' ? 'selected' : '' }}>Admin OUT</option>
                            </select>
                            <div class="invalid-feedback" id="roleError">*Silakan pilih role yang valid.</div>
                        </div>

                        <!-- Tombol Kembali dan Update -->
                        <div class="d-flex justify-content-start">
                            <a href="/user" class="btn btn-outline-secondary me-2">
                                <i class="bi bi-arrow-left-circle me-2"></i>Kembali
                            </a>
                            <button class="btn btn-primary" type="submit">
                                <i class="bi bi-save me-2"></i>Update
                            </button>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById("editAdminForm").addEventListener("submit", function(event) {
        let name = document.getElementById("name");
        let email = document.getElementById("email");
        let password = document.getElementById("password");
        let role = document.getElementById("role");

        let isValid = true;

        // Reset error styles
        document.querySelectorAll('.invalid-feedback').forEach(el => el.style.display = 'none');
        name.style.borderColor = "#ddd";
        email.style.borderColor = "#ddd";
        password.style.borderColor = "#ddd";
        role.style.borderColor = "#ddd";

        // Validasi Nama
        if (name.value.trim() === "") {
            document.getElementById("nameError").style.display = "block";
            name.style.borderColor = "red";
            isValid = false;
        }

        // Validasi Email
        if (email.value.trim() === "") {
            document.getElementById("emailError").style.display = "block";
            email.style.borderColor = "red";
            isValid = false;
        }

        // Validasi Password
        if (password.value.trim() !== "" && password.value.length < 6) {
            document.getElementById("passwordError").style.display = "block";
            password.style.borderColor = "red";
            isValid = false;
        }

        // Validasi Role
        if (role.value === "") {
            document.getElementById("roleError").style.display = "block";
            role.style.borderColor = "red";
            isValid = false;
        }

        // Cegah submit jika ada error
        if (!isValid) {
            event.preventDefault();
        }
    });
</script>

@endsection
