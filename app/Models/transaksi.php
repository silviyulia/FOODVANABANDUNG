<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class transaksi extends Model // <--- INHERITANCE: class transaksi mewarisi dari class Model
{
    protected $table = 'transaksis';
    protected $fillable = [   // <--- ENKAPSULASI: Properti protected (akses terbatas) yang mengontrol mass assignment
    'id',
    'id_user',
    'total_harga',
    'alamat_pengiriman',
    'no_hp',
    'metode_pembayaran',
    'status',
    'tanggal_transaksi',
];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user'); // Abstraksi: Detail relasi ditangani oleh Laravel
    }

    public function menus()
    {
        return $this->belongsToMany(Menu::class, 'transaksi_menu', 'id_transaksi', 'id_menu')
                    ->withPivot('jumlah', 'harga');
    }



   public function detailTransaksi()
{
    return $this->hasMany(DetailTransaksi::class, 'id_transaksi');
}
}
