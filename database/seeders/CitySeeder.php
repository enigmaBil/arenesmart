<?php

namespace Database\Seeders;

use App\Models\City;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cities = [
            'Douala',
            'Yaoundé',
            'Bafoussam',
            'Garoua',
            'Bamenda',
            'Maroua',
            'Ngaoundéré',
            'Kumba',
            'Nkongsamba',
            'Bertoua',
            'Limbé',
            'Ebolowa',
            'Kribi',
            'Buea',
            'Edéa',
            'Foumban',
            'Dschang',
            'Mbouda',
            'Sangmélima',
            'Tiko'
        ];

        foreach ($cities as $city) {
            City::create(['name' => $city]);
        }
    }
}
