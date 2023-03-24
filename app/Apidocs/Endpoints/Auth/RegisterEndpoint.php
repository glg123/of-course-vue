<?php

namespace App\Apidocs\Endpoints\Auth;

use Johnylemon\Apidocs\Facades\Param;
use Johnylemon\Apidocs\Endpoints\Endpoint;

class RegisterEndpoint extends Endpoint
{
    public function describe(): void
    {

        $this->title('Register')
            ->desc('Register In Our App As Customer,...,..')
            ->method('POST')
            ->group('auth')
            ->headers([
                'Content-Type' => 'application/json',
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
                'addresses' => Param::type('array')->example([
                    'area_id' => Param::type('integer')->example('mohamed'),
                    'block_id' => Param::type('integer')->example('mohamed'),
                    'time' => Param::type('string')->example('evening'),
                    'map_long' => Param::type('string')->example('215848415'),
                    'map_lat' => Param::type('string')->example('215848415'),
                    'map_zoom' => Param::type('string')->example('215848415'),
                    'address' => Param::type('array')->example([
                        "street" => "Street",
                        "jedha" => "Jedha",
                        "house_number" => "1",
                        "floor_number" => "10",
                        "apartment_number" => "10",
                        "address_type" => "office",
                        "comment" => "comment"
                    ])
                ]),
                'comment' => Param::type('string')->example(12345678),
                'password' => Param::type('string')->example(12345678)->required(),
                'password_confirmation' => Param::type('string')->example(12345678)->required(),
                'role' => Param::type('string')->example('customer')
            ]);

        $this->example([
            "first_name" => [
                "ar" => "arName",
                "en" => "enName",
            ],
            "last_name" => [
                "ar" => "arName",
                "en" => "enName",
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
            "password" => "57878647",

            "password_confirmation" => "57878647",
            "role" => "customer",
            'addresses' =>[
                'area_id' => 1,
                'block_id' => 2,
                'time' =>'evening',
                'map_long' => '215848415',
                'map_lat' => '215848415',
                'map_zoom' => '215848415',
                'address' => [
                    "street" => "Street",
                    "jedha" => "Jedha",
                    "house_number" => "1",
                    "floor_number" => "10",
                    "apartment_number" => "10",
                    "address_type" => "office",
                    "comment" => "comment"
                ]
            ],
        ], 'Register 1 example');

        $this->returns(422, [
            'message' => 'The given data was invalid.',
            'errors' => [],
        ], 'Validation Message');

        $this->returns(200, [
            'data' => [
                "first_name" => "qwr",
                "last_name" => "sdwf",
                "id" => 3,
                "is_verified" => false,
                "api_token" => "token...."
            ],
            "status" => true
        ], 'Success');
    }
}
