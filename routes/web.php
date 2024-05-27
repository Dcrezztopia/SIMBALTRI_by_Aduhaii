<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\LayoutController;
use App\Http\Controllers\PengajuanSuratController;
use App\Http\Controllers\PelaporanController;
use App\Http\Controllers\KegiatandanIuranController;
use App\Http\Controllers\KetuaController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/proses_login', [AuthController::class, 'proses_login'])->name('proses_login');

Route::get('/register', [AuthController::class, 'register'])->name('register');

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/', [AuthController::class, 'index'])->name('entry')->middleware('auth');

Route::group(['middleware' => ['auth']], function () {
    Route::group(['prefix' => 'admin', 'middleware' => ['role:admin']], function () {
        Route::get('/', [AdminController::class, 'index'])->name('admin.dashboard');
    });

    // belum diatur
    // localhost/ketua-rt/
    Route::group(['prefix' => 'ketua-rt', 'middleware' => ['role:ketua_rt']], function () {
        Route::get('/', [KetuaController::class, 'index'])->name('ketua_rt.dashboard');
    });
});

// Pengajuan Surat -- Pengajuan Surat
Route::get('/pengajuansurat/index', [PengajuanSuratController::class, 'index'])->name('pengajuansurat.index');

// PengajuanSurat -- PengajuanSurat (HasilForm ketika Save Simpan)
Route::get('/pengajuansurat/hasilform', [PengajuanSuratController::class, 'hasilform'])->name('pengajuansurat.hasilform.index');

// PengajuanSurat -- RiwayatSurat
Route::get('/riwayatsurat', [PengajuanSuratController::class, 'riwayatsurat'])->name('riwayatsurat.index');



Route::get('/pelaporan/index', [PelaporanController::class, 'index'])->name('pelaporan.index');

// PengajuanSurat -- PengajuanSurat (HasilForm ketika Save Simpan)
Route::get('/pelaporan/hasilform', [PelaporanController::class, 'hasilform'])->name('pelaporan.hasilform.index');

// PengajuanSurat -- RiwayatSurat
Route::get('/riwayatpelaporan', [PelaporanController::class, 'riwayatpelaporan'])->name('riwayatpelaporan.index');





Route::get('/kegiatandaniuran/index', [KegiatandanIuranController::class, 'index'])->name('kegiatandaniuran.index');

Route::get('/iuranwarga', [KegiatandanIuranController::class, 'iuranwarga'])->name('iuranwarga.index');

// route placeholdes

Route::get('/placeholder', [AuthController::class, 'index'])->name('placeholder1');
