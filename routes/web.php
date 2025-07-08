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
use App\Http\Controllers\MidtransSnapController;
use App\Http\Controllers\TransaksiController;

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

// dashboard admin
Route::get('/dashboard', function (Request $request) {
    $user = $request->session()->get('user');
    if (!$user || $user['role'] !== 'admin') {
        return redirect('/login')->with('error', 'Akses hanya untuk admin');
    }
    return app(DashboardController::class)->index();
})->name('dashboard');

Route::get('/admin/users', [AdminController::class, 'table'])->name('admin.table');
Route::get('/admin/kontaks', [AdminController::class, 'kontak'])->name('admin.kontak');
Route::resource('admin' , AdminController::class);


// halaman utama user
Route::get('/Foodvana/home', function (Request $request) {
    if (!$request->session()->has('user')) {
        return redirect('/login')->with('error', 'Silakan login terlebih dahulu.');
    }
    return app(FoodvanaController::class)->home();
})->name('Foodvana.home');

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
Route::put('/cartitem/{id}', [CartItemController::class, 'update'])->name('cartitem.update');

Route::get('/menu2', [MenuController::class, 'home'])->name('menu.home'); 


//halaman checkout
Route::post('checkout', function (Request $request) {
    if (!$request->session()->has('user')) return redirect('/login');
    return app(CheckoutController::class)->show();
})->name('checkout');

Route::post('/checkout/update', [CheckoutController::class, 'updateCheckout'])->name('checkout.update');
Route::get('/checkout', [CheckoutController::class, 'showCheckoutPage'])->name('checkout');


Route::post('/checkout.process', [MidtransSnapController::class, 'createTransaction'])->name('checkout.process');
Route::get('/payment/finish', [MidtransController::class, 'paymentFinish']);
Route::post('/midtrans/notification', [MidtransSnapController::class, 'handleNotification']);


// pesanan
Route::get('/pesanan', [PesananController::class, 'index']);
Route::get('/pesanan/{id}', [PesananController::class, 'show'])->name('pesanan.show');
Route::get('/pesanan/{id}/cetak-struk', [App\Http\Controllers\PesananController::class, 'cetakStruk'])->name('pesanan.cetak-struk');

// Test session
Route::get('/test', function (Request $request) {
    return $request->session()->has('user') ? $request->session()->get('user') : 'Belum login';
});


// // Order
// Route::get('/order/{id}/edit', function (Request $request, $id) {
//     if (!$request->session()->has('user')) return redirect('/login');
//     return app(OrderController::class)->edit($id);
// })->name('order.edit');

// Route::put('/order/{id}', function (Request $request, $id) {
//     if (!$request->session()->has('user')) return redirect('/login');
//     return app(OrderController::class)->update($request, $id);
// })->name('order.update');

// // Route::get('payment.success',[MidtransSnapController::class,'success'])->name(payment.success);
// Route::get('/cancel', [MidtransSnapController::class, 'cancel'])-> name('cancel');
// Route::get('/callback', [MidtransSnapController::class, 'callback'])-> name('callback');