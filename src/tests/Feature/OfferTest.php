<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class OfferTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_get_offers()
    {
        $token = $this->create_token();

        $response = $this->get('api/offer', ['Authorization' => 'Bearer ' . $token]);

        $response->assertStatus(200);
        $response->assertJsonFragment([
            "status" => "success"
        ]);
    }

    public function test_store_offer()
    {
        $token = $this->create_token();

        $response = $this->post('api/offer', [
            "name" => "name offer this is",
            "status" => "ACTIVO",
            "users" => [
                1,
            ]
        ],
        ['Authorization' => 'Bearer ' . $token]);

        $response->assertStatus(201);
        $response->assertJsonFragment([
            "status" => "success"
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
