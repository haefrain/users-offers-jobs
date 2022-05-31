<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Offer;
use Illuminate\Support\Str;

class OfferFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */

    protected $model = Offer::class;
    public function definition()
    {
        return [
            'name' => $this->faker->text(100),
            'status' => $this->faker->randomElement(['ACTIVO', 'INACTIVO']),
            'created_at' => now(),
            'updated_at' => now()
        ];
    }
}
