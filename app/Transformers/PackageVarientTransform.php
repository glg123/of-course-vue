<?php

namespace App\Transformers;

use App\Models\PackageVarient;
use League\Fractal\TransformerAbstract;

class PackageVarientTransform extends TransformerAbstract
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
    protected  array $availableIncludes = [
        'offers'
    ];

    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(PackageVarient $varient)
    {
        return [
            "id"=>$varient->id,
            "name"=>$varient->name,
            "days_available"=>$varient->days_available,
            "price"=>$varient->price,
            "avg_price"=>$varient->avg_price,
            "days"=>$varient->days,
            "offers"=>$varient->offers(),

        ];
    }
    public function includeOffers(PackageVarient $varient)
    {
        return $this->primitive($varient, function ($varient) {
            return $varient->offers();
        });
    }
}
