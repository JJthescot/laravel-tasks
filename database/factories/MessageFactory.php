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
        $messagables = [
            \App\Models\Contract::class,
            \App\Models\Job::class,
        ]; // Add new noteables here as we make them
        $messagableType = $this->faker->randomElement($messagables);
        $messagable = $messagableType::factory()->create();
        
        return [
            'messagable_type' => $messagableType,
            'messagable_id' => $this->faker->numberBetween(1,21),//$messagable->id,
            'messageContent' => $this->faker->sentence(),
            'message_type_id' => $this->faker->numberBetween(1,4),
            'contract_id' => $this->faker->numberBetween(1,21),
            'job_id' => $this->faker->boolean(80) ? $this->faker->numberBetween(1,21) : null,
        ];
        
        // return [
        //     'messageContent' => $this->faker->sentence(),
        //     'message_type_id' => $this->faker->numberBetween(1,4),
        //     'contract_id' => $this->faker->numberBetween(1,21),
        //     'job_id' => $this->faker->boolean(80) ? $this->faker->numberBetween(1,21) : null,
        // ];
    }
}
