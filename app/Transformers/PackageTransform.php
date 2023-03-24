<?php

namespace App\Transformers;

use App\Models\Meal;
use App\Models\Package;
use League\Fractal\TransformerAbstract;

class PackageTransform extends TransformerAbstract
{
    /**
     * List of resources to automatically include
     *
     * @var array
     */
    protected  array $defaultIncludes = [
    ];

    /**
     * List of resources possible to include
     *
     * @var array
     */
    protected  array $availableIncludes = [
        'varients','meals','diet_plan','created_by'
    ];

    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(Package $package)
    {
        return [
            "id"=>$package->id,
            "name"=>$package->name,
            "description"=>$package->description,
            "image"=>$package->image_path,
            "status"=>$package->status,
            "show_order"=>$package->show_order,
            "is_celebrity"=>$package->is_celebrity,
            "start_at"=>$package->start_at,
            "variations"=>$package->variations,
        ];
    }

    public function includeDietPlan(Package $package)
    {
        if (!$package->meal_plan)
            return null;

        return $this->item($package->meal_plan, new MealPlanTransform());
    }

    public function includeVarients(Package $package)
    {
        return $this->collection($package->varients, new PackageVarientTransform());
    }

    public function includeMeals(Package $package)
    {
        return $this->collection($package->meals, new MealCategoryTransform());
    }

}
