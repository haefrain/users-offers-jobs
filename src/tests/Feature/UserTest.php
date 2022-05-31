<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_store_user()
    {
        $token = $this->create_token();

        $response = $this->post('api/user', [
            "type_document" => "CC",
            "number_document" => "11".date('ymdhis'),
            "name" => "Efrain Hernandez",
            "email" => "haefrain@gmail.com".date('ymdhis'),
            "password" => "14220309"
        ],
            ['Authorization' => 'Bearer ' . $token]);

        $response->assertStatus(201);
        $response->assertJsonFragment([
            "status" => "success",
        ]);
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
