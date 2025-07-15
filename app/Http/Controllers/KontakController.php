<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KontakController extends Controller
{
        public function index()
    {
        
        
        return view('kontak_kami');
    }   
    
    public function home()
    {
        
        return view('Foodvana.kontak_kami');
    }

    
public function store(Request $request)
{
    $validated = $request->validate([
        'nama' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'pesan' => 'required|string',
    ]);

    $userSession = session('user');

    $data = [
        'nama' => $userSession['username'] ?? $validated['nama'],
        'email' => $userSession['email'] ?? $validated['email'],
        'pesan' => $validated['pesan'],
    ];

    try {
        \App\Models\Kontak::create($data);

        return redirect()->back()->with('success', 'Pesan Anda berhasil dikirim!');
    } catch (\Exception $e) {
        return redirect()->back()->with('error', 'Terjadi kesalahan saat mengirim pesan.');
    }
}

}