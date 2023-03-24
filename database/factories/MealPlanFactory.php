<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class MealPlanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "name" =>[
                'ar'=>$this->faker->name(),
                'en'=>$this->faker->name()
            ],
            "description" => [
                'ar'=>$this->faker->name(),
                'en'=>$this->faker->name()
            ],
            "status" => 1,
            "reference" => rand(1000,5000),
        ];
    }

   
}
