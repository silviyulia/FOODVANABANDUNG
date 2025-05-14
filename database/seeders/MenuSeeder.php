<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
    use App\Models\Menu;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

public function run()
{
    Menu::insert([
        [
            'nama' => 'Seblak',
            'deskripsi' => 'Seblak khas Bandung dengan topping lengkap.',
            'gambar' => 'seblak.jpg',
            'rating' => 4.8
        ],
        [
            'nama' => 'Batagor',
            'deskripsi' => 'Batagor Bandung legendaris.',
            'gambar' => 'batagor.jpg',
            'rating' => 4.7
        ],
        [
            'nama' => 'Serabi',
            'deskripsi' => 'Serabi manis dan gurih.',
            'gambar' => 'serabi.jpg',
            'rating' => 4.6
        ],
    ]);
}
}