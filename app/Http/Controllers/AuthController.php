<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
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
        Session::put('username', $user->username);
        Session::put('role', $user->role);
        Session::put('id', $user->id);

        if ($user->role === 'admin') {
            return redirect('/admin.dashboard')->with('success', 'Selamat datang, Admin!');

        } elseif ($user->role === 'user') {
            return redirect('/Foodvana.home')->with('success', 'Selamat datang, User!');
    } else {
        return redirect('/login')->with('error', 'Username atau password salah.');
    }
    }
}

    public function username()
    {
        return 'username';
    }


    public function logout()
{
    Session::flush(); // Menghapus semua session
    Auth::logout(); // Mengeluarkan pengguna dari sesi autentikasi
    return redirect('/login')->with('success', 'Berhasil logout.');
}
}
