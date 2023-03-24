<?php

namespace App\Transformers;

use App\Models\Order;
use App\Models\Review;
use League\Fractal\TransformerAbstract;

class ReviewTransform extends TransformerAbstract
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
        'user','item'
    ];

    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(Review $review)
    {
        return [
            "id"=>$review->id,
            "status"=>(bool)$review->status,
            "type"=>$review->type,
            "score"=>$review->score,
            "title"=>$review->title,
            "review"=>$review->review,
            "answer"=>$review->answer,
            "days"=>$review->days,
            "variations"=>$review->variations,
        ];
    }

    public function includeUser(Review $review)
    {
        if (!$review->user)
            return null;

        return $this->item($review->user, new UserTransform());
    }
    public function includeItem(Review $review)
    {
        return $this->primitive($review, function ($review) {
            return $review->item_details;
        });
    }
}