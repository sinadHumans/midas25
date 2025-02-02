<?php

namespace App\Http\Controllers;

use App\Http\Requests\ConclusionesStoreRequest;
use App\Http\Requests\ConclusionesUpdateRequest;
use App\Models\Conclusiones;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use App\Models\Acciones;

class ConclusionesController extends Controller
{
    /* mostrar informacion por estudio */
    public function muestro($id){
        // Buscar registros con el idEstudio especificado
        $estudios = Conclusiones::where('idEstudio', $id)->get();

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
        $data['acercaCandidato'] = !empty($request->post('acercaCandidato')) ? $request->post('acercaCandidato') :0;
        $data['acercaFamilia'] = !empty($request->post('acercaFamilia')) ? $request->post('acercaFamilia') :0;
        $data['conclucionesEntrevistador'] = !empty($request->post('conclucionesEntrevistador')) ? $request->post('conclucionesEntrevistador') :0;
        $data['participacion'] = !empty($request->post('participacion')) ? $request->post('participacion') :0;
        $data['entorno'] = !empty($request->post('entorno')) ? $request->post('entorno') :0;
        $data['referencias'] = !empty($request->post('referencias')) ? $request->post('referencias') :0;
        $data['comentariosGenerales'] = !empty($request->post('comentariosGenerales')) ? $request->post('comentariosGenerales') :0;
        $data['analisisVerificacion'] = !empty($request->post('analisisVerificacion')) ? $request->post('analisisVerificacion') :0;
        $data['atendio'] = !empty($request->post('atendio')) ? $request->post('atendio') :0;
        $data['presento'] = !empty($request->post('presento')) ? $request->post('presento') :0;
        $data['documentacionCompartida'] = !empty($request->post('documentacionCompartida')) ? $request->post('documentacionCompartida') :0;
        $data['referenciasPersonales'] = !empty($request->post('referenciasPersonales')) ? $request->post('referenciasPersonales') :0;
        $data['estatusfinal'] = !empty($request->post('estatusfinal')) ? $request->post('estatusfinal') :0;

        $data['idEstudio'] = !empty($request->post('idEstudio')) ? $request->post('idEstudio') : 0;

        $data['idUsuario'] = session('email');
        $user = Conclusiones::create($data);
    /* agregamos el accion */
    $accion = [ 'idUsuario' => session('email'), 'accion' => "Creación de concluciones", ];
    $acceso = Acciones::create($accion);

    return response()->json(['message' => 'Acción realizada']);

    }

    /* funcion pára editar  */
    public function editar(Request $request, $id){

        /* validamos los valores antes de crear y en caso de que no tenga contenido le ponemos cero */
        $data = [ ];
        /* if ($request->post('') != "") { $data[''] = $request->post(''); } */

        if($request->get('acercaCandidato') != "") { $data['acercaCandidato'] = $request->get('acercaCandidato');}
        if($request->get('acercaFamilia') != "") { $data['acercaFamilia'] = $request->get('acercaFamilia');}
        if($request->get('conclucionesEntrevistador') != "") { $data['conclucionesEntrevistador'] = $request->get('conclucionesEntrevistador');}
        if($request->get('participacion') != "") { $data['participacion'] = $request->get('participacion');}
        if($request->get('entorno') != "") { $data['entorno'] = $request->get('entorno');}
        if($request->get('referencias') != "") { $data['referencias'] = $request->get('referencias');}
        if($request->get('comentariosGenerales') != "") { $data['comentariosGenerales'] = $request->get('comentariosGenerales');}
        if($request->get('analisisVerificacion') != "") { $data['analisisVerificacion'] = $request->get('analisisVerificacion');}
        if($request->get('atendio') != "") { $data['atendio'] = $request->get('atendio');}
        if($request->get('presento') != "") { $data['presento'] = $request->get('presento');}
        if($request->get('documentacionCompartida') != "") { $data['documentacionCompartida'] = $request->get('documentacionCompartida');}
        if($request->get('referenciasPersonales') != "") { $data['referenciasPersonales'] = $request->get('referenciasPersonales');}
        if($request->get('estatusfinal') != "") { $data['estatusfinal'] = $request->get('estatusfinal');}

        if ($request->get('idEstudio') != "") { $data['idEstudio'] = $request->get('idEstudio'); }

        $data['idUsuario'] = session('email');

        // Actualizar el registro
        $updated = Conclusiones::where('id', $id)->update($data);

        /* agregamos el accion */
        $accion = [ 'idUsuario' => session('email'), 'accion' => "Edicion de concluciones", ];
        $acceso = Acciones::create($accion);

        return response()->json(['success' => true, 'message' => 'Registro editado correctamente.']);
    }

    /* eliminar registro */
    public function eliminar($id)  {
        $empresa = Conclusiones::findOrFail($id); // Busca la empresa por ID
        $empresa->delete(); // Elimina la empresa
        /* agregamos el accion */
        $accion = [ 'idUsuario' => session('email'), 'accion' => "Eliminamos concluciones ", ];
        $acceso = Acciones::create($accion);
        return response()->json(['success' => true, 'message' => 'Registro eliminada correctamente.']);
    }
}
