<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Menu extends Model
{
     use HasFactory;

    protected $table = 'menus';
    protected $fillable = [
        'id',
        'nama',
        'deskripsi',
        'harga',
        'gambar',
        'rating',
    ];
    
    public function detailTransaksis()
    {
        return $this->hasMany(DetailTransaksi::class, 'id_menu');
    }

   public function reviews()
{
    return $this->hasMany(Review::class, 'id_menu');
}

   public function getRatingAttribute($value)
{
    return number_format($value, 1);
}
}