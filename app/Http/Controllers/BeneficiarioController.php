<?php

namespace App\Http\Controllers;

use App\Http\Requests\BeneficiarioStoreRequest;
use App\Http\Requests\BeneficiarioUpdateRequest;
use App\Models\Beneficiario;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use App\Models\Acciones;

class BeneficiarioController extends Controller
{
    /* mostrar informacion por estudio */
    public function muestro($id){
        // Buscar registros con el idEstudio especificado
        $estudios = Beneficiario::where('idEstudio', $id)->get();

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
        $data['parentesco'] = !empty($request->post('parentesco')) ? $request->post('parentesco') : 0;
        $data['nombre'] = !empty($request->post('nombre')) ? $request->post('nombre') : 0;
        $data['edad'] = !empty($request->post('edad')) ? $request->post('edad') : 0;
        $data['ocupacion'] = !empty($request->post('ocupacion')) ? $request->post('ocupacion') : 0;
        $data['donde'] = !empty($request->post('donde')) ? $request->post('donde') : 0;
        $data['calle'] = !empty($request->post('calle')) ? $request->post('calle') : 0;
        $data['numero'] = !empty($request->post('numero')) ? $request->post('numero') : 0;
        $data['colonia'] = !empty($request->post('colonia')) ? $request->post('colonia') : 0;
        $data['delegacion'] = !empty($request->post('delegacion')) ? $request->post('delegacion') : 0;
        $data['ciudad'] = !empty($request->post('ciudad')) ? $request->post('ciudad') : 0;
        $data['estado'] = !empty($request->post('estado')) ? $request->post('estado') : 0;
        $data['cp'] = !empty($request->post('cp')) ? $request->post('cp') : 0;
        $data['tiempo'] = !empty($request->post('tiempo')) ? $request->post('tiempo') : 0;
        $data['telefono'] = !empty($request->post('telefono')) ? $request->post('telefono') : 0;

        $data['idUsuario'] = session('email');
        $user = Beneficiario::create($data);
    /* agregamos el accion */
    $accion = [ 'idUsuario' => session('email'), 'accion' => "Creación de beneficiarios", ];
    $acceso = Acciones::create($accion);

    return response()->json(['message' => 'Acción realizada']);

    }

    /* funcion pára editar  */
    public function editar(Request $request, $id){

        /* validamos los valores antes de crear y en caso de que no tenga contenido le ponemos cero */
        $data = [ ];
        /* if ($request->post('') != "") { $data[''] = $request->post(''); } */

        if ($request->get('idEstudio') != "") { $data['idEstudio'] = $request->get('idEstudio'); }
        if ($request->get('parentesco') != "") { $data['parentesco'] = $request->get('parentesco'); }
        if ($request->get('nombre') != "") { $data['nombre'] = $request->get('nombre'); }
        if ($request->get('edad') != "") { $data['edad'] = $request->get('edad'); }
        if ($request->get('ocupacion') != "") { $data['ocupacion'] = $request->get('ocupacion'); }
        if ($request->get('donde') != "") { $data['donde'] = $request->get('donde'); }
        if ($request->get('calle') != "") { $data['calle'] = $request->get('calle'); }
        if ($request->get('numero') != "") { $data['numero'] = $request->get('numero'); }
        if ($request->get('colonia') != "") { $data['colonia'] = $request->get('colonia'); }
        if ($request->get('delegacion') != "") { $data['delegacion'] = $request->get('delegacion'); }
        if ($request->get('ciudad') != "") { $data['ciudad'] = $request->get('ciudad'); }
        if ($request->get('estado') != "") { $data['estado'] = $request->get('estado'); }
        if ($request->get('cp') != "") { $data['cp'] = $request->get('cp'); }
        if ($request->get('tiempo') != "") { $data['tiempo'] = $request->get('tiempo'); }
        if ($request->get('telefono') != "") { $data['telefono'] = $request->get('telefono'); }

        $data['idUsuario'] = session('email');

        // Actualizar el registro
        $updated = Beneficiario::where('id', $id)->update($data);

        /* agregamos el accion */
        $accion = [ 'idUsuario' => session('email'), 'accion' => "Edicion de beneficiarios ", ];
        $acceso = Acciones::create($accion);

        return response()->json(['success' => true, 'message' => 'Registro editado correctamente.']);
    }

    /* eliminar registro */
    public function eliminar($id)  {
        $empresa = Beneficiario::findOrFail($id); // Busca la empresa por ID
        $empresa->delete(); // Elimina la empresa
        /* agregamos el accion */
        $accion = [ 'idUsuario' => session('email'), 'accion' => "Eliminamos beneficiarios", ];
        $acceso = Acciones::create($accion);
        return response()->json(['success' => true, 'message' => 'Registro eliminada correctamente.']);
    }
}
