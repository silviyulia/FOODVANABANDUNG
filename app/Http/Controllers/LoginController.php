<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use App\Models\User;

class LoginController extends Controller
{
    // Tampilkan form login
    public function index()
    {
        

        return view('login');
    }

    // Proses autentikasi login manual
   public function authenticate(Request $request)
{
    $credentials = $request->validate([
        'username' => 'required|string',
        'password' => 'required|string',
    ]);

    $user = User::where('username', $credentials['username'])->first();

    if ($user && Hash::check($credentials['password'], $user->password)) {
        $request->session()->put('user', [
            'id' => $user->id,
            'username' => $user->username,
            'role' => $user->role,
            'email' => $user->email,
        ]);

        session(['user' => $user->toArray()]);

        return redirect()->route($user->role === 'admin' ? 'dashboard' : 'Foodvana.home');
    }

    return back()->with('error', 'Username atau password salah.');
    }

    // Logout
    public function logout(Request $request)
    {
        $request->session()->forget('user');
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        Log::info('User berhasil logout');

        return redirect('/Foodvana')->with('success', 'Berhasil logout.');
    }
}
