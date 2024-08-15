<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\Permission;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Associar permissões aos papéis
        $adminRole = Role::where('name', 'admin')->first();
        $managerRole = Role::where('name', 'manager')->first();
        $userRole = Role::where('name', 'user')->first();

        $adminPermissions = Permission::all();
        $managerPermissions = Permission::whereIn('name', ['view-projects', 'create-projects', 'edit-projects'])->get();
        $userPermissions = Permission::where('name', 'view-projects')->get();

        $adminRole->permissions()->sync($adminPermissions);
        $managerRole->permissions()->sync($managerPermissions);
        $userRole->permissions()->sync($userPermissions);
    }
}
