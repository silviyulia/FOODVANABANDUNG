<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaksi;
use Barryvdh\DomPDF\Facade\Pdf;

class PesananController extends Controller
{
//    public function index()
//     {
//         $transaksis = Transaksi::all(); // atau sesuai modelmu
//         return view('pesanan.index', compact('transaksis'));

//     }

    public function show($id)
    {
        // Ambil transaksi beserta detail menu yang dibeli
        $transaksis = Transaksi::with('detailTransaksi.menu')->findOrFail($id);

        // Tampilkan ke view 'pesanan/detail.blade.php'
        return view('pesanan.detail', compact('transaksis'));
    }


   public function cetakStruk($id)
    {
        $transaksi = Transaksi::with('detailTransaksi.menu')->findOrFail($id);

        $pdf = Pdf::loadView('pesanan.struk', compact('transaksi'));
        return $pdf->download('struk-transaksi-' . $transaksi->id . '.pdf');
    }

    // public function pesanan()
    // {
        
    //     $pesanan = [
    //         [
    //             "nama" => "Nasi Timbel",
    //             "harga" => 25000,
    //             "quantity" => 1,
    //             "gambar" => "img/nasi.jpg"
    //         ],
    //         [
    //             "nama" => "Batagor",
    //             "harga" => 10000,
    //             "quantity" => 2,
    //             "gambar" => "img/batagor.jpg"
    //         ]
    //     ];

    //     return view('/Foodvana.pesanan', compact('pesanan'));
    // }
    
  
    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }


    // public function edit(string $id)
    // {
    //     $pesanan = Pesanan::findOrFail($id);
    // dd($pesanan); // cek apakah data nyampe
    // return view('editpemesanan', compact('pesanan'));
    //     //
    // }

    public function update(Request $request, string $id)
    {
        //
    }


    public function destroy(string $id)
    {
        //
    }
}
