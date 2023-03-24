<?php

namespace App\Transformers;

use App\Models\User;
use App\Models\Offer;
use App\Models\Copoun;
use League\Fractal\TransformerAbstract;

class OfferTransform extends TransformerAbstract
{
    protected  array $availableIncludes = ['copoun'];

    // protected  array $defaultIncludes = [

    // ];

    public function transform(Offer $offer)
    {
        return [
            'id' => $offer->id,
            'status' => $offer->status,
            'start_at' => $offer->start_at,
            'end_at' => $offer->end_at ,
            'image' => $offer->image_path,
        ];
    }

    public function includeCopoun(Offer $offer)
    {
        return $this->item($offer->copoun, new CopounTransform());

    }



}