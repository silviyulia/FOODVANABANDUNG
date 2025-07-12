<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\menu;

class HomeController extends Controller
{
    public function index()
    {
        $menus = Menu::orderByDesc('rating')->take(3)->get(); 
        return view('/Fooodvana/home', compact ('menus'));
    }
}
