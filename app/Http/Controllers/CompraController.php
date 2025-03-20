<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Compra;
use App\Models\DetalleCompra;

class CompraController extends Controller
{
    /**
     * Display a listing of the resource.
     */

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
