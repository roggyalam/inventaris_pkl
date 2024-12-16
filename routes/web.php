<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(
    ['register' => false]
);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

use App\Http\Controllers\kategoriController;
Route::resource('kategori', App\Http\Controllers\kategoriController::class)->middleware('auth');

use App\Http\Controllers\ruanganController;
Route::resource('ruangan', App\Http\Controllers\ruanganController::class)->middleware('auth');

use App\Http\Controllers\supplierController;
Route::resource('supplier', App\Http\Controllers\supplierController::class)->middleware('auth');

use App\Http\Controllers\barangController;
Route::resource('barang', App\Http\Controllers\barangController::class)->middleware('auth');

use App\Http\Controllers\pengadaanbarangController;
Route::resource('pengadaanbarang', App\Http\Controllers\pengadaanbarangController::class)->middleware('auth');

use App\Http\Controllers\pinjamanController;
Route::resource('pinjaman', App\Http\Controllers\pinjamanController::class)->middleware('auth');

use App\Http\Controllers\PengembalianController;
Route::resource('pengembalian', App\Http\Controllers\PengembalianController::class)->middleware('auth');

