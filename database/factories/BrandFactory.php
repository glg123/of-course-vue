<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class BrandFactory extends Factory
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
        ];
    }

   
}
