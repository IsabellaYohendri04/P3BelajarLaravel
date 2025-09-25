<?php
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\MatakuliahController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/pcr', function () {
    return 'Selamat datang di Website Kampus PCR !';
});
Route::get('/mahasiswa', function () {
    return 'Halo Mahasiswa';
});
Route::get('/nama/{param1}', function ($param1) {
    return 'Nama Saya : ' . $param1;
});
Route::get('/nim/{param1}', function ($param1 = '') {
    return 'nim Saya : ' . $param1;
});
Route::get('/nim/{param1}', function ($param1 = '') {
    return 'nim Saya : ' . $param1;
});
Route::get('/mahasiswa/{param1}', [MahasiswaController::class, 'show']);

// Route::get('/matakuliah/show/{param1?}', [MatakuliahController::class, 'show']);
// Route::get('/matakuliah/show/{param1?}', function ($param1 = '') {
//     return view('halaman-st445');
// });

Route::get('/matakuliah/{param1?}', [MatakuliahController::class, 'show']);

Route::get('/matakuliah/index/{param1}', [MatakuliahController::class, 'index']);
Route::get('/matakuliah/edit/{param1}', [MatakuliahController::class, 'edit']);
Route::get('/matakuliah/hapus/{param1}', [MatakuliahController::class, 'destroy']);

//P3
Route::get('/home' . [HomeController::class, 'index']);
