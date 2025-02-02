<?php

namespace App\Http\Controllers;

use App\Http\Requests\EstudiosStoreRequest;
use App\Http\Requests\EstudiosUpdateRequest;
use App\Models\Estudios;
use App\Models\Empresas;
use App\Models\User;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

/* declaramos modelos extras para guardar informacion en otras tablas */
use App\Models\Acciones;
use App\Models\Redes;
use App\Models\Refepersonales;
use App\Models\Deudas;
use App\Models\Refelaborales;
use App\Models\Conductasocial;
use App\Models\Estructurafamiliar;
use App\Models\Domicilio;
use App\Models\Situacion;
use App\Models\Entornohabitacional;


class EstudiosController extends Controller
{

    /* ingreso a la seccion */
    public function index(){
        /* $estudios = Estudios::where('id',$id)->get(); */
        /* delimitamos las consultas de los estudios dependiendo de los perfiles */
        /* administrado */
        if(session('tipo') == 'Administrador'){
            $estudios = Estudios::whereNotIn('estatus', [3, 4])->get();
        }
        /* coordinador */
        if(session('tipo') == 'Coordinador'){
            $estudios = Estudios::whereNotIn('estatus', [3, 4])->get();
        }
        /* ejecutivo */
        if(session('tipo') == 'Ejecutivo'){
            $estudios = Estudios::whereNotIn('estatus', [3, 4])
            ->where('realizo', 'like', '%' . session('email') . '%')
            ->get();
        }
        /* encuestador */
        if(session('tipo') == 'Encuestador'){
            $estudios = Estudios::whereNotIn('estatus', [3, 4])
            ->where('encuestador', 'like', '%' . session('email') . '%')
            ->get();
        }
        /* cliente admin */
        if(session('tipo') == 'Cliente Admin'){
            $estudios = Estudios::whereNotIn('estatus', [3, 4])
            ->where('idEmpresa', 'like', '%' . session('idEmpresa') . '%')
            ->get();
        }
        /* cliente coordinador */
        if(session('tipo') == 'Cliente Coordinador'){

            $correos = [session('usuarioCadena'),"'".session('email')."'"];

            if(empty($correos) || count($correos) == 0) {

                $estudios = Estudios::whereNotIn('estatus', [3, 4])
                ->where('idEmpresa', 'like', '%' . session('idEmpresa') . '%')
                ->where('idUsuario', 'like', '%' . session('email') . '%')
                /* ->where('idEmpresa', session('idEmpresa'))
                ->where('idUsuario', session('email')) */
                ->get();
            }
            else{
                $estudios = Estudios::whereNotIn('estatus', [3, 4])
                ->where('idEmpresa', 'like', '%' . session('idEmpresa') . '%')
                ->whereIn('idUsuario', $correos)
                ->get();
            }


        }
        /* cliente */
        if(session('tipo') == 'Cliente'){
            $estudios = Estudios::whereNotIn('estatus', [3, 4])
            ->where('idEmpresa', 'like', '%' . session('idEmpresa') . '%')
            ->where('idUsuario', 'like', '%' . session('email') . '%')
            ->get();
        }

        /*
        $estudios = Estudios::whereNotIn('estatus', [3, 4])->get(); */
        return response()->view('estudio.index' , compact('estudios'));
    }

     /* ingreso a la excel */
     public function excel(){
        /* $estudios = Estudios::where('id',$id)->get(); */
        /* aqui vamos a ahacer la consulta dependiendo del perfil  */
        /* adminsitrador */
        /* cliente */
        /* Cliente Admin */
        $estudios = Estudios::whereNotIn('estatus', [3, 4])->get();
        return response()->view('estudio.excel' , compact('estudios'));
    }

    /* estudios terminados */
    public function terminados(){
        /* administrado */
        if(session('tipo') == 'Administrador'){
            $estudios = Estudios::where('estatus', 3)->get();
        }
        /* coordinador */
        if(session('tipo') == 'Coordinador'){
            $estudios = Estudios::where('estatus', 3)->get();
        }
        /* ejecutivo */
        if(session('tipo') == 'Ejecutivo'){
            $estudios = Estudios::where('estatus', 3)
            ->where('realizo', session('email'))
            ->get();
        }
        /* encuestador */
        if(session('tipo') == 'Encuestador'){
            $estudios = Estudios::where('estatus', 3)
            ->where('encuestador', session('email'))
            ->get();
        }
        /* cliente admin */
        if(session('tipo') == 'Cliente Admin'){
            $estudios = Estudios::where('estatus', 3)
            ->where('idEmpresa', session('idEmpresa'))
            ->get();
        }
        /* cliente coordinador */
        if(session('tipo') == 'Cliente Coordinador'){
            $estudios = Estudios::where('estatus', 3)
            ->where('idEmpresa', session('idEmpresa'))
            ->whereIn('idUsuario', session('usuarioCadena'))
            ->get();
        }
        /* cliente */
        if(session('tipo') == 'Cliente'){
            $estudios = Estudios::where('estatus', 3)
            ->where('idEmpresa', session('idEmpresa'))
            ->where('idUsuario', session('email'))
            ->get();
        }
       /*  $estudios = Estudios::where('estatus', 3)->get(); */
        return response()->view('estudio.terminados' , compact('estudios'));
    }

    /* estudios cancelados */
    public function canceladosTotal(){
        $estudios = Estudios::where('estatus', 4)->get();
        return response()->view('estudio.cancelados' , compact('estudios'));
    }

    /* funcion para crear estudio */
    public function crear(Request $request): JsonResponse{
        /* validamos los valores antes de crear y en caso de que no tenga contenido le ponemos cero */
        $data = [ ];

        $data['idUsuario'] = !empty($request->post('idUsuario')) ? $request->post('idUsuario') : session('email');

        $data['idEmpresa'] = !empty($request->post('idEmpresa')) ? $request->post('idEmpresa') : 0;
        $data['nombreCandidato'] = !empty($request->post('nombreCandidato')) ? $request->post('nombreCandidato') : 0;
        $data['apePaterno'] = !empty($request->post('apePaterno')) ? $request->post('apePaterno') : 0;
        $data['apeMaterno'] = !empty($request->post('apeMaterno')) ? $request->post('apeMaterno') : 0;
        $data['puesto'] = !empty($request->post('puesto')) ? $request->post('puesto') : 0;
        $data['fechaSolicitud'] = !empty($request->post('fechaSolicitud')) ? $request->post('fechaSolicitud') : date('Y-m-d H:i:s');
        if($request->post('realizo') == "" ){ $data['estatus'] = 1;  }
        else{ $data['estatus'] = 2; }

        $data['rfc'] = !empty($request->post('rfc')) ? $request->post('rfc') : 0;
        $data['curp'] = !empty($request->post('curp')) ? $request->post('curp') : 0;
        $data['motivoCancelacion'] = !empty($request->post('motivoCancelacion')) ? $request->post('motivoCancelacion') : 0;
        $data['fechaCancelacion'] = !empty($request->post('fechaCancelacion')) ? $request->post('fechaCancelacion')  : 0;
        $data['usuarioCancela'] = !empty($request->post('usuarioCancela')) ? $request->post('usuarioCancela' ): 0;
        $data['archivo'] = !empty($request->post('archivo')) ? $request->post('archivo' ): 0;
        $data['encuestador'] = !empty($request->post('encuestador')) ? $request->post('encuestador' ): 0;
        $data['fechaCita'] = !empty($request->post('fechaCita')) ? $request->post('fechaCita' ): 0;
        $data['horacita'] = !empty($request->post('horacita')) ? $request->post('horacita' ): 0;
        $data['llamadaEmergencia'] = !empty($request->post('llamadaEmergencia')) ? $request->post('llamadaEmergencia' ): 0;
        $data['parentesco'] = !empty($request->post('parentesco')) ? $request->post('parentesco'): 0;
        $data['telEmergencia'] = !empty($request->post('telEmergencia')) ? $request->post('telEmergencia' ): 0;
        $data['nss'] = !empty($request->post('nss')) ? $request->post('nss' ): 0;
        $data['tiposervicio'] = !empty($request->post('tiposervicio') )? $request->post('tiposervicio' ): 0;
        $data['telefono'] = !empty($request->post('telefono') )? $request->post('telefono' ): 0;
        $data['correo'] = !empty($request->post('correo') )? $request->post('correo' ): 0;
        $data['sexo'] = !empty($request->post('sexo') )? $request->post('sexo' ): 0;
        $data['edad'] = !empty($request->post('edad') )? $request->post('edad' ): 0;
        $data['estadoCivil'] = !empty($request->post('estadoCivil') )? $request->post('estadoCivil' ): 0;
        $data['lugarNacimiento'] = !empty($request->post('lugarNacimiento') )? $request->post('lugarNacimiento' ): 0;
        $data['fechaNacimiento'] = !empty($request->post('fechaNacimiento') )? $request->post('fechaNacimiento' ): 0;
        $data['escolaridad'] = !empty($request->post('escolaridad') )? $request->post('escolaridad' ): 0;
        $data['hijos'] = !empty($request->post('hijos') )? $request->post('hijos' ): 0;
        $data['nacionalidad'] = !empty($request->post('nacionalidad')) ? $request->post('nacionalidad' ): 0;
        $data['viveCon'] = !empty($request->post('viveCon') )? $request->post('viveCon' ): 0;
        $data['direccion'] = !empty($request->post('direccion') )? $request->post('direccion' ): 0;
        $data['celular'] = !empty($request->post('celular')) ? $request->post('celular' ): 0;
        $data['otroContacto'] = !empty($request->post('otroContacto')) ? $request->post('otroContacto' ): 0;
        $data['infonavit'] = !empty($request->post('infonavit') )? $request->post('infonavit' ): 0;
        $data['fonacot'] = !empty($request->post('fonacot') )? $request->post('fonacot' ): 0;
        $data['cv'] = !empty($request->post('cv')) ? $request->post('cv') : 0;
        $data['clincaImss'] = !empty($request->post('clincaImss') )? $request->post('clincaImss') : 0;
        $data['realizo'] = !empty($request->post('realizo') )? $request->post('realizo') : 0;
        $data['verDocumentosReporte'] = !empty($request->post('verDocumentosReporte') )? $request->post('verDocumentosReporte') : 0;


        $user = Estudios::create($data);
       /* agregamos el accion */
       $accion = [ 'idUsuario' => session('email'), 'accion' => "Creación de estudio", ];
       $acceso = Acciones::create($accion);

       return response()->json(['message' => 'Acción realizada']);

    }

    /* funcion para la edicion de estudios */
    public function editar($id){
        $estudios = Estudios::where('id',$id)->get();
        return response()->view('estudio.editar', compact('estudios'));
    }

    /* funcion para la edicion del estudio por parte del cliente */
    public function editaEstudioCliente(Request $request, $id){

        $empresa = Estudios::find($id);
        /* validamos los valores antes de crear y en caso de que no tenga contenido le ponemos cero */
        $data = [ ];

        if ($request->post('nombreCandidato') != "") { $data['nombreCandidato'] = $request->post('nombreCandidato'); }
        if ($request->post('apePaterno') != "") { $data['apePaterno'] = $request->post('apePaterno'); }
        if ($request->post('apeMaterno') != "") { $data['apeMaterno'] = $request->post('apeMaterno'); }
        if ($request->post('puesto') != "") { $data['puesto'] = $request->post('puesto'); }
        if ($request->post('fechaSolicitud') != "") { $data['fechaSolicitud'] = $request->post('fechaSolicitud'); }
        if ($request->post('rfc') != "") { $data['rfc'] = $request->post('rfc'); }
        if ($request->post('curp') != "") { $data['curp'] = $request->post('curp'); }
        if ($request->post('archivo') != "") { $data['archivo'] = $request->post('archivo'); }
        if ($request->post('encuestador') != "") { $data['encuestador'] = $request->post('encuestador'); }
        if ($request->post('llamadaEmergencia') != "") { $data['llamadaEmergencia'] = $request->post('llamadaEmergencia'); }
        if ($request->post('parentesco') != "") { $data['parentesco'] = $request->post('parentesco'); }
        if ($request->post('telEmergencia') != "") { $data['telEmergencia'] = $request->post('telEmergencia'); }
        if ($request->post('nss') != "") { $data['nss'] = $request->post('nss'); }
        if ($request->post('tiposervicio') != "") { $data['tiposervicio'] = $request->post('tiposervicio'); }
        if ($request->post('telefono') != "") { $data['telefono'] = $request->post('telefono'); }
        if ($request->post('correo') != "") { $data['correo'] = $request->post('correo'); }
        if ($request->post('sexo') != "") { $data['sexo'] = $request->post('sexo'); }
        if ($request->post('edad') != "") { $data['edad'] = $request->post('edad'); }
        if ($request->post('estadoCivil') != "") { $data['estadoCivil'] = $request->post('estadoCivil'); }
        if ($request->post('lugarNacimiento') != "") { $data['lugarNacimiento'] = $request->post('lugarNacimiento'); }
        if ($request->post('fechaNacimiento') != "") { $data['fechaNacimiento'] = $request->post('fechaNacimiento'); }
        if ($request->post('escolaridad') != "") { $data['escolaridad'] = $request->post('escolaridad'); }
        if ($request->post('hijos') != "") { $data['hijos'] = $request->post('hijos'); }
        if ($request->post('nacionalidad') != "") { $data['nacionalidad'] = $request->post('nacionalidad'); }
        if ($request->post('viveCon') != "") { $data['viveCon'] = $request->post('viveCon'); }
        if ($request->post('direccion') != "") { $data['direccion'] = $request->post('direccion'); }
        if ($request->post('celular') != "") { $data['celular'] = $request->post('celular'); }
        if ($request->post('otroContacto') != "") { $data['otroContacto'] = $request->post('otroContacto'); }
        if ($request->post('infonavit') != "") { $data['infonavit'] = $request->post('infonavit'); }
        if ($request->post('fonacot') != "") { $data['fonacot'] = $request->post('fonacot'); }
        if ($request->post('cv') != "") { $data['cv'] = $request->post('cv'); }
        if ($request->post('clincaImss') != "") { $data['clincaImss'] = $request->post('clincaImss'); }
        if($request->post('realizo') == "" ){ $data['estatus'] = 1;  }
        else{ $data['estatus'] = 2; }
        if ($request->post('realizo') != "") { $data['realizo'] = $request->post('realizo'); }
        if ($request->post('idEmpresa') != "") { $data['idEmpresa'] = $request->post('idEmpresa'); }
        if ($request->post('encuestador') != "") { $data['encuestador'] = $request->post('encuestador'); }



        // Actualizar el registro
        $empresa->update($data);

        /* agregamos el accion */
        $accion = [ 'idUsuario' => session('email'), 'accion' => "Edicion de usuario por cliente", ];
        $acceso = Acciones::create($accion);

        return response()->json(['success' => true, 'message' => 'Registro editado correctamente.']);
    }

    /* funcion para cancelar el estudio por parte del cliente */
    public function canceCliente(Request $request, $id){

        $empresa = Estudios::find($id);
        /* validamos los valores antes de crear y en caso de que no tenga contenido le ponemos cero */
        $data = [
            'motivoCancelacion' => $request->post('motivoCancelacion'),
            'fechaCancelacion' => date('Y-m-d'),
            'usuarioCancela' => session('email'),
            'estatus' => 4
        ];

        // Actualizar el registro
        $empresa->update($data);

        /* agregamos el accion */
        $accion = [ 'idUsuario' => session('email'), 'accion' => "Cancelacion de estudio", ];
        $acceso = Acciones::create($accion);

        return response()->json(['success' => true, 'message' => 'Registro cancelado correctamente.']);
    }

    /* funcion para cancelar el estudio por parte del cliente */
    public function terminarEstudio(Request $request, $id){

        $empresa = Estudios::find($id);
        /* validamos los valores antes de crear y en caso de que no tenga contenido le ponemos cero */
        $data = [
            'estatus' =>3
        ];

        // Actualizar el registro
        $empresa->update($data);

        /* agregamos el accion */
        $accion = [ 'idUsuario' => session('email'), 'accion' => "Terminar estudio", ];
        $acceso = Acciones::create($accion);

        return response()->json(['success' => true, 'message' => 'Registro terminado correctamente.']);
    }

    /* funcion para activar o desactivar los documentos en el reporte */
    public function verdocumen(Request $request, $id){
        $empresa = Estudios::find($id);

        if( $request->post('valor') == 1){
            $estatusvalor = 0;
        }
        if( $request->post('valor') == 0){
            $estatusvalor = 1;
        }

        /* validamos los valores antes de crear y en caso de que no tenga contenido le ponemos cero */
        $data = [
            'verDocumentosReporte' => $estatusvalor
        ];

        // Actualizar el registro
        $empresa->update($data);

        /* agregamos el accion */
        $accion = [ 'idUsuario' => session('email'), 'accion' => "Activar documentos en reporte", ];
        $acceso = Acciones::create($accion);

        return response()->json(['success' => true, 'message' => 'Registro correctamente.']);
    }

    /* funcion para reporte */
    public function reporte(Request $request, $id){

        return response()->view('estudio.reporte' , compact('id'));
    }

    /* funcion para traer valores para el reporte*/
    public function muestroReporte($id){
        // Buscar registros con el idEstudio especificado
        $estudios = Estudios::where('id', $id)->get();

        // Devolver los resultados como un JSON
        return response()->json([
            'success' => true,
            'data' => $estudios
        ]);
    }

    /* funcion para mostrar los estudios en portada dependiendo del usuario y la empresa */
    public function estudiosPortada(Request $request){}

    /* funcion para cargar el contenido del excel */
    public function cargoexcel(Request $request){

        /* /////////////////////////////////////////////////////////////////////////////////////////// */
        /* RTECIBIMOS INFORMACION Y DISTRIBUIMOS */
        $datos1 = json_decode($request->post('uno'));
        $datos2 = json_decode($request->post('dos'));
        $datos3 = json_decode($request->post('tres'));
        $datos4 = json_decode($request->post('cuatro'));
        $datos5 = json_decode($request->post('cinco'));
        $datos6 = json_decode($request->post('seis'));
        $datos7 = json_decode($request->post('siete'));
        $datos8 = json_decode($request->post('ocho'));
        $datos9 = json_decode($request->post('nueve'));
        $datos10 = json_decode($request->post('diez'));
         $idEstudio = str_replace ( '"', '', $request->post('nombre'));
        /* $idEstudio = 16; */
        $datos11 = json_decode($request->post('once'));
        $datos12 = json_decode($request->post('doce'));
        /*  print_r( $datos4); */
         /* /////////////////////////////////////////////////////////////////////////////////////////// */

        /* /////////////////////////////////////////////////////////////////////////////////////////// */
        /* INFORMACION GENERAL */
        $uno1 = $datos1[1][0] ;
        $dos1 = $datos1[1][1];
        $tres1 = $datos1[1][2];
        $cuatro1 = $datos1[1][3];
        $cinco1 = $datos1[1][4];
        $seis1 = $datos1[1][5];
        $siete1 = $datos1[1][6];
        $ocho1 = $datos1[1][7];
        $nueve1 = $datos1[1][8];
        $diez1 = $datos1[1][9];
        $once1 = $datos1[1][10];
        $uno2=$datos2[1][0];
        $dos2=$datos2[1][1];
        $tres2=$datos2[1][2];
        $cuatro2=$datos2[1][3];
        $cinco2=$datos2[1][4];
        $seis2=$datos2[1][5];
        $siete2=$datos2[1][6];
        $ocho2=$datos2[1][7];
        $nueve2=$datos2[1][8];

        $estudiosGenerales = Estudios::find($idEstudio);
        /* validamos los valores antes de crear y en caso de que no tenga contenido le ponemos cero */
        $data = [ ];
        if ($uno1 != "") { $data['nombreCandidato'] = $uno1; }
        if ($dos1 != "") { $data['apePaterno'] = $dos1; }
        if ($tres1 != "") { $data['apeMaterno'] = $tres1; }
        if ($cuatro1 != "") { $data['puesto'] = $cuatro1; }
        if ($cinco1 != "") { $data['rfc'] = $cinco1; }
        if ($seis1 != "") { $data['curp'] = $seis1; }
        if ($siete1 != "") { $data['fechaCita'] = $siete1; }
        if ($ocho1 != "") { $data['horacita'] = $ocho1; }
        if ($nueve1 != "") { $data['nss'] = $nueve1; }
        if ($diez1 != "") { $data['telefono'] = $diez1; }
        if ($once1 != "") { $data['correo'] = $once1; }
        if ($uno2 != "") { $data['sexo'] = $uno2; }
        if ($dos2 != "") { $data['edad'] = $dos2; }
        if ($tres2 != "") { $data['estadoCivil'] = $tres2; }
        if ($cuatro2 != "") { $data['lugarNacimiento'] = $cuatro2; }
        if ($cinco2 != "") { $data['fechaNacimiento'] = $cinco2; }
        if ($seis2 != "") { $data['escolaridad'] = $seis2; }
        if ($siete2 != "") { $data['llamadaEmergencia'] = $siete2; }
        if ($ocho2 != "") { $data['parentesco'] = $ocho2; }
        if ($nueve2 != "") { $data['telEmergencia'] = $nueve2; }

        // Actualizar el registro
        $estudiosGenerales->update($data);
        /* /////////////////////////////////////////////////////////////////////////////////////////// */

        /* /////////////////////////////////////////////////////////////////////////////////////////// */
        /* REDES */
        $uno3 =$datos3[1][0] == ""? "0" : $datos3[1][0];
        $dos3 =$datos3[1][1] == ""? "0" : $datos3[1][1];
        $tres3 =$datos3[1][2] == ""? "0" : $datos3[1][2];
        $cuatro3 =$datos3[1][3] == ""? "0" : $datos3[1][3];
        $data = [  ];
        $data['idEstudio'] = $idEstudio;
        $data['facebook'] = $uno3;
        $data['twitter'] = $dos3;
        $data['instagram'] = $tres3;
        $data['linkedin'] = $cuatro3;
        $data['idUsuario'] = session('email');
        $user = Redes::create($data);
        /* /////////////////////////////////////////////////////////////////////////////////////////// */

        /* /////////////////////////////////////////////////////////////////////////////////////////// */
        /* REFERENCIAS PERSONALES */
        $array_num = count($datos4);
        for ($i = 1; $i < $array_num; ++$i){

            if (empty($datos5[$i])) {break; }

            $uno4=$datos4[$i][0];
            $dos4=$datos4[$i][1];
            $tres4=$datos4[$i][2];
            $cuatro4=$datos4[$i][3];
            $cinco4=$datos4[$i][4];
            $seis4=$datos4[$i][5];

            $data = [  ];
            $data['idEstudio'] = $idEstudio;
            $data['nombre'] = $uno4;
            $data['tiempoConocerlo'] = $dos4;
            $data['relacion'] = $tres4;
            $data['domicilio'] = $cuatro4;
            $data['tel1'] = $cinco4;
            $data['opinion'] = $seis4;

            $data['idUsuario'] = session('email');
            $user = Refepersonales::create($data);

        }
        /* /////////////////////////////////////////////////////////////////////////////////////////// */
        /* /////////////////////////////////////////////////////////////////////////////////////////// */
        /* REFERENCIAS LABORALES */
        $array_numm = count($datos5[1]);

        for ($ii = 1; $ii < $array_numm; ++$ii){

            if (empty($datos5[$ii])) {break; }

            $data = [ ];

            $uno5=$datos5[$ii][0];
            $dos5=$datos5[$ii][1];
            $tres5=$datos5[$ii][2];
            $cuatro5=$datos5[$ii][3];
            $cinco5=$datos5[$ii][4];
            $seis5=$datos5[$ii][5];
            $siete5=$datos5[$ii][6];
            $ocho5=$datos5[$ii][7];
            $nueve5=$datos5[$ii][8];
            $diez5=$datos5[$ii][9];
            $once5=$datos5[$ii][10];
            $doce5=$datos5[$ii][11];
            $trece5=$datos5[$ii][12];
            $catorce5=$datos5[$ii][13];
            $quince5=$datos5[$ii][14];
            $diezyseis5=$datos5[$ii][15];
            $diezysiete5=$datos5[$ii][16];
            $diezyocho5=$datos5[$ii][17];
            $diezynueve5=$datos5[$ii][18];

            $data['idEstudio'] = $idEstudio;
            $data['empresa'] = $uno5;
            $data['giro'] = $dos5;
            $data['direccion'] = $tres5;
            $data['telefono'] = $cuatro5;
            $data['fechaIngreso'] = $cinco5;
            $data['fechaEgreso'] = $seis5;
            $data['puesto'] = $siete5;
            $data['area'] = $ocho5;
            $data['salario'] = $nueve5;
            $data['motivoSalida'] = $diez5;
            $data['quienProporciono'] = $once5;
            $data['puestoProporciono'] = $doce5;
            $data['calificacion'] = $trece5;
            $data['demanda'] = $catorce5;
            $data['volveria'] = $quince5;
            $data['porque'] = $diezyseis5;
            $data['observaciones'] = $diezysiete5;
            $data['idUsuario'] = session('email');
            $data['candidatoes'] = $diezyocho5;
            $data['periodosInactivo'] = $diezynueve5;


            // Actualizar el registro
            $user = Refelaborales::create($data);
        }
        /* /////////////////////////////////////////////////////////////////////////////////////////// */

        /* /////////////////////////////////////////////////////////////////////////////////////////// */
        /* DEUDAS */

        $uno6=$datos6[1][0];
        $dos6=$datos6[1][1];
        $tres6=$datos6[1][2];
        $cuatro6=$datos6[1][3];
        $cinco6=$datos6[1][4];
        $seis6=$datos6[1][5];
        $siete6=$datos6[1][6];
        $ocho6=$datos6[1][7];
        $nueve6=$datos6[1][8];
        $diez6=$datos6[1][9];
        $once6=$datos6[1][10];
        $doce6=$datos6[1][11];
        $trece6=$datos6[1][12];
        $catorce6=$datos6[1][13];
        $quince6=$datos6[1][14];
        $diezyseis6=$datos6[1][15];
        $diezysiete6=$datos6[1][16];
        $diezyocho6=$datos6[1][17];

        $data = [ ];
        $data['idEstudio'] = $idEstudio;
        $data['cuentaDeuda'] = $uno6;
        $data['conQuien'] = $dos6;
        $data['monto'] = $tres6;
        $data['abonoMensual'] = $cuatro6;
        $data['apagaren'] = $cinco6;
        $data['cuentaauto'] = $seis6;
        $data['modelo'] = $siete6;
        $data['placas'] = $ocho6;
        $data['valorAuto'] = $nueve6;
        $data['propiedad'] = $diez6;
        $data['ubicacon'] = $once6;
        $data['tarjetaCredito'] = $doce6;
        $data['bancotarjetaCredito'] = $trece6;
        $data['creditoAutorizado'] = $catorce6;
        $data['tarjetaTienda'] = $quince6;
        $data['conquienTienda'] = $diezyseis6;
        $data['creditoAutorizadotienda'] = $diezysiete6;
        $data['observaciones'] = $diezyocho6;

        $data['idUsuario'] = session('email');
        $user = Deudas::create($data);

        /* /////////////////////////////////////////////////////////////////////////////////////////// */

        /* /////////////////////////////////////////////////////////////////////////////////////////// */
        /* CONDUCTA SOCIAL */
        $uno7=$datos7[1][0];
        $dos7=$datos7[1][1];
        $tres7=$datos7[1][2];
        $cuatro7=$datos7[1][3];
        $cinco7=$datos7[1][4];
        $seis7=$datos7[1][5];
        $siete7=$datos7[1][6];
        $data = [ ];
        $data['idEstudio'] = $idEstudio;
        $data['quienEstuvo'] = $uno7;
        $data['conductaEntrevistado'] = $dos7;
        $data['relacionVecinos'] = $tres7;
        $data['pertenecegrupo'] = $cuatro7;
        $data['problemasLegales'] = $cinco7;
        $data['familiarRecluido'] = $seis7;
        $data['familiaresAdentro'] = $siete7;

        $data['idUsuario'] = session('email');
        $user = Conductasocial::create($data);

        /* /////////////////////////////////////////////////////////////////////////////////////////// */
        /* /////////////////////////////////////////////////////////////////////////////////////////// */
        /* ESTRUCTURA FAMILIAR */
        $array_numme = count($datos8[1]);
            for ($iii = 1; $iii < $array_numme; ++$iii){

                if (empty($datos8[$iii])) {break; }

                $uno8=$datos8[$iii][0];
                $dos8=$datos8[$iii][1];
                $tres8=$datos8[$iii][2];
                $cuatro8=$datos8[$iii][3];
                $cinco8=$datos8[$iii][4];
                $seis8=$datos8[$iii][5];
                $siete8=$datos8[$iii][6];
                $ocho8=$datos8[$iii][7];
                $nueve8=$datos8[$iii][8];
                $diez8=$datos8[$iii][9];
                $once8=$datos8[$iii][10];
                $doce8=$datos8[$iii][11];
                $trece8=$datos8[$iii][12];

                if($dos8 != ''){
                    $data = [ ];

                    $data['idEstudio'] = $idEstudio;
                    $data['familiar'] = $uno8;
                    $data['edad'] = $dos8;
                    $data['ocupacion'] = $tres8;
                    $data['laboraEstudia'] = $cuatro8;
                    $data['calle'] = $cinco8;
                    $data['numero'] = $seis8;
                    $data['colonia'] = $siete8;
                    $data['delegacionMunicipio'] = $ocho8;
                    $data['ciudad'] = $nueve8;
                    $data['estado'] = $diez8;
                    $data['cpde'] = $once8;
                    $data['tiempoReside'] = $doce8;
                    $data['tel1'] = $trece8;

                    $data['idUsuario'] = session('email');
                    $user = Estructurafamiliar::create($data);
                }

            }
        /* /////////////////////////////////////////////////////////////////////////////////////////// */

        /* /////////////////////////////////////////////////////////////////////////////////////////// */
        /* DOMICILIO */

        $uno9=$datos9[1][0];
        $dos9=$datos9[1][1];
        $tres9=$datos9[1][2];
        $cuatro9=$datos9[1][3];
        $cinco9=$datos9[1][4];
        $seis9=$datos9[1][5];
        $siete9=$datos9[1][6];
        $ocho9=$datos9[1][7];
        $nueve9=$datos9[1][8];
        $diez9=$datos9[1][9];
        $once9=$datos9[1][10];
        $doce9=$datos9[1][11];

        $data = [ ];

        $data['idEstudio'] = $idEstudio;
        $data['delegacionMunicipio'] = $uno9;
        $data['ciudad'] = $dos9;
        $data['estado'] = $tres9;
        $data['cp'] = $cuatro9;
        $data['tiempoResindir'] = $cinco9;
        $data['tel1'] = $seis9;
        $data['tel2'] = $siete9;
        $data['tel3'] = 0;
        $data['cel1'] = $ocho9;
        $data['cel2'] = $nueve9;
        $data['cel3'] = 0;
        $data['calle'] = $diez9;
        $data['numero'] = $once9;
        $data['colonia'] = $doce9;


        $data['idUsuario'] = session('email');
        $user = Domicilio::create($data);

        /* /////////////////////////////////////////////////////////////////////////////////////////// */


        /* /////////////////////////////////////////////////////////////////////////////////////////// */
        /* ESTRUCTURA FAMILIAR */
        $array_nummeb = count($datos11[1]);
        for ($iu = 1; $iu < $array_nummeb; ++$iu){

            if (empty($datos11[$iu])) {break; }

            $uno11=$datos11[$iu][0];
            $dos11=$datos11[$iu][1];
            $tres11=$datos11[$iu][2];
            $cuatro11=$datos11[$iu][3];
            $cinco11=$datos11[$iu][4];
            $seis11=$datos11[$iu][5];
            $siete11=$datos11[$iu][6];
            $ocho11=$datos11[$iu][7];

            $data = [ ];
            $data['idEstudio'] = $idEstudio;
            $data['nombre'] = $uno11;
            $data['parentesco'] = $dos11;
            $data['salario'] = $tres11;
            $data['ingreso'] = $cuatro11;
            $data['concepto'] = $cinco11;
            $data['egresos'] = $seis11;
            $data['observaciones'] = $siete11;
            $data['superavit'] = $ocho11;

            $data['idUsuario'] = session('email');
            $user = Situacion::create($data);

        }

        /* /////////////////////////////////////////////////////////////////////////////////////////// */
        /* /////////////////////////////////////////////////////////////////////////////////////////// */
        /* ENTORNO */
        $uno10=$datos10[1][0];
        $dos10=$datos10[1][1];
        $tres10=$datos10[1][2];
        $cuatro10=$datos10[1][3];
        $cinco10=$datos10[1][4];
        $seis10=$datos10[1][5];
        $siete10=$datos10[1][6];
        $ocho10=$datos10[1][7];
        $nueve10=$datos10[1][8];
        $diez10=$datos10[1][9];
        $once10=$datos10[1][10];
        $doce10=$datos10[1][11];
        $trece10=$datos10[1][12];
        $catorce10=$datos10[1][13];
        $quince10=$datos10[1][14];
        $diezyseis10=$datos10[1][15];
        $diezysiete10=$datos10[1][16];
        $diezyocho10=$datos10[1][17];
        $diezynueve10=$datos10[1][18];
        $veinte10=$datos10[1][19];
        $veintiuno10=$datos10[1][20];
        $veintidos10=$datos10[1][21];
        $veintitres10=$datos10[1][22];
        $veinticuatro10=$datos10[1][23];
        $veinticinco10=$datos10[1][24];
        $veintiseis10=$datos10[1][25];
        $veintisiete10=$datos10[1][26];
        $veintiocho10=$datos10[1][27];
        $veintinueve10=$datos10[1][28];
        $treinta10=$datos10[1][29];
        $treintayuno10=$datos10[1][30];
        $treintaydos10=$datos10[1][31];
        $treintaytres10=$datos10[1][32];
        $treintaycuatro10=$datos10[1][33];
        $treintaycinco10=$datos10[1][34];
        $treintayseis10=$datos10[1][35];
        $treintaysiete10=$datos10[1][36];
        $treintayocho10=$datos10[1][37];
        $treintaynueve10=$datos10[1][38];
        $cuarenta10=$datos10[1][39];
        $cuarentayuno10=$datos10[1][40];
        $cuarentaydos10=$datos10[1][41];
        $cuarentaytres10=$datos10[1][42];
        $cuarentaycuatro10=$datos10[1][43];
        $cuarentaycinco10=$datos10[1][44];
        $cuarentayseis10=$datos10[1][45];
        $cuarentaysiete10=$datos10[1][46];
        $cuarentayocho10=$datos10[1][47];
        $cuarentaynueve10=$datos10[1][48];
        $cincuenta10=$datos10[1][49];
        $cincuentayuno10=$datos10[1][50];
        $cincuentaydos10=$datos10[1][51];
        $cincuentaytres10=$datos10[1][52];
        $cincuentaycuatro10=$datos10[1][53];
        $cincuentaycinco10=$datos10[1][54];
        $cincuentayseis10=$datos10[1][55];
        $cincuentaysiete10=$datos10[1][56];

        $data = [ ];
        $data['idEstudio'] = $idEstudio;
        $data['tipoZona'] = $uno10;
        $data['tipoVivienda'] = $dos10;
        $data['edificacion'] = $tres10;
        $data['titular'] = $cuatro10;
        $data['parentesco'] = $cinco10;
        $data['numRecamaras'] = $seis10;
        $data['sala'] = $siete10;
        $data['comedor'] = $ocho10;
        $data['cocina'] = $nueve10;
        $data['garaje'] = $diez10;
        $data['jardin'] = $once10;
        $data['nomBano'] = $doce10;
        $data['tipobano'] = $trece10;
        $data['viasdeacceso'] = $catorce10;
        $data['medioTransporte'] = $quince10;
        $data['tiempoServicio'] = $diezyseis10;
        $data['entreCalles'] = $diezysiete10;
        $data['color'] = $diezyocho10;
        $data['porton'] = $diezynueve10;
        $data['referencias'] = $veinte10;
        $data['observaciones'] = $veintidos10;
        $data['agua'] = $veintidos10;
        $data['luz'] = $veintitres10;
        $data['pavimentacion'] = $veinticuatro10;
        $data['telefono'] = $veinticinco10;
        $data['transporte'] = $veintiseis10;
        $data['vigilancia'] = $veintisiete10;
        $data['areas'] = $veintiocho10;
        $data['drenaje'] = $veintinueve10;
        $data['paredes'] = $treinta10;
        $data['techos'] = $treintayuno10;
        $data['pisos'] = $treintaydos10;
        $data['telNormal'] = $treintaytres10;
        $data['telPlasma'] = $treintaycuatro10;
        $data['estereo'] = $treintaycinco10;
        $data['dvd'] = $treintayseis10;
        $data['blueray'] = $treintaysiete10;
        $data['estufa'] = $treintayocho10;
        $data['horno'] = $treintaynueve10;
        $data['lavadora'] = $cuarenta10;
        $data['centrolavado'] = $cuarentayuno10;
        $data['refrigerador'] = $cuarentaydos10;
        $data['computadora'] = $cuarentaytres10;
        $data['extensionInmueble'] = $cuarentaycuatro10;
        $data['condicionesInmueble'] = $cuarentaycinco10;
        $data['condicionesMobiliario'] = $cuarentayseis10;
        $data['orden'] = $cuarentaysiete10;
        $data['limpieza'] = $cuarentayocho10;
        $data['delincuencia'] = $cuarentaynueve10;
        $data['vandalismo'] = $cincuenta10;
        $data['drogadiccion'] = $cincuentayuno10;
        $data['alcoholismo'] = $cincuentaydos10;
        $data['estudio'] = $cincuentaytres10;
        $data['zotehuela'] = $cincuentaycuatro10;
        $data['patio'] = $cincuentaycinco10;
        $data['internet'] = $cincuentayseis10;
        $data['renta'] = $cincuentaysiete10;
        $data['regadera'] = 0;

        $data['idUsuario'] = session('email');
        $user = Entornohabitacional::create($data);


        /* /////////////////////////////////////////////////////////////////////////////////////////// */


         /* /////////////////////////////////////////////////////////////////////////////////////////// */
        /* GUARDAMOS LA ACCION */
        $accion = [ 'idUsuario' => session('email'), 'accion' => "Se cargo informacion por medio de excel.", ];
        $acceso = Acciones::create($accion);
        /* /////////////////////////////////////////////////////////////////////////////////////////// */

         return response()->json(['success' => true, 'message' => 'Registro editado correctamente.']);
    }

}
