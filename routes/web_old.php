<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AccesoController;
use App\Http\Controllers\AccionesController;
use App\Http\Controllers\AvisosController;
use App\Http\Controllers\EmpresasController;
use App\Http\Controllers\EstudiosController;
use App\Http\Controllers\BeneficiarioController;
use App\Http\Controllers\ConductasocialController;
use App\Http\Controllers\CreditosController;
use App\Http\Controllers\DespidosController;
use App\Http\Controllers\DeudasController;
use App\Http\Controllers\DocumentacionController;
use App\Http\Controllers\DomicilioController;
use App\Http\Controllers\EntornohabitacionalController;
use App\Http\Controllers\EstructurafamiliarController;
use App\Http\Controllers\HistoriallaboralController;
use App\Http\Controllers\HobbyController;
use App\Http\Controllers\IncapacidadController;
use App\Http\Controllers\InfolaboralController;
use App\Http\Controllers\InfonavitController;
use App\Http\Controllers\NivelacademicoController;
use App\Http\Controllers\PeriodoController;
use App\Http\Controllers\ProblemasController;
use App\Http\Controllers\RedesController;
use App\Http\Controllers\RefelaboralesController;
use App\Http\Controllers\RefepersonalesController;
use App\Http\Controllers\ResumenController;
use App\Http\Controllers\SaludController;
use App\Http\Controllers\ServiciomedicoController;
use App\Http\Controllers\SituacionController;
use App\Http\Controllers\BienesinmueblesController;
use App\Http\Controllers\ConclusionesController;
use App\Http\Controllers\CuentasinversionesController;
use App\Http\Controllers\EgresofamiliaresController;
use App\Http\Controllers\EntornosController;
use App\Http\Controllers\VehiculosController;
use App\Http\Controllers\GradoEstudiosController;
use App\Http\Controllers\IngresofamiliarController;
use App\Http\Controllers\InvestigacionsController;
use App\Http\Controllers\SegurosController;
use App\Http\Controllers\DocumentospresentadosController;


/* ///////////////////////////////////////////////////////////////////////// */
/* SECCION PARA RUTAS LIBRES */
/* ///////////////////////////////////////////////////////////////////////// */

/* inicio de la aplicacion */
Route::get('/', function () { return view('login'); });
/* ruta para redireccionar cuando alla un error */
Route::view('/loginEr', 'login')->name('loginEr');
Route::view('/login', 'login')->name('login');
/* formulario de registro rapido */
Route::view('/registro', 'registro')->name('registro');
/* funcion para logear usuario */
Route::post('auth/login', [AuthController::class, 'login'])->name('usuario.login');
/* funcion para salir de la aplicacion */
Route::get('auth/logout', [AuthController::class, 'logout'])->name('usuario.cerrar');
/* ///////////////////////////////////////////////////////////////////////// */

/* ///////////////////////////////////////////////////////////////////////// */
/* SECCION PARA RUTAS PROTEGIDAD */
/* ///////////////////////////////////////////////////////////////////////// */
Route::middleware(['auth'])->group(function () {
    /* ruta de portada */
    Route::view('/portada', 'portada')->name('portada');

    /* CARGA DE EXCEL */
    Route::get('/excel', [EstudiosController::class, 'excel'])->name('excel');
    /* ///////////////////////////////////////////////////////////////////////// */

    /* SECCION DE CLIENTES EMPRESAS*/
    /* ingresar a la seccion */
    Route::get('/empresas', [EmpresasController::class, 'index'])->name('empresas');
    /* creacion */
    Route::post('/empresas/crear', [EmpresasController::class, 'crear'])->name('empresas.crear');
    /* edicion */
    Route::post('empresas/editar/{id}',[EmpresasController::class,'editar'])->name('empresas.editar');
    /* eliminar */
    Route::delete('empresas/eliminar/{id}',[EmpresasController::class,'eliminar'])->name('empresas.eliminar');
    /* relacion de empresas */
    Route::get('/empresas/relacion', [EmpresasController::class, 'relaciondeEmpresas'])->name('empresas.relacion');

    /* ///////////////////////////////////////////////////////////////////////// */

    /* SECCION DE USUARIOS */
    /* para entrar a la seccion */
    Route::get('/usuarios', [AuthController::class, 'index'])->name('usuarios');
    /* funcion para crear usuario */
    Route::post('/usuarios/crear', [AuthController::class, 'crear'])->name('usuarios.crear');
    /* funcion apra baja o alta de estatus del usuario */
    Route::post('/usuarios/editarEs/{id}', [AuthController::class, 'editarEs']);
    /* funcion para editar la ifnormacion del usuario */
    Route::post('/usuarios/editarValores/{id}', [AuthController::class, 'editarValores']);
    /* relacion de ejecutivos */
    Route::get('/usuarios/relacionEje', [AuthController::class, 'relacionAgente'])->name('empresas.relacionEje');
    /* relacion de encuestadores */
    Route::get('/usuarios/relacionEcu', [AuthController::class, 'relacionEncuestadores'])->name('empresas.relacionEcu');
    /* RElacion de clientes */
    Route::get('/usuarios/relacionClientes', [AuthController::class, 'relacionClientes'])->name('empresas.relacionClientes');
    /* relacion de clientes para el administrador cooridianor */
    Route::get('/usuarios/relacionClientesEmpresa', [AuthController::class, 'relacionClientesEmpresa'])->name('usuarios.relacionClientesEmpresa');

    /* ///////////////////////////////////////////////////////////////////////// */

    /* SECCION PARA AGREGAR INGRESO AL SISTEMA */
    /* ingreso a la seccion */
    Route::get('/accesos', [AccesoController::class, 'index'])->name('accesos');
    /* ///////////////////////////////////////////////////////////////////////// */

    /* SECCION PARA AGREGAR EL MOVIMIENTO DEL SISTEMA */
    /* ingreso a la seccion */
    Route::get('/acciones', [AccionesController::class, 'index'])->name('acciones');
    /* ///////////////////////////////////////////////////////////////////////// */

    /* SECCION DE AVISOS */
    /* para entrar a la seccion */
    Route::get('/avisos', [AvisosController::class, 'index'])->name('avisos');
    /* creacion */
    Route::post('/avisos/crear', [AvisosController::class, 'crear'])->name('avisos.crear');
    /* edicion */
    Route::post('avisos/editar/{id}',[AvisosController::class,'editar'])->name('avisos.editar');
    /* eliminar */
    Route::delete('avisos/eliminar/{id}',[AvisosController::class,'eliminar'])->name('avisos.eliminar');
    /* para mostrar las alertas que estan activos */
    Route::get('/avisos/activos', [AvisosController::class, 'mostrarAvisosActivos'])->name('avisos.activos');

    /* ///////////////////////////////////////////////////////////////////////// */
    /* SECCION DE ESTUDIOS */
    /* ingreso a la seccion */
    Route::get('/estudios', [EstudiosController::class, 'index'])->name('estudios');
    /* reporte de estudio */
    Route::get('/estudio/reporte/{id}',[EstudiosController::class,'reporte'])->name('estudio.reporte');
    /* funcion para traer el info de un reporte */
    Route::get('/estudio/muestroReporte/{id}',[EstudiosController::class,'muestroReporte'])->name('estudio.muestroReporte');

    /* estudios terminados */
    Route::get('/estudios/terminados', [EstudiosController::class, 'terminados'])->name('terminados');
    /* estudios cancelados */
    Route::get('/estudios/canceladosTotal', [EstudiosController::class, 'canceladosTotal'])->name('canceladosTotal');

    /* funcion para la carga de excel  */
    Route::post('/estudio/cargoexcel', [EstudiosController::class, 'cargoexcel'])->name('estudio.cargoexcel');

    /* funcion para crear estudio */
    Route::post('/estudio/crear', [EstudiosController::class, 'crear'])->name('estudio.crear');
    /* funcion para mostar la edicion del estudio */
    Route::get('/estudio/editar/{id}',[EstudiosController::class,'editar'])->name('estudio.editar');
    /* funcion para editar el estudio por parte del cliente */
    Route::post('/estudio/editaEstudioCliente/{id}', [EstudiosController::class, 'editaEstudioCliente']);
    /* funcion para cancelar el estudio por parte del cliente */
    Route::post('/estudio/canceCliente/{id}', [EstudiosController::class, 'canceCliente']);
    /* funcion para terminar el estudio desde editar */
    Route::post('/estudio/terminarEstudio/{id}', [EstudiosController::class, 'terminarEstudio']);
    /* funcion para activar o desactivar documentos en el reporte */
    Route::post('/estudio/verdocumen/{id}', [EstudiosController::class, 'verdocumen']);

    /* DOMICILIOS */
    /* mostrar info */
    Route::post('/domicilio/muestro/{id}',[DomicilioController::class,'muestro'])->name('domicilio.muestro');
    /* crear informacion */
    Route::post('/domicilio/crear', [DomicilioController::class, 'crear'])->name('domicilio.crear');
    /* editar Informacion */
    Route::post('/domicilio/editar/{id}',[DomicilioController::class,'editar'])->name('domicilio.editar');

    /* DOCUMENTOS */
    /* mostrar info */
    Route::post('/documentos/muestro/{id}',[DocumentacionController::class,'muestro'])->name('documentos.muestro');
    /* crear informacion */
    Route::post('/documentos/crear', [DocumentacionController::class, 'crear'])->name('documentos.crear');
    /* editar Informacion */
    Route::post('/documentos/editar/{id}',[DocumentacionController::class,'editar'])->name('documentos.editar');
    /* eliminar informacion */
    Route::delete('documentos/eliminar/{id}',[DocumentacionController::class,'eliminar'])->name('documentos.eliminar');

     /* ESTRUCTURA FAMILIAR */
    /* mostrar info */
    Route::post('/estructura/muestro/{id}',[EstructurafamiliarController::class,'muestro'])->name('estructura.muestro');
    /* crear informacion */
    Route::post('/estructura/crear', [EstructurafamiliarController::class, 'crear'])->name('estructura.crear');
    /* editar Informacion */
    Route::post('/estructura/editar/{id}',[EstructurafamiliarController::class,'editar'])->name('estructura.editar');
    /* eliminar informacion */
    Route::delete('estructura/eliminar/{id}',[EstructurafamiliarController::class,'eliminar'])->name('estructura.eliminar');

    /* REDES */
    /* mostrar info */
    Route::post('/redes/muestro/{id}',[RedesController::class,'muestro'])->name('redes.muestro');
    /* crear informacion */
    Route::post('/redes/crear', [RedesController::class, 'crear'])->name('redes.crear');
    /* editar Informacion */
    Route::post('/redes/editar/{id}',[RedesController::class,'editar'])->name('redes.editar');

    /* CONDUCTA SOCIAL */
    /* mostrar info */
    Route::post('/conducta/muestro/{id}',[ConductasocialController::class,'muestro'])->name('conducta.muestro');
    /* crear informacion */
    Route::post('/conducta/crear', [ConductasocialController::class, 'crear'])->name('conducta.crear');
    /* editar Informacion */
    Route::post('/conducta/editar/{id}',[ConductasocialController::class,'editar'])->name('conducta.editar');

    /* SITUACION */
    /* mostrar info */
    Route::post('/situacion/muestro/{id}',[SituacionController::class,'muestro'])->name('situacion.muestro');
    /* crear informacion */
    Route::post('/situacion/crear', [SituacionController::class, 'crear'])->name('situacion.crear');
    /* editar Informacion */
    Route::post('/situacion/editar/{id}',[SituacionController::class,'editar'])->name('situacion.editar');
    /* eliminar informacion */
    Route::delete('situacion/eliminar/{id}',[SituacionController::class,'eliminar'])->name('situacion.eliminar');

    /* DEUDAS */
    /* mostrar info */
    Route::post('/deudas/muestro/{id}',[DeudasController::class,'muestro'])->name('deudas.muestro');
    /* crear informacion */
    Route::post('/deudas/crear', [DeudasController::class, 'crear'])->name('deudas.crear');
    /* editar Informacion */
    Route::post('/deudas/editar/{id}',[DeudasController::class,'editar'])->name('deudas.editar');

    /* ENTORNO */
    /* mostrar info */
    Route::post('/entorno/muestro/{id}',[EntornohabitacionalController::class,'muestro'])->name('entorno.muestro');
    /* crear informacion */
    Route::post('/entorno/crear', [EntornohabitacionalController::class, 'crear'])->name('entorno.crear');
    /* editar Informacion */
    Route::post('/entorno/editar/{id}',[EntornohabitacionalController::class,'editar'])->name('entorno.editar');

    /* REFERENCIA PERSONAL */
    /* mostrar info */
    Route::post('/referenciap/muestro/{id}',[RefepersonalesController::class,'muestro'])->name('referenciap.muestro');
    /* crear informacion */
    Route::post('/referenciap/crear', [RefepersonalesController::class, 'crear'])->name('referenciap.crear');
    /* editar Informacion */
    Route::post('/referenciap/editar/{id}',[RefepersonalesController::class,'editar'])->name('referenciap.editar');
    /* eliminar informacion */
    Route::delete('referenciap/eliminar/{id}',[RefepersonalesController::class,'eliminar'])->name('referenciap.eliminar');

    /* ANTECENDENTES LABORALES */
    /* mostrar info */
    Route::post('/antecedentesl/muestro/{id}',[RefelaboralesController::class,'muestro'])->name('antecedentesl.muestro');
    /* crear informacion */
    Route::post('/antecedentesl/crear', [RefelaboralesController::class, 'crear'])->name('antecedentesl.crear');
    /* editar Informacion */
    Route::post('/antecedentesl/editar/{id}',[RefelaboralesController::class,'editar'])->name('antecedentesl.editar');
    /* eliminar informacion */
    Route::delete('antecedentesl/eliminar/{id}',[RefelaboralesController::class,'eliminar'])->name('antecedentesl.eliminar');

    /* SALUD */
    /* mostrar info */
    Route::post('/salud/muestro/{id}',[SaludController::class,'muestro'])->name('salud.muestro');
    /* crear informacion */
    Route::post('/salud/crear', [SaludController::class, 'crear'])->name('salud.crear');
    /* editar Informacion */
    Route::post('/salud/editar/{id}',[SaludController::class,'editar'])->name('salud.editar');

    /* RESUMEN */
    /* mostrar info */
    Route::post('/resumen/muestro/{id}',[ResumenController::class,'muestro'])->name('resumen.muestro');
    /* crear informacion */
    Route::post('/resumen/crear', [ResumenController::class, 'crear'])->name('resumen.crear');
    /* editar Informacion */
    Route::post('/resumen/editar/{id}',[ResumenController::class,'editar'])->name('resumen.editar');

    /* HOBBYEs */
    /* mostrar info */
    Route::post('/hobby/muestro/{id}',[HobbyController::class,'muestro'])->name('hobby.muestro');
    /* crear informacion */
    Route::post('/hobby/crear', [HobbyController::class, 'crear'])->name('hobby.crear');
    /* editar Informacion */
    Route::post('/hobby/editar/{id}',[HobbyController::class,'editar'])->name('hobby.editar');

    /* BENEFICIARIOS */
    /* mostrar info */
    Route::post('/beneficiario/muestro/{id}',[BeneficiarioController::class,'muestro'])->name('beneficiario.muestro');
    /* crear informacion */
    Route::post('/beneficiario/crear', [BeneficiarioController::class, 'crear'])->name('beneficiario.crear');
    /* editar Informacion */
    Route::post('/beneficiario/editar/{id}',[BeneficiarioController::class,'editar'])->name('beneficiario.editar');
    /* eliminar informacion */
    Route::delete('beneficiario/eliminar/{id}',[BeneficiarioController::class,'eliminar'])->name('beneficiario.eliminar');

    /* NIVEL ACADEMICO */
    /* mostrar info */
    Route::post('/nivel/muestro/{id}',[NivelacademicoController::class,'muestro'])->name('nivel.muestro');
    /* crear informacion */
    Route::post('/nivel/crear', [NivelacademicoController::class, 'crear'])->name('nivel.crear');
    /* editar Informacion */
    Route::post('/nivel/editar/{id}',[NivelacademicoController::class,'editar'])->name('nivel.editar');

    /* PERIODOS NO LABORADOS */
    /* mostrar info */
    Route::post('/periodo/muestro/{id}',[PeriodoController::class,'muestro'])->name('periodo.muestro');
    /* crear informacion */
    Route::post('/periodo/crear', [PeriodoController::class, 'crear'])->name('periodo.crear');
    /* editar Informacion */
    Route::post('/periodo/editar/{id}',[PeriodoController::class,'editar'])->name('periodo.editar');
    /* eliminar informacion */
    Route::delete('periodo/eliminar/{id}',[PeriodoController::class,'eliminar'])->name('periodo.eliminar');

    /* HISTORIAL LABORAL */
    /* mostrar info */
    Route::post('/historitall/muestro/{id}',[HistoriallaboralController::class,'muestro'])->name('historitall.muestro');
    /* crear informacion */
    Route::post('/historitall/crear', [HistoriallaboralController::class, 'crear'])->name('historitall.crear');
    /* editar Informacion */
    Route::post('/historitall/editar/{id}',[HistoriallaboralController::class,'editar'])->name('historitall.editar');

    /* DESPIDOS */
    /* mostrar info */
    Route::post('/despidos/muestro/{id}',[DespidosController::class,'muestro'])->name('despidos.muestro');
    /* crear informacion */
    Route::post('/despidos/crear', [DespidosController::class, 'crear'])->name('despidos.crear');
    /* editar Informacion */
    Route::post('/despidos/editar/{id}',[DespidosController::class,'editar'])->name('despidos.editar');
    /* eliminar informacion */
    Route::delete('despidos/eliminar/{id}',[DespidosController::class,'eliminar'])->name('despidos.eliminar');

    /* INCAPACIDADES */
    /* mostrar info */
    Route::post('/incapacidades/muestro/{id}',[IncapacidadController::class,'muestro'])->name('incapacidades.muestro');
    /* crear informacion */
    Route::post('/incapacidades/crear', [IncapacidadController::class, 'crear'])->name('incapacidades.crear');
    /* editar Informacion */
    Route::post('/incapacidades/editar/{id}',[IncapacidadController::class,'editar'])->name('incapacidades.editar');
    /* eliminar informacion */
    Route::delete('incapacidades/eliminar/{id}',[IncapacidadController::class,'eliminar'])->name('incapacidades.eliminar');

    /* PEROBLEMAS EMPLEO ACTUAUL */
    /* mostrar info */
    Route::post('/problemas/muestro/{id}',[ProblemasController::class,'muestro'])->name('problemas.muestro');
    /* crear informacion */
    Route::post('/problemas/crear', [ProblemasController::class, 'crear'])->name('problemas.crear');
    /* editar Informacion */
    Route::post('/problemas/editar/{id}',[ProblemasController::class,'editar'])->name('problemas.editar');

    /* INFOM LABORAL */
    /* mostrar info */
    Route::post('/infoLab/muestro/{id}',[InfolaboralController::class,'muestro'])->name('infoLab.muestro');
    /* crear informacion */
    Route::post('/infoLab/crear', [InfolaboralController::class, 'crear'])->name('infoLab.crear');
    /* editar Informacion */
    Route::post('/infoLab/editar/{id}',[InfolaboralController::class,'editar'])->name('infoLab.editar');

    /* CREDITOS  */
    /* mostrar info */
    Route::post('/creditos/muestro/{id}',[CreditosController::class,'muestro'])->name('creditos.muestro');
    /* crear informacion */
    Route::post('/creditos/crear', [CreditosController::class, 'crear'])->name('creditos.crear');
    /* editar Informacion */
    Route::post('/creditos/editar/{id}',[CreditosController::class,'editar'])->name('creditos.editar');
    /* eliminar informacion */
    Route::delete('creditos/eliminar/{id}',[CreditosController::class,'eliminar'])->name('creditos.eliminar');

    /* INFONAVIT */
    /* mostrar info */
    Route::post('/infonavit/muestro/{id}',[InfonavitController::class,'muestro'])->name('infonavit.muestro');
    /* crear informacion */
    Route::post('/infonavit/crear', [InfonavitController::class, 'crear'])->name('infonavit.crear');
    /* editar Informacion */
    Route::post('/infonavit/editar/{id}',[InfonavitController::class,'editar'])->name('infonavit.editar');

    /* SERVICIO MEDICO */
    /* mostrar info */
    Route::post('/medico/muestro/{id}',[ServiciomedicoController::class,'muestro'])->name('medico.muestro');
    /* crear informacion */
    Route::post('/medico/crear', [ServiciomedicoController::class, 'crear'])->name('medico.crear');
    /* editar Informacion */
    Route::post('/medico/editar/{id}',[ServiciomedicoController::class,'editar'])->name('medico.editar');

    /* SOCUMENTOS PRESENTADOS */
    /* mostrar info */
    Route::post('/presentados/muestro/{id}',[DocumentospresentadosController::class,'muestro'])->name('presentados.muestro');
    /* crear informacion */
    Route::post('/presentados/crear', [DocumentospresentadosController::class, 'crear'])->name('presentados.crear');
    /* editar Informacion */
    Route::post('/presentados/editar/{id}',[DocumentospresentadosController::class,'editar'])->name('presentados.editar');

    /* GRADO DE ESTUDIOS */
    /* mostrar info */
    Route::post('/grados/muestro/{id}',[GradoEstudiosController::class,'muestro'])->name('grados.muestro');
    /* crear informacion */
    Route::post('/grados/crear', [GradoEstudiosController::class, 'crear'])->name('grados.crear');
    /* editar Informacion */
    Route::post('/grados/editar/{id}',[GradoEstudiosController::class,'editar'])->name('grados.editar');
    /* eliminar informacion */
    Route::delete('grados/eliminar/{id}',[GradoEstudiosController::class,'eliminar'])->name('grados.eliminar');

    /* Investigaciones */
    /* mostrar info */
    Route::post('/investigaciones/muestro/{id}',[InvestigacionsController::class,'muestro'])->name('investigaciones.muestro');
    /* crear informacion */
    Route::post('/investigaciones/crear', [InvestigacionsController::class, 'crear'])->name('investigaciones.crear');
    /* editar Informacion */
    Route::post('/investigaciones/editar/{id}',[InvestigacionsController::class,'editar'])->name('investigaciones.editar');

    /* entornos */
    Route::post('/entornos/muestro/{id}',[EntornosController::class,'muestro'])->name('entornos.muestro');
    /* crear informacion */
    Route::post('/entornos/crear', [EntornosController::class, 'crear'])->name('entornos.crear');
    /* editar Informacion */
    Route::post('/entornos/editar/{id}',[EntornosController::class,'editar'])->name('entornos.editar');

    /* CONCLUCIONES */
    /* mostrar info */
    Route::post('/concluciones/muestro/{id}',[ConclusionesController::class,'muestro'])->name('concluciones.muestro');
    /* crear informacion */
    Route::post('/concluciones/crear', [ConclusionesController::class, 'crear'])->name('concluciones.crear');
    /* editar Informacion */
    Route::post('/concluciones/editar/{id}',[ConclusionesController::class,'editar'])->name('concluciones.editar');
    /* eliminar informacion */
    Route::delete('concluciones/eliminar/{id}',[ConclusionesController::class,'eliminar'])->name('concluciones.eliminar');


    /* ///////////////////////////////////////////////////////////////////////// */

});




/* ///////////////////////////////////////////////////////////////////////// */

