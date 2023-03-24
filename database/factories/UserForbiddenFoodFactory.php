<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Clinic;
use App\Models\Food;
use App\Models\Package;
use Illuminate\Support\Str;
use App\Models\PackageVarient;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserForbiddenFoodFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "food_id" =>Food::first()->id,
            "user_id" => User::first()->id,
        ];
    }


}
