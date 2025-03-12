<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;
use Illuminate\Support\Facades\Storage;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function categoriasDestacadas(){
        $categoriasDestacadas = Categoria::where('destacada_categoria', true)->where('activo_categoria', true)->get();
        return response()->json($categoriasDestacadas);
    }

    public function buscarCategoria(Request $request){
        $nombre = $request->input('nombre');
        $categorias = Categoria::where('nombre_categoria', 'LIKE', "%$nombre%")->get();
        return response()->json($categorias);
    }

    public function mostrarEstadisticasCategoria()
    {
        $totales = Categoria::count();
        $categoriasActivas = Categoria::where('activo_categoria', true)->count();
        $categoriasInactivas = Categoria::where('activo_categoria', false)->count();
    
        return view('admin/categorias/estadisticaCategoria', compact(
            'totales', 
            'categoriasActivas', 
            'categoriasInactivas'
        ));
    }

    public function categoriasMasVendidas(){
        $categoriasMasVendidas = Categoria::select([
            'categorias.nombre_categoria',
            \DB::raw('COUNT(detalles_compras.id) as total_ventas'),
            \DB::raw('SUM(detalles_compras.subtotal_detalles) as total_ingresos')
        ])
        ->join('productos', 'productos.fk_id_categoria', '=', 'categorias.id')
        ->join('detalles_compras', 'detalles_compras.fk_id_producto', '=', 'productos.id')
        ->groupBy('categorias.nombre_categoria')
        ->orderBy('total_ventas', 'desc')
        ->take(5)
        ->get();

        return response()->json($categoriasMasVendidas);
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
        $request->validate([
            'nombre_categoria' => 'required',
            'imagen_categoria' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048'
        ]);
    
        $imagePath = null;
        if ($request->hasFile('imagen_categoria')) {
            $imagePath = $request->file('imagen_categoria')->store('categorias', 'public');
        }
    
        Categoria::create([
            'nombre_categoria' => $request->nombre_categoria,
            'codigo_categoria' => $request->codigo_categoria,
            'descripcion_categoria' => $request->descripcion_categoria,
            'imagen_categoria' => $imagePath,
            'activo_categoria' => $request->has('activo_categoria'),
            'destacada_categoria' => $request->has('destacada_categoria')
        ]);
    
        return redirect()->route('mostrarEstadisticasCategoria')
            ->with('success', 'Categoría creada correctamente');
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
        $request->validate([
            'nombre_categoria' => 'required',
            'imagen_categoria' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048'
        ]);
    
        $categoria = Categoria::find($id);
        $updateData = [
            'nombre_categoria' => $request->nombre_categoria,
            'codigo_categoria' => $request->codigo_categoria,
            'descripcion_categoria' => $request->descripcion_categoria,
            'activo_categoria' => $request->has('activo_categoria'),
            'destacada_categoria' => $request->has('destacada_categoria')
        ];
    
        if ($request->hasFile('imagen_categoria')) {
            // Delete old image if exists
            if ($categoria->imagen_categoria && Storage::disk('public')->exists($categoria->imagen_categoria)) {
                Storage::disk('public')->delete($categoria->imagen_categoria);
            }
            // Store new image
            $updateData['imagen_categoria'] = $request->file('imagen_categoria')->store('categorias', 'public');
        }
    
        $categoria->update($updateData);
    
        return redirect()->route('mostrarEstadisticasCategoria')
            ->with('success', 'Categoría actualizada correctamente');
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

    public function listar()
    {
        $categorias = Categoria::all();
        return response()->json($categorias);
    }
}
