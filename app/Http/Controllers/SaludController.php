<?php

namespace App\Http\Controllers;

use App\Http\Requests\SaludStoreRequest;
use App\Http\Requests\SaludUpdateRequest;
use App\Models\Salud;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use App\Models\Acciones;

class SaludController extends Controller
{

    /* mostrar informacion por estudio */
    public function muestro($id){
        // Buscar registros con el idEstudio especificado
        $estudios = Salud::where('idEstudio', $id)->get();

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
        $data['droga'] = !empty($request->post('droga')) ? $request->post('droga') : 0;
        $data['cualDroga'] = !empty($request->post('cualDroga')) ? $request->post('cualDroga') : 0;
        $data['fuma'] = !empty($request->post('fuma')) ? $request->post('fuma') : 0;
        $data['frecuenciaFuma'] = !empty($request->post('frecuenciaFuma')) ? $request->post('frecuenciaFuma') : 0;
        $data['bebidas'] = !empty($request->post('bebidas')) ? $request->post('bebidas') : 0;
        $data['frecuenciaBebidas'] = !empty($request->post('frecuenciaBebidas')) ? $request->post('frecuenciaBebidas') : 0;
        $data['cafe'] = !empty($request->post('cafe')) ? $request->post('cafe') : 0;
        $data['frecuenciaCafe'] = !empty($request->post('frecuenciaCafe')) ? $request->post('frecuenciaCafe') : 0;
        $data['lentes'] = !empty($request->post('lentes')) ? $request->post('lentes') : 0;
        $data['diagnostico'] = !empty($request->post('diagnostico')) ? $request->post('diagnostico') : 0;
        $data['intervenciones'] = !empty($request->post('intervenciones')) ? $request->post('intervenciones') : 0;
        $data['dequeintervenciones'] = !empty($request->post('dequeintervenciones')) ? $request->post('dequeintervenciones') : 0;
        $data['enfermedadesCronicas'] = !empty($request->post('enfermedadesCronicas')) ? $request->post('enfermedadesCronicas') : 0;
        $data['dequeCronicas'] = !empty($request->post('dequeCronicas')) ? $request->post('dequeCronicas') : 0;
        $data['hereditarias'] = !empty($request->post('hereditarias')) ? $request->post('hereditarias') : 0;
        $data['cualHereditarias'] = !empty($request->post('cualHereditarias')) ? $request->post('cualHereditarias') : 0;
        $data['quienConstante'] = !empty($request->post('quienConstante')) ? $request->post('quienConstante') : 0;
        $data['porqueConstante'] = !empty($request->post('porqueConstante')) ? $request->post('porqueConstante') : 0;
        $data['ultimaVez'] = !empty($request->post('ultimaVez')) ? $request->post('ultimaVez') : 0;
        $data['considera'] = !empty($request->post('considera')) ? $request->post('considera') : 0;
        $data['porqueConsidera'] = !empty($request->post('porqueConsidera')) ? $request->post('porqueConsidera') : 0;
        $data['deporte'] = !empty($request->post('deporte')) ? $request->post('deporte') : 0;
        $data['pasatiempo'] = !empty($request->post('pasatiempo')) ? $request->post('pasatiempo') : 0;
        $data['ultimavezDeque'] = !empty($request->post('ultimavezDeque')) ? $request->post('ultimavezDeque') : 0;
        $data['embarazo'] = !empty($request->post('embarazo')) ? $request->post('embarazo') : 0;


        $data['idUsuario'] = session('email');
        $user = Salud::create($data);
    /* agregamos el accion */
    $accion = [ 'idUsuario' => session('email'), 'accion' => "Creación de salud", ];
    $acceso = Acciones::create($accion);

    return response()->json(['message' => 'Acción realizada']);

    }

    /* funcion pára editar  */
    public function editar(Request $request, $id){

        /* validamos los valores antes de crear y en caso de que no tenga contenido le ponemos cero */
        $data = [ ];
        /* if ($request->post('') != "") { $data[''] = $request->post(''); } */

        if ($request->get('idEstudio') != "") { $data['idEstudio'] = $request->get('idEstudio'); }
        if ($request->get('droga') != "") { $data['droga'] = $request->get('droga'); }
        if ($request->get('cualDroga') != "") { $data['cualDroga'] = $request->get('cualDroga'); }
        if ($request->get('fuma') != "") { $data['fuma'] = $request->get('fuma'); }
        if ($request->get('frecuenciaFuma') != "") { $data['frecuenciaFuma'] = $request->get('frecuenciaFuma'); }
        if ($request->get('bebidas') != "") { $data['bebidas'] = $request->get('bebidas'); }
        if ($request->get('frecuenciaBebidas') != "") { $data['frecuenciaBebidas'] = $request->get('frecuenciaBebidas'); }
        if ($request->get('cafe') != "") { $data['cafe'] = $request->get('cafe'); }
        if ($request->get('frecuenciaCafe') != "") { $data['frecuenciaCafe'] = $request->get('frecuenciaCafe'); }
        if ($request->get('lentes') != "") { $data['lentes'] = $request->get('lentes'); }
        if ($request->get('diagnostico') != "") { $data['diagnostico'] = $request->get('diagnostico'); }
        if ($request->get('intervenciones') != "") { $data['intervenciones'] = $request->get('intervenciones'); }
        if ($request->get('dequeintervenciones') != "") { $data['dequeintervenciones'] = $request->get('dequeintervenciones'); }
        if ($request->get('enfermedadesCronicas') != "") { $data['enfermedadesCronicas'] = $request->get('enfermedadesCronicas'); }
        if ($request->get('dequeCronicas') != "") { $data['dequeCronicas'] = $request->get('dequeCronicas'); }
        if ($request->get('hereditarias') != "") { $data['hereditarias'] = $request->get('hereditarias'); }
        if ($request->get('cualHereditarias') != "") { $data['cualHereditarias'] = $request->get('cualHereditarias'); }
        if ($request->get('quienConstante') != "") { $data['quienConstante'] = $request->get('quienConstante'); }
        if ($request->get('porqueConstante') != "") { $data['porqueConstante'] = $request->get('porqueConstante'); }
        if ($request->get('ultimaVez') != "") { $data['ultimaVez'] = $request->get('ultimaVez'); }
        if ($request->get('considera') != "") { $data['considera'] = $request->get('considera'); }
        if ($request->get('porqueConsidera') != "") { $data['porqueConsidera'] = $request->get('porqueConsidera'); }
        if ($request->get('deporte') != "") { $data['deporte'] = $request->get('deporte'); }
        if ($request->get('pasatiempo') != "") { $data['pasatiempo'] = $request->get('pasatiempo'); }
        if ($request->get('ultimavezDeque') != "") { $data['ultimavezDeque'] = $request->get('ultimavezDeque'); }
        if ($request->get('embarazo') != "") { $data['embarazo'] = $request->get('embarazo'); }


        $data['idUsuario'] = session('email');

        // Actualizar el registro
        $updated = Salud::where('id', $id)->update($data);

        /* agregamos el accion */
        $accion = [ 'idUsuario' => session('email'), 'accion' => "Edicion de salud ", ];
        $acceso = Acciones::create($accion);

        return response()->json(['success' => true, 'message' => 'Registro editado correctamente.']);
    }

    /* eliminar registro */
    public function eliminar($id)  {
        $empresa = Salud::findOrFail($id); // Busca la empresa por ID
        $empresa->delete(); // Elimina la empresa
        /* agregamos el accion */
        $accion = [ 'idUsuario' => session('email'), 'accion' => "Eliminamos salud", ];
        $acceso = Acciones::create($accion);
        return response()->json(['success' => true, 'message' => 'Registro eliminada correctamente.']);
    }
}
