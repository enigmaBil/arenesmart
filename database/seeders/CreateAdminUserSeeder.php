<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class CreateAdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //creation de l'admin
        $admin = User::create([
            'name' => 'admin',
            'email' => 'admin@example.com',
            'phone' => '656985655',
            'password' => Hash::make('123456789'),
        ]);

        // Récupérer le rôle Admin
        $adminRole = Role::where('name', 'ADMIN')->first();

        // Attribuer le rôle Admin à l'utilisateur
        $admin->assignRole($adminRole);

        // Attribuer toutes les permissions à l'utilisateur admin
        $admin->givePermissionTo($adminRole->permissions);
    }
}
