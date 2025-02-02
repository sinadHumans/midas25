<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProblemasStoreRequest;
use App\Http\Requests\ProblemasUpdateRequest;
use App\Models\Problemas;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use App\Models\Acciones;

class ProblemasController extends Controller
{
     /* mostrar informacion por estudio */
     public function muestro($id){
        // Buscar registros con el idEstudio especificado
        $estudios = Problemas::where('idEstudio', $id)->get();

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
        $data['informante'] = !empty($request->post('informante')) ? $request->post('informante') : 0;
        $data['comentarios'] = !empty($request->post('comentarios')) ? $request->post('comentarios') : 0;
        $data['dato'] = !empty($request->post('dato')) ? $request->post('dato') : 0;
        $data['idEstudio'] = !empty($request->post('idEstudio')) ? $request->post('idEstudio') : 0;
        $data['idUsuario'] = session('email');
        $user = Problemas::create($data);
    /* agregamos el accion */
    $accion = [ 'idUsuario' => session('email'), 'accion' => "Creación de problemas", ];
    $acceso = Acciones::create($accion);

    return response()->json(['message' => 'Acción realizada']);

    }

    /* funcion pára editar  */
    public function editar(Request $request, $id){

        /* validamos los valores antes de crear y en caso de que no tenga contenido le ponemos cero */
        $data = [ ];
        /* if ($request->post('') != "") { $data[''] = $request->post(''); } */

        if ($request->get('nombre') != "") { $data['nombre'] = $request->get('nombre'); }
        if ($request->get('informante') != "") { $data['informante'] = $request->get('informante'); }
        if ($request->get('comentarios') != "") { $data['comentarios'] = $request->get('comentarios'); }
        if ($request->get('dato') != "") { $data['dato'] = $request->get('dato'); }
        if ($request->get('idEstudio') != "") { $data['idEstudio'] = $request->get('idEstudio'); }

        $data['idUsuario'] = session('email');

        // Actualizar el registro
        $updated = Problemas::where('id', $id)->update($data);

        /* agregamos el accion */
        $accion = [ 'idUsuario' => session('email'), 'accion' => "Edicion de problemas ", ];
        $acceso = Acciones::create($accion);

        return response()->json(['success' => true, 'message' => 'Registro editado correctamente.']);
    }

    /* eliminar registro */
    public function eliminar($id)  {
        $empresa = Problemas::findOrFail($id); // Busca la empresa por ID
        $empresa->delete(); // Elimina la empresa
        /* agregamos el accion */
        $accion = [ 'idUsuario' => session('email'), 'accion' => "Eliminamos problemas ", ];
        $acceso = Acciones::create($accion);
        return response()->json(['success' => true, 'message' => 'Registro eliminada correctamente.']);
    }
}
