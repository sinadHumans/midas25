<?php

namespace App\Http\Controllers;

use App\Http\Requests\AvisosStoreRequest;
use App\Http\Requests\AvisosUpdateRequest;
use App\Models\Avisos;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use App\Models\Acciones;

class AvisosController extends Controller
{
    /* incio de la seccion */
    public function index(){
        $avisos = Avisos::all();
        return response()->view('avisos.index' , compact('avisos'));
    }

    /* funcion par acrear un registro */
    public function crear(Request $request): JsonResponse {
        $validatedData = $request->validate([
            'titulo' => 'required|string',
            'mensaje' => 'required|string',
            'dirigido' => 'required|string',
            'tipo' => 'required|string',
            'estatus' => 'nullable|string',
            'idUsuario' => 'nullable|string',
        ]);
        $avisos = Avisos::create(array_merge($validatedData, [
            'idUsuario' => auth()->id(), // Asignar el id del usuario logueado si aplica
        ]));

        /* agregamos el accion */
        $accion = [ 'idUsuario' => session('email'), 'accion' => "Creación de aviso", ];
        $acceso = Acciones::create($accion);

        return response()->json(['message' => 'Accion realizada', 'data' => $avisos]);
    }

    /* editar registro */
    public function editar(Request $request)
    {
        $validated = $request->validate([
            'titulo' => 'required|string',
            'mensaje' => 'required|string',
            'dirigido' => 'required|string',
            'tipo' => 'required|string',
            'estatus' => 'required|string',

        ]);

        // Encuentra el registro por su ID
        $empresa = Avisos::findOrFail($request->get('id'));

        // Actualiza los campos necesarios
        $empresa->update([
            'titulo' => $request->get('titulo'),
            'mensaje' => $request->get('mensaje'),
            'dirigido' => $request->get('dirigido'),
            'tipo' => $request->get('tipo'),
            'estatus' => $request->get('estatus'),
            'idUsuario' => session('email'),
        ]);
        /* agregamos el accion */
        $accion = [ 'idUsuario' => session('email'), 'accion' => "Edición de empresa", ];
        $acceso = Acciones::create($accion);

        return response()->json(['success' => true, 'message' => 'Registro editado correctamente.']);
    }

    /* eliminar registro */
    public function eliminar($id)  {
        $empresa = Avisos::findOrFail($id); // Busca la empresa por ID
        $empresa->delete(); // Elimina la empresa
        /* agregamos el accion */
        $accion = [ 'idUsuario' => session('email'), 'accion' => "Eliminamos aviso", ];
        $acceso = Acciones::create($accion);
        return response()->json(['success' => true, 'message' => 'Registro eliminada correctamente.']);
    }

    /* funcion par amostrar los avisos que estan activos */
    public function mostrarAvisosActivos(){
        $estatus = 'Activo'; // Predeterminado a 'activo'
        $avisos = Avisos::where('estatus', $estatus)->get();
        return response()->json($avisos);
    }




}
