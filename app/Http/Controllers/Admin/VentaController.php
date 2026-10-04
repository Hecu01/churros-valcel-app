<?php

namespace App\Http\Controllers\Admin;

use App\Models\Cliente;
use App\Models\Producto;
use App\Models\Venta;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class VentaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ventas = Venta::all();
        return view('admin.ventas.index', compact('ventas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $clientes = Cliente::orderBy('nombre')->get();
        $productos = Producto::all();
        return view('admin.ventas.create', compact('clientes', 'productos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $datos = $request->validate([
            'cliente_id' => 'nullable|exists:clientes,id',
            'costo_envio' => 'required|numeric|min:0',
            'descuento' => 'required|numeric|min:0',
            'medio_pago' => 'required|in:efectivo,transferencia',
            'estado' => 'required|in:completada,pendiente,cancelada',
            'observaciones' => 'nullable|string|max:1000',
            'fecha' => 'required|date',
            'hora' => 'required|date_format:H:i',
            'detalles' => 'required|array|min:1',
            'detalles.*.producto_id' => 'required|exists:productos,id',
            'detalles.*.cantidad' => 'required|integer|min:1',
        ]);


        // ==========================================
        // UNIR FECHA Y HORA
        // ==========================================

        $fechaHora = $datos['fecha'] . ' ' . $datos['hora'] . ':00';
        DB::transaction(function () use ($datos, $fechaHora) {

            $subtotal = 0;

            $detallesVenta = [];


            // ==========================================
            // CALCULAR PRODUCTOS
            // ==========================================

            foreach ($datos['detalles'] as $detalle) {

                $producto = Producto::findOrFail(
                    $detalle['producto_id']
                );

                $cantidad = $detalle['cantidad'];

                $precioUnitario = $producto->precio;

                $subtotalProducto =
                    $precioUnitario * $cantidad;

                $subtotal += $subtotalProducto;


                $detallesVenta[] = [

                    'producto_id' =>
                        $producto->id,

                    'cantidad' =>
                        $cantidad,

                    'precio_unitario' =>
                        $precioUnitario,

                    'subtotal' =>
                        $subtotalProducto,

                ];
            }


            // ==========================================
            // ENVÍO Y DESCUENTO
            // ==========================================

            $costoEnvio = $datos['costo_envio'];

            $descuento = $datos['descuento'];


            // Evitar que el descuento genere
            // una venta con total negativo.

            if ($descuento > ($subtotal + $costoEnvio)) {

                throw \Illuminate\Validation\ValidationException::withMessages([
                    'descuento' =>
                        'El descuento no puede superar el total de la venta.'
                ]);

            }


            // ==========================================
            // TOTAL FINAL
            // ==========================================

            $total =
                $subtotal
                + $costoEnvio
                - $descuento;


            // ==========================================
            // CREAR VENTA
            // ==========================================

            $venta = Venta::create([

                'cliente_id' =>
                    $datos['cliente_id'] ?? null,

                'fecha' =>
                    $fechaHora,

                'costo_envio' =>
                    $costoEnvio,

                'descuento' =>
                    $descuento,

                'total' =>
                    $total,

                'medio_pago' =>
                    $datos['medio_pago'],

                'estado' =>
                    $datos['estado'],

                'observaciones' =>
                    $datos['observaciones'] ?? null,

            ]);


            // ==========================================
            // CREAR DETALLES
            // ==========================================

            foreach ($detallesVenta as $detalle) {

                $venta->detalles()->create($detalle);

            }

        });


        return redirect()->route('venta.index')->with('success','Venta registrada correctamente.');
    }

    public function ticket(Venta $venta)
    {
        $venta->load([
            'cliente',
            'detalles.producto'
        ]);

        return view('admin.ventas.ticket', compact('venta'));
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
