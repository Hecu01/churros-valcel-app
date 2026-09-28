<?php

namespace Database\Seeders;

use App\Models\Cliente;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Cliente::insert([
            [
                'id' => 1,
                'nombre' => 'Valentin',
                'apellido' => 'Urbine',
                'telefono' => 3364036241,
                'direccion' => 'Gutemberg 7 bis',
                'barrio' => 'Yaguaron',
                'zona' => 'zona norte',
                'compras_realizadas' => 10,
                'created_at' => '2026-09-13 07:36:20',
                'updated_at' => '2026-09-13 07:36:20',
            ],
            [
                'id' => 2,
                'nombre' => 'Ludmila',
                'apellido' => 'Mazzey',
                'telefono' => 3364335322,
                'direccion' => 'Rivas 101 bis',
                'barrio' => 'Santa Clara',
                'zona' => 'zona norte',
                'compras_realizadas' => 4,
                'created_at' => '2026-09-13 07:40:33',
                'updated_at' => '2026-09-13 07:40:33',
            ],
            [
                'id' => 3,
                'nombre' => 'Matias',
                'apellido' => '-',
                'telefono' => 3364522131,
                'direccion' => 'Volta 1717',
                'barrio' => 'Yaguarón',
                'zona' => 'zona norte',
                'compras_realizadas' => 1,
                'created_at' => '2026-09-13 07:42:51',
                'updated_at' => '2026-09-13 07:42:51',
            ],
            [
                'id' => 4,
                'nombre' => 'Sofía',
                'apellido' => 'Arias',
                'telefono' => 3364634751,
                'direccion' => 'Volta 1606',
                'barrio' => 'Yaguarón',
                'zona' => 'zona norte',
                'compras_realizadas' => 4,
                'created_at' => '2026-09-13 08:00:56',
                'updated_at' => '2026-09-13 08:00:56',
            ],
            [
                'id' => 5,
                'nombre' => 'Ángeles',
                'apellido' => 'Fernandez',
                'telefono' => 3364018377,
                'direccion' => 'Chopin 261',
                'barrio' => 'Las Mellizas',
                'zona' => 'zona norte',
                'compras_realizadas' => 3,
                'created_at' => '2026-09-13 08:01:44',
                'updated_at' => '2026-09-13 08:01:44',
            ],
            [
                'id' => 6,
                'nombre' => 'Ludmila',
                'apellido' => 'Solis',
                'telefono' => 3364353523,
                'direccion' => 'Antártida 1028',
                'barrio' => 'Moreno',
                'zona' => 'zona norte',
                'compras_realizadas' => 1,
                'created_at' => '2026-09-13 08:02:40',
                'updated_at' => '2026-09-13 08:02:40',
            ],
            [
                'id' => 7,
                'nombre' => 'Agostina',
                'apellido' => 'Herrera',
                'telefono' => 3364394802,
                'direccion' => 'José Nuñez 1304',
                'barrio' => 'San Martin',
                'zona' => 'zona norte',
                'compras_realizadas' => 1,
                'created_at' => '2026-09-13 08:04:02',
                'updated_at' => '2026-09-13 08:04:02',
            ],
            [
                'id' => 8,
                'nombre' => 'Julio',
                'apellido' => 'Mena',
                'telefono' => 3364572530,
                'direccion' => 'Franklin 41 bis',
                'barrio' => 'Yaguarón',
                'zona' => 'zona norte',
                'compras_realizadas' => 5,
                'created_at' => '2026-09-13 08:05:03',
                'updated_at' => '2026-09-13 08:05:03',
            ],
            [
                'id' => 9,
                'nombre' => 'Venta',
                'apellido' => 'Ambulante',
                'telefono' => 3364123456,
                'direccion' => 'Eco parque, costanera, plazas',
                'barrio' => 'Espacio público',
                'zona' => 'zona norte',
                'compras_realizadas' => 0,
                'created_at' => '2026-09-15 04:28:11',
                'updated_at' => '2026-09-15 04:28:11',
            ],
            [
                'id' => 10,
                'nombre' => 'Carlos',
                'apellido' => '-',
                'telefono' => 3364240547,
                'direccion' => 'San juan 645',
                'barrio' => 'Fraga',
                'zona' => 'zona oeste',
                'compras_realizadas' => 0,
                'created_at' => '2026-09-15 04:47:21',
                'updated_at' => '2026-09-15 04:47:21',
            ],
            [
                'id' => 11,
                'nombre' => 'Marcelo',
                'apellido' => 'Grossi',
                'telefono' => 3364277040,
                'direccion' => '-',
                'barrio' => 'Martinez',
                'zona' => 'zona norte',
                'compras_realizadas' => 1,
                'created_at' => '2026-09-16 18:11:00',
                'updated_at' => '2026-09-16 18:11:00',
            ],
            [
                'id' => 12,
                'nombre' => 'Benicio',
                'apellido' => '-',
                'telefono' => 3364398900,
                'direccion' => 'Colegio la paz',
                'barrio' => 'Centro',
                'zona' => 'zona centro',
                'compras_realizadas' => 1,
                'created_at' => '2026-09-19 06:50:41',
                'updated_at' => '2026-09-19 06:50:41',
            ],
        ]);
    }
}



