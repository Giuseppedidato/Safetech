<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Company;
use Faker\Factory as Faker;

class CompanySeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create();

        // Crea 10 aziende
        for ($i = 0; $i < 10; $i++) {
            Company::create([
                'ragione_sociale' => $faker->company,
                'email' => $faker->companyEmail,
                'indirizzo' => $faker->address,
                'partita_iva' => $faker->regexify('[A-Z]{2}[0-9]{11}'), // Genera un codice VAT fittizio
                'email_fatturazione' => $faker->email,
            ]);
        }
    }
}


