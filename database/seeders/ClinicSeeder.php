<?php

namespace Database\Seeders;

use App\Models\Clinic;
use App\Models\ClinicAnswer;
use Illuminate\Database\Seeder;

class ClinicSeeder extends Seeder
{
    public function run(): void
    {
        Clinic::factory(4)->create();
        ClinicAnswer::factory(4)->create();
    }
}