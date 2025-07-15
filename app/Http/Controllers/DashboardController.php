<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Kontak;
use App\Models\User;
use App\Models\Menu;
use App\Models\Transaksi;
use App\Models\Review;


class DashboardController extends Controller
{
   

public function index()
{
    $kontaks = \App\Models\Kontak::orderBy('created_at', 'desc')->paginate(10);
    $users = User::orderBy('created_at', 'desc')->paginate(10);
    $menus = Menu::all(); // Jangan lupa huruf besar pada 'Menu'

    

    return view('dashboard', array_merge(
        compact('kontaks', 'users', 'menus'),
        [
            'userCount' => User::count(),
            'kontakCount' => Kontak::count(),
            'menuCount' => Menu::count(),
            'transaksiCount' => Transaksi::count(),
            'reviewCount' => Review::count(),
            // Ringkasan transaksi
        'todayOrders' => Transaksi::whereDate('created_at', Carbon::today())->count(),
        'monthlyOrders' => Transaksi::whereMonth('created_at', Carbon::now()->month)->count(),
        'yearlyOrders' => Transaksi::whereYear('created_at', Carbon::now()->year)->count()


        ]
    ));
}
  public function profile()
    {
       $sessionUser = session('user');

        if (!$sessionUser) {
            return redirect('/login')->with('error', 'Silakan login terlebih dahulu.');
        }

        // Ambil user dari database berdasarkan ID dari session
        $user = User::find($sessionUser['id']);

        return view('/', [
            'user' => $user
        ]);
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
    public function kontak()
    {
        $kontaks = Kontak::all();
        return view('dashboard.kontak', compact('kontaks'));
        }
        
    public function user()
    {
        $users = User::all();
        foreach ($users as $user) {
            $id[]= $user-> id;
            $username[]= $user-> username;
            $email[]= $user-> email;
            $password[]= $user-> password;
            $role[]= $user-> role;
            $photo_profil[]= $user-> photo_profil;
            }

        return view('dashboard.users', compact('users'));
    }

  
    public function settings()
    {
        // Logika untuk menampilkan pengaturan admin
        return view('admin.settings'); // Ganti dengan nama view pengaturan admin kamu
    }
}