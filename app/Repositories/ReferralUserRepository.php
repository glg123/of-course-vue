<?php

namespace App\Repositories;

use App\Models\ReferralUser;
use Torann\LaravelRepository\Repositories\AbstractRepository;

class ReferralUserRepository extends AbstractRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    protected $model = ReferralUser::class;

}