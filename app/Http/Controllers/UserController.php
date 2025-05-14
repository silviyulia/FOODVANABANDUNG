<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct()
    {
        // Middleware untuk memeriksa apakah pengguna sudah login dan memiliki role user
        $this->middleware(['auth', 'cekrole:user']);
    }

    public function index()
    {
        return view('user.home');  // Ganti dengan nama view halaman utama user kamu
    }
}
