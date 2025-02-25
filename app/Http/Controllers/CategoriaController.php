<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function mostrarEstadisticasCategoria(){
        $totales = Categoria::count();
        $categoriasActivas = Categoria::where('activo_categoria', true)->count();
        $categoriasInactivas = Categoria::where('activo_categoria', false)->count();
        //$populares = Categoria::orderBy(Categoria::with('productos')->count(), 'desc')->take(3)->get();
        return view('admin/categorias/estadisticaCategoria', compact('totales', 'categoriasActivas', 'categoriasInactivas', 'populares'));
    }

    public function index()
    {
        return response()->json(Categoria::all());
    }

    /**
     * Show the form for creating a new resource.
     */


    public function create()
    {
        return view('admin/categorias/crearCategoria');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        Categoria::create([
            'nombre_categoria' =>request('nombre_categoria'),
            'codigo_categoria' =>request('codigo_categoria'),
            'descripcion_categoria' => request('descripcion_categoria'),
            'imagen_categoria' => request()->has('imagen_categoria') ? request('imagen_categoria') : null,
            'activo_categoria' => request()->has('activo_categoria') ? true : false
        ]);

        return redirect()->route('mostrarEstadisticasCategoria');
       /*go_categoria' => request('codigo_categoria')
        ]);
        
        return redirect()->route('main/principal');*/
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $categoria = Categoria::find($id);
        return view("admin/categorias/verCategoria", compact("categoria"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $categoria = Categoria::find($id);
        return view("admin/categorias/editarCategoria", compact("categoria"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $categoria = Categoria::find($id);
        $categoria->update([
            'nombre_categoria' => request('nombre_categoria'),
            'codigo_categoria' => request('codigo_categoria'),
            'descripcion_categoria' => request('descripcion_categoria'),
            'imagen_categoria' => request()->has('imagen_categoria') ? request('imagen_categoria') : null,
            'activo_categoria' => request()->has('activo_categoria') ? true : false
        ]);

        return redirect()->route('mostrarEstadisticasCategoria');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $categoria = Categoria::find($id);
    
            if ($categoria) {
                $categoria->delete();
    
                $response = response()->json(['message' => 'Categoría eliminada correctamente'], 200);
            } else {
                $response = response()->json(['message' => 'Categoría no encontrada'], 404);
            }
        } catch (\Exception $e) {
            $response = response()->json(['message' => 'Error al eliminar categoría'], 500);
        }

        return $response;
    }
}
