<?php

namespace Database\Factories;

use App\Models\Brand;
use App\Models\Unit;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class FoodFactory extends Factory
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
            "brand_id" => Brand::select('id')->first()->id,
            "unit_id" => Unit::select('id')->first()->id,
            "code" => rand(55555,100000),
            "calory" => 100,
            "serve" => 100,
            "stock_reminder" => 0,
            "price" => 0,
            "is_component" => true,
            "is_liked" => true,
            "variations" => [
                'fat'=>20,
                'protein'=>20,
                'carb'=>50,
            ],
        ];
    }

   
}
