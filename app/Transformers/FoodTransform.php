<?php

namespace App\Transformers;

use App\Models\Food;
use League\Fractal\TransformerAbstract;

class FoodTransform extends TransformerAbstract
{
    /**
     * List of resources to automatically include
     *
     * @var array
     */
    protected  array $defaultIncludes = [
        'unit','brand'
    ];

    /**
     * List of resources possible to include
     *
     * @var array
     */
    protected  array $availableIncludes = [
        //
    ];

    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(Food $food)
    {
        return [
            "id"=>$food->id,
            "name"=>$food->name,
            "description"=>$food->description,
            "image"=>$food->image,
            "code"=>$food->code,
            "calory"=>$food->calory,
            "serve"=>$food->serve,
            "stock"=>$food->stock,
            "stock_reminder"=>$food->stock_reminder,
            "price"=>$food->price,
            "is_component"=>$food->is_component,
            "is_liked"=>$food->is_liked,
            "variations"=>$food->variations,
            "created_by"=>$food->created_by,
        ];
    }

    public function includeUnit(Food $food)
    {
        return $this->item($food->unit, new UnitTransform());
    }

    public function includeBrand(Food $food)
    {
        return $this->item($food->brand, new BrandTransform());
    }

}
