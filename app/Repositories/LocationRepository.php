<?php

namespace App\Repositories;

use App\Models\Location;
use Torann\LaravelRepository\Repositories\AbstractRepository;

class LocationRepository extends AbstractRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    protected $model = Location::class;

    public function getLocationTypes(){
        return [
            'area'=>$this->getModel()->AREA_TYPE,
            'block'=>$this->getModel()->BLOCK_TYPE,
        ];
    }
}