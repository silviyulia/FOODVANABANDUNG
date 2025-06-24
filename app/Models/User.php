<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'username',
        'email',
        'password',
        'role',
        'alamat',
        'profile_photo',
        'no_hp',
        'email_verified_at',
    ];

    protected $hidden = [
        'password',
    ];
    protected $casts = [
    'email_verified_at' => 'datetime',
    ];


    public $timestamps = true;

    // Simpan password selalu dalam bentuk hash
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = \Illuminate\Support\Facades\Hash::needsRehash($value)
            ? \Illuminate\Support\Facades\Hash::make($value)
            : $value;
    }
    public function transaksi()
    {
        return $this->hasMany(Transaksi::class, 'id_user');
    }
}
