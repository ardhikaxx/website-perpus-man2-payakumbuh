<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Controllers\PengunjungController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ManajemenAdminController;
use App\Http\Controllers\ManajemenBukuController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\PengaturanController;

Route::get('/', function () {
    return view('index');
})->name('home');

Route::post('/pengunjung', [PengunjungController::class, 'store'])->name('pengunjung.store');
Route::get('/pengunjung/hari-ini', [PengunjungController::class, 'getPengunjungHariIni'])->name('pengunjung.hari-ini');

Route::get('/auth/login', [AuthController::class, 'showLoginForm'])->name('admin.login');
Route::post('/auth/login', [AuthController::class, 'login'])->name('admin.login.submit');
Route::post('/auth/logout', [AuthController::class, 'logout'])->name('admin.logout');

Route::middleware([AdminMiddleware::class])->group(function () {

    Route::prefix('admin')->name('admin.')->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

        Route::get('/manajemen-buku', [ManajemenBukuController::class, 'index'])->name('manajemen-buku');
        Route::post('/manajemen-buku', [ManajemenBukuController::class, 'store'])->name('manajemen-buku.store');
        Route::get('/manajemen-buku/{id}', [ManajemenBukuController::class, 'show'])->name('manajemen-buku.show');
        Route::put('/manajemen-buku/{id}', [ManajemenBukuController::class, 'update'])->name('manajemen-buku.update');
        Route::delete('/manajemen-buku/{id}', [ManajemenBukuController::class, 'destroy'])->name('manajemen-buku.destroy');

        Route::get('/manajemen-admin', [ManajemenAdminController::class, 'index'])->name('manajemen-admin');
        Route::post('/manajemen-admin', [ManajemenAdminController::class, 'store'])->name('manajemen-admin.store');
        Route::get('/manajemen-admin/{id}', [ManajemenAdminController::class, 'show'])->name('manajemen-admin.show');
        Route::put('/manajemen-admin/{id}', [ManajemenAdminController::class, 'update'])->name('manajemen-admin.update');
        Route::delete('/manajemen-admin/{id}', [ManajemenAdminController::class, 'destroy'])->name('manajemen-admin.destroy');

        Route::get('/laporan', [LaporanController::class, 'index'])->name('laporan');
        Route::get('/laporan/export', [LaporanController::class, 'export'])->name('laporan.export');

        Route::get('/pengaturan', [PengaturanController::class, 'index'])->name('pengaturan');
        Route::post('/pengaturan/update-profile', [PengaturanController::class, 'updateProfile'])->name('pengaturan.update-profile');
        Route::post('/pengaturan/update-password', [PengaturanController::class, 'updatePassword'])->name('pengaturan.update-password');
    });
});