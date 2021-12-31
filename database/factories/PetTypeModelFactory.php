<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PetTypeModelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id' => $this->faker->unique()->numberBetween(1,3),
            'name' => $this->faker->name()
        ];
    }
}
