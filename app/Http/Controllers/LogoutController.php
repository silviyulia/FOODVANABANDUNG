<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LogoutController extends Controller
{
    public function logout(Request $request)
{
    $request->session()->forget('user');
    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect('/Foodvana')->with('success', 'Berhasil logout.');
}

}
