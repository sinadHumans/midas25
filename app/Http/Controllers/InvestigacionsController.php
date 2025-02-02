<?php

namespace App\Http\Controllers;

use App\Http\Requests\InvestigacionsStoreRequest;
use App\Http\Requests\InvestigacionsUpdateRequest;
use App\Models\Investigacions;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use App\Models\Acciones;

class InvestigacionsController extends Controller
{
    /* mostrar informacion por estudio */
   public function muestro($id){
        // Buscar registros con el idEstudio especificado
        $estudios = Investigacions::where('idEstudio', $id)->get();

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
        $data['cuentaConstancia'] = !empty($request->post('cuentaConstancia')) ? $request->post('cuentaConstancia') : 0;
        $data['proporciono'] = !empty($request->post('proporciono')) ? $request->post('proporciono') : 0;
        $data['casoNo'] = !empty($request->post('casoNo')) ? $request->post('casoNo') : 0;
        $data['demandado'] = !empty($request->post('demandado')) ? $request->post('demandado') : 0;
        $data['actualmente'] = !empty($request->post('actualmente')) ? $request->post('actualmente') : 0;
        $data['estabilidad'] = !empty($request->post('estabilidad')) ? $request->post('estabilidad') : 0;
        $data['inactividad'] = !empty($request->post('inactividad')) ? $request->post('inactividad') : 0;
        $data['registoPatronal'] = !empty($request->post('registoPatronal')) ? $request->post('registoPatronal') : 0;
        $data['referenciayPeriodos'] = !empty($request->post('referenciayPeriodos')) ? $request->post('referenciayPeriodos') : 0;
        $data['dosEmpleos'] = !empty($request->post('dosEmpleos')) ? $request->post('dosEmpleos') : 0;
        $data['ausentismo'] = !empty($request->post('ausentismo')) ? $request->post('ausentismo') : 0;
        $data['abandono'] = !empty($request->post('abandono')) ? $request->post('abandono') : 0;
        $data['desempenoRegular'] = !empty($request->post('desempenoRegular')) ? $request->post('desempenoRegular') : 0;
        $data['omitio'] = !empty($request->post('omitio')) ? $request->post('omitio') : 0;
        $data['informacion'] = !empty($request->post('informacion')) ? $request->post('informacion') : 0;
        $data['referencias'] = !empty($request->post('referencias')) ? $request->post('referencias') : 0;
        $data['confiable'] = !empty($request->post('confiable')) ? $request->post('confiable') : 0;
        $data['comentarios'] = !empty($request->post('comentarios')) ? $request->post('comentarios') : 0;
        $data['notasLegales'] = !empty($request->post('notasLegales')) ? $request->post('notasLegales') : 0;
        $data['idEstudio'] = !empty($request->post('idEstudio')) ? $request->post('idEstudio') : 0;

        $data['idUsuario'] = session('email');
        $user = Investigacions::create($data);
    /* agregamos el accion */
    $accion = [ 'idUsuario' => session('email'), 'accion' => "Creación de investigaciones", ];
    $acceso = Acciones::create($accion);

    return response()->json(['message' => 'Acción realizada']);

    }

    /* funcion pára editar  */
    public function editar(Request $request, $id){

        /* validamos los valores antes de crear y en caso de que no tenga contenido le ponemos cero */
        $data = [ ];
        /* if ($request->post('') != "") { $data[''] = $request->post(''); } */

        if ($request->get('cuentaConstancia') != "") { $data['cuentaConstancia'] = $request->get('cuentaConstancia'); }
        if ($request->get('proporciono') != "") { $data['proporciono'] = $request->get('proporciono'); }
        if ($request->get('casoNo') != "") { $data['casoNo'] = $request->get('casoNo'); }
        if ($request->get('demandado') != "") { $data['demandado'] = $request->get('demandado'); }
        if ($request->get('actualmente') != "") { $data['actualmente'] = $request->get('actualmente'); }
        if ($request->get('estabilidad') != "") { $data['estabilidad'] = $request->get('estabilidad'); }
        if ($request->get('inactividad') != "") { $data['inactividad'] = $request->get('inactividad'); }
        if ($request->get('registoPatronal') != "") { $data['registoPatronal'] = $request->get('registoPatronal'); }
        if ($request->get('referenciayPeriodos') != "") { $data['referenciayPeriodos'] = $request->get('referenciayPeriodos'); }
        if ($request->get('dosEmpleos') != "") { $data['dosEmpleos'] = $request->get('dosEmpleos'); }
        if ($request->get('ausentismo') != "") { $data['ausentismo'] = $request->get('ausentismo'); }
        if ($request->get('abandono') != "") { $data['abandono'] = $request->get('abandono'); }
        if ($request->get('desempenoRegular') != "") { $data['desempenoRegular'] = $request->get('desempenoRegular'); }
        if ($request->get('omitio') != "") { $data['omitio'] = $request->get('omitio'); }
        if ($request->get('informacion') != "") { $data['informacion'] = $request->get('informacion'); }
        if ($request->get('referencias') != "") { $data['referencias'] = $request->get('referencias'); }
        if ($request->get('confiable') != "") { $data['confiable'] = $request->get('confiable'); }
        if ($request->get('comentarios') != "") { $data['comentarios'] = $request->get('comentarios'); }
        if ($request->get('notasLegales') != "") { $data['notasLegales'] = $request->get('notasLegales'); }

        if ($request->get('idEstudio') != "") { $data['idEstudio'] = $request->get('idEstudio'); }

        $data['idUsuario'] = session('email');

        // Actualizar el registro
        $updated = Investigacions::where('id', $id)->update($data);

        /* agregamos el accion */
        $accion = [ 'idUsuario' => session('email'), 'accion' => "Edicion de investigaciones", ];
        $acceso = Acciones::create($accion);

        return response()->json(['success' => true, 'message' => 'Registro editado correctamente.']);
    }

    /* eliminar registro */
    public function eliminar($id)  {
        $empresa = Investigacions::findOrFail($id); // Busca la empresa por ID
        $empresa->delete(); // Elimina la empresa
        /* agregamos el accion */
        $accion = [ 'idUsuario' => session('email'), 'accion' => "Eliminamos investigaciones ", ];
        $acceso = Acciones::create($accion);
        return response()->json(['success' => true, 'message' => 'Registro eliminada correctamente.']);
    }
}
