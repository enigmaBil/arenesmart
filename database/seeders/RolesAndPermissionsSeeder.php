<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

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

        // Création des permissions pour l'ADMIN
        Permission::create(['name' => 'create stadium']);
        Permission::create(['name' => 'edit stadium']);
        Permission::create(['name' => 'delete stadium']);
        Permission::create(['name' => 'view stadium']);
        Permission::create(['name' => 'manage stadium availability']);

        Permission::create(['name' => 'create reservation']);
        Permission::create(['name' => 'edit reservation']);
        Permission::create(['name' => 'delete reservation']);
        Permission::create(['name' => 'view reservation']);
        Permission::create(['name' => 'cancel reservation']);
        Permission::create(['name' => 'view own reservation']);
        Permission::create(['name' => 'approve reservation']);
        Permission::create(['name' => 'view reservation history']);

        Permission::create(['name' => 'create user']);
        Permission::create(['name' => 'edit user']);
        Permission::create(['name' => 'delete user']);
        Permission::create(['name' => 'view user']);
        Permission::create(['name' => 'assign role']);
        Permission::create(['name' => 'view user activities']);
        Permission::create(['name' => 'manage permissions']);

        // Création du rôle Admin et assignation des permissions
        $admin = Role::create(['name' => 'ADMIN']);
        $admin->givePermissionTo([
            'create stadium', 'edit stadium', 'delete stadium', 'view stadium', 'manage stadium availability',
            'delete reservation', 'view reservation', 'approve reservation', 'view reservation history',
            'create user', 'edit user', 'delete user', 'view user', 'assign role', 'view user activities',
            'manage permissions'
        ]);



        // Création du rôle USER
        $user = Role::create(['name' => 'USER']);
        $user->givePermissionTo(['create reservation','edit reservation', 'cancel reservation', 'view own reservation']);

        // Création du rôle EVENTPLANER
        $eventPlaner = Role::create(['name' => 'EVENTPLANER']);
        $eventPlaner->givePermissionTo(['create reservation','edit reservation', 'cancel reservation', 'view own reservation']);
    }
}
