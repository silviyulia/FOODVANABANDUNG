<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CartItem;

class CartItemController extends Controller
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

        

        return view('cart_items', compact('cartItems'));
    }

    public function destroy($id)
    {
        if (!session()->has('user')) {
            return redirect('/login')->with('error', 'Harap login terlebih dahulu.');
        }
        $userId = session('user')['id']; 
        $item = CartItem::where('id_user', $userId)->findOrFail($id);
        $item->delete();

        return back()->with('success', 'Item berhasil dihapus dari keranjang.');
    }

  

public function checkout(Request $request)
{
    if (!session()->has('user')) {
        return redirect('/login')->with('error', 'Harap login terlebih dahulu.');
    }

    $userId = session('user')['id'];

    // Ambil semua item cart user
    $cartItems = CartItem::with('menu')->where('id_user', $userId)->get();

    if ($cartItems->isEmpty()) {
        return redirect()->route('cartitem.index')->with('error', 'Keranjang kamu kosong!');
    }

    // Simpan ke tabel transaksi
    foreach ($cartItems as $item) {
        Transaksi::create([
            'id_user' => $userId,
            'id_menu' => $item->id_menu,
            'jumlah' => $item->jumlah,
            'total_harga' => $item->jumlah * $item->menu->harga,
            'status' => 'pending',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }

    // Hapus cart setelah berhasil simpan transaksi
    CartItem::where('id_user', $userId)->delete();

    return redirect()->route('checkout.index')->with('success', 'Checkout berhasil! Silakan lanjut ke pembayaran.');
}



    public function store(Request $request)
    {
        if (!session()->has('user')) {
            return redirect('/login')->with('error', 'Harap login terlebih dahulu.');
        }

        $userId = session('user')['id']; 

        $request->validate([
            'id_menu' => 'required|exists:menus,id',
            'jumlah' => 'required|integer|min:1'
        ]);

        CartItem::create([
            'id_user' => $userId,
            'id_menu' => $request->id_menu,
            'jumlah' => $request->jumlah,
            'added_at' => now()
        ]);

        return back()->with('success', 'Berhasil ditambahkan ke keranjang!');
    }
    public function update(Request $request, $id)
{
    $cartItem = CartItem::findOrFail($id);

    $action = $request->input('action');
    $jumlah = $cartItem->jumlah;

    if ($action === 'increase') {
        $jumlah += 1;
    } elseif ($action === 'decrease') {
        if ($jumlah > 1) {
            $jumlah -= 1;
        }
    } else {
        // Kalau pakai input manual jumlah
        $jumlah = max(1, intval($request->input('jumlah')));
    }

    $cartItem->jumlah = $jumlah;
    $cartItem->save();

    return redirect()->back()->with('success', 'Jumlah berhasil diperbarui');
}

}
