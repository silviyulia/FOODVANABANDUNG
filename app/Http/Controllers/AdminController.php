<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\user;
use App\Models\kontak;

class AdminController extends Controller
{

    public function index()
    {
        return view('/dashboard'); // Menampilkan view dashboard admin yang benar
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
    public function show($id)
    {
        $users = user::findOrFail($id);
        return view('admin.show', compact('user'));
        $kontaks = kontak::findOrFail($id);
        return view('admin.show', compact('kontak'));
    }
    public function destroy($id)
    {
        $users = user::findOrFail($id);
        $users->delete();
        return redirect()->route('admin.destroy')->with('success', 'Kuliner deleted successfully.');
    }
}
