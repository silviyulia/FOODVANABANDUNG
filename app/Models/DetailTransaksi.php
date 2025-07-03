<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class DetailTransaksi extends Model
{
    protected $table = 'detail_transaksis';

    protected $fillable = [
        'id_transaksi',
        'id_menu',
        'jumlah',
        'harga_satuan',
        'subtotal',
    ];

    public function menu()
{
    return $this->belongsTo(Menu::class, 'id_menu');
}

    public function detailTransaksi()
    {
        return $this->hasMany(DetailTransaksi::class, 'id_transaksi');
    }
}
