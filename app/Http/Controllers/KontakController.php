<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KontakController extends Controller
{
        public function index()
    {
        
        $kontaks = Kontak::paginate(10); // atau ->all() jika tidak pakai pagination
        return view('components.table_kontak', compact('kontaks'));
    }   
    
    public function home()
    {
        
        return view('Foodvana.kontak_kami');
    }

    
    public function store(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'pesan' => 'required|string',
        ]);

        try {
            // Simpan ke database
            \App\Models\Kontak::create($validated);

            // Beri pesan sukses
            return redirect()->back()->with('success', 'Pesan Anda berhasil dikirim!');
        } catch (\Exception $e) {
            // Jika gagal
            return redirect()->back()->with('error', 'Terjadi kesalahan saat mengirim pesan.');
        }
}

}