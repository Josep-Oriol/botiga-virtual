<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Categoria;
use App\Models\Caracteristica;
use App\Models\Marca;
use Illuminate\Support\Facades\Storage; 

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function main(){
        $productosDestacados = Producto::where('destacado_producto', true)
                                        ->where('activo_producto', true)
                                        ->where('stock_producto', '>', 0)
                                        ->limit(4)->get();

        $categoriasDestacadas = Categoria::where('activo_categoria', true)
                                ->where('destacada_categoria', true)
                                ->limit(4)
                                ->get();

        return view('main', compact('productosDestacados', 'categoriasDestacadas'));
    }

    public function obtenerProducto($id){
        $producto = Producto::find($id);
        return response()->json($producto);
    }

    public function montarOrdenador(){
        return view('clients/montarOrdenador');
    }

    public function comprobarStock($id, $cantidad){
        
        $producto = Producto::find($id);
        if ($producto->stock_producto >= $cantidad) {
            return response()->json(true);
        } else {
            return response()->json(false);
        }
    }
    
    public function verProductos(Request $request)
    {
        $query = Producto::where('activo_producto', true)
                         ->where('stock_producto', '>', 0);

        if ($request->filled('nombre')) {
            $query->where('nombre_producto', 'LIKE', "%{$request->nombre}%");
        }

        if ($request->has('categoria')) {
            $categoriasSeleccionadas = array_values($request->categoria); // Obtener valores del array
            $query->where(function ($q) use ($categoriasSeleccionadas) {
                foreach ($categoriasSeleccionadas as $categoria) {
                    $q->orWhere('fk_id_categoria', $categoria);
                }
            });
        }

        if ($request->has('marca')) {
            $marcasSeleccionadas = array_values($request->marca);
            $query->where(function ($q) use ($marcasSeleccionadas) {
                foreach ($marcasSeleccionadas as $marca) {
                    $q->orWhere('fk_id_marca', $marca);
                }
            });
        }

        if ($request->filled('precio_min')) {
            $query->where('precio_producto', '>=', $request->precio_min);
        }

        if ($request->filled('precio_max')) {
            $query->where('precio_producto', '<=', $request->precio_max);
        }

        $productos = $query->get();

        $categorias = Categoria::where('activo_categoria', true)->get();
        $marcas = Marca::where('activo_marca', true)->get();

        return view('clients.verProductos', compact('productos', 'categorias', 'marcas'));
    }

    public function verProducto($id){
        $producto = Producto::find($id);
        return view('clients/verProducto', compact('producto'));
    }

    public function productosDestacados(){
        $productosDestacados = Producto::where('destacado_producto', true)->limit(5)->get();
        return response()->json($productosDestacados);
     }

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
        $marcas = Marca::all();
        return view("admin/productos/editarProducto", compact("producto", "categorias", "marcas"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nombre_producto' => 'required',
            'foto_portada_producto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:4096'
        ]);
    
        $producto = Producto::find($id);
        $updateData = [
            'nombre_producto' => $request->nombre_producto,
            'descripcion_producto' => $request->descripcion_producto,
            'codigo_producto' => $request->codigo_producto,
            'fk_id_categoria' => $request->fk_id_categoria,
            'fk_id_marca' => $request->fk_id_marca,
            'precio_producto' => $request->precio_producto,
            'stock_producto' => $request->stock_producto,
            'destacado_producto' => $request->has('destacado_producto'),
            'activo_producto' => $request->has('activo_producto')
        ];
    
        if ($request->hasFile('foto_portada_producto')) {
            // Delete old image if exists
            if ($producto->foto_portada_producto && Storage::disk('public')->exists($producto->foto_portada_producto)) {
                Storage::disk('public')->delete($producto->foto_portada_producto);
            }
            // Store new image
            $updateData['foto_portada_producto'] = $request->file('foto_portada_producto')->store('productos', 'public');
        }
    
        $producto->update($updateData);
    
        return redirect()->route('mostrarEstadisticasProducto')
            ->with('success', 'Producto actualizado correctamente');
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
