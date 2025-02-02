<?php

namespace App\Http\Controllers;

use App\Http\Requests\DocumentacionStoreRequest;
use App\Http\Requests\DocumentacionUpdateRequest;
use App\Models\Documentacion;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use App\Models\Acciones;

class DocumentacionController extends Controller
{
    /* mostrar informacion por estudio */
    public function muestro($id){
        // Buscar registros con el idEstudio especificado
        $estudios = Documentacion::where('idEstudio', $id)->get();

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
        $data['idUsuario'] = session('email');
        $data['idEstudio'] = !empty($request->post('idEstudio')) ? $request->post('idEstudio') : 0;
        $data['titulo'] = !empty($request->post('titulo')) ? $request->post('titulo') : 0;
        $data['folio'] = !empty($request->post('folio')) ? $request->post('folio') : 0;
        $data['observaciones'] = !empty($request->post('observaciones')) ? $request->post('observaciones') : 0;
        $data['archivo'] = !empty($request->post('archivo')) ? $request->post('archivo') : 0;
        $data['seccion'] = !empty($request->post('seccion')) ? $request->post('seccion') : 0;
        $data['tipo'] = !empty($request->post('tipo')) ? $request->post('tipo') : 0;

        $user = Documentacion::create($data);
       /* agregamos el accion */
       $accion = [ 'idUsuario' => session('email'), 'accion' => "Creación de documento", ];
       $acceso = Acciones::create($accion);

       return response()->json(['message' => 'Acción realizada']);

    }

    /* funcion pára editar  */
    public function editar(Request $request, $id){

        /* validamos los valores antes de crear y en caso de que no tenga contenido le ponemos cero */
        $data = [ ];
        /* if ($request->post('') != "") { $data[''] = $request->post(''); } */

        if ($request->get('titulo') != "") { $data['titulo'] = $request->get('titulo'); }
        if ($request->get('folio') != "") { $data['folio'] = $request->get('folio'); }
        if ($request->get('observaciones') != "") { $data['observaciones'] = $request->get('observaciones'); }
        if ($request->get('archivo') != "") { $data['archivo'] = $request->get('archivo'); }
        if ($request->get('seccion') != "") { $data['seccion'] = $request->get('seccion'); }
        if ($request->get('tipo') != "") { $data[''] = $request->get('tipo'); }

        // Actualizar el registro
        $updated = Documentacion::where('id', $id)->update($data);

        /* agregamos el accion */
        $accion = [ 'idUsuario' => session('email'), 'accion' => "Edicion de documento", ];
        $acceso = Acciones::create($accion);

        return response()->json(['success' => true, 'message' => 'Registro editado correctamente.']);
    }

     /* eliminar registro */
     public function eliminar($id)  {
        $empresa = Documentacion::findOrFail($id); // Busca la empresa por ID
        $empresa->delete(); // Elimina la empresa
        /* agregamos el accion */
        $accion = [ 'idUsuario' => session('email'), 'accion' => "Eliminamos documento", ];
        $acceso = Acciones::create($accion);
        return response()->json(['success' => true, 'message' => 'Registro eliminada correctamente.']);
    }

}
