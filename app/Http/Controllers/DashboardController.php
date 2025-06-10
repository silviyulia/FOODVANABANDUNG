<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
   

    public function index()
    {
        return view('dashboard');  
    }

    public function menu()
    {
        return view('dashboard.menu');
    }

    public function profile()
    {
        // Logika untuk menampilkan profil admin
        return view('admin.profile'); // Ganti dengan nama view profil admin kamu
    }

    public function settings()
    {
        // Logika untuk menampilkan pengaturan admin
        return view('admin.settings'); // Ganti dengan nama view pengaturan admin kamu
    }
}