<?php

namespace App\Repositories;

use App\Models\Notification;
use Torann\LaravelRepository\Repositories\AbstractRepository;

class NotificationRepository extends AbstractRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    protected $model = Notification::class;

}