<?php

namespace App\Http\Controllers;

use App\Http\Requests\RefepersonalesStoreRequest;
use App\Http\Requests\RefepersonalesUpdateRequest;
use App\Models\Refepersonales;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use App\Models\Acciones;

class RefepersonalesController extends Controller
{
    /* mostrar informacion por estudio */
    public function muestro($id){
        // Buscar registros con el idEstudio especificado
        $estudios = Refepersonales::where('idEstudio', $id)->get();

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
        $data['idEstudio'] = !empty($request->post('idEstudio')) ? $request->post('idEstudio') : 0;
        $data['nombre'] = !empty($request->post('nombre')) ? $request->post('nombre') : 0;
        $data['tiempoConocerlo'] = !empty($request->post('tiempoConocerlo')) ? $request->post('tiempoConocerlo') : 0;
        $data['relacion'] = !empty($request->post('relacion')) ? $request->post('relacion') : 0;
        $data['domicilio'] = !empty($request->post('domicilio')) ? $request->post('domicilio') : 0;
        $data['tel1'] = !empty($request->post('tel1')) ? $request->post('tel1') : 0;
        $data['opinion'] = !empty($request->post('opinion')) ? $request->post('opinion') : 0;
        $data['idUsuario'] = !empty($request->post('idUsuario')) ? $request->post('idUsuario') : 0;

        $data['idUsuario'] = session('email');
        $user = Refepersonales::create($data);
    /* agregamos el accion */
    $accion = [ 'idUsuario' => session('email'), 'accion' => "Creación de referencia personal", ];
    $acceso = Acciones::create($accion);

    return response()->json(['message' => 'Acción realizada']);

    }

    /* funcion pára editar  */
    public function editar(Request $request, $id){

        /* validamos los valores antes de crear y en caso de que no tenga contenido le ponemos cero */
        $data = [ ];
        /* if ($request->post('') != "") { $data[''] = $request->post(''); } */

        if ($request->get('idEstudio') != "") { $data['idEstudio'] = $request->get('idEstudio'); }
        if ($request->get('nombre') != "") { $data['nombre'] = $request->get('nombre'); }
        if ($request->get('tiempoConocerlo') != "") { $data['tiempoConocerlo'] = $request->get('tiempoConocerlo'); }
        if ($request->get('relacion') != "") { $data['relacion'] = $request->get('relacion'); }
        if ($request->get('domicilio') != "") { $data['domicilio'] = $request->get('domicilio'); }
        if ($request->get('tel1') != "") { $data['tel1'] = $request->get('tel1'); }
        if ($request->get('opinion') != "") { $data['opinion'] = $request->get('opinion'); }
        if ($request->get('idUsuario') != "") { $data['idUsuario'] = $request->get('idUsuario'); }

        $data['idUsuario'] = session('email');

        // Actualizar el registro
        $updated = Refepersonales::where('id', $id)->update($data);

        /* agregamos el accion */
        $accion = [ 'idUsuario' => session('email'), 'accion' => "Edicion de referencia personal", ];
        $acceso = Acciones::create($accion);

        return response()->json(['success' => true, 'message' => 'Registro editado correctamente.']);
    }

    /* eliminar registro */
    public function eliminar($id)  {
        $empresa = Refepersonales::findOrFail($id); // Busca la empresa por ID
        $empresa->delete(); // Elimina la empresa
        /* agregamos el accion */
        $accion = [ 'idUsuario' => session('email'), 'accion' => "Eliminamos referencia personal", ];
        $acceso = Acciones::create($accion);
        return response()->json(['success' => true, 'message' => 'Registro eliminada correctamente.']);
    }
}
