@extends('layouts.master')
@section('title', '')
@section('content')

<div class="section">
    <div class="col-12">
        <div class="row">
            <div class="card border-0">
                <div class="card-header bg-white py-3">
                    <br>
                    <h5 class="mb-0 fw-semibold">Tambah Data Admin</h5>
                    <br>
                </div>
                <div class="card-body p-4">

                    <form action="/user/simpan" method="POST" id="adminForm">
                        @csrf

                        <!-- Nama -->
                        <div class="mb-4">
                            <label for="name" class="form-label">Nama Lengkap</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Masukkan Nama Lengkap" value="{{ old('name') }}" />
                            <div class="invalid-feedback" id="nameError">*Nama lengkap harus diisi.</div>
                        </div>

                        <!-- Email -->
                        <div class="mb-4">
                            <label for="email" class="form-label">Email Address</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="example@domain.com" value="{{ old('email') }}" />
                            <div class="invalid-feedback" id="emailError">*Silakan masukkan email yang valid.</div>
                            <div class="form-text">Email ini akan digunakan untuk login.</div>
                        </div>

                        <!-- Password -->
                        <div class="mb-4">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Password" />
                            <div class="invalid-feedback" id="passwordError">*Password tidak boleh kosong.</div>
                            <div class="form-text">Pastikan password yang kuat dan aman.</div>
                        </div>

                        <!-- Role -->
                        <div class="mb-4">
                            <label for="role" class="form-label">Pilih Role</label>
                            <select name="role" class="form-select" id="role">
                                <option value="" selected disabled>Pilih Role</option>
                                <option value="General" {{ old('role') == 'General' ? 'selected' : '' }}>General</option>
                                <option value="Admin IN" {{ old('role') == 'Admin IN' ? 'selected' : '' }}>Admin IN</option>
                                <option value="Admin Maintenance" {{ old('role') == 'Admin Maintenance' ? 'selected' : '' }}>Admin Maintenance</option>
                                <option value="Admin OUT" {{ old('role') == 'Admin OUT' ? 'selected' : '' }}>Admin OUT</option>
                            </select>
                            <div class="invalid-feedback" id="roleError">*Silakan pilih role yang valid.</div>
                        </div>

                        <!-- Tombol Submit -->
                        <div class="d-flex justify-content-start">
                            <a href="/user" class="btn btn-outline-secondary me-2">
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

<script>
    document.getElementById("adminForm").addEventListener("submit", function(event) {
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
        if (password.value.trim() === "") {
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
