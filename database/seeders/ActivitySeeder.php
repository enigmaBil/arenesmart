<?php

namespace Database\Seeders;

use App\Models\Activity;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ActivitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $activities = [
            ['name' => 'Football'],
            ['name' => 'Basketball'],
            ['name' => 'Handball'],
            ['name' => 'Volleyball'],
            ['name' => 'Tennis'],
            ['name' => 'Rugby'],
            ['name' => 'Athletisme'],
            ['name' => 'Golf']
        ];

        foreach ($activities as $activity) {
            Activity::create($activity);
        }
    }
}
