<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
{
    $request->validate([
        'username' => 'required',
        'password' => 'required',
    ]);

    $user = DB::table('users')->where('username', $request->username)->first();


    if ($user && Hash::check($request->password, $user->password)) {
        if ($user->role === 'admin') {
            // Tidak perlu session manual, cukup redirect
            return redirect('/dashboard')->with('success', 'Selamat datang, Admin!');
        } elseif ($user->role === 'user') {
            return redirect('/Foodvana.home')->with('success', 'Selamat datang, User!');
        } else {
            return redirect('/login')->with('error', 'Role tidak dikenali.');
        }
    } else {
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
    return redirect('/login')->with('success', 'Berhasil logout.');
}
}
