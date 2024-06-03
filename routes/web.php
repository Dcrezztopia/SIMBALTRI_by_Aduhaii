<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BansosController;
use App\Http\Controllers\IuranController;
use App\Http\Controllers\KegiatanController;
use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\Controller;
// use App\Http\Controllers\LayoutController;
use App\Http\Controllers\PengajuanSuratController;
use App\Http\Controllers\PelaporanController;
use App\Http\Controllers\KegiatandanIuranController;
use App\Http\Controllers\SuratController;
// use App\Http\Controllers\KetuaController;
use App\Http\Controllers\WargaController;
use App\Http\Controllers\DataWargaController;

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

Route::get('/', [AuthController::class, 'index'])->name('entry');
Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/proses_login', [AuthController::class, 'proses_login'])->name('proses_login');
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
Route::post('/proses_register', [AuthController::class, 'proses_register'])->name('proses_register');

Route::group(['middleware' => ['auth']], function () {
    Route::get('/', [AuthController::class, 'index'])->name('dashboard');

    Route::prefix('admin')->middleware(['role:admin'])->group(function () {
        Route::get('/', [AdminController::class, 'index'])->name('admin.dashboard');
    });

    Route::prefix('warga')->middleware(['role:warga'])->group(function () {
        Route::get('/', [WargaController::class, 'index'])->name('warga.dashboard');
    });

    Route::prefix('surat')->group(function () {
        Route::get('pengajuan', [SuratController::class, 'pengajuan'])->name('surat.pengajuan');
        Route::get('riwayat', [SuratController::class, 'riwayat'])->name('surat.riwayat');
        Route::get('hasilform', [SuratController::class, 'hasilform'])->name('surat.hasilform');
        Route::delete('{id}', [SuratController::class, 'destroy'])->name('surat.destroy');
        Route::post('surat/store', [SuratController::class, 'store'])->name('surat.store');
    });

    Route::prefix('pelaporan')->group(function () {
        Route::get('lapor', [PelaporanController::class, 'lapor'])->name('pelaporan.lapor');
        Route::get('riwayat', [PelaporanController::class, 'riwayat'])->name('pelaporan.riwayat');
        Route::get('hasilform', [PelaporanController::class, 'hasilform'])->name('pelaporan.hasilform');
        Route::delete('{id}', [PelaporanController::class, 'destroy'])->name('pelaporan.destroy'); 
    });

    Route::get('kegiatan', [KegiatanController::class, 'index'])->name('kegiatan.index');
    Route::get('kegiatan/create', [KegiatanController::class, 'createKegiatanWarga'])->name('kegiatan.create');
    Route::post('kegiatan', [KegiatanController::class, 'storeKegiatanWarga']);
    Route::get('kegiatan/edit/{id}', [KegiatanController::class, 'editKegiatanWarga'])->name('kegiatan.edit');
    Route::post('kegiatan/update/{id}', [KegiatanController::class, 'updateKegiatanWarga'])->name('kegiatan.update');
    Route::delete('kegiatan/{id}', [KegiatanController::class, 'destroyKegiatanWarga'])->name('kegiatan.destroy');

    Route::get('iuran', [IuranController::class, 'index'])->name('iuran.index');
    Route::get('iuran/create', [IuranController::class, 'createKegiatanWarga'])->name('iuran.create');
    Route::post('iuran', [IuranController::class, 'storeKegiatanWarga']);
    Route::get('iuran/edit/{id}', [IuranController::class, 'editKegiatanWarga'])->name('iuran.edit');
    Route::post('iuran/update/{id}', [IuranController::class, 'updateKegiatanWarga'])->name('iuran.update');
    Route::delete('iuran/{id}', [IuranController::class, 'destroyKegiatanWarga'])->name('iuran.destroy');

    Route::prefix('bansos')->group(function () {
        Route::get('riwayat', [BansosController::class, 'riwayat'])->name('bansos.riwayat');
        Route::get('permintaaan', [BansosController::class, 'permintaan'])->name('bansos.permintaan');
        Route::get('pengajuan', [BansosController::class, 'pengajuan'])->name('bansos.pengajuan');
        Route::get('data', [BansosController::class, 'data'])->name('bansos.data');
    });

    // belum diatur
    // localhost/ketua-rt/
    // Route::group(['prefix' => 'ketua-rt', 'middleware' => ['role:ketua_rt']], function () {
    //     Route::get('/', [KetuaController::class, 'index'])->name('ketua_rt.dashboard');
    // });
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

Route::get('/placeholder', [AuthController::class, 'index'])->name('placeholder1');
