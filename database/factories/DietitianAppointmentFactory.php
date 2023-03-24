<?php

namespace Database\Factories;

use App\Models\User;

use Illuminate\Database\Eloquent\Factories\Factory;

class DietitianAppointmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "dietitian_id" =>User::first()->id,
            "user_id" => User::first()->id,
            "date" => now(),
            "time" => now(),
            "price" =>20,
            "payment_status" =>'pending',
            "payment_method" =>'offline',
        ];
    }


}
