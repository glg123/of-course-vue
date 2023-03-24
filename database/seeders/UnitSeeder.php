<?php

namespace Database\Seeders;

use App\Models\Unit;
use Illuminate\Database\Seeder;


class UnitSeeder extends Seeder
{
    public function run(): void
    {
        foreach ($this->getUnitsTable() as $unit) {
            Unit::updateOrCreate(
                [
                    'id' => $unit['id']
                ],
                [
                    'name' => $unit['name']
                ]
            );
        }
    }

    public function getUnitsTable()
    {
        return [
            ['id' => 1, 'name' => ['ar' => 'جرام', 'en' => 'جرام']],
            ['id' => 2, 'name' => ['ar' => 'ملي جرام', 'en' => 'ملي جرام']],
            ['id' => 3, 'name' => ['ar' => 'قطعة', 'en' => 'قطعة']],
        ];
    }
}
