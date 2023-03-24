<?php

namespace App\Transformers;

use App\Models\Unit;
use League\Fractal\TransformerAbstract;

class UnitTransform extends TransformerAbstract
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
    public function transform(Unit $unit)
    {
        return [
            "id"=>$unit->id,
            "name"=>$unit->name,
            "description"=>$unit->description,
            "created_at"=>$unit->created_at,
            "created_by"=>$unit->created_by,
        ];
    }
}
