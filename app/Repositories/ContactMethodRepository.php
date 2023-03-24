<?php

namespace App\Repositories;

use App\Models\ContactMethod;
use Torann\LaravelRepository\Repositories\AbstractRepository;

class ContactMethodRepository extends AbstractRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    protected $model = ContactMethod::class;

}