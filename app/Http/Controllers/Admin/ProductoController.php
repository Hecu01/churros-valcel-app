<?php

namespace App\Http\Controllers\Admin;

use App\Models\Producto;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    public function index()
    {
        $productos = Producto::all();

        return view(
            'admin.productos.index',
            compact('productos')
        );
    }


    public function create()
    {
        return view('admin.productos.create');
    }


    public function store(Request $request)
    {
        $datos = $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'precio' => 'required|numeric|min:0',
            'activo' => 'required|boolean',
        ]);

        Producto::create($datos);

        return redirect()
            ->route('producto.index')
            ->with('success', 'Producto creado exitosamente.');
    }


    public function show($id)
    {
        $producto = Producto::findOrFail($id);

        return view('admin.productos.show',compact('producto'));
    }


    public function edit($id)
    {
        $producto = Producto::findOrFail($id);

        return view('admin.productos.edit',compact('producto'));
    }


    public function update(Request $request, $id)
    {
        $producto = Producto::findOrFail($id);

        $datos = $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'precio' => 'required|numeric|min:0',
            'activo' => 'required|boolean',
        ]);

        $producto->update($datos);

        return redirect()
            ->back()
            ->with('success', 'Producto actualizado exitosamente.');
    }


    public function destroy($id)
    {
        $producto = Producto::findOrFail($id);

        $producto->delete();

        return redirect()
            ->route('producto.index')
            ->with('success', 'Producto eliminado exitosamente.');
    }
}


