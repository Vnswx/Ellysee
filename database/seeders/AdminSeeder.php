<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;


class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Admin',
            'namalengkap' => 'Admin',
            'alamat' => 'Unknown',
            'profile_image' => 'images/default_profile.jpg',
            'email' => 'admin@example.com',
            'password' => bcrypt('password'), // Pastikan untuk menggunakan metode hashing yang benar
            'role' => 'admin', // Sesuaikan dengan atribut yang digunakan untuk menentukan peran
        ]);
    }
}
