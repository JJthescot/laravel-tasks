<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class JobFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'jobNumber' => $this->faker->randomNumber(2),
            'contract_id' => $this->faker->numberBetween(1,21),
        ];
    }
}
