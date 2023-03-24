<?php

namespace App\Transformers;

use App\Models\Meal;
use App\Models\Package;
use App\Models\Referral;
use League\Fractal\TransformerAbstract;

class ReferralTransform extends TransformerAbstract
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
    ];

    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(Referral $referral)
    {
        return [
            "id"=>$referral->id,
            "reference_id"=>$referral->reference_id,
            "name"=>$referral->name,
            "additional_days"=>$referral->additional_days,
            "bonus"=>$referral->bonus,
            "active"=>$referral->active,
            "image"=>$referral->image_path,
            "all_package"=>$referral->all_package,
            "packages"=>$referral->packages,
            "package_varients"=>$referral->package_varients,
            "variations"=>$referral->variations,
        ];
    }

    public function includeDietPlan(Package $package)
    {
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
