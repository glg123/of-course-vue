<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class FaqFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "title" =>[
                'ar'=>$this->faker->name(),
                'en'=>$this->faker->name()
            ],
            "question" => $this->faker->name(),
            "answer" => $this->faker->name()
        ];
    }


}
