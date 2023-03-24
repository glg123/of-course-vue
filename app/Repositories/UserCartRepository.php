<?php

namespace App\Repositories;

use App\Models\Copoun;
use App\Models\UserCart;
use Torann\LaravelRepository\Repositories\AbstractRepository;

class UserCartRepository extends AbstractRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    protected $model = UserCart::class;

}
