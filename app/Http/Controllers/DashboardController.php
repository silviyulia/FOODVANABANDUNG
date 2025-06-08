<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct()
    {
        // Middleware untuk memeriksa apakah pengguna sudah login dan memiliki role admin
        $this->middleware(['auth', 'cekrole:admin']);
    }

    public function index()
    {
        return view('/admin.dashboard');  // Ganti dengan nama view dashboard kamu
    }
}
