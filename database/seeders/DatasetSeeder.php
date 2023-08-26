<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class DatasetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 6; $i <= 10; $i++) {
            DB::table('user')->insert([[
                'id_user'   => $i,
                // 'nama'      => $faker->name,
                // 'email'     => $faker->email,
                // 'password'  => bcrypt('magangjogja'),
                'foto'      => NULL,
                'akses'     => "2",
            ]]);
        }
    }
}
