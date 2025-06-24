<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaksi;
use App\Models\CartItem;
use Carbon\Carbon;

class CheckoutController extends Controller
{
    public function index()
{
    if (!session()->has('user')) {
        return redirect('/login')->with('error', 'Harap login terlebih dahulu.');
    }

    $userId = session('user')['id'];

    $cartItems = CartItem::with('menu')
        ->where('id_user', $userId)
        ->get();

    $user = session('user');
    return view('Foodvana.checkout', compact('cartItems','user'));
}

  

public function checkout(Request $request)
{
    if (!session()->has('user')) {
        return redirect('/login')->with('error', 'Harap login terlebih dahulu.');
    }

    $request->validate([
        'alamat' => 'required|string',
        'no_hp' => 'required|string',
        'payment_method' => 'required|string',
        'total_harga' => 'required|numeric'
    ]);

    $userId = session('user')['id'];

    // Simpan ke tabel transaksis
    $transaksi = Transaksi::create([
        'id_user' => $userId,
        'total_harga' => $request->total_harga,
        'alamat_pengiriman' => $request->alamat,
        'no_hp' => $request->no_hp,
        'metode_pembayaran' => $request->payment_method,
        'status' => 'diproses',
        'tanggal_transaksi' => Carbon::now(),
    ]);

    // Kosongkan cart setelah transaksi
    CartItem::where('id_user', $userId)->delete();

    return redirect('/cart_items')->with('success', 'Checkout berhasil!');
}

    public function payment()
    {
        return view('checkout.payment');
    }
}
