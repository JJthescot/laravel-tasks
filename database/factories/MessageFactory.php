<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class MessageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'messageContent' => $this->faker->sentence(),
            'message_types_id' => $this->faker->randomNumber(1),
            'jobs_id' => $this->faker->randomNumber(1),
        ];
    }
}
