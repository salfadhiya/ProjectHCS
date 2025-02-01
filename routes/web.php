<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;
use App\Http\Controllers\PesertaController;
use App\Http\Controllers\AbsensiController;


Route::get('/', function () {
    return view('home.dashboard');


});


//rut user atau as admin
Route::get('/user', [UserController::class,'index']);
Route::get('/user/tambah', [UserController::class,'create']);
Route::post('/user/simpan', [UserController::class,'store']);
Route::get('/user/{id}/edit', [UserController::class,'edit']);
Route::post('/user/{id}/update', [UserController::class,'update']);
Route::get('/user/{id}/delete', [UserController::class,'destroy']);

//rut peserta bisa aktif dan ke tidak aktif juga
Route::get('/peserta', [PesertaController::class,'index']);
Route::get('/peserta/tambah', [PesertaController::class,'create']);
Route::post('/peserta/simpan', [PesertaController::class,'store']);
Route::get('/peserta/{id}/edit', [PesertaController::class,'edit'])->name('peserta.edit');
Route::post('/peserta/{id}/update', [PesertaController::class,'update']);
Route::get('/peserta/{id}/delete', [PesertaController::class,'destroy']);
Route::get('/peserta/{id}/nilaitambah', [PesertaController::class,'nilaitambah']);
Route::get('/peserta/{id}/nilai', [PesertaController::class,'nilai']);
Route::post('/nilai/{id}/nilaisimpan', [PesertaController::class,'nilaisimpan']);



//rut peserta absensi
Route::resource('absensi', AbsensiController::class);
Route::get('/absensi/create', [AbsensiController::class, 'create'])->name('absensi.create');
Route::post('/absensi/simpan', [AbsensiController::class, 'store'])->name('absensi.store');
Route::get('/absensi/succes', function () {return view('home.absensi.succes');})->name('absensi.succes');
