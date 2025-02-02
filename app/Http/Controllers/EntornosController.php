<?php

namespace App\Http\Controllers;

use App\Http\Requests\EntornosStoreRequest;
use App\Http\Requests\EntornosUpdateRequest;
use App\Models\Entornos;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use App\Models\Acciones;

class EntornosController extends Controller
{
     /* mostrar informacion por estudio */
    public function muestro($id){
        // Buscar registros con el idEstudio especificado
        $estudios = Entornos::where('idEstudio', $id)->get();

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
        $data['comentarios'] = !empty($request->post('comentarios')) ? $request->post('comentarios') : 0;
        $data['tiempoVivir'] = !empty($request->post('tiempoVivir')) ? $request->post('tiempoVivir') : 0;
        $data['calle'] = !empty($request->post('calle')) ? $request->post('calle') : 0;
        $data['numero'] = !empty($request->post('numero')) ? $request->post('numero') : 0;
        $data['interior'] = !empty($request->post('interior')) ? $request->post('interior') : 0;
        $data['colonia'] = !empty($request->post('colonia')) ? $request->post('colonia') : 0;
        $data['entre'] = !empty($request->post('entre')) ? $request->post('entre') : 0;
        $data['delegacionMunicpio'] = !empty($request->post('delegacionMunicpio')) ? $request->post('delegacionMunicpio') : 0;
        $data['estado'] = !empty($request->post('estado')) ? $request->post('estado') : 0;
        $data['cp'] = !empty($request->post('cp')) ? $request->post('cp') : 0;
        $data['color'] = !empty($request->post('color')) ? $request->post('color') : 0;
        $data['tipo'] = !empty($request->post('tipo')) ? $request->post('tipo') : 0;
        $data['dondeEs'] = !empty($request->post('dondeEs')) ? $request->post('dondeEs') : 0;
        $data['ubicacion'] = !empty($request->post('ubicacion')) ? $request->post('ubicacion') : 0;

        $data['idEstudio'] = !empty($request->post('idEstudio')) ? $request->post('idEstudio') : 0;

        $data['idUsuario'] = session('email');
        $user = Entornos::create($data);
    /* agregamos el accion */
    $accion = [ 'idUsuario' => session('email'), 'accion' => "Creación de entorno", ];
    $acceso = Acciones::create($accion);

    return response()->json(['message' => 'Acción realizada']);

    }

    /* funcion pára editar  */
    public function editar(Request $request, $id){

        /* validamos los valores antes de crear y en caso de que no tenga contenido le ponemos cero */
        $data = [ ];
        /* if ($request->post('') != "") { $data[''] = $request->post(''); } */

        if ($request->get('comentarios') != "") { $data['comentarios'] = $request->get('comentarios');}
        if ($request->get('tiempoVivir') != "") { $data['tiempoVivir'] = $request->get('tiempoVivir');}
        if ($request->get('calle') != "") { $data['calle'] = $request->get('calle');}
        if ($request->get('numero') != "") { $data['numero'] = $request->get('numero');}
        if ($request->get('interior') != "") { $data['interior'] = $request->get('interior');}
        if ($request->get('colonia') != "") { $data['colonia'] = $request->get('colonia');}
        if ($request->get('entre') != "") { $data['entre'] = $request->get('entre');}
        if ($request->get('delegacionMunicpio') != "") { $data['delegacionMunicpio'] = $request->get('delegacionMunicpio');}
        if ($request->get('estado') != "") { $data['estado'] = $request->get('estado');}
        if ($request->get('cp') != "") { $data['cp'] = $request->get('cp');}
        if ($request->get('color') != "") { $data['color'] = $request->get('color');}
        if ($request->get('tipo') != "") { $data['tipo'] = $request->get('tipo');}
        if ($request->get('dondeEs') != "") { $data['dondeEs'] = $request->get('dondeEs');}
        if ($request->get('ubicacion') != "") { $data['ubicacion'] = $request->get('ubicacion');}

        if ($request->get('idEstudio') != "") { $data['idEstudio'] = $request->get('idEstudio'); }

        $data['idUsuario'] = session('email');

        // Actualizar el registro
        $updated = Entornos::where('id', $id)->update($data);

        /* agregamos el accion */
        $accion = [ 'idUsuario' => session('email'), 'accion' => "Edicion de entorno", ];
        $acceso = Acciones::create($accion);

        return response()->json(['success' => true, 'message' => 'Registro editado correctamente.']);
    }

    /* eliminar registro */
    public function eliminar($id)  {
        $empresa = Entornos::findOrFail($id); // Busca la empresa por ID
        $empresa->delete(); // Elimina la empresa
        /* agregamos el accion */
        $accion = [ 'idUsuario' => session('email'), 'accion' => "Eliminamos entorno ", ];
        $acceso = Acciones::create($accion);
        return response()->json(['success' => true, 'message' => 'Registro eliminada correctamente.']);
    }
}
