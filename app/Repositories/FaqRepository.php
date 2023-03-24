<?php

namespace App\Repositories;

use App\Models\Faq;
use Torann\LaravelRepository\Repositories\AbstractRepository;

class FaqRepository extends AbstractRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    protected $model = Faq::class;


    public function getStatusFaq()
    {
        return Faq::STATUS_FAQ;
    }

}
