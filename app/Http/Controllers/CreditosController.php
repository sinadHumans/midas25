<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreditosStoreRequest;
use App\Http\Requests\CreditosUpdateRequest;
use App\Models\Creditos;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use App\Models\Acciones;

class CreditosController extends Controller
{
    /* mostrar informacion por estudio */
    public function muestro($id){
        // Buscar registros con el idEstudio especificado
        $estudios = Creditos::where('idEstudio', $id)->get();

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
        $data['fecha'] = !empty($request->post('fecha')) ? $request->post('fecha') :0 ;
        $data['entidad'] = !empty($request->post('entidad')) ? $request->post('entidad') :0 ;
        $data['monto'] = !empty($request->post('monto')) ? $request->post('monto') :0 ;
        $data['total'] = !empty($request->post('total')) ? $request->post('total') :0 ;
        $data['estatus'] = !empty($request->post('estatus')) ? $request->post('estatus') :0 ;
        $data['comentario'] = !empty($request->post('comentario')) ? $request->post('comentario') :0 ;
        $data['endeudamiento'] = !empty($request->post('endeudamiento')) ? $request->post('endeudamiento') :0 ;
        $data['hipoteca'] = !empty($request->post('hipoteca')) ? $request->post('hipoteca') :0 ;
        $data['score'] = !empty($request->post('score')) ? $request->post('score') :0 ;
        $data['idEstudio'] = !empty($request->post('idEstudio')) ? $request->post('idEstudio') :0 ;

        $data['idUsuario'] = session('email');
        $user = Creditos::create($data);
        /* agregamos el accion */
        $accion = [ 'idUsuario' => session('email'), 'accion' => "Creación de  credito", ];
        $acceso = Acciones::create($accion);

        return response()->json(['message' => 'Acción realizada']);

    }

    /* funcion pára editar  */
    public function editar(Request $request, $id){

        /* validamos los valores antes de crear y en caso de que no tenga contenido le ponemos cero */
        $data = [ ];
        /* if ($request->post('') != "") { $data[''] = $request->post(''); } */

        if ($request->get('fecha') != "") {$data['fecha'] = $request->get('fecha');}
        if ($request->get('entidad') != "") {$data['entidad'] = $request->get('entidad');}
        if ($request->get('monto') != "") {$data['monto'] = $request->get('monto');}
        if ($request->get('total') != "") {$data['total'] = $request->get('total');}
        if ($request->get('estatus') != "") {$data['estatus'] = $request->get('estatus');}
        if ($request->get('comentario') != "") {$data['comentario'] = $request->get('comentario');}
        if ($request->get('endeudamiento') != "") {$data['endeudamiento'] = $request->get('endeudamiento');}
        if ($request->get('hipoteca') != "") {$data['hipoteca'] = $request->get('hipoteca');}
        if ($request->get('score') != "") {$data['score'] = $request->get('score');}
        if ($request->get('idEstudio') != "") {$data['idEstudio'] = $request->get('idEstudio');}


        $data['idUsuario'] = session('email');

        // Actualizar el registro
        $updated = Creditos::where('id', $id)->update($data);

        /* agregamos el accion */
        $accion = [ 'idUsuario' => session('email'), 'accion' => "Edicion de  credito ", ];
        $acceso = Acciones::create($accion);

        return response()->json(['success' => true, 'message' => 'Registro editado correctamente.']);
    }

    /* eliminar registro */
    public function eliminar($id)  {
        $empresa = Creditos::findOrFail($id); // Busca la empresa por ID
        $empresa->delete(); // Elimina la empresa
        /* agregamos el accion */
        $accion = [ 'idUsuario' => session('email'), 'accion' => "Eliminamos credito ", ];
        $acceso = Acciones::create($accion);
        return response()->json(['success' => true, 'message' => 'Registro eliminada correctamente.']);
    }
}
