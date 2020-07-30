<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Resources\CategoryResource;
use DB;
use Exception;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::orderBy('name')->get();
        return CategoryResource::collection($categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        DB::beginTransaction();

        try {
            $category = new Category();
            $category->fill($request->all());
            $category->saveOrFail();
            DB::commit();
            return new CategoryResource($category);
        }catch(Exception $e) {
            DB::rollback();
            return response()->json(['message' => 'Hubo un error al guardar la categoria, intente nuevamente', 'details'=>  $e->getMessage()],411);
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
        $category = Category::find($id);
        if ($category) {
            return new CategoryResource($category);
        }
        return response()->json(['message' => 'Categoria no encontrada'], 404);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, $id)
    {
        DB::beginTransaction();

        try {
            $category = Category::find($id);
            if ($category) {
                $category->fill($request->all());
                $category->saveOrFail();
                DB::commit();
                return new CategoryResource($category);
            }
            return response()->json(['message' => 'Categoria no encontrada'], 404);
        }catch(Exception $e) {
            DB::rollback();
            return response()->json(['message' => 'Hubo un error al actualizar la categoria, intente nuevamente', 'details' => $e->getMessage()],411);
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
        $category = Category::find($id);

        if ($category) {
            $categoryName =  $category->name;
            if($category->delete())
                return response()->json(['message' => "Categoria {$categoryName} eliminada Correctamente"],200);
        }
        return response()->json(['message' => 'Categoria no encontrada'], 404);
    }
}
