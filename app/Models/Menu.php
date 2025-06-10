<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    // Menentukan nama tabel 
    protected $table = 'menus';

    // Menentukan kolom-kolom yang bisa diisi secara massal
    protected $fillable = [
        'nama',
        'deskripsi',
        'harga',
        'rating',
        'gambar'
    ];

}
