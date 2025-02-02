<?php

namespace App\Http\Controllers;

use App\Http\Requests\HistoriallaboralStoreRequest;
use App\Http\Requests\HistoriallaboralUpdateRequest;
use App\Models\Historiallaboral;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use App\Models\Acciones;

class HistoriallaboralController extends Controller
{
     /* mostrar informacion por estudio */
     public function muestro($id){
        // Buscar registros con el idEstudio especificado
        $estudios = Historiallaboral::where('idEstudio', $id)->get();

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

        $data['ultimo'] = !empty($request->post('ultimo')) ? $request->post('ultimo') : 0;
        $data['vida'] = !empty($request->post('vida')) ? $request->post('vida') : 0;
        $data['nusemana'] = !empty($request->post('nusemana')) ? $request->post('nusemana') : 0;
        $data['porcentaje'] = !empty($request->post('porcentaje')) ? $request->post('porcentaje') : 0;
        $data['numeroempleadores'] = !empty($request->post('numeroempleadores')) ? $request->post('numeroempleadores') : 0;
        $data['progresion'] = !empty($request->post('progresion')) ? $request->post('progresion') : 0;
        $data['finiquito'] = !empty($request->post('finiquito')) ? $request->post('finiquito') : 0;
        $data['liquidacion'] = !empty($request->post('liquidacion')) ? $request->post('liquidacion') : 0;
        $data['aguinaldo'] = !empty($request->post('aguinaldo')) ? $request->post('aguinaldo') : 0;
        $data['vacaciones'] = !empty($request->post('vacaciones')) ? $request->post('vacaciones') : 0;
        $data['comentarios'] = !empty($request->post('comentarios')) ? $request->post('comentarios') : 0;
        $data['idEstudio'] = !empty($request->post('idEstudio')) ? $request->post('idEstudio') : 0;

        $data['idUsuario'] = session('email');
        $user = Historiallaboral::create($data);
    /* agregamos el accion */
    $accion = [ 'idUsuario' => session('email'), 'accion' => "Creación de historial laboral", ];
    $acceso = Acciones::create($accion);

    return response()->json(['message' => 'Acción realizada']);

    }

    /* funcion pára editar  */
    public function editar(Request $request, $id){

        /* validamos los valores antes de crear y en caso de que no tenga contenido le ponemos cero */
        $data = [ ];
        /* if ($request->post('') != "") { $data[''] = $request->post(''); } */

        if ($request->get('ultimo') != "") { $data['ultimo'] = $request->get('ultimo'); }
        if ($request->get('vida') != "") { $data['vida'] = $request->get('vida'); }
        if ($request->get('nusemana') != "") { $data['nusemana'] = $request->get('nusemana'); }
        if ($request->get('porcentaje') != "") { $data['porcentaje'] = $request->get('porcentaje'); }
        if ($request->get('numeroempleadores') != "") { $data['numeroempleadores'] = $request->get('numeroempleadores'); }
        if ($request->get('progresion') != "") { $data['progresion'] = $request->get('progresion'); }
        if ($request->get('finiquito') != "") { $data['finiquito'] = $request->get('finiquito'); }
        if ($request->get('liquidacion') != "") { $data['liquidacion'] = $request->get('liquidacion'); }
        if ($request->get('aguinaldo') != "") { $data['aguinaldo'] = $request->get('aguinaldo'); }
        if ($request->get('vacaciones') != "") { $data['vacaciones'] = $request->get('vacaciones'); }
        if ($request->get('comentarios') != "") { $data['comentarios'] = $request->get('comentarios'); }
        if ($request->get('idEstudio') != "") { $data['idEstudio'] = $request->get('idEstudio'); }

        $data['idUsuario'] = session('email');

        // Actualizar el registro
        $updated = Historiallaboral::where('id', $id)->update($data);

        /* agregamos el accion */
        $accion = [ 'idUsuario' => session('email'), 'accion' => "Edicion de historial laboral ", ];
        $acceso = Acciones::create($accion);

        return response()->json(['success' => true, 'message' => 'Registro editado correctamente.']);
    }

    /* eliminar registro */
    public function eliminar($id)  {
        $empresa = Historiallaboral::findOrFail($id); // Busca la empresa por ID
        $empresa->delete(); // Elimina la empresa
        /* agregamos el accion */
        $accion = [ 'idUsuario' => session('email'), 'accion' => "Eliminamos historial laboral", ];
        $acceso = Acciones::create($accion);
        return response()->json(['success' => true, 'message' => 'Registro eliminada correctamente.']);
    }
}
