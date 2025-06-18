<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\FoodvanaController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\KontakController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\PesananController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KulinerController;
use App\Http\Controllers\CartItemController;

// Authentication Routes
Route::middleware('web')->group(function () {
    
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/register', [RegisterController::class, 'show'])->name('register');
Route::post('/register', [RegisterController::class, 'register'])->name('register.process');

});


// Public Routes
Route::get('/Foodvana', [FoodvanaController::class, 'index'])->name('foodvana.index');
Route::get('/user/home', [UserController::class, 'index'])->name('user.home'); 
Route::get('/kontak', [KontakController::class, 'index'])->name('kontak.index');
Route::post('/kontak', [KontakController::class, 'store'])->name('kontak.store');
Route::get('/menu', [MenuController::class, 'index'])->name('menu.index');

// Admin Routes
Route::middleware(['auth','cekrole:admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});

// Authenticated User Routes
Route::middleware(['auth','cekrole:user'])->group(function () {
    Route::get('/Foodvana/home', [FoodvanaController::class, 'home'])->name('Foodvana.home');
Route::get('/kontak2', [KontakController::class, 'home'])->name('kontak2.home');
    Route::resource('kuliner', KulinerController::class);
    Route::get('/cart_items', [CartItemController::class, 'index'])->name('cartitem.index');
    Route::delete('/cart_items/{id}', [CartItemController::class, 'destroy'])->name('cartitem.destroy');
    Route::post('/cart_items/checkout', [CartItemController::class, 'checkout'])->name('cartitem.checkout');
    Route::post('/cart_items', [CartItemController::class, 'store'])->name('cartitem.store');
    
    Route::get('/menu2', [MenuController::class, 'home'])->name('menu.home');
    
    Route::get('/pesanan', [PesananController::class, 'pesanan'])->name('pesanan.index');
    
    Route::get('/profil', [ProfilController::class, 'show'])->name('profil.show');
    Route::get('/profil/edit', [ProfilController::class, 'edit'])->name('profil.edit');
    Route::post('/profil/update', [ProfilController::class, 'update'])->name('profil.update');
    
    Route::get('/order/{id}/edit', [OrderController::class, 'edit'])->name('order.edit');
    Route::put('/order/{id}', [OrderController::class, 'update'])->name('order.update');
});    

    


Route::get('/test', function () {
route    (Auth::check(), Auth::user());
});

Route::get('/test-login', function () {
    return Auth::check() ? Auth::user() : 'Belum login';
});

