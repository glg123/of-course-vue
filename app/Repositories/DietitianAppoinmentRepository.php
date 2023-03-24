<?php

namespace App\Repositories;

use App\Models\DietitianAppointment;
use Torann\LaravelRepository\Repositories\AbstractRepository;

class DietitianAppoinmentRepository extends AbstractRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    protected $model = DietitianAppointment::class;

}