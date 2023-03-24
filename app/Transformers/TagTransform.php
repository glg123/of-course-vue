<?php

namespace App\Transformers;

use App\Models\Tag;
use League\Fractal\TransformerAbstract;

class TagTransform extends TransformerAbstract
{
    /**
     * List of resources to automatically include
     *
     * @var array
     */
    protected array $defaultIncludes = [
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
    public function transform(Tag $tag)
    {
        return [
            "id"=>$tag->id,
            "name"=>$tag->name,
            "type"=>$tag->type,
            "created_at"=>$tag->created_at,
            "created_by"=>$tag->created_by,
        ];
    }
}
