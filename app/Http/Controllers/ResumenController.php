<?php

namespace App\Http\Controllers;

use App\Http\Requests\ResumenStoreRequest;
use App\Http\Requests\ResumenUpdateRequest;
use App\Models\Resumen;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use App\Models\Acciones;

class ResumenController extends Controller
{
    /* mostrar informacion por estudio */
    public function muestro($id){
        // Buscar registros con el idEstudio especificado
        $estudios = Resumen::where('idEstudio', $id)->get();

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
        $data['social'] = !empty($request->post('social')) ? $request->post('social') : 0;
        $data['escolar'] = !empty($request->post('escolar')) ? $request->post('escolar') : 0;
        $data['economica'] = !empty($request->post('economica')) ? $request->post('economica') : 0;
        $data['laboral'] = !empty($request->post('laboral')) ? $request->post('laboral') : 0;
        $data['actitud'] = !empty($request->post('actitud')) ? $request->post('actitud') : 0;
        $data['observaciones'] = !empty($request->post('observaciones')) ? $request->post('observaciones') : 0;
        $data['recomendacion'] = !empty($request->post('recomendacion')) ? $request->post('recomendacion') : 0;
        $data['observacionesPersonal'] = !empty($request->post('observacionesPersonal')) ? $request->post('observacionesPersonal') : 0;
        $data['observacionesLaboral'] = !empty($request->post('observacionesLaboral')) ? $request->post('observacionesLaboral') : 0;
        $data['cali'] = !empty($request->post('cali')) ? $request->post('cali') : 0;

        $data['idUsuario'] = session('email');
        $user = Resumen::create($data);
    /* agregamos el accion */
    $accion = [ 'idUsuario' => session('email'), 'accion' => "Creación de resumen", ];
    $acceso = Acciones::create($accion);

    return response()->json(['message' => 'Acción realizada']);

    }

    /* funcion pára editar  */
    public function editar(Request $request, $id){

        /* validamos los valores antes de crear y en caso de que no tenga contenido le ponemos cero */
        $data = [ ];
        /* if ($request->post('') != "") { $data[''] = $request->post(''); } */

        if ($request->get('idEstudio') != "") { $data['idEstudio'] = $request->get('idEstudio'); }
        if ($request->get('social') != "") { $data['social'] = $request->get('social'); }
        if ($request->get('escolar') != "") { $data['escolar'] = $request->get('escolar'); }
        if ($request->get('economica') != "") { $data['economica'] = $request->get('economica'); }
        if ($request->get('laboral') != "") { $data['laboral'] = $request->get('laboral'); }
        if ($request->get('actitud') != "") { $data['actitud'] = $request->get('actitud'); }
        if ($request->get('observaciones') != "") { $data['observaciones'] = $request->get('observaciones'); }
        if ($request->get('recomendacion') != "") { $data['recomendacion'] = $request->get('recomendacion'); }
        if ($request->get('observacionesPersonal') != "") { $data['observacionesPersonal'] = $request->get('observacionesPersonal'); }
        if ($request->get('observacionesLaboral') != "") { $data['observacionesLaboral'] = $request->get('observacionesLaboral'); }
        if ($request->get('cali') != "") { $data['cali'] = $request->get('cali'); }

        $data['idUsuario'] = session('email');

        // Actualizar el registro
        $updated = Resumen::where('id', $id)->update($data);

        /* agregamos el accion */
        $accion = [ 'idUsuario' => session('email'), 'accion' => "Edicion de resumen ", ];
        $acceso = Acciones::create($accion);

        return response()->json(['success' => true, 'message' => 'Registro editado correctamente.']);
    }

    /* eliminar registro */
    public function eliminar($id)  {
        $empresa = Resumen::findOrFail($id); // Busca la empresa por ID
        $empresa->delete(); // Elimina la empresa
        /* agregamos el accion */
        $accion = [ 'idUsuario' => session('email'), 'accion' => "Eliminamos resumen", ];
        $acceso = Acciones::create($accion);
        return response()->json(['success' => true, 'message' => 'Registro eliminada correctamente.']);
    }

}
