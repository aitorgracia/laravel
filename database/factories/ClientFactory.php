<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Client>
 */
class ClientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            "dni" => $this->faker->dni(),
            "nombre" => $this->faker->firstName(),
            "apellidos" => $this->faker->lastName(),
            "telefono" => $this->faker->mobileNumber(),
            "email" => $this->faker->email()
        ];
    }
}
