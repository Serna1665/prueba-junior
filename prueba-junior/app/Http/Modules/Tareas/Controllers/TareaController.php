<?php

namespace App\Http\Modules\Tareas\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Http\Modules\Tareas\Models\Tarea;
use App\Http\Modules\Tareas\Repositories\TareaRepository;
use App\Http\Modules\Tareas\Request\ActualizarTareaRequest;
use App\Http\Modules\Tareas\Request\CrearTareaRequest;

class TareaController extends Controller
{

    protected $tareaRepository;

    public function __construct(TareaRepository $tareaRepository)
    {
        $this->tareaRepository = $tareaRepository;
    }

    public function listar()
    {
        $tareas = $this->tareaRepository->listarProyecto();
        return response()->json($tareas, Response::HTTP_OK);
    }

    public function crear(CrearTareaRequest $request)
    {
        $datosTarea = $request->only(['nombre', 'descripcion', 'fecha_inicio', 'fecha_finalizacion', 'estado', 'proyecto_id']);

        $nuevaTarea = $this->tareaRepository->crearTarea($datosTarea);

        return response()->json([
            'message' => 'Error al crear la asiste'
        ], Response::HTTP_BAD_REQUEST);
    }

    public function actualizar(ActualizarTareaRequest $request, $id)
    {
        $tarea = Tarea::find($id);

        if (!$tarea) {
            return response()->json([
                'message' => 'Error al actualizar una tarea'
            ], Response::HTTP_BAD_REQUEST);
        }

        $datosActualizados = $request->only(['nombre', 'descripcion', 'fecha_inicio', 'fecha_finalizacion', 'estado']);

        $tarea->fill($datosActualizados);
        $tarea->save();

        return response()->json([
            'message' => 'Error al eliminar una tarea'
        ], Response::HTTP_BAD_REQUEST);
    }

}
