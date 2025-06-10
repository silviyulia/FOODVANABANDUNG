<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfilController extends Controller
{
    public function show()
    {
        $user = Auth::user();
        return view('profil', compact('user'));
    }

    public function edit()
    {
        $user = Auth::user();
        return view('profil.edit', compact('user'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'username' => 'required|string|max:100',
            'email' => 'required|email',
            'alamat' => 'nullable|string|max:255',
            'profile_photo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        $user = Auth::user();
        $user->username = $request->username;
        $user->email = $request->email;
        $user->alamat = $request->alamat;

        if ($request->hasFile('profile_photo')) {
            $path = $request->file('profile_photo')->store('profile', 'public');
            $user->profile_photo = 'storage/' . $path;
        }

        $user->save();

        return redirect()->route('profil.show');
    }
}
