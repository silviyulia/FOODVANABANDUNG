<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         $menus = Menu::all();
    return view('menu', compact('menus'));
    }

    public function home()
    {
        $menus = Menu::all();
        return view('Foodvana.menu', compact('menus'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(menu $menus)
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

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
