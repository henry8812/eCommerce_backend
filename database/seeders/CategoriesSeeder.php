<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategoriesSeeder extends Seeder
{
    public function run()
    {
        // Aquí puedes generar productos de prueba
        Category::create([
            'name' => 'Celulares',
           ]);

           Category::create([
            'name' => 'Audifonos',
            ]);

        // Agrega más productos según sea necesario
    }
}
