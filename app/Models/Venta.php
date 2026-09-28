<?php

namespace App\Models;

use App\Models\Cliente;
use App\Models\DetalleVenta;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    use HasFactory;
    protected $table = 'ventas';
    protected $fillable = [
        'cliente_id',
        'fecha',
        'costo_envio',
        'descuento',
        'total',
        'medio_pago',
        'estado',
        'observaciones',
    ];

    public function detalles()
    {
        return $this->hasMany(DetalleVenta::class);
    }

    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }
}
