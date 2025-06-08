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

Route::get('/', [HomeController::class, 'index']);

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.process');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');


Route::get('/register', [RegisterController::class, 'show'])->name('register');
Route::post('/register', [RegisterController::class, 'register'])->name('register.process');


Route::get('/Foodvana',[FoodvanaController::class,'index'])->name('Foodvana.index');


Route::get('/kontak', [KontakController::class, 'index'])->name('kontak.index');

Route::post('/kontak', [KontakController::class, 'store'])->name('kontak.store');

Route::get('/profil', [ProfilController::class, 'show'])->name('profil.show');
Route::get('/profil/edit', [ProfilController::class, 'edit'])->name('profil.edit');
Route::put('/profil/update', [ProfilController::class, 'update'])->name('profil.update');

Route::get('/menu', [MenuController::class, 'index'])->name('menu.index');


Route::get('/Foodvana/{id}/editpesanan', [PesananController::class, 'edit'])->name('editpesanan');



Route::middleware(['auth', 'cekrole:user'])->group(function () {
    Route::get('/home', [UserController::class, 'index'])->name('home');
    Route::get('/menu2', [UserController::class, 'menu']);
    Route::get('/pesanan', [UserController::class, 'pesanan']);
    Route::get('/kontak2', [UserController::class, 'kontak']);
});

Route::middleware(['auth', 'cekrole:admin'])->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
});


