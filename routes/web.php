<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\LayoutController;
use App\Http\Controllers\PengajuanSuratController;
use App\Http\Controllers\PelaporanController;
use App\Http\Controllers\KegiatandanIuranController;


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

// Akses Dashboard Ototmatis/ halaman utama (Sementara)
Route::get('/', [LayoutController::class, 'all'])->name('layout.all');

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
