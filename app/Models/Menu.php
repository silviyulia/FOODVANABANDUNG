<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    // Menentukan nama tabel jika tidak sesuai dengan konvensi Laravel
    protected $table = 'menus';

    // Menentukan kolom-kolom yang bisa diisi secara massal
    protected $fillable = [
        'nama',
        'deskripsi',
        'harga',
        'gambar'
    ];

    // Contoh relasi (kalau ada)
    // public function kategori() {
    //     return $this->belongsTo(Kategori::class);
    // }
}
