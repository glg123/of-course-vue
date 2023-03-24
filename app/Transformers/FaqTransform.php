<?php

namespace App\Transformers;

use App\Models\Faq;
use App\Models\Brand;
use League\Fractal\TransformerAbstract;

class FaqTransform extends TransformerAbstract
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
    public function transform(Faq $faq)
    {
        return [
            "id"=>$faq->id,
            "title"=>$faq->title,
            "question"=>$faq->question,
            "answer"=>$faq->answer,
            "status"=>$faq->status,
            "created_at"=>$faq->created_at->format('Y-m-d'),
        ];
    }
}
