<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PesananController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function pesanan()
    {
        
        $pesanan = [
            [
                "nama" => "Nasi Timbel",
                "harga" => 25000,
                "quantity" => 1,
                "gambar" => "img/nasi.jpg"
            ],
            [
                "nama" => "Batagor",
                "harga" => 10000,
                "quantity" => 2,
                "gambar" => "img/batagor.jpg"
            ]
        ];

        return view('/Foodvana.pesanan', compact('pesanan'));
    }
    


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $pesanan = Pesanan::findOrFail($id);
    dd($pesanan); // cek apakah data nyampe
    return view('editpemesanan', compact('pesanan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
