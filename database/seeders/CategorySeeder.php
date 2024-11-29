<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert([
            ['name' => 'Cupcakes'],
            ['name' => 'Galletas'],
            ['name' => 'Brownies'],
            ['name' => 'Pasteles'],
            ['name' => 'Postres fríos'],
            ['name' => 'Malteadas'],
            ['name' => 'Otros'],
        ]);
    }
}
