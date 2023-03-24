<?php

namespace App\Apidocs\Endpoints\Auth;

use Johnylemon\Apidocs\Facades\Param;
use Johnylemon\Apidocs\Endpoints\Endpoint;

class UpdateProfileEndpoint extends Endpoint
{
    public function describe(): void
    {

        $this->title('Update Profile')
            ->desc('Update Auth Profile')
            ->method('POST')
            ->group('auth')
            ->headers([
                'Content-Type' => 'application/json',
                'Authorization' => 'Bearer {API_TOKEN}',
            ])
            ->body([
                'first_name' => Param::type('array')->example('mohamed')->required(),
                'last_name' => Param::type('array')->example('zanaty')->required(),
                'email' => Param::type('string')->example('mohamed@fa.net')->required(),
                'phone' => Param::type('string')->example('010541564')->required(),
                'country_code' => Param::type('string')->example('EG')->required(),
                'image' => Param::type('string'),
                'gender' => Param::type('string')->example('male')->required()->possible(['male', 'female']),
                'age' => Param::type('integer')->example(20)->required(),
                'status' => Param::type('integer')->example(1)->required(),
                'country_id' => Param::type('integer')->example('mohamed'),
                'city_id' => Param::type('integer')->example('mohamed'),
            ]);

        $this->example( [
            "first_name" => [
                "ar"=>"arName",
                "en"=>"enName",
            ],
            "last_name" => [
                "ar"=>"arName",
                "en"=>"enName",
            ],
            "email" => "mohaamed@fa.com",
            "phone" => "0109385484",
            "country_code" => "Eg",
            "image" => null,
            "gender" => "male",
            "age" => "25",
            "status" => "2",
            "country_id" => null,
            "city_id" => null,
        ], 'Update Profile1 example');

        $this->returns(422, [
            'message' => 'The given data was invalid.',
            'errors' => [],
            ], 'Validation Message');

        $this->returns(200, [
            'data' => [
                "first_name"=> "qwr",
                "last_name"=> "sdwf",
                "id"=> 3,
                "is_verified"=> false,
                "api_token"=> "token...."
            ],
            "status" => true
        ], 'Success');
    }
}
