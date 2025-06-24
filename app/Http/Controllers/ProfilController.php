<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\User;

class ProfilController extends Controller
{
    // Tampilkan profil
    public function show()
    {
        $user = session('user');

        if (!$user) {
            return redirect('/login')->with('error', 'Anda harus login dulu.');
        }
        

        return view('profil', compact('user'));
    }

    // Tampilkan form edit
    public function edit()
    {
        $user = session('user');

        if (!$user) {
            return redirect('/login')->with('error', 'Anda harus login dulu.');
        }

        return view('profil.edit', compact('user'));
    }

    // Proses update profil
   public function update(Request $request)
{
    $request->validate([
        'username' => 'required|string|max:100',
        'email' => 'required|email',
        'alamat' => 'nullable|string|max:255',
        'profile_photo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        'no_hp' => 'nullable|string|max:15',
    ]);

    $sessionUser = session('user');
    if (!$sessionUser) {
        return redirect('/login')->with('error', 'Sesi login tidak ditemukan.');
    }

    // ✅ Perbaikan akses array
    $user = User::find($sessionUser['id']);
    if (!$user) {
        return redirect('/login')->with('error', 'User tidak ditemukan di database.');
    }

    $user->username = $request->username;
    $user->email = $request->email;
    $user->alamat = $request->alamat;
    $user->no_hp = $request->no_hp;

    if ($request->hasFile('profile_photo')) {
        $path = $request->file('profile_photo')->store('profile', 'public');
        $user->profile_photo = 'storage/' . $path;
    }

    $user->save();

    // ✅ Simpan ulang session dalam bentuk array
    $request->session()->put('user', $user->toArray());

    return redirect()->route('profil.show')->with('success', 'Profil berhasil diperbarui.');
}

}