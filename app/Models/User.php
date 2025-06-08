<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * Kolom yang bisa diisi secara massal.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'username',
        'email',
        'password',
        'role',
    ];

    /**
     * Kolom yang disembunyikan saat serialisasi.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Konversi tipe atribut.
     *
     * @return array
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'string', // remove 'hashed', use string
        ];
    }

    /**
     * Override untuk login pakai username, bukan email.
     *
     * @return string
     */
    public function getAuthIdentifierName()
    {
        return 'username';
    }

    // Pastikan password selalu di-hash saat set
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = \Illuminate\Support\Facades\Hash::needsRehash($value)
            ? \Illuminate\Support\Facades\Hash::make($value)
            : $value;
    }
}
