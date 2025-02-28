<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
class BuscadorController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function buscarProducto(Request $request){
        $nombre = $request->input('nombre');
        $productos = Producto::where('nombre_producto', 'LIKE', "%$nombre%")->where('activo_producto', true)->limit(8)->get();
        return response()->json($productos);
    }

    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
        //
    }
}
