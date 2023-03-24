<?php

namespace App\Transformers;

use App\Models\ContactMethod;
use League\Fractal\TransformerAbstract;

class ContactTransform extends TransformerAbstract
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
    public function transform(ContactMethod $contact)
    {
        return [
            "id"=>$contact->id,
            "name"=>$contact->name,
            "created_at"=>$contact->created_at->format('Y-m-d'),
        ];
    }
}
