<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
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

Route::get('/login', [LoginController::class, 'showLoginForm'])->middleware('guest')->name('login');
Route::post('/login', [LoginController::class, 'login'])->middleware('guest')->name('loginprocess');


Route::get('/register', [RegisterController::class, 'show'])->name('register');
Route::post('/register', [RegisterController::class, 'register'])->name('register.process');


Route::get('/Foodvana', [FoodvanaController::class, 'index'])->name('Foodvana.index');
Route::get('/Foodvana.home', [FoodvanaController::class, 'home'])->name('Foodvana.home');




Route::get('/kontak', [KontakController::class, 'index'])->name('kontak.index');
Route::get('/kontak2', [KontakController::class, 'home'])->name('konntak.home');
Route::post('/kontak', [KontakController::class, 'store'])->name('kontak.store');

 Route::get('/profil', [ProfilController::class, 'show'])->middleware('auth')->name('profil.show');
 Route::get('/profil/edit', [ProfilController::class, 'edit'])->middleware('auth')->name('profil.edit');
 Route::post('/profil/update', [ProfilController::class, 'update'])->middleware('auth')->name('profil.update');

Route::get('/menu', [MenuController::class, 'index'])->name('menu');
Route::get('/menu2', [MenuController::class, 'home'])->name('menu.home');


Route::get('/pesanan', [PesananController::class, 'pesanan']);

Route::middleware(['auth', 'cekrole:admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
});

Route::middleware(['auth', 'cekrole:user'])->group(function () {
    Route::get('/user.home', [UserController::class, 'index']);
    
});
    

Route::get('/order/{id}/edit', [OrderController::class, 'edit'])->name('order.edit');
Route::put('/order/{id}', [OrderController::class, 'update'])->name('order.update');



Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard.index');