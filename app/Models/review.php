<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class review extends Model
{
    protected $table = 'reviews';
    protected $fillable = [
       'id_user',
       'id_menu',
       'id_detail_transaksi',
       'rating',
       'komentar',
        
    ];

public function user() {
    return $this->belongsTo(User::class, 'id_user');
}

public function menu() {
    return $this->belongsTo(Menu::class, 'id_menu');
}

public function detailTransaksi() {
    return $this->belongsTo(DetailTransaksi::class, 'id_detail_transaksi');
}


}
