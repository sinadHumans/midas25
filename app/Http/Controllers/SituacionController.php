<?php

namespace App\Http\Controllers;

use App\Http\Requests\SituacionStoreRequest;
use App\Http\Requests\SituacionUpdateRequest;
use App\Models\Situacion;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use App\Models\Acciones;


class SituacionController extends Controller
{
    /* mostrar informacion por estudio */
    public function muestro($id){
        // Buscar registros con el idEstudio especificado
        $estudios = Situacion::where('idEstudio', $id)->get();

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
        $data['nombre'] = !empty($request->post('nombre')) ? $request->post('nombre') : 0;
        $data['parentesco'] = !empty($request->post('parentesco')) ? $request->post('parentesco') : 0;
        $data['salario'] = !empty($request->post('salario')) ? $request->post('salario') : 0;
        $data['ingreso'] = !empty($request->post('ingreso')) ? $request->post('ingreso') : 0;
        $data['concepto'] = !empty($request->post('concepto')) ? $request->post('concepto') : 0;
        $data['egresos'] = !empty($request->post('egresos')) ? $request->post('egresos') : 0;
        $data['observaciones'] = !empty($request->post('observaciones')) ? $request->post('observaciones') : 0;
        $data['superavit'] = !empty($request->post('superavit')) ? $request->post('superavit') : 0;

        $data['idUsuario'] = session('email');
        $user = Situacion::create($data);
       /* agregamos el accion */
       $accion = [ 'idUsuario' => session('email'), 'accion' => "Creación de situacion", ];
       $acceso = Acciones::create($accion);

       return response()->json(['message' => 'Acción realizada']);

    }

    /* funcion pára editar  */
    public function editar(Request $request, $id){

        /* validamos los valores antes de crear y en caso de que no tenga contenido le ponemos cero */
        $data = [ ];
        /* if ($request->post('') != "") { $data[''] = $request->post(''); } */

        if ($request->post('idEstudio') != "") { $data['idEstudio'] = $request->post('idEstudio'); }
        if ($request->post('nombre') != "") { $data['nombre'] = $request->post('nombre'); }
        if ($request->post('parentesco') != "") { $data['parentesco'] = $request->post('parentesco'); }
        if ($request->post('salario') != "") { $data['salario'] = $request->post('salario'); }
        if ($request->post('ingreso') != "") { $data['ingreso'] = $request->post('ingreso'); }
        if ($request->post('concepto') != "") { $data['concepto'] = $request->post('concepto'); }
        if ($request->post('egresos') != "") { $data['egresos'] = $request->post('egresos'); }
        if ($request->post('observaciones') != "") { $data['observaciones'] = $request->post('observaciones'); }
        if ($request->post('superavit') != "") { $data['superavit'] = $request->post('superavit'); }

        $data['idUsuario'] = session('email');

        // Actualizar el registro
        $updated = Situacion::where('id', $id)->update($data);

        /* agregamos el accion */
        $accion = [ 'idUsuario' => session('email'), 'accion' => "Edicion de situacion", ];
        $acceso = Acciones::create($accion);

        return response()->json(['success' => true, 'message' => 'Registro editado correctamente.']);
    }

     /* eliminar registro */
     public function eliminar($id)  {
        $empresa = Situacion::findOrFail($id); // Busca la empresa por ID
        $empresa->delete(); // Elimina la empresa
        /* agregamos el accion */
        $accion = [ 'idUsuario' => session('email'), 'accion' => "Eliminamos situacion", ];
        $acceso = Acciones::create($accion);
        return response()->json(['success' => true, 'message' => 'Registro eliminada correctamente.']);
    }
}
