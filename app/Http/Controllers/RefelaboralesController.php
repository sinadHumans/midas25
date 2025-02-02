<?php

namespace App\Http\Controllers;

use App\Http\Requests\RefelaboralesStoreRequest;
use App\Http\Requests\RefelaboralesUpdateRequest;
use App\Models\Refelaborales;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use App\Models\Acciones;

class RefelaboralesController extends Controller
{
      /* mostrar informacion por estudio */
      public function muestro($id){
        // Buscar registros con el idEstudio especificado
        $estudios = Refelaborales::where('idEstudio', $id)->get();

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
        $data['empresa'] = !empty($request->post('empresa')) ? $request->post('empresa') : 0;
        $data['giro'] = !empty($request->post('giro')) ? $request->post('giro') : 0;
        $data['direccion'] = !empty($request->post('direccion')) ? $request->post('direccion') : 0;
        $data['telefono'] = !empty($request->post('telefono')) ? $request->post('telefono') : 0;
        $data['fechaIngreso'] = !empty($request->post('fechaIngreso')) ? $request->post('fechaIngreso') : 0;
        $data['fechaEgreso'] = !empty($request->post('fechaEgreso')) ? $request->post('fechaEgreso') : 0;
        $data['puesto'] = !empty($request->post('puesto')) ? $request->post('puesto') : 0;
        $data['area'] = !empty($request->post('area')) ? $request->post('area') : 0;
        $data['salario'] = !empty($request->post('salario')) ? $request->post('salario') : 0;
        $data['motivoSalida'] = !empty($request->post('motivoSalida')) ? $request->post('motivoSalida') : 0;
        $data['quienProporciono'] = !empty($request->post('quienProporciono')) ? $request->post('quienProporciono') : 0;
        $data['puestoProporciono'] = !empty($request->post('puestoProporciono')) ? $request->post('puestoProporciono') : 0;
        $data['calificacion'] = !empty($request->post('calificacion')) ? $request->post('calificacion') : 0;
        $data['demanda'] = !empty($request->post('demanda')) ? $request->post('demanda') : 0;
        $data['volveria'] = !empty($request->post('volveria')) ? $request->post('volveria') : 0;
        $data['porque'] = !empty($request->post('porque')) ? $request->post('porque') : 0;
        $data['observaciones'] = !empty($request->post('observaciones')) ? $request->post('observaciones') : 0;
        $data['idUsuario'] = !empty($request->post('idUsuario')) ? $request->post('idUsuario') : 0;
        $data['candidatoes'] = !empty($request->post('candidatoes')) ? $request->post('candidatoes') : 0;
        $data['periodosInactivo'] = !empty($request->post('periodosInactivo')) ? $request->post('periodosInactivo') : 0;

        $data['idUsuario'] = session('email');
        $user = Refelaborales::create($data);
    /* agregamos el accion */
    $accion = [ 'idUsuario' => session('email'), 'accion' => "Creación de referencia laboral", ];
    $acceso = Acciones::create($accion);

    return response()->json(['message' => 'Acción realizada']);

    }

    /* funcion pára editar  */
    public function editar(Request $request, $id){

        /* validamos los valores antes de crear y en caso de que no tenga contenido le ponemos cero */
        $data = [ ];
        /* if ($request->post('') != "") { $data[''] = $request->post(''); } */

        if ($request->get('idEstudio') != "") { $data['idEstudio'] = $request->get('idEstudio'); }
        if ($request->get('empresa') != "") { $data['empresa'] = $request->get('empresa'); }
        if ($request->get('giro') != "") { $data['giro'] = $request->get('giro'); }
        if ($request->get('direccion') != "") { $data['direccion'] = $request->get('direccion'); }
        if ($request->get('telefono') != "") { $data['telefono'] = $request->get('telefono'); }
        if ($request->get('fechaIngreso') != "") { $data['fechaIngreso'] = $request->get('fechaIngreso'); }
        if ($request->get('fechaEgreso') != "") { $data['fechaEgreso'] = $request->get('fechaEgreso'); }
        if ($request->get('puesto') != "") { $data['puesto'] = $request->get('puesto'); }
        if ($request->get('area') != "") { $data['area'] = $request->get('area'); }
        if ($request->get('salario') != "") { $data['salario'] = $request->get('salario'); }
        if ($request->get('motivoSalida') != "") { $data['motivoSalida'] = $request->get('motivoSalida'); }
        if ($request->get('quienProporciono') != "") { $data['quienProporciono'] = $request->get('quienProporciono'); }
        if ($request->get('puestoProporciono') != "") { $data['puestoProporciono'] = $request->get('puestoProporciono'); }
        if ($request->get('calificacion') != "") { $data['calificacion'] = $request->get('calificacion'); }
        if ($request->get('demanda') != "") { $data['demanda'] = $request->get('demanda'); }
        if ($request->get('volveria') != "") { $data['volveria'] = $request->get('volveria'); }
        if ($request->get('porque') != "") { $data['porque'] = $request->get('porque'); }
        if ($request->get('observaciones') != "") { $data['observaciones'] = $request->get('observaciones'); }
        if ($request->get('idUsuario') != "") { $data['idUsuario'] = $request->get('idUsuario'); }
        if ($request->get('candidatoes') != "") { $data['candidatoes'] = $request->get('candidatoes'); }
        if ($request->get('periodosInactivo') != "") { $data['periodosInactivo'] = $request->get('periodosInactivo'); }

        $data['idUsuario'] = session('email');

        // Actualizar el registro
        $updated = Refelaborales::where('id', $id)->update($data);

        /* agregamos el accion */
        $accion = [ 'idUsuario' => session('email'), 'accion' => "Edicion de referencia laboral", ];
        $acceso = Acciones::create($accion);

        return response()->json(['success' => true, 'message' => 'Registro editado correctamente.']);
    }

    /* eliminar registro */
    public function eliminar($id)  {
        $empresa = Refelaborales::findOrFail($id); // Busca la empresa por ID
        $empresa->delete(); // Elimina la empresa
        /* agregamos el accion */
        $accion = [ 'idUsuario' => session('email'), 'accion' => "Eliminamos referencia laboral", ];
        $acceso = Acciones::create($accion);
        return response()->json(['success' => true, 'message' => 'Registro eliminada correctamente.']);
    }
}
