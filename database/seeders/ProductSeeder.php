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
                'description' => 'Delicioso pastel de chocolate esponjoso cubierto con una rica ganache de chocolate amargo.',
                'price' => 50000,
                'size' => 'mediano',
                'category_id' => 1
            ],
            [
                'name' => 'Cupcakes de vainilla con frosting de mantequilla',
                'description' => 'Mini pasteles individuales de vainilla suave cubiertos con un cremoso frosting de mantequilla.',
                'price' => 7000,
                'size' => 'pequeño',
                'category_id' => 2
            ],
            [
                'name' => 'Tarta de manzana con canela',
                'description' => 'Deliciosa tarta con una capa de manzana caramelizada y un toque de canela.',
                'price' => 35000,
                'size' => 'mediana',
                'category_id' => 1
            ],
            [
                'name' => 'Brownie de chocolate con nueces',
                'description' => 'Brownie denso y húmedo, con trozos de nuez y un toque de chocolate amargo.',
                'price' => 12000,
                'size' => 'pequeño',
                'category_id' => 2
            ],
            [
                'name' => 'Cheesecake de frutos rojos',
                'description' => 'Suave cheesecake con base de galleta, cubierto con una mezcla de frutos rojos frescos.',
                'price' => 45000,
                'size' => 'grande',
                'category_id' => 3
            ],
            [
                'name' => 'Galletas de avena con pasas',
                'description' => 'Galletas crujientes de avena con un toque dulce de pasas.',
                'price' => 5000,
                'size' => 'pequeño',
                'category_id' => 2
            ],
            [
                'name' => 'Tiramisu clásico',
                'description' => 'Postre italiano a base de café, queso mascarpone y cacao en polvo.',
                'price' => 38000,
                'size' => 'mediano',
                'category_id' => 3
            ],
            [
                'name' => 'Macarons de frambuesa',
                'description' => 'Delicados macarons con un relleno suave de frambuesa.',
                'price' => 9000,
                'size' => 'pequeño',
                'category_id' => 2
            ],
            [
                'name' => 'Pastel Red Velvet',
                'description' => 'Pastel de terciopelo rojo con crema de queso en capas y decoración minimalista.',
                'price' => 55000,
                'size' => 'grande',
                'category_id' => 1
            ],
            [
                'name' => 'Churros con chocolate',
                'description' => 'Churros recién hechos, crujientes por fuera y suaves por dentro, acompañados de un delicioso dip de chocolate.',
                'price' => 15000,
                'size' => 'mediano',
                'category_id' => 2
            ]
        ];
        
        DB::table('products')->insert($productos);
    }
}
