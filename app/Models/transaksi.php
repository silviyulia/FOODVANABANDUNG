<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class transaksi extends Model // <--- INHERITANCE: class transaksi mewarisi dari class Model
{
    protected $table = 'transaksi';
    protected $fillable = [   // <--- ENKAPSULASI: Properti protected (akses terbatas) yang mengontrol mass assignment
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

    public function menu()
    {
        return $this->belongsTo(Menu::class, 'id_menu'); // Abstraksi: Detail relasi ditangani oleh Laravel
    }
}
