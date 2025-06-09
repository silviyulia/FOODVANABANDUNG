<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class ProfilController extends Controller
{
    public function show()
    {
        $user = (object)[
            'name' => 'User 1',
            'description' => 'Foodie | Traveller',
            'profile_photo' => '/img/gprofile.jpg'
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

        return view('profil.edit', compact('user'));
    }
  
    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'description' => 'nullable|string|max:255',
            'profile_photo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        $user = (object)[
            'name' => $request->name,
            'description' => $request->description,
            'profile_photo' => null
        ];

        if ($request->hasFile('profile_photo')) {
            $path = $request->file('profile_photo')->store('public/profile');
            $user->profile_photo = Storage::url($path);
        }

        return redirect()->route('profil.show')->with('success', 'Profil berhasil diperbarui!');
    }

}
