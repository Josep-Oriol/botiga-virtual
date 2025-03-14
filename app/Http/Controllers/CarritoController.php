<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Carrito;

class CarritoController extends Controller
{

    public function agregarAlCarrito(Request $request){
        Carrito::create([
            'fk_id_usuario' => $request->usuario_id,
            'fk_id_producto' => $request->producto_id,
            'cantidad' => $request->cantidad,
            'precio' => $request->precio,
        ]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('clients.verCarrito');
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
