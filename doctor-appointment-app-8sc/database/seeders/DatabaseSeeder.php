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
            RoleSeeder::class
        ]);

        //crear usuarios de prueba cada que se ejecuten migraciones


        User::factory()->create([
            'name' => 'Emmanuel Basto',
            'email' => 'emmanuelbasto10@gmail.com',
            'password' => bcrypt('12345678')
        ]);
    }
}
