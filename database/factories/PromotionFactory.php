<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PromotionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'start_date' => $this->faker->dateTimeBetween('-3 month'),
            'end_date' => $this->faker->dateTimeBetween('now', '+3 month'),
            'amount' => rand(50, 1000),
            'quota' => rand(1, 50),
        ];
    }
}
