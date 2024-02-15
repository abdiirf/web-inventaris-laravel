<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SessionController;



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

Route::resource('/siswa', SiswaController::class);
Route::resource('/barang', BarangController::class);
Route::resource('/peminjaman', PeminjamanController::class);
Route::resource('/login', LoginController::class);

//login
Route::get('sesi', [SessionController::class, 'index']);
Route::post('sesi/login', [SessionController::class, 'login']);
Route::get('sesi/logout', [SessionController::class, 'logout']);
Route::post('/sesi/confirm-logout', [SessionController::class, 'confirmLogout']);
Route::get('sesi/register', [SessionController::class, 'register']);
Route::post('sesi/register', [SessionController::class, 'create']);
