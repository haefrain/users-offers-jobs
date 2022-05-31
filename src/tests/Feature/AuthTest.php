<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AuthTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_login()
    {

        $response = $this->postJson('api/auth/login', ["email" => "haefrain@gmail.com", "password" => "1110561912"]);

        $response->assertStatus(200);
    }

    public function test_refresh_token()
    {
        $token = $this->create_token();
        $response = $this->postJson('api/auth/refresh', [], ['Authorization' => 'Bearer ' . $token]);

        $response->assertStatus(200);
    }

    public function test_user_logged()
    {
        $token = $this->create_token();

        $response = $this->postJson('api/auth/user-logged', [], ['Authorization' => 'Bearer ' . $token]);

        $response->assertStatus(200);
    }

    public function test_logout()
    {

        $token = $this->create_token();

        $response = $this->postJson('api/auth/logout', [], ['Authorization' => 'Bearer ' . $token]);

        $response->assertStatus(200);
    }

    public function create_token() {
        $credentials = [
            "email" => "haefrain@gmail.com",
            "password" => 1110561912
        ];
        $token = auth()->attempt($credentials);
        return $token;
    }
}
