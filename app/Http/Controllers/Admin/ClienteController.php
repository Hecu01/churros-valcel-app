<?php

namespace App\Http\Controllers\Admin;

use App\Models\Cliente;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clientes = Cliente::all();
        return view('admin.clientes.index', compact('clientes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.clientes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $datos = $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',

            'telefono' => [
                'required',
                'string',
                'max:50',
                'unique:clientes,telefono',
            ],

            'compras_realizadas' => 'required|integer|min:0',
            'direccion' => 'required|string|max:255',
            'barrio' => 'required|string|max:255',
            'zona' => 'required|string|max:255',
        ], [
            'telefono.unique' => 'Ya existe un cliente registrado con ese número de teléfono.',
        ]);

        Cliente::create($datos);

        return redirect()
            ->route('cliente.index')
            ->with('success', 'Cliente creado exitosamente.');
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
        $cliente = Cliente::class::findOrFail($id);
        return view('admin.clientes.edit', compact('cliente'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $cliente = Cliente::class::findOrFail($id);
        $cliente->update($request->all());
        return redirect()->route('cliente.index')->with('success', 'Cliente actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $cliente = Cliente::class::findOrFail($id);
        $cliente->delete();
        return redirect()->route('cliente.index')->with('success', 'Cliente eliminado exitosamente.');
    }
}
