<?php

namespace App\Repositories;

use App\Models\MealPlan;
use Torann\LaravelRepository\Repositories\AbstractRepository;

class MealPlanRepository extends AbstractRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    protected $model = MealPlan::class;

}