<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{
     protected $table = 'cart_items';

    protected $fillable = ['id_user', 'id_menu', 'jumlah', 'added_at'];

    public $timestamps = false;

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function menu()
    {
        return $this->belongsTo(Menu::class, 'id_menu');
    }
}
