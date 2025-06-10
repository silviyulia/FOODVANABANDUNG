<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct()
    {
        // Middleware untuk memeriksa apakah pengguna sudah login dan memiliki role admin
        $this->middleware(['auth', 'cekrole:admin']);
    }

    public function index()
    {
        return view('/dashboard'); // Menampilkan view dashboard admin yang benar
    }
}
