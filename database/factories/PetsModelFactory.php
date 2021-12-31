<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PetsModelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'age' => rand(1,180),
            'race' => $this->faker->name(),
            'description' => $this->faker->paragraph(),
            'pet_type_id' => 10
        ];
    }
}
