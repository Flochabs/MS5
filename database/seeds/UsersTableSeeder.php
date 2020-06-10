<?php

use App\Model\Nbateam;
use App\Model\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
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
                [
                    'pseudo' => $faker->userName,
                    'email' => $faker->unique()->email,
                    'firstname' => $faker->firstName,
                    'lastname' => $faker->lastName,
                    'password' => $faker->password,
                    'birthday' => $faker->date($format = 'Y-m-d', $max = 'now'),
                    'nbateam_id' => 1,
                ]
            ];
            User::insert($data);

        }
    }
}
