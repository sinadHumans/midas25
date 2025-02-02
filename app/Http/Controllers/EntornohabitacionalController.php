<?php

namespace App\Http\Controllers;

use App\Http\Requests\EntornohabitacionalStoreRequest;
use App\Http\Requests\EntornohabitacionalUpdateRequest;
use App\Models\Entornohabitacional;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use App\Models\Acciones;

class EntornohabitacionalController extends Controller
{
    /* mostrar informacion por estudio */
    public function muestro($id){
        // Buscar registros con el idEstudio especificado
        $estudios = Entornohabitacional::where('idEstudio', $id)->get();

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
        $data['tipoZona'] = !empty($request->post('tipoZona')) ? $request->post('tipoZona') : 0;
        $data['tipoVivienda'] = !empty($request->post('tipoVivienda')) ? $request->post('tipoVivienda') : 0;
        $data['edificacion'] = !empty($request->post('edificacion')) ? $request->post('edificacion') : 0;
        $data['titular'] = !empty($request->post('titular')) ? $request->post('titular') : 0;
        $data['parentesco'] = !empty($request->post('parentesco')) ? $request->post('parentesco') : 0;
        $data['numRecamaras'] = !empty($request->post('numRecamaras')) ? $request->post('numRecamaras') : 0;
        $data['sala'] = !empty($request->post('sala')) ? $request->post('sala') : 0;
        $data['comedor'] = !empty($request->post('comedor')) ? $request->post('comedor') : 0;
        $data['cocina'] = !empty($request->post('cocina')) ? $request->post('cocina') : 0;
        $data['garaje'] = !empty($request->post('garaje')) ? $request->post('garaje') : 0;
        $data['jardin'] = !empty($request->post('jardin')) ? $request->post('jardin') : 0;
        $data['nomBano'] = !empty($request->post('nomBano')) ? $request->post('nomBano') : 0;
        $data['tipobano'] = !empty($request->post('tipobano')) ? $request->post('tipobano') : 0;
        $data['viasdeacceso'] = !empty($request->post('viasdeacceso')) ? $request->post('viasdeacceso') : 0;
        $data['medioTransporte'] = !empty($request->post('medioTransporte')) ? $request->post('medioTransporte') : 0;
        $data['tiempoServicio'] = !empty($request->post('tiempoServicio')) ? $request->post('tiempoServicio') : 0;
        $data['entreCalles'] = !empty($request->post('entreCalles')) ? $request->post('entreCalles') : 0;
        $data['color'] = !empty($request->post('color')) ? $request->post('color') : 0;
        $data['porton'] = !empty($request->post('porton')) ? $request->post('porton') : 0;
        $data['referencias'] = !empty($request->post('referencias')) ? $request->post('referencias') : 0;
        $data['observaciones'] = !empty($request->post('observaciones')) ? $request->post('observaciones') : 0;
        $data['agua'] = !empty($request->post('agua')) ? $request->post('agua') : 0;
        $data['luz'] = !empty($request->post('luz')) ? $request->post('luz') : 0;
        $data['pavimentacion'] = !empty($request->post('pavimentacion')) ? $request->post('pavimentacion') : 0;
        $data['telefono'] = !empty($request->post('telefono')) ? $request->post('telefono') : 0;
        $data['transporte'] = !empty($request->post('transporte')) ? $request->post('transporte') : 0;
        $data['vigilancia'] = !empty($request->post('vigilancia')) ? $request->post('vigilancia') : 0;
        $data['areas'] = !empty($request->post('areas')) ? $request->post('areas') : 0;
        $data['drenaje'] = !empty($request->post('drenaje')) ? $request->post('drenaje') : 0;
        $data['paredes'] = !empty($request->post('paredes')) ? $request->post('paredes') : 0;
        $data['techos'] = !empty($request->post('techos')) ? $request->post('techos') : 0;
        $data['pisos'] = !empty($request->post('pisos')) ? $request->post('pisos') : 0;
        $data['telNormal'] = !empty($request->post('telNormal')) ? $request->post('telNormal') : 0;
        $data['telPlasma'] = !empty($request->post('telPlasma')) ? $request->post('telPlasma') : 0;
        $data['estereo'] = !empty($request->post('estereo')) ? $request->post('estereo') : 0;
        $data['dvd'] = !empty($request->post('dvd')) ? $request->post('dvd') : 0;
        $data['blueray'] = !empty($request->post('blueray')) ? $request->post('blueray') : 0;
        $data['estufa'] = !empty($request->post('estufa')) ? $request->post('estufa') : 0;
        $data['horno'] = !empty($request->post('horno')) ? $request->post('horno') : 0;
        $data['lavadora'] = !empty($request->post('lavadora')) ? $request->post('lavadora') : 0;
        $data['centrolavado'] = !empty($request->post('centrolavado')) ? $request->post('centrolavado') : 0;
        $data['refrigerador'] = !empty($request->post('refrigerador')) ? $request->post('refrigerador') : 0;
        $data['computadora'] = !empty($request->post('computadora')) ? $request->post('computadora') : 0;
        $data['extensionInmueble'] = !empty($request->post('extensionInmueble')) ? $request->post('extensionInmueble') : 0;
        $data['condicionesInmueble'] = !empty($request->post('condicionesInmueble')) ? $request->post('condicionesInmueble') : 0;
        $data['condicionesMobiliario'] = !empty($request->post('condicionesMobiliario')) ? $request->post('condicionesMobiliario') : 0;
        $data['orden'] = !empty($request->post('orden')) ? $request->post('orden') : 0;
        $data['limpieza'] = !empty($request->post('limpieza')) ? $request->post('limpieza') : 0;
        $data['delincuencia'] = !empty($request->post('delincuencia')) ? $request->post('delincuencia') : 0;
        $data['vandalismo'] = !empty($request->post('vandalismo')) ? $request->post('vandalismo') : 0;
        $data['drogadiccion'] = !empty($request->post('drogadiccion')) ? $request->post('drogadiccion') : 0;
        $data['alcoholismo'] = !empty($request->post('alcoholismo')) ? $request->post('alcoholismo') : 0;
        $data['estudio'] = !empty($request->post('estudio')) ? $request->post('estudio') : 0;
        $data['zotehuela'] = !empty($request->post('zotehuela')) ? $request->post('zotehuela') : 0;
        $data['patio'] = !empty($request->post('patio')) ? $request->post('patio') : 0;
        $data['internet'] = !empty($request->post('internet')) ? $request->post('internet') : 0;
        $data['renta'] = !empty($request->post('renta')) ? $request->post('renta') : 0;
        $data['regadera'] = !empty($request->post('regadera')) ? $request->post('regadera') : 0;

        $data['idUsuario'] = session('email');
        $user = Entornohabitacional::create($data);
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

        if ($request->get('idEstudio') != "") { $data['idEstudio'] = $request->get('idEstudio'); }
        if ($request->get('tipoZona') != "") { $data['tipoZona'] = $request->get('tipoZona'); }
        if ($request->get('tipoVivienda') != "") { $data['tipoVivienda'] = $request->get('tipoVivienda'); }
        if ($request->get('edificacion') != "") { $data['edificacion'] = $request->get('edificacion'); }
        if ($request->get('titular') != "") { $data['titular'] = $request->get('titular'); }
        if ($request->get('parentesco') != "") { $data['parentesco'] = $request->get('parentesco'); }
        if ($request->get('numRecamaras') != "") { $data['numRecamaras'] = $request->get('numRecamaras'); }
        if ($request->get('sala') != "") { $data['sala'] = $request->get('sala'); }
        if ($request->get('comedor') != "") { $data['comedor'] = $request->get('comedor'); }
        if ($request->get('cocina') != "") { $data['cocina'] = $request->get('cocina'); }
        if ($request->get('garaje') != "") { $data['garaje'] = $request->get('garaje'); }
        if ($request->get('jardin') != "") { $data['jardin'] = $request->get('jardin'); }
        if ($request->get('nomBano') != "") { $data['nomBano'] = $request->get('nomBano'); }
        if ($request->get('tipobano') != "") { $data['tipobano'] = $request->get('tipobano'); }
        if ($request->get('viasdeacceso') != "") { $data['viasdeacceso'] = $request->get('viasdeacceso'); }
        if ($request->get('medioTransporte') != "") { $data['medioTransporte'] = $request->get('medioTransporte'); }
        if ($request->get('tiempoServicio') != "") { $data['tiempoServicio'] = $request->get('tiempoServicio'); }
        if ($request->get('entreCalles') != "") { $data['entreCalles'] = $request->get('entreCalles'); }
        if ($request->get('color') != "") { $data['color'] = $request->get('color'); }
        if ($request->get('porton') != "") { $data['porton'] = $request->get('porton'); }
        if ($request->get('referencias') != "") { $data['referencias'] = $request->get('referencias'); }
        if ($request->get('observaciones') != "") { $data['observaciones'] = $request->get('observaciones'); }
        if ($request->get('agua') != "") { $data['agua'] = $request->get('agua'); }
        if ($request->get('luz') != "") { $data['luz'] = $request->get('luz'); }
        if ($request->get('pavimentacion') != "") { $data['pavimentacion'] = $request->get('pavimentacion'); }
        if ($request->get('telefono') != "") { $data['telefono'] = $request->get('telefono'); }
        if ($request->get('transporte') != "") { $data['transporte'] = $request->get('transporte'); }
        if ($request->get('vigilancia') != "") { $data['vigilancia'] = $request->get('vigilancia'); }
        if ($request->get('areas') != "") { $data['areas'] = $request->get('areas'); }
        if ($request->get('drenaje') != "") { $data['drenaje'] = $request->get('drenaje'); }
        if ($request->get('paredes') != "") { $data['paredes'] = $request->get('paredes'); }
        if ($request->get('techos') != "") { $data['techos'] = $request->get('techos'); }
        if ($request->get('pisos') != "") { $data['pisos'] = $request->get('pisos'); }
        if ($request->get('telNormal') != "") { $data['telNormal'] = $request->get('telNormal'); }
        if ($request->get('telPlasma') != "") { $data['telPlasma'] = $request->get('telPlasma'); }
        if ($request->get('estereo') != "") { $data['estereo'] = $request->get('estereo'); }
        if ($request->get('dvd') != "") { $data['dvd'] = $request->get('dvd'); }
        if ($request->get('blueray') != "") { $data['blueray'] = $request->get('blueray'); }
        if ($request->get('estufa') != "") { $data['estufa'] = $request->get('estufa'); }
        if ($request->get('horno') != "") { $data['horno'] = $request->get('horno'); }
        if ($request->get('lavadora') != "") { $data['lavadora'] = $request->get('lavadora'); }
        if ($request->get('centrolavado') != "") { $data['centrolavado'] = $request->get('centrolavado'); }
        if ($request->get('refrigerador') != "") { $data['refrigerador'] = $request->get('refrigerador'); }
        if ($request->get('computadora') != "") { $data['computadora'] = $request->get('computadora'); }
        if ($request->get('extensionInmueble') != "") { $data['extensionInmueble'] = $request->get('extensionInmueble'); }
        if ($request->get('condicionesInmueble') != "") { $data['condicionesInmueble'] = $request->get('condicionesInmueble'); }
        if ($request->get('condicionesMobiliario') != "") { $data['condicionesMobiliario'] = $request->get('condicionesMobiliario'); }
        if ($request->get('orden') != "") { $data['orden'] = $request->get('orden'); }
        if ($request->get('limpieza') != "") { $data['limpieza'] = $request->get('limpieza'); }
        if ($request->get('delincuencia') != "") { $data['delincuencia'] = $request->get('delincuencia'); }
        if ($request->get('vandalismo') != "") { $data['vandalismo'] = $request->get('vandalismo'); }
        if ($request->get('drogadiccion') != "") { $data['drogadiccion'] = $request->get('drogadiccion'); }
        if ($request->get('alcoholismo') != "") { $data['alcoholismo'] = $request->get('alcoholismo'); }
        if ($request->get('estudio') != "") { $data['estudio'] = $request->get('estudio'); }
        if ($request->get('zotehuela') != "") { $data['zotehuela'] = $request->get('zotehuela'); }
        if ($request->get('patio') != "") { $data['patio'] = $request->get('patio'); }
        if ($request->get('internet') != "") { $data['internet'] = $request->get('internet'); }
        if ($request->get('renta') != "") { $data['renta'] = $request->get('renta'); }
        if ($request->get('regadera') != "") { $data['regadera'] = $request->get('regadera'); }

        $data['idUsuario'] = session('email');

        // Actualizar el registro
        $updated = Entornohabitacional::where('id', $id)->update($data);

        /* agregamos el accion */
        $accion = [ 'idUsuario' => session('email'), 'accion' => "Edicion de entorno", ];
        $acceso = Acciones::create($accion);

        return response()->json(['success' => true, 'message' => 'Registro editado correctamente.']);
    }

     /* eliminar registro */
     public function eliminar($id)  {
        $empresa = Entornohabitacional::findOrFail($id); // Busca la empresa por ID
        $empresa->delete(); // Elimina la empresa
        /* agregamos el accion */
        $accion = [ 'idUsuario' => session('email'), 'accion' => "Eliminamos entorno", ];
        $acceso = Acciones::create($accion);
        return response()->json(['success' => true, 'message' => 'Registro eliminada correctamente.']);
    }
}
