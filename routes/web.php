<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PesertaController;
use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\OnboardingController;
use App\Http\Controllers\MaintenanceController;
use App\Http\Controllers\InternInfoController;
use App\Http\Controllers\KelengkapanAdministrasiController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Middleware\RoleMiddleware;

// 🔓 PUBLIC ROUTES
Route::get('/login', [LoginController::class, 'showLogin'])->name('login');
Route::post('/actionLogin', [LoginController::class, 'actionLogin'])->name('actionLogin');
Route::get('/logout', [LoginController::class, 'Logout'])->name('Logout');

Route::get('/kelengkapanadministrasi/form', [KelengkapanAdministrasiController::class, 'showForm'])->name('kelengkapanadministrasi.form');
Route::post('/kelengkapanadministrasi/simpan', [KelengkapanAdministrasiController::class, 'store'])->name('kelengkapanadministrasi.store');
Route::get('/kelengkapanadministrasi/success', function () { return view('home.kelengkapanadministrasi.success'); })->name('kelengkapanadministrasi.success');

Route::get('/absensi/create', [AbsensiController::class, 'create'])->name('absensi.create');
Route::post('/absensi/simpan', [AbsensiController::class, 'store'])->name('absensi.store');
Route::get('/absensi/succes', function () { return view('home.absensi.succes'); })->name('absensi.succes');

// 🔐 PROTECTED ROUTES (AUTH + ROLE)
Route::middleware(['auth'])->group(function () {

    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    // User - Admin General
    Route::get('/user', [UserController::class, 'index'])->middleware(RoleMiddleware::class . ':Admin General');
    Route::get('/user/tambah', [UserController::class, 'create'])->middleware(RoleMiddleware::class . ':Admin General');
    Route::post('/user/simpan', [UserController::class, 'store'])->middleware(RoleMiddleware::class . ':Admin General');
    Route::get('/user/{id}/edit', [UserController::class, 'edit'])->middleware(RoleMiddleware::class . ':Admin General');
    Route::post('/user/{id}/update', [UserController::class, 'update'])->middleware(RoleMiddleware::class . ':Admin General');
    Route::get('/user/{id}/delete', [UserController::class, 'destroy'])->middleware(RoleMiddleware::class . ':Admin General');

    // Kelengkapan Administrasi - Admin IN, Admin General
    Route::get('/kelengkapanadministrasi', [KelengkapanAdministrasiController::class, 'index'])->middleware(RoleMiddleware::class . ':Admin IN,Admin General')->name('home.kelengkapanadministrasi.index');
    Route::get('/kelengkapanadministrasi/{id}/delete', [KelengkapanAdministrasiController::class, 'destroy'])->middleware(RoleMiddleware::class . ':Admin IN,Admin General')->name('kelengkapanadministrasi.destroy');

    // Onboarding - Admin IN, Admin General
    Route::get('/onboarding', [OnboardingController::class, 'index'])->middleware(RoleMiddleware::class . ':Admin IN,Admin General')->name('onboarding.index');
    Route::get('/onboarding/tambah', [OnboardingController::class, 'create'])->middleware(RoleMiddleware::class . ':Admin IN,Admin General')->name('onboarding.create');
    Route::post('/onboarding/simpan', [OnboardingController::class, 'store'])->middleware(RoleMiddleware::class . ':Admin IN,Admin General')->name('onboarding.store');
    Route::get('/onboarding/{id}/show', [OnboardingController::class, 'show'])->middleware(RoleMiddleware::class . ':Admin IN,Admin General')->name('onboarding.show');
    Route::get('/onboarding/{id}/edit', [OnboardingController::class, 'edit'])->middleware(RoleMiddleware::class . ':Admin IN,Admin General')->name('onboarding.edit');
    Route::put('/onboarding/{id}/update', [OnboardingController::class, 'update'])->middleware(RoleMiddleware::class . ':Admin IN,Admin General')->name('onboarding.update');
    Route::get('/onboarding/{id}/destroy', [OnboardingController::class, 'destroy'])->middleware(RoleMiddleware::class . ':Admin IN,Admin General')->name('onboarding.destroy');

    // Intern Info - Admin IN, Admin General
    Route::get('/onboarding/{id_apply}/interninfo', [OnboardingController::class, 'interninfo'])->middleware(RoleMiddleware::class . ':Admin IN,Admin General')->name('onboarding.interninfo');
    Route::get('/onboarding/interntambah', [OnboardingController::class, 'tambahinterninfo'])->middleware(RoleMiddleware::class . ':Admin IN,Admin General')->name('onboarding.interntambah');
    Route::post('/onboarding/internsimpan', [OnboardingController::class, 'internsimpan'])->middleware(RoleMiddleware::class . ':Admin IN,Admin General')->name('onboarding.internsimpan');
    Route::get('/onboarding/{id_apply}/internedit', [OnboardingController::class, 'editinterninfo'])->middleware(RoleMiddleware::class . ':Admin IN,Admin General')->name('onboarding.internedit');
    Route::post('/onboarding/{id_apply}/internupdate', [OnboardingController::class, 'updateinterninfo'])->middleware(RoleMiddleware::class . ':Admin IN,Admin General')->name('onboarding.internupdate');

    // Peserta - Admin Maintenance, OUT, General
    Route::get('/peserta', [PesertaController::class, 'index'])->middleware(RoleMiddleware::class . ':Admin Maintenance,Admin OUT,Admin General');
    Route::get('/peserta/nonaktif', [PesertaController::class, 'nonaktif'])->middleware(RoleMiddleware::class . ':Admin Maintenance,Admin OUT,Admin General');
    Route::get('/peserta/tambah', [PesertaController::class, 'create'])->middleware(RoleMiddleware::class . ':Admin Maintenance,Admin OUT,Admin General');
    Route::post('/peserta/simpan', [PesertaController::class, 'store'])->middleware(RoleMiddleware::class . ':Admin Maintenance,Admin OUT,Admin General');
    Route::get('/peserta/{id}/edit', [PesertaController::class, 'edit'])->middleware(RoleMiddleware::class . ':Admin Maintenance,Admin OUT,Admin General')->name('peserta.edit');
    Route::post('/peserta/{id}/update', [PesertaController::class, 'update'])->middleware(RoleMiddleware::class . ':Admin Maintenance,Admin OUT,Admin General');
    Route::get('/peserta/{id}/delete', [PesertaController::class, 'destroy'])->middleware(RoleMiddleware::class . ':Admin Maintenance,Admin OUT,Admin General');
    Route::get('/peserta/{id}/nilaitambah', [PesertaController::class, 'nilaitambah'])->middleware(RoleMiddleware::class . ':Admin Maintenance,Admin OUT,Admin General');
    Route::get('/peserta/{id}/nilai', [PesertaController::class, 'nilai'])->middleware(RoleMiddleware::class . ':Admin Maintenance,Admin OUT,Admin General');
    Route::post('/nilai/{id}/nilaisimpan', [PesertaController::class, 'nilaisimpan'])->middleware(RoleMiddleware::class . ':Admin Maintenance,Admin OUT,Admin General');
    Route::get('/peserta/laporan', [PesertaController::class, 'laporan'])->middleware(RoleMiddleware::class . ':Admin Maintenance,Admin OUT,Admin General')->name('laporan');
    Route::get('/peserta/{id}/status', [PesertaController::class, 'status'])->middleware(RoleMiddleware::class . ':Admin Maintenance,Admin OUT,Admin General');
    Route::get('/peserta/export-pdf', [PesertaController::class, 'exportPdf'])->middleware(RoleMiddleware::class . ':Admin Maintenance,Admin OUT,Admin General')->name('peserta.export-pdf');

    // Absensi - Admin Maintenance, Admin General
    Route::get('/absensi', [AbsensiController::class, 'index'])->middleware(RoleMiddleware::class . ':Admin Maintenance,Admin General');

    // Maintenance - Admin Maintenance, Admin General
    Route::get('/maintenance', [MaintenanceController::class, 'index'])->middleware(RoleMiddleware::class . ':Admin Maintenance,Admin General')->name('maintenance.index');
    Route::get('/maintenance/{id}/edit', [MaintenanceController::class, 'edit'])->middleware(RoleMiddleware::class . ':Admin Maintenance,Admin General')->name('maintenance.edit');
    Route::put('/maintenance/{id}/update', [MaintenanceController::class, 'update'])->middleware(RoleMiddleware::class . ':Admin Maintenance,Admin General')->name('maintenance.update');
    Route::get('/maintenance/{id}/delete', [MaintenanceController::class, 'destroy'])->middleware(RoleMiddleware::class . ':Admin Maintenance,Admin General')->name('maintenance.destroy');
});
