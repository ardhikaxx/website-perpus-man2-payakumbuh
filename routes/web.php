<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Middleware\AdminMiddleware;

Route::get('/', function () {
    return view('index');
})->name('home');

Route::get('/auth/login', [AuthController::class, 'showLoginForm'])->name('admin.login');
Route::post('/auth/login', [AuthController::class, 'login'])->name('admin.login.submit');
Route::post('/auth/logout', [AuthController::class, 'logout'])->name('admin.logout');

Route::middleware([AdminMiddleware::class])->group(function () {
    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard.index');
    })->name('admin.dashboard');

    Route::get('/admin/manajemen-buku', function () {
        return view('admin.manajemen-buku.index');
    })->name('admin.manajemen-buku');

    Route::get('/admin/manajemen-admin', function () {
        return view('admin.manajemen-admin.index');
    })->name('admin.manajemen-admin');

    Route::get('/admin/laporan', function () {
        return view('admin.laporan.index');
    })->name('admin.laporan');

    Route::get('/admin/pengaturan', function () {
        return view('admin.pengaturan.index');
    })->name('admin.pengaturan');
});