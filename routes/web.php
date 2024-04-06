<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DokterController;
use App\Http\Controllers\JadwalDokterController;
use App\Http\Controllers\PoliController;
use App\Http\Controllers\ViewController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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
    return view('frontend.index');
});


Route::get('/view-jadwal', [ViewController::class, 'index'])->name('view');

//Login

Route::middleware(['guest'])->group(function () {
    // Routes for guest users (unauthenticated users)
    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login', [LoginController::class, 'login'])->name('login.post');
});
// End Login

// Logout
Route::middleware(['auth'])->group(function () {
    // Routes for authenticated users
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
});
// End Logout

Route::get('/backend/dashboard', [DashboardController::class, 'index']);

// Data Poli
Route::get('/backend/data-poli', [PoliController::class, 'index'])->name('backend.data-poli.index');
Route::get('/backend/data-poli/create', [PoliController::class, 'create'])->name('backend.data-poli.create');
Route::post('/backend/data-poli/store', [PoliController::class, 'store'])->name('backend.data-poli.store');
Route::get('/backend/data-poli/{id}/edit', [PoliController::class, 'edit'])->name('backend.data-poli.edit');
Route::put('/backend/data-poli/{id}/update', [PoliController::class, 'update'])->name('backend.data-poli.update');
Route::delete('/backend/data-poli/{id}/delete', [PoliController::class, 'delete'])->name('backend.data-poli.delete');
// End Data Poli

// Data Dokter
Route::get('/backend/data-dokter', [DokterController::class, 'index'])->name('backend.data-dokter.index');
Route::get('/backend/data-dokter/create', [DokterController::class, 'create'])->name('backend.data-dokter.create');
Route::post('/backend/data-dokter/store', [DokterController::class, 'store'])->name('backend.data-dokter.store');
Route::get('/backend/data-dokter/{id}/edit', [DokterController::class, 'edit'])->name('backend.data-dokter.edit');
Route::put('/backend/data-dokter/{id}/update', [DokterController::class, 'update'])->name('backend.data-dokter.update');
Route::delete('/backend/data-dokter/{id}/delete', [DokterController::class, 'delete'])->name('backend.data-dokter.delete');
// End Data Dokter

// Jadwal Dokter
Route::get('/backend/jadwal-dokter', [JadwalDokterController::class, 'index'])->name('backend.jadwal-dokter.index');
Route::get('/backend/jadwal-dokter/create', [JadwalDokterController::class, 'create'])->name('backend.jadwal-dokter.create');
Route::post('/backend/jadwal-dokter/store', [JadwalDokterController::class, 'store'])->name('backend.jadwal-dokter.store');
Route::get('/backend/jadwal-dokter/{id}/edit', [JadwalDokterController::class, 'edit'])->name('backend.jadwal-dokter.edit');
Route::put('/backend/jadwal-dokter/{id}/update', [JadwalDokterController::class, 'update'])->name('backend.jadwal-dokter.update');
Route::delete('/backend/jadwal-dokter/{id}/delete', [JadwalDokterController::class, 'delete'])->name('backend.jadwal-dokter.delete');
// End Jadwal Dokter

// User
Route::get('/backend/user', [UserController::class, 'index'])->name('backend.user.index');
Route::get('/backend/user/create', [UserController::class, 'create'])->name('backend.user.create');
Route::post('/backend/user/store', [UserController::class, 'store'])->name('backend.user.store');
Route::get('/backend/user/{id}/edit', [UserController::class, 'edit'])->name('backend.user.edit');
Route::put('/backend/user/{id}/update', [UserController::class, 'update'])->name('backend.user.update');
Route::delete('/backend/user/{id}/delete', [UserController::class, 'delete'])->name('backend.user.delete');
// End User
