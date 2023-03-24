<?php

namespace App\Repositories;

use App\Models\Referral;
use Torann\LaravelRepository\Repositories\AbstractRepository;

class ReferralRepository extends AbstractRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    protected $model = Referral::class;

}