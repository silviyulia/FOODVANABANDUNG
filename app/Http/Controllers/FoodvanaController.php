<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\menu;

class FoodvanaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $menus = menu::all();
        return view('Foodvana.index', compact('menus'));
    }

    //halaman setelah login */
    public function home()
    {
        $user = auth()->user();
        $menus = menu :: all(); // Mendapatkan pengguna yang sedang login
        return view('Foodvana.home', compact('user','menus'));

    } 
    public function search(Request $request)
    {
        $query = $request->input('query');
        $menus = menu::where('nama', 'LIKE', "%{$query}%")
            ->orWhere('deskripsi', 'LIKE', "%{$query}%")
            ->get();

        return view('Foodvana.menu2', compact('menus', 'search'));
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
    public function show(string $id)
    {
        //
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
