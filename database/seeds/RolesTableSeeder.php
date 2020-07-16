<?php

use App\Role;
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
        $rolesData = [
            ['id' => 1, 'name' => 'superadmin', 'status' => 1],
            ['id' => 2, 'name' => 'admin', 'status' => 1],
            ['id' => 3, 'name' => 'doctor', 'status' => 1],
            ['id' => 4, 'name' => 'user', 'status' => 1],
        ];
        Role::insert($rolesData);
    }
}