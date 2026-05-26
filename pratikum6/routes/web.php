<?php

use Illuminate\Support\Facades\Route;
// 1. PASTIKAN UNTUK MENGIMPORT CONTROLLER DI BAGIAN ATAS JIKA INGIN MENGGUNAKAN CONTROLLER ROUTE
use App\Http\Controllers\ProductController; 

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Di sini tempat mendefinisikan route untuk aplikasi Laravel.
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Route pertama
Route::get('/halo', function () {
    return 'Halo, ini halaman routing pertama dari Laravel! ✨';
});

// Alternatif route /helo
Route::get('/helo', fn() => 'Selamat datang di routing Laravel!');


// =========================================================================
// TAMBAHKAN KODE BARU KAMU DI BAWAH INI:
// =========================================================================

// A. Contoh Penambahan NAMED ROUTE
Route::get('/halaman-utama-dashboard-admin', function () {
    return 'Ini Halaman Dashboard Admin';
})->name('dashboard');


// B. Contoh Penambahan ROUTE GROUP (Dengan prefix 'admin')
Route::prefix('admin')->group(function () {
    Route::get('/dashboard', function () {
        return 'Admin Dashboard';
    });
    Route::get('/products', function () {
        return 'Data Products Berada di Sini';
    });
});


// C. Contoh Penambahan ROUTING YANG TERHUBUNG KE CONTROLLER
// (Route ini yang akan kamu gunakan untuk menampilkan data dari ProductSeeder kemarin)
Route::get('/products', [ProductController::class, 'index']);