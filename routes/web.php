<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ExcelController;
use App\Http\Controllers\InputAspirasiController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SiswaController;
use Illuminate\Support\Facades\Route;







Route::get('/', function () {
    return view('home');
});

//Route untuk login
//buat login controller
Route::get('/login', [LoginController::class, 'tampillogin']);

// untuk menyimpan data
Route::post('/login', [LoginController::class, 'authenticate']);

// untuk input asoirasi
//  ke form pembuatan input-aspirasi
// buat dulu migration nya, controller, model, view 
Route::get('/input-aspirasi/create', [InputAspirasiController::class, 'create']);

// untuk menyimpan aspirasi 
    Route::post('/input-aspirasi', [InputAspirasiController::class, 'store']);

// untuk melihat histori siswa
Route::get('/input-aspirasi/histori', [InputAspirasiController::class, 'histori']);



// buat dahsboard untuk admin (protected)
Route::middleware('adminonly')->group(function () {

    Route::get('dashboard', [AdminController::class, 'dashboard']);
    Route::post('/logout', [AdminController::class, 'logout']);

    // menampilkan data" kategori
    Route::get('/kategori', [KategoriController::class, 'index']);

    // menampilkan form input tambah katagori 
    Route::get('/kategori/create', [KategoriController::class, 'create']);

    // untuk menambahkan/menyimpan data ke kategori di database 
    Route::post('/kategori', [KategoriController::class, 'store']);

    // untuk menghapus data kategori
    Route::delete('/kategori/{id}', [KategoriController::class, 'destroy']);

    // untuk ke halaman edit kategori
    Route::get('/kategori/{id}/edit', [KategoriController::class, 'edit']);
    // untuk mengupdate data kategori
    Route::put('/kategori/{id}', [KategoriController::class, 'update']);

    // route siswa
    // jangan lupa buat controller, migration, view, model untuk siswa
    // kasih seeders untuk data dummy
    // menampilkan data-data siswa
    Route::get('/siswa', [SiswaController::class, 'index']);

    



     // menampilkan form input tambah siswa
    Route::get('/siswa/create', [SiswaController::class, 'create']);

    // untuk menambahkan/menyimpan data ke siswa di database
    Route::post('/siswa', [SiswaController::class, 'store']);

    // untuk menghapus data siswa
    Route::delete('/siswa/{id}', [SiswaController::class, 'destroy']);

    // untuk ke halaman edit siswa
    Route::get('/siswa/{id}/edit', [SiswaController::class, 'edit']);
    // untuk mengupdate data siswa
    Route::put('/siswa/{id}', [SiswaController::class, 'update']);

    // menerima data excel untuk preview
    Route::post('/excel/preview', [ExcelController::class, 'preview']);

    // menyimpan data excel yang sudah dari preview
    Route::post('/excel/simpan', [ExcelController::class, 'simpanSiswa']);
});