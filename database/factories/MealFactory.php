<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class MealFactory extends Factory
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
            "active" => 1,
            "code" => rand(1000,5000),
            "in_app" => 1,
            "variations" => [
                'carb'=>100,
                'fat'=>100,
                'protein'=>100,
                'calories'=>100,
            ],
            "settings" => [
                'saturday',
                'sunday',
                'monday',
                'tuesday',
                'wednesday',
                'thursday',
                'friday',
            ],
        ];
    }


}
