<?php

namespace Database\Factories;

use App\Models\Package;
use Illuminate\Support\Str;
use App\Models\PackageVarient;
use Illuminate\Database\Eloquent\Factories\Factory;

class ClinicFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "question" =>$this->faker->name(),
            "is_editable" => 1,
            "status" => 1,
            "tag" => 'tag',
            "order" =>1,
            "frequency" => [
                'end_date','middle_date','start_date','daily'
            ],
            "answer_type" => 'multi_choice',//['text','polar']
            "choices" => [
                'yes','no','اها'
            ],

        ];
    }


}
