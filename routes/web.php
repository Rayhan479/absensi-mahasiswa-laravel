<?php

use App\Http\Controllers\AbsensiManualController;
use App\Http\Controllers\Admin\KelasController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProfilMahasiswaController;
use Illuminate\Support\Facades\Route;

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





Route::middleware('auth')->group(function () {
    // Dashboard Mahasiswa
    Route::middleware('role:mahasiswa')->group(function () {
        Route::get('login', [AuthenticatedSessionController::class, 'create'])->name('login');
        Route::post('login', [AuthenticatedSessionController::class, 'store']);
        Route::get('/mahasiswa/dashboard', [MahasiswaController::class, 'dashboard'])->name('mahasiswa.dashboard');
        Route::get('/mahasiswa/absensi-manual', [AbsensiManualController::class, 'create'])->name('mahasiswa.absensi.manual.create');
        Route::post('/mahasiswa/absensi-manual', [AbsensiManualController::class, 'store'])->name('mahasiswa.absensi.manual.store');
        Route::get('/mahasiswa/profil', [ProfilMahasiswaController::class, 'show'])->name('mahasiswa.profil');
        Route::put('/mahasiswa/profil', [ProfilMahasiswaController::class, 'update'])->name('mahasiswa.profil.update');
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
        Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

    });

    // Dashboard Admin
    Route::middleware('role:admin')->group(function () {
        Route::resource('mahasiswa', MahasiswaController::class);
        Route::resource('kelas', KelasController::class);
        Route::get('login', [AuthenticatedSessionController::class, 'create'])->name('login');
        Route::post('login', [AuthenticatedSessionController::class, 'store']);
        Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

        Route::get('/admin/data-mahasiswa', [MahasiswaController::class, 'index'])->name('admin.data-mahasiswa');
        // Route::post('/admin/tambah-mahasiswa', [MahasiswaController::class, 'store'])->name('mahasiswa.data-mahasiswa.store');

        Route::get('/admin/tambah-mahasiswa', [MahasiswaController::class, 'create'])->name('admin.tambah-mahasiswa');
        Route::post('/admin/tambah-mahasiswa', [MahasiswaController::class, 'store'])->name('admin.store-mahasiswa');





        Route::get('/admin/absensi-manual', [AbsensiManualController::class, 'index'])->name('admin.absensi.index');  // Untuk melihat absensi manual
        Route::get('/admin/profil', [ProfileController::class, 'edit'])->name('admin.profile.edit');
        Route::patch('/admin/profil', [ProfileController::class, 'update'])->name('admin.profile.update');
        Route::delete('/admin/profil', [ProfileController::class, 'destroy'])->name('admin.profile.destroy');
        Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

    });
});









require __DIR__.'/auth.php';
