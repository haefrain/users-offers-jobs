<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserSeeder::class,
            OfferSeeder::class
        ]);
        \App\Models\User::factory(10000)->create();
        \App\Models\Offer::factory(10000)->create();
    }
}
