<?php

namespace App\Http\Controllers;

use App\Models\Direccion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DireccionesController extends Controller
{
    /**
     * Display a listing of the user's addresses.
     */
    public function index()
    {
        $direcciones = Direccion::where('fk_id_usuario', Auth::id())->get();
        return view('direcciones.index', compact('direcciones'));
    }

    /**
     * Show the form for creating a new address.
     */
    public function create()
    {
        return view('direcciones.create');
    }

    /**
     * Store a newly created address in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre_direccion' => 'required|string|max:255',
            'direccion' => 'required|string|max:255',
            'codigoPostal' => 'required|string|max:10',
            'ciudad' => 'required|string|max:100',
            'provincia' => 'required|string|max:100',
            'pais' => 'required|string|max:100',
        ]);

        $direccion = new Direccion();
        $direccion->fk_id_usuario = Auth::id();
        $direccion->nombre_direccion = $validated['nombre_direccion'];
        $direccion->direccion = $validated['direccion'];
        $direccion->codigoPostal = $validated['codigoPostal'];
        $direccion->ciudad = $validated['ciudad'];
        $direccion->provincia = $validated['provincia'];
        $direccion->pais = $validated['pais'];
        $direccion->save();

        return redirect()->route('direcciones.index')
            ->with('success', 'Dirección creada correctamente.');
    }

    /**
     * Display the specified address.
     */
    public function show(Direccion $direccion)
    {
        // Check if the address belongs to the authenticated user
        if ($direccion->fk_id_usuario !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }

        return view('direcciones.show', compact('direccion'));
    }

    /**
     * Show the form for editing the specified address.
     */
    public function edit(Direccion $direccione)
    {
        // Check if the address belongs to the authenticated user
        if ($direccione->fk_id_usuario !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }

        return view('direcciones.edit', compact('direccione'));
    }

    /**
     * Update the specified address in storage.
     */
    public function update(Request $request, Direccion $direccione)
    {
        // Check if the address belongs to the authenticated user
        if ($direccione->fk_id_usuario !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }

        $validated = $request->validate([
            'nombre_direccion' => 'required|string|max:255',
            'direccion' => 'required|string|max:255',
            'codigoPostal' => 'required|string|max:10',
            'ciudad' => 'required|string|max:100',
            'provincia' => 'required|string|max:100',
            'pais' => 'required|string|max:100',
        ]);

        $direccione->nombre_direccion = $validated['nombre_direccion'];
        $direccione->direccion = $validated['direccion'];
        $direccione->codigoPostal = $validated['codigoPostal'];
        $direccione->ciudad = $validated['ciudad'];
        $direccione->provincia = $validated['provincia'];
        $direccione->pais = $validated['pais'];
        $direccione->save();

        return redirect()->route('direcciones.index')
            ->with('success', 'Dirección actualizada correctamente.');
    }

    /**
     * Remove the specified address from storage.
     */
    public function destroy(Direccion $direccione)
    {
        // Check if the address belongs to the authenticated user
        if ($direccione->fk_id_usuario !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }

        $direccione->delete();

        return redirect()->route('direcciones.index')
            ->with('success', 'Dirección eliminada correctamente.');
    }
}
