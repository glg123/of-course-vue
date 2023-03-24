<?php

namespace App\Repositories;

use App\Models\Offer;
use App\Models\Review;
use Torann\LaravelRepository\Repositories\AbstractRepository;

class MealRatingRepository extends AbstractRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    protected $model = Review::class;

}