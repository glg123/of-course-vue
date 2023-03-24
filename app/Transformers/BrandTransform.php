<?php

namespace App\Transformers;

use App\Models\Unit;
use App\Models\Brand;
use League\Fractal\TransformerAbstract;

class BrandTransform extends TransformerAbstract
{
    /**
     * List of resources to automatically include
     *
     * @var array
     */
    protected  array $defaultIncludes = [
        //
    ];

    /**
     * List of resources possible to include
     *
     * @var array
     */
    // protected  array $availableIncludes = [
    //     //
    // ];

    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(Brand $brand)
    {
        return [
            "id"=>$brand->id,
            "name"=>$brand->name,
            "description"=>$brand->description,
            "image"=>$brand->image,
            "status"=>$brand->status,
            "created_at"=>$brand->created_at,
            "created_by"=>$brand->created_by,
        ];
    }
}
