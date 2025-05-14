<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function login(Request $request)
{
    $request->validate([
        'username' => 'required',
        'password' => 'required',
    ]);

    $user = DB::table('user')->where('username', $request->username)->first();

    if ($user && Hash::check($request->password, $user->password)) {
        Session::put('username', $user->username);
        Session::put('role', $user->role);

        return redirect($user->role === 'admin' ? '/dashboard' : '/');
    } else {
        return redirect('/login')->with('error', 'Username atau password salah.');
    }
}
}
