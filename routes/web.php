<?php

use App\Http\Controllers\AuditController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PalmManagementPokokController;
use App\Http\Controllers\PalmManagementTandanController;
use App\Http\Controllers\PengurusanPenggunaController;
use App\Http\Controllers\PengurusanPokokIndukController;
use App\Http\Controllers\ReportingFatherpalmController;
use App\Http\Controllers\ReportingMotherpalmController;
use App\Http\Controllers\SCKerosakanController;
use App\Http\Controllers\SCMatlamatBulananTahunanController;
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
        Route::post('/daftar', [PengurusanPenggunaController::class, 'store']);
        Route::get('/edit/{user}', [PengurusanPenggunaController::class, 'edit'])->name('pp.edit');
        Route::put('/kemaskini/{id}', [PengurusanPenggunaController::class, 'update']);
        Route::delete('/hapus/{id}', [PengurusanPenggunaController::class, 'destroy']);
        Route::get('/filter', [PengurusanPenggunaController::class, 'filter']);

        Route::get('/laporan', [PengurusanPenggunaController::class, 'laporan'])->name('pp.laporan');
        Route::get('/maklumat', [PengurusanPenggunaController::class, 'maklumat'])->name('pp.maklumat');

    });

    Route::prefix('/pengurusan-pokok-induk')->group(function(){
        Route::resource('pokok', PalmManagementPokokController::class);
        Route::resource('tandan', PalmManagementTandanController::class);
    });

    Route::prefix('/laporan')->group(function(){
        Route::resource('motherpalm', ReportingMotherpalmController::class);
        Route::resource('fatherpalm', ReportingFatherpalmController::class);
    });

    Route::get('audit', [AuditController::class, 'index'])->name('audit');
    Route::get('audit/filter', [AuditController::class, 'filter']);

    Route::prefix('/konfigurasi-sistem')->group(function(){
        Route::resource('kerosakan', SCKerosakanController::class);
        Route::resource('matlamat-bulanan-tahunan', SCMatlamatBulananTahunanController::class);
    });

});
