<?php

namespace App\Http\Controllers;

use App\Http\Requests\RedesStoreRequest;
use App\Http\Requests\RedesUpdateRequest;
use App\Models\Redes;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use App\Models\Acciones;

class RedesController extends Controller
{
    /* mostrar informacion por estudio */
    public function muestro($id){
        // Buscar registros con el idEstudio especificado
        $estudios = Redes::where('idEstudio', $id)->get();

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
        $data['facebook'] = !empty($request->post('facebook')) ? $request->post('facebook') : 0;
        $data['twitter'] = !empty($request->post('twitter')) ? $request->post('twitter') : 0;
        $data['instagram'] = !empty($request->post('instagram')) ? $request->post('instagram') : 0;
        $data['linkedin'] = !empty($request->post('linkedin')) ? $request->post('linkedin') : 0;
        $data['idUsuario'] = session('email');
        $user = Redes::create($data);
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
        if ($request->get('facebook') != "") { $data['facebook'] = $request->get('facebook'); }
        if ($request->get('twitter') != "") { $data['twitter'] = $request->get('twitter'); }
        if ($request->get('instagram') != "") { $data['instagram'] = $request->get('instagram'); }
        if ($request->get('linkedin') != "") { $data['linkedin'] = $request->get('linkedin'); }

        $data['idUsuario'] = session('email');



        // Actualizar el registro
        $updated = Redes::where('id', $id)->update($data);

        /* agregamos el accion */
        $accion = [ 'idUsuario' => session('email'), 'accion' => "Edicion de redes", ];
        $acceso = Acciones::create($accion);

        return response()->json(['success' => true, 'message' => 'Registro editado correctamente.']);
    }

     /* eliminar registro */
     public function eliminar($id)  {
        $empresa = Redes::findOrFail($id); // Busca la empresa por ID
        $empresa->delete(); // Elimina la empresa
        /* agregamos el accion */
        $accion = [ 'idUsuario' => session('email'), 'accion' => "Eliminamos redes", ];
        $acceso = Acciones::create($accion);
        return response()->json(['success' => true, 'message' => 'Registro eliminada correctamente.']);
    }
}
