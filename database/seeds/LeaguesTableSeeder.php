<?php

use Illuminate\Database\Seeder;

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

        for($i=0; $i<5; $i++){


            $data = [
                ['team_external_id' => $faker->numberBetween($min = 1, $max= 8),
                    'name' => $faker->colorName,
                    'city' => $faker->city,
                    'stadium' => $faker->city,
                ]
            ];
            Nbateam::insert($data);
    }
}
