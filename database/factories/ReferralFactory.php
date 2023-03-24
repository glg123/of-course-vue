<?php

namespace Database\Factories;

use App\Models\Unit;
use App\Models\Brand;
use App\Models\Package;
use Illuminate\Support\Str;
use App\Models\PackageVarient;
use Illuminate\Database\Eloquent\Factories\Factory;

class ReferralFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "reference_id"=>rand(0,10000),
            "name" =>[
                'ar'=>$this->faker->name(),
                'en'=>$this->faker->name()
            ],
            "additional_days" => 0,
            "bonus" => 10,
            "all_package" => 0,
            "packages" => Package::pluck('id'),
            "package_varients" => PackageVarient::pluck('id'),
        ];
    }


}
