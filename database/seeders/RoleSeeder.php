<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            ['name' => 'admin', 'description' => 'Administrator role'],
            ['name' => 'manager', 'description' => 'Manager role'],
            ['name' => 'user', 'description' => 'Regular user role'],
        ];

        foreach ($roles as $role) {
            Role::create($role);
        }
    }
}
