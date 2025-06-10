<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        if (!User::where('username', 'testuser')->exists()) {
            User::factory()->create([
                'name' => 'Test User',
                'username' => 'testuser',
                'email' => 'test@example.com',
                'password' => Hash::make('password123'),
                'role' => 'user',
            ]);
        }

        if (!User::where('username', 'admin')->exists()) {
            User::create([
                'name' => 'Admin',
                'username' => 'admin',
                'email' => 'admin@egmail.com',
                'password' => Hash::make('admin123'),
                'role' => 'admin',
            ]);
        }
        
    }
}
