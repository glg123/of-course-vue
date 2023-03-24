<?php

namespace App\Apidocs\Endpoints\DietitianAppointment;

use Johnylemon\Apidocs\Facades\Param;
use Johnylemon\Apidocs\Endpoints\Endpoint;

class ListDietitanAppointmentEndpoint extends Endpoint
{
    public function describe(): void
    {

        $this->title('Get all Dietitian Appointments')
            ->desc('Get all  Dietitian Appointments')
            ->method('get')
            ->group('D-Appointment')
            ->headers([
                'Content-Type' => 'application/json',
                'Authorization' => 'Bearer {API_TOKEN}',
            ])->query([
                'user_id' => Param::type('int'),
                'payment_status' => Param::type('sting'),
                'dietitian_id' => Param::type('int'),
            ]);

        $this->returns(200, [
            "data"=> [
                "id"=> 1,
                "date"=>" date",
                "time"=> "time",
                "payment_method"=> 'offline',
                "payment_status"=> "pending",
                "created_at"=> null,
                "user"=> null,
                "dietitian"=> null,

            ],
            "meta"=> [
                "pagination"=> [
                    "total"=> 2,
                    "count"=> 2,
                    "per_page"=> 10,
                    "current_page"=> 1,
                    "total_pages"=> 1,
                    "links"=> []
                ]
                ],
            "message"=> __("messages.success"),
            "status"=> true
        ], 'Success');
    }
}
