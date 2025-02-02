<?php

namespace App\Http\Controllers;

use App\Http\Requests\DocumentospresentadosStoreRequest;
use App\Http\Requests\DocumentospresentadosUpdateRequest;
use App\Models\Documentospresentados;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use App\Models\Acciones;

class DocumentospresentadosController extends Controller
{
   /* mostrar informacion por estudio */
    public function muestro($id){
        // Buscar registros con el idEstudio especificado
        $estudios = Documentospresentados::where('idEstudio', $id)->get();

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
        $data['documento'] = !empty($request->post('documento')) ? $request->post('documento') : 0;
        $data['ine'] = !empty($request->post('ine')) ? $request->post('ine') : 0;
        $data['comprobante'] = !empty($request->post('comprobante')) ? $request->post('comprobante') : 0;
        $data['acta'] = !empty($request->post('acta')) ? $request->post('acta') : 0;
        $data['cartas'] = !empty($request->post('cartas')) ? $request->post('cartas') : 0;
        $data['aviso'] = !empty($request->post('aviso')) ? $request->post('aviso') : 0;
        $data['comentarios'] = !empty($request->post('comentarios')) ? $request->post('comentarios') : 0;
        $data['idEstudio'] = !empty($request->post('idEstudio')) ? $request->post('idEstudio') : 0;

        $data['idUsuario'] = session('email');
        $user = Documentospresentados::create($data);
       /* agregamos el accion */
       $accion = [ 'idUsuario' => session('email'), 'accion' => "Creación de documentos presentados", ];
       $acceso = Acciones::create($accion);

       return response()->json(['message' => 'Acción realizada']);

    }

    /* funcion pára editar  */
    public function editar(Request $request, $id){

        /* validamos los valores antes de crear y en caso de que no tenga contenido le ponemos cero */
        $data = [ ];
         /* if ($request->post('') != "") { $data[''] = $request->post(''); } */
        if ($request->get('documento') != "") {$data['documento'] = $request->get('documento');}
        if ($request->get('ine') != "") {$data['ine'] = $request->get('ine');}
        if ($request->get('comprobante') != "") {$data['comprobante'] = $request->get('comprobante');}
        if ($request->get('acta') != "") {$data['acta'] = $request->get('acta');}
        if ($request->get('cartas') != "") {$data['cartas'] = $request->get('cartas');}
        if ($request->get('aviso') != "") {$data['aviso'] = $request->get('aviso');}
        if ($request->get('comentarios') != "") {$data['comentarios'] = $request->get('comentarios');}
        if ($request->get('idEstudio') != "") {$data['idEstudio'] = $request->get('idEstudio');}

        $data['idUsuario'] = session('email');
        // Actualizar el registro
        $updated = Documentospresentados::where('id', $id)->update($data);

        /* agregamos el accion */
        $accion = [ 'idUsuario' => session('email'), 'accion' => "Edicion de documentos presentados", ];
        $acceso = Acciones::create($accion);

        return response()->json(['success' => true, 'message' => 'Registro editado correctamente.']);
    }
}

