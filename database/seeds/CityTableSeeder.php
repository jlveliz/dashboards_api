<?php

use App\Models\City;
use Illuminate\Database\Seeder;
use App\Models\Province;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Str;

class CityTableSeeder extends Seeder
{

    private $provinceId;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Extract provinces of Ecuador
        $provinces = Province::whereHas('country',function(Builder $query) {
            $query->where('code','=','EC')->orderBy('name');
        })->get();

        $azuayCities = [
            "Chordeleg",
            "Cuenca",
            "El Pan",
            "Girón",
            "Guachapala",
            "Gualaceo",
            "Nabón",
            "Oña",
            "Paute",
            "Ponce Enriquez",
            "Pucará",
            "San Fernando",
            "Santa Isabel",
            "Sevilla de Oro",
            "Sígsig"
        ];

        foreach ($provinces as $key => $province) {
            switch ($province->name) {
                case 'Azuay':
                    $this->provinceId = $province->id;
                    $this->insertCities($azuayCities);
                    break;

                default:
                    # code...
                    break;
            }
        }

    }

    private function insertCities($cities)
    {
        foreach ($cities as $key => $city) {
            City::create([
                'province_id' => $this->provinceId,
                'name' => $city,
                'code' =>  Str::of($city)->snake()
            ]);
        }
    }
}
