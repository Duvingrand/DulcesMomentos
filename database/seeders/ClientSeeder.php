<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $clientes = [
            [
                'name' => 'Juan Pérez',
                'phone_number' => '310 555 1234',
                'address' => 'Calle 10 #15-20, Medellín'
            ],
            [
                'name' => 'María González',
                'phone_number' => '305 432 9876',
                'address' => 'Carrera 70 #34-56, Medellín'
            ],
            [
                'name' => 'Carlos Rodríguez',
                'phone_number' => '314 678 2345',
                'address' => 'Avenida 50 #10-30, Bogotá'
            ],
            [
                'name' => 'Laura Ramírez',
                'phone_number' => '300 234 5678',
                'address' => 'Calle 25 #78-90, Cali'
            ],
            [
                'name' => 'Pedro Martínez',
                'phone_number' => '317 987 6543',
                'address' => 'Carrera 80 #12-45, Barranquilla'
            ],
            [
                'name' => 'Ana López',
                'phone_number' => '321 876 5432',
                'address' => 'Calle 40 #10-60, Bogotá'
            ],
            [
                'name' => 'José García',
                'phone_number' => '310 123 4567',
                'address' => 'Avenida 9 #15-90, Medellín'
            ],
            [
                'name' => 'Sofía Sánchez',
                'phone_number' => '305 876 1234',
                'address' => 'Calle 15 #50-30, Cartagena'
            ]
        ];
        

        DB::table('clients')->insert($clientes);
    }
}
