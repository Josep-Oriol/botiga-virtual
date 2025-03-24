<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Direccion;
use App\Models\Compra;
use Illuminate\Support\Facades\Auth;
class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function juego(){
        return view('juego/juego');
    }

    public function mostrarMiPerfil(){
        $pedidos = Compra::where('fk_id_usuario', Auth::id())->get();
        $usuario = User::find(Auth::id());
        $direcciones = Direccion::where('fk_id_usuario', Auth::id())->get();
        return view('clients/miPerfil', compact('usuario', 'direcciones', 'pedidos'));
    }
    
    public function mostrarEstadisticasUsuario(){
        $totales = User::count();
        $usuariosActivos = User::where('activo_usuario', true)->count();
        $usuariosInactivos = User::where('activo_usuario', false)->count();
        return view('admin/usuarios/estadisticaUsuario', compact('totales', 'usuariosActivos', 'usuariosInactivos'));
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

    public function register(){
        return view('register');
    }

    public function mostrarRegister(){
        return view('register');
    }
    
    public function index()
    {
        return response()->json(User::all());
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
        $usuario = User::create($request->all());
        return redirect()->route('admin.usuarios.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $usuario = User::find($id);
        return view('admin/usuarios/verUsuario', compact('usuario'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $usuario = User::find($id);
        return view('admin/usuarios/editarUsuario', compact('usuario'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {   

        $validated = $request->validate([
            'nombre_usuario' => 'required|string|max:255',
            'email_usuario' => 'required|email|unique:usuarios,email_usuario,' . $id,
            'password_usuario' => 'required|string|min:8',
            'activo_usuario' => 'required|boolean',
        ]);

        $usuario = User::find($id);
        $usuario->update($validated);
        return redirect()->route('admin.usuarios.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $usuario = User::find($id);
        $usuario->delete();
        return redirect()->route('admin.usuarios.index');
    }
}
