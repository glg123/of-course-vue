<?php

namespace App\Transformers;


use App\Models\Zone;
use App\Models\Location;
use League\Fractal\TransformerAbstract;

class ZoneTransform extends TransformerAbstract
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
        'area','blocks','morning_driver','evening_driver'
    ];

    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(Zone $zone)
    {
        return [
            "id"=>$zone->id,
            "name"=>$zone->name,
            "status"=>$zone->status,
        ];
    }

    public function includeArea(Zone $zone)
    {
        return !$zone->area ? null : $this->item($zone->area, new LocationTransform());
    }

    public function includeBlocks(Zone $zone)
    {
        return $this->primitive($zone, function ($zone) {
             return $zone->blocks;
        });
    }
    public function includeMorningDriver(Zone $zone)
    {
        return null;
    }
    public function includeEveningDriver(Zone $zone)
    {
        return null;
    }

}