<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Empleado;
use App\Models\Usuario;

class EmpleadoUsuarioSeeder extends Seeder
{
    public function run(): void
    {
        // Crear empleado
        $empleado = Empleado::create([
            'id_empleado' => 1,
            'nombre' => 'Valery',
            'apellido' => 'Rulieta',
            'cargo' => 'Gerente',
            'telefono' => '76830213',
        ]);

        // Crear usuario vinculado al empleado
        Usuario::create([
            'id_empleado' => $empleado->id_empleado,
            'usuario' => 'admin',
            'contraseña' => bcrypt('admin'), // siempre encriptar
            'rol' => 'administrador',
            'estado' => 'activo',
        ]);
    }
}
