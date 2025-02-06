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


    // Route Login
    Route::get('/login', [LoginController::class,'showLogin'])->name('login');
    Route::post('/actionLogin', [LoginController::class,'actionLogin'])->name('actionLogin');
    Route::get('/logout', [LoginController::class,'Logout'])->name('Logout');

    // Middleware Auth
    Route::middleware(['auth'])->group(function() {
    // Dashboard
    Route::get('/', [DashboardController::class,'index']);


 Route::get('/user', [UserController::class,'index']);
Route::get('/user/tambah', [UserController::class,'create']);
Route::post('/user/simpan', [UserController::class,'store']);
Route::get('/user/{id}/edit', [UserController::class,'edit']);
Route::post('/user/{id}/update', [UserController::class,'update']);
Route::get('/user/{id}/delete', [UserController::class,'destroy']);

//rut peserta bisa aktif dan ke tidak aktif juga
Route::get('/peserta', [PesertaController::class,'index']);
Route::get('/peserta/tambah', [PesertaController::class,'create']);
Route::get('/peserta/nonaktif', [PesertaController::class,'nonaktif']);
Route::get('/peserta/tambah', [PesertaController::class,'create']);
Route::post('/peserta/simpan', [PesertaController::class,'store']);
Route::get('/peserta/{id}/edit', [PesertaController::class,'edit'])->name('peserta.edit');
Route::post('/peserta/{id}/update', [PesertaController::class,'update']);
Route::get('/peserta/{id}/delete', [PesertaController::class,'destroy']);
Route::get('/peserta/{id}/nilaitambah', [PesertaController::class,'nilaitambah']);
Route::get('/peserta/{id}/nilai', [PesertaController::class,'nilai']);
Route::post('/nilai/{id}/nilaisimpan', [PesertaController::class,'nilaisimpan']);
Route::get('/peserta/laporan', [PesertaController::class,'laporan'])->name('laporan');
 Route::get('/peserta/{id}/status', [PesertaController::class,'status']);
 Route::get('/peserta/export-pdf', [PesertaController::class, 'exportPdf'])->name('peserta.export-pdf');




//rut peserta absensi
Route::resource('absensi', AbsensiController::class);
Route::get('/absensi/create', [AbsensiController::class, 'create'])->name('absensi.create');
Route::post('/absensi/simpan', [AbsensiController::class, 'store'])->name('absensi.store');
Route::get('/absensi/succes', function () {return view('home.absensi.succes');})->name('absensi.succes');


//rut onboarding
        // Rute untuk menampilkan daftar onboarding
        Route::get('/onboarding', [OnboardingController::class, 'index'])->name('onboarding.index');

        // Rute untuk menampilkan form untuk menambah onboarding
        Route::get('/onboarding/tambah', [OnboardingController::class, 'create'])->name('onboarding.create');

        // Rute untuk menyimpan data onboarding baru
        Route::post('/onboarding/simpan', [OnboardingController::class, 'store'])->name('onboarding.store');

        // Rute untuk menampilkan detail onboarding berdasarkan ID
        Route::get('/onboarding/{id}/show', [OnboardingController::class, 'show'])->name('onboarding.show');

        // Rute untuk menampilkan form edit untuk onboarding
        Route::get('/onboarding/{id}/edit', [OnboardingController::class, 'edit'])->name('onboarding.edit');

        // Rute untuk memperbarui data onboarding berdasarkan ID
        Route::put('/onboarding/{id}/update', [OnboardingController::class, 'update'])->name('onboarding.update');

        // Rute untuk menghapus data onboarding berdasarkan ID
        Route::delete('/onboarding/{id}/destroy', [OnboardingController::class, 'destroy'])->name('onboarding.destroy');

        Route::get('/onboarding/interninfo', [OnboardingController::class, 'interninfo'])->name('onboarding.interninfo');
        Route::get('/onboarding/interntambah', [OnboardingController::class, 'tambahinterninfo'])->name('onboarding.interntambah');
        Route::post('/onboarding/internsimpan', [OnboardingController::class, 'internsimpan'])->name('onboarding.internsimpan');
        Route::get('/onboarding/{id_apply}/internedit', [OnboardingController::class, 'editinterninfo'])->name('onboarding.internedit');
        Route::post('/onboarding/{id_apply}/interupdate', [OnboardingController::class, 'updateinterninfo'])->name('onboarding.internupdate');



        // rut rekapan Maintenance
Route::get('/maintenance', [MaintenanceController::class, 'index'])->name('maintenance.index');
Route::get('/maintenance/{id_peserta}/edit', [MaintenanceController::class, 'edit'])->name('maintenance.edit');
Route::put('/maintenance/{id_peserta}', [MaintenanceController::class, 'update'])->name('maintenance.update');
Route::delete('/maintenance/{id_peserta}', [MaintenanceController::class, 'destroy'])->name('maintenance.destroy');


//route kelengkapan administrasi
Route::get('/kelengkapanadministrasi', [KelengkapanAdministrasiController::class,'index'])->name('home.kelengkapanadministrasi.index');
Route::get('/kelengkapanadministrasi/form', [KelengkapanAdministrasiController::class, 'showForm'])->name('kelengkapanadministrasi.form');
Route::post('/kelengkapanadministrasi/simpan', [KelengkapanAdministrasiController::class, 'store'])->name('kelengkapanadministrasi.store');
Route::get('/kelengkapanadministrasi/form', [KelengkapanAdministrasiController::class, 'showForm']);
Route::post('kelengkapanadministrasi/form', [KelengkapanAdministrasiController::class, 'store'])->name('kelengakapanadministrasi.store');
Route::get('/kelengkapanadministrasi/{id}/delete', [KelengkapanAdministrasiController::class, 'destroy'])->name('kelengkapanadministrasi.destroy');

Route::get('/kelengkapanadministrasi/success', function () {
    return view('home.kelengkapanadministrasi.success');
})->name('kelengkapanadministrasi.success');


});
