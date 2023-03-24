<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ReferralUserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        // dd(User::first());
        return [
            "reference_id"=>rand(0,10000),
            "user_id" => User::factory()->create()->id,
        ];
    }


}
