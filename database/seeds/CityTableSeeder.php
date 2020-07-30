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
        $provinces = Province::whereHas('country', function (Builder $query) {
            $query->where('code', '=', 'EC')->orderBy('name');
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

        $bolivarCities = [
            "Guaranda",
            "Chillanes",
            "Chimbo",
            "Echeandía",
            "San Miguel",
            "Caluma",
            "Las Naves"
        ];

        $caniarCities = [
            "Azogues",
            "Biblián",
            "Cañar",
            "La Troncal",
            "El Tambo",
            "Déleg",
            "Suscal"
        ];

        $carchiCities = [
            "Tulcán",
            "Bolívar",
            "Espejo",
            "Mira",
            "Montúfar",
            "San Pedro De Huaca"
        ];

        $cotopaxiCities = [
            "Latacunga",
            "La Maná",
            "Pangua",
            "Pujili",
            "Salcedo",
            "Saquisilí",
            "Sigchos"
        ];

        $chimboCities = [
            "Riobamba",
            "Alausi",
            "Colta",
            "Chambo",
            "Chunchi",
            "Guamote",
            "Guano",
            "Pallatanga",
            "Penipe",
            "Cumandá"
        ];

        $oroCities = [
            "Machala",
            "Arenillas",
            "Atahualpa",
            "Balsas",
            "Chilla",
            "El Guabo",
            "Huaquillas",
            "Marcabelí",
            "Pasaje",
            "Piñas",
            "Portovelo",
            "Santa Rosa",
            "Zaruma",
            "Las Lajas"
        ];

        $esmeCities = [
            "Esmeraldas",
            "Eloy Alfaro",
            "Muisne",
            "Quinindé",
            "San Lorenzo",
            "Atacames",
            "Rioverde",
            "La Concordia"
        ];

        $guayasCities = [
            "Guayaquil",
            "Alfredo Baquerizo Moreno (JUJÁN)",
            "Balao",
            "Balzar",
            "Colimes",
            "Daule",
            "Durán",
            "El Empalme",
            "El Triunfo",
            "Milagro",
            "Naranjal",
            "Naranjito",
            "Palestina",
            "Pedro Carbo",
            "Samborondón",
            "Santa Lucía",
            "Salitre (URBINA Jado)",
            "San Jacinto De Yaguachi",
            "Playas",
            "Simón Bolívar",
            "Coronel Marcelino Maridueña",
            "Lomas De Sargentillo",
            "Nobol",
            "General Antonio Elizalde",
            "Isidro Ayora"
        ];

        $imbaburaCities = [
            "Ibarra",
            "Antonio Ante",
            "Cotacachi",
            "Otavalo",
            "Pimampiro",
            "San Miguel De Urcuquí"
        ];

        $lojaCities = [
            "Loja",
            "Calvas",
            "Catamayo",
            "Celica",
            "Chaguarpamba",
            "Espíndola",
            "Gonzanamá",
            "Macará",
            "Paltas",
            "Puyango",
            "Saraguro",
            "Sozoranga",
            "Zapotillo",
            "Pindal",
            "Quilanga",
            "Olmedo"
        ];

        $lRiosCities = [
            "Babahoyo",
            "Baba",
            "Montalvo",
            "Puebloviejo",
            "Quevedo",
            "Urdaneta",
            "Ventanas",
            "Vínces",
            "Palenque",
            "Buena Fé",
            "Valencia",
            "Mocache",
            "Quinsaloma"
        ];

        $manabiCities = [
            "Portoviejo",
            "Bolívar",
            "Chone",
            "Flavio Alfaro",
            "Jipijapa",
            "Junín",
            "Manta",
            "Montecristi",
            "Paján",
            "Pichincha",
            "Rocafuerte",
            "Santa Ana",
            "Sucre",
            "Tosagua",
            "24 De Mayo",
            "Pedernales",
            "Olmedo",
            "Puerto López",
            "Jama",
            "Jaramijó",
            "San Vicente"
        ];

        $moronaCities = [
            "Morona",
            "Gualaquiza",
            "Limón Indanza",
            "Palora",
            "Santiago",
            "Sucúa",
            "Huamboya",
            "San Juan Bosco",
            "Taisha",
            "Logroño",
            "Pablo Sexto",
            "Tiwintza"
        ];

        $napoCities = [
            "Tena",
            "Archidona",
            "El Chaco",
            "Quijos",
            "Carlos Julio Arosemena Tola"
        ];

        $pastazaCities = [
            "Pastaza",
            "Mera",
            "Santa Clara",
            "Arajuno"
        ];

        $pichiCities = [
            "Quito",
            "Cayambe",
            "Mejia",
            "Pedro Moncayo",
            "Rumiñahui",
            "San Miguel De Los Bancos",
            "Pedro Vicente Maldonado",
            "Puerto Quito"
        ];

        $tunguCities = [
            "Ambato",
            "Baños De Agua Santa",
            "Cevallos",
            "Mocha",
            "Patate",
            "Quero",
            "San Pedro De Pelileo",
            "Santiago De Píllaro",
            "Tisaleo"
        ];

        $zamoraCities = [
            "Zamora",
            "Chinchipe",
            "Nangaritza",
            "Yacuambi",
            "Yantzaza",
            "El Pangui",
            "Centinela Del Cóndor",
            "Palanda",
            "Paquisha"
        ];

        $galaCities = [
            "San Cristóbal",
            "Isabela",
            "Santa Cruz"
        ];

        $sucuCities = [
            "Lago Agrio",
            "Gonzalo Pizarro",
            "Putumayo",
            "Shushufindi",
            "Sucumbíos",
            "Cascales",
            "Cuyabeno"
        ];

        $orellanaCities = [
            "Orellana",
            "Aguarico",
            "La Joya De Los Sachas",
            "Loreto"
        ];

        $stoDomCities = [
            "Santo Domingo"
        ];

        $staElenaDomCities = [
            "Santa Elena",
            "La Libertad",
            "Salinas"
        ];

        foreach ($provinces as $key => $province) {
            $this->provinceId = $province->id;
            switch ($province->name) {
                case 'Azuay':
                    $this->insertCities($azuayCities);
                    break;
                case 'Bolívar':
                    $this->insertCities($bolivarCities);
                    break;
                case 'Cañar':
                    $this->insertCities($caniarCities);
                    break;
                case 'Carchi':
                    $this->insertCities($carchiCities);
                    break;
                case 'Cotopaxi':
                    $this->insertCities($cotopaxiCities);
                    break;
                case 'Chimborazo':
                    $this->insertCities($chimboCities);
                    break;
                case 'El Oro':
                    $this->insertCities($oroCities);
                    break;
                case 'Esmeraldas':
                    $this->insertCities($esmeCities);
                    break;
                case 'Guayas':
                    $this->insertCities($guayasCities);
                    break;
                case 'Imbabura':
                    $this->insertCities($imbaburaCities);
                    break;
                case 'Loja':
                    $this->insertCities($lojaCities);
                    break;
                case 'Los Ríos':
                    $this->insertCities($lRiosCities);
                    break;
                case 'Manabí':
                    $this->insertCities($manabiCities);
                    break;
                case 'Morona Santiago':
                    $this->insertCities($moronaCities);
                    break;
                case 'Napo':
                    $this->insertCities($napoCities);
                    break;
                case 'Pastaza':
                    $this->insertCities($pastazaCities);
                    break;
                case 'Pichincha':
                    $this->insertCities($pichiCities);
                    break;
                case 'Tungurahua':
                    $this->insertCities($tunguCities);
                    break;
                case 'Zamora Chinchipe':
                    $this->insertCities($zamoraCities);
                    break;
                case 'Galápagos':
                    $this->insertCities($galaCities);
                    break;
                case 'Sucumbíos':
                    $this->insertCities($sucuCities);
                    break;
                case 'Oreallana':
                    $this->insertCities($orellanaCities);
                    break;
                case 'Santo Domingo de los Tsachilas':
                    $this->insertCities($stoDomCities);
                    break;
                default:
                    $this->insertCities($staElenaDomCities);
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
