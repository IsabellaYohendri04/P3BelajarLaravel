<?php
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\MatakuliahController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/pcr', function () {
    return 'Selamat datang di Website Kampus PCR !';
});
Route::get('/mahasiswa', function () {
    return 'Data mahasiswa Abel';
});
Route::get('/nama/{param1}', function ($param1) {
    return 'Nama Saya : ' . $param1;
});

Route::get('/about', function () {
    return view('halaman-about');
});

// Route::get('/nim/{param1}', function ($param1 = '') {
//     return 'nim Saya : ' . $param1;
// });
Route::get('/nim/{param1?}', function ($param1 = '') {
    return 'nim Saya : ' . $param1;
});
Route::get('/mahasiswa/{param1}', [MahasiswaController::class, 'show']);




Route::get('/matakuliah/show/{param1?}', 
[MatakuliahController::class, 'show']);


// Route::get('/matakuliah/show/{param1?}', function ($param1 = '') {
//     return view('halaman-st445');
// });

Route::get('/matakuliah/', [MatakuliahController::class, 'index']);
Route::get('/matakuliah/tambah/{param1}', [MatakuliahController::class, 'create']);
Route::get('/matakuliah/edit/{param1}', [MatakuliahController::class, 'edit']);
Route::get('/matakuliah/hapus/{param1}', [MatakuliahController::class, 'destroy']);

Route::get('/pegawai', [PegawaiController::class, 'index']);

Route::get('/auth', [AuthController::class, 'index']);
Route::post('/auth/login', [AuthController::class, 'login']);
