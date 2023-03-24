<?php

namespace App\Repositories;

use App\Models\Unit;
use Torann\LaravelRepository\Repositories\AbstractRepository;

class UnitRepository extends AbstractRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    protected $model = Unit::class;

}