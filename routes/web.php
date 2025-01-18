<?php

use App\Http\Controllers\AbsensiManualController;
use App\Http\Controllers\Admin\KelasController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminManagementController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\JadwalKuliahController;
use App\Http\Controllers\JadwalMahasiswaController;
use App\Http\Controllers\LaporanController;
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
        Route::get('/mahasiswa/jadwal', [JadwalMahasiswaController::class, 'index'])->name('mahasiswa.jadwal');
        Route::get('/mahasiswa/riwayat-absensi', [AbsensiManualController::class, 'riwayatAbsensi'])->name('mahasiswa.riwayat.absensi');

        Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

    });

    // Dashboard Admin
    Route::middleware('role:admin')->group(function () {
        Route::resource('mahasiswa', MahasiswaController::class);
        Route::resource('kelas', KelasController::class);
        Route::get('login', [AuthenticatedSessionController::class, 'create'])->name('login');
        Route::post('login', [AuthenticatedSessionController::class, 'store']);
        Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

        Route::prefix('admin')->name('admin.')->middleware(['auth', 'admin'])->group(function () {
            Route::get('/profil', [AdminController::class, 'showProfile'])->name('profil.show');
            Route::put('/profil', [AdminController::class, 'updateProfile'])->name('profil.update');
        });



        Route::prefix('admin/manajemen-jadwal')->name('admin.manajemen-jadwal.')->group(function () {
            Route::get('/', [JadwalKuliahController::class, 'index'])->name('index');
            Route::get('/tambah-jadwal', [JadwalKuliahController::class, 'create'])->name('create'); // Route untuk form tambah jadwal
            Route::post('/', [JadwalKuliahController::class, 'store'])->name('store'); // Route untuk simpan jadwal baru
            Route::get('/{id}/edit', [JadwalKuliahController::class, 'edit'])->name('edit');
            Route::put('/{id}', [JadwalKuliahController::class, 'update'])->name('update');
            Route::delete('/{id}', [JadwalKuliahController::class, 'destroy'])->name('destroy');
        });

        Route::prefix('admin/laporan')->name('admin.laporan.')->group(function () {
            Route::get('/', [LaporanController::class, 'index'])->name('index'); // Halaman laporan
            Route::get('/generate', [LaporanController::class, 'generate'])->name('generate'); // Hasil laporan
        });




        Route::get('/admin/data-mahasiswa', [MahasiswaController::class, 'index'])->name('admin.data-mahasiswa');
        // Route::post('/admin/tambah-mahasiswa', [MahasiswaController::class, 'store'])->name('mahasiswa.data-mahasiswa.store');

        Route::get('/admin/tambah-mahasiswa', [MahasiswaController::class, 'create'])->name('admin.tambah-mahasiswa');
        Route::post('/admin/tambah-mahasiswa', [MahasiswaController::class, 'store'])->name('admin.store-mahasiswa');

        Route::prefix('admin/manajemen-admin')->name('admin.manajemen-admin.')->middleware('auth')->group(function () {
            Route::get('/', [AdminManagementController::class, 'index'])->name('index');
            Route::get('/tambah-admin', [AdminManagementController::class, 'create'])->name('create');
            Route::post('/tambah-admin', [AdminManagementController::class, 'store'])->name('store');
        });



        Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {
            Route::get('/absensi/pending', [AdminController::class, 'managePendingAbsensi'])->name('admin.absensi.pending');
            Route::put('/absensi/approve/{id}', [AdminController::class, 'approve'])->name('admin.absensi.approve');
            Route::delete('/absensi/reject/{id}', [AdminController::class, 'reject'])->name('admin.absensi.reject');
        });



        // Route::get('/manajemen-absensi', [AbsensiManualController::class, 'index'])->name('admin.manajemen-absensi');
        // Route::post('/manajemen-absensi/izin/{id}', [AbsensiManualController::class, 'beriIzin'])->name('admin.manajemen-absensi.beri-izin');
        // Route::delete('/manajemen-absensi/hapus/{id}', [AbsensiManualController::class, 'hapusAbsensi'])->name('admin.manajemen-absensi.hapus');


        Route::get('/admin/absensi-manual', [AbsensiManualController::class, 'index'])->name('admin.absensi.index');  // Untuk melihat absensi manual
        // Route::get('/admin/profil', [ProfileController::class, 'edit'])->name('admin.profile.edit');
        // Route::patch('/admin/profil', [ProfileController::class, 'update'])->name('admin.profile.update');
        // Route::delete('/admin/profil', [ProfileController::class, 'destroy'])->name('admin.profile.destroy');
        Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

    });
});









require __DIR__.'/auth.php';
