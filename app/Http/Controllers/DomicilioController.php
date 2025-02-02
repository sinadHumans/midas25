<?php

namespace App\Http\Controllers;

use App\Http\Requests\DomicilioStoreRequest;
use App\Http\Requests\DomicilioUpdateRequest;
use App\Models\Domicilio;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use App\Models\Acciones;

class DomicilioController extends Controller
{
    /* mostrar informacion por estudio */
    public function muestro($id){
        // Buscar registros con el idEstudio especificado
        $estudios = Domicilio::where('idEstudio', $id)->get();

        // Devolver los resultados como un JSON
        return response()->json([
            'success' => true,
            'data' => $estudios
        ]);
    }

    /* funcion para crear  */
    public function crear(Request $request): JsonResponse{

        $data = [  ];

        $data['idUsuario'] = session('email');
        $data['idEstudio'] = !empty($request->post('idEstudio')) ? $request->post('idEstudio') : 0;
        $data['delegacionMunicipio'] = !empty($request->post('delegacionMunicipio')) ? $request->post('delegacionMunicipio') : 0;
        $data['ciudad'] = !empty($request->post('ciudad')) ? $request->post('ciudad') : 0;
        $data['estado'] = !empty($request->post('estado')) ? $request->post('estado') : 0;
        $data['cp'] = !empty($request->post('cp')) ? $request->post('cp') : 0;
        $data['tiempoResindir'] = !empty($request->post('tiempoResindir')) ? $request->post('tiempoResindir') : 0;
        $data['tel1'] = !empty($request->post('tel1')) ? $request->post('tel1') : 0;
        $data['tel2'] = !empty($request->post('tel2')) ? $request->post('tel2') : 0;
        $data['tel3'] = !empty($request->post('tel3')) ? $request->post('tel3') : 0;
        $data['cel1'] = !empty($request->post('cel1')) ? $request->post('cel1') : 0;
        $data['cel2'] = !empty($request->post('cel2')) ? $request->post('cel2') : 0;
        $data['cel3'] = !empty($request->post('cel3')) ? $request->post('cel3') : 0;
        $data['calle'] = !empty($request->post('calle')) ? $request->post('calle') : 0;
        $data['numero'] = !empty($request->post('numero')) ? $request->post('numero') : 0;
        $data['colonia'] = !empty($request->post('colonia')) ? $request->post('colonia') : 0;

        $user = Domicilio::create($data);
       /* agregamos el accion */
       $accion = [ 'idUsuario' => session('email'), 'accion' => "Creaci贸n de domicilio", ];
       $acceso = Acciones::create($accion);

       return response()->json(['message' => 'Acci贸n realizada']);

    }

    /* funcion p谩ra editar  */
    public function editar(Request $request, $id){

        /* validamos los valores antes de crear y en caso de que no tenga contenido le ponemos cero */
        $data = [ ];

        if ($request->get('delegacionMunicipio') != "") { $data['delegacionMunicipio'] = $request->get('delegacionMunicipio'); }
        if ($request->get('ciudad') != "") { $data['ciudad'] = $request->get('ciudad'); }
        if ($request->get('estado') != "") { $data['estado'] = $request->get('estado'); }
        if ($request->get('cp') != "") { $data['cp'] = $request->get('cp'); }
        if ($request->get('tiempoResindir') != "") { $data['tiempoResindir'] = $request->get('tiempoResindir'); }
        if ($request->get('tel1') != "") { $data['tel1'] = $request->get('tel1'); }
        if ($request->get('tel2') != "") { $data['tel2'] = $request->get('tel2'); }
        if ($request->get('tel3') != "") { $data['tel3'] = $request->get('tel3'); }
        if ($request->get('cel1') != "") { $data['cel1'] = $request->get('cel1'); }
        if ($request->get('cel2') != "") { $data['cel2'] = $request->get('cel2'); }
        if ($request->get('cel3') != "") { $data['cel3'] = $request->get('cel3'); }
        if ($request->get('calle') != "") { $data['calle'] = $request->get('calle'); }
        if ($request->get('numero') != "") { $data['numero'] = $request->get('numero'); }
        if ($request->get('colonia') != "") { $data['colonia'] = $request->get('colonia'); }

        // Actualizar el registro
        $updated = Domicilio::where('id', $id)->update($data);

        /* agregamos el accion */
        $accion = [ 'idUsuario' => session('email'), 'accion' => "Edicion de direcciones", ];
        $acceso = Acciones::create($accion);

        return response()->json(['success' => true, 'message' => 'Registro editado correctamente.']);
    }
}
