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
                'name' => 'Pastel de chocolate con ganache',
                'description' => 'Ingredientes: chocolate, harina, huevos, crema, azúcar.',
                'price' => 50000,
                'size' => 'mediano',
                'category_id' => 4 // Categoría: Pasteles
            ],
            [
                'name' => 'Cupcakes de vainilla con frosting de mantequilla',
                'description' => 'Ingredientes: harina, azúcar, vainilla, mantequilla, huevos.',
                'price' => 7000,
                'size' => 'pequeño',
                'category_id' => 1 // Categoría: Cupcakes
            ],
            [
                'name' => 'Tarta de manzana con canela',
                'description' => 'Ingredientes: manzanas, canela, azúcar, harina, mantequilla.',
                'price' => 35000,
                'size' => 'mediana',
                'category_id' => 4 // Categoría: Pasteles
            ],
            [
                'name' => 'Brownie de chocolate con nueces',
                'description' => 'Ingredientes: chocolate, nueces, azúcar, harina, huevos.',
                'price' => 12000,
                'size' => 'pequeño',
                'category_id' => 3 // Categoría: Brownies
            ],
            [
                'name' => 'Cheesecake de frutos rojos',
                'description' => 'Ingredientes: queso crema, galletas, frutos rojos, azúcar, mantequilla.',
                'price' => 45000,
                'size' => 'grande',
                'category_id' => 5 // Categoría: Postres fríos
            ],
            [
                'name' => 'Galletas de avena con pasas',
                'description' => 'Ingredientes: avena, pasas, azúcar, mantequilla, harina.',
                'price' => 5000,
                'size' => 'pequeño',
                'category_id' => 2 // Categoría: Galletas
            ],
            [
                'name' => 'Tiramisu clásico',
                'description' => 'Ingredientes: café, queso mascarpone, cacao, bizcochos, azúcar.',
                'price' => 38000,
                'size' => 'mediano',
                'category_id' => 5 // Categoría: Postres fríos
            ],
            [
                'name' => 'Macarons de frambuesa',
                'description' => 'Ingredientes: almendras, azúcar, frambuesa, claras de huevo.',
                'price' => 9000,
                'size' => 'pequeño',
                'category_id' => 7 // Categoría: Otros
            ],
            [
                'name' => 'Pastel Red Velvet',
                'description' => 'Ingredientes: harina, cacao, buttermilk, crema de queso, azúcar.',
                'price' => 55000,
                'size' => 'grande',
                'category_id' => 4 // Categoría: Pasteles
            ],
            [
                'name' => 'Churros con chocolate',
                'description' => 'Ingredientes: harina, azúcar, canela, chocolate, agua.',
                'price' => 15000,
                'size' => 'mediano',
                'category_id' => 7 // Categoría: Otros
            ]
        ];        
        
        DB::table('products')->insert($productos);
    }
}
