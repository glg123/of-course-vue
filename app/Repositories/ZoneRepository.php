<?php

namespace App\Repositories;

use App\Models\Location;
use App\Models\Zone;
use Torann\LaravelRepository\Repositories\AbstractRepository;

class ZoneRepository extends AbstractRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    protected $model = Zone::class;

}