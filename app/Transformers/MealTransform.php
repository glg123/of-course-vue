<?php

namespace App\Transformers;

use App\Models\Meal;
use League\Fractal\TransformerAbstract;

class MealTransform extends TransformerAbstract
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
        'foods','categories','tags','diet_plans'
    ];

    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(Meal $meal)
    {
        return [
            "id"=>$meal->id,
            "name"=>$meal->name,
            "description"=>$meal->description,
            "image"=>$meal->image,
            "code"=>$meal->code,
            "active"=>$meal->active,
            "in_app"=>$meal->in_app,
            "variations"=>$meal->variations,
            "settings"=>$meal->settings,
            "created_by"=>$meal->created_by
        ];
    }

    public function includeFoods(Meal $meal)
    {
        return $this->collection($meal->foods, new FoodTransform());
    }
    public function includeCategories(Meal $meal)
    {
        return $this->collection($meal->categories, new MealCategoryTransform());
    }
    public function includeTags(Meal $meal)
    {
        return $this->collection($meal->tags, new TagTransform());
    }
    public function includeDietPlans(Meal $meal)
    {
        return $this->collection($meal->meal_plans, new MealPlanTransform());
    }



}
