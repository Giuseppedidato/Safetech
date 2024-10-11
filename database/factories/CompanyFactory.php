<?php

namespace Database\Factories;

use App\Models\Company;
use Illuminate\Database\Eloquent\Factories\Factory;

class CompanyFactory extends Factory
{
    protected $model = Company::class;

    public function definition()
    {
        return [
            'ragione_sociale' => $this->faker->company,
            'email' => $this->faker->unique()->safeEmail,
            'partita_iva' => $this->faker->unique()->vat(),
            'telefono' => $this->faker->phoneNumber,
            'indirizzo' => $this->faker->address,
        ];
    }
}
