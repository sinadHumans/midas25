<?php

namespace App\Http\Controllers;

use App\Http\Requests\EstructurafamiliarStoreRequest;
use App\Http\Requests\EstructurafamiliarUpdateRequest;
use App\Models\Estructurafamiliar;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use App\Models\Acciones;

class EstructurafamiliarController extends Controller
{
     /* mostrar informacion por estudio */
     public function muestro($id){
        // Buscar registros con el idEstudio especificado
        $estudios = Estructurafamiliar::where('idEstudio', $id)->get();

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
        $data['familiar'] = !empty($request->post('familiar')) ? $request->post('familiar') : 0;
        $data['edad'] = !empty($request->post('edad')) ? $request->post('edad') : 0;
        $data['ocupacion'] = !empty($request->post('ocupacion')) ? $request->post('ocupacion') : 0;
        $data['laboraEstudia'] = !empty($request->post('laboraEstudia')) ? $request->post('laboraEstudia') : 0;
        $data['calle'] = !empty($request->post('calle')) ? $request->post('calle') : 0;
        $data['numero'] = !empty($request->post('numero')) ? $request->post('numero') : 0;
        $data['colonia'] = !empty($request->post('colonia')) ? $request->post('colonia') : 0;
        $data['delegacionMunicipio'] = !empty($request->post('delegacionMunicipio')) ? $request->post('delegacionMunicipio') : 0;
        $data['ciudad'] = !empty($request->post('ciudad')) ? $request->post('ciudad') : 0;
        $data['estado'] = !empty($request->post('estado')) ? $request->post('estado') : 0;
        $data['cpde'] = !empty($request->post('cpde')) ? $request->post('cpde') : 0;
        $data['tiempoReside'] = !empty($request->post('tiempoReside')) ? $request->post('tiempoReside') : 0;
        $data['tel1'] = !empty($request->post('tel1')) ? $request->post('tel1') : 0;
        $data['idUsuario'] = session('email');

        $user = Estructurafamiliar::create($data);
       /* agregamos el accion */
       $accion = [ 'idUsuario' => session('email'), 'accion' => "Creación de estructura familiar", ];
       $acceso = Acciones::create($accion);

       return response()->json(['message' => 'Acción realizada']);

    }

    /* funcion pára editar  */
    public function editar(Request $request, $id){

        /* validamos los valores antes de crear y en caso de que no tenga contenido le ponemos cero */
        $data = [ ];
        /* if ($request->post('') != "") { $data[''] = $request->post(''); } */

        if ($request->get('idEstudio') != "") { $data['idEstudio'] = $request->get('idEstudio'); }
        if ($request->get('familiar') != "") { $data['familiar'] = $request->get('familiar'); }
        if ($request->get('edad') != "") { $data['edad'] = $request->get('edad'); }
        if ($request->get('ocupacion') != "") { $data['ocupacion'] = $request->get('ocupacion'); }
        if ($request->get('laboraEstudia') != "") { $data['laboraEstudia'] = $request->get('laboraEstudia'); }
        if ($request->get('calle') != "") { $data['calle'] = $request->get('calle'); }
        if ($request->get('numero') != "") { $data['numero'] = $request->get('numero'); }
        if ($request->get('colonia') != "") { $data['colonia'] = $request->get('colonia'); }
        if ($request->get('delegacionMunicipio') != "") { $data['delegacionMunicipio'] = $request->get('delegacionMunicipio'); }
        if ($request->get('ciudad') != "") { $data['ciudad'] = $request->get('ciudad'); }
        if ($request->get('estado') != "") { $data['estado'] = $request->get('estado'); }
        if ($request->get('cpde') != "") { $data['cpde'] = $request->get('cpde'); }
        if ($request->get('tiempoReside') != "") { $data['tiempoReside'] = $request->get('tiempoReside'); }
        if ($request->get('tel1') != "") { $data['tel1'] = $request->get('tel1'); }
        $data['idUsuario'] = session('email');



        // Actualizar el registro
        $updated = Estructurafamiliar::where('id', $id)->update($data);

        /* agregamos el accion */
        $accion = [ 'idUsuario' => session('email'), 'accion' => "Edicion de estructura familiar", ];
        $acceso = Acciones::create($accion);

        return response()->json(['success' => true, 'message' => 'Registro editado correctamente.']);
    }

     /* eliminar registro */
     public function eliminar($id)  {
        $empresa = Estructurafamiliar::findOrFail($id); // Busca la empresa por ID
        $empresa->delete(); // Elimina la empresa
        /* agregamos el accion */
        $accion = [ 'idUsuario' => session('email'), 'accion' => "Eliminamos estructura familiar", ];
        $acceso = Acciones::create($accion);
        return response()->json(['success' => true, 'message' => 'Registro eliminada correctamente.']);
    }
}
