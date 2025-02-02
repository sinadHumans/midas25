<?php

namespace App\Http\Controllers;

use App\Http\Requests\InfolaboralStoreRequest;
use App\Http\Requests\InfolaboralUpdateRequest;
use App\Models\Infolaboral;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use App\Models\Acciones;

class InfolaboralController extends Controller
{
    /* mostrar informacion por estudio */
    public function muestro($id){
        // Buscar registros con el idEstudio especificado
        $estudios = Infolaboral::where('idEstudio', $id)->get();

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
        $data['laboral'] = !empty($request->post('laboral')) ? $request->post('laboral') : 0;
        $data['campol'] = !empty($request->post('campol')) ? $request->post('campol') : 0;
        $data['fechal'] = !empty($request->post('fechal')) ? $request->post('fechal') : 0;
        $data['acuerdol'] = !empty($request->post('acuerdol')) ? $request->post('acuerdol') : 0;
        $data['civiles'] = !empty($request->post('civiles')) ? $request->post('civiles') : 0;
        $data['campoc'] = !empty($request->post('campoc')) ? $request->post('campoc') : 0;
        $data['fechac'] = !empty($request->post('fechac')) ? $request->post('fechac') : 0;
        $data['acuerdoc'] = !empty($request->post('acuerdoc')) ? $request->post('acuerdoc') : 0;
        $data['familiares'] = !empty($request->post('familiares')) ? $request->post('familiares') : 0;
        $data['campof'] = !empty($request->post('campof')) ? $request->post('campof') : 0;
        $data['fechaf'] = !empty($request->post('fechaf')) ? $request->post('fechaf') : 0;
        $data['acuerdof'] = !empty($request->post('acuerdof')) ? $request->post('acuerdof') : 0;
        $data['penales'] = !empty($request->post('penales')) ? $request->post('penales') : 0;
        $data['campop'] = !empty($request->post('campop')) ? $request->post('campop') : 0;
        $data['fechap'] = !empty($request->post('fechap')) ? $request->post('fechap') : 0;
        $data['acuerdop'] = !empty($request->post('acuerdop')) ? $request->post('acuerdop') : 0;
        $data['administrativa'] = !empty($request->post('administrativa')) ? $request->post('administrativa') : 0;
        $data['campoa'] = !empty($request->post('campoa')) ? $request->post('campoa') : 0;
        $data['fechaa'] = !empty($request->post('fechaa')) ? $request->post('fechaa') : 0;
        $data['acuerdoa'] = !empty($request->post('acuerdoa')) ? $request->post('acuerdoa') : 0;
        $data['internacional'] = !empty($request->post('internacional')) ? $request->post('internacional') : 0;
        $data['campoi'] = !empty($request->post('campoi')) ? $request->post('campoi') : 0;
        $data['fechai'] = !empty($request->post('fechai')) ? $request->post('fechai') : 0;
        $data['acuerdoi'] = !empty($request->post('acuerdoi')) ? $request->post('acuerdoi') : 0;
        $data['sat'] = !empty($request->post('sat')) ? $request->post('sat') : 0;
        $data['camposat'] = !empty($request->post('camposat')) ? $request->post('camposat') : 0;
        $data['fechasat'] = !empty($request->post('fechasat')) ? $request->post('fechasat') : 0;
        $data['acuerdosat'] = !empty($request->post('acuerdosat')) ? $request->post('acuerdosat') : 0;
        $data['idEstudio'] = !empty($request->post('idEstudio')) ? $request->post('idEstudio') : 0;
        $data['comentariol'] = !empty($request->post('comentariol')) ? $request->post('comentariol') : 0;
        $data['comentarioc'] = !empty($request->post('comentarioc')) ? $request->post('comentarioc') : 0;
        $data['comentariof'] = !empty($request->post('comentariof')) ? $request->post('comentariof') : 0;
        $data['comentariop'] = !empty($request->post('comentariop')) ? $request->post('comentariop') : 0;
        $data['comentarioa'] = !empty($request->post('comentarioa')) ? $request->post('comentarioa') : 0;
        $data['comentarioi'] = !empty($request->post('comentarioi')) ? $request->post('comentarioi') : 0;
        $data['comentariosat'] = !empty($request->post('comentariosat')) ? $request->post('comentariosat') : 0;

        $data['idUsuario'] = session('email');
        $user = Infolaboral::create($data);
    /* agregamos el accion */
    $accion = [ 'idUsuario' => session('email'), 'accion' => "Creación de  info laboral", ];
    $acceso = Acciones::create($accion);

    return response()->json(['message' => 'Acción realizada']);

    }

    /* funcion pára editar  */
    public function editar(Request $request, $id){

        /* validamos los valores antes de crear y en caso de que no tenga contenido le ponemos cero */
        $data = [ ];
        /* if ($request->post('') != "") { $data[''] = $request->post(''); } */

        if ($request->get('laboral') != "") { $data['laboral'] = $request->get('laboral'); }
        if ($request->get('campol') != "") { $data['campol'] = $request->get('campol'); }
        if ($request->get('fechal') != "") { $data['fechal'] = $request->get('fechal'); }
        if ($request->get('acuerdol') != "") { $data['acuerdol'] = $request->get('acuerdol'); }
        if ($request->get('civiles') != "") { $data['civiles'] = $request->get('civiles'); }
        if ($request->get('campoc') != "") { $data['campoc'] = $request->get('campoc'); }
        if ($request->get('fechac') != "") { $data['fechac'] = $request->get('fechac'); }
        if ($request->get('acuerdoc') != "") { $data['acuerdoc'] = $request->get('acuerdoc'); }
        if ($request->get('familiares') != "") { $data['familiares'] = $request->get('familiares'); }
        if ($request->get('campof') != "") { $data['campof'] = $request->get('campof'); }
        if ($request->get('fechaf') != "") { $data['fechaf'] = $request->get('fechaf'); }
        if ($request->get('acuerdof') != "") { $data['acuerdof'] = $request->get('acuerdof'); }
        if ($request->get('penales') != "") { $data['penales'] = $request->get('penales'); }
        if ($request->get('campop') != "") { $data['campop'] = $request->get('campop'); }
        if ($request->get('fechap') != "") { $data['fechap'] = $request->get('fechap'); }
        if ($request->get('acuerdop') != "") { $data['acuerdop'] = $request->get('acuerdop'); }
        if ($request->get('administrativa') != "") { $data['administrativa'] = $request->get('administrativa'); }
        if ($request->get('campoa') != "") { $data['campoa'] = $request->get('campoa'); }
        if ($request->get('fechaa') != "") { $data['fechaa'] = $request->get('fechaa'); }
        if ($request->get('acuerdoa') != "") { $data['acuerdoa'] = $request->get('acuerdoa'); }
        if ($request->get('internacional') != "") { $data['internacional'] = $request->get('internacional'); }
        if ($request->get('campoi') != "") { $data['campoi'] = $request->get('campoi'); }
        if ($request->get('fechai') != "") { $data['fechai'] = $request->get('fechai'); }
        if ($request->get('acuerdoi') != "") { $data['acuerdoi'] = $request->get('acuerdoi'); }
        if ($request->get('sat') != "") { $data['sat'] = $request->get('sat'); }
        if ($request->get('camposat') != "") { $data['camposat'] = $request->get('camposat'); }
        if ($request->get('fechasat') != "") { $data['fechasat'] = $request->get('fechasat'); }
        if ($request->get('acuerdosat') != "") { $data['acuerdosat'] = $request->get('acuerdosat'); }
        if ($request->get('idEstudio') != "") { $data['idEstudio'] = $request->get('idEstudio'); }
        if ($request->get('comentariol') != "") { $data['comentariol'] = $request->get('comentariol'); }
        if ($request->get('comentarioc') != "") { $data['comentarioc'] = $request->get('comentarioc'); }
        if ($request->get('comentariof') != "") { $data['comentariof'] = $request->get('comentariof'); }
        if ($request->get('comentariop') != "") { $data['comentariop'] = $request->get('comentariop'); }
        if ($request->get('comentarioa') != "") { $data['comentarioa'] = $request->get('comentarioa'); }
        if ($request->get('comentarioi') != "") { $data['comentarioi'] = $request->get('comentarioi'); }
        if ($request->get('comentariosat') != "") { $data['comentariosat'] = $request->get('comentariosat'); }


        $data['idUsuario'] = session('email');

        // Actualizar el registro
        $updated = Infolaboral::where('id', $id)->update($data);

        /* agregamos el accion */
        $accion = [ 'idUsuario' => session('email'), 'accion' => "Edicion de  info laboral ", ];
        $acceso = Acciones::create($accion);

        return response()->json(['success' => true, 'message' => 'Registro editado correctamente.']);
    }

    /* eliminar registro */
    public function eliminar($id)  {
        $empresa = Infolaboral::findOrFail($id); // Busca la empresa por ID
        $empresa->delete(); // Elimina la empresa
        /* agregamos el accion */
        $accion = [ 'idUsuario' => session('email'), 'accion' => "Eliminamos info laboral ", ];
        $acceso = Acciones::create($accion);
        return response()->json(['success' => true, 'message' => 'Registro eliminada correctamente.']);
    }
}
