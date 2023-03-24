<?php

namespace App\Transformers;


use App\Models\Location;
use League\Fractal\TransformerAbstract;

class LocationTransform extends TransformerAbstract
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
        'area','zones','blocks'
    ];

    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(Location $location)
    {
        return [
            "id"=>$location->id,
            "name"=>$location->name,
            "type"=>(int)$location->type,
            "status"=>$location->status,
        ];
    }

    public function includeArea(Location $location)
    {

        return !$location->area ? null : $this->item($location->area, new LocationTransform());
    }

    public function includeZones(Location $location)
    {
        return !$location->zones ? null : $this->collection($location->zones, new PackageVarientTransform());
    }
    public function includeBlocks(Location $location)
    {
        return !$location->blocks ? null : $this->collection($location->blocks, new LocationTransform());
    }



}
