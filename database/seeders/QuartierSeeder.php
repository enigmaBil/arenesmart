<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\Quartier;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class QuartierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $quartiers = [
            'Douala' => ['Bonapriso', 'Akwa', 'Bonamoussadi', 'Bali', 'Makepe'],
            'Yaoundé' => ['Bastos', 'Ngousso', 'Essos', 'Mokolo', 'Nkolbisson'],
            'Bafoussam' => ['Djeleng', 'Kamkop', 'Tougang', 'Banengo', 'Djemoun'],
            'Garoua' => ['Poumpoumré', 'Djidda', 'Roumde Adjia', 'Bibémiré', 'Yelwa'],
            'Bamenda' => ['Nkwen', 'Mile 2', 'Mankon', 'Mbatu', 'Meta Quarter'],
            'Maroua' => ['Domayo', 'Pitoaré', 'Doualaré', 'Hardé', 'Djarengol'],
            'Ngaoundéré' => ['Dang', 'Mbideng', 'Tongo Gamdoum', 'Nyambaka', 'Mardock'],
            'Kumba' => ['Kake II', 'Kosala', 'Buea Road', 'Mile I', 'Fiango'],
            'Nkongsamba' => ['New Bell', 'Nlonako', 'Moungo', 'Centre', 'Baneka'],
            'Bertoua' => ['Nkolbikon', 'Bertoua II', 'Bertoua I', 'Kpokolota', 'Zambi'],
            'Limbé' => ['Mile 4', 'Bota', 'Bojongo', 'Ngeme', 'Clerks Quarter'],
            'Ebolowa' => ['Nko’ovos', 'Angalé', 'Nkong Abok', 'Ngalan', 'Ebolowa II'],
            'Kribi' => ['Ebomé', 'Londji', 'Bwambe', 'Mpalla', 'Mpolongwe'],
            'Buea' => ['Molyko', 'Soppo', 'Bokwango', 'Likoko', 'Bonduma'],
            'Edéa' => ['Bwang Bakoko', 'Marquis', 'Kassalafam', 'Ngambe', 'Mbinkomo'],
            'Foumban' => ['Njinka', 'Fomopéa', 'Meketé', 'Nkoutaba', 'Mankaha'],
            'Dschang' => ['Tandeng', 'Fotetsa', 'Bafou', 'Ngui', 'Fongo-Tongo'],
            'Mbouda' => ['Babadjou', 'Balatchi', 'Bambou', 'Bamenka', 'Bandenkop'],
            'Sangmélima' => ['Manga', 'Nkolndong', 'Ndong', 'Efoulan', 'Bissono'],
            'Tiko' => ['Likomba', 'Holfort', 'Misselele', 'Mutengene', 'Ngombe'],
        ];

        foreach ($quartiers as $cityName => $quartiersList) {
            $city = City::where('name', $cityName)->first();
            if ($city) {
                foreach ($quartiersList as $quartier) {
                    Quartier::create([
                        'name' => $quartier,
                        'city_id' => $city->id
                    ]);
                }
            }
        }
    }
}
