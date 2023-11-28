<?php

namespace App\Http\Modules\Proyecto\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Http\Modules\Proyecto\Models\Proyecto;
use App\Http\Modules\Proyecto\Repositories\ProyectoRepository;
use App\Http\Modules\Proyecto\Request\ActualizarProyectoRequest;
use App\Http\Modules\Proyecto\Request\CrearProyectoRequest;

class ProyectoController extends Controller
{
    protected $proyectoRepository;

    public function __construct(ProyectoRepository $proyectoRepository)
    {
        $this->proyectoRepository = $proyectoRepository;
    }

    public function listar()
    {
        $proyectos = $this->proyectoRepository->listarConUsuarios();
        return response()->json($proyectos, Response::HTTP_OK);
    }


    public function crear(CrearProyectoRequest $request)
    {
        $nuevoProyecto = new Proyecto([
            'nombre' => $request->input('nombre'),
            'descripcion' => $request->input('descripcion'),
            'fecha_inicio' => $request->input('fecha_inicio'),
            'fecha_finalizacion' => $request->input('fecha_finalizacion'),
        ]);

        $nuevoProyecto->save();

        return response()->json([
            'message' => 'Se ha registrado correctamente.',
        ], Response::HTTP_CREATED);
    }

    public function actualizar(ActualizarProyectoRequest $request, $id)
    {
        $proyecto = Proyecto::find($id);

        if (!$proyecto) {
            return response()->json(['message' => 'Proyecto no encontrado'], Response::HTTP_NOT_FOUND);
        }

        $proyecto->update($request->all());

        return response()->json(['message' => 'Proyecto actualizado correctamente'], Response::HTTP_OK);
    }
}
