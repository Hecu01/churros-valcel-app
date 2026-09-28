<?php

namespace Database\Seeders;

use App\Models\Producto;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Producto::insert([
        [
            'id' => 1,
            'nombre' => 'Docena rellena',
            'descripcion' => '12 churros rellenos de dulce de leche',
            'precio' => 6500,
            'activo' => false,
            'created_at' => '2026-09-14 17:35:51',
            'updated_at' => '2026-09-14 17:35:51',
        ],
        [
            'id' => 2,
            'nombre' => 'Docena simple',
            'descripcion' => '12 churros simples',
            'precio' => 5500,
            'activo' => true,
            'created_at' => '2026-09-15 04:30:24',
            'updated_at' => '2026-09-15 04:30:24',
        ],
        [
            'id' => 3,
            'nombre' => 'Docena mixta',
            'descripcion' => '6 churros simples y 6 rellenos',
            'precio' => 6000,
            'activo' => true,
            'created_at' => '2026-09-15 04:30:42',
            'updated_at' => '2026-09-15 04:30:42',
        ],
        [
            'id' => 4,
            'nombre' => 'Media docena simple',
            'descripcion' => '6 churros simples',
            'precio' => 3500,
            'activo' => true,
            'created_at' => '2026-09-15 04:31:13',
            'updated_at' => '2026-09-15 04:31:13',
        ],
        [
            'id' => 5,
            'nombre' => 'Media docena rellena',
            'descripcion' => '6 churros rellenos',
            'precio' => 3500,
            'activo' => true,
            'created_at' => '2026-09-15 04:31:33',
            'updated_at' => '2026-09-15 04:31:33',
        ],
        [
            'id' => 6,
            'nombre' => 'Docena rellena costanera',
            'descripcion' => '12 churros rellenos precio costanera',
            'precio' => 7000,
            'activo' => true,
            'created_at' => '2026-09-15 04:32:09',
            'updated_at' => '2026-09-15 04:32:09',
        ],
        [
            'id' => 7,
            'nombre' => 'Media docena rellena costanera',
            'descripcion' => '6 churros rellenos precio costanera',
            'precio' => 4000,
            'activo' => true,
            'created_at' => '2026-09-15 04:32:32',
            'updated_at' => '2026-09-15 04:32:32',
        ],
    ]);
    }
}
