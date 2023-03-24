<?php

namespace App\Transformers;

use App\Models\User;
use App\Models\Clinic;
use App\Models\ClinicAnswer;
use App\Models\DietitianAppointment;
use League\Fractal\TransformerAbstract;

class DietitianAppointmentTransform extends TransformerAbstract
{
    protected  array $availableIncludes = [];

    protected  array $defaultIncludes = [
        'user','dietitian'
    ];

    public function transform(DietitianAppointment $appointment)
    {
        return [
            'id' => $appointment->id,
            'date' => $appointment->date,
            'time' => $appointment->time,
            'payment_status' => $appointment->payment_status,
            'payment_method' => $appointment->payment_method,
            'created_at' => $appointment->created_at->format('Y-m-d H:i')
        ];
    }

    public function includeUser(DietitianAppointment $appointment)
    {
        return $this->item($appointment->user,new UserTransform());
    }
    public function includeDietitian(DietitianAppointment $appointment)
    {
        return $this->item($appointment->dietitian,new UserTransform());
    }


}