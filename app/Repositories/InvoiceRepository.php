<?php

namespace App\Repositories;

use App\Models\Food;
use App\Models\Invoice;
use Torann\LaravelRepository\Repositories\AbstractRepository;

class InvoiceRepository extends AbstractRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    protected $model = Invoice::class;

}