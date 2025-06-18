<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pesanan;



class UserController extends Controller
{
    public function __construct()
    {
        // Middleware untuk memeriksa apakah pengguna sudah login dan memiliki role user
        $this->middleware(['auth', 'cekrole:user']);
    }

    public function index()
    {
        return view('Foodvana.home');  // Ganti dengan nama view halaman utama user kamu
    }

    public function profile()
    {
        // Logika untuk menampilkan profil pengguna
        return view('profile');  // Ganti dengan nama view profil pengguna kamu
    }

    public function menu()
    {
        // Logika untuk menampilkan menu makanan
        return view('menu2');  // Ganti dengan nama view menu makanan kamu
    }
    public function kontak()
    {
        // Logika untuk menampilkan halaman kontak
        return view('kontak2');  // Ganti dengan nama view halaman kontak kamu
    }
    public function pesanan()
    {
        // Logika untuk menampilkan halaman pesanan
        return view('Foodvana.pesanan');  // Ganti dengan nama view halaman pesanan kamu
    }    
    
    public function orders()
    {
        // Logika untuk menampilkan pesanan pengguna
        return view('Foodvana.orders');  // Ganti dengan nama view pesanan pengguna kamu
    }
    public function editPesanan($id)
    {
        // Logika untuk mengedit pesanan berdasarkan ID
        return view('Foodvana.editpesanan', ['id' => $id]);  // Ganti dengan nama view edit pesanan kamu
    }
    public function deletePesanan($id)
    {
        // Logika untuk menghapus pesanan berdasarkan ID
        // Misalnya, hapus dari database
        // Redirect atau tampilkan pesan sukses setelah penghapusan
        return redirect()->route('pesanan')->with('success', 'Pesanan berhasil dihapus.');  // Ganti dengan nama route yang sesuai
    }
    public function updatePesanan(Request $request, $id)
    {
        // Logika untuk memperbarui pesanan berdasarkan ID
        // Validasi dan simpan perubahan
        return redirect()->route('pesanan')->with('success', 'Pesanan berhasil diperbarui.');  // Ganti dengan nama route yang sesuai
    }
    public function logout()
    {
        // Logika untuk logout pengguna
        auth()->logout();
        return redirect('/login')->with('message', 'You have logged out successfully.');  // Ganti dengan nama route login kamu
    }
}
