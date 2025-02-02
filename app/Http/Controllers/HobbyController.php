<?php

namespace App\Http\Controllers;

use App\Http\Requests\HobbyStoreRequest;
use App\Http\Requests\HobbyUpdateRequest;
use App\Models\Hobby;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use App\Models\Acciones;

class HobbyController extends Controller
{
    /* mostrar informacion por estudio */
    public function muestro($id){
        // Buscar registros con el idEstudio especificado
        $estudios = Hobby::where('idEstudio', $id)->get();

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
        $data['deportes'] = !empty($request->post('deportes')) ? $request->post('deportes') : 0;
        $data['cual'] = !empty($request->post('cual')) ? $request->post('cual') : 0;
        $data['frecuencia'] = !empty($request->post('frecuencia')) ? $request->post('frecuencia') : 0;
        $data['pasatiempos'] = !empty($request->post('pasatiempos')) ? $request->post('pasatiempos') : 0;
        $data['otros'] = !empty($request->post('otros')) ? $request->post('otros') : 0;

        $data['idUsuario'] = session('email');
        $user = Hobby::create($data);
    /* agregamos el accion */
    $accion = [ 'idUsuario' => session('email'), 'accion' => "Creación de hobyy", ];
    $acceso = Acciones::create($accion);

    return response()->json(['message' => 'Acción realizada']);

    }

    /* funcion pára editar  */
    public function editar(Request $request, $id){

        /* validamos los valores antes de crear y en caso de que no tenga contenido le ponemos cero */
        $data = [ ];
        /* if ($request->post('') != "") { $data[''] = $request->post(''); } */

        if ($request->get('idEstudio') != "") { $data['idEstudio'] = $request->get('idEstudio'); }
        if ($request->get('deportes') != "") { $data['deportes'] = $request->get('deportes'); }
        if ($request->get('cual') != "") { $data['cual'] = $request->get('cual'); }
        if ($request->get('frecuencia') != "") { $data['frecuencia'] = $request->get('frecuencia'); }
        if ($request->get('pasatiempos') != "") { $data['pasatiempos'] = $request->get('pasatiempos'); }
        if ($request->get('otros') != "") { $data['otros'] = $request->get('otros'); }

        $data['idUsuario'] = session('email');

        // Actualizar el registro
        $updated = Hobby::where('id', $id)->update($data);

        /* agregamos el accion */
        $accion = [ 'idUsuario' => session('email'), 'accion' => "Edicion de hobby ", ];
        $acceso = Acciones::create($accion);

        return response()->json(['success' => true, 'message' => 'Registro editado correctamente.']);
    }

    /* eliminar registro */
    public function eliminar($id)  {
        $empresa = Hobby::findOrFail($id); // Busca la empresa por ID
        $empresa->delete(); // Elimina la empresa
        /* agregamos el accion */
        $accion = [ 'idUsuario' => session('email'), 'accion' => "Eliminamos hobby", ];
        $acceso = Acciones::create($accion);
        return response()->json(['success' => true, 'message' => 'Registro eliminada correctamente.']);
    }
}
