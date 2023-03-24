<?php

namespace App\Repositories;

use App\Models\Copoun;
use Torann\LaravelRepository\Repositories\AbstractRepository;

class CopounRepository extends AbstractRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    protected $model = Copoun::class;

}