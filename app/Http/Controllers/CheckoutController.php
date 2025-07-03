<?php

namespace App\Http\Controllers;
use Midtrans\Snap;
use Midtrans\Transaction;
use Illuminate\Http\Request;
use App\Models\Transaksi;
use App\Models\CartItem;
use Carbon\Carbon;

class CheckoutController extends Controller
{
    public function show()
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

public function updateCheckout(Request $request)
{
    $validated = $request->validate([
        'username' => 'required|string|max:255',
        'alamat'   => 'required|string|max:255',
        'no_hp'    => 'required|string|max:20',
    ]);

    session(['checkout_user' => $validated]);

        return redirect()->route('checkout')->with('success', 'Informasi berhasil diperbarui.');
}

public function showCheckoutPage(Request $request)
{

    $user =session('user'); // Atau ambil dari session kalau kamu tidak pakai auth()
    $cartItems = CartItem::where('id_user', $user['id'])->get();    
    
    return view('Foodvana.checkout', compact('cartItems', 'user'));
}

public function finish() {
    return view('payment.finish');
}


// public function checkout(Request $request)
// {
//     if (!session()->has('user')) {
//         return redirect('/login')->with('error', 'Harap login terlebih dahulu.');
//     }

//     $request->validate([
//         'alamat' => 'required|string',
//         'no_hp' => 'required|string',
//         'payment_method' => 'required|string',
//         'total_harga' => 'required|numeric'
//     ]);

//     $userId = session('user')['id'];

//     // Simpan ke tabel transaksis
//     $transaksi = Transaksi::create([
//         'id_user' => $userId,
//         'total_harga' => $request->total_harga,
//         'alamat_pengiriman' => $request->alamat,
//         'no_hp' => $request->no_hp,
//         'metode_pembayaran' => $request->payment_method,
//         'status' => 'diproses',
//         'tanggal_transaksi' => Carbon::now(),
//     ]);

//     // Kosongkan cart setelah transaksi
//     CartItem::where('id_user', $userId)->delete();

//     return redirect('/cart_items')->with('success', 'Checkout berhasil!');
// }

    // public function payment()
    // {
    //     return view('checkout.payment');
    // }
}
