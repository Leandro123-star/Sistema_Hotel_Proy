<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Usuario;

class UsuarioSeeder extends Seeder
{
    public function run(): void
    {
        Usuario::firstOrCreate(
            ['usuario' => 'admin'], // evita duplicados si ya existe
            [
                'id_empleado' => 1, // referencia al empleado existente
                'contraseña' => bcrypt('admin'), // encriptar siempre
                'rol' => 'administrador',
                'estado' => 'activo',
            ]
        );
    }
}
