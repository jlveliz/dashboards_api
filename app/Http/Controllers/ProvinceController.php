<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProvinceRequest;
use App\Http\Resources\ProvinceResource;
use Illuminate\Http\Request;
use App\Models\Province;
use DB;
use Exception;

class ProvinceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $provinces = Province::orderBy('name')->get();
        return ProvinceResource::collection($provinces);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProvinceRequest $request)
    {
        DB::beginTransaction();

        try {
            $province = new Province();
            $province->fill($request->all());
            $province->saveOrFail();
            DB::commit();
            return new ProvinceResource($province);
        }catch(Exception $e) {
            DB::rollback();
            return response()->json(['message' => 'Hubo un error la provincia, intente nuevamente', 'details'=>  $e->getMessage()],411);
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
        $province = Province::find($id);
        if ($province) {
            return new ProvinceResource($province);
        }
        return response()->json(['message' => 'Provincia no encontrada'], 404);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProvinceRequest $request, $id)
    {
        DB::beginTransaction();

        try {
            $province = Province::find($id);
            if ($province) {
                $province->fill($request->all());
                $province->saveOrFail();
                DB::commit();
                return new ProvinceResource($province);
            }
            return response()->json(['message' => 'Provincia no encontrada'], 404);
        }catch(Exception $e) {
            DB::rollback();
            return response()->json(['message' => 'Hubo un error al actualizar la provincia, intente nuevamente', 'details' => $e->getMessage()],411);
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
        $province = Province::find($id);

        if ($province) {
            $provinceName =  $province->name;
            if($province->delete())
                return response()->json(['message' => "Provincia {$provinceName} eliminada Correctamente"],200);
        }
        return response()->json(['message' => 'Provincia no encontrada'], 404);

    }
}
