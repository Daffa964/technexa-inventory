<?php
namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        // Pastikan kategori sudah ada
        $cpu = Category::where('slug', 'cpu')->first();
        $gpu = Category::where('slug', 'gpu')->first();
        $ram = Category::where('slug', 'ram')->first();
        $motherboard = Category::where('slug', 'motherboard')->first();

        // Jika kategori tidak ada, beri peringatan
        if (!$cpu || !$gpu || !$ram || !$motherboard) {
            throw new \Exception('Kategori (CPU, GPU, RAM, Motherboard) harus ada terlebih dahulu. Jalankan CategorySeeder.');
        }

        // Buat 5 produk
        Product::create([
            'category_id' => $cpu->id,
            'name' => 'Intel Core i9-13900K',
            'stock' => 50,
            'price' => 8500000.00,
            'description' => 'Prosesor high-performance dengan 24 core dan 32 thread, cocok untuk gaming dan multitasking.'
        ]);

        Product::create([
            'category_id' => $gpu->id,
            'name' => 'NVIDIA GeForce RTX 4090',
            'stock' => 20,
            'price' => 25000000.00,
            'description' => 'GPU terbaru dengan arsitektur Ada Lovelace, mendukung ray tracing dan DLSS 3.'
        ]);

        Product::create([
            'category_id' => $ram->id,
            'name' => 'Corsair Vengeance DDR5 32GB',
            'stock' => 100,
            'price' => 3200000.00,
            'description' => 'RAM DDR5 dengan kecepatan 5600 MHz, ideal untuk sistem modern.'
        ]);

        Product::create([
            'category_id' => $motherboard->id,
            'name' => 'ASUS ROG Strix Z790-E',
            'stock' => 30,
            'price' => 6500000.00,
            'description' => 'Motherboard gaming dengan chipset Z790, mendukung Intel 13th Gen.'
        ]);

        Product::create([
            'category_id' => $cpu->id,
            'name' => 'AMD Ryzen 7 7800X3D',
            'stock' => 40,
            'price' => 7000000.00,
            'description' => 'Prosesor dengan teknologi 3D V-Cache, dioptimalkan untuk gaming.'
        ]);
    }
}