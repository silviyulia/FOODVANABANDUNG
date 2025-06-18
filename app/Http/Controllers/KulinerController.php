<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\menu; // Assuming you have a Kuliner model

class KulinerController extends Controller
{
    public function index()
    {
        $menus = menu::all();
        return view('kuliner.index', compact('menus'));
    }
    public function show($id)
    {
        $menu = menu::findOrFail($id);
        return view('kuliner.show', compact('menus'));
    }
    public function create()
    {
        return view('kuliner.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'id' => 'nullable|integer',
            'nama' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'harga' => 'required|numeric',
            'gambar' => 'required|image|mimes:jpg,jpeg,png|max:2048',
            'rating' => 'nullable|numeric|min:0|max:5',
        ]);

        $menu = new menu();
        $menu->id = $request->id; // Optional, if you want to set it manually
        $menu->nama = $request->nama;
        $menu->deskripsi = $request->deskripsi;
        $menu->harga = $request->harga;
        if ($request->hasFile('gambar')) {
            $menu->gambar = $request->file('gambar')->store('images', 'public');
        }
        $menu->rating = $request->rating;
        $menu->save();

        return redirect()->route('kuliner.index')->with('success', 'Kuliner created successfully.');
    }
    public function edit($id)
    {
            

        $menu = menu::findOrFail($id);
        return view('kuliner.edit', compact('menu'));
    }
    public function update(Request $request, $id)
    {
       
        $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'harga' => 'required|numeric',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'rating' => 'nullable|numeric|min:0|max:5',
        ]);

        $menu = menu::findOrFail($id);
        $menu->nama = $request->nama;
        $menu->deskripsi = $request->deskripsi;
        $menu->harga = $request->harga;
        if ($request->hasFile('gambar')) {
            $menu->gambar = $request->file('gambar')->store('images', 'public');
        }
        $menu->rating = $request->rating;
        $menu->save();

        return redirect()->route('kuliner.index')->with('success', 'Kuliner updated successfully.');
    }
    public function destroy($id)
    {
        $menu = menu::findOrFail($id);
        $menu->delete();
        return redirect()->route('kuliner.index')->with('success', 'Kuliner deleted successfully.');
    }
    public function search(Request $request)
    {
        $query = $request->input('query');
        $menus = menu::where('nama', 'LIKE', "%{$query}%")
            ->orWhere('deskripsi', 'LIKE', "%{$query}%")
            ->get();

        return view('kuliner.index', compact('menus'));
    }
    public function filter(Request $request)
    {
        $rating = $request->input('rating');
        $menus = menu::where('rating', '>=', $rating)->get();

        return view('kuliner.index', compact('menus'));
    }
}
