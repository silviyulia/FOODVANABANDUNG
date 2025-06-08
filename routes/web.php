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

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('loginprocess');


Route::get('/register', [RegisterController::class, 'show'])->name('register');
Route::post('/register', [RegisterController::class, 'register'])->name('register.process');


Route::resource('Foodvana',FoodvanaController::class);

Route::get('/kontak', [KontakController::class, 'index'])->name('kontak.index');
Route::post('/kontak', [KontakController::class, 'store'])->name('kontak.store');

Route::get('/profil', [ProfilController::class, 'index']);
Route::get('/profil', [ProfilController::class, 'index'])->name('profil.show');
Route::get('/profil/edit', [ProfilController::class, 'edit'])->name('profil.edit');
Route::post('/profil/update', [ProfilController::class, 'update'])->name('profil.update');

Route::get('/menu', [MenuController::class, 'index'])->name('menu');


Route::get('/pesanan', [PesananController::class, 'pesanan']);

Route::middleware(['auth', 'cekrole:admin'])->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index']);
});

Route::middleware(['auth', 'cekrole:user'])->group(function () {
    Route::get('/user.home', [UserController::class, 'index']);
});


Route::get('/order/{id}/edit', [OrderController::class, 'edit'])->name('order.edit');
Route::put('/order/{id}', [OrderController::class, 'update'])->name('order.update');
