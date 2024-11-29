<?php

namespace Database\Seeders;

use App\Models\Rekest;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Administrador',
            'email' => 'x@x.com',
        ]);

        $this->call([CategorySeeder::class]);
        $this->call([ProductSeeder::class]);
        $this->call([ClientSeeder::class]);
        Rekest::factory()->count(5)->create();
    }
}
