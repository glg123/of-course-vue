<?php

namespace App\Transformers;

use App\Models\MealPlan;
use League\Fractal\TransformerAbstract;

class MealPlanTransform extends TransformerAbstract
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
    public function transform(MealPlan $mealplan)
    {
        return [
            "id"=>$mealplan->id,
            "name"=>$mealplan->name,
            "description"=>$mealplan->description,
            "image"=>$mealplan->image,
            "reference"=>$mealplan->reference,
            "status"=>$mealplan->status,
        ];
    }
}
