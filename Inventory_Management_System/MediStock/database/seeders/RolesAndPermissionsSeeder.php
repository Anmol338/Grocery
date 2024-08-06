<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create roles
        $roleAdmin = Role::create(['name' => 'admin']);
        $roleStaff = Role::create(['name' => 'staff']);

        // Create permissions
        $permissions = [
            'view users',
            'add users',
            'edit users',
            'delete users',
            'view items',
            'add items',
            'edit items',
            'delete items',
            'view purchase orders',
            'add purchase orders',
            'edit purchase orders',
            'delete purchase orders',
            // add other permissions as needed
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        // Assign permissions to roles
        $roleAdmin->givePermissionTo(Permission::all());
        $roleStaff->givePermissionTo([
            'view users', 'add users', 'edit users',
            'view items', 'add items', 'edit items',
            'view purchase orders', 'add purchase orders', 'edit purchase orders'
        ]);
    }
}
