<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class MealCategoryFactory extends Factory
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
            "variations" => [
                'has_carb'=>true
            ],
            "reference" => rand(1000,5000),
        ];
    }

   
}
