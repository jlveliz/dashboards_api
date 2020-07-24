<?php

use App\Models\Country;
use App\Models\Province;
use Illuminate\Database\Seeder;

class ProvinceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ec = Country::where('code','EC')->first();

        if (!$ec) return false;

        $provinces = [
            [
                'country_id' => $ec->id,
                'name' => 'Azuay',
                'code' => 'AZ',
            ],
            [
                'country_id' => $ec->id,
                'name' => 'Bolívar',
                'code' => 'BO',
            ],
            [
                'country_id' => $ec->id,
                'name' => 'Cañar',
                'code' => 'CR',
            ],
            [
                'country_id' => $ec->id,
                'name' => 'Carchi',
                'code' => 'CA',
            ],
            [
                'country_id' => $ec->id,
                'name' => 'Cotopaxi',
                'code' => 'CO',
            ],
            [
                'country_id' => $ec->id,
                'name' => 'Chimborazo',
                'code' => 'CH',
            ],
            [
                'country_id' => $ec->id,
                'name' => 'El Oro',
                'code' => 'EL',
            ],
            [
                'country_id' => $ec->id,
                'name' => 'Esmeraldas',
                'code' => 'ES',
            ],
            [
                'country_id' => $ec->id,
                'name' => 'Guayas',
                'code' => 'GU',
            ],
            [
                'country_id' => $ec->id,
                'name' => 'Imbabura',
                'code' => 'IM',
            ],
            [
                'country_id' => $ec->id,
                'name' => 'Loja',
                'code' => 'LO',
            ],
            [
                'country_id' => $ec->id,
                'name' => 'Los Ríos',
                'code' => 'LR',
            ],
            [
                'country_id' => $ec->id,
                'name' => 'Manabí',
                'code' => 'MA',
            ],
            [
                'country_id' => $ec->id,
                'name' => 'Morona Santiago',
                'code' => 'Mo',
            ],
            [
                'country_id' => $ec->id,
                'name' => 'Napo',
                'code' => 'NA',
            ],
            [
                'country_id' => $ec->id,
                'name' => 'Pastaza',
                'code' => 'PA',
            ],
            [
                'country_id' => $ec->id,
                'name' => 'Pichincha',
                'code' => 'PI',
            ],
            [
                'country_id' => $ec->id,
                'name' => 'Tungurahua',
                'code' => 'TU',
            ],
            [
                'country_id' => $ec->id,
                'name' => 'Zamora Chinchipe',
                'code' => 'ZA',
            ],
            [
                'country_id' => $ec->id,
                'name' => 'Galápagos',
                'code' => 'GA',
            ],
            [
                'country_id' => $ec->id,
                'name' => 'Sucumbíos',
                'code' => 'SU',
            ],
            [
                'country_id' => $ec->id,
                'name' => 'Orellana',
                'code' => 'OR',
            ],
            [
                'country_id' => $ec->id,
                'name' => 'Santo Domingo de los Tsachilas',
                'code' => 'SA',
            ],
            [
                'country_id' => $ec->id,
                'name' => 'Santa Elena',
                'code' => 'SE',
            ],
        ];

        foreach ($provinces as $key => $province) {
            Province::create($province);
        }
    }
}
