<?php

namespace App\Repositories;

use App\Helpers\UploadHelper;
use App\Models\Feature;
use Torann\LaravelRepository\Repositories\AbstractRepository;

class FeatureRepository extends AbstractRepository
{
    use UploadHelper;

    /**
     * Specify Model class name
     *
     * @return string
     */
    protected $model = Feature::class;


    /**
     * Insert New Record in DB
     * @param array $data
     * @return bool|\Illuminate\Database\Eloquent\Model
     */
//    public function createFeature(array $data)
//    {
//        $data['image'] = $this->upload($data['image'], lcfirst(class_basename($this->getModel())));
//        return $this->create($data);
//    }

}
