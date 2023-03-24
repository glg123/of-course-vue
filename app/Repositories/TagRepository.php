<?php

namespace App\Repositories;

use App\Models\Tag;
use Torann\LaravelRepository\Repositories\AbstractRepository;

class TagRepository extends AbstractRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    protected $model = Tag::class;

    public function getTagTypes(){
        return [
            'meal'=>$this->getModel()->MEAL,
            'customer'=>$this->getModel()->CUSTOMER,
        ];
    }
}