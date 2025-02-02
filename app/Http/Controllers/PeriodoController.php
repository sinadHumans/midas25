<?php

namespace App\Http\Controllers;

use App\Http\Requests\PeriodoStoreRequest;
use App\Http\Requests\PeriodoUpdateRequest;
use App\Models\Periodo;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use App\Models\Acciones;

class PeriodoController extends Controller
{
     /* mostrar informacion por estudio */
     public function muestro($id){
        // Buscar registros con el idEstudio especificado
        $estudios = Periodo::where('idEstudio', $id)->get();

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

        $data['inicio'] = !empty($request->post('inicio')) ? $request->post('inicio') : 0;
        $data['termino'] = !empty($request->post('termino')) ? $request->post('termino') : 0;
        $data['motivo'] = !empty($request->post('motivo')) ? $request->post('motivo') : 0;
        $data['comentarios'] = !empty($request->post('comentarios')) ? $request->post('comentarios') : 0;
        $data['idEstudio'] = !empty($request->post('idEstudio')) ? $request->post('idEstudio') : 0;

        $data['idUsuario'] = session('email');
        $user = Periodo::create($data);
    /* agregamos el accion */
    $accion = [ 'idUsuario' => session('email'), 'accion' => "Creación de periodo no laborado", ];
    $acceso = Acciones::create($accion);

    return response()->json(['message' => 'Acción realizada']);

    }

    /* funcion pára editar  */
    public function editar(Request $request, $id){

        /* validamos los valores antes de crear y en caso de que no tenga contenido le ponemos cero */
        $data = [ ];
        /* if ($request->post('') != "") { $data[''] = $request->post(''); } */

        if ($request->get('inicio') != "") { $data['inicio'] = $request->get('inicio'); }
        if ($request->get('termino') != "") { $data['termino'] = $request->get('termino'); }
        if ($request->get('motivo') != "") { $data['motivo'] = $request->get('motivo'); }
        if ($request->get('comentarios') != "") { $data['comentarios'] = $request->get('comentarios'); }
        if ($request->get('idEstudio') != "") { $data['idEstudio'] = $request->get('idEstudio'); }

        $data['idUsuario'] = session('email');

        // Actualizar el registro
        $updated = Periodo::where('id', $id)->update($data);

        /* agregamos el accion */
        $accion = [ 'idUsuario' => session('email'), 'accion' => "Edicion de periodo no laborado ", ];
        $acceso = Acciones::create($accion);

        return response()->json(['success' => true, 'message' => 'Registro editado correctamente.']);
    }

    /* eliminar registro */
    public function eliminar($id)  {
        $empresa = Periodo::findOrFail($id); // Busca la empresa por ID
        $empresa->delete(); // Elimina la empresa
        /* agregamos el accion */
        $accion = [ 'idUsuario' => session('email'), 'accion' => "Eliminamos periodo no laborado", ];
        $acceso = Acciones::create($accion);
        return response()->json(['success' => true, 'message' => 'Registro eliminada correctamente.']);
    }
}
