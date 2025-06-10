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

            if ($user->role === 'admin') {
                return redirect('/dashboard');
            } elseif ($user->role === 'user') {
                return redirect('/Foodvana.home');
            } else {
                return redirect('/login');
            }
        } else {
            return back()->with('error', 'Username atau password salah.');
        }
    }

    public function showLoginForm()
    {
        return view('login');
    }
}