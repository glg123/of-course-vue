<?php

namespace App\Repositories;

use App\Models\Meal;
use App\Models\MealPlan;
use Torann\LaravelRepository\Repositories\AbstractRepository;

class MealRepository extends AbstractRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    protected $model = Meal::class;

}