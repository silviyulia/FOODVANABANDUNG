<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\FoodvanaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\KontakController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\PesananController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\KulinerController;
use App\Http\Controllers\CartItemController;
use App\Http\Controllers\CheckoutController;

// Login & Register
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/register', [RegisterController::class, 'show'])->name('register');
Route::post('/register', [RegisterController::class, 'register'])->name('register.process');

// Public
Route::get('/Foodvana', [FoodvanaController::class, 'index'])->name('foodvana.index');
Route::get('/kontak', [KontakController::class, 'index'])->name('kontak.index');
Route::post('/kontak', [KontakController::class, 'store'])->name('kontak.store');
Route::get('/menu', [MenuController::class, 'index'])->name('menu.index');

// Session-based Role Check
Route::get('/dashboard', function (Request $request) {
    $user = $request->session()->get('user');
    if (!$user || $user['role'] !== 'admin') {
        return redirect('/login')->with('error', 'Akses hanya untuk admin');
    }
    return app(DashboardController::class)->index();
})->name('dashboard');



Route::get('/Foodvana/home', function (Request $request) {
    if (!$request->session()->has('user')) {
        return redirect('/login')->with('error', 'Silakan login terlebih dahulu.');
    }
    return app(FoodvanaController::class)->home();
})->name('Foodvana.home');

// Keranjang, Kontak, Menu
Route::get('/kontak2', [KontakController::class, 'home'])->name('kontak2.home');
Route::resource('kuliner', KulinerController::class);

Route::get('/cart_items', function (Request $request) {
    if (!$request->session()->has('user')) return redirect('/login');
    return app(CartItemController::class)->index();
})->name('cartitem.index');

Route::post('/cart_items', [CartItemController::class, 'store'])->name('cartitem.store');
Route::delete('/cart_items/{id}', [CartItemController::class, 'destroy'])->name('cartitem.destroy');
Route::post('/cart_items/checkout', [CartItemController::class, 'checkout'])->name('cartitem.checkout');
Route::put('/cart_items/{id}', [CartItemController::class, 'update'])->name('cartitem.update');

Route::post('/Foodvana/checkout', function (Request $request) {
    if (!$request->session()->has('user')) return redirect('/login');
    return app(CheckoutController::class)->index();
})->name('checkout');

Route::get('/checkout', function (Request $request) {
    if (!$request->session()->has('user')) return redirect('/login');
    return app(CheckoutController::class)->index();
})->name('checkout.index');

Route::get('/menu2', [MenuController::class, 'home'])->name('menu.home');
Route::get('/pesanan', [PesananController::class, 'pesanan'])->name('pesanan.index');

// Profil
Route::get('/profil', function (Request $request) {
    if (!$request->session()->has('user')) return redirect('/login');
    return app(ProfilController::class)->show();
})->name('profil.show');

Route::get('/profil/edit', function (Request $request) {
    if (!$request->session()->has('user')) return redirect('/login');
    return app(ProfilController::class)->edit();
})->name('profil.edit');


Route::post('/profil/update', function (Request $request) {
    if (!$request->session()->has('user')) return redirect('/login');
    return app(ProfilController::class)->update($request);
})->name('profil.update');


// Order
Route::get('/order/{id}/edit', function (Request $request, $id) {
    if (!$request->session()->has('user')) return redirect('/login');
    return app(OrderController::class)->edit($id);
})->name('order.edit');

Route::put('/order/{id}', function (Request $request, $id) {
    if (!$request->session()->has('user')) return redirect('/login');
    return app(OrderController::class)->update($request, $id);
})->name('order.update');

// Test session
Route::get('/test', function (Request $request) {
    return $request->session()->has('user') ? $request->session()->get('user') : 'Belum login';
});
