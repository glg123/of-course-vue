<?php

namespace App\Transformers;

use App\Models\Address;
use App\Models\User;
use App\Models\UserSubscription;
use League\Fractal\TransformerAbstract;

class UserAddressTransform extends TransformerAbstract
{
    protected  array $availableIncludes = [];
    public function transform(Address $address)
    {
        return [
            'id' => $address->id,
            'area_id' => $address->area->name ?? null,
            'block_id' => $address->block->name ?? null,
            'time' => $address->time,
            'map_lat' => $address->map_lat,
            'map_long' => $address->map_long,
            'map_zoom' => $address->map_zoom,
            'address' => $address->address,
            'is_default' => $address->is_default ,
            'default_requested' => $address->default_requested ,
        ];
    }
}