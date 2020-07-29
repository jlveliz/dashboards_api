<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CountryRequest;
use App\Http\Resources\CountryResource;
use App\Models\Country;
use Exception;
use DB;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $countries = Country::orderBy('name')->get();
        return CountryResource::collection($countries);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CountryRequest $request)
    {
        DB::beginTransaction();

        try {
            $country = new Country();
            $country->fill($request->all());
            $country->saveOrFail();
            DB::commit();
            return new CountryResource($country);
        }catch(Exception $e) {
            DB::rollback();
            return response()->json(['message' => 'Hubo un error el pais, intente nuevamente', 'details'=>  $e->getMessage()],411);
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
        $country = Country::find($id);
        if ($country) {
            return new CountryResource($country);
        }
        return response()->json(['message' => 'Pais no encontrado'], 404);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CountryRequest $request, $id)
    {
        DB::beginTransaction();

        try {
            $country = Country::find($id);
            if ($country) {
                $country->fill($request->all());
                $country->saveOrFail();
                DB::commit();
                return new CountryResource($country);
            }
            return response()->json(['message' => 'Pais no encontrado'], 404);
        }catch(Exception $e) {
            DB::rollback();
            return response()->json(['message' => 'Hubo un error al actualizar el pais, intente nuevamente', 'details' => $e->getMessage()],411);
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
        $country = Country::find($id);

        if ($country) {
            $countryName =  $country->name;
            if($country->delete())
                return response()->json(['message' => "Pais {$countryName} eliminado  Correctamente"],200);
        }
        return response()->json(['message' => 'Pais no encontrado'], 404);


    }
}
