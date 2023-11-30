<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run()
    {
        // Aquí puedes generar productos de prueba
        Product::create([
            'name' => 'Producto 1',
            'description' => 'Descripción del Producto 1',
            'price' => 19.99,
            'quantity' => 100,
            'image' => 'https://i.blogs.es/70a027/huawei-google/1366_2000.jpg'
        ]);

        Product::create([
            'name' => 'Producto 2',
            'description' => 'Descripción del Producto 2',
            'price' => 29.99,
            'quantity' => 50,
            'image' => 'https://www.ktronix.com/medias/7707467662798-001-750Wx750H?context=bWFzdGVyfGltYWdlc3wyNTA2OTJ8aW1hZ2UvanBlZ3xhVzFoWjJWekwyaGxNaTlvTmpNdk9UZ3dOekE1TkRFMU16STBOaTVxY0djfGQ1YTE5ZDNmYzI5YTY5NWY2YmUyZDIyMDA2OTA3N2VkZTliMjI0MjRhNDE1YmViNDc5NjQzZGU3ZDQwNjBiZjU'
        ]);

        // Agrega más productos según sea necesario
    }
}
