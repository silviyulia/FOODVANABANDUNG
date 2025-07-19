<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\user;
use App\Models\kontak;
use App\Models\Transaksi;
use App\Models\DetailTransaksi;
use App\Models\Review;
use App\Models\Menu;

class AdminController extends Controller
{

    public function index()
    {
        return view('/dashboard'); 
    }
    public function table()
    {
        $users = user ::all();
        foreach ($users as $user) {
            $id[]= $user-> id;
            $username[]= $user-> username;
            $email[]= $user-> email;
            $password[]= $user-> password;
            $role[]= $user-> role;
            $profile_photo[]= $user-> profile_photo;
            }
        return view('admin.users',compact ('users')); // Menampilkan view table user 
    }
    public function kontak()
    {
        $kontaks = kontak ::all();
        foreach ($kontaks as $kontak) {
            $id[]= $kontak-> id;
            $nama[]= $kontak-> nama;
            $email[]= $kontak-> email;
            $pesan[]= $kontak-> pesan;
            }
        return view('admin.kontaks', compact ('kontaks')); // Menampilkan view kontak admin yang benar
        }


    public function pesanan()
    {

        $transaksis = Transaksi::with('user', 'detailTransaksi.menu')->latest()->get();
        return view('admin.pesanan', compact('transaksis'));
    }

    public function review()
    {
        $reviews = Review::with(['user', 'menu'])->latest()->paginate(10);
        return view('admin.reviews', compact('reviews'));
    }

    public function updateStatus(Request $request, $id)
{
    $request->validate([
        'status' => 'required|in:pending,diproses,selesai,gagal',
    ]);

    $transaksi = Transaksi::findOrFail($id);
    $transaksi->status = $request->status;
    $transaksi->save();

    return back()->with('success', 'Status pesanan berhasil diperbarui.');
}



        
    public function show($id)
    {
        $users = user::findOrFail($id);
        return view('admin.show', compact('user'));
        $kontaks = kontak::findOrFail($id);
        return view('admin.show', compact('kontak'));
        $transaksi = \App\Models\Transaksi::with('user', 'detailTransaksi.menu')->findOrFail($id);
        return view('admin.show', compact('transaksi'));
        $reviews = Review::with(['user', 'menu'])->latest()->paginate(10);
        return view('admin.show', compact('reviews'));




    }
    public function destroy($id)
    {
        $users = user::findOrFail($id);
        $users->delete();
        return redirect()->route('admin.table')->with('success', 'Kuliner deleted successfully.');
    }

}
