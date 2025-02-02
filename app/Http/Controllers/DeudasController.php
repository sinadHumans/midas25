<?php

namespace App\Http\Controllers;

use App\Http\Requests\DeudasStoreRequest;
use App\Http\Requests\DeudasUpdateRequest;
use App\Models\Deudas;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use App\Models\Acciones;

class DeudasController extends Controller
{
    /* mostrar informacion por estudio */
    public function muestro($id){
        // Buscar registros con el idEstudio especificado
        $estudios = Deudas::where('idEstudio', $id)->get();

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
        $data['cuentaDeuda'] = !empty($request->post('cuentaDeuda')) ? $request->post('cuentaDeuda') : 0;
        $data['conQuien'] = !empty($request->post('conQuien')) ? $request->post('conQuien') : 0;
        $data['monto'] = !empty($request->post('monto')) ? $request->post('monto') : 0;
        $data['abonoMensual'] = !empty($request->post('abonoMensual')) ? $request->post('abonoMensual') : 0;
        $data['apagaren'] = !empty($request->post('apagaren')) ? $request->post('apagaren') : 0;
        $data['cuentaauto'] = !empty($request->post('cuentaauto')) ? $request->post('cuentaauto') : 0;
        $data['modelo'] = !empty($request->post('modelo')) ? $request->post('modelo') : 0;
        $data['placas'] = !empty($request->post('placas')) ? $request->post('placas') : 0;
        $data['valorAuto'] = !empty($request->post('valorAuto')) ? $request->post('valorAuto') : 0;
        $data['propiedad'] = !empty($request->post('propiedad')) ? $request->post('propiedad') : 0;
        $data['ubicacon'] = !empty($request->post('ubicacon')) ? $request->post('ubicacon') : 0;
        $data['tarjetaCredito'] = !empty($request->post('tarjetaCredito')) ? $request->post('tarjetaCredito') : 0;
        $data['bancotarjetaCredito'] = !empty($request->post('bancotarjetaCredito')) ? $request->post('bancotarjetaCredito') : 0;
        $data['creditoAutorizado'] = !empty($request->post('creditoAutorizado')) ? $request->post('creditoAutorizado') : 0;
        $data['tarjetaTienda'] = !empty($request->post('tarjetaTienda')) ? $request->post('tarjetaTienda') : 0;
        $data['conquienTienda'] = !empty($request->post('conquienTienda')) ? $request->post('conquienTienda') : 0;
        $data['creditoAutorizadotienda'] = !empty($request->post('creditoAutorizadotienda')) ? $request->post('creditoAutorizadotienda') : 0;
        $data['observaciones'] = !empty($request->post('observaciones')) ? $request->post('observaciones') : 0;

        $data['idUsuario'] = session('email');
        $user = Deudas::create($data);
       /* agregamos el accion */
       $accion = [ 'idUsuario' => session('email'), 'accion' => "Creación de deudas", ];
       $acceso = Acciones::create($accion);

       return response()->json(['message' => 'Acción realizada']);

    }

    /* funcion pára editar  */
    public function editar(Request $request, $id){

        /* validamos los valores antes de crear y en caso de que no tenga contenido le ponemos cero */
        $data = [ ];
        /* if ($request->post('') != "") { $data[''] = $request->post(''); } */

        if ($request->get('idEstudio') != "") { $data['idEstudio'] = $request->get('idEstudio'); }
        if ($request->get('cuentaDeuda') != "") { $data['cuentaDeuda'] = $request->get('cuentaDeuda'); }
        if ($request->get('conQuien') != "") { $data['conQuien'] = $request->get('conQuien'); }
        if ($request->get('monto') != "") { $data['monto'] = $request->get('monto'); }
        if ($request->get('abonoMensual') != "") { $data['abonoMensual'] = $request->get('abonoMensual'); }
        if ($request->get('apagaren') != "") { $data['apagaren'] = $request->get('apagaren'); }
        if ($request->get('cuentaauto') != "") { $data['cuentaauto'] = $request->get('cuentaauto'); }
        if ($request->get('modelo') != "") { $data['modelo'] = $request->get('modelo'); }
        if ($request->get('placas') != "") { $data['placas'] = $request->get('placas'); }
        if ($request->get('valorAuto') != "") { $data['valorAuto'] = $request->get('valorAuto'); }
        if ($request->get('propiedad') != "") { $data['propiedad'] = $request->get('propiedad'); }
        if ($request->get('ubicacon') != "") { $data['ubicacon'] = $request->get('ubicacon'); }
        if ($request->get('tarjetaCredito') != "") { $data['tarjetaCredito'] = $request->get('tarjetaCredito'); }
        if ($request->get('bancotarjetaCredito') != "") { $data['bancotarjetaCredito'] = $request->get('bancotarjetaCredito'); }
        if ($request->get('creditoAutorizado') != "") { $data['creditoAutorizado'] = $request->get('creditoAutorizado'); }
        if ($request->get('tarjetaTienda') != "") { $data['tarjetaTienda'] = $request->get('tarjetaTienda'); }
        if ($request->get('conquienTienda') != "") { $data['conquienTienda'] = $request->get('conquienTienda'); }
        if ($request->get('creditoAutorizadotienda') != "") { $data['creditoAutorizadotienda'] = $request->get('creditoAutorizadotienda'); }
        if ($request->get('observaciones') != "") { $data['observaciones'] = $request->get('observaciones'); }

        $data['idUsuario'] = session('email');

        // Actualizar el registro
        $updated = Deudas::where('id', $id)->update($data);

        /* agregamos el accion */
        $accion = [ 'idUsuario' => session('email'), 'accion' => "Edicion de deuda", ];
        $acceso = Acciones::create($accion);

        return response()->json(['success' => true, 'message' => 'Registro editado correctamente.']);
    }

     /* eliminar registro */
     public function eliminar($id)  {
        $empresa = Deudas::findOrFail($id); // Busca la empresa por ID
        $empresa->delete(); // Elimina la empresa
        /* agregamos el accion */
        $accion = [ 'idUsuario' => session('email'), 'accion' => "Eliminamos deudas", ];
        $acceso = Acciones::create($accion);
        return response()->json(['success' => true, 'message' => 'Registro eliminada correctamente.']);
    }
}
