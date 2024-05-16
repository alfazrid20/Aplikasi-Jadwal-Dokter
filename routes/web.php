<?php

use App\Http\Controllers\BeritaController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DetailKamarController;
use App\Http\Controllers\DokterController;
use App\Http\Controllers\JadwalDokterController;
use App\Http\Controllers\JamController;
use App\Http\Controllers\KamarController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\PoliController;
use App\Http\Controllers\LokerController;
use App\Http\Controllers\SetJamPraktekController;
use App\Http\Controllers\ViewController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use PhpParser\Node\Stmt\TryCatch;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
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
Route::get('/sejarah', [ViewController::class, 'sejarah'])->name('sejarah');
Route::get('/cek-kamar', [ViewController::class, 'cekkamar'])->name('cekkamar');
Route::get('/view-berita/{id}', [ViewController::class, 'berita'])->name('berita');
Route::get('/list-berita', [ViewController::class, 'listberita'])->name('listberita');
Route::get('/contact-us', [ViewController::class, 'contact'])->name('contact');

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
    // End Logout

    Route::get('/backend/dashboard', [DashboardController::class, 'index']);
    Route::get('/backend/profileuser', [DashboardController::class, 'profileuser'])->name('backend.profileuser');
    Route::get('/backend/panduan', [DashboardController::class, 'panduan']);


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

    // Kamar
    Route::get('/backend/kamar', [KamarController::class, 'index'])->name('backend.kamar.index');
    Route::get('/backend/kamar/create', [KamarController::class, 'create'])->name('backend.kamar.create');
    Route::post('/backend/kamar/store', [KamarController::class, 'store'])->name('backend.kamar.store');
    Route::get('/backend/kamar/{id}/edit', [KamarController::class, 'edit'])->name('backend.kamar.edit');
    Route::put('/backend/kamar/{id}/update', [KamarController::class, 'update'])->name('backend.kamar.update');
    Route::delete('/backend/kamar/{id}/delete', [KamarController::class, 'delete'])->name('backend.kamar.delete');
    Route::post('/backend/kamar/reset', [KamarController::class, 'reset'])->name('backend.kamar.reset');

    // End Kamar

    // Kamar
    Route::get('/backend/detail-kamar', [DetailKamarController::class, 'index'])->name('backend.detail-kamar.index');
    Route::get('/backend/detail-kamar/create', [DetailKamarController::class, 'create'])->name('backend.detail-kamar.create');
    Route::post('/backend/detail-kamar/store', [DetailKamarController::class, 'store'])->name('backend.detail-kamar.store');
    Route::get('/backend/detail-kamar/{id}/edit', [DetailKamarController::class, 'edit'])->name('backend.detail-kamar.edit');
    Route::put('/backend/detail-kamar/{id}/update', [DetailKamarController::class, 'update'])->name('backend.detail-kamar.update');
    Route::delete('/backend/detail-kamar/{id}/delete', [DetailKamarController::class, 'delete'])->name('backend.detail-kamar.delete');
    // End Kamar

    // Jadwal Dokter
    Route::get('/backend/jadwal-dokter', [JadwalDokterController::class, 'index'])->name('backend.jadwal-dokter.index');
    Route::get('/backend/jadwal-dokter/create', [JadwalDokterController::class, 'create'])->name('backend.jadwal-dokter.create');
    Route::post('/backend/jadwal-dokter/store', [JadwalDokterController::class, 'store'])->name('backend.jadwal-dokter.store');
    Route::get('/backend/jadwal-dokter/{id}/edit', [JadwalDokterController::class, 'edit'])->name('backend.jadwal-dokter.edit');
    Route::put('/backend/jadwal-dokter/{id}/update', [JadwalDokterController::class, 'update'])->name('backend.jadwal-dokter.update');
    Route::delete('/backend/jadwal-dokter/{id}/delete', [JadwalDokterController::class, 'delete'])->name('backend.jadwal-dokter.delete');
    Route::post('/backend/jadwal-dokter/reset', [JadwalDokterController::class, 'reset'])->name('backend.jadwal-dokter.reset');
    // End Jadwal Dokter

    // User
    Route::get('/backend/user', [UserController::class, 'index'])->name('backend.user.index');
    Route::get('/backend/user/create', [UserController::class, 'create'])->name('backend.user.create');
    Route::post('/backend/user/store', [UserController::class, 'store'])->name('backend.user.store');
    Route::get('/backend/user/{id}/edit', [UserController::class, 'edit'])->name('backend.user.edit');
    Route::put('/backend/user/{id}/update', [UserController::class, 'update'])->name('backend.user.update');
    Route::delete('/backend/user/{id}/delete', [UserController::class, 'delete'])->name('backend.user.delete');
    // Role
    Route::get('/backend/role', [UserController::class, 'roleindex'])->name('backend.role.index');
    Route::post('/backend/role/store', [UserController::class, 'storeRole'])->name('backend.role.store');
    Route::delete('/backend/role/{id}/delete', [UserController::class, 'deleteRole'])->name('backend.role.delete');
    // Permission
    Route::post('/backend/permission/store', [UserController::class, 'storePermission'])->name('backend.permission.store');
    Route::delete('/backend/permission/{id}/delete', [UserController::class, 'deletePermission'])->name('backend.permission.delete');
    // End User

    // Data Berita
    Route::get('/backend/data-berita', [BeritaController::class, 'index'])->name('backend.data-berita.index');
    Route::get('/backend/data-berita/create', [BeritaController::class, 'create'])->name('backend.data-berita.create');
    Route::post('/backend/data-berita/store', [BeritaController::class, 'store'])->name('backend.data-berita.store');
    Route::get('/backend/data-berita/{id}/edit', [BeritaController::class, 'edit'])->name('backend.data-berita.edit');
    Route::put('/backend/data-berita/{id}/update', [BeritaController::class, 'update'])->name('backend.data-berita.update');
    Route::delete('/backend/data-berita/{id}/delete', [BeritaController::class, 'delete'])->name('backend.data-berita.delete');
    // End Data Berita

    // Data Kategori
    Route::get('/backend/kategori', [KategoriController::class, 'index'])->name('backend.kategori.index');
    Route::get('/backend/kategori/create', [KategoriController::class, 'create'])->name('backend.kategori.create');
    Route::post('/backend/kategori/store', [KategoriController::class, 'store'])->name('backend.kategori.store');
    Route::get('/backend/kategori/{id}/edit', [KategoriController::class, 'edit'])->name('backend.kategori.edit');
    Route::put('/backend/kategori/{id}/update', [KategoriController::class, 'update'])->name('backend.kategori.update');
    Route::delete('/backend/kategori/{id}/delete', [KategoriController::class, 'delete'])->name('backend.kategori.delete');
    // End Data Kategori
    
    // Data Loker
    Route::get('/backend/loker', [LokerController::class, 'index'])->name('backend.loker.index');
    Route::get('/backend/loker/create', [LokerController::class, 'create'])->name('backend.loker.create');
    Route::post('/backend/loker/store', [LokerController::class, 'store'])->name('backend.loker.store');
    Route::get('/backend/loker/{id}/edit', [LokerController::class, 'edit'])->name('backend.loker.edit');
    Route::put('/backend/loker/{id}/update', [LokerController::class, 'update'])->name('backend.loker.update');
    Route::delete('/backend/loker/{id}/delete', [LokerController::class, 'delete'])->name('backend.loker.delete');
    // End Data Loker

});

Route::get('/createrolepermission', function(){
    try{
        Role::create(['name' => 'Marketing']);
        Permission::create(['name' => 'backend']); // Sesuaikan dengan nama permission yang diinginkan
        Permission::create(['name' => 'frontend']); // Sesuaikan dengan nama permission yang diinginkan
        echo "Sukses";  
    } catch(\Exception $e){
        echo "Error";
    }
});






