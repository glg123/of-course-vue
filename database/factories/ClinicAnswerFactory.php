<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Clinic;
use App\Models\Package;
use Illuminate\Support\Str;
use App\Models\PackageVarient;
use Illuminate\Database\Eloquent\Factories\Factory;

class ClinicAnswerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $question = Clinic::first();
        return [
            "clinic_id" =>$question->id,
            "user_id" => User::first()->id,
            "comment" => 'comment',
            "answer" => $question->answer,
        ];
    }


}
