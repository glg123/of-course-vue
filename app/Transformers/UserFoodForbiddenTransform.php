<?php

namespace App\Transformers;

use App\Models\User;
use App\Models\Clinic;
use App\Models\ClinicAnswer;
use App\Models\DietitianAppointment;
use App\Models\UserForbiddenFood;
use League\Fractal\TransformerAbstract;

class UserFoodForbiddenTransform extends TransformerAbstract
{
    protected  array $availableIncludes = [];

    protected  array $defaultIncludes = [
        'user','food'
    ];

    public function transform(UserForbiddenFood $forbidden)
    {
        return [
            'id' => $forbidden->id,
            'type' => $forbidden->type,
            'varitaions' => $forbidden->varitaions,
            'created_at' => $forbidden->created_at->format('Y-m-d H:i')
        ];
    }

    public function includeUser(UserForbiddenFood $forbidden)
    {
        return $this->item($forbidden->user,new UserTransform());
    }
    public function includeFood(UserForbiddenFood $forbidden)
    {
        return $this->item($forbidden->food,new FoodTransform());
    } 




}