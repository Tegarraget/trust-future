<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::truncate(); // Hapus semua data user sebelumnya

        User::create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('password123'),
        ]);

        User::create([
            'name' => 'Raget',
            'email' => 'raget@gmail.com',
            'password' => Hash::make('12345678'),
        ]);
    }
} 