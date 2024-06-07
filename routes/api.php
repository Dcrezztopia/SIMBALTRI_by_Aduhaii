<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BansosController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/data-warga/all', [AdminController::class, 'get_data_warga'])->name('data-warga.all');
Route::prefix('bansos')->group(function () {
    Route::get('kriteria', [BansosController::class, 'kriteria'])->name('bansos.kriteria');
    Route::post('kriteria', [BansosController::class, 'add_kriteria'])->name('bansos.kriteria.post');
    Route::get('kriteria-alt/{nama}/{id}', [BansosController::class, 'add_kriteria'])->name('bansos.kriteria.post');
    Route::delete('kriteria/{id}', [BansosController::class, 'delete_kriteria'])->name('bansos.kriteria.delete');
    Route::prefix('kriteria')->group(function () {
        Route::get('evaluasi', [BansosController::class, 'evaluasi_kriteria'])->name('bansos.kriteria.evaluasi');
    });
    Route::get('mapped-value', [BansosController::class, 'mapped_value'])->name('bansos.mapped-value');
    Route::get('perbandingan', [BansosController::class, 'perbandingan'])->name('bansos.perbandingan');
    Route::post('perbandingan', [BansosController::class, 'set_perbandingan'])->name('bansos.perbandingan.post');
    Route::post('perbandingan/set-multiple', [BansosController::class, 'set_multiple_perbandingan'])->name('bansos.perbandingan.set-multiple');
    Route::get('evaluasi', [BansosController::class, 'evaluasi'])->name('bansos.evaluasi');
});
