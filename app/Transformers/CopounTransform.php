<?php

namespace App\Transformers;

use App\Models\User;
use App\Models\Copoun;
use League\Fractal\TransformerAbstract;

class CopounTransform extends TransformerAbstract
{
    protected  array $availableIncludes = ['packages','package_varients'];

    protected  array $defaultIncludes = [

    ];

    public function transform(Copoun $copoun)
    {
        return [
            'id' => $copoun->id,
            'name' => $copoun->name,
            'code' => $copoun->code,
            'description' => $copoun->description,
            'status' => $copoun->status,
            'discount' => $copoun->discount,
            'discount_type' => $copoun->discount_type,
            'max_use' => $copoun->max_use,
            'used' => $copoun->used,
            'start_at' => $copoun->start_at,
            'end_at' => $copoun->end_at ,
            'min_order_total' => $copoun->min_order_total ,
            'image' => $copoun->image_path,
        ];
    }

    public function includePackages(Copoun $copoun)
    {
        return $this->primitive($copoun, function ($copoun) {
            return $copoun->packages;
        });
    }

    public function includePackageVarients(Copoun $copoun)
    {
        return $this->primitive($copoun, function ($copoun) {
            return $copoun->package_varients;
        });
    }


}