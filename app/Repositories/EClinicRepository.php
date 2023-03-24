<?php

namespace App\Repositories;

use App\Models\Clinic;
use App\Models\Offer;
use Torann\LaravelRepository\Repositories\AbstractRepository;

class EClinicRepository extends AbstractRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    protected $model = Clinic::class;

}