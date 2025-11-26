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
use App\Http\Controllers\UserController;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/kategori/{id}', [HomeController::class, 'byKategori'])->name('kategori.show');

Route::get('/detail/{id}', [HomeController::class, 'detail'])->name('detail');

// REGISTER
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.post');




Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('member')->group(function () {

    Route::get('/member/dashboard', function () {
        return view('member.dashboard');
    })->name('member.dashboard');


    Route::get('/member/kategori', [KategoriController::class, 'memberIndex'])
        ->name('member.kategori');

    Route::get('/member/index', [KategoriController::class, 'indexmember'])->name('member.index');


    Route::get('/member/produk/{toko}', [MemberProductController::class, 'index'])
        ->name('member.produk.index');


    Route::get('/member/produk/{toko}/create', [MemberProductController::class, 'create'])
        ->name('member.produk.create');

    Route::post('/member/produk/{toko}', [ProductController::class, 'store'])
        ->name('member.produk.str');

    Route::get('/member/produk/{toko}/{id}/edit', [MemberProductController::class, 'edit'])
        ->name('member.produk.edit');

    Route::put('/member/produk/{toko}/{id}', [MemberProductController::class, 'update'])
        ->name('member.produk.update');
    Route::delete('/member/produk/{toko}/{id}', [MemberProductController::class, 'destroy'])
        ->name('member.produk.destroy');


    Route::post('/member/logout', [AuthController::class, 'logout'])
        ->name('member.logout');

});


Route::middleware('admin')->group(function () {

    // Dashboard Admin
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])
        ->name('admin.dashboard');



    Route::resource('toko', TokoController::class);

    Route::get('/kategori-index', [KategoriController::class, 'index'])->name('kategori.index');
    Route::get('/kategori', [KategoriController::class, 'create'])->name('kategori.create');
    Route::get('/kategori-edit/{id}', [KategoriController::class, 'edit'])->name('kategori.edit');
    Route::get('/kategori-destroy/{id}', [KategoriController::class, 'destroy'])->name('kategori.destroy');


    Route::get('/produk/{id}', [HomeController::class, 'detail'])->name('produk.detail');



    Route::get('/admin/produk', [ProductController::class, 'index'])
        ->name('admin.produk.index');

     Route::get('/produk', [ProductController::class, 'index'])
        ->name('admin.produk.index');

    Route::delete('/admin/produk/{id}', [ProductController::class, 'destroy'])
        ->name('admin.produk.delete');

        Route::get('/admin/user', [UserController::class, 'index'])->name('admin.user.index');
        Route::get('/admin/user/create', [UserController::class, 'create'])->name('admin.user.create');
        Route::post('/admin/user', [UserController::class, 'store'])->name('admin.user.store');
        Route::post('/admin/kategori', [KategoriController::class, 'store'])->name('admin.kategori.store');
        Route::get('/admin/user/{id}/edit', [UserController::class, 'edit'])->name('admin.user.edit');
        Route::put('/admin/user/{id}', [UserController::class, 'update'])->name('admin.user.update');
        Route::delete('/admin/user/{id}', [UserController::class, 'destroy'])->name('admin.user.delete');

});
