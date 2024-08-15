<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            ['name' => 'view-projects', 'description' => 'View projects'],
            ['name' => 'create-projects', 'description' => 'Create new projects'],
            ['name' => 'edit-projects', 'description' => 'Edit projects'],
            ['name' => 'delete-projects', 'description' => 'Delete projects'],
            ['name' => 'view-users', 'description' => 'View users'],
            ['name' => 'edit-users', 'description' => 'Edit users'],
        ];

        foreach ($permissions as $permission) {
            Permission::create($permission);
        }
    }
}
