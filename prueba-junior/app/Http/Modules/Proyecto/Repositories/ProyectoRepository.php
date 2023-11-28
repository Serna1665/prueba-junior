<?php

namespace App\Http\Modules\Proyecto\Repositories;

use App\Http\Modules\Proyecto\Models\Proyecto;

class ProyectoRepository
 {

    public function listarConUsuarios()
    {
        return Proyecto::select(
            'proyectos.id',
            'proyectos.nombre',
            'proyectos.descripcion',
            'proyectos.fecha_inicio',
            'proyectos.fecha_finalizacion',
            'usuarios.nombre as nombre_usuario'
        )
        ->join('usuarios', 'proyectos.usuario_id', '=', 'usuarios.id')
        ->get();
    }
}
