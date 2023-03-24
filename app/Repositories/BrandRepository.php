<?php

namespace App\Repositories;

use App\Models\Brand;
use Torann\LaravelRepository\Repositories\AbstractRepository;

class BrandRepository extends AbstractRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    protected $model = Brand::class;

}