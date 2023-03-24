<?php

namespace App\Transformers;

use App\Models\User;
use App\Models\Offer;
use App\Models\Copoun;
use App\Models\Notification;
use League\Fractal\TransformerAbstract;

class NotificationTransform extends TransformerAbstract
{
    protected  array $availableIncludes = [];

    // protected  array $defaultIncludes = [

    // ];

    public function transform(Notification $notification)
    {
        return [
            'id' => $notification->id,
            'title' => $notification->title,
            'body' => $notification->body,
            'type' => $notification->type ,
            'modelable_type' => $notification->modelable_type,
            'read_at' => $notification->read_at,
            'data' => $notification->data,
            'created_at' => $notification->created_at ? $notification->created_at->format('Y-m-d H:i') : null,
        ];
    }





}