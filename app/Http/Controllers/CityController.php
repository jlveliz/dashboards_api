<?php

namespace App\Http\Controllers;

use App\Http\Requests\CityRequest;
use Illuminate\Http\Request;
use App\Models\City;
use App\Http\Resources\CityResource;
use Exception;
use DB;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cities = City::orderBy('name')->get();
        return CityResource::collection($cities);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CityRequest $request)
    {
        DB::beginTransaction();

        try {
            $city = new City();
            $city->fill($request->all());
            $city->saveOrFail();
            DB::commit();
            return new CityResource($city);
        }catch(Exception $e) {
            DB::rollback();
            return response()->json(['message' => 'Hubo un error al guardar la ciudad, intente nuevamente', 'details'=>  $e->getMessage()],411);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $city = City::find($id);
        if ($city) {
            return new CityResource($city);
        }
        return response()->json(['message' => 'Ciudad no encontrada'], 404);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CityRequest $request, $id)
    {
        DB::beginTransaction();

        try {
            $city = City::find($id);
            if ($city) {
                $city->fill($request->all());
                $city->saveOrFail();
                DB::commit();
                return new CityResource($city);
            }
            return response()->json(['message' => 'Ciudad no encontrada'], 404);
        }catch(Exception $e) {
            DB::rollback();
            return response()->json(['message' => 'Hubo un error al actualizar la ciudad, intente nuevamente', 'details' => $e->getMessage()],411);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $city = City::find($id);

        if ($city) {
            $cityName =  $city->name;
            if($city->delete())
                return response()->json(['message' => "Ciudad {$cityName} eliminada Correctamente"],200);
        }
        return response()->json(['message' => 'Ciudad no encontrada'], 404);
    }
}
