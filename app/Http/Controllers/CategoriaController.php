<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(Categoria::all());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function mostrarFormularioCategoria(){
        return view('admin/crearCategoria');
    }

    public function create()
    {
        return view('categorias/crearCategoria');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        Categoria::create([
            'nombre_categoria' =>request('nombre_categoria'),
            'codigo_categoria' =>request('codigo_categoria'),
        ]);
       /*go_categoria' => request('codigo_categoria')
        ]);
        
        return redirect()->route('main/principal');*/
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
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
