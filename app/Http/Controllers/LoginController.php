<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use App\Models\User; 
use App\Http\middleware\CekRole;


class LoginController extends Controller
{
    public function index(Request $request)
    {
       
        return view('login');

    }
    
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            $user = Auth::user();
            \Log::info('Login berhasil oleh: ' . $user->id . ', role: ' . $user->role);
          

           if ($user->role === 'admin') {
                return redirect()->route('dashboard');
            } elseif ($user->role === 'user') {
                return redirect()->route('Foodvana.home');
            } else {
                return back()->with('error', 'Role pengguna tidak dikenali.');
            }
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        Log::info('User logged out successfully.');

        return redirect('/Foodvana')->with('success', 'Berhasil logout.');
    }
}
