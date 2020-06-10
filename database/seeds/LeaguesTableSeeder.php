<?php

use App\Model\League;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LeaguesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create('fr_FR');

        for ($i = 0; $i < 10; $i++) {
            $data = [
                ['user_id' => $faker->numberBetween($min = 1, $max = 5),
                    'name' => $faker->company,
                    'number_teams' => $faker->numberBetween($min = 2, $max = 12),
                    'public' => $faker->boolean($chanceOfGettingTrue = 50),
                    'token' => $faker->md5,

                ]
            ];
            League::insert($data);
        }
    }
}
