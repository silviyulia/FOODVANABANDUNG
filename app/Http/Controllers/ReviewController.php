<?php

namespace App\Http\Controllers;
use App\Models\Transaksi;
use App\Models\Review;
use App\Models\Menu;

use Illuminate\Http\Request;

class ReviewController extends Controller
{

    public function form($id)
{
    $transaksi = Transaksi::with('detailTransaksi.menu')->findOrFail($id);

    // optional: pastikan user hanya bisa review miliknya
    if (session('user_id') != $transaksi->user_id) {
        return redirect()->back()->with('error', 'Tidak diizinkan.');
    }

    return view('pesanan.review', compact('transaksi'));
}


public function store(Request $request, $transaksiId)
{
    $request->validate([
        'ulasan' => 'required|array',
        'ulasan.*.rating' => 'required|integer|min:1|max:5',
        'ulasan.*.komentar' => 'nullable|string|max:1000',
    ]);

    $user = session('user');

    if (!$user || !isset($user['id'])) {
        return back()->withErrors(['Anda belum login.']);
    }

    foreach ($request->ulasan as $detailId => $data) {
        $detail = \App\Models\DetailTransaksi::find($detailId);

        if ($detail) {
            // Simpan ulasan
            \App\Models\Review::create([
                'id_user' => $user['id'],
                'id_menu' => $detail->id_menu,
                'id_detail_transaksi' => $detail->id,
                'id_transaksi' => $transaksiId,
                'rating' => $data['rating'],
                'komentar' => $data['komentar'],
            ]);

            // Update average rating ke tabel menus
            $menuId = $detail->id_menu;
            $averageRating = \App\Models\Review::where('id_menu', $menuId)->avg('rating');
            \App\Models\Menu::where('id', $menuId)->update(['rating' => $averageRating]);
        }
    }

    return redirect()->route('menu.home', $transaksiId)
        ->with('success', 'Ulasan berhasil dikirim!');
}
}
