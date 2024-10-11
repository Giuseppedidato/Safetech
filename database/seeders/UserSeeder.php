<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Company;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $companies = Company::all();

        // Crea un utente specifico per i test con password nota
        User::factory()->create([
            'name' => 'giuseppe',
            'email' => 'giuseppedidato@hotmail.com',
            'password' => bcrypt('Valeriamolly@3977'), 
            'company_id' => $companies->random()->id, // Assegna l'utente a una azienda casuale
        ]);

        // Crea altri 9 utenti di prova, associati casualmente alle aziende
        User::factory()
            ->count(9)
            ->create()
            ->each(function ($user) use ($companies) {
                $user->company()->associate($companies->random())->save();
            });
    }
}
