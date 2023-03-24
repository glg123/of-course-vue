<?php

namespace App\Transformers;

use App\Models\Brand;
use App\Models\MealCategory;
use App\Models\Unit;
use League\Fractal\TransformerAbstract;

class MealCategoryTransform extends TransformerAbstract
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
    public function transform(MealCategory $mealCat)
    {
        return [
            "id"=>$mealCat->id,
            "name"=>$mealCat->name,
            "description"=>$mealCat->description,
            "reference"=>$mealCat->reference,
            "image"=>$mealCat->image,
            "status"=>$mealCat->status,
            "variations"=>$mealCat->variations,
            "created_by"=>$mealCat->created_by,
            "created_at"=>$mealCat->created_at,
        ];
    }
}
