<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
public function index(Request $request)
{
    $keyword = $request->input('query');
    
    $menus = Menu::when($keyword, function ($queryBuilder) use ($keyword) {
        $queryBuilder->where('nama', 'like', '%' . $keyword . '%');
    })->get();

    return view('menu', compact('menus'));
}

    public function home()
    {
        $menus = Menu::all();
        //  untuk mengurutkan berdasarkan rating
        $menus = Menu::orderByDesc('rating')->get(); 

        return view('Foodvana.menu', compact('menus'));
    }

   public function detail($id)
{
    $menu = Menu::with('reviews.user')->findOrFail($id);
    $nama = $menu->nama;
    return view('Foodvana.detailmenu', compact('menu'));

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
    public function show($id)
    {
        $menu = Menu::findOrFail($id);
        return view('detailmenu', compact('menu'));
    }

public function search(Request $request)
{
    $keyword = $request->query('query');

    $menu = Menu::where('nama', 'like', '%' . $keyword . '%')->get();

    if ($menu) {
        return redirect()->route('menu.detail', ['id' => $menu[0]->id]);
    } else {
        return redirect()->back()->with('error', 'Menu tidak ditemukan.');
    }
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
