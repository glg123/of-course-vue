<?php

namespace Database\Factories;

use App\Models\Package;
use Illuminate\Support\Str;
use App\Models\PackageVarient;
use Illuminate\Database\Eloquent\Factories\Factory;

class CopounFactory extends Factory
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
            "discount" => 10,
            "discount_type" => 'amount',
            "code" => $this->faker->unique()->numerify('#'),
            "max_use" => 10,
            "start_at" => now(),
            "end_at" => now()->addMonth(),
            "packages" => Package::pluck('id'),
            "package_varients" => PackageVarient::pluck('id'),
        ];
    }


}
