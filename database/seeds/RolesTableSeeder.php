<?php

use App\Model\Role;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


            $data = [
                ['name' => 'administrateur',],
                ['name' => 'utilisateur',],
                ['name' => 'creatorLeague',],
            ];
            Role::insert($data);
    }
}
