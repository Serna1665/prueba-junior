<?php

namespace App\Http\Modules\Usuario\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Http\Modules\Usuario\Models\Usuario;
use App\Http\Modules\Usuario\Request\CrearUsuarioRequest;

class UsuarioController extends Controller
{
    public function listar()
    {
        $usuarios = Usuario::all();

        return response()->json(['usuarios' => $usuarios], 200);
    }

    public function crear(CrearUsuarioRequest $request)
    {
        $datos = $request->validated();

        Usuario::create([
            'nombre' => $datos['nombre'],
            'correo' => $datos['correo'],
            'contrasena' => bcrypt($datos['contrasena']),
        ]);

        return response()->json([
            'message' => 'Se ha registrado correctamente.',
        ], Response::HTTP_CREATED);
    }
}
