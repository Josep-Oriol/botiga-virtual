<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Compra;
use App\Models\Usuario;
use App\Models\Carrito;
use App\Models\DetalleCompra;

use Carbon\Carbon;

class CompraController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function formularioCompra(){
        return view('clients/compras/formularioCompra');
    }

    public function procesar(Request $request){
        $usuario = auth()->user();

        $carrito = Carrito::where('fk_id_usuario', $usuario->id)->with('producto')->get();

        if ($carrito->isEmpty()) {
            return redirect()->back()->with('error', 'El carrito está vacío.');
        }

        $total = 0;
        foreach ($carrito as $item) {
            $total += $item->cantidad * $item->precio;
        }

        $compra = Compra::create([
            'fk_id_usuario' => $usuario->id,
            'fecha_compra' => Carbon::now(),
            'fecha_envio_compra' => Carbon::now()->addDays(3),
            'total_compra' => $total,
            'estado_compra' => 'progreso',
        ]);

        foreach ($carrito as $item) {
            $precio = $item->precio ?? 0;
            $cantidad = $item->cantidad;

            DetalleCompra::create([
                'fk_id_compra' => $compra->id,
                'fk_id_producto' => $item->fk_id_producto,
                'fk_id_usuario' => $usuario->id,
                'cantidad_producto_detalles' => $cantidad,
                'precio_producto_detalles' => $precio,
                'subtotal_detalles' => $precio * $cantidad,
            ]);
        }

        Carrito::where('fk_id_usuario', $usuario->id)->delete();

        return redirect()->route('compraCompletada')->with('success', 'Compra realizada correctamente.');
    }
    
    public function completada(){
        return view('clients/compras/completada');
    }

    public function mostrarEstadisticasCompra(){
        $totales = Compra::count();
        $comprasActivas = Compra::where('estado_compra', 'progreso')->count();
        $comprasInactivas = Compra::where('estado_compra', 'completa')->count();
        return view('admin/compras/estadisticaCompra', compact('totales', 'comprasActivas', 'comprasInactivas'));
    }

    public function index()
    {
        return response()->json(Compra::all());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin/compras/crearCompra');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
{
    $compra = Compra::find($id);
    $productos = DetalleCompra::where('fk_id_compra', $id)->get();
    return view('clients/compras/verCompra', compact('compra', 'productos'));
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
        //
    }
}
