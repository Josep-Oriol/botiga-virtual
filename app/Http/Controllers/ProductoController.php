<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function mostrarEstadisticasProducto(){
        return view('admin/productos/estadisticasProducto');
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
        
        Producto::create([
            'nombre_producto' => request('nombre_producto'),
            'descripcion_producto' => request('descripcion_producto'),
            'codigo_producto' => request('codigo_producto'),
            'precio_producto' => request('precio_producto'),
            'stock_producto' => request('stock_producto'),
            'destacado_producto' => request()->has('destacado_producto') ? true : false,
            'activo_producto' => request()->has('activo_producto') ? true : false
        ]);

        return redirect()->route('mostrarPanelAdmin');
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
