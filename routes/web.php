<?php

use App\Http\Controllers\AuditController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PengurusanPenggunaController;
use App\Http\Controllers\PengurusanPokokIndukController;
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

Auth::routes();

Route::middleware('auth')->group(function () {
    Route::get('/laman-utama', [HomeController::class, 'index'])->name('laman');

    Route::prefix('/pengurusan_pengguna')->group(function () {
        Route::get('/petugas', [PengurusanPenggunaController::class, 'index'])->name('pp.petugas');
        Route::get('/daftar', [PengurusanPenggunaController::class, 'daftar'])->name('pp.daftar');
        Route::get('/edit', [PengurusanPenggunaController::class, 'edit'])->name('pp.edit');

        Route::get('/laporan', [PengurusanPenggunaController::class, 'laporan'])->name('pp.laporan');
        Route::get('/maklumat', [PengurusanPenggunaController::class, 'maklumat'])->name('pp.maklumat');

    });

    Route::get('audit', [AuditController::class, 'index'])->name('audit');

    Route::prefix('/pengurusan-pokok-induk')->group(function () {
        Route::get('/pokok/index', [PengurusanPokokIndukController::class, 'pokok'])->name('pi.pokok');
        Route::get('/pokok/daftar', [PengurusanPokokIndukController::class, 'daftarPokok'])->name('pi.p.daftar');
        Route::get('/pokok/edit', [PengurusanPokokIndukController::class, 'editPokok'])->name('pi.p.edit');

        Route::get('/tandan/index', [PengurusanPokokIndukController::class, 'tandan'])->name('pi.tandan');
        Route::get('/tandan/daftar', [PengurusanPokokIndukController::class, 'daftarTandan'])->name('pi.t.daftar');
        Route::get('/tandan/muat-naik-dokumen', [PengurusanPokokIndukController::class, 'MuatNaikDokumenTandan'])->name('pi.t.muat');

    });

});
