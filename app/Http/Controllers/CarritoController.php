<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Carrito;

class CarritoController extends Controller
{

    public function obtenerCarrito($idUser){
        $carrito = Carrito::where('fk_id_usuario', $idUser)->get();
        return response()->json($carrito);
    }

    public function vaciarCarrito($idUser){
        $carrito = Carrito::where('fk_id_usuario', $idUser)->delete();
        return response()->json($carrito);
    }

    public function eliminarProducto($idProducto, $idUser) {
        $carrito = Carrito::where('fk_id_producto', $idProducto)
                          ->where('fk_id_usuario', $idUser)
                          ->delete();
    
        return response()->json($carrito);
    }
    

    public function actualizarCarrito(Request $request, $idProducto, $idUser){
        $carrito = Carrito::where('fk_id_producto', $idProducto)
                            ->where('fk_id_usuario', $idUser)
                            ->update(['cantidad' => $request->cantidad]);
        return response()->json($carrito);
    }    

    public function agregarAlCarrito(Request $request){
        Carrito::create([
            'fk_id_usuario' => $request->usuario_id,
            'fk_id_producto' => $request->producto_id,
            'cantidad' => $request->cantidad,
            'precio' => $request->precio,
        ]);
    }

    public function comprobarProducto($id, $idUser){
        $existe = Carrito::where('fk_id_producto', $id)
                        ->where('fk_id_usuario', $idUser)
                        ->exists();
        return response()->json($existe);
    }    

    public function sumarCantidadProducto($id, $idUser, $cantidad) {
        Carrito::where('fk_id_producto', $id)
                ->where('fk_id_usuario', $idUser)
                ->increment('cantidad', $cantidad);
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
