<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmpresasStoreRequest;
use App\Http\Requests\EmpresasUpdateRequest;
use App\Models\Empresas;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use App\Models\Acciones;

class EmpresasController extends Controller
{
    /* incio de la seccion */
    public function index(){
        $empresas = Empresas::all();
        return response()->view('empresas.index' , compact('empresas'));
    }

    /* funcion par acrear un registro */
    public function crear(Request $request): JsonResponse {

        $data = [  ];
        /* $data[''] = !empty($request->post('')) ? $request->post('') : 0; */
        $data['nombre'] = !empty($request->post('nombre')) ? $request->post('nombre') :0;
        $data['direccion'] = !empty($request->post('direccion')) ? $request->post('direccion') :0;
        $data['telefono'] = !empty($request->post('telefono')) ? $request->post('telefono') :0;
        $data['correo'] = !empty($request->post('correo')) ? $request->post('correo') :0;
        $data['contacto'] = !empty($request->post('contacto')) ? $request->post('contacto') :0;
        $data['paginaWeb'] = !empty($request->post('paginaWeb')) ? $request->post('paginaWeb') :0;
        $data['comentarios'] = !empty($request->post('comentarios')) ? $request->post('comentarios') :0;

        $data['idUsuario'] = session('email');
        $user = Empresas::create($data);

        /* agregamos el accion */
        $accion = [ 'idUsuario' => session('email'), 'accion' => "Creación de empresas", ];
        $acceso = Acciones::create($accion);

        return response()->json(['message' => 'Acción realizada']);

    }

    /* editar registro */
    public function editar(Request $request, $id)
    {

        /* validamos los valores antes de crear y en caso de que no tenga contenido le ponemos cero */
        $data = [ ];
        /* if ($request->post('') != "") { $data[''] = $request->post(''); } */

        if($request->get('nombre') != "") { $data['nombre'] = $request->get('nombre');}
        if($request->get('direccion') != "") { $data['direccion'] = $request->get('direccion');}
        if($request->get('telefono') != "") { $data['telefono'] = $request->get('telefono');}
        if($request->get('correo') != "") { $data['correo'] = $request->get('correo');}
        if($request->get('contacto') != "") { $data['contacto'] = $request->get('contacto');}
        if($request->get('paginaWeb') != "") { $data['paginaWeb'] = $request->get('paginaWeb');}
        if($request->get('comentarios') != "") { $data['comentarios'] = $request->get('comentarios');}


        if ($request->get('idEstudio') != "") { $data['idEstudio'] = $request->get('idEstudio'); }

        $data['idUsuario'] = session('email');

        // Actualizar el registro
        $updated = Empresas::where('id', $id)->update($data);

        /* agregamos el accion */
        $accion = [ 'idUsuario' => session('email'), 'accion' => "Edicion de concluciones", ];
        $acceso = Acciones::create($accion);

        return response()->json(['success' => true, 'message' => 'Registro editado correctamente.']);


    }

    /* eliminar registro */
    public function eliminar($id)  {
        $empresa = Empresas::findOrFail($id); // Busca la empresa por ID
        $empresa->delete(); // Elimina la empresa
        /* agregamos el accion */
        $accion = [ 'idUsuario' => session('email'), 'accion' => "Eliminamos empresa", ];
        $acceso = Acciones::create($accion);
        return response()->json(['success' => true, 'message' => 'Registro eliminada correctamente.']);
    }

    /* relacionde empresas para mostrar */
    public function relaciondeEmpresas(){
        $empresas = Empresas::all();
        return response()->json(['message' => 'Accion realizada', 'data' => $empresas]);
    }



}
