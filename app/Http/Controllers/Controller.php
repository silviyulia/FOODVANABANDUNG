<?php

namespace App\Http\Controllers;

abstract class Controller
{
    public function index () {
        return view ('welcome');
        return back()->with('error', 'Gagal menyimpan data!');

    }
}