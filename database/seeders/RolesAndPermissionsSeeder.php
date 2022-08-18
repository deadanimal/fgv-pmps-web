<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        Permission::create(['name' => 'Dashboard']);
        Permission::create(['name' => 'User Registration']);
        Permission::create(['name' => 'User Management']);
        Permission::create(['name' => 'Palm/Bunch Management']);
        Permission::create(['name' => 'Reporting']);
        Permission::create(['name' => 'Bagging']);
        Permission::create(['name' => 'Control Pollination']);
        Permission::create(['name' => 'Quality Control for Control Pollination']);
        Permission::create(['name' => 'Harvest']);
        Permission::create(['name' => 'Pollen Preparation']);
        Permission::create(['name' => 'Notification']);
        Permission::create(['name' => 'Pollen Usage']);

        // create roles
        Role::create(['name' => 'Super Admin'])->givePermissionTo([
            'Dashboard',
            'User Registration',
            'User Management',
            'Palm/Bunch Management',
            'Reporting'
        ]);

        Role::create(['name' => 'Admin'])->givePermissionTo([
            'Dashboard',
            'User Registration',
            'User Management',
            'Palm/Bunch Management',
            'Reporting'
        ]);

        Role::create(['name' => 'Supervisor'])->givePermissionTo([
            'Bagging',
            'Control Pollination',
            'Quality Control for Control Pollination',
            'Harvest',
            'Pollen Preparation',
            'Notification'
        ]);

        Role::create(['name' => 'General Worker'])->givePermissionTo([
            'Bagging',
            'Control Pollination',
            'Quality Control for Control Pollination',
            'Harvest',
            'Pollen Preparation',
            'Notification',
            'Pollen Usage'
        ]);
    }
}
