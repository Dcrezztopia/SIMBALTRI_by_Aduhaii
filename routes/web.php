<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\LayoutController;
use App\Http\Controllers\PelaporanController;
use App\Http\Controllers\PengajuanSuratController;


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

Route::get('/', [LayoutController::class, 'all'])->name('layout.all'); // Akses Dashboard Ototmatis/ halaman utama (Sementara)

Route::get('/pengajuansurat/index', [PengajuanSuratController::class, 'index'])->name('pengajuansurat.index'); // Pengajuan Surat -- Pengajuan Surat
Route::get('/hasilform', [PengajuanSuratController::class, 'hasilform'])->name('pengajuansurat.hasilform.index'); // PengajuanSurat -- PengajuanSurat (HasilForm ketika Save Simpan)
Route::get('/riwayatsurat', [PengajuanSuratController::class, 'riwayatsurat'])->name('riwayatsurat.index'); // PengajuanSurat -- RiwayatSurat

Route::get('/pengajuanlaporan/index', [PelaporanController::class, 'index'])->name('pengajuanlaporan.index'); // Pengajuan Surat -- Pengajuan Surat
Route::get('/hasilform', [PelaporanController::class, 'hasilform'])->name('pengajuansurat.hasilform.index'); // PengajuanSurat -- PengajuanSurat (HasilForm ketika Save Simpan)
Route::get('/riwayatlaporan', [PelaporanController::class, 'riwayatlaporan'])->name('riwayatlaporan.index'); // PengajuanSurat -- RiwayatSurat