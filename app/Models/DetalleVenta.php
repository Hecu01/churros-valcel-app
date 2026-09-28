<?php

namespace App\Models;

use App\Models\Producto;
use App\Models\Venta;
use Illuminate\Database\Eloquent\Model;

class DetalleVenta extends Model
{
    protected $table = 'detalle_ventas';
    protected $fillable = [
        'producto_id',
        'cantidad',
        'precio_unitario',
        'subtotal',
    ];
    public function venta()
    {
        return $this->belongsTo(Venta::class);
    }

    public function producto()
    {
        return $this->belongsTo(Producto::class);
    }
}
