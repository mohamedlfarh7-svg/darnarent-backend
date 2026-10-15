<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Mohamed El Farh (Admin)
        User::create([
            'name' => 'Mohamed',
            'prenom' => 'El Farh',
            'email' => 'mohamedlfarh7@gmail.com',
            'phone' => '+212600000000',
            'password' => Hash::make('password123'),
            'role' => 'admin',
        ]);

        // 2. Mehdi Laraibi (Admin)
        User::create([
            'name' => 'Mehdi',
            'prenom' => 'Laraibi',
            'email' => 'mehlaraibi@gmail.com',
            'phone' => '+212611111111',
            'password' => Hash::make('password123'),
            'role' => 'admin',
        ]);
    }
}