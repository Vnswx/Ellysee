<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $users = [
            [
                'name' => 'John Doe',
                'email' => 'john@example.com',
                'password' => Hash::make('password'),
                'namalengkap' => 'John Doe Opera',
                'alamat' => 'Depok, Jawa Barat',// Menggunakan bcrypt untuk mengenkripsi
            ],
            // Tambahkan pengguna lain jika diperlukan
        ];

        // Memasukkan data ke dalam database
        foreach ($users as $user) {
            User::create($user);
        }
    }
}
