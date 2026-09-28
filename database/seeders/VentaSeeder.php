<?php

namespace Database\Seeders;

use App\Models\Venta;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VentaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $ventas = [
            [
                'id' => 1,
                'cliente_id' => 10,
                'fecha' => '2026-09-15 01:49:35',
                'costo_envio' => 0,
                'descuento' => 0,
                'total' => 6500,
                'medio_pago' => 'efectivo',
                'estado' => 'completada',
                'observaciones' => 'Entrega en domicilio',
                'created_at' => '2026-09-15 04:49:35',
                'updated_at' => '2026-09-15 04:49:35',
            ],
            [
                'id' => 2,
                'cliente_id' => 9,
                'fecha' => '2026-09-15 02:29:00',
                'costo_envio' => 0,
                'descuento' => 0,
                'total' => 43000,
                'medio_pago' => 'efectivo',
                'estado' => 'completada',
                'observaciones' => 'Entrega en espacio publico',
                'created_at' => '2026-09-15 05:31:18',
                'updated_at' => '2026-09-15 05:31:18',
            ],
            [
                'id' => 3,
                'cliente_id' => 11,
                'fecha' => '2026-09-15 17:00:00',
                'costo_envio' => 0,
                'descuento' => 0,
                'total' => 6000,
                'medio_pago' => 'transferencia',
                'estado' => 'completada',
                'observaciones' => 'Vino a retirar a domicilio',
                'created_at' => '2026-09-16 18:11:50',
                'updated_at' => '2026-09-16 18:11:50',
            ],
            [
                'id' => 4,
                'cliente_id' => 9,
                'fecha' => '2026-09-16 16:00:00',
                'costo_envio' => 0,
                'descuento' => 0,
                'total' => 33000,
                'medio_pago' => 'efectivo',
                'estado' => 'completada',
                'observaciones' => 'Eco parque.',
                'created_at' => '2026-09-16 23:49:46',
                'updated_at' => '2026-09-16 23:49:46',
            ],
            [
                'id' => 5,
                'cliente_id' => 12,
                'fecha' => '2026-09-18 09:00:00',
                'costo_envio' => 0,
                'descuento' => 0,
                'total' => 19500,
                'medio_pago' => 'efectivo',
                'estado' => 'completada',
                'observaciones' => 'Entregado en la escuela de él.. Es alumno',
                'created_at' => '2026-09-19 06:51:40',
                'updated_at' => '2026-09-19 06:51:40',
            ],
        ];

        Venta::insert($ventas);

        $detalles = [
            [
                'id' => 1,
                'venta_id' => 1,
                'producto_id' => 1,
                'cantidad' => 1,
                'precio_unitario' => 6500,
                'subtotal' => 6500,
                'created_at' => '2026-09-15 04:49:35',
                'updated_at' => '2026-09-15 04:49:35',
            ],
            [
                'id' => 2,
                'venta_id' => 2,
                'producto_id' => 6,
                'cantidad' => 1,
                'precio_unitario' => 7000,
                'subtotal' => 7000,
                'created_at' => '2026-09-15 05:31:18',
                'updated_at' => '2026-09-15 05:31:18',
            ],
            [
                'id' => 3,
                'venta_id' => 2,
                'producto_id' => 7,
                'cantidad' => 9,
                'precio_unitario' => 4000,
                'subtotal' => 36000,
                'created_at' => '2026-09-15 05:31:18',
                'updated_at' => '2026-09-15 05:31:18',
            ],
            [
                'id' => 4,
                'venta_id' => 3,
                'producto_id' => 3,
                'cantidad' => 1,
                'precio_unitario' => 6000,
                'subtotal' => 6000,
                'created_at' => '2026-09-16 18:11:50',
                'updated_at' => '2026-09-16 18:11:50',
            ],
            [
                'id' => 5,
                'venta_id' => 4,
                'producto_id' => 6,
                'cantidad' => 3,
                'precio_unitario' => 7000,
                'subtotal' => 21000,
                'created_at' => '2026-09-16 23:49:46',
                'updated_at' => '2026-09-16 23:49:46',
            ],
            [
                'id' => 6,
                'venta_id' => 4,
                'producto_id' => 7,
                'cantidad' => 3,
                'precio_unitario' => 4000,
                'subtotal' => 12000,
                'created_at' => '2026-09-16 23:49:46',
                'updated_at' => '2026-09-16 23:49:46',
            ],
            [
                'id' => 7,
                'venta_id' => 5,
                'producto_id' => 1,
                'cantidad' => 3,
                'precio_unitario' => 6500,
                'subtotal' => 19500,
                'created_at' => '2026-09-19 06:51:40',
                'updated_at' => '2026-09-19 06:51:40',
            ],
        ];

        \App\Models\DetalleVenta::insert($detalles);
    }
}
