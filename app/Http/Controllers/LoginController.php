<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
        public function login(Request $request)
{
    $request->validate([
        'username' => 'required|string',
        'password' => 'required|string',
    ]);

    // Gunakan 'username' dan 'password' untuk login
    $credentials = $request->only('username', 'password');

    if (Auth::attempt($credentials)) {
        $user = Auth::user();
        session()->flash('message', 'You have logged in');
        if ($user->role === 'admin') {
            return redirect('/dashboard');
        } elseif ($user->role === 'user') {
            return redirect('/home');
        } else {
            Auth::logout();
            return redirect('/login')->with('error', 'Role tidak valid.');
        }
    } else {
        return back()->with('error', 'Username atau password salah.');
    }
}

     public function showLoginForm()
    {
        // Mengecek apakah pengguna sudah login
    if (Auth::check()) {
        $user = Auth::user();
        if ($user->role === 'admin') {
            // Jika pengguna adalah admin, redirect ke dashboard admin
            return redirect()->route('admin.dashboard');

        } elseif ($user->role === 'user') {
            return redirect('/home');
        }
    }
    return view('login'); // Menampilkan halaman login jika belum login
    }

    public function logout(Request $request)
    {
    Auth::logout();

    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect('/login')->with('success', 'Berhasil logout.');
}

}