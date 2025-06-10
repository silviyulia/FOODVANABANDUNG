<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EditprofilController extends Controller
{
    // Tampilkan halaman profil
    public function show()
    {
        // Data pengguna contoh (biasanya dari database)
        $user = [
            'name' => 'User 1',
            'description' => 'Foodie | Traveller',
            'profile_photo' => 'gprofile.jpg',
        ];

        return view('profil', compact('user'));
    }

    // Tampilkan form edit profil
    public function edit()
    {
        $user = [
            'name' => 'User 1',
            'description' => 'Foodie | Traveller',
            'profile_photo' => 'gprofile.jpg',
        ];

        return view('profil-edit', compact('user'));
    }

    // Simpan perubahan profil
    public function update(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:255',
            'profile_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Simulasi penyimpanan (misal ke database)
        $user = [
            'name' => $validated['name'],
            'description' => $validated['description'] ?? 'Foodie | Traveller',
        ];

        // Jika ada file gambar diupload
        if ($request->hasFile('profile_photo')) {
            $filename = time() . '_' . $request->file('profile_photo')->getClientOriginalName();
            $request->file('profile_photo')->storeAs('public', $filename);
            $user['profile_photo'] = $filename;
        } else {
            $user['profile_photo'] = 'gprofile.jpg'; // default
        }

        // Di aplikasi nyata, simpan ke database
        // User::find(Auth::id())->update([...]);

        return redirect()->route('profil.show')->with('success', 'Profil berhasil diperbarui!');
    }
}