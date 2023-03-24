<?php

namespace App\Repositories;

use App\Models\Offer;
use Torann\LaravelRepository\Repositories\AbstractRepository;

class OfferRepository extends AbstractRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    protected $model = Offer::class;

}