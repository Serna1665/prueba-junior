<?php

namespace App\Http\Modules\Usuario\Models;

use App\Http\Modules\Proyecto\Models\Proyecto;
use App\Http\Modules\Tareas\Models\Tarea;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'correo',
        'contrasena'
    ];

    public function proyectos()
    {
        return $this->hasMany(Proyecto::class);
    }

    public function tareas()
    {
        return $this->hasMany(Tarea::class);
    }
}
