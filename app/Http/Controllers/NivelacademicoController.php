<?php

namespace App\Http\Controllers;

use App\Http\Requests\NivelacademicoStoreRequest;
use App\Http\Requests\NivelacademicoUpdateRequest;
use App\Models\Nivelacademico;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use App\Models\Acciones;

class NivelacademicoController extends Controller
{
    /* mostrar informacion por estudio */
    public function muestro($id){
        // Buscar registros con el idEstudio especificado
        $estudios = Nivelacademico::where('idEstudio', $id)->get();

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
        $data['periodo'] = !empty($request->post('periodo')) ? $request->post('periodo') : 0;
        $data['profesional'] = !empty($request->post('profesional')) ? $request->post('profesional') : 0;
        $data['cedula'] = !empty($request->post('cedula')) ? $request->post('cedula') : 0;
        $data['especialidad'] = !empty($request->post('especialidad')) ? $request->post('especialidad') : 0;
        $data['caso'] = !empty($request->post('caso')) ? $request->post('caso') : 0;
        $data['idEstudio'] = !empty($request->post('idEstudio')) ? $request->post('idEstudio') : 0;
        $data['otros'] = !empty($request->post('otros')) ? $request->post('otros') : 0;

        $data['idUsuario'] = session('email');
        $user = Nivelacademico::create($data);
    /* agregamos el accion */
    $accion = [ 'idUsuario' => session('email'), 'accion' => "Creación de nivel academico", ];
    $acceso = Acciones::create($accion);

    return response()->json(['message' => 'Acción realizada']);

    }

    /* funcion pára editar  */
    public function editar(Request $request, $id){

        /* validamos los valores antes de crear y en caso de que no tenga contenido le ponemos cero */
        $data = [ ];
        /* if ($request->post('') != "") { $data[''] = $request->post(''); } */

        if ($request->get('ultimo') != "") { $data['ultimo'] = $request->get('ultimo'); }
        if ($request->get('periodo') != "") { $data['periodo'] = $request->get('periodo'); }
        if ($request->get('profesional') != "") { $data['profesional'] = $request->get('profesional'); }
        if ($request->get('cedula') != "") { $data['cedula'] = $request->get('cedula'); }
        if ($request->get('especialidad') != "") { $data['especialidad'] = $request->get('especialidad'); }
        if ($request->get('caso') != "") { $data['caso'] = $request->get('caso'); }
        if ($request->get('idEstudio') != "") { $data['idEstudio'] = $request->get('idEstudio'); }
        if ($request->get('otros') != "") { $data['otros'] = $request->get('otros'); }

        $data['idUsuario'] = session('email');

        // Actualizar el registro
        $updated = Nivelacademico::where('id', $id)->update($data);

        /* agregamos el accion */
        $accion = [ 'idUsuario' => session('email'), 'accion' => "Edicion de nivel academico ", ];
        $acceso = Acciones::create($accion);

        return response()->json(['success' => true, 'message' => 'Registro editado correctamente.']);
    }

    /* eliminar registro */
    public function eliminar($id)  {
        $empresa = Nivelacademico::findOrFail($id); // Busca la empresa por ID
        $empresa->delete(); // Elimina la empresa
        /* agregamos el accion */
        $accion = [ 'idUsuario' => session('email'), 'accion' => "Eliminamos nivel academico", ];
        $acceso = Acciones::create($accion);
        return response()->json(['success' => true, 'message' => 'Registro eliminada correctamente.']);
    }
}
