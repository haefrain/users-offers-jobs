<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\Offer;

class OfferSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $status = [
            0 => 'ACTIVO',
            1 => 'INACTIVO'
        ];

        $user = User::inRandomOrder()->first();

        $offer = Offer::create([
            'name' => Str::random(20),
            'status' => $status[random_int(0, 1)],
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        DB::table('users_offers')->insert([
            'user_id' => $user->id,
            'offer_id' => $offer->id
        ]);
    }
}
