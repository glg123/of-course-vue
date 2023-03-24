<?php

namespace App\Transformers;

use App\Models\Meal;
use App\Models\Order;
use App\Models\Package;
use App\Models\Referral;
use App\Models\PackageVarient;
use App\Models\UserSubscription;
use League\Fractal\TransformerAbstract;

class OrderTransform extends TransformerAbstract
{
    /**
     * List of resources to automatically include
     *
     * @var array
     */
    protected  array $defaultIncludes = [];

    /**
     * List of resources possible to include
     *
     * @var array
     */
    protected  array $availableIncludes = [
        'user', 'trainer', 'delivery', 'meal', 'meals', 'package_varient', 'user_subscription',
        'area', 'zone', 'block', 'address'
    ];

    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(Order $order)
    {
        return [
            "id" => $order->id,
            "tag" => $order->tag,
            "status" => $order->status,
            "comment" => $order->comment,
            "price" => $order->price,
            "discount" => $order->discount,
            "total" => $order->total,
            "start_at" => $order->start_at,
            "delivery_cost" => $order->delivery_cost,
            "delivery_at" => $order->delivery_at,
            "type" => $order->type,
            "image" => $order->image_path,
            "shift_time" => $order->shift_time,
            "days" => $order->days,
            "variations" => $order->variations,
        ];
    }

    public function includeUser(Order $order)
    {
        if (!$order->user)
            return null;

        return $this->item($order->user, new UserTransform());
    }

    public function includeAddress(Order $order)
    {
        if (!$order->address)
            return null;

        return $this->item($order->address, new UserAddressTransform());
    }
    public function includeArea(Order $order)
    {
        if (!$order->area)
            return null;

        return $this->item($order->area, new LocationTransform());
    }
    public function includeBlock(Order $order)
    {
        if (!$order->block)
            return null;

        return $this->item($order->block, new LocationTransform());
    }
    public function includeZone(Order $order)
    {
        if (!$order->zone)
            return null;

        return $this->item($order->zone, new ZoneTransform());
    }

    public function includeDelivery(Order $order)
    {
        if (!$order->delivery)
            return null;

        return $this->item($order->delivery, new UserTransform());
    }
    public function includeTrainer(Order $order)
    {
        if (!$order->trainer)
            return null;

        return $this->item($order->trainer, new UserTransform());
    }

    public function includeMeal(Order $order)
    {
        if (!$order->meal)
            return null;

        return $this->item($order->meal, new MealTransform());
    }
    public function includePackageVarient(Order $order)
    {
        if (!$order->package_varient)
            return null;

        return $this->item($order->package_varient, new PackageVarientTransform());
    }

    public function includeMeals(Order $order)
    {
        if (!$order->meals)
            return null;

        return $this->primitive($order, function ($user) {
            return $user->meals;
        });
    }

    public function includeUserSubscription(Order $order)
    {
        if (!$order->user_subscription)
            return null;

        return $this->item($order->user_subscription, new UserSubscriptionsTransform());
    }
}
