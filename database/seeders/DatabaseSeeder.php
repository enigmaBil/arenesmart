<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

//        User::factory()->create([
//            'name' => 'Test User',
//            'email' => 'test@example.com',
//        ]);
        // Appel des seeders pour les rôles et permissions
        $this->call(RolesAndPermissionsSeeder::class);

        // Appel du seeder pour créer l'utilisateur admin
        $this->call(CreateAdminUserSeeder::class);

        $this->call(ActivitySeeder::class);
        $this->call(CitySeeder::class);
        $this->call(QuartierSeeder::class);
    }
}
