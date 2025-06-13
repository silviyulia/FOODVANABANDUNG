<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kontak;
use App\Models\User;
use App\Models\Menu;


class DashboardController extends Controller
{
   

    public function index()
    {
        $kontaks = \App\Models\Kontak::orderBy('created_at', 'desc')->paginate(10);
        $users = User::orderBy('created_at', 'desc')->paginate(10);
        $menus = menu::all();
        return view('dashboard', compact('kontaks', 'users', 'menus'));  
    }

    public function menu()
    {
          $menus = Menu::all();
         foreach ($menus as $menu) {
          $id[]= $menu->id;
          $nama[] = $menu->nama;
          $deskripsi[]= $menu->deskripsi;
          $harga[]= $menu->harga;
          $gambar[] = $menu->gambar;
          $rating[]= $menu->rating;
            }
                return view('dashboard.menu', compact('id', 'nama', 'deskripsi', 'harga', 'gambar', 'rating'));
            
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