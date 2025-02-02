<?php

namespace App\Http\Controllers;

use App\Http\Requests\ConductasocialStoreRequest;
use App\Http\Requests\ConductasocialUpdateRequest;
use App\Models\Conductasocial;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use App\Models\Acciones;

class ConductasocialController extends Controller
{
    /* mostrar informacion por estudio */
    public function muestro($id){
        // Buscar registros con el idEstudio especificado
        $estudios = Conductasocial::where('idEstudio', $id)->get();

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
        $data['quienEstuvo'] = !empty($request->post('quienEstuvo')) ? $request->post('quienEstuvo') : 0;
        $data['conductaEntrevistado'] = !empty($request->post('conductaEntrevistado')) ? $request->post('conductaEntrevistado') : 0;
        $data['relacionVecinos'] = !empty($request->post('relacionVecinos')) ? $request->post('relacionVecinos') : 0;
        $data['pertenecegrupo'] = !empty($request->post('pertenecegrupo')) ? $request->post('pertenecegrupo') : 0;
        $data['problemasLegales'] = !empty($request->post('problemasLegales')) ? $request->post('problemasLegales') : 0;
        $data['familiarRecluido'] = !empty($request->post('familiarRecluido')) ? $request->post('familiarRecluido') : 0;
        $data['familiaresAdentro'] = !empty($request->post('familiaresAdentro')) ? $request->post('familiaresAdentro') : 0;

        $data['idUsuario'] = session('email');
        $user = Conductasocial::create($data);
       /* agregamos el accion */
       $accion = [ 'idUsuario' => session('email'), 'accion' => "Creación de redes", ];
       $acceso = Acciones::create($accion);

       return response()->json(['message' => 'Acción realizada']);

    }

    /* funcion pára editar  */
    public function editar(Request $request, $id){

        /* validamos los valores antes de crear y en caso de que no tenga contenido le ponemos cero */
        $data = [ ];
        /* if ($request->post('') != "") { $data[''] = $request->post(''); } */

        if ($request->get('idEstudio') != "") { $data['idEstudio'] = $request->get('idEstudio'); }
        if ($request->get('quienEstuvo') != "") { $data['quienEstuvo'] = $request->get('quienEstuvo'); }
        if ($request->get('conductaEntrevistado') != "") { $data['conductaEntrevistado'] = $request->get('conductaEntrevistado'); }
        if ($request->get('relacionVecinos') != "") { $data['relacionVecinos'] = $request->get('relacionVecinos'); }
        if ($request->get('pertenecegrupo') != "") { $data['pertenecegrupo'] = $request->get('pertenecegrupo'); }
        if ($request->get('problemasLegales') != "") { $data['problemasLegales'] = $request->get('problemasLegales'); }
        if ($request->get('familiarRecluido') != "") { $data['familiarRecluido'] = $request->get('familiarRecluido'); }
        if ($request->get('familiaresAdentro') != "") { $data['familiaresAdentro'] = $request->get('familiaresAdentro'); }

        $data['idUsuario'] = session('email');

        // Actualizar el registro
        $updated = Conductasocial::where('id', $id)->update($data);

        /* agregamos el accion */
        $accion = [ 'idUsuario' => session('email'), 'accion' => "Edicion de conducta", ];
        $acceso = Acciones::create($accion);

        return response()->json(['success' => true, 'message' => 'Registro editado correctamente.']);
    }

     /* eliminar registro */
     public function eliminar($id)  {
        $empresa = Conductasocial::findOrFail($id); // Busca la empresa por ID
        $empresa->delete(); // Elimina la empresa
        /* agregamos el accion */
        $accion = [ 'idUsuario' => session('email'), 'accion' => "Eliminamos conducta", ];
        $acceso = Acciones::create($accion);
        return response()->json(['success' => true, 'message' => 'Registro eliminada correctamente.']);
    }
}
