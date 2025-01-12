<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ContractFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => "M".$this->faker->unique()->randomNumber(3),
            'desc' => $this->faker->sentence(),
        ];
    }
}
