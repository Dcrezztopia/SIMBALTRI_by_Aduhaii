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
use App\Http\Controllers\WelcomeController;

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

Route::get('/', [AuthController::class, 'index'])->name('home');
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/proses_login', [AuthController::class, 'proses_login'])->name('proses_login');
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
Route::post('/proses_register', [AuthController::class, 'proses_register'])->name('proses_register');

Route::group(['middleware' => ['auth']], function () {
    // Route::get('/', [AuthController::class, 'index'])->name('dashboard');
    // Route::get('home', [AuthController::class, 'index'])->name('home');
    Route::get('data-warga', [AdminController::class, 'data_warga'])->name('data-warga.index');

    Route::prefix('admin')->middleware(['role:admin'])->group(function () {
        Route::get('/', [AdminController::class, 'index'])->name('admin.dashboard');
    });

    Route::prefix('warga')->middleware(['role:warga'])->group(function () {
        Route::get('/', [WargaController::class, 'index'])->name('warga.dashboard');
    });

    Route::middleware(['role:warga'])->group(function () {
        Route::get('home', [WargaController::class, 'index'])->name('warga.home');
    });

    Route::prefix('datawarga')->group(function (){
        Route::get('/', [DataWargaController::class, 'index'])->name('datawarga.index');
        Route::get('/create', [DataWargaController::class, 'create'])->name('datawarga.create');
        Route::post('/', [DataWargaController::class, 'store'])->name('datawarga.store');
        Route::get('/edit/{id}', [DataWargaController::class, 'edit'])->name('datawarga.edit');
        Route::post('/update/{id}', [DataWargaController::class, 'update'])->name('datawarga.update');
        Route::delete('/{id}', [DataWargaController::class, 'destroy'])->name('datawarga.destroy');
    });

    Route::prefix('surat')->group(function () {
        Route::get('pengajuan', [SuratController::class, 'pengajuan'])->name('surat.pengajuan');
        Route::get('riwayat', [SuratController::class, 'riwayat'])->name('surat.riwayat');
        Route::get('hasilform', [SuratController::class, 'hasilform'])->name('surat.hasilform');
        Route::delete('{id}', [SuratController::class, 'destroy'])->name('surat.destroy');
        Route::post('surat/store', [SuratController::class, 'store'])->name('surat.store');
        Route::put('surat/updateStatus/{id}/{status}', [SuratController::class, 'updateStatus'])->name('surat.updateStatus');
        Route::get('{id}', [SuratController::class, 'show'])->name('surat.detail');
        Route::get('edit/{id}', [SuratController::class, 'edit'])->name('surat.edit');
        Route::put('{id}', [SuratController::class, 'update'])->name('surat.update');
        Route::put('{id}/status/{status}', [SuratController::class, 'updateStatus'])->name('surat.updateStatus');
    });

    Route::prefix('pelaporan')->group(function () {
        Route::get('lapor', [PelaporanController::class, 'lapor'])->name('pelaporan.lapor');
        Route::post('lapor', [PelaporanController::class, 'store'])->name('pelaporan.store');
        Route::get('riwayat', [PelaporanController::class, 'riwayat'])->name('pelaporan.riwayat');
        Route::get('hasilform', [PelaporanController::class, 'hasilform'])->name('pelaporan.hasilform');
        Route::get('{id}', [PelaporanController::class, 'show'])->name('pelaporan.detail');
        Route::get('{id}/edit', [PelaporanController::class, 'edit'])->name('pelaporan.edit');
        Route::put('{id}', [PelaporanController::class, 'update'])->name('pelaporan.update');
        Route::delete('{id}', [PelaporanController::class, 'destroy'])->name('pelaporan.destroy');
        Route::post('store', [PelaporanController::class, 'store'])->name('pelaporan.store');
    });

    Route::get('kegiatan', [KegiatanController::class, 'index'])->name('kegiatan.index');
    Route::get('kegiatan/create', [KegiatanController::class, 'createKegiatanWarga'])->name('kegiatan.create');
    Route::post('kegiatan', [KegiatanController::class, 'storeKegiatanWarga']);
    Route::get('kegiatan/edit/{id}', [KegiatanController::class, 'editKegiatanWarga'])->name('kegiatan.edit');
    Route::post('kegiatan/update/{id}', [KegiatanController::class, 'updateKegiatanWarga'])->name('kegiatan.update');
    Route::delete('kegiatan/{id}', [KegiatanController::class, 'destroyKegiatanWarga'])->name('kegiatan.destroy');

    Route::prefix('iuran')->group(function () {
        Route::get('/', [IuranController::class, 'index'])->name('iuran.index');
        Route::get('/create', [IuranController::class, 'createIuranWarga'])->name('iuran.create');
        Route::post('/', [IuranController::class, 'storeIuranWarga'])->name('iuran.store');
        Route::get('edit/{id}', [IuranController::class, 'editIuranWarga'])->name('iuran.edit');
        Route::put('/{id}', [IuranController::class, 'updateIuranWarga'])->name('iuran.update');
        Route::delete('/{id}', [IuranController::class, 'destroyIuranWarga'])->name('iuran.destroy');
    });

    Route::prefix('bansos')->group(function () {
        // Route::get('riwayat', [BansosController::class, 'riwayat'])->name('bansos.riwayat');
        Route::get('permintaaan', [BansosController::class, 'permintaan'])->name('bansos.permintaan');
        Route::get('pengajuan', [BansosController::class, 'pengajuan'])->name('bansos.pengajuan');
        Route::get('data', [BansosController::class, 'data'])->name('bansos.data');
        Route::get('evaluasi-penerima', [BansosController::class, 'evaluasi_penerima'])->name('bansos.evaluasi-penerima');
        Route::get('pengajuan-bansos', [BansosController::class, 'pengajuan_bansos'])->name('bansos.pengajuan-bansos');
        Route::get('daftar_pengajuan', [BansosController::class, 'daftar_pengajuan'])->name('bansos.daftar_pengajuan');
        Route::get('penerima', [BansosController::class, 'penerima'])->name('bansos.penerima');
        Route::get('/pengajuan_bansos', [BansosController::class, 'index'])->name('pengajuan_bansos.index');
        Route::post('/pengajuan_bansos', [BansosController::class, 'store'])->name('pengajuan_bansos.store');
    });

    // belum diatur
    // localhost/ketua-rt/
    // Route::group(['prefix' => 'ketua-rt', 'middleware' => ['role:ketua_rt']], function () {
    //     Route::get('/', [KetuaController::class, 'index'])->name('ketua_rt.dashboard');
    // });
});

// // Pengajuan Surat -- Pengajuan Surat
// Route::get('/pengajuansurat/index', [PengajuanSuratController::class, 'index'])->name('pengajuansurat.index');
// // PengajuanSurat -- PengajuanSurat (HasilForm ketika Save Simpan)
// Route::get('/pengajuansurat/hasilform', [PengajuanSuratController::class, 'hasilform'])->name('pengajuansurat.hasilform.index');
// // PengajuanSurat -- RiwayatSurat
// Route::get('/riwayatsurat', [PengajuanSuratController::class, 'riwayatsurat'])->name('riwayatsurat.index');
// Route::get('/pelaporan/index', [PelaporanController::class, 'index'])->name('pelaporan.index');
// // PengajuanSurat -- PengajuanSurat (HasilForm ketika Save Simpan)
// Route::get('/pelaporan/hasilform', [PelaporanController::class, 'hasilform'])->name('pelaporan.hasilform.index');
// // PengajuanSurat -- RiwayatSurat
// Route::get('/riwayatpelaporan', [PelaporanController::class, 'riwayatpelaporan'])->name('riwayatpelaporan.index');
// Route::get('/kegiatandaniuran/index', [KegiatandanIuranController::class, 'index'])->name('kegiatandaniuran.index');
// Route::get('/iuranwarga', [KegiatandanIuranController::class, 'iuranwarga'])->name('iuranwarga.index');

// Route::get('/placeholder', [AuthController::class, 'index'])->name('placeholder1');
