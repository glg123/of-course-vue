<?php

namespace Database\Factories;

use App\Models\Copoun;
use App\Models\Package;
use Illuminate\Support\Str;
use App\Models\PackageVarient;
use Illuminate\Database\Eloquent\Factories\Factory;

class OfferFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "copoun_id" =>Copoun::first()->id,
            "start_at" => now(),
            "end_at" => now()->addMonth(),
        ];
    }


}
