<?php

namespace Database\Seeders;

use App\Models\Zone;
use App\Models\Location;
use Illuminate\Database\Seeder;

class LocationSeeder extends Seeder
{
    public function run(): void
    {
        Location::factory(2)->create();
        $area = Location::getArea()->first();
        $blocks = Location::factory(4)->create([
            'type'=>2,
            'area_id'=>$area->id,
        ]);
        $blocks = Location::getBlock()->pluck('id');

       Zone::factory(2)->create([
            'blocks'=>$blocks,
            'blocks'=> $area->id
       ]);

    }



}