<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $adminRole = Role::create(['name' => 'admin']);
        $userRole = Role::create(['name' => 'user']);

        Permission::create(['name' => 'create-product']);
        Permission::create(['name' => 'edit-product']);
        Permission::create(['name' => 'delete-product']);

        $adminRole->givePermissionTo('create-product', 'edit-product', 'delete-product');
    }
}
