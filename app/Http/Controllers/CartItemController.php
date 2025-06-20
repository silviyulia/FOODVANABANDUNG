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
        $userId = session('user')['id']; // ✅ Perbaikan
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
        $userId = session('user')['id']; // ✅ Perbaikan
        $item = CartItem::where('id_user', $userId)->findOrFail($id);
        $item->delete();

        return back()->with('success', 'Item berhasil dihapus dari keranjang.');
    }

    public function checkout()
    {
        if (!session()->has('user')) {
            return redirect('/login')->with('error', 'Harap login terlebih dahulu.');
        }
        $userId = session('user')['id']; // ✅ Perbaikan
        CartItem::where('id_user', $userId)->delete();

        return back()->with('success', 'Checkout berhasil!');
    }

    public function store(Request $request)
    {
        if (!session()->has('user')) {
            return redirect('/login')->with('error', 'Harap login terlebih dahulu.');
        }

        $userId = session('user')['id']; // ✅ Perbaikan

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
}
