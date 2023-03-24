<?php

namespace Tests\Feature\Auth;

use Tests\TestCase;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RegisterTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     */
   public function testRequiredFieldsForRegistration()
    {
        $this->json('POST', 'api/auth/register', ['Accept' => 'application/json'])
            ->assertStatus(422)
            ->assertJson([
                "message" => "The given data was invalid.",
                "errors" => [
                    "first_name"=> [
                        "The first name field is required."
                    ],
                    "last_name"=> [
                        "The last name field is required."
                    ],
                    "email"=> [
                        "The email field is required."
                    ],
                    "phone"=> [
                        "The phone field is required."
                    ],
                    "country_code"=> [
                        "The country code field is required."
                    ],
                    "gender"=> [
                        "The gender field is required."
                    ],
                    "age"=> [
                        "The age field is required."
                    ],
                    "status"=> [
                        "The status field is required."
                    ],
                    "password"=> [
                        "The password field is required."
                    ],
                    "role"=> [
                        "The role field is required."
                    ]
                ]
            ]);
    }
    public function testRepeatPassword()
    {
        $this->json('POST', 'api/auth/register', ['password'=>'12345678'],['Accept' => 'application/json'])
            ->assertStatus(422)
            ->assertJson([
                "message" => "The given data was invalid.",
                "errors" => [
                    "first_name"=> [
                        "The first name field is required."
                    ],
                    "last_name"=> [
                        "The last name field is required."
                    ],
                    "email"=> [
                        "The email field is required."
                    ],
                    "phone"=> [
                        "The phone field is required."
                    ],
                    "country_code"=> [
                        "The country code field is required."
                    ],
                    "gender"=> [
                        "The gender field is required."
                    ],
                    "age"=> [
                        "The age field is required."
                    ],
                    "status"=> [
                        "The status field is required."
                    ],
                   "password"=> [
                        "The password confirmation does not match."
                    ],
                    "role"=> [
                        "The role field is required."
                    ]
                ]
            ]);
    }

    public function testUserEmailMustUnique()
    {
        $this->json('POST', 'api/auth/register', ['email'=>User::factory()->create()->email],['Accept' => 'application/json'])
            ->assertStatus(422)
            ->assertJson([
                "message" => "The given data was invalid.",
                "errors" => [
                    "email"=> [
                        "The email has already been taken."
                    ],
                    "phone"=> [
                        "The phone field is required."
                    ]
                ]
            ]);
    }

    public function testUserPhoneMustUnique()
    {
        $user = User::factory()->create();
        $this->json('POST', 'api/auth/register', ['email'=>$user->email,'phone'=>$user->phone],['Accept' => 'application/json'])
            ->assertStatus(422)
            ->assertJson([
                "message" => "The given data was invalid.",
                "errors" => [
                    "email"=> [
                        "The email has already been taken."
                    ],
                    "phone"=> [
                        "The phone has already been taken."
                    ]
                ]
            ]);
    }

    public function testSuccessRegister()
    {
        Role::insert([['name'=>'customer','guard_name'=>'web'],['name'=>'customer','guard_name'=>'api']]);
        // dd($this->json('POST', 'api/auth/register', [
        //     "first_name" => "test",
        //     "last_name" => "test",
        //     "email" => "test@test.com",
        //     "phone" => "01093851949",
        //     "country_code" => "dsfsdg",
        //     "image" => null,
        //     "gender" => "male",
        //     "age" => "2",
        //     "status" => "2",
        //     "password" => "12345678",
        //     "password_confirmation" => "12345678",
        //     "role"=>"customer"
        // ])
        //     ->assertStatus(200));
        $this->json('POST', 'api/auth/register', [
            "first_name" => "test",
            "last_name" => "test",
            "email" => "test@test.com",
            "phone" => "01093851949",
            "country_code" => "dsfsdg",
            "image" => null,
            "gender" => "male",
            "age" => "2",
            "status" => "2",
            "password" => "12345678",
            "password_confirmation" => "12345678",
            "role"=>"customer"
        ],['Accept' => 'application/json'])
            ->assertStatus(200);
    }
}
