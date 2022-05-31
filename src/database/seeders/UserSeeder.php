<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $numberDocument = 1110561912;
        DB::table('users')->insert([
            'type_document' => 'CC',
            'number_document' => $numberDocument,
            'name' => Str::random(10),
            'email' => 'haefrain@gmail.com',
            'password' => bcrypt($numberDocument),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
    }
}
