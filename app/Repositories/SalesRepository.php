<?php

namespace App\Repositories;

use App\Models\Order;
use App\Models\User;
use Torann\LaravelRepository\Repositories\AbstractRepository;

class SalesRepository extends AbstractRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    protected $model = Order::class;
}
