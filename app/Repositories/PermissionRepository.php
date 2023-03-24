<?php

namespace App\Repositories;

use Spatie\Permission\Models\Permission;
use Torann\LaravelRepository\Repositories\AbstractRepository;

class PermissionRepository extends AbstractRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    protected $model = Permission::class;
}