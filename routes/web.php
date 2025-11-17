<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Controllers\PengunjungController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ManajemenAdminController;

Route::get('/', function () {
    return view('index');
})->name('home');

Route::post('/pengunjung', [PengunjungController::class, 'store'])->name('pengunjung.store');
Route::get('/pengunjung/hari-ini', [PengunjungController::class, 'getPengunjungHariIni'])->name('pengunjung.hari-ini');

Route::get('/auth/login', [AuthController::class, 'showLoginForm'])->name('admin.login');
Route::post('/auth/login', [AuthController::class, 'login'])->name('admin.login.submit');
Route::post('/auth/logout', [AuthController::class, 'logout'])->name('admin.logout');

Route::middleware([AdminMiddleware::class])->group(function () {
    Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

    Route::get('/admin/manajemen-buku', function () {
        return view('admin.manajemen-buku.index');
    })->name('admin.manajemen-buku');

    Route::prefix('admin')->name('admin.')->group(function () {
        Route::get('/manajemen-admin', [ManajemenAdminController::class, 'index'])->name('manajemen-admin');
        Route::post('/manajemen-admin', [ManajemenAdminController::class, 'store'])->name('manajemen-admin.store');
        Route::get('/manajemen-admin/{id}', [ManajemenAdminController::class, 'show'])->name('manajemen-admin.show');
        Route::put('/manajemen-admin/{id}', [ManajemenAdminController::class, 'update'])->name('manajemen-admin.update');
        Route::delete('/manajemen-admin/{id}', [ManajemenAdminController::class, 'destroy'])->name('manajemen-admin.destroy');
    });

    Route::get('/admin/laporan', function () {
        return view('admin.laporan.index');
    })->name('admin.laporan');

    Route::get('/admin/pengaturan', function () {
        return view('admin.pengaturan.index');
    })->name('admin.pengaturan');
});