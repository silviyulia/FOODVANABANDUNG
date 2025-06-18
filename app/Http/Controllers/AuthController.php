<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use App\Models\User;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials= $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        // Menggunakan Auth untuk mencoba login
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate(); // Regenerasi sesi untuk keamanan
            $user = Auth::user();

            if ($user->role === 'admin') {
                return redirect()->route('dashboard')->with('success', 'Selamat datang, Admin!');
            } elseif ($user->role === 'user') {
                return redirect()->route('home')->with('success', 'Selamat datang, User!');
            } else {
                return redirect('/login')->with('error', 'Role tidak dikenali.');
            }
        } else {
            Log::warning('Login failed for user: ' . $request->username);
            return redirect('/login')->with('error', 'Username atau password salah.');
        }
    }

    public function username()
    {
        return 'username';
    }

    public function logout()
    {
        Auth::logout(); // Mengeluarkan pengguna dari sesi autentikasi
        return redirect('/Foodvana')->with('success', 'Berhasil logout.');
    }
}
