<?php

use App\Http\Controllers\BeritaResmiController;
use App\Http\Controllers\GrafikController;
use App\Http\Controllers\IndikatorStrategisController;
use App\Http\Controllers\InfografisController;
use App\Http\Controllers\PublikasiController;
use App\Http\Controllers\TabelController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/berita/{id}', [BeritaResmiController::class, 'apiShow']);
Route::get('/berita-all', [BeritaResmiController::class, 'apiIndex']);
Route::get('/grafik/{id}', [GrafikController::class, 'apiShow']);
Route::get('/grafik-all', [GrafikController::class, 'apiIndex']);
Route::get('/indikator/{id}', [IndikatorStrategisController::class, 'apiShow']);
Route::get('/indikator-all', [IndikatorStrategisController::class, 'apiIndex']);
Route::get('/tabel/{id}', [TabelController::class, 'apiShow']);
Route::get('/tabel-all', [TabelController::class, 'apiIndex']);
Route::get('/publikasi/{id}', [PublikasiController::class, 'apiShow']);
Route::get('/publikasi-all', [PublikasiController::class, 'apiIndex']);
Route::get('/infografis/{id}', [InfografisController::class, 'apiShow']);
Route::get('/infografis-all', [InfografisController::class, 'apiIndex']);
