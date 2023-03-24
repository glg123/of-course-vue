<?php

namespace Tests\Feature\Auth;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LoginTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testMustEnterEmailAndPassword()
    {
        $this->json('POST', 'api/auth/login')
            ->assertStatus(422)
            ->assertJson([
                "message" => "The given data was invalid.",
                "errors" => [
                    'phone' => ["The phone field is required."],
                    'password' => ["The password field is required."],
                ]
            ]);
    }

    public function testPhoneMustExistIDB()
    {
        $this->json('POST', 'api/auth/login',['phone'=>0124120135,'password'=>'password'])
            ->assertStatus(422)
            ->assertJson([
                "message" => "The given data was invalid.",
                "errors" => [
                    'phone' => ["The selected phone is invalid."]
                ]
            ]);
    }


    public function testLoginWithWrongPassword()
    {
        $this->json('POST', 'api/auth/login',['phone'=>User::factory()->create()->phone,'password'=>'wrongPassword'])
            ->assertStatus(200)
            ->assertJson([
                'data' => NULL,
                'message' => 'messages.craditialsNotFound',
                'last_page' => 0,
                'count' => 0,
                'status' => false,
            ]);
    }

    public function testSuccessfulLogin()
    {

        $this->json('POST', 'api/auth/login', ['phone'=>User::factory()->create()->phone,'password'=>'password'])
            ->assertStatus(200);
    }
}
