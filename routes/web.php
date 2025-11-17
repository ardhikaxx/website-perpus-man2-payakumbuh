<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

Route::get('/auth/login', function () {
    return view('auth.login');
});

Route::get('/admin/dashboard', function () {
    return view('admin.dashboard.index');
})->name('admin.dashboard');

Route::get('/admin/manajemen-buku', function () {
    return view('admin.manajemen-buku.index');
})->name('admin.manajemen-buku');

Route::get('/admin/manajemen-anggota', function () {
    return view('admin.manajemen-anggota.index');
})->name('admin.manajemen-anggota');