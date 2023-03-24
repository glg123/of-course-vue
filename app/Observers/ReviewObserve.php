<?php

namespace App\Observers;

use App\Models\Meal;
use App\Models\Order;
use App\Models\Review;
use App\Models\PackageVarient;

class ReviewObserve
{
    public function creating(Review $review){
        $type = Meal::class;
        switch ($review->type) {
            case 'order':
                $type = Order::class;
                break;
            case 'meal':
                $type = Meal::class;
                break;
            case 'package_varient':
                $type = PackageVarient::class;
                break;
        }
        $review->modelable_type = $type;
    }

}