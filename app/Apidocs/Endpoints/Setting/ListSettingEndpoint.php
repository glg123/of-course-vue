<?php

namespace App\Apidocs\Endpoints\Setting;

use Johnylemon\Apidocs\Facades\Param;
use Johnylemon\Apidocs\Endpoints\Endpoint;

class ListSettingEndpoint extends Endpoint
{
    public function describe(): void
    {

        $this->title('List Settings')
            ->desc('get List Settings The Default Type General')
            ->method('get')
            ->group('setting')
            ->headers([
                'Content-Type' => 'application/json',
            ])->query([
                'type' => Param::type('string')->example([
                    'general',
                    'tutorials',
                    'splash_screen',
                    'shifts'
                ]),
            ]);



        $this->returns(200, [
            "data"=> [
                [
                    "id"   => 1,
                    "key"  => "content_en",
                    "value"=> "content en",
                    "type" => "splash_screen",
                    "group"=> "page1",
                    "lang" => null
                ]
            ],
            "message"=> __("messages.success"),
            "status"=> true
        ], 'Success');
    }
}
