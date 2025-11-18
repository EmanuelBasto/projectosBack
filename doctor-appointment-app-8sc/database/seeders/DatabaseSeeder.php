<?php

namespace Database\Seeders;

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
       //llamar a roles seeder
         $this->call([
            RoleSeeder::class,
            UserSeeder::class,
        ]);

        //crear usuarios de prueba cada que se ejecuten migraciones
        
    }
}
