<?php

namespace App\Http\Controllers;

use App\Http\Requests\ServiciomedicoStoreRequest;
use App\Http\Requests\ServiciomedicoUpdateRequest;
use App\Models\Serviciomedico;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use App\Models\Acciones;

class ServiciomedicoController extends Controller
{
   /* mostrar informacion por estudio */
   public function muestro($id){
        // Buscar registros con el idEstudio especificado
        $estudios = Serviciomedico::where('idEstudio', $id)->get();

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

        $data['infonavit'] = !empty($request->post('infonavit')) ? $request->post('infonavit') :0;
        $data['clinicai'] = !empty($request->post('clinicai')) ? $request->post('clinicai') :0;
        $data['incidentei'] = !empty($request->post('incidentei')) ? $request->post('incidentei') :0;
        $data['tipoi'] = !empty($request->post('tipoi')) ? $request->post('tipoi') :0;
        $data['imss'] = !empty($request->post('imss')) ? $request->post('imss') :0;
        $data['clinicaim'] = !empty($request->post('clinicaim')) ? $request->post('clinicaim') :0;
        $data['incidenteim'] = !empty($request->post('incidenteim')) ? $request->post('incidenteim') :0;
        $data['tipoim'] = !empty($request->post('tipoim')) ? $request->post('tipoim') :0;
        $data['issste'] = !empty($request->post('issste')) ? $request->post('issste') :0;
        $data['clinicais'] = !empty($request->post('clinicais')) ? $request->post('clinicais') :0;
        $data['incidenteis'] = !empty($request->post('incidenteis')) ? $request->post('incidenteis') :0;
        $data['tipois'] = !empty($request->post('tipois')) ? $request->post('tipois') :0;
        $data['seguro'] = !empty($request->post('seguro')) ? $request->post('seguro') :0;
        $data['clinicase'] = !empty($request->post('clinicase')) ? $request->post('clinicase') :0;
        $data['incidentese'] = !empty($request->post('incidentese')) ? $request->post('incidentese') :0;
        $data['tipose'] = !empty($request->post('tipose')) ? $request->post('tipose') :0;
        $data['privado'] = !empty($request->post('privado')) ? $request->post('privado') :0;
        $data['aseguradora'] = !empty($request->post('aseguradora')) ? $request->post('aseguradora') :0;
        $data['incidentepri'] = !empty($request->post('incidentepri')) ? $request->post('incidentepri') :0;
        $data['tipopri'] = !empty($request->post('tipopri')) ? $request->post('tipopri') :0;
        $data['issemym'] = !empty($request->post('issemym')) ? $request->post('issemym') :0;
        $data['clinicaisse'] = !empty($request->post('clinicaisse')) ? $request->post('clinicaisse') :0;
        $data['incidenteisse'] = !empty($request->post('incidenteisse')) ? $request->post('incidenteisse') :0;
        $data['tipoisse'] = !empty($request->post('tipoisse')) ? $request->post('tipoisse') :0;
        $data['idEstudio'] = !empty($request->post('idEstudio')) ? $request->post('idEstudio') :0;
        $data['notiene'] = !empty($request->post('notiene')) ? $request->post('notiene') :0;

        $data['idUsuario'] = session('email');
        $user = Serviciomedico::create($data);
        /* agregamos el accion */
        $accion = [ 'idUsuario' => session('email'), 'accion' => "Creación de Servicio medico", ];
        $acceso = Acciones::create($accion);

        return response()->json(['message' => 'Acción realizada']);

    }

    /* funcion pára editar  */
    public function editar(Request $request, $id){

        /* validamos los valores antes de crear y en caso de que no tenga contenido le ponemos cero */
        $data = [ ];
        /* if ($request->post('') != "") { $data[''] = $request->post(''); } */

        if ($request->get('infonavit') != "") { $data['infonavit'] = $request->get('infonavit');}
        if ($request->get('clinicai') != "") { $data['clinicai'] = $request->get('clinicai');}
        if ($request->get('incidentei') != "") { $data['incidentei'] = $request->get('incidentei');}
        if ($request->get('tipoi') != "") { $data['tipoi'] = $request->get('tipoi');}
        if ($request->get('imss') != "") { $data['imss'] = $request->get('imss');}
        if ($request->get('clinicaim') != "") { $data['clinicaim'] = $request->get('clinicaim');}
        if ($request->get('incidenteim') != "") { $data['incidenteim'] = $request->get('incidenteim');}
        if ($request->get('tipoim') != "") { $data['tipoim'] = $request->get('tipoim');}
        if ($request->get('issste') != "") { $data['issste'] = $request->get('issste');}
        if ($request->get('clinicais') != "") { $data['clinicais'] = $request->get('clinicais');}
        if ($request->get('incidenteis') != "") { $data['incidenteis'] = $request->get('incidenteis');}
        if ($request->get('tipois') != "") { $data['tipois'] = $request->get('tipois');}
        if ($request->get('seguro') != "") { $data['seguro'] = $request->get('seguro');}
        if ($request->get('clinicase') != "") { $data['clinicase'] = $request->get('clinicase');}
        if ($request->get('incidentese') != "") { $data['incidentese'] = $request->get('incidentese');}
        if ($request->get('tipose') != "") { $data['tipose'] = $request->get('tipose');}
        if ($request->get('privado') != "") { $data['privado'] = $request->get('privado');}
        if ($request->get('aseguradora') != "") { $data['aseguradora'] = $request->get('aseguradora');}
        if ($request->get('incidentepri') != "") { $data['incidentepri'] = $request->get('incidentepri');}
        if ($request->get('tipopri') != "") { $data['tipopri'] = $request->get('tipopri');}
        if ($request->get('issemym') != "") { $data['issemym'] = $request->get('issemym');}
        if ($request->get('clinicaisse') != "") { $data['clinicaisse'] = $request->get('clinicaisse');}
        if ($request->get('incidenteisse') != "") { $data['incidenteisse'] = $request->get('incidenteisse');}
        if ($request->get('tipoisse') != "") { $data['tipoisse'] = $request->get('tipoisse');}
        if ($request->get('idEstudio') != "") { $data['idEstudio'] = $request->get('idEstudio');}
        if ($request->get('notiene') != "") { $data['notiene'] = $request->get('notiene');}


        $data['idUsuario'] = session('email');

        // Actualizar el registro
        $updated = Serviciomedico::where('id', $id)->update($data);

        /* agregamos el accion */
        $accion = [ 'idUsuario' => session('email'), 'accion' => "Edicion de Servicio medico ", ];
        $acceso = Acciones::create($accion);

        return response()->json(['success' => true, 'message' => 'Registro editado correctamente.']);
    }

    /* eliminar registro */
    public function eliminar($id)  {
        $empresa = Serviciomedico::findOrFail($id); // Busca la empresa por ID
        $empresa->delete(); // Elimina la empresa
        /* agregamos el accion */
        $accion = [ 'idUsuario' => session('email'), 'accion' => "Eliminamos Servicio medico ", ];
        $acceso = Acciones::create($accion);
        return response()->json(['success' => true, 'message' => 'Registro eliminada correctamente.']);
    }
}
