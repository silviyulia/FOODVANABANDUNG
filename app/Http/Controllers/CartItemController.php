<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CartItem;

class CartItemController extends Controller
{
    public function index()
    {
        $cartItems = CartItem::with('menu')
            ->where('id_user', auth()->id())
            ->get();

        return view('cart_items', compact('cartItems'));
    }

    public function destroy($id)
    {
        $item = CartItem::findOrFail($id);
        $item->delete();

        return back()->with('success', 'Item berhasil dihapus dari keranjang.');
    }

    public function checkout()
    {
        // Proses checkout
        CartItem::where('id_user', auth()->id())->delete();

        return back()->with('success', 'Checkout berhasil!');
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_menu' => 'required|exists:menus,id',
            'jumlah' => 'required|integer|min=1'
        ]);
        CartItem::create([
            'id_user' => auth()->id(),
            'id_menu' => $request->id_menu,
            'jumlah' => $request->jumlah,
            'added_at' => now()
        ]);
        return back()->with('success', 'Berhasil ditambahkan ke keranjang!');
    }
}
