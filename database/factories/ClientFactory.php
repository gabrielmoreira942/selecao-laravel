<?php

namespace Database\Factories;

use App\Models\Client;
use Illuminate\Database\Eloquent\Factories\Factory;

class ClientFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Client::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
            //Apenas testes.
        return [
             'name'         => $this->faker->name,
             'email'        => $this->faker->email,
             'RG'           => $this->faker->unique()->numberBetween(1,200),
             'CPF'          => $this->faker->unique()->numberBetween(1,200),
             'birth_date'   => $this->faker->date('Y-m-d'),
             'number'       => $this->faker->unique()->numberBetween(1,200),
             'UF'           => $this->faker->word
        ];
    }
}

