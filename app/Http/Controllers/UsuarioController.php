<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function mostrarEstadisticasUsuario(){
        return view('admin/usuarios/estadisticaUsuario');
    }

    public function mostrarPanelAdmin(){
        return view('admin/panelAdmin');
    }

    public function mostrarLogin(){
        return view('login');
    }

    public function login()
    {
        return view('main/login');
    }
    
    public function index()
    {
        return response()->json(Usuario::all());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin/usuarios/crearUsuario');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $usuario = Usuario::create($request->all());
        return redirect()->route('admin.usuarios.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $usuario = Usuario::find($id);
        return view('admin/usuarios/verUsuario', compact('usuario'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $usuario = Usuario::find($id);
        return view('admin/usuarios/editarUsuario', compact('usuario'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $usuario = Usuario::find($id);
        $usuario->update($request->all());
        return redirect()->route('admin.usuarios.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $usuario = Usuario::find($id);
        $usuario->delete();
        return redirect()->route('admin.usuarios.index');
    }
}
