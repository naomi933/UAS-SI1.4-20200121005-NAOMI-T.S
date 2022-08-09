<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\MatakuliahController;
use App\Http\Controllers\JadwalKuliahController;
use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\KontrakController;
use App\Http\Controllers\SemesterController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

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

Route::get('/dashboard', function () {
    return view('index');
})->middleware(['admin'])->name('dashboard');

Route::resource('/mahasiswa', MahasiswaController::class)->middleware(['admin']);
Route::resource('/matakuliah', MatakuliahController::class)->middleware(['admin']);
Route::resource('/jadwal', JadwalKuliahController::class)->middleware(['admin']);
Route::resource('/absensi', AbsensiController::class)->middleware(['admin']);
Route::resource('/kontrak', KontrakController::class)->middleware(['admin']);
Route::resource('/semester', SemesterController::class)->middleware(['admin']);

Route::get('/test', function(){
    return view('tester');
})->middleware('mahasiswa');

Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
                ->middleware('admin')
                ->name('logout');



require __DIR__.'/auth.php';
