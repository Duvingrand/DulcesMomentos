<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $productos = [
            [
                'name' => 'Pastel Generico',
                'description' => 'Pastel molde, añadir personalización detallada',
                'price' => 50000,
                'size' => 'mediano',
                'category_id' => 4 // Categoría: Pasteles
            ],
            

        ];

        DB::table('products')->insert($productos);
    }
}
