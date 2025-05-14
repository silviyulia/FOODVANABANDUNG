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

    $credentials = $request->only('username', 'password');

    if (Auth::attempt($credentials)) {
        $user = Auth::user();

        session()->flash('message', 'You have logged in');

        if ($user->role === 'admin') {
            return redirect('/dashboard');
        } elseif ($user->role === 'user') {
            return redirect('/Foodvana');
        } else {
            return redirect('/login');
        }
    } else {
        return back()->with('error', 'Username atau password salah.');
    }
}

     public function showLoginForm()
    {
        // Mengecek apakah pengguna sudah login
    if (Auth::check()) {
        // Jika sudah login, arahkan ke halaman home
        return redirect('/user.home'); // Ganti dengan URL halaman utama yang sesuai
    }
    return view('login'); // Menampilkan halaman login jika belum login
    }
}