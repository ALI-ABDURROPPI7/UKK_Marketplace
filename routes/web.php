<?php

use Illuminate\Support\Facades\Route;

// Controller
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TokoController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\MemberProductController;

// =======================
// HALAMAN UTAMA
// =======================
Route::get('/', [HomeController::class, 'index'])->name('home');


// =======================
// AUTH
// =======================
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');

// Logout global (POST)
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


// =======================
// MEMBER AREA
// =======================
Route::middleware('member')->group(function () {

    // Dashboard Member
    Route::get('/member/dashboard', function () {
        return view('member.dashboard');
    })->name('member.dashboard');

    // MEMBER hanya LIHAT toko
    Route::get('/member/toko', [TokoController::class, 'memberIndex'])
        ->name('member.toko');

    // MEMBER hanya LIHAT kategori
    Route::get('/member/kategori', [KategoriController::class, 'memberIndex'])
        ->name('member.kategori');

    // MEMBER CRUD produk
    Route::resource('/member/produk', MemberProductController::class);

    // Logout
    Route::post('/member/logout', [AuthController::class, 'logout'])
        ->name('member.logout');
});


// =======================
// ADMIN AREA
// =======================
Route::middleware('admin')->group(function () {

    // Dashboard Admin
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])
        ->name('admin.dashboard');

    // ADMIN CRUD toko
    Route::resource('toko', TokoController::class);

    // ADMIN CRUD kategori
    Route::resource('kategori', KategoriController::class);

    // ADMIN melihat semua produk + bisa hapus
    Route::get('/admin/produk', [ProductController::class, 'index'])
        ->name('admin.produk.index');

    Route::delete('/admin/produk/{id}', [ProductController::class, 'destroy'])
        ->name('admin.produk.delete');
});
