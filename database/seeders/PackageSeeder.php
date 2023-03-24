<?php

namespace Database\Seeders;

use App\Models\Package;
use App\Models\MealPlan;
use App\Models\MealCategory;
use Illuminate\Database\Seeder;

class PackageSeeder extends Seeder
{

    public function run(): void
    {
        $package = Package::create([
            'name'=>[
                'ar'=>'package 1',
                'en'=>'package 1',
            ],
            'description'=>[
                'ar'=>'desc package 1',
                'en'=>'desc package 1',
            ],
            'meal_plan_id'=>MealPlan::first()->id,
            'status'=>1,
            'is_celebrity'=>1,
            'start_at'=>now(),
            'show_order'=>1,
            'variations'=>[
                'carbs'=>100,
                'protein'=>100,
                'fat'=>100,
            ]
        ]);
        $package = Package::first();
        
        $varients =[
            'name'=>[
                'ar'=>'ad',
                'en'=>'ad',
            ],
            'days_available'=>10,
            'price'=>10,
            'avg_price'=>10,
            'days'=>[
                'sunday'=>[
                    1=>2,
                    2=>1,
                ],
                'monday'=>[
                    1=>2,
                    2=>1,
                ]
            ]
        ];

        $meals =[
            'meal_category_id'=>MealCategory::first()->id,
            'days'=>[
                'sunday'=>[
                    1,
                    21,
                ],
                'monday'=>[
                    1,
                    2,
                ],
                'tuesday'=>[
                    1,
                    2,
                ],
                'wednesday'=>[
                    1,
                    2,
                ],
                'thursday'=>[
                    1,
                    2,
                ]
            ]
        ];
        $package->varients()->create($varients);
        $package->meals()->create($meals);
    }



}