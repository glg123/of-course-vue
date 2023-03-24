<?php

namespace Database\Seeders;

use App\Models\Tag;
use App\Models\Meal;
use App\Models\MealPlan;
use App\Models\MealCategory;
use Illuminate\Database\Seeder;


class MealSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $meal = Meal::first();
        $meal->categories()->sync(MealCategory::pluck('id'));
        $meal->meal_plans()->sync(MealPlan::pluck('id'));
        $meal->tags()->sync(Tag::pluck('id'));
        $meal->foods()->sync([1=>['is_like'=>1],2=>['qty_before'=>20]]);
    }



}