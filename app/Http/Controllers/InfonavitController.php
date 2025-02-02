<?php

namespace App\Http\Controllers;

use App\Http\Requests\InfonavitStoreRequest;
use App\Http\Requests\InfonavitUpdateRequest;
use App\Models\Infonavit;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use App\Models\Acciones;

class InfonavitController extends Controller
{
    /* mostrar informacion por estudio */
    public function muestro($id){
        // Buscar registros con el idEstudio especificado
        $estudios = Infonavit::where('idEstudio', $id)->get();

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
        $data['estatus'] = !empty($request->post('estatus')) ? $request->post('estatus') :0 ;
        $data['puntos'] = !empty($request->post('puntos')) ? $request->post('puntos') :0 ;
        $data['subcuenta'] = !empty($request->post('subcuenta')) ? $request->post('subcuenta') :0 ;
        $data['maximo'] = !empty($request->post('maximo')) ? $request->post('maximo') :0 ;
        $data['hipoteca'] = !empty($request->post('hipoteca')) ? $request->post('hipoteca') :0 ;
        $data['idEstudio'] = !empty($request->post('idEstudio')) ? $request->post('idEstudio') :0 ;

        $data['idUsuario'] = session('email');
        $user = Infonavit::create($data);
        /* agregamos el accion */
        $accion = [ 'idUsuario' => session('email'), 'accion' => "Creación de  Infonavit", ];
        $acceso = Acciones::create($accion);

        return response()->json(['message' => 'Acción realizada']);

    }

    /* funcion pára editar  */
    public function editar(Request $request, $id){

        /* validamos los valores antes de crear y en caso de que no tenga contenido le ponemos cero */
        $data = [ ];
        /* if ($request->post('') != "") { $data[''] = $request->post(''); } */

        if ($request->get('estatus') != "") {$data['estatus'] = $request->get('estatus');}
        if ($request->get('puntos') != "") {$data['puntos'] = $request->get('puntos');}
        if ($request->get('subcuenta') != "") {$data['subcuenta'] = $request->get('subcuenta');}
        if ($request->get('maximo') != "") {$data['maximo'] = $request->get('maximo');}
        if ($request->get('hipoteca') != "") {$data['hipoteca'] = $request->get('hipoteca');}
        if ($request->get('idEstudio') != "") {$data['idEstudio'] = $request->get('idEstudio');}


        $data['idUsuario'] = session('email');

        // Actualizar el registro
        $updated = Infonavit::where('id', $id)->update($data);

        /* agregamos el accion */
        $accion = [ 'idUsuario' => session('email'), 'accion' => "Edicion de  Infonavit ", ];
        $acceso = Acciones::create($accion);

        return response()->json(['success' => true, 'message' => 'Registro editado correctamente.']);
    }

    /* eliminar registro */
    public function eliminar($id)  {
        $empresa = Infonavit::findOrFail($id); // Busca la empresa por ID
        $empresa->delete(); // Elimina la empresa
        /* agregamos el accion */
        $accion = [ 'idUsuario' => session('email'), 'accion' => "Eliminamos Infonavit ", ];
        $acceso = Acciones::create($accion);
        return response()->json(['success' => true, 'message' => 'Registro eliminada correctamente.']);
    }
}
