<?php

use App\Http\Controllers\BeritaResmiController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GrafikController;
use App\Http\Controllers\IndikatorStrategisController;
use App\Http\Controllers\InfografisController;
use App\Http\Controllers\PublikasiController;
use App\Http\Controllers\TabelController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('auth');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('grafik', GrafikController::class);
Route::resource('publikasi', PublikasiController::class);
Route::resource('tabel', TabelController::class);
Route::resource('berita', BeritaResmiController::class);
Route::resource('infografis', InfografisController::class);
Route::resource('indikator', IndikatorStrategisController::class);