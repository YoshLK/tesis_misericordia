<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
//modelo de permisos de spatie
use Spatie\Permission\Models\Permission;

class SeederTablaPermisos extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   
        
        $permisos = [
            //Operaciones sobre tabla roles
            'ver-rol',
            'crear-rol',
            'editar-rol',
            'borrar-rol',

            //Operacions sobre tabla adultos
            'ver-adulto',
            'crear-adulto',
            'editar-adulto',
            'borrar-adulto',

            //Operacions sobre tabla Usuarios
            'ver-usuario',
            'crear-usuario',
            'editar-usuario',
            'borrar-usuario',
        ];

        foreach($permisos as $permiso) {
            Permission::updateOrCreate(['name'=>$permiso]);
        }
    }
}
