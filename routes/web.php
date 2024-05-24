<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\LayoutController;
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

Route::get('/', [LayoutController::class, 'all'])->name('layout.all');
Route::get('/pengajuansurat/index', [PengajuanSuratController::class, 'index'])->name('pengajuansurat.index');
Route::get('/pengajuansurat/riwayatsurat/index', [PengajuanSuratController::class, 'riwayatsurat'])->name('pengajuansurat.riwayatsurat.index');
Route::get('/riwayatsurat', [PengajuanSuratController::class, 'riwayatsurat'])->name('riwayatsurat.index');
Route::get('/hasilform', [PengajuanSuratController::class, 'hasilform'])->name('pengajuansurat.hasilform.index');
