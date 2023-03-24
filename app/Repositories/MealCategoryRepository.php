<?php

namespace App\Repositories;

use App\Models\MealCategory;
use Torann\LaravelRepository\Repositories\AbstractRepository;

class MealCategoryRepository extends AbstractRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    protected $model = MealCategory::class;

}