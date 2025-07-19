<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaksi;
use App\Models\DetailTransaksi;
use Barryvdh\DomPDF\Facade\Pdf;


class PesananController extends Controller
{
public function index(Request $request)
{
    $sessionUser = session('user'); // Ambil data user dari session

    if (!$sessionUser) {
        return redirect('/login')->with('error', 'Silakan login terlebih dahulu.');
    }

    $userId = $sessionUser['id'];

    $transaksis = Transaksi::with('detailTransaksi.menu')
        ->where('id_user', $userId)
        ->latest()
        ->get();

    return view('pesanan.detail', compact('transaksis'));
}

    public function show($id)
    {
    // Ambil transaksi beserta detail menu yang dibeli
        $transaksis = Transaksi::with('detailTransaksi.menu')->findOrFail($id);

    // validasi agar hanya user terkait yang bisa akses
      $user = session('user');

    if (!$user || $transaksis->id_user != $user['id']) {
        abort(403, 'Akses ditolak');
    }

    // Tampilkan ke view 'pesanan/detail.blade.php'
        return view('pesanan.detail', compact('transaksis'));
    }


   public function cetakStruk($id)
    {
        $transaksi = Transaksi::with('detailTransaksi.menu')->findOrFail($id);

        $pdf = Pdf::loadView('pesanan.struk', compact('transaksi'));
        return $pdf->download('struk-transaksi-' . $transaksi->id . '.pdf');
    }

     public function menu()
    {
    return $this->belongsTo(Menu::class, 'id_menu');
    }

    public function detailTransaksi()
{
    return $this->hasMany(DetailTransaksi::class, 'id_transaksi');
}
    
  
    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }


    public function update(Request $request, string $id)
    {
        //
    }


    public function destroy(string $id)
    {
        //
    }
}
