<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UsersUpdateRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Http\Response;

/* insertamos los valores de acciones y accesos */
use App\Models\Acceso;
use App\Models\Acciones;

class AuthController extends Controller
{

    /* incio de la seccion */
    public function index(){
        $usuarios = User::all();
        return response()->view('usuarios.index' , compact('usuarios'));
    }

    /* funcion para agregar nuevo usuario */
    public function crear(Request $request): JsonResponse{

        $data = [  ];
        /* $data[''] = !empty($request->post('')) ? $request->post('') : 0; */
        $data['name'] = !empty($request->post('name')) ? $request->post('name') :0;
        $data['email'] = !empty($request->post('email')) ? $request->post('email') :0;
        $data['password'] = !empty($request->post('password')) ? $request->post('password') :0;
        $data['idEmpresa'] = !empty($request->post('idEmpresa')) ? $request->post('idEmpresa') :0;
        $data['banco'] = !empty($request->post('banco')) ? $request->post('banco') :0;
        $data['archivo'] = !empty($request->post('archivo')) ? $request->post('archivo') :0;
        $data['cuenta'] = !empty($request->post('cuenta')) ? $request->post('cuenta') :0;
        $data['permisos'] = !empty($request->post('permisos')) ? $request->post('permisos') :0;
        $data['tipo'] = !empty($request->post('tipo')) ? $request->post('tipo') :0;
        $data['estatus'] = 1;
        $data['active'] = 1;
        $data['observaciones'] = !empty($request->post('observaciones')) ? $request->post('observaciones') :0;
        $data['usuarioCadena'] = !empty($request->post('usuarioCadena')) ? $request->post('usuarioCadena') :0;


        /* $data['idUsuario'] = session('email'); */
        $user = User::create($data);
        /* agregamos el accion */
        $accion = [ 'idUsuario' => session('email'), 'accion' => "Creación de usuario", ];
        $acceso = Acciones::create($accion);

        return response()->json(['message' => 'Acción realizada']);

    }

    /* funcion para editar el informacion del usuario */
    public function editarValores(Request $request, $id){

        /* validamos los valores antes de crear y en caso de que no tenga contenido le ponemos cero */
        $data = [ ];
        /* if ($request->post('') != "") { $data[''] = $request->post(''); } */

        if($request->post('name') != "") { $data['name'] = $request->post('name');}
        if($request->post('email') != "") { $data['email'] = $request->post('email');}
        if($request->post('password') != "") { $data['password'] = $request->post('password');}
        if($request->post('idEmpresa') != "") { $data['idEmpresa'] = $request->post('idEmpresa');}
        if($request->post('tipo') != "") { $data['tipo'] = $request->post('tipo');}
        if($request->post('banco') != "") { $data['banco'] = $request->post('banco');}
        if($request->post('cuenta') != "") { $data['cuenta'] = $request->post('cuenta');}
        if($request->post('observaciones') != "") { $data['observaciones'] = $request->post('observaciones');}
        if($request->post('permisos') != "") { $data['permisos'] = $request->post('permisos');}
        if($request->post('archivo') != "") { $data['archivo'] = $request->post('archivo');}
        if($request->post('usuarioCadena') != "") { $data['usuarioCadena'] = $request->post('usuarioCadena');}

       /*  $data['idUsuario'] = session('email'); */

        // Actualizar el registro
        $updated = User::where('id', $id)->update($data);

        /* agregamos el accion */
        $accion = [ 'idUsuario' => session('email'), 'accion' => "Edicion de usuario", ];
        $acceso = Acciones::create($accion);

        return response()->json(['success' => true, 'message' => 'Registro editado correctamente.']);


    }

    /* funcion para cmabiar el estatus del usuario */
    public function editarEs(Request $request, $id){

        // Encuentra el registro por su ID
        $empresa = User::find($id);
        if (!$empresa) {
            return response()->json(['success' => false, 'message' => 'Registro no encontrado.'], 404);
        }

        // Cambiar el estatus
        $estatus = $request->post('estatusBaja');
       /*  if($estatus ==1){$estatusFinal = 2}
        if($estatus ==1){$estatusFinal = 2} */
        $estatusFinal = ($estatus == 1) ? 2 : (($estatus == 2) ? 1 : null);
        if ($estatusFinal === null) {
            return response()->json(['success' => false, 'message' => 'Estatus inválido.'], 400);
        }

        // Actualizar el registro
        $empresa->update(['estatus' => $estatusFinal]);

        /* agregamos el accion */
        $accion = [ 'idUsuario' => session('email'), 'accion' => "Baja o alta de usuario", ];
        $acceso = Acciones::create($accion);

        return response()->json(['success' => true, 'message' => 'Registro editado correctamente.']);
    }

    /* funcion para login  */
    public function login(Request $request){
        $credenciales = [
            'email' => $request->input('email'),
            'password' => $request->input('password'),
        ];
        $remember = ($request->has('remember') ? true: false);

        if (Auth::attempt($credenciales, $request->has('remember'))) {
            if(Auth::user()->estatus == 1){
                $request->session()->regenerate();
                /* creamos las variables de session para uso interno */
                session(['id' => Auth::id()]);
                session(['name' => Auth::user()->name]);
                session(['email' => Auth::user()->email]);
                session(['idEmpresa' => Auth::user()->idEmpresa]);
                session(['tipo' => Auth::user()->tipo]);
                session(['permisos' => Auth::user()->permisos]);
                session(['archivo' => Auth::user()->archivo]);
                session(['usuarioCadena' => Auth::user()->usuarioCadena]);

                /* agregamos el ingreso al sistemna */
                $datosAcceso = request()->ip()." / ".request()->header('User-Agent');
                $accesoData = [
                    'idUsuario' => $request->input('email'),
                    'acceso' => $datosAcceso,
                    'accion' => "Ingreso",
                ];
                $acceso = Acceso::create($accesoData);

                return redirect()->intended(route('portada'));
            }
            else{ return redirect('loginEr'); }

        }
        else{ return redirect('loginEr');  }

    }

    /* funcion apra salir de la aplicacion */
    public function logout(Request $request){
        /* agregamos el salida al sistemna */
        $datosAcceso = request()->ip()." / ".request()->header('User-Agent');
        $accesoData = [
            'idUsuario' => session('email'),
            'acceso' => $datosAcceso,
            'accion' => "Salida",
        ];
        $acceso = Acceso::create($accesoData);
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect(route('loginEr'));

    }

    /* catalogo de agentes */
    public function relacionAgente(){
        $agentes = User::where('tipo', 'Ejecutivo')->get();
        return response()->json(['message' => 'Accion realizada', 'data' => $agentes]);
    }

    /* catalogo de encuestadores */
    public function relacionEncuestadores(){
        $encuestadores = User::where('tipo', 'Encuestador')->get();
        return response()->json(['message' => 'Accion realizada', 'data' => $encuestadores]);
    }

    /* catalogo de clientes */
    public function relacionClientes(){
        $excluidos = ['Administrador', 'Coordinador', 'Ejecutivo', 'Encuestador'];
        $usuarios = User::whereNotIn('tipo', $excluidos)->get();
        return response()->json(['message' => 'Accion realizada', 'data' => $usuarios]);
    }

    /* funcion para traer los usuario de la misma empresa */
    public function relacionClientesEmpresa(){

        $estudios = User::where('estatus', 1)
        ->where('idEmpresa', session('idEmpresa'))
        ->where('tipo', "Cliente")
        ->get();

        return response()->json(['message' => 'Accion realizada', 'data' => $estudios]);
    }


}
