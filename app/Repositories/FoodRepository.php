<?php

namespace App\Repositories;

use App\Models\Food;
use Torann\LaravelRepository\Repositories\AbstractRepository;

class FoodRepository extends AbstractRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    protected $model = Food::class;

}