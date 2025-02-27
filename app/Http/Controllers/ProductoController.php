<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Categoria;
use App\Models\Caracteristica;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function mostrarEstadisticasProducto(){
        $totales = Producto::count();
        $productosActivos = Producto::where('activo_producto', true)->count();
        $productosInactivos = Producto::where('activo_producto', false)->count();
        return view('admin/productos/estadisticasProducto', compact('totales', 'productosActivos', 'productosInactivos'));
    }

    public function caracteristicasProducto(){
        return response()->json(Caracteristica::all());
    }

    public function index()
    {
        return response()->json(Producto::all());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin/productos/crearProducto');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {  
        $request->validate([
            'foto_portada_producto' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:4096',
            'nombre_producto' => 'required|string|max:255',
            'descripcion_producto' => 'required|string',
            'codigo_producto' => 'required|string|max:255',
            'fk_id_categoria' => 'required|exists:categorias,id',
            'fk_id_marca' => 'required|exists:marcas,id',
            'precio_producto' => 'required|numeric|min:0',
            'stock_producto' => 'required|integer|min:0',
            'destacado_producto' => 'required|boolean',
            'activo_producto' => 'required|boolean',
        ]);

        $rutaImagen = null;
        if ($request->hasFile('foto_portada_producto')) {
            $rutaImagen = $request->file('foto_portada_producto')->store('productos', 'public');  
        }

        Producto::create([
            'foto_portada_producto' => $rutaImagen,
            'nombre_producto' => $request->input('nombre_producto'),
            'descripcion_producto' => $request->input('descripcion_producto'),
            'codigo_producto' => $request->input('codigo_producto'),
            'fk_id_categoria' => $request->input('fk_id_categoria'),
            'fk_id_marca' => $request->input('fk_id_marca'),
            'precio_producto' => $request->input('precio_producto'),
            'stock_producto' => $request->input('stock_producto'),
            'destacado_producto' => $request->boolean('destacado_producto'),
            'activo_producto' => $request->boolean('activo_producto'),
        ]);

        return redirect()->route('mostrarEstadisticasProducto')->with('success', 'Producto creado con éxito');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $producto = Producto::find($id);
        return view("admin/productos/verProducto", compact("producto"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $producto = Producto::find($id);
        $categorias = Categoria::all();
        return view("admin/productos/editarProducto", compact("producto", "categorias"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $producto = Producto::find($id);
        $producto->update([
            'nombre_producto' => request('nombre_producto'),
            'descripcion_producto' => request('descripcion_producto'),
            'codigo_producto' => request('codigo_producto'),
            'precio_producto' => request('precio_producto'),
            'stock_producto' => request('stock_producto'),
            'destacado_producto' => request()->has('destacado_producto') ? true : false,
            'activo_producto' => request()->has('activo_producto') ? true : false
        ]);

        return redirect()->route('mostrarEstadisticasProducto');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $producto = Producto::find($id);
    
            if ($producto) {
                $producto->delete();
    
                $response = response()->json(['message' => 'Producto eliminado correctamente'], 200);
            } else {
                $response = response()->json(['message' => 'Producto no encontrado'], 404);
            }
        } catch (\Exception $e) {
            $response = response()->json(['message' => 'Error al eliminar el producto'], 500);
        }

        return $response;
    }

    public function obtenerEstadisticas()
    {
        $totalProductos = Producto::count();
        $productosActivos = Producto::where('activo_producto', true)->count();
        $productosInactivos = Producto::where('activo_producto', false)->count();

        /*return response()->json([
            'total_productos' => $totalProductos,
            'productos_activos' => $productosActivos,
            'productos_inactivos' => $productosInactivos
        ]);*/

        return response()->json(Producto::count());
    }
}
