<?php
namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Buat admin
        User::create([
            'name' => 'Admin TechNexa',
            'email' => 'admin@technexa.com',
            'password' => bcrypt('admin123'),
            'role' => 'admin'
        ]);

        // Buat kepala gudang
        User::create([
            'name' => 'Kepala Gudang',
            'email' => 'kepala@technexa.com',
            'password' => bcrypt('kepala123'),
            'role' => 'kepala_gudang'
        ]);

    }
}