<?php

namespace Database\Seeders;

use Database\Seeders\UserSeeder as SeedersUserSeeder;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Eseguiamo prima il seeder delle aziende
        $this->call([
            CompanySeeder::class, // Seeder per creare aziende
            UserSeeder::class,   // Seeder per creare utenti
        ]);
    }
}
