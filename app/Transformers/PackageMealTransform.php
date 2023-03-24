<?php

namespace App\Transformers;

use App\Models\PackageMeal;
use App\Models\PackageVarient;
use League\Fractal\TransformerAbstract;

class PackageMealTransform extends TransformerAbstract
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
    public function transform(PackageMeal $meal)
    {
        return [
            "id"=>$meal->id,
            "category_name"=>$meal->category->name ?? '',
            "meal_category_id"=>$meal->meal_category_id ?? '',
            "days"=>$meal->days,
        ];
    }
}
