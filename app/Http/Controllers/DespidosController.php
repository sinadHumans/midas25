<?php

namespace App\Http\Controllers;

use App\Http\Requests\DespidosStoreRequest;
use App\Http\Requests\DespidosUpdateRequest;
use App\Models\Despidos;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use App\Models\Acciones;

class DespidosController extends Controller
{
     /* mostrar informacion por estudio */
     public function muestro($id){
        // Buscar registros con el idEstudio especificado
        $estudios = Despidos::where('idEstudio', $id)->get();

        // Devolver los resultados como un JSON
        return response()->json([
            'success' => true,
            'data' => $estudios
        ]);
    }

    /* funcion para crear  */
    public function crear(Request $request): JsonResponse{

        $data = [  ];
        /* $data[''] = !empty($request->post('')) ? $request->post('') : 0; */

        $data['nombre'] = !empty($request->post('nombre')) ? $request->post('nombre') : 0;
        $data['periodo'] = !empty($request->post('periodo')) ? $request->post('periodo') : 0;
        $data['motivo'] = !empty($request->post('motivo')) ? $request->post('motivo') : 0;
        $data['idEstudio'] = !empty($request->post('idEstudio')) ? $request->post('idEstudio') : 0;
        $data['idUsuario'] = session('email');
        $user = Despidos::create($data);
    /* agregamos el accion */
    $accion = [ 'idUsuario' => session('email'), 'accion' => "Creación de Despidos", ];
    $acceso = Acciones::create($accion);

    return response()->json(['message' => 'Acción realizada']);

    }

    /* funcion pára editar  */
    public function editar(Request $request, $id){

        /* validamos los valores antes de crear y en caso de que no tenga contenido le ponemos cero */
        $data = [ ];
        /* if ($request->post('') != "") { $data[''] = $request->post(''); } */

        if ($request->get('nombre') != "") { $data['nombre'] = $request->get('nombre'); }
        if ($request->get('periodo') != "") { $data['periodo'] = $request->get('periodo'); }
        if ($request->get('motivo') != "") { $data['motivo'] = $request->get('motivo'); }
        if ($request->get('idEstudio') != "") { $data['idEstudio'] = $request->get('idEstudio'); }

        $data['idUsuario'] = session('email');

        // Actualizar el registro
        $updated = Despidos::where('id', $id)->update($data);

        /* agregamos el accion */
        $accion = [ 'idUsuario' => session('email'), 'accion' => "Edicion de Despidos ", ];
        $acceso = Acciones::create($accion);

        return response()->json(['success' => true, 'message' => 'Registro editado correctamente.']);
    }

    /* eliminar registro */
    public function eliminar($id)  {
        $empresa = Despidos::findOrFail($id); // Busca la empresa por ID
        $empresa->delete(); // Elimina la empresa
        /* agregamos el accion */
        $accion = [ 'idUsuario' => session('email'), 'accion' => "Eliminamos Despidos ", ];
        $acceso = Acciones::create($accion);
        return response()->json(['success' => true, 'message' => 'Registro eliminada correctamente.']);
    }
}
