@include('include.header')

<div id="layout-wrapper">

    {{-- menu --}}
    @include('include.menu')

    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                {{-- titulo de pagina --}}
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-flex align-items-center justify-content-between">
                            <div>
                                <h4 class="fs-16 fw-semibold mb-1 mb-md-2">Bienvenido, <span class="text-primary">{{ session('name') }}!</span></h4>
                            </div>
                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Inicio</a></li>
                                    <li class="breadcrumb-item active">Edición estudio</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- seccion de alerta --}}
                @include('include.aviso')

                @foreach($estudios as $valor)
                {{-- avisos del dia --}}
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    {{-- mensaje de accion --}}
                                    <div class="col-xl-4">

                                    </div>


                                    @if ( session('tipo') == 'Ejecutivo' || session('tipo') == 'Administrador')
                                    <div class="col-xl-2">
                                        <button class="btn btn-outline-success" style="width: 100%" onclick="verActivar('{{ $valor->id }}','{{ $valor->verDocumentosReporte }}')">Activar / desactivar Doc. </button>
                                    </div>

                                    <div class="col-xl-2">
                                        <button class="btn btn-outline-success" style="width: 100%" onclick="terminarEstudio({{ $valor->id }})">Terminar </button>
                                    </div>

                                    <div class="col-xl-2">
                                        <button class="btn btn-outline-danger" style="width: 100%" onclick="cancelarEstudioCliente({{ $valor->id }})">Cancelar </button>
                                    </div>
                                    @endif

                                    <div class="col-xl-2">
                                        <a href="/estudios"><button class="btn btn-outline-info" style="width: 100%" >Regresar </button></a>
                                    </div>


                                </div>

                            </div>
                        </div>
                    </div>

                    {{-- mensaje para ver si los archivos se muestran el reporte y el estudio --}}
                    <div class="row">
                        <div class="col-xl-6">
                            <div class="alert alert-label-success"><b>Edición del estudio número {{ $valor->id }}, de : {{ $valor->nombreCandidato }} {{ $valor->apePaterno }} {{ $valor->apeMaterno }}</b></div>
                        </div>

                        @if ($valor->verDocumentosReporte == 0)
                            <div class="col-xl-6">
                                <div class="alert alert-label-info">Los archivos SON visibles en el reporte</div>
                            </div>
                        @endif
                        @if ( $valor->verDocumentosReporte == 1)
                            <div class="col-xl-6">
                                <div class="alert alert-label-secondary">Los archivos NO visibles en el reporte</div>
                            </div>
                        @endif

                    </div>

                    {{-- seccion de contenido --}}
                    <hr>
                    <input type="hidden" id="idEstudioEdi" value="{{ $valor->id }}">
                    <div class="alert alert-label-primary text-center" style="display: none;" id="alerta"><b>Acción realizada</b></div>
                    <hr>
                    <div class="col-xl-12">
                        <div class="card border">
                            {{-- titulos de pesataña --}}
                            <div class="card-header">
                                <div class="nav nav-tabs card-header-tabs" id="card-tab-3" role="tablist">
                                    <a class="nav-item nav-link active" id="card-home-tab-3" data-bs-toggle="tab" href="#card-home-3" aria-selected="true" role="tab">Datos generales</a>
                                    <a class="nav-item nav-link" id="card-profile-tab-3" data-bs-toggle="tab" href="#card-profile-3" aria-selected="false" tabindex="-1" role="tab">Información</a>
                                </div>
                            </div>

                            {{-- secciones --}}
                            <div class="card-body">
                                <div class="tab-content">
                                    {{-- seccion de datos generales --}}
                                    <div class="tab-pane fade show active" id="card-home-3" role="tabpanel" aria-labelledby="#card-home-tab-3">

                                        {{-- alertas de archivos --}}
                                        <div class="row">
                                            <div class="col-xl-6">
                                                @if($valor->archivo != null)
                                                    <a href="{{ $valor->archivo  }}" download="archivo" target="_blank"><div class="alert alert-label-success">Ver imagen</div></a>
                                                @endif
                                                @if($valor->archivo == null)
                                                    <a href="{{ $valor->archivo  }}"><div class="alert alert-label-danger">No hay imagen</div></a>
                                                @endif
                                            </div>
                                            <div class="col-xl-6">
                                                @if($valor->cv != null)
                                                    <a href="{{ $valor->cv  }}" download="cv" target="_blank"><div class="alert alert-label-success">Ver Curriculum</div></a>
                                                @endif
                                                @if($valor->cv == null)
                                                    <a href="{{ $valor->cv  }}" ><div class="alert alert-label-danger">No hay cuririculum</div></a>
                                                @endif
                                            </div>
                                        </div>


                                        <div class="card portlet border">
                                            <div class="card-header portlet-header"> Datos Generales </div>
                                            <div class="card-body">
                                                <div class="row">

                                                    <div class="col-lg-4">
                                                        <label for="exampleFormControlInput1" class="form-label">Nombre</label>
                                                        <input type="text" class="form-control" id="nombreCandidato" name="nombreCandidato" value="{{ $valor->nombreCandidato }}"  />
                                                    </div>

                                                    <div class="col-lg-4">
                                                        <label for="exampleFormControlInput1" class="form-label">Apellido paterno</label>
                                                        <input type="text" class="form-control" id="apePaterno" name="apePaterno" value="{{ $valor->apePaterno }}"  />
                                                    </div>

                                                    <div class="col-lg-4">
                                                        <label for="exampleFormControlInput1" class="form-label">Apellido materno</label>
                                                        <input type="text" class="form-control" id="apeMaterno" name="apeMaterno" value="{{ $valor->apeMaterno }}"   />
                                                    </div>

                                                    <div class="col-lg-3">
                                                        <label for="exampleFormControlInput1" class="form-label">Edad</label>
                                                        <input type="text" class="form-control" id="edad" name="edad"  value="{{ $valor->edad }}" />
                                                    </div>

                                                    <div class="col-lg-3">
                                                        <label for="exampleFormControlInput1" class="form-label">Sexo</label>
                                                        <select class="form-control"  id="sexo" name="sexo">
                                                            @foreach (config('catalogos.cattiposSexo') as $key => $value)
                                                                <option value="{{ $key }}"> {{ $value }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>

                                                    <div class="col-lg-3">
                                                        <label for="exampleFormControlInput1" class="form-label">Estado Civil</label>
                                                        <select class="form-control"  id="estadoCivil" name="estadoCivil">
                                                            <option value="{{ $valor->estadoCivil }}">{{ $valor->estadoCivil }}</option>
                                                            @foreach (config('catalogos.catestadosCiviles') as $key => $value)
                                                                <option value="{{ $key }}"> {{ $value }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>

                                                    <div class="col-lg-3">
                                                        <label for="exampleFormControlInput1" class="form-label">Hijos</label>
                                                        <input type="number" class="form-control" id="hijos" name="hijos"  value="{{ $valor->hijos }}" />
                                                    </div>

                                                    <div class="col-lg-3">
                                                        <label for="exampleFormControlInput1" class="form-label">NSS</label>
                                                        <input type="text" class="form-control" id="nss" name="nss" value="{{ $valor->nss }}"  />
                                                    </div>

                                                    <div class="col-lg-3">
                                                        <label for="exampleFormControlInput1" class="form-label">RFC</label>
                                                        <input type="text" class="form-control" id="rfc" name="rfc" value="{{ $valor->rfc }}"  />
                                                    </div>

                                                    <div class="col-lg-3">
                                                        <label for="exampleFormControlInput1" class="form-label">CURP</label>
                                                        <input type="text" class="form-control" id="curp" name="curp" value="{{ $valor->curp }}"  />
                                                    </div>

                                                    <div class="col-lg-3">
                                                        <label for="exampleFormControlInput1" class="form-label">Lugar de nacimiento</label>
                                                        <input type="text" class="form-control" id="lugarNacimiento" name="lugarNacimiento" value="{{ $valor->lugarNacimiento }}"  />
                                                    </div>

                                                    <div class="col-lg-3">
                                                        <label for="exampleFormControlInput1" class="form-label">Fecha Nacimiento</label>
                                                        <input type="date" class="form-control" id="fechaNacimiento" name="fechaNacimiento" value="{{ $valor->fechaNacimiento }}"  />
                                                    </div>

                                                    <div class="col-lg-3">
                                                        <label for="exampleFormControlInput1" class="form-label">Nacionalidad</label>
                                                        <input type="text" class="form-control" id="nacionalidad" name="nacionalidad" value="{{ $valor->nacionalidad }}"  />
                                                    </div>

                                                    <div class="col-lg-3">
                                                        <label for="exampleFormControlInput1" class="form-label">Puesto</label>
                                                        <input type="text" class="form-control" id="puesto" name="puesto" value="{{ $valor->puesto }}"  />
                                                    </div>

                                                    <div class="col-lg-3">
                                                        <label for="exampleFormControlInput1" class="form-label">Tipo de servicio</label>
                                                        <select class="form-control"  id="tiposervicio" name="tiposervicio">
                                                            <option value="{{ $valor->tiposervicio }}">{{ $valor->tiposervicio }}</option>
                                                            @foreach (config('catalogos.servicios') as $key => $value)
                                                                <option value="{{ $key }}"> {{ $value }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>

                                                    <div class="col-lg-3">
                                                        <label for="exampleFormControlInput1" class="form-label">Escolaridad</label>
                                                        <select class="form-control"  id="escolaridad" name="escolaridad">
                                                            <option value="{{ $valor->escolaridad }}">{{ $valor->escolaridad }}</option>
                                                            @foreach (config('catalogos.catnivelesEscolaridad') as $key => $value)
                                                                <option value="{{ $key }}"> {{ $value }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>

                                        <div class="card portlet border">
                                            <div class="card-header portlet-header">Dirección </div>
                                            <div class="card-body">
                                                <div class="row">

                                                    <div class="col-lg-3">
                                                        <label for="exampleFormControlInput1" class="form-label">Télefono</label>
                                                        <input type="text" class="form-control" id="telefono" name="telefono" value="{{ $valor->telefono }}"  />
                                                    </div>

                                                    <div class="col-lg-3">
                                                        <label for="exampleFormControlInput1" class="form-label">Correo</label>
                                                        <input type="mail" class="form-control" id="correo" name="correo"  value="{{ $valor->correo }}" />
                                                    </div>

                                                    <div class="col-lg-3">
                                                        <label for="exampleFormControlInput1" class="form-label">Celular</label>
                                                        <input type="text" class="form-control" id="celular" name="celular" value="{{ $valor->celular }}"  />
                                                    </div>

                                                    <div class="col-lg-3">
                                                        <label for="exampleFormControlInput1" class="form-label">Otro contacto</label>
                                                        <input type="text" class="form-control" id="otroContacto" name="otroContacto" value="{{ $valor->otroContacto }}"   />
                                                    </div>

                                                    <div class="col-lg-3">
                                                        <label for="exampleFormControlInput1" class="form-label">Infonavit</label>
                                                        <input type="text" class="form-control" id="infonavit" name="infonavit" value="{{ $valor->infonavit }}"  />
                                                    </div>

                                                    <div class="col-lg-3">
                                                        <label for="exampleFormControlInput1" class="form-label">Fonacot</label>
                                                        <input type="text" class="form-control" id="fonacot" name="fonacot" value="{{ $valor->fonacot }}"  />
                                                    </div>

                                                    <div class="col-lg-3">
                                                        <label for="exampleFormControlInput1" class="form-label">Clinica IMSS</label>
                                                        <input type="text" class="form-control" id="clincaImss" name="clincaImss" value="{{ $valor->clincaImss }}"  />
                                                    </div>

                                                    <div class="col-lg-3">
                                                        <label for="exampleFormControlInput1" class="form-label">Vive con</label>
                                                        <input type="text" class="form-control" id="viveCon" name="viveCon" value="{{ $valor->viveCon }}"  />
                                                    </div>

                                                    <div class="col-lg-3">
                                                        <label for="exampleFormControlInput1" class="form-label">Dirección</label>
                                                        <input type="text" class="form-control" id="direccion" name="direccion" value="{{ $valor->direccion }}"  />
                                                    </div>

                                                </div>
                                            </div>
                                        </div>

                                        <div class="card portlet border">
                                            <div class="card-header portlet-header">Archivos </div>
                                            <div class="card-body">
                                                <div class="row">

                                                    <div class="col-lg-3">
                                                        <label for="exampleFormControlInput1" class="form-label">Curriculum</label>
                                                        <input type="file" class="form-control" id="fileInputc" />
                                                    </div>

                                                    <div class="col-lg-3">
                                                        <label for="exampleFormControlInput1" class="form-label">Foto</label>
                                                        <input type="file" class="form-control" id="fileInputf" />
                                                    </div>
                                                    <textarea name="curriculum" style="display: none " id="outputBase64c" cols="30" rows="3" ></textarea>
                                                    <textarea name="foto" style="display: none " id="outputBase64f" cols="30" rows="3" ></textarea>

                                                </div>
                                            </div>
                                        </div>

                                        <div class="card portlet border">
                                            <div class="card-header portlet-header">Asignaciones </div>
                                            <div class="card-body">
                                                <div class="row">

                                                    <div class="col-lg-3">
                                                        <label for="exampleFormControlInput1" class="form-label">Analista {{ $valor->realizo }}</label>
                                                        <div id="select-containera"></div>
                                                    </div>

                                                    <div class="col-lg-3">
                                                        <label for="exampleFormControlInput1" class="form-label">Encuestador {{ $valor->encuestador }}</label>
                                                        <div id="select-containere"></div>
                                                    </div>

                                                    <div class="col-lg-3">
                                                        <label for="exampleFormControlInput1" class="form-label">Empresa {{ $valor->idEmpresa }}</label>
                                                        <div id="select-container"></div>
                                                    </div>

                                                    <div class="col-lg-3">
                                                        <label for="exampleFormControlInput1" class="form-label">Fecha Aplicación</label>
                                                        <input type="date" class="form-control" id="fechaSolicitud" name="fechaSolicitud" value="{{ $valor->fechaSolicitud }}"  />
                                                    </div>

                                                </div>
                                            </div>
                                        </div>

                                        <div class="row"><div class="col-xl-12"><button class="btn btn-outline-primary" id="btnEditar" style="width: 100%">Registrar cambios</button></div></div>
                                    </div>
                @endforeach
                                    {{-- seccion de informacion --}}
                                    <div class="tab-pane fade" id="card-profile-3" role="tabpanel" aria-labelledby="#card-profile-tab-3">
                                        {{-- botones de seccion --}}
                                        <div class="row">
                                            <div class="col-xl-3">
                                                <div class="list-group">
                                                    <a onclick="abrirSeccion(1)" class="list-group-item list-group-item-action list-group-item-info" style="cursor: pointer">Domicilio</a>
                                                    <a onclick="abrirSeccion(2)" class="list-group-item list-group-item-action list-group-item-info" style="cursor: pointer">Documentación / Fotografías</a>
                                                    <a onclick="abrirSeccion(3)" class="list-group-item list-group-item-action list-group-item-info" style="cursor: pointer">Estructura familiar</a>
                                                    <a onclick="abrirSeccion(4)" class="list-group-item list-group-item-action list-group-item-info" style="cursor: pointer">Redes</a>
                                                    <a onclick="abrirSeccion(5)" class="list-group-item list-group-item-action list-group-item-info" style="cursor: pointer">Conducta</a>
                                                    <a onclick="abrirSeccion(6)" class="list-group-item list-group-item-action list-group-item-info" style="cursor: pointer">Situación</a>
                                                    <a onclick="abrirSeccion(7)" class="list-group-item list-group-item-action list-group-item-info" style="cursor: pointer">Deudas</a>
                                                    <a onclick="abrirSeccion(8)" class="list-group-item list-group-item-action list-group-item-info" style="cursor: pointer">Entorno</a>
                                                    <a onclick="abrirSeccion(9)" class="list-group-item list-group-item-action list-group-item-info" style="cursor: pointer">Referencias personales</a>
                                                    <a onclick="abrirSeccion(10)" class="list-group-item list-group-item-action list-group-item-info" style="cursor: pointer">Antecedentes laborales</a>

                                                    <a onclick="abrirSeccion(12)" class="list-group-item list-group-item-action list-group-item-info" style="cursor: pointer">Salud</a>
                                                    <a onclick="abrirSeccion(13)" class="list-group-item list-group-item-action list-group-item-info" style="cursor: pointer">Resumen</a>
                                                    <a onclick="abrirSeccion(14)" class="list-group-item list-group-item-action list-group-item-info" style="cursor: pointer">Hobby/Intereses</a>
                                                    <a onclick="abrirSeccion(15)" class="list-group-item list-group-item-action list-group-item-info" style="cursor: pointer">Beneficiarios</a>
                                                    <a onclick="abrirSeccion(16)" class="list-group-item list-group-item-action list-group-item-info" style="cursor: pointer">Nivel Académico</a>
                                                    <a onclick="abrirSeccion(17)" class="list-group-item list-group-item-action list-group-item-info" style="cursor: pointer">Periodos no Laborados</a>
                                                    <a onclick="abrirSeccion(18)" class="list-group-item list-group-item-action list-group-item-info" style="cursor: pointer">Historial Laboral</a>
                                                    <a onclick="abrirSeccion(19)" class="list-group-item list-group-item-action list-group-item-info" style="cursor: pointer">Despidos/salidas pactadas</a>
                                                    <a onclick="abrirSeccion(20)" class="list-group-item list-group-item-action list-group-item-info" style="cursor: pointer">Días incapacidad</a>
                                                    <a onclick="abrirSeccion(21)" class="list-group-item list-group-item-action list-group-item-info" style="cursor: pointer">Problemas empleador actual</a>
                                                    <a onclick="abrirSeccion(22)" class="list-group-item list-group-item-action list-group-item-info" style="cursor: pointer">Incidencias Legales</a>
                                                    <a onclick="abrirSeccion(23)" class="list-group-item list-group-item-action list-group-item-info" style="cursor: pointer">Creditos Activos e historial pago</a>
                                                    <a onclick="abrirSeccion(24)" class="list-group-item list-group-item-action list-group-item-info" style="cursor: pointer">Infonavit</a>
                                                    <a onclick="abrirSeccion(25)" class="list-group-item list-group-item-action list-group-item-info" style="cursor: pointer">Servicio médico</a>
                                                    <hr>
                                                    <a onclick="abrirSeccion(26)" class="list-group-item list-group-item-action list-group-item-info" style="cursor: pointer">Documentos presentados</a>
                                                    <a onclick="abrirSeccion(27)" class="list-group-item list-group-item-action list-group-item-info" style="cursor: pointer">Estudios</a>
                                                    <a onclick="abrirSeccion(28)" class="list-group-item list-group-item-action list-group-item-info" style="cursor: pointer">Investigaciones</a>
                                                    <a onclick="abrirSeccion(29)" class="list-group-item list-group-item-action list-group-item-info" style="cursor: pointer">Entorno</a>
                                                    <a onclick="abrirSeccion(30)" class="list-group-item list-group-item-action list-group-item-info" style="cursor: pointer">Concluciones</a>
                                                </div>
                                            </div>

                                            {{-- area para las secciones --}}
                                            <div class="col-xl-9">
                                                    {{-- Domicilio --}}
                                                    <div id="Domicilio" style="display: ;" >
                                                        <div class="card portlet border">
                                                            <div class="card-header portlet-header">
                                                                <h3 class="card-title portlet-title">Domicilio</h3>
                                                            </div>
                                                            <div class="card-body">
                                                                <div class="row">

                                                                    <input type="hidden" class="form-control" id="idDomiciliot" name="idDomicilio"  />

                                                                    <div class="col-lg-10">
                                                                        <label for="exampleFormControlInput1" class="form-label">Calle</label>
                                                                        <input type="text" class="form-control" id="calle" name="calle"  />
                                                                    </div>

                                                                    <div class="col-lg-2">
                                                                        <label for="exampleFormControlInput1" class="form-label">Número</label>
                                                                        <input type="text" class="form-control" id="numero" name="numero"  />
                                                                    </div>

                                                                    <div class="col-lg-4">
                                                                        <label for="exampleFormControlInput1" class="form-label">Colonia</label>
                                                                        <input type="text" class="form-control" id="colonia" name="colonia"  />
                                                                    </div>

                                                                    <div class="col-lg-4">
                                                                        <label for="exampleFormControlInput1" class="form-label">Delegación Municipio</label>
                                                                        <input type="text" class="form-control" id="delegacionMunicipio" name="delegacionMunicipio"  />
                                                                    </div>

                                                                    <div class="col-lg-4">
                                                                        <label for="exampleFormControlInput1" class="form-label">Ciudad</label>
                                                                        <input type="text" class="form-control" id="ciudad" name="ciudad"  />
                                                                    </div>

                                                                    <div class="col-lg-4">
                                                                        <label for="exampleFormControlInput1" class="form-label">Estado</label>
                                                                        <select class="form-control"  id="estado" name="estado">
                                                                            @foreach (config('catalogos.catestadosMexico') as $key => $value)
                                                                                <option value="{{ $key }}"> {{ $value }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>

                                                                    <div class="col-lg-2">
                                                                        <label for="exampleFormControlInput1" class="form-label">C.P</label>
                                                                        <input type="text" class="form-control" id="cp" name="cp"  />
                                                                    </div>

                                                                    <div class="col-lg-6">
                                                                        <label for="exampleFormControlInput1" class="form-label">Tiempo de residencia</label>
                                                                        <input type="text" class="form-control" id="tiempoResindir" name="tiempoResindir"  />
                                                                    </div>

                                                                    <div class="col-lg-3">
                                                                        <label for="exampleFormControlInput1" class="form-label">Télefono</label>
                                                                        <input type="text" class="form-control" id="tel1" name="tel1"  />
                                                                    </div>

                                                                    <div class="col-lg-3">
                                                                        <label for="exampleFormControlInput1" class="form-label">Télefono 2</label>
                                                                        <input type="text" class="form-control" id="tel2" name="tel2"  />
                                                                    </div>

                                                                    <div class="col-lg-3">
                                                                        <label for="exampleFormControlInput1" class="form-label">Celular </label>
                                                                        <input type="text" class="form-control" id="cel1" name="cel1"  />
                                                                    </div>

                                                                    <div class="col-lg-3">
                                                                        <label for="exampleFormControlInput1" class="form-label">Celular 2</label>
                                                                        <input type="text" class="form-control" id="cel2" name="cel2"  />
                                                                    </div>

                                                                    <div class="col-lg-12"><hr></div>

                                                                    <div class="col-lg-12"><button class="btn btn-outline-primary" id="btnDomicilio" style="width: 100%">Registrar</button></div>


                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    {{-- Documentación --}}
                                                    <div id="Documentacion" style="display: none ;" >
                                                        <div class="card portlet border">
                                                            <div class="card-header portlet-header">
                                                                <h3 class="card-title portlet-title">Documentación</h3>
                                                            </div>
                                                            <div class="card-body">
                                                                <div class="row">
                                                                    <input type="hidden" class="form-control" id="idDocumento" name="idDocumento"  />
                                                                    <div class="col-lg-4">
                                                                        <label for="exampleFormControlInput1" class="form-label">Titulo</label>
                                                                        <select class="form-control"  id="titulo" name="titulo">
                                                                            @foreach (config('catalogos.catarchivos') as $key => $value)
                                                                                <option value="{{ $key }}"> {{ $value }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>

                                                                    <div class="col-lg-4">
                                                                        <label for="exampleFormControlInput1" class="form-label">Folio/nombre</label>
                                                                        <input type="text" class="form-control" id="folio" name="folio"  />
                                                                    </div>

                                                                    <div class="col-lg-4">
                                                                        <label for="exampleFormControlInput1" class="form-label">Archivo</label>
                                                                        <input type="file" class="form-control" id="archivoDocument" name="archivoDocument"  />
                                                                    </div>

                                                                    <div class="col-lg-12">
                                                                        <label for="exampleFormControlInput1" class="form-label">Descripción </label>
                                                                        <textarea class="form-control" id="observaciones" name="observaciones"></textarea>
                                                                        <textarea class="form-control" id="outputBase64docu" name="outputBase64docu" style="display: none;"></textarea>
                                                                    </div>

                                                                    <div class="col-lg-12"><hr></div>

                                                                    <div class="col-lg-12"><button class="btn btn-outline-primary" id="btndocumentos" style="width: 100%">Registrar</button></div>


                                                                </div>
                                                            </div>
                                                        </div>
                                                        <table id="datatable1" class="table table-hover table-bordered table-striped " style="border-collapse: collapse; width: 100%;">
                                                            <thead>
                                                                <tr>
                                                                    <th>Id</th>
                                                                    <th>Titulo</th>
                                                                    <th>Folio / nombre</th>
                                                                    <th>Descripcón</th>
                                                                    <th>Archivo</th>
                                                                    <th>Acción</th>

                                                                </tr>
                                                            </thead>
                                                            <tbody> </tbody>
                                                        </table>
                                                    </div>

                                                    {{-- Estructura familiar --}}
                                                    <div id="Estructurafamiliar" style="display: none ;" >
                                                        <div class="card portlet border">
                                                            <div class="card-header portlet-header">
                                                                <h3 class="card-title portlet-title">Estructura familiar</h3>
                                                            </div>
                                                            <div class="card-body">
                                                                <div class="row">
                                                                    <input type="hidden" class="form-control" id="idEstructura" name="idEstructura"  />
                                                                    <div class="col-lg-5">
                                                                        <label for="exampleFormControlInput1" class="form-label">Parentesco</label>
                                                                        <select class="form-control"  id="familiaress" name="familiar">
                                                                            @foreach (config('catalogos.catparentescosFamiliares') as $key => $value)
                                                                                <option value="{{ $key }}"> {{ $value }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>

                                                                    <div class="col-lg-5">
                                                                        <label for="exampleFormControlInput1" class="form-label">Ocupación</label>
                                                                        <input type="text" class="form-control" id="ocupaciones" name="ocupacion"  />
                                                                    </div>

                                                                    <div class="col-lg-2">
                                                                        <label for="exampleFormControlInput1" class="form-label">Edad</label>
                                                                        <input type="text" class="form-control" id="edades" name="edad"  />
                                                                    </div>

                                                                    <div class="col-lg-4">
                                                                        <label for="exampleFormControlInput1" class="form-label">Donde labora o estudia</label>
                                                                        <input type="text" class="form-control" id="laboraEstudiaes" name="laboraEstudia"  />
                                                                    </div>

                                                                    <div class="col-lg-4">
                                                                        <label for="exampleFormControlInput1" class="form-label">Tiempo de residir </label>
                                                                        <input type="text" class="form-control" id="tiempoResidees" name="tiempoReside"  />
                                                                    </div>

                                                                    <div class="col-lg-4">
                                                                        <label for="exampleFormControlInput1" class="form-label">Calle</label>
                                                                        <input type="text" class="form-control" id="callees" name="calle"  />
                                                                    </div>

                                                                    <div class="col-lg-2">
                                                                        <label for="exampleFormControlInput1" class="form-label">Número</label>
                                                                        <input type="text" class="form-control" id="numeroes" name="numero"  />
                                                                    </div>

                                                                    <div class="col-lg-2">
                                                                        <label for="exampleFormControlInput1" class="form-label">C.P</label>
                                                                        <input type="text" class="form-control" id="cpdees" name="cpde"  />
                                                                    </div>

                                                                    <div class="col-lg-4">
                                                                        <label for="exampleFormControlInput1" class="form-label">Colonia</label>
                                                                        <input type="text" class="form-control" id="coloniaes" name="colonia"  />
                                                                    </div>

                                                                    <div class="col-lg-4">
                                                                        <label for="exampleFormControlInput1" class="form-label">Delegación / Municipio</label>
                                                                        <input type="text" class="form-control" id="delegacionMunicipio" name="delegacionMunicipio"  />
                                                                    </div>

                                                                    <div class="col-lg-4">
                                                                        <label for="exampleFormControlInput1" class="form-label">Ciudad</label>
                                                                        <select class="form-control"  id="ciudadess" name="ciudad">
                                                                            @foreach (config('catalogos.catestadosMexico') as $key => $value)
                                                                                <option value="{{ $key }}"> {{ $value }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>

                                                                    <div class="col-lg-4">
                                                                        <label for="exampleFormControlInput1" class="form-label">Estado</label>
                                                                        <input type="text" class="form-control" id="estadoes" name="estado"  />
                                                                    </div>

                                                                    <div class="col-lg-4">
                                                                        <label for="exampleFormControlInput1" class="form-label">Teléfono</label>
                                                                        <input type="text" class="form-control" id="tel1es" name="tel1"  />
                                                                    </div>



                                                                    <div class="col-lg-12"><hr></div>

                                                                    <div class="col-lg-12"><button class="btn btn-outline-primary" id="btnEstructuraFamilair" style="width: 100%">Registrar</button></div>


                                                                </div>
                                                            </div>
                                                        </div>
                                                        <table id="datatable2" class="table table-hover table-bordered table-striped " style="border-collapse: collapse; width: 100%;">
                                                            <thead>
                                                                <tr>
                                                                    <th>Id</th>
                                                                    <th>Parentesco</th>
                                                                    <th>Edad</th>
                                                                    <th>Ocupación</th>
                                                                    <th>Labora/estudia</th>
                                                                    <th>Dirección</th>
                                                                    <th>Tiempo Residir</th>
                                                                    <th>Télefono</th>
                                                                    <th>Acciones</th>

                                                                </tr>
                                                            </thead>
                                                            <tbody>

                                                            </tbody>
                                                        </table>
                                                    </div>

                                                    {{-- Redes --}}
                                                    <div id="Redes" style="display: none ;" >
                                                        <div class="card portlet border">
                                                            <div class="card-header portlet-header">
                                                                <h3 class="card-title portlet-title">Redes</h3>
                                                            </div>
                                                            <div class="card-body">
                                                                <div class="row">
                                                                    <input type="hidden" class="form-control" id="idRedes" name="idRedes"  />
                                                                    <div class="col-lg-6">
                                                                        <label for="exampleFormControlInput1" class="form-label">Facebook</label>
                                                                        <input type="text" class="form-control" id="facebook" name="facebook"  />
                                                                    </div>

                                                                    <div class="col-lg-6">
                                                                        <label for="exampleFormControlInput1" class="form-label">Twitter (x)</label>
                                                                        <input type="text" class="form-control" id="twitter" name="twitter"  />
                                                                    </div>

                                                                    <div class="col-lg-6">
                                                                        <label for="exampleFormControlInput1" class="form-label">Linkedin</label>
                                                                        <input type="text" class="form-control" id="linkedin" name="linkedin"  />
                                                                    </div>

                                                                    <div class="col-lg-6">
                                                                        <label for="exampleFormControlInput1" class="form-label">Instagram</label>
                                                                        <input type="text" class="form-control" id="instagram" name="instagram"  />
                                                                    </div>


                                                                    <div class="col-lg-12"><hr></div>

                                                                    <div class="col-lg-12"><button class="btn btn-outline-primary" id="btnRedes" style="width: 100%">Registrar</button></div>

                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>

                                                    {{-- Conducta --}}
                                                    <div id="Conducta" style="display: none ;" >
                                                        <div class="card portlet border">
                                                            <div class="card-header portlet-header">
                                                                <h3 class="card-title portlet-title">Conducta</h3>
                                                            </div>
                                                            <div class="card-body">
                                                                <div class="row">
                                                                    <input type="hidden" class="form-control" id="idConducta" name="idConducta"  />
                                                                    <div class="col-lg-6">
                                                                        <label for="exampleFormControlInput1" class="form-label">¿Quién estuvo presente?</label>
                                                                        <input type="text" class="form-control" id="quienEstuvo" name="quienEstuvo"  />
                                                                    </div>

                                                                    <div class="col-lg-6">
                                                                        <label for="exampleFormControlInput1" class="form-label">Conducta del entrevistado</label>
                                                                        <input type="text" class="form-control" id="conductaEntrevistado" name="conductaEntrevistado"  />
                                                                    </div>

                                                                    <div class="col-lg-6">
                                                                        <label for="exampleFormControlInput1" class="form-label">Relación con los vecinos</label>
                                                                        <input type="text" class="form-control" id="relacionVecinos" name="relacionVecinos"  />
                                                                    </div>

                                                                    <div class="col-lg-6">
                                                                        <label for="exampleFormControlInput1" class="form-label">¿Pertenece a algún grupo social?</label>
                                                                        <input type="text" class="form-control" id="pertenecegrupo" name="pertenecegrupo"  />
                                                                    </div>

                                                                    <div class="col-lg-6">
                                                                        <label for="exampleFormControlInput1" class="form-label">¿Ha tenido problemas legales?</label>
                                                                        <input type="text" class="form-control" id="problemasLegales" name="problemasLegales"  />
                                                                    </div>

                                                                    <div class="col-lg-6">
                                                                        <label for="exampleFormControlInput1" class="form-label">¿Tiene algun familiar recluido?</label>
                                                                        <input type="text" class="form-control" id="familiarRecluido" name="familiarRecluido"  />
                                                                    </div>

                                                                    <div class="col-lg-6">
                                                                        <label for="exampleFormControlInput1" class="form-label">¿Tiene un familiar en la empresa?</label>
                                                                        <input type="text" class="form-control" id="familiaresAdentro" name="familiaresAdentro"  />
                                                                    </div>


                                                                    <div class="col-lg-12"><hr></div>

                                                                    <div class="col-lg-12"><button class="btn btn-outline-primary" id="btnConducta" style="width: 100%">Registrar</button></div>


                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>

                                                    {{-- Situación --}}
                                                    <div id="Situacion" style="display: none ;" >
                                                        <div class="card portlet border">
                                                            <div class="card-header portlet-header">
                                                                <h3 class="card-title portlet-title">Situación</h3>
                                                            </div>
                                                            <div class="card-body">
                                                                <div class="row">
                                                                    <input type="hidden" class="form-control" id="idSituacion" name="idSituacion"  />
                                                                    <div class="col-lg-4">
                                                                        <label for="exampleFormControlInput1" class="form-label">Nombre</label>
                                                                        <input type="text" class="form-control" id="nombresi" name="nombresi"  />
                                                                    </div>

                                                                    <div class="col-lg-4">
                                                                        <label for="exampleFormControlInput1" class="form-label">Parentesco</label>
                                                                        <select class="form-control"  id="parentescosi" name="parentescosi">
                                                                            @foreach (config('catalogos.catparentescosFamiliares') as $key => $value)
                                                                                <option value="{{ $key }}"> {{ $value }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>

                                                                    <div class="col-lg-4">
                                                                        <label for="exampleFormControlInput1" class="form-label">Salario</label>
                                                                        <input type="text" class="form-control" id="salariosi" name="salariosi"  />
                                                                    </div>

                                                                    <div class="col-lg-3">
                                                                        <label for="exampleFormControlInput1" class="form-label">Ingreso</label>
                                                                        <input type="text" class="form-control" id="ingresosi" name="ingresosi"  />
                                                                    </div>

                                                                    <div class="col-lg-3">
                                                                        <label for="exampleFormControlInput1" class="form-label">Concepto</label>
                                                                        <select class="form-control"  id="conceptosi" name="conceptosi">
                                                                            @foreach (config('catalogos.catconceptos') as $key => $value)
                                                                                <option value="{{ $key }}"> {{ $value }}</option>
                                                                            @endforeach
                                                                        </select>

                                                                    </div>

                                                                    <div class="col-lg-3">
                                                                        <label for="exampleFormControlInput1" class="form-label">Egresos</label>
                                                                        <input type="text" class="form-control" id="egresossi" name="egresossi"  />
                                                                    </div>

                                                                    <div class="col-lg-3">
                                                                        <label for="exampleFormControlInput1" class="form-label">Supervit</label>
                                                                        <input type="text" class="form-control" id="superavitsi" name="superavitsi"  />
                                                                    </div>

                                                                    <div class="col-lg-12">
                                                                        <label for="exampleFormControlInput1" class="form-label">Observaciones </label>
                                                                        <textarea class="form-control" name="observacionessi" id="observacionessi"></textarea>
                                                                    </div>

                                                                    <div class="col-lg-12"><hr></div>

                                                                    <div class="col-lg-12"><button class="btn btn-outline-primary" id="btnSituacion" style="width: 100%">Registrar</button></div>


                                                                </div>
                                                            </div>
                                                        </div>
                                                        <table id="datatable9" class="table table-hover table-bordered table-striped " style="border-collapse: collapse; width: 100%;">
                                                            <thead>
                                                                <tr>
                                                                    <th>Id</th>
                                                                    <th>Nombre</th>
                                                                    <th>Parentesco</th>
                                                                    <th>Salario</th>
                                                                    <th>Ingreso</th>
                                                                    <th>Concepto</th>
                                                                    <th>Egresos</th>
                                                                    <th>Observaciones</th>
                                                                    <th>Supervit</th>
                                                                    <th>Acción</th>

                                                                </tr>
                                                            </thead>
                                                            <tbody>

                                                            </tbody>
                                                        </table>
                                                    </div>

                                                    {{-- Deudas --}}
                                                    <div id="Deudas" style="display: none ;" >
                                                         <div class="card portlet border">
                                                            <div class="card-header portlet-header">
                                                                <h3 class="card-title portlet-title">Deudas</h3>
                                                            </div>
                                                            <div class="card-body">
                                                                <div class="row">
                                                                    <input type="hidden" class="form-control" id="idDeudas" name="idDeudas"  />
                                                                    <div class="col-lg-6">
                                                                        <label for="exampleFormControlInput1" class="form-label">¿Cuenta con deudas?</label>
                                                                        <input type="text" class="form-control" id="cuentaDeuda" name="cuentaDeuda"  />
                                                                    </div>

                                                                    <div class="col-lg-6">
                                                                        <label for="exampleFormControlInput1" class="form-label">¿Con quién ?</label>
                                                                        <input type="text" class="form-control" id="conQuien" name="conQuien"  />
                                                                    </div>

                                                                    <div class="col-lg-6">
                                                                        <label for="exampleFormControlInput1" class="form-label">Monto adeudado</label>
                                                                        <input type="text" class="form-control" id="monto" name="monto"  />
                                                                    </div>

                                                                    <div class="col-lg-6">
                                                                        <label for="exampleFormControlInput1" class="form-label">Abono mensual</label>
                                                                        <input type="text" class="form-control" id="abonoMensual" name="abonoMensual"  />
                                                                    </div>

                                                                    <div class="col-lg-6">
                                                                        <label for="exampleFormControlInput1" class="form-label">A pagar en</label>
                                                                        <input type="text" class="form-control" id="apagaren" name="apagaren"  />
                                                                    </div>

                                                                    <div class="col-lg-6">
                                                                        <label for="exampleFormControlInput1" class="form-label">¿Cuenta con Automóvil?</label>
                                                                        <input type="text" class="form-control" id="cuentaauto" name="cuentaauto"  />
                                                                    </div>

                                                                    <div class="col-lg-6">
                                                                        <label for="exampleFormControlInput1" class="form-label">Modelo</label>
                                                                        <input type="text" class="form-control" id="modelo" name="modelo"  />
                                                                    </div>

                                                                    <div class="col-lg-6">
                                                                        <label for="exampleFormControlInput1" class="form-label">Placas</label>
                                                                        <input type="text" class="form-control" id="placas" name="placas"  />
                                                                    </div>

                                                                    <div class="col-lg-6">
                                                                        <label for="exampleFormControlInput1" class="form-label">Valor de auto</label>
                                                                        <input type="text" class="form-control" id="valorAuto" name="valorAuto"  />
                                                                    </div>

                                                                    <div class="col-lg-6">
                                                                        <label for="exampleFormControlInput1" class="form-label">¿Cuenta con alguna propiedad?</label>
                                                                        <input type="text" class="form-control" id="propiedad" name="propiedad"  />
                                                                    </div>

                                                                    <div class="col-lg-6">
                                                                        <label for="exampleFormControlInput1" class="form-label">Ubicación</label>
                                                                        <input type="text" class="form-control" id="ubicacon" name="ubicacon"  />
                                                                    </div>
                                                                    <div class="col-lg-6">
                                                                        <label for="exampleFormControlInput1" class="form-label">¿Cuenta con Tarjeta de Crédito ?</label>
                                                                        <input type="text" class="form-control" id="tarjetaCredito" name="tarjetaCredito"  />
                                                                    </div>
                                                                    <div class="col-lg-6">
                                                                        <label for="exampleFormControlInput1" class="form-label">¿Con qué Banco?</label>
                                                                        <input type="text" class="form-control" id="bancotarjetaCredito" name="bancotarjetaCredito"  />
                                                                    </div>
                                                                    <div class="col-lg-6">
                                                                        <label for="exampleFormControlInput1" class="form-label">Línea de Crédito Autorizado</label>
                                                                        <input type="text" class="form-control" id="creditoAutorizado" name="creditoAutorizado"  />
                                                                    </div>

                                                                    <div class="col-lg-6">
                                                                        <label for="exampleFormControlInput1" class="form-label">¿Cuenta con Tarjeta de Tienda Comercial?</label>
                                                                        <input type="text" class="form-control" id="tarjetaTienda" name="tarjetaTienda"  />
                                                                    </div>

                                                                    <div class="col-lg-6">
                                                                        <label for="exampleFormControlInput1" class="form-label">¿Con quién ?</label>
                                                                        <input type="text" class="form-control" id="conquienTienda" name="conquienTienda"  />
                                                                    </div>

                                                                    <div class="col-lg-6">
                                                                        <label for="exampleFormControlInput1" class="form-label">Línea de Crédito Autorizado Tienda</label>
                                                                        <input type="text" class="form-control" id="creditoAutorizadotienda" name="creditoAutorizadotienda"  />
                                                                    </div>

                                                                    <div class="col-lg-12">
                                                                        <label for="exampleFormControlInput1" class="form-label">Observaciones </label>
                                                                        <textarea class="form-control" id="observacionesDeu" name="observacionesDeu"></textarea>
                                                                    </div>

                                                                    <div class="col-lg-12"><hr></div>

                                                                    <div class="col-lg-12"><button class="btn btn-outline-primary" id="btnDeudas" style="width: 100%">Registrar</button></div>


                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    {{-- Entorno --}}
                                                    <div id="Entorno" style="display: none ;" >
                                                         <div class="card portlet border">
                                                            <div class="card-header portlet-header">
                                                                <h3 class="card-title portlet-title">Entorno</h3>
                                                            </div>
                                                            <div class="card-body">
                                                                <div class="row">
                                                                    <input type="hidden" class="form-control" id="idEntorno" name="idEntorno"  />
                                                                    <div class="col-lg-6">
                                                                        <label for="exampleFormControlInput1" class="form-label">Tipo de zona</label>
                                                                        <select class="form-control"  id="tipoZona" name="tipoZona">
                                                                            @foreach (config('catalogos.cattiposZonaVivienda') as $key => $value)
                                                                                <option value="{{ $key }}"> {{ $value }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>

                                                                    <div class="col-lg-6">
                                                                        <label for="exampleFormControlInput1" class="form-label">Tipo de vivienda</label>
                                                                        <select class="form-control"  id="tipoVivienda" name="tipoVivienda">
                                                                            @foreach (config('catalogos.cattiposVivienda') as $key => $value)
                                                                                <option value="{{ $key }}"> {{ $value }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>

                                                                    <div class="col-lg-6">
                                                                        <label for="exampleFormControlInput1" class="form-label">Edificación de inmueble</label>
                                                                        <select class="form-control"  id="edificacion" name="edificacion">
                                                                            @foreach (config('catalogos.cattiposTenenciaVivienda') as $key => $value)
                                                                                <option value="{{ $key }}"> {{ $value }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>

                                                                    <div class="col-lg-6">
                                                                        <label for="exampleFormControlInput1" class="form-label">Titular del inmueble</label>
                                                                        <input type="text" class="form-control" id="titular" name="titular"  />
                                                                    </div>

                                                                    <div class="col-lg-6">
                                                                        <label for="exampleFormControlInput1" class="form-label">Parentesco</label>
                                                                        <input type="text" class="form-control" id="parentesco" name="parentesco"  />
                                                                    </div>

                                                                    <div class="col-lg-6">
                                                                        <label for="exampleFormControlInput1" class="form-label">Número de recamaras</label>
                                                                        <input type="text" class="form-control" id="numRecamaras" name="numRecamaras"  />
                                                                    </div>

                                                                    <div class="col-lg-6">
                                                                        <label for="exampleFormControlInput1" class="form-label">Número de baños</label>
                                                                        <input type="text" class="form-control" id="nomBano" name="nomBano"  />
                                                                    </div>

                                                                    <div class="col-lg-6">
                                                                        <label for="exampleFormControlInput1" class="form-label">Tipo de baño</label>
                                                                        <select class="form-control"  id="tipobano" name="tipobano">
                                                                            @foreach (config('catalogos.catTipoBanos') as $key => $value)
                                                                                <option value="{{ $key }}"> {{ $value }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>

                                                                    <div class="col-lg-12"><hr></div>

                                                                    <div class="col-lg-12">
                                                                        <div class="form-check form-check-inline">
                                                                            <input class="form-check-input" type="checkbox" id="sala" value="1"> <label class="form-check-label" for="inlineCheckbox1">Sala</label>
                                                                        </div>
                                                                        <div class="form-check form-check-inline">
                                                                            <input class="form-check-input" type="checkbox" id="comedor" value="1"> <label class="form-check-label" for="inlineCheckbox1">Comedor</label>
                                                                        </div>
                                                                        <div class="form-check form-check-inline">
                                                                            <input class="form-check-input" type="checkbox" id="cocina" value="1"> <label class="form-check-label" for="inlineCheckbox1">Cocina</label>
                                                                        </div>
                                                                        <div class="form-check form-check-inline">
                                                                            <input class="form-check-input" type="checkbox" id="garaje" value="1"> <label class="form-check-label" for="inlineCheckbox1">Garaje</label>
                                                                        </div>
                                                                        <div class="form-check form-check-inline">
                                                                            <input class="form-check-input" type="checkbox" id="jardin" value="1"> <label class="form-check-label" for="inlineCheckbox1">Jardin</label>
                                                                        </div>
                                                                        <div class="form-check form-check-inline">
                                                                            <input class="form-check-input" type="checkbox" id="estudio" value="1"> <label class="form-check-label" for="inlineCheckbox1">Estudio</label>
                                                                        </div>
                                                                        <div class="form-check form-check-inline">
                                                                            <input class="form-check-input" type="checkbox" id="zotehuela" value="1"> <label class="form-check-label" for="inlineCheckbox1">Zotehuela</label>
                                                                        </div>
                                                                        <div class="form-check form-check-inline">
                                                                            <input class="form-check-input" type="checkbox" id="patio" value="1"> <label class="form-check-label" for="inlineCheckbox1">Patio</label>
                                                                        </div>
                                                                        <div class="form-check form-check-inline">
                                                                            <input class="form-check-input" type="checkbox" id="regadera" value="1"> <label class="form-check-label" for="inlineCheckbox1">Regadera</label>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-lg-12"><hr></div>

                                                                    <div class="col-lg-12">
                                                                        <div class="form-check form-check-inline">
                                                                            <input class="form-check-input" type="checkbox" id="agua" value="1"> <label class="form-check-label" for="inlineCheckbox1">Agua</label>
                                                                        </div>
                                                                        <div class="form-check form-check-inline">
                                                                            <input class="form-check-input" type="checkbox" id="luz" value="1"> <label class="form-check-label" for="inlineCheckbox1">Luz</label>
                                                                        </div>
                                                                        <div class="form-check form-check-inline">
                                                                            <input class="form-check-input" type="checkbox" id="drenaje" value="1"> <label class="form-check-label" for="inlineCheckbox1">Drenaje</label>
                                                                        </div>
                                                                        <div class="form-check form-check-inline">
                                                                            <input class="form-check-input" type="checkbox" id="pavimentacion" value="1"> <label class="form-check-label" for="inlineCheckbox1">Pavimentación</label>
                                                                        </div>
                                                                        <div class="form-check form-check-inline">
                                                                            <input class="form-check-input" type="checkbox" id="telefonoent" value="1"> <label class="form-check-label" for="inlineCheckbox1">Teléfono</label>
                                                                        </div>
                                                                        {{-- <div class="form-check form-check-inline">
                                                                            <input class="form-check-input" type="checkbox" id="transporte" value="1"> <label class="form-check-label" for="inlineCheckbox1">Transporte</label>
                                                                        </div> --}}
                                                                        <div class="form-check form-check-inline">
                                                                            <input class="form-check-input" type="checkbox" id="areas" value="1"> <label class="form-check-label" for="inlineCheckbox1">Area de recreación</label>
                                                                        </div>
                                                                        <div class="form-check form-check-inline">
                                                                            <input class="form-check-input" type="checkbox" id="vigilancia" value="1"> <label class="form-check-label" for="inlineCheckbox1">Vigilancia</label>
                                                                        </div>
                                                                        <div class="form-check form-check-inline">
                                                                            <input class="form-check-input" type="checkbox" id="internet" value="1"> <label class="form-check-label" for="inlineCheckbox1">Internet</label>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-lg-12"><hr></div>

                                                                    <div class="col-lg-12">
                                                                        <div class="form-check form-check-inline">
                                                                            <input class="form-check-input" type="checkbox" id="telNormal" value="1"> <label class="form-check-label" for="inlineCheckbox1">Televisión</label>
                                                                        </div>
                                                                        {{-- <div class="form-check form-check-inline">
                                                                            <input class="form-check-input" type="checkbox" id="telPlasma" value="1"> <label class="form-check-label" for="inlineCheckbox1">Televisión de plasma</label>
                                                                        </div> --}}
                                                                        {{-- <div class="form-check form-check-inline">
                                                                            <input class="form-check-input" type="checkbox" id="estereo" value="1"> <label class="form-check-label" for="inlineCheckbox1">Estéreo</label>
                                                                        </div> --}}
                                                                        {{-- <div class="form-check form-check-inline">
                                                                            <input class="form-check-input" type="checkbox" id="dvd" value="1"> <label class="form-check-label" for="inlineCheckbox1">DVD</label>
                                                                        </div>
                                                                        <div class="form-check form-check-inline">
                                                                            <input class="form-check-input" type="checkbox" id="blueray" value="1"> <label class="form-check-label" for="inlineCheckbox1">Blue Ray</label>
                                                                        </div> --}}
                                                                        <div class="form-check form-check-inline">
                                                                            <input class="form-check-input" type="checkbox" id="estufa" value="1"> <label class="form-check-label" for="inlineCheckbox1">Estufa</label>
                                                                        </div>
                                                                        <div class="form-check form-check-inline">
                                                                            <input class="form-check-input" type="checkbox" id="horno" value="1"> <label class="form-check-label" for="inlineCheckbox1">Horno de microondas</label>
                                                                        </div>
                                                                        <div class="form-check form-check-inline">
                                                                            <input class="form-check-input" type="checkbox" id="lavadora" value="1"> <label class="form-check-label" for="inlineCheckbox1">Lavadora</label>
                                                                        </div>
                                                                        <div class="form-check form-check-inline">
                                                                            <input class="form-check-input" type="checkbox" id="centrolavado" value="1"> <label class="form-check-label" for="inlineCheckbox1">Centro de lavado</label>
                                                                        </div>
                                                                        <div class="form-check form-check-inline">
                                                                            <input class="form-check-input" type="checkbox" id="refrigerador" value="1"> <label class="form-check-label" for="inlineCheckbox1">Refrigerador</label>
                                                                        </div>
                                                                        <div class="form-check form-check-inline">
                                                                            <input class="form-check-input" type="checkbox" id="computadora" value="1"> <label class="form-check-label" for="inlineCheckbox1">Computadora</label>
                                                                        </div>

                                                                    </div>

                                                                    <div class="col-lg-12"><hr></div>

                                                                    <div class="col-lg-6">
                                                                        <label for="exampleFormControlInput1" class="form-label">Tipo de paredes</label>
                                                                        <select class="form-control"  id="paredes" name="paredes">
                                                                            @foreach (config('catalogos.catTuipoParedes') as $key => $value)
                                                                                <option value="{{ $key }}"> {{ $value }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>

                                                                    <div class="col-lg-6">
                                                                        <label for="exampleFormControlInput1" class="form-label">Tipo de techos</label>
                                                                        <select class="form-control"  id="techos" name="techos">
                                                                            @foreach (config('catalogos.cattipoTechos') as $key => $value)
                                                                                <option value="{{ $key }}"> {{ $value }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>

                                                                    <div class="col-lg-6">
                                                                        <label for="exampleFormControlInput1" class="form-label">Tipo de pisos</label>
                                                                        <select class="form-control"  id="pisos" name="pisos">
                                                                            @foreach (config('catalogos.catTipoPisos') as $key => $value)
                                                                                <option value="{{ $key }}"> {{ $value }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>

                                                                    <div class="col-lg-6">
                                                                        <label for="exampleFormControlInput1" class="form-label">Extensión del inmueble</label>
                                                                        <input type="text" class="form-control" id="extensionInmueble" name="extensionInmueble"  />
                                                                    </div>
                                                                    <div class="col-lg-6">
                                                                        <label for="exampleFormControlInput1" class="form-label">Condiciones generales del inmueble</label>
                                                                        <input type="text" class="form-control" id="condicionesInmueble" name="condicionesInmueble"  />
                                                                    </div>
                                                                    <div class="col-lg-6">
                                                                        <label for="exampleFormControlInput1" class="form-label">Condiciones del mobiliario</label>
                                                                        <input type="text" class="form-control" id="condicionesMobiliario" name="condicionesMobiliario"  />
                                                                    </div>

                                                                    <div class="col-lg-6">
                                                                        <label for="exampleFormControlInput1" class="form-label">Orden</label>
                                                                        <input type="text" class="form-control" id="orden" name="orden"  />
                                                                    </div>

                                                                    <div class="col-lg-6">
                                                                        <label for="exampleFormControlInput1" class="form-label">Limpieza</label>
                                                                        <input type="text" class="form-control" id="limpieza" name="limpieza"  />
                                                                    </div>

                                                                    <div class="col-lg-6">
                                                                        <label for="exampleFormControlInput1" class="form-label">Delincuencia</label>
                                                                        <input type="text" class="form-control" id="delincuencia" name="delincuencia"  />
                                                                    </div>

                                                                    <div class="col-lg-6">
                                                                        <label for="exampleFormControlInput1" class="form-label">Vandalismo</label>
                                                                        <input type="text" class="form-control" id="vandalismo" name="vandalismo"  />
                                                                    </div>

                                                                    <div class="col-lg-6">
                                                                        <label for="exampleFormControlInput1" class="form-label">Drogadicción</label>
                                                                        <input type="text" class="form-control" id="drogadiccion" name="drogadiccion"  />
                                                                    </div>

                                                                    <div class="col-lg-6">
                                                                        <label for="exampleFormControlInput1" class="form-label">Alcoholismo</label>
                                                                        <input type="text" class="form-control" id="alcoholismo" name="alcoholismo"  />
                                                                    </div>

                                                                    <div class="col-lg-6">
                                                                        <label for="exampleFormControlInput1" class="form-label">Principales vías de acceso</label>
                                                                        <input type="text" class="form-control" id="viasdeacceso" name="viasdeacceso"  />
                                                                    </div>

                                                                    <div class="col-lg-6">
                                                                        <label for="exampleFormControlInput1" class="form-label">Medio de transporte</label>
                                                                        <input type="text" class="form-control" id="medioTransporte" name="medioTransporte"  />
                                                                    </div>

                                                                    <div class="col-lg-6">
                                                                        <label for="exampleFormControlInput1" class="form-label">Tiempo aproximado a su servicio</label>
                                                                        <input type="text" class="form-control" id="tiempoServicio" name="tiempoServicio"  />
                                                                    </div>

                                                                    <div class="col-lg-6">
                                                                        <label for="exampleFormControlInput1" class="form-label">Entre que calles</label>
                                                                        <input type="text" class="form-control" id="entreCalles" name="entreCalles"  />
                                                                    </div>
                                                                    <div class="col-lg-6">
                                                                        <label for="exampleFormControlInput1" class="form-label">Color de la vivienda:</label>
                                                                        <input type="text" class="form-control" id="color" name="color"  />
                                                                    </div>
                                                                    <div class="col-lg-6">
                                                                        <label for="exampleFormControlInput1" class="form-label">Color del portón</label>
                                                                        <input type="text" class="form-control" id="porton" name="porton"  />
                                                                    </div>
                                                                    <div class="col-lg-6">
                                                                        <label for="exampleFormControlInput1" class="form-label">Referencia</label>
                                                                        <input type="text" class="form-control" id="referencias" name="referencias"  />
                                                                    </div>
                                                                    <div class="col-lg-6">
                                                                        <label for="exampleFormControlInput1" class="form-label">Renta mensual</label>
                                                                        <input type="text" class="form-control" id="renta" name="renta"  />
                                                                    </div>

                                                                    <div class="col-lg-12">
                                                                        <label for="exampleFormControlInput1" class="form-label">Observaciones </label>
                                                                        <textarea class="form-control" id="observacionesent"></textarea>
                                                                    </div>

                                                                    <div class="col-lg-12"><hr></div>

                                                                    <div class="col-lg-12"><button class="btn btn-outline-primary" id="btnEntorno" style="width: 100%">Registrar</button></div>


                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    {{-- Referencias personales --}}
                                                    <div id="Referenciaspersonales" style="display: none ;" >
                                                        <div class="card portlet border">
                                                            <div class="card-header portlet-header">
                                                                <h3 class="card-title portlet-title">Referencias personales</h3>
                                                            </div>
                                                            <div class="card-body">
                                                                <div class="row">
                                                                    <input type="hidden" class="form-control" id="idReferenciap" name="idReferenciap"  />
                                                                    <div class="col-lg-4">
                                                                        <label for="exampleFormControlInput1" class="form-label">Nombre</label>
                                                                        <input type="text" class="form-control" id="nombrep" name="nombrep"  />
                                                                    </div>

                                                                    <div class="col-lg-4">
                                                                        <label for="exampleFormControlInput1" class="form-label">Tiempo de conocerlo</label>
                                                                        <input type="text" class="form-control" id="tiempoConocerlop" name="tiempoConocerlop"  />
                                                                    </div>

                                                                    <div class="col-lg-4">
                                                                        <label for="exampleFormControlInput1" class="form-label">Relación</label>
                                                                        <input type="text" class="form-control" id="relacionp" name="relacionp"  />
                                                                    </div>

                                                                    <div class="col-lg-8">
                                                                        <label for="exampleFormControlInput1" class="form-label">Domicilio</label>
                                                                        <input type="text" class="form-control" id="domiciliop" name="domiciliop"  />
                                                                    </div>

                                                                    <div class="col-lg-4">
                                                                        <label for="exampleFormControlInput1" class="form-label">Teléfono</label>
                                                                        <input type="text" class="form-control" id="tel1p" name="tel1p"  />
                                                                    </div>

                                                                    <div class="col-lg-12">
                                                                        <label for="exampleFormControlInput1" class="form-label">Opinión sobre el candidato </label>
                                                                        <textarea class="form-control" name="opinionp" id="opinionp"></textarea>
                                                                    </div>

                                                                    <div class="col-lg-12"><hr></div>

                                                                    <div class="col-lg-12"><button class="btn btn-outline-primary" id="btnReferenciap" style="width: 100%">Registrar</button></div>


                                                                </div>
                                                            </div>
                                                        </div>
                                                        <table id="datatable4" class="table table-hover table-bordered table-striped " style="border-collapse: collapse; width: 100%;">
                                                            <thead>
                                                                <tr>
                                                                    <th>Id</th>
                                                                    <th>Nombre</th>
                                                                    <th>tiempo de conocerlo</th>
                                                                    <th>Relación</th>
                                                                    <th>Domicilio</th>
                                                                    <th>Teléfono</th>
                                                                    <th>Opinión sobre el candidato</th>
                                                                    <th>Acción</th>

                                                                </tr>
                                                            </thead>
                                                            <tbody>

                                                            </tbody>
                                                        </table>
                                                    </div>

                                                    {{-- Antecedentes laborales --}}
                                                    <div id="Antecedenteslaborales" style="display: none ;" >
                                                       <div class="card portlet border">
                                                            <div class="card-header portlet-header">
                                                                <h3 class="card-title portlet-title">Antecedentes laborales</h3>
                                                            </div>
                                                            <div class="card-body">
                                                                <div class="row">
                                                                    <input type="hidden" class="form-control" id="idAntecedentesl" name="idAntecedentesl"  />
                                                                    <div class="col-lg-4">
                                                                        <label for="exampleFormControlInput1" class="form-label">Empresa</label>
                                                                        <input type="text" class="form-control" id="empresal" name="empresal"  />
                                                                    </div>

                                                                    <div class="col-lg-4">
                                                                        <label for="exampleFormControlInput1" class="form-label">Giro</label>
                                                                        <input type="text" class="form-control" id="girol" name="girol"  />
                                                                    </div>

                                                                    <div class="col-lg-4">
                                                                        <label for="exampleFormControlInput1" class="form-label">Dirección</label>
                                                                        <input type="text" class="form-control" id="direccionl" name="direccionl"  />
                                                                    </div>

                                                                    <div class="col-lg-4">
                                                                        <label for="exampleFormControlInput1" class="form-label">Teléfono</label>
                                                                        <input type="text" class="form-control" id="telefonol" name="telefonol"  />
                                                                    </div>

                                                                    <div class="col-lg-4">
                                                                        <label for="exampleFormControlInput1" class="form-label">Fecha de ingreso</label>
                                                                        <input type="text" class="form-control" id="fechaIngresol" name="fechaIngresol"  />
                                                                    </div>

                                                                    <div class="col-lg-4">
                                                                        <label for="exampleFormControlInput1" class="form-label">Fecha de egreso</label>
                                                                        <input type="text" class="form-control" id="fechaEgresol" name="fechaEgresol"  />
                                                                    </div>

                                                                    <div class="col-lg-4">
                                                                        <label for="exampleFormControlInput1" class="form-label">Puesto</label>
                                                                        <input type="text" class="form-control" id="puestol" name="puestol"  />
                                                                    </div>

                                                                    <div class="col-lg-4">
                                                                        <label for="exampleFormControlInput1" class="form-label">Área</label>
                                                                        <input type="text" class="form-control" id="areal" name="areal"  />
                                                                    </div>

                                                                    <div class="col-lg-4">
                                                                        <label for="exampleFormControlInput1" class="form-label">Salario</label>
                                                                        <input type="text" class="form-control" id="salariol" name="salariol"  />
                                                                    </div>

                                                                    <div class="col-lg-4">
                                                                        <label for="exampleFormControlInput1" class="form-label">Motivo de salida</label>
                                                                        <input type="text" class="form-control" id="motivoSalidal" name="motivoSalidal"  />
                                                                    </div>

                                                                    <div class="col-lg-4">
                                                                        <label for="exampleFormControlInput1" class="form-label">Quién proporciona información</label>
                                                                        <input type="text" class="form-control" id="quienProporcionol" name="quienProporcionol"  />
                                                                    </div>

                                                                    <div class="col-lg-4">
                                                                        <label for="exampleFormControlInput1" class="form-label">Puesto</label>
                                                                        <input type="text" class="form-control" id="puestoProporcionol" name="puestoProporcionol"  />
                                                                    </div>

                                                                    <div class="col-lg-4">
                                                                        <label for="exampleFormControlInput1" class="form-label">Calificación del 1 al 10</label>
                                                                        <input type="text" class="form-control" id="calificacionl" name="calificacionl"  />
                                                                    </div>

                                                                    <div class="col-lg-4">
                                                                        <label for="exampleFormControlInput1" class="form-label">El candidato interpuso demanda</label>
                                                                        <input type="text" class="form-control" id="demandal" name="demandal"  />
                                                                    </div>

                                                                    <div class="col-lg-4">
                                                                        <label for="exampleFormControlInput1" class="form-label">Lo volveria a contratar</label>
                                                                        <input type="text" class="form-control" id="volverial" name="volverial"  />
                                                                    </div>

                                                                    <div class="col-lg-4">
                                                                        <label for="exampleFormControlInput1" class="form-label">Por qué</label>
                                                                        <input type="text" class="form-control" id="porquel" name="porquel"  />
                                                                    </div>

                                                                    <div class="col-lg-4">
                                                                        <label for="exampleFormControlInput1" class="form-label">El candidato es:</label>
                                                                        <select class="form-control"  id="candidatoesl" name="candidatoesl">
                                                                            @foreach (config('catalogos.catestatusCandidato') as $key => $value)
                                                                                <option value="{{ $key }}"> {{ $value }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                    <div class="col-lg-4">
                                                                        <label for="exampleFormControlInput1" class="form-label">El candidato tiene periodos Inactivos</label>
                                                                        <input type="text" class="form-control" id="periodosInactivol" name="periodosInactivol"  />
                                                                    </div>

                                                                    <div class="col-lg-12">
                                                                        <label for="exampleFormControlInput1" class="form-label">Opinión sobre el candidato </label>
                                                                        <textarea class="form-control" name="observacionesl" id="observacionesl"></textarea>
                                                                    </div>

                                                                    <div class="col-lg-12"><hr></div>

                                                                    <div class="col-lg-12"><button class="btn btn-outline-primary" id="btnAntecendesl" style="width: 100%">Registrar</button></div>


                                                                </div>
                                                            </div>
                                                        </div>
                                                        <table id="datatable17" class="table table-hover table-bordered table-striped" style="border-collapse: collapse; width: 100%;">
                                                            <thead>
                                                                <tr>
                                                                    <th>Id</th>
                                                                    <th>Empresa</th>
                                                                    <th>Giro</th>
                                                                    <th>Dirección</th>
                                                                    <th>F.ingreso</th>
                                                                    <th>F.egreso</th>
                                                                    <th>Puesto</th>
                                                                    <th>Área</th>
                                                                    <th>Salario</th>
                                                                    <th>Motivo</th>
                                                                    <th>Proporciona</th>
                                                                    <th>Puesto</th>
                                                                    <th>Calificación</th>
                                                                    <th>Demanda</th>
                                                                    <th>Volveria a contratar</th>
                                                                    <th>Por qué</th>
                                                                    <th>Opinión</th>
                                                                    <th>El candidato es:</th>
                                                                    <th>Periodos Inactivos</th>
                                                                    <th>Acción</th>

                                                                </tr>
                                                            </thead>
                                                            <tbody>

                                                            </tbody>
                                                        </table>
                                                    </div>

                                                    {{-- Salud --}}
                                                    <div id="Salud" style="display: none ;" >
                                                        <div class="card portlet border">
                                                            <div class="card-header portlet-header">
                                                                <h3 class="card-title portlet-title">Salud</h3>
                                                            </div>
                                                            <div class="card-body">
                                                                <div class="row">
                                                                    <input type="hidden" class="form-control" id="idSalud" name="idSalud"  />
                                                                    <div class="col-lg-4">
                                                                        <label for="exampleFormControlInput1" class="form-label">Ha consumido algún tipo de droga</label>
                                                                        <input type="text" class="form-control" id="droga" name="droga"  />
                                                                    </div>

                                                                    <div class="col-lg-4">
                                                                        <label for="exampleFormControlInput1" class="form-label">¿Cuál?</label>
                                                                        <input type="text" class="form-control" id="cualDroga" name="cualDroga"  />
                                                                    </div>

                                                                    <div class="col-lg-4">
                                                                        <label for="exampleFormControlInput1" class="form-label">Usted fuma</label>
                                                                        <input type="text" class="form-control" id="fuma" name="fuma"  />
                                                                    </div>

                                                                    <div class="col-lg-4">
                                                                        <label for="exampleFormControlInput1" class="form-label">Frecuencia</label>
                                                                        <input type="text" class="form-control" id="frecuenciaFuma" name="frecuenciaFuma"  />
                                                                    </div>

                                                                    <div class="col-lg-4">
                                                                        <label for="exampleFormControlInput1" class="form-label">Ingiere bebidas alcohólicas</label>
                                                                        <input type="text" class="form-control" id="bebidas" name="bebidas"  />
                                                                    </div>

                                                                    <div class="col-lg-4">
                                                                        <label for="exampleFormControlInput1" class="form-label">Frecuencia</label>
                                                                        <input type="text" class="form-control" id="frecuenciaBebidas" name="frecuenciaBebidas"  />
                                                                    </div>

                                                                    <div class="col-lg-4">
                                                                        <label for="exampleFormControlInput1" class="form-label">Toma café</label>
                                                                        <input type="text" class="form-control" id="cafe" name="cafe"  />
                                                                    </div>

                                                                    <div class="col-lg-4">
                                                                        <label for="exampleFormControlInput1" class="form-label">Frecuencia</label>
                                                                        <input type="text" class="form-control" id="frecuenciaCafe" name="frecuenciaCafe"  />
                                                                    </div>

                                                                    <div class="col-lg-4">
                                                                        <label for="exampleFormControlInput1" class="form-label">Utiliza lentes</label>
                                                                        <input type="text" class="form-control" id="lentes" name="lentes"  />
                                                                    </div>

                                                                    <div class="col-lg-4">
                                                                        <label for="exampleFormControlInput1" class="form-label">Diagnóstico</label>
                                                                        <input type="text" class="form-control" id="diagnostico" name="diagnostico"  />
                                                                    </div>

                                                                    <div class="col-lg-4">
                                                                        <label for="exampleFormControlInput1" class="form-label">Intervenciones quirúrgicas</label>
                                                                        <input type="text" class="form-control" id="intervenciones" name="intervenciones"  />
                                                                    </div>

                                                                    <div class="col-lg-4">
                                                                        <label for="exampleFormControlInput1" class="form-label">¿De qué?</label>
                                                                        <input type="text" class="form-control" id="dequeintervenciones" name="dequeintervenciones"  />
                                                                    </div>

                                                                    <div class="col-lg-4">
                                                                        <label for="exampleFormControlInput1" class="form-label">Enfermedades crónicas</label>
                                                                        <input type="text" class="form-control" id="enfermedadesCronicas" name="enfermedadesCronicas"  />
                                                                    </div>

                                                                    <div class="col-lg-4">
                                                                        <label for="exampleFormControlInput1" class="form-label">¿De qué?</label>
                                                                        <input type="text" class="form-control" id="dequeCronicas" name="dequeCronicas"  />
                                                                    </div>

                                                                    <div class="col-lg-4">
                                                                        <label for="exampleFormControlInput1" class="form-label">Enfermedades hereditarias</label>
                                                                        <input type="text" class="form-control" id="hereditarias" name="hereditarias"  />
                                                                    </div>

                                                                    <div class="col-lg-4">
                                                                        <label for="exampleFormControlInput1" class="form-label">¿Cuál?</label>
                                                                        <input type="text" class="form-control" id="cualHereditarias" name="cualHereditarias"  />
                                                                    </div>

                                                                    <div class="col-lg-4">
                                                                        <label for="exampleFormControlInput1" class="form-label">¿Por qué?</label>
                                                                        <input type="text" class="form-control" id="porqueConstante" name="porqueConstante"  />
                                                                    </div>

                                                                    <div class="col-lg-4">
                                                                        <label for="exampleFormControlInput1" class="form-label">Última vez que se realizó un examen médico</label>
                                                                        <input type="text" class="form-control" id="ultimaVez" name="ultimaVez"  />
                                                                    </div>

                                                                    <div class="col-lg-4">
                                                                        <label for="exampleFormControlInput1" class="form-label">¿Su salud la considera?</label>
                                                                        <input type="text" class="form-control" id="considera" name="considera"  />
                                                                    </div>

                                                                    <div class="col-lg-4">
                                                                        <label for="exampleFormControlInput1" class="form-label">¿Por qué?</label>
                                                                        <input type="text" class="form-control" id="porqueConsidera" name="porqueConsidera"  />
                                                                    </div>

                                                                    <div class="col-lg-4">
                                                                        <label for="exampleFormControlInput1" class="form-label">¿Practica algún deporte?</label>
                                                                        <input type="text" class="form-control" id="deporte" name="deporte"  />
                                                                    </div>

                                                                    <div class="col-lg-4">
                                                                        <label for="exampleFormControlInput1" class="form-label">¿Cuál es su pasatiempo?</label>
                                                                        <input type="text" class="form-control" id="pasatiempo" name="pasatiempo"  />
                                                                    </div>

                                                                    <div class="col-lg-4">
                                                                        <label for="exampleFormControlInput1" class="form-label">Última vez que se enfermó. ¿De qué?</label>
                                                                        <input type="text" class="form-control" id="ultimavezDeque" name="ultimavezDeque"  />
                                                                    </div>

                                                                    <div class="col-lg-4">
                                                                        <label for="exampleFormControlInput1" class="form-label">¿Está embarazada?</label>
                                                                        <input type="text" class="form-control" id="embarazo" name="embarazo"  />
                                                                    </div>

                                                                    <div class="col-lg-6">
                                                                        <label for="exampleFormControlInput1" class="form-label">Usted o alguno de sus familiares requieren atención médica constante</label>
                                                                        <input type="text" class="form-control" id="quienConstante" name="quienConstante"  />
                                                                    </div>


                                                                    <div class="col-lg-12"><hr></div>

                                                                    <div class="col-lg-12"><button class="btn btn-outline-primary" id="btnSalud" style="width: 100%">Registrar</button></div>


                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    {{-- Resumen --}}
                                                    <div id="Resumen" style="display: none ;" >
                                                        <div class="card portlet border">
                                                            <div class="card-header portlet-header">
                                                                <h3 class="card-title portlet-title">Resumen</h3>
                                                            </div>
                                                            <div class="card-body">
                                                                <div class="row">

                                                                    <div class="col-lg-4">
                                                                        <label for="exampleFormControlInput1" class="form-label">Áreas verificadas</label>

                                                                    </div>
                                                                    <input type="hidden" class="form-control" id="idResumen" name="idResumen"  />
                                                                    <div class="col-lg-4">
                                                                        <label for="exampleFormControlInput1" class="form-label">Social:</label>
                                                                         <select class="form-control"  id="social" name="social">
                                                                            @foreach (config('catalogos.catrecomendacionesTipo') as $key => $value)
                                                                                <option value="{{ $key }}"> {{ $value }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>

                                                                    <div class="col-lg-4">
                                                                        <label for="exampleFormControlInput1" class="form-label">Escolar:</label>
                                                                         <select class="form-control"  id="escolar" name="escolar">
                                                                            @foreach (config('catalogos.catrecomendacionesTipo') as $key => $value)
                                                                                <option value="{{ $key }}"> {{ $value }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>

                                                                    <div class="col-lg-4">
                                                                        <label for="exampleFormControlInput1" class="form-label">Económica:</label>
                                                                         <select class="form-control"  id="economica" name="economica">
                                                                            @foreach (config('catalogos.catrecomendacionesTipo') as $key => $value)
                                                                                <option value="{{ $key }}"> {{ $value }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>

                                                                    <div class="col-lg-4">
                                                                        <label for="exampleFormControlInput1" class="form-label">Laboral:</label>
                                                                         <select class="form-control"  id="laboral" name="laboral">
                                                                            @foreach (config('catalogos.catrecomendacionesTipo') as $key => $value)
                                                                                <option value="{{ $key }}"> {{ $value }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>

                                                                    <div class="col-lg-4">
                                                                        <label for="exampleFormControlInput1" class="form-label">Actitud del candidato durante la entrevista:</label>
                                                                        <input type="text" class="form-control" id="actitud" name="actitud"  />
                                                                    </div>

                                                                    <div class="col-lg-4">
                                                                        <label for="exampleFormControlInput1" class="form-label">Recomendación para el puesto:</label>
                                                                        <select class="form-control"  id="recomendacion" name="recomendacion">
                                                                            @foreach (config('catalogos.catrecomendaciones') as $key => $value)
                                                                                <option value="{{ $key }}"> {{ $value }}</option>
                                                                            @endforeach
                                                                        </select>

                                                                    </div>

                                                                    <div class="col-lg-4">
                                                                        <label for="exampleFormControlInput1" class="form-label">Calificación:</label>
                                                                        <input type="text" class="form-control" id="cali" name="cali"  />
                                                                    </div>

                                                                    <div class="col-lg-12">
                                                                        <label for="exampleFormControlInput1" class="form-label">8 a 10 Recomendable para su contratación / 6 a 7 Recomendable para su contratación / 0 a 5 Recomendable para su contratación</label>
                                                                    </div>

                                                                    <div class="col-lg-12">
                                                                        <label for="exampleFormControlInput1" class="form-label">Observaciones </label>
                                                                        <textarea class="form-control" id="observacionesr" name="observacionesr"></textarea>
                                                                    </div>

                                                                    <div class="col-lg-12">
                                                                        <label for="exampleFormControlInput1" class="form-label">Observaciones Laborales </label>
                                                                        <textarea class="form-control" id="observacionesLaboral" name="observacionesLaboral"></textarea>
                                                                    </div>

                                                                    <div class="col-lg-12">
                                                                        <label for="exampleFormControlInput1" class="form-label">Observaciones Personales </label>
                                                                        <textarea class="form-control" id="observacionesPersonal" name="observacionesPersonal"></textarea>
                                                                    </div>

                                                                    <div class="col-lg-12"><hr></div>

                                                                    <div class="col-lg-12"><button class="btn btn-outline-primary" id="btnResumen" style="width: 100%">Registrar</button></div>


                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    {{-- Hobby/Intereses --}}
                                                    <div id="HobbyIntereses" style="display: none ;" >
                                                        <div class="card portlet border">
                                                            <div class="card-header portlet-header">
                                                                <h3 class="card-title portlet-title">Hobby/Intereses</h3>
                                                            </div>
                                                            <div class="card-body">
                                                                <div class="row">
                                                                    <input type="hidden" class="form-control" id="idHobby" name="idHobby"  />
                                                                    <div class="col-lg-6">
                                                                        <label for="exampleFormControlInput1" class="form-label">Deportes</label>
                                                                        <input type="text" class="form-control" id="deportes" name="deportes"  />
                                                                    </div>

                                                                    <div class="col-lg-6">
                                                                        <label for="exampleFormControlInput1" class="form-label">Cual</label>
                                                                        <input type="text" class="form-control" id="cual" name="cual"  />
                                                                    </div>

                                                                    <div class="col-lg-6">
                                                                        <label for="exampleFormControlInput1" class="form-label">Frecuencia</label>
                                                                        <input type="text" class="form-control" id="frecuencia" name="frecuencia"  />
                                                                    </div>

                                                                    <div class="col-lg-6">
                                                                        <label for="exampleFormControlInput1" class="form-label">Pasatiempos</label>
                                                                        <input type="text" class="form-control" id="pasatiempos" name="pasatiempos"  />
                                                                    </div>

                                                                    <div class="col-lg-6">
                                                                        <label for="exampleFormControlInput1" class="form-label">Otros</label>
                                                                        <input type="text" class="form-control" id="otros" name="otros"  />
                                                                    </div>


                                                                    <div class="col-lg-12"><hr></div>

                                                                    <div class="col-lg-12"><button class="btn btn-outline-primary" id="btnHobby" style="width: 100%">Registrar</button></div>


                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    {{-- Beneficiarios --}}
                                                    <div id="Beneficiarios" style="display: none ;" >
                                                        <div class="card portlet border">
                                                            <div class="card-header portlet-header">
                                                                <h3 class="card-title portlet-title">Beneficiarios</h3>
                                                            </div>
                                                            <div class="card-body">
                                                                <div class="row">
                                                                    <input type="hidden" class="form-control" id="idBeneficiario" name="idBeneficiario"  />
                                                                    <div class="col-lg-4">
                                                                        <label for="exampleFormControlInput1" class="form-label">Parentesco</label>
                                                                        <input type="text" class="form-control" id="parentescob" name="parentescob"  />
                                                                    </div>

                                                                    <div class="col-lg-4">
                                                                        <label for="exampleFormControlInput1" class="form-label">Nombre</label>
                                                                        <input type="text" class="form-control" id="nombreb" name="nombreb"  />
                                                                    </div>

                                                                    <div class="col-lg-4">
                                                                        <label for="exampleFormControlInput1" class="form-label">Edad</label>
                                                                        <input type="text" class="form-control" id="edadb" name="edadb"  />
                                                                    </div>

                                                                    <div class="col-lg-4">
                                                                        <label for="exampleFormControlInput1" class="form-label">Ocupación</label>
                                                                        <input type="text" class="form-control" id="ocupacionb" name="ocupacionb"  />
                                                                    </div>

                                                                    <div class="col-lg-4">
                                                                        <label for="exampleFormControlInput1" class="form-label">Donde labora</label>
                                                                        <input type="text" class="form-control" id="dondeb" name="dondeb"  />
                                                                    </div>

                                                                    <div class="col-lg-4">
                                                                        <label for="exampleFormControlInput1" class="form-label">Calle</label>
                                                                        <input type="text" class="form-control" id="calleb" name="calleb"  />
                                                                    </div>

                                                                    <div class="col-lg-4">
                                                                        <label for="exampleFormControlInput1" class="form-label">Número</label>
                                                                        <input type="text" class="form-control" id="numerob" name="numerob"  />
                                                                    </div>

                                                                    <div class="col-lg-4">
                                                                        <label for="exampleFormControlInput1" class="form-label">Colonia</label>
                                                                        <input type="text" class="form-control" id="coloniab" name="coloniab"  />
                                                                    </div>

                                                                    <div class="col-lg-4">
                                                                        <label for="exampleFormControlInput1" class="form-label">Delegación</label>
                                                                        <input type="text" class="form-control" id="delegacionb" name="delegacionb"  />
                                                                    </div>

                                                                    <div class="col-lg-4">
                                                                        <label for="exampleFormControlInput1" class="form-label">Ciudad</label>
                                                                        <select class="form-control"  id="ciudadb" name="ciudadb">
                                                                            @foreach (config('catalogos.catestadosMexico') as $key => $value)
                                                                                <option value="{{ $key }}"> {{ $value }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>

                                                                    <div class="col-lg-4">
                                                                        <label for="exampleFormControlInput1" class="form-label">Estado</label>
                                                                        <input type="text" class="form-control" id="estadob" name="estadob"  />
                                                                    </div>

                                                                    <div class="col-lg-4">
                                                                        <label for="exampleFormControlInput1" class="form-label">C.P</label>
                                                                        <input type="text" class="form-control" id="cpb" name="cpb"  />
                                                                    </div>

                                                                    <div class="col-lg-4">
                                                                        <label for="exampleFormControlInput1" class="form-label">Tiempo</label>
                                                                        <input type="text" class="form-control" id="tiempob" name="tiempob"  />
                                                                    </div>

                                                                    <div class="col-lg-4">
                                                                        <label for="exampleFormControlInput1" class="form-label">Télefono</label>
                                                                        <input type="text" class="form-control" id="telefonob" name="telefonob"  />
                                                                    </div>

                                                                    <div class="col-lg-12"><hr></div>

                                                                    <div class="col-lg-12"><button class="btn btn-outline-primary" id="btnBeneficiario" style="width: 100%">Registrar</button></div>


                                                                </div>
                                                            </div>
                                                        </div>
                                                        <table id="datatable7" class="table table-hover table-bordered table-striped " style="border-collapse: collapse; width: 100%;">
                                                            <thead>
                                                                <tr>
                                                                    <th>Id</th>
                                                                    <th>Parentesco</th>
                                                                    <th>Nombre</th>
                                                                    <th>Edad</th>
                                                                    <th>Ocupación</th>
                                                                    <th>Donde labora</th>
                                                                    <th>Calle</th>
                                                                    <th>Número</th>
                                                                    <th>Colonia</th>
                                                                    <th>Delegación</th>
                                                                    <th>Ciudad</th>
                                                                    <th>Estado</th>
                                                                    <th>C.P</th>
                                                                    <th>Tiempo</th>
                                                                    <th>Télefono</th>
                                                                    <th>Acción</th>

                                                                </tr>
                                                            </thead>
                                                            <tbody>

                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    {{-- Nivel Académico --}}
                                                    <div id="NivelAcademico" style="display: none ;" >
                                                        <div class="card portlet border">
                                                            <div class="card-header portlet-header">
                                                                <h3 class="card-title portlet-title">Nivel Académico</h3>
                                                            </div>
                                                            <div class="card-body">
                                                                <div class="row">
                                                                    <input type="hidden" class="form-control" id="idNivel" name="idNivel"  />
                                                                    <div class="col-lg-6">
                                                                        <label for="exampleFormControlInput1" class="form-label">Último grado de estudios</label>
                                                                        <input type="text" class="form-control" id="ultimon" name="ultimon"  />
                                                                    </div>

                                                                    <div class="col-lg-6">
                                                                        <label for="exampleFormControlInput1" class="form-label">Período</label>
                                                                        <input type="text" class="form-control" id="periodon" name="periodon"  />
                                                                    </div>

                                                                    <div class="col-lg-6">
                                                                        <label for="exampleFormControlInput1" class="form-label">Profesional</label>
                                                                        <input type="text" class="form-control" id="profesionaln" name="profesionaln"  />
                                                                    </div>

                                                                    <div class="col-lg-6">
                                                                        <label for="exampleFormControlInput1" class="form-label">No. de cédula</label>
                                                                        <input type="text" class="form-control" id="cedulan" name="cedulan"  />
                                                                    </div>

                                                                    <div class="col-lg-6">
                                                                        <label for="exampleFormControlInput1" class="form-label">Especialidad</label>
                                                                        <input type="text" class="form-control" id="especialidadn" name="especialidadn"  />
                                                                    </div>

                                                                    <div class="col-lg-6">
                                                                        <label for="exampleFormControlInput1" class="form-label">En caso de no tener cédula profesional especifica último grado</label>
                                                                        <input type="text" class="form-control" id="cason" name="cason"  />
                                                                    </div>

                                                                    <div class="col-lg-6">
                                                                        <label for="exampleFormControlInput1" class="form-label">Otros</label>
                                                                        <input type="text" class="form-control" id="otrosn" name="otrosn"  />
                                                                    </div>

                                                                    <div class="col-lg-12"><hr></div>

                                                                    <div class="col-lg-12"><button class="btn btn-outline-primary" id="btnNivel" style="width: 100%">Registrar</button></div>


                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    {{-- Periodos no Laborados --}}
                                                    <div id="PeriodosnoLaborados" style="display: none ;" >
                                                        <div class="card portlet border">
                                                            <div class="card-header portlet-header">
                                                                <h3 class="card-title portlet-title">Periodos no Laborados</h3>
                                                            </div>
                                                            <div class="card-body">
                                                                <div class="row">
                                                                    <input type="hidden" class="form-control" id="idPeriodo" name="idPeriodo"  />
                                                                    <div class="col-lg-4">
                                                                        <label for="exampleFormControlInput1" class="form-label">Inicio</label>
                                                                        <input type="text" class="form-control" id="iniciop" name="iniciop"  />
                                                                    </div>

                                                                    <div class="col-lg-4">
                                                                        <label for="exampleFormControlInput1" class="form-label">Termino</label>
                                                                        <input type="text" class="form-control" id="terminop" name="terminop"  />
                                                                    </div>

                                                                    <div class="col-lg-4">
                                                                        <label for="exampleFormControlInput1" class="form-label">Motivo</label>
                                                                        <input type="text" class="form-control" id="motivop" name="motivop"  />
                                                                    </div>

                                                                    <div class="col-lg-12">
                                                                        <label for="exampleFormControlInput1" class="form-label">Comentarios</label>
                                                                        <textarea class="form-control" name="comentariosp" id="comentariosp"></textarea>
                                                                    </div>

                                                                    <div class="col-lg-12"><hr></div>

                                                                    <div class="col-lg-12"><button class="btn btn-outline-primary" id="btnPeriodo" style="width: 100%">Registrar</button></div>


                                                                </div>
                                                            </div>
                                                        </div>
                                                        <table id="datatable8" class="table table-hover table-bordered table-striped " style="border-collapse: collapse; width: 100%;">
                                                            <thead>
                                                                <tr>
                                                                    <th>Id</th>
                                                                    <th>Inicio</th>
                                                                    <th>Termino</th>
                                                                    <th>Motivo</th>
                                                                    <th>Comentarios</th>
                                                                    <th>Acción</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>

                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    {{-- Historial Laboral --}}
                                                    <div id="HistorialLaboral" style="display: none ;" >
                                                        <div class="card portlet border">
                                                            <div class="card-header portlet-header">
                                                                <h3 class="card-title portlet-title">Historial Laboral</h3>
                                                            </div>
                                                            <div class="card-body">
                                                                <div class="row">
                                                                    <input type="hidden" class="form-control" id="idHistorial" name="idHistorial"  />
                                                                    <div class="col-lg-6">
                                                                        <label for="exampleFormControlInput1" class="form-label">Último salario cotizado</label>
                                                                        <input type="text" class="form-control" id="ultimoh" name="ultimoh"  />
                                                                    </div>

                                                                    <div class="col-lg-6">
                                                                        <label for="exampleFormControlInput1" class="form-label">Vida laboral total</label>
                                                                        <input type="text" class="form-control" id="vidah" name="vidah"  />
                                                                    </div>

                                                                    <div class="col-lg-6">
                                                                        <label for="exampleFormControlInput1" class="form-label">No. de semanas cotizadas</label>
                                                                        <input type="text" class="form-control" id="nusemanah" name="nusemanah"  />
                                                                    </div>

                                                                    <div class="col-lg-6">
                                                                        <label for="exampleFormControlInput1" class="form-label">% de tiempo laborado</label>
                                                                        <input type="text" class="form-control" id="porcentajeh" name="porcentajeh"  />
                                                                    </div>

                                                                    <div class="col-lg-6">
                                                                        <label for="exampleFormControlInput1" class="form-label">N. empleadores total y duración</label>
                                                                        <input type="text" class="form-control" id="numeroempleadoresh" name="numeroempleadoresh"  />
                                                                    </div>

                                                                    <div class="col-lg-6">
                                                                        <label for="exampleFormControlInput1" class="form-label">Progresión salarial</label>
                                                                        <input type="text" class="form-control" id="progresionh" name="progresionh"  />
                                                                    </div>

                                                                    <div class="col-lg-6">
                                                                        <label for="exampleFormControlInput1" class="form-label">Finiquito</label>
                                                                        <input type="text" class="form-control" id="finiquitoh" name="finiquitoh"  />
                                                                    </div>

                                                                    <div class="col-lg-6">
                                                                        <label for="exampleFormControlInput1" class="form-label">Liquidación</label>
                                                                        <input type="text" class="form-control" id="liquidacionh" name="liquidacionh"  />
                                                                    </div>

                                                                    <div class="col-lg-6">
                                                                        <label for="exampleFormControlInput1" class="form-label">Aguinaldo</label>
                                                                        <input type="text" class="form-control" id="aguinaldoh" name="aguinaldoh"  />
                                                                    </div>

                                                                    <div class="col-lg-6">
                                                                        <label for="exampleFormControlInput1" class="form-label">Vacaciones</label>
                                                                        <input type="text" class="form-control" id="vacacionesh" name="vacacionesh"  />
                                                                    </div>

                                                                    <div class="col-lg-12">
                                                                        <label for="exampleFormControlInput1" class="form-label">Comentarios</label>
                                                                        <textarea class="form-control" name="comentariosh" id="comentariosh"></textarea>
                                                                    </div>

                                                                    <div class="col-lg-12"><hr></div>

                                                                    <div class="col-lg-12"><button class="btn btn-outline-primary" id="btnHistorial" style="width: 100%">Registrar</button></div>


                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    {{-- Despidos/salidas pactadas --}}
                                                    <div id="Despidossalidas" style="display: none ;" >
                                                        <div class="card portlet border">
                                                            <div class="card-header portlet-header">
                                                                <h3 class="card-title portlet-title">Despidos/salidas pactadas</h3>
                                                            </div>
                                                            <div class="card-body">
                                                                <div class="row">
                                                                    <input type="hidden" class="form-control" id="idDespidos" name="idDespidos"  />
                                                                    <div class="col-lg-4">
                                                                        <label for="exampleFormControlInput1" class="form-label">Nombre de la empresa</label>
                                                                        <input type="text" class="form-control" id="nombredes" name="nombredes"  />
                                                                    </div>

                                                                    <div class="col-lg-4">
                                                                        <label for="exampleFormControlInput1" class="form-label">Periodo laborado</label>
                                                                        <input type="text" class="form-control" id="periododes" name="periododes"  />
                                                                    </div>

                                                                    <div class="col-lg-4">
                                                                        <label for="exampleFormControlInput1" class="form-label">Motivo</label>
                                                                        <input type="text" class="form-control" id="motivodes" name="motivodes"  />
                                                                    </div>

                                                                    <div class="col-lg-12"><hr></div>

                                                                    <div class="col-lg-12"><button class="btn btn-outline-primary" id="btnDespidos" style="width: 100%">Registrar</button></div>


                                                                </div>
                                                            </div>
                                                        </div>
                                                        <table id="datatable12" class="table table-hover table-bordered table-striped " style="border-collapse: collapse; width: 100%;">
                                                            <thead>
                                                                <tr>
                                                                    <th>Id</th>
                                                                    <th>Nombre de la empresa</th>
                                                                    <th>Periodo laborado</th>
                                                                    <th>Motivo</th>
                                                                    <th>Acción</th>

                                                                </tr>
                                                            </thead>
                                                            <tbody>

                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    {{-- Días incapacidad --}}
                                                    <div id="Diasincapacidad" style="display: none ;" >
                                                        <div class="card portlet border">
                                                            <div class="card-header portlet-header">
                                                                <h3 class="card-title portlet-title">Días incapacidad</h3>
                                                            </div>
                                                            <div class="card-body">
                                                                <div class="row">
                                                                    <input type="hidden" class="form-control" id="idIncapacidades" name="idIncapacidades"  />
                                                                    <div class="col-lg-4">
                                                                        <label for="exampleFormControlInput1" class="form-label">Nombre de la empresa</label>
                                                                        <input type="text" class="form-control" id="nombrein" name="nombrein"  />
                                                                    </div>

                                                                    <div class="col-lg-4">
                                                                        <label for="exampleFormControlInput1" class="form-label">Periodo laborado</label>
                                                                        <input type="text" class="form-control" id="periodoin" name="periodoin"  />
                                                                    </div>

                                                                    <div class="col-lg-4">
                                                                        <label for="exampleFormControlInput1" class="form-label">Motivo</label>
                                                                        <input type="text" class="form-control" id="motivoin" name="motivoin"  />
                                                                    </div>

                                                                    <div class="col-lg-12"><hr></div>

                                                                    <div class="col-lg-12"><button class="btn btn-outline-primary" id="btnIncapacidades" style="width: 100%">Registrar</button></div>


                                                                </div>
                                                            </div>
                                                        </div>
                                                        <table id="datatable10" class="table table-hover table-bordered table-striped " style="border-collapse: collapse; width: 100%;">
                                                            <thead>
                                                                <tr>
                                                                    <th>Id</th>
                                                                    <th>Nombre de la empresa</th>
                                                                    <th>Periodo laborado</th>
                                                                    <th>Motivo</th>
                                                                    <th>Acción</th>

                                                                </tr>
                                                            </thead>
                                                            <tbody>

                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    {{-- Problemas empleador actual --}}
                                                    <div id="Problemasempleadoractual" style="display: none ;" >
                                                        <div class="card portlet border">
                                                            <div class="card-header portlet-header">
                                                                <h3 class="card-title portlet-title">Problemas empleador actual</h3>
                                                            </div>
                                                            <div class="card-body">
                                                                <div class="row">
                                                                    <input type="hidden" class="form-control" id="idProblemas" name="idProblemas"  />
                                                                    <div class="col-lg-6">
                                                                        <label for="exampleFormControlInput1" class="form-label">Nombre de la empresa</label>
                                                                        <input type="text" class="form-control" id="nombrepro" name="nombrepro"  />
                                                                    </div>

                                                                    <div class="col-lg-6">
                                                                        <label for="exampleFormControlInput1" class="form-label">Nombre informante</label>
                                                                        <input type="text" class="form-control" id="informantepro" name="informantepro"  />
                                                                    </div>

                                                                    <div class="col-lg-6">
                                                                        <label for="exampleFormControlInput1" class="form-label">Comentarios:</label>
                                                                        <input type="text" class="form-control" id="comentariospro" name="comentariospro"  />
                                                                    </div>

                                                                    <div class="col-lg-6">
                                                                        <label for="exampleFormControlInput1" class="form-label">Existe problema:</label>
                                                                        <input type="text" class="form-control" id="datopro" name="datopro"  />
                                                                    </div>

                                                                    <div class="col-lg-12"><hr></div>

                                                                    <div class="col-lg-12"><button class="btn btn-outline-primary" id="btnProblemas" style="width: 100%">Registrar</button></div>


                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    {{-- Incidencias Legales --}}
                                                    <div id="IncidenciasLegales" style="display: none ;" >
                                                        <div class="card portlet border">
                                                            <div class="card-header portlet-header">
                                                                <h3 class="card-title portlet-title">Incidencias Legales</h3>
                                                            </div>
                                                            <div class="card-body">
                                                                <div class="row">
                                                                    <input type="hidden" class="form-control" id="idInfoLab" name="idInfoLab"  />
                                                                    <div class="col-lg-12">
                                                                        <label for="exampleFormControlInput1" class="form-label">Demandas Laborales</label>
                                                                    </div>

                                                                    <div class="col-lg-4">
                                                                        <label for="exampleFormControlInput1" class="form-label">Existe</label>
                                                                        <input type="text" class="form-control" id="laborall" name="laborall"  />
                                                                    </div>

                                                                    <div class="col-lg-4">
                                                                        <label for="exampleFormControlInput1" class="form-label">Fecha</label>
                                                                        <input type="text" class="form-control" id="fechal" name="fechal"  />
                                                                    </div>

                                                                    <div class="col-lg-4">
                                                                        <label for="exampleFormControlInput1" class="form-label">Acuerdo</label>
                                                                        <input type="text" class="form-control" id="acuerdol" name="acuerdol"  />
                                                                    </div>

                                                                    <div class="col-lg-12">
                                                                        <label for="exampleFormControlInput1" class="form-label">Comentarios </label>
                                                                        <textarea class="form-control" name="comentariol" id="comentariol"></textarea>
                                                                    </div>


                                                                    <div class="col-lg-12">
                                                                        <label for="exampleFormControlInput1" class="form-label">Demandas Civiles</label>
                                                                    </div>

                                                                    <div class="col-lg-4">
                                                                        <label for="exampleFormControlInput1" class="form-label">Existe</label>
                                                                        <input type="text" class="form-control" id="civiles" name="civiles"  />
                                                                    </div>

                                                                    <div class="col-lg-4">
                                                                        <label for="exampleFormControlInput1" class="form-label">Fecha</label>
                                                                        <input type="text" class="form-control" id="fechac" name="fechac"  />
                                                                    </div>

                                                                    <div class="col-lg-4">
                                                                        <label for="exampleFormControlInput1" class="form-label">Acuerdo</label>
                                                                        <input type="text" class="form-control" id="acuerdoc" name="acuerdoc"  />
                                                                    </div>

                                                                    <div class="col-lg-12">
                                                                        <label for="exampleFormControlInput1" class="form-label">Comentarios </label>
                                                                        <textarea class="form-control"  name="comentarioc" id="comentarioc"></textarea>
                                                                    </div>

                                                                    <div class="col-lg-12">
                                                                        <label for="exampleFormControlInput1" class="form-label">Demandas Familiares</label>
                                                                    </div>

                                                                    <div class="col-lg-4">
                                                                        <label for="exampleFormControlInput1" class="form-label">Existe</label>
                                                                        <input type="text" class="form-control" id="familiares" name="familiares"  />
                                                                    </div>

                                                                    <div class="col-lg-4">
                                                                        <label for="exampleFormControlInput1" class="form-label">Fecha</label>
                                                                        <input type="text" class="form-control" id="fechaf" name="fechaf"  />
                                                                    </div>

                                                                    <div class="col-lg-4">
                                                                        <label for="exampleFormControlInput1" class="form-label">Acuerdo</label>
                                                                        <input type="text" class="form-control" id="acuerdof" name="acuerdof"  />
                                                                    </div>

                                                                    <div class="col-lg-12">
                                                                        <label for="exampleFormControlInput1" class="form-label">Comentarios </label>
                                                                        <textarea class="form-control" name="comentariof" id="comentariof"></textarea>
                                                                    </div>

                                                                    <div class="col-lg-12">
                                                                        <label for="exampleFormControlInput1" class="form-label">Demandas penales</label>
                                                                    </div>

                                                                    <div class="col-lg-4">
                                                                        <label for="exampleFormControlInput1" class="form-label">Existe</label>
                                                                        <input type="text" class="form-control" id="penales" name="penales"  />
                                                                    </div>

                                                                    <div class="col-lg-4">
                                                                        <label for="exampleFormControlInput1" class="form-label">Fecha</label>
                                                                        <input type="text" class="form-control" id="fechap" name="fechap"  />
                                                                    </div>

                                                                    <div class="col-lg-4">
                                                                        <label for="exampleFormControlInput1" class="form-label">Acuerdo</label>
                                                                        <input type="text" class="form-control" id="acuerdop" name="acuerdop"  />
                                                                    </div>

                                                                    <div class="col-lg-12">
                                                                        <label for="exampleFormControlInput1" class="form-label">Comentarios </label>
                                                                        <textarea class="form-control" name="comentariop" id="comentariop"></textarea>
                                                                    </div>

                                                                    <div class="col-lg-12">
                                                                        <label for="exampleFormControlInput1" class="form-label">Demandas Administrativa</label>
                                                                    </div>

                                                                    <div class="col-lg-4">
                                                                        <label for="exampleFormControlInput1" class="form-label">Existe</label>
                                                                        <input type="text" class="form-control" id="administrativa" name="administrativa"  />
                                                                    </div>

                                                                    <div class="col-lg-4">
                                                                        <label for="exampleFormControlInput1" class="form-label">Fecha</label>
                                                                        <input type="text" class="form-control" id="fechaa" name="fechaa"  />
                                                                    </div>

                                                                    <div class="col-lg-4">
                                                                        <label for="exampleFormControlInput1" class="form-label">Acuerdo</label>
                                                                        <input type="text" class="form-control" id="acuerdoa" name="acuerdoa"  />
                                                                    </div>

                                                                    <div class="col-lg-12">
                                                                        <label for="exampleFormControlInput1" class="form-label">Comentarios </label>
                                                                        <textarea class="form-control" name="comentarioa" id="comentarioa"></textarea>
                                                                    </div>

                                                                    <div class="col-lg-12">
                                                                        <label for="exampleFormControlInput1" class="form-label">Demandas Internacional</label>
                                                                    </div>

                                                                    <div class="col-lg-4">
                                                                        <label for="exampleFormControlInput1" class="form-label">Existe</label>
                                                                        <input type="text" class="form-control" id="internacional" name="internacional"  />
                                                                    </div>

                                                                    <div class="col-lg-4">
                                                                        <label for="exampleFormControlInput1" class="form-label">Fecha</label>
                                                                        <input type="text" class="form-control" id="fechai" name="fechai"  />
                                                                    </div>

                                                                    <div class="col-lg-4">
                                                                        <label for="exampleFormControlInput1" class="form-label">Acuerdo</label>
                                                                        <input type="text" class="form-control" id="acuerdoi" name="acuerdoi"  />
                                                                    </div>

                                                                    <div class="col-lg-12">
                                                                        <label for="exampleFormControlInput1" class="form-label">Comentarios </label>
                                                                        <textarea class="form-control" name="comentarioi" id="comentarioi"></textarea>
                                                                    </div>

                                                                    <div class="col-lg-12">
                                                                        <label for="exampleFormControlInput1" class="form-label">Demandas SAT</label>
                                                                    </div>

                                                                    <div class="col-lg-4">
                                                                        <label for="exampleFormControlInput1" class="form-label">Existe</label>
                                                                        <input type="text" class="form-control" id="sat" name="sat"  />
                                                                    </div>

                                                                    <div class="col-lg-4">
                                                                        <label for="exampleFormControlInput1" class="form-label">Fecha</label>
                                                                        <input type="text" class="form-control" id="fechasat" name="fechasat"  />
                                                                    </div>

                                                                    <div class="col-lg-4">
                                                                        <label for="exampleFormControlInput1" class="form-label">Acuerdo</label>
                                                                        <input type="text" class="form-control" id="acuerdosat" name="acuerdosat"  />
                                                                    </div>

                                                                    <div class="col-lg-12">
                                                                        <label for="exampleFormControlInput1" class="form-label">Comentarios </label>
                                                                        <textarea class="form-control" name="comentariosat" id="comentariosat"></textarea>
                                                                    </div>



                                                                    <div class="col-lg-12"><hr></div>

                                                                    <div class="col-lg-12"><button class="btn btn-outline-primary" id="btnInfoLab" style="width: 100%">Registrar</button></div>


                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    {{-- Creditos Activos e historial pago --}}
                                                    <div id="CreditosActivosehistorialpago" style="display: none ;" >
                                                        <div class="card portlet border">
                                                            <div class="card-header portlet-header">
                                                                <h3 class="card-title portlet-title">Creditos Activos e historial pago</h3>
                                                            </div>
                                                            <div class="card-body">
                                                                <div class="row">
                                                                    <input type="hidden" class="form-control" id="idCreditos" name="idCreditos"  />
                                                                    <div class="col-lg-4">
                                                                        <label for="exampleFormControlInput1" class="form-label">Fecha</label>
                                                                        <input type="text" class="form-control" id="fechacc" name="fechacc"  />
                                                                    </div>

                                                                    <div class="col-lg-4">
                                                                        <label for="exampleFormControlInput1" class="form-label">Entidad Financiera</label>
                                                                        <input type="text" class="form-control" id="entidadc" name="entidadc"  />
                                                                    </div>

                                                                    <div class="col-lg-4">
                                                                        <label for="exampleFormControlInput1" class="form-label">Monto a pagar mensualmente</label>
                                                                        <input type="text" class="form-control" id="montoc" name="montoc"  />
                                                                    </div>

                                                                    <div class="col-lg-4">
                                                                        <label for="exampleFormControlInput1" class="form-label">Total de credito</label>
                                                                        <input type="text" class="form-control" id="totalc" name="totalc"  />
                                                                    </div>

                                                                    <div class="col-lg-4">
                                                                        <label for="exampleFormControlInput1" class="form-label">Estatus</label>
                                                                        <input type="text" class="form-control" id="estatusc" name="estatusc"  />
                                                                    </div>

                                                                    <div class="col-lg-4">
                                                                        <label for="exampleFormControlInput1" class="form-label">Nivel de endeudamiento total</label>
                                                                        <input type="text" class="form-control" id="endeudamientoc" name="endeudamientoc"  />
                                                                    </div>

                                                                    <div class="col-lg-4">
                                                                        <label for="exampleFormControlInput1" class="form-label">Nivel endeudamiento hipoteca</label>
                                                                        <input type="text" class="form-control" id="hipotecac" name="hipotecac"  />
                                                                    </div>

                                                                    <div class="col-lg-4">
                                                                        <label for="exampleFormControlInput1" class="form-label">Score</label>
                                                                        <input type="text" class="form-control" id="scorec" name="scorec"  />
                                                                    </div>

                                                                    <div class="col-lg-12">
                                                                        <label for="exampleFormControlInput1" class="form-label">Comentarios</label>
                                                                        <textarea class="form-control" name="comentariocc" id="comentariocc"></textarea>
                                                                    </div>

                                                                    <div class="col-lg-12"><hr></div>

                                                                    <div class="col-lg-12"><button class="btn btn-outline-primary" id="btnCreditos" style="width: 100%">Registrar</button></div>


                                                                </div>
                                                            </div>
                                                        </div>
                                                        <table id="datatable11" class="table table-hover table-bordered table-striped " style="border-collapse: collapse; width: 100%;">
                                                            <thead>
                                                                <tr>
                                                                    <th>Id</th>
                                                                    <th>Fecha</th>
                                                                    <th>Entidad Financiera</th>
                                                                    <th>Monto pagar mensual</th>
                                                                    <th>Total de credito</th>
                                                                    <th>Estatus</th>
                                                                    <th>Comentario</th>
                                                                    <th>Nivel endeudamiento total</th>
                                                                    <th>Nivel endeudamiento sin hipoteca</th>
                                                                    <th>Score</th>
                                                                    <th>Acción</th>

                                                                </tr>
                                                            </thead>
                                                            <tbody>

                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    {{-- Infonavit --}}
                                                    <div id="Infonavit" style="display: none ;" >
                                                        <div class="card portlet border">
                                                            <div class="card-header portlet-header">
                                                                <h3 class="card-title portlet-title">Infonavit</h3>
                                                            </div>
                                                            <div class="card-body">
                                                                <div class="row">
                                                                    <input type="hidden" class="form-control" id="idInfonavit" name="idInfonavit"  />
                                                                    <div class="col-lg-4">
                                                                        <label for="exampleFormControlInput1" class="form-label">Estatus</label>
                                                                        <input type="text" class="form-control" id="estatusvit" name="estatusvit"  />
                                                                    </div>

                                                                    <div class="col-lg-4">
                                                                        <label for="exampleFormControlInput1" class="form-label">Puntos</label>
                                                                        <input type="text" class="form-control" id="puntosvit" name="puntosvit"  />
                                                                    </div>

                                                                    <div class="col-lg-4">
                                                                        <label for="exampleFormControlInput1" class="form-label">Subcuenta vivienda</label>
                                                                        <input type="text" class="form-control" id="subcuentavit" name="subcuentavit"  />
                                                                    </div>

                                                                    <div class="col-lg-4">
                                                                        <label for="exampleFormControlInput1" class="form-label">Prestamo Máximo</label>
                                                                        <input type="text" class="form-control" id="maximovit" name="maximovit"  />
                                                                    </div>

                                                                    <div class="col-lg-4">
                                                                        <label for="exampleFormControlInput1" class="form-label">Descuento hipoteca:</label>
                                                                        <input type="text" class="form-control" id="hipotecavit" name="hipotecavit"  />
                                                                    </div>

                                                                    <div class="col-lg-12"><hr></div>

                                                                    <div class="col-lg-12"><button class="btn btn-outline-primary" id="btnInfonavit" style="width: 100%">Registrar</button></div>


                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    {{-- Servicio médico --}}
                                                    <div id="Serviciomedico" style="display: none ;" >
                                                        <div class="card portlet border">
                                                            <div class="card-header portlet-header">
                                                                <h3 class="card-title portlet-title">Servicio médico</h3>
                                                            </div>
                                                            <div class="card-body">
                                                                <div class="row">
                                                                    <input type="hidden" class="form-control" id="idMedico" name="idMedico"  />
                                                                    <div class="col-lg-12">
                                                                        <label for="exampleFormControlInput1" class="form-label">IMSS</label>
                                                                    </div>

                                                                    <div class="col-lg-4">
                                                                        <label for="exampleFormControlInput1" class="form-label">No. clinica</label>
                                                                        <input type="text" class="form-control" id="clinicaim" name="clinicaim"  />
                                                                    </div>

                                                                    <div class="col-lg-4">
                                                                        <label for="exampleFormControlInput1" class="form-label">No. Incidente</label>
                                                                        <input type="text" class="form-control" id="incidenteim" name="incidenteim"  />
                                                                    </div>

                                                                    <div class="col-lg-4">
                                                                        <label for="exampleFormControlInput1" class="form-label">Tipo de Enfermedad</label>
                                                                        <input type="text" class="form-control" id="tipoim" name="tipoim"  />
                                                                    </div>

                                                                    <div class="col-lg-12">
                                                                        <label for="exampleFormControlInput1" class="form-label">ISSSTE</label>
                                                                    </div>

                                                                    <div class="col-lg-4">
                                                                        <label for="exampleFormControlInput1" class="form-label">No. clinica</label>
                                                                        <input type="text" class="form-control" id="clinicais" name="clinicais"  />
                                                                    </div>

                                                                    <div class="col-lg-4">
                                                                        <label for="exampleFormControlInput1" class="form-label">No. Incidente</label>
                                                                        <input type="text" class="form-control" id="incidenteis" name="incidenteis"  />
                                                                    </div>

                                                                    <div class="col-lg-4">
                                                                        <label for="exampleFormControlInput1" class="form-label">Tipo de Enfermedad</label>
                                                                        <input type="text" class="form-control" id="tipois" name="tipois"  />
                                                                    </div>

                                                                    <div class="col-lg-12">
                                                                        <label for="exampleFormControlInput1" class="form-label">SEGURO POPULAR</label>
                                                                    </div>

                                                                    <div class="col-lg-4">
                                                                        <label for="exampleFormControlInput1" class="form-label">No. clinica</label>
                                                                        <input type="text" class="form-control" id="clinicase" name="clinicase"  />
                                                                    </div>

                                                                    <div class="col-lg-4">
                                                                        <label for="exampleFormControlInput1" class="form-label">No. Incidente</label>
                                                                        <input type="text" class="form-control" id="incidentese" name="incidentese"  />
                                                                    </div>

                                                                    <div class="col-lg-4">
                                                                        <label for="exampleFormControlInput1" class="form-label">Tipo de Enfermedad</label>
                                                                        <input type="text" class="form-control" id="tipose" name="tipose"  />
                                                                    </div>

                                                                    <div class="col-lg-12">
                                                                        <label for="exampleFormControlInput1" class="form-label">PRIVADO</label>
                                                                    </div>

                                                                    <div class="col-lg-4">
                                                                        <label for="exampleFormControlInput1" class="form-label">Aseguradora</label>
                                                                        <input type="text" class="form-control" id="aseguradora" name="aseguradora"  />
                                                                    </div>

                                                                    <div class="col-lg-4">
                                                                        <label for="exampleFormControlInput1" class="form-label">No. Incidente</label>
                                                                        <input type="text" class="form-control" id="incidentepri" name="incidentepri"  />
                                                                    </div>

                                                                    <div class="col-lg-4">
                                                                        <label for="exampleFormControlInput1" class="form-label">Tipo de Enfermedad</label>
                                                                        <input type="text" class="form-control" id="tipopri" name="tipopri"  />
                                                                    </div>

                                                                    <div class="col-lg-12">
                                                                        <label for="exampleFormControlInput1" class="form-label">ISSEMYM</label>
                                                                    </div>

                                                                    <div class="col-lg-4">
                                                                        <label for="exampleFormControlInput1" class="form-label">No. clinica</label>
                                                                        <input type="text" class="form-control" id="clinicaisse" name="clinicaisse"  />
                                                                    </div>

                                                                    <div class="col-lg-4">
                                                                        <label for="exampleFormControlInput1" class="form-label">No. Incidente</label>
                                                                        <input type="text" class="form-control" id="incidenteisse" name="incidenteisse"  />
                                                                    </div>

                                                                    <div class="col-lg-4">
                                                                        <label for="exampleFormControlInput1" class="form-label">Tipo de Enfermedad</label>
                                                                        <input type="text" class="form-control" id="tipoisse" name="tipoisse"  />
                                                                    </div>


                                                                    <div class="col-lg-12"><hr></div>

                                                                    <div class="col-lg-12"><button class="btn btn-outline-primary" id="btnMedico" style="width: 100%">Registrar</button></div>


                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    {{-- Documentos Presentados --}}
                                                    <div id="documentospresentados" style="display: none ;" >
                                                        <div class="card portlet border">
                                                            <div class="card-header portlet-header">
                                                                <h3 class="card-title portlet-title">Documentos presentados</h3>
                                                            </div>
                                                            <div class="card-body">
                                                                <div class="row">
                                                                    <input type="hidden" class="form-control" id="idPresentado" name="idPresentado"  />

                                                                    <div class="col-lg-4">
                                                                        <label for="exampleFormControlInput1" class="form-label">Documento</label>
                                                                         <select class="form-control"  id="documentodp" name="documentodp">
                                                                            @foreach (config('catalogos.catDocPre') as $key => $value)
                                                                                <option value="{{ $key }}"> {{ $value }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>

                                                                    <div class="col-lg-4">
                                                                        <label for="exampleFormControlInput1" class="form-label">INE por ambos lados</label>
                                                                         <select class="form-control"  id="inedp" name="inedp">
                                                                            @foreach (config('catalogos.catDocPre') as $key => $value)
                                                                                <option value="{{ $key }}"> {{ $value }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>

                                                                    <div class="col-lg-4">
                                                                        <label for="exampleFormControlInput1" class="form-label">Comprobante de Domicilio</label>
                                                                        <select class="form-control"  id="comprobantedp" name="comprobantedp">
                                                                            @foreach (config('catalogos.catDocPre') as $key => $value)
                                                                                <option value="{{ $key }}"> {{ $value }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>


                                                                    <div class="col-lg-4">
                                                                        <label for="exampleFormControlInput1" class="form-label">Acta de Nacimiento</label>
                                                                         <select class="form-control"  id="actadp" name="actadp">
                                                                            @foreach (config('catalogos.catDocPre') as $key => $value)
                                                                                <option value="{{ $key }}"> {{ $value }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>

                                                                    <div class="col-lg-4">
                                                                        <label for="exampleFormControlInput1" class="form-label">Cartas Laborales</label>
                                                                         <select class="form-control"  id="cartasdp" name="cartasdp">
                                                                            @foreach (config('catalogos.catDocPre') as $key => $value)
                                                                                <option value="{{ $key }}"> {{ $value }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>

                                                                    <div class="col-lg-4">
                                                                        <label for="exampleFormControlInput1" class="form-label">Aviso de Retención o Liberación INFONAVIT</label>
                                                                         <select class="form-control"  id="avisodp" name="avisodp">
                                                                            @foreach (config('catalogos.catDocPre') as $key => $value)
                                                                                <option value="{{ $key }}"> {{ $value }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>

                                                                    <div class="col-lg-12">
                                                                        <label for="exampleFormControlInput1" class="form-label">Comentarios</label>
                                                                        <input type="text" class="form-control" id="comentariosdp" name="comentariosdp"  />
                                                                    </div>

                                                                    <div class="col-lg-12"><hr></div>

                                                                    <div class="col-lg-12"><button class="btn btn-outline-primary" id="btnPresentados" style="width: 100%">Registrar</button></div>


                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    {{-- +++++++++++++++++++++++++++++++++++++++++++++++++++++ --}}
                                                    {{-- Estudios ccep --}}
                                                    <div id="estudiosccep" style="display: none ;" >
                                                        <div class="card portlet border">
                                                            <div class="card-header portlet-header">
                                                                <h3 class="card-title portlet-title">Estudios</h3>
                                                            </div>
                                                            <div class="card-body">
                                                                <div class="row">
                                                                    <input type="hidden" class="form-control" id="idGrado" name="idGrado"  />
                                                                    <div class="col-lg-4">
                                                                        <label for="exampleFormControlInput1" class="form-label">Grado</label>
                                                                        <input type="text" class="form-control" id="gradog" name="gradog"  />
                                                                    </div>

                                                                    <div class="col-lg-4">
                                                                        <label for="exampleFormControlInput1" class="form-label">Nombre</label>
                                                                        <input type="text" class="form-control" id="nombreg" name="nombreg"  />
                                                                    </div>

                                                                    <div class="col-lg-4">
                                                                        <label for="exampleFormControlInput1" class="form-label">Lugar</label>
                                                                        <input type="text" class="form-control" id="lugarg" name="lugarg"  />
                                                                    </div>

                                                                    <div class="col-lg-4">
                                                                        <label for="exampleFormControlInput1" class="form-label">Periodo</label>
                                                                        <input type="text" class="form-control" id="periodog" name="periodog"  />
                                                                    </div>

                                                                    <div class="col-lg-4">
                                                                        <label for="exampleFormControlInput1" class="form-label">Documento</label>
                                                                        <input type="text" class="form-control" id="documentog" name="documentog"  />
                                                                    </div>

                                                                    <div class="col-lg-4">
                                                                        <label for="exampleFormControlInput1" class="form-label">Folio</label>
                                                                        <input type="text" class="form-control" id="foliog" name="foliog"  />
                                                                    </div>


                                                                    <div class="col-lg-12"><hr></div>

                                                                    <div class="col-lg-12"><button class="btn btn-outline-primary" id="btnGrado" style="width: 100%">Registrar</button></div>


                                                                </div>
                                                            </div>
                                                        </div>
                                                        <table id="datatable14" class="table table-hover table-bordered table-striped " style="border-collapse: collapse; width: 100%;">
                                                            <thead>
                                                                <tr>
                                                                    <th>Id</th>
                                                                    <th>Grado</th>
                                                                    <th>Nombre</th>
                                                                    <th>Lugar</th>
                                                                    <th>Periodo</th>
                                                                    <th>Documento</th>
                                                                    <th>Folio</th>
                                                                    <th>Acción</th>

                                                                </tr>
                                                            </thead>
                                                            <tbody>

                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    {{-- Investigaciones ccep --}}
                                                    <div id="investigacionesccep" style="display: none ;" >
                                                        <div class="card portlet border">
                                                            <div class="card-header portlet-header">
                                                                <h3 class="card-title portlet-title">Investigaciones</h3>
                                                            </div>
                                                            <div class="card-body">
                                                                <div class="row">
                                                                    <input type="hidden" class="form-control" id="idInvestigacion" name="idInvestigacion"  />

                                                                    <div class="col-lg-6">
                                                                        <label for="exampleFormControlInput1" class="form-label">¿El candidato cuenta con constancias laborales?</label>
                                                                         <select class="form-control"  id="cuentaConstanciai" name="cuentaConstanciai">
                                                                            @foreach (config('catalogos.catDocPre') as $key => $value)
                                                                                <option value="{{ $key }}"> {{ $value }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>

                                                                    <div class="col-lg-6">
                                                                        <label for="exampleFormControlInput1" class="form-label">¿Proporcionó los datos de contacto de sus empleos?</label>
                                                                         <select class="form-control"  id="proporcionoi" name="proporcionoi">
                                                                            @foreach (config('catalogos.catDocPre') as $key => $value)
                                                                                <option value="{{ $key }}"> {{ $value }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>

                                                                    <div class="col-lg-6">
                                                                        <label for="exampleFormControlInput1" class="form-label">En caso de que no, ¿cuál fue el motivo por que no los proporcionó?</label>
                                                                         <select class="form-control"  id="casoNoi" name="casoNoi">
                                                                            @foreach (config('catalogos.catDocPre') as $key => $value)
                                                                                <option value="{{ $key }}"> {{ $value }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>

                                                                    <div class="col-lg-6">
                                                                        <label for="exampleFormControlInput1" class="form-label">¿Ha demandado alguna empresa?</label>
                                                                         <select class="form-control"  id="demandadoi" name="demandadoi">
                                                                            @foreach (config('catalogos.catDocPre') as $key => $value)
                                                                                <option value="{{ $key }}"> {{ $value }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>

                                                                    <div class="col-lg-6">
                                                                        <label for="exampleFormControlInput1" class="form-label">¿Actualmente está laborando?</label>
                                                                         <select class="form-control"  id="actualmentei" name="actualmentei">
                                                                            @foreach (config('catalogos.catDocPre') as $key => $value)
                                                                                <option value="{{ $key }}"> {{ $value }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>

                                                                    <div class="col-lg-6">
                                                                        <label for="exampleFormControlInput1" class="form-label">¿El candidato cuenta con estabilidad laboral?</label>
                                                                         <select class="form-control"  id="estabilidadi" name="estabilidadi">
                                                                            @foreach (config('catalogos.catDocPre') as $key => $value)
                                                                                <option value="{{ $key }}"> {{ $value }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>

                                                                    <div class="col-lg-6">
                                                                        <label for="exampleFormControlInput1" class="form-label">¿Cuenta con periodos de inactividad laboral?</label>
                                                                         <select class="form-control"  id="inactividadi" name="inactividadi">
                                                                            @foreach (config('catalogos.catDocPre') as $key => $value)
                                                                                <option value="{{ $key }}"> {{ $value }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>

                                                                    <div class="col-lg-6">
                                                                        <label for="exampleFormControlInput1" class="form-label">¿La información compartida coincide con registros patronales?
                                                                        </label>
                                                                         <select class="form-control"  id="registoPatronali" name="registoPatronali">
                                                                            @foreach (config('catalogos.catDocPre') as $key => $value)
                                                                                <option value="{{ $key }}"> {{ $value }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>

                                                                    <div class="col-lg-6">
                                                                        <label for="exampleFormControlInput1" class="form-label">¿Se cumplio con la validación requerida de referencias y periodos laborales?</label>
                                                                         <select class="form-control"  id="referenciayPeriodosi" name="referenciayPeriodosi">
                                                                            @foreach (config('catalogos.catDocPre') as $key => $value)
                                                                                <option value="{{ $key }}"> {{ $value }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>

                                                                    <div class="col-lg-6">
                                                                        <label for="exampleFormControlInput1" class="form-label">¿Tiene más de 2 empleos en 1 año?</label>
                                                                         <select class="form-control"  id="dosEmpleosi" name="dosEmpleosi">
                                                                            @foreach (config('catalogos.catDocPre') as $key => $value)
                                                                                <option value="{{ $key }}"> {{ $value }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>

                                                                    <div class="col-lg-6">
                                                                        <label for="exampleFormControlInput1" class="form-label">¿Presento ausentismo en los últimos 6 meses de actividad?
                                                                        </label>
                                                                         <select class="form-control"  id="ausentismoi" name="ausentismoi">
                                                                            @foreach (config('catalogos.catDocPre') as $key => $value)
                                                                                <option value="{{ $key }}"> {{ $value }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>

                                                                    <div class="col-lg-6">
                                                                        <label for="exampleFormControlInput1" class="form-label">¿Abandono de empleo?</label>
                                                                         <select class="form-control"  id="abandonoi" name="abandonoi">
                                                                            @foreach (config('catalogos.catDocPre') as $key => $value)
                                                                                <option value="{{ $key }}"> {{ $value }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>

                                                                    <div class="col-lg-6">
                                                                        <label for="exampleFormControlInput1" class="form-label">¿Tuvo un desempeño regular?</label>
                                                                         <select class="form-control"  id="desempenoRegulari" name="desempenoRegulari">
                                                                            @foreach (config('catalogos.catDocPre') as $key => $value)
                                                                                <option value="{{ $key }}"> {{ $value }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>

                                                                    <div class="col-lg-6">
                                                                        <label for="exampleFormControlInput1" class="form-label">¿El candidato omitió algún empleo?</label>
                                                                         <select class="form-control"  id="omitioi" name="omitioi">
                                                                            @foreach (config('catalogos.catDocPre') as $key => $value)
                                                                                <option value="{{ $key }}"> {{ $value }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>

                                                                    <div class="col-lg-6">
                                                                        <label for="exampleFormControlInput1" class="form-label">Información proporcionada por el candidato
                                                                        </label>
                                                                         <select class="form-control"  id="informacioni" name="informacioni">
                                                                            @foreach (config('catalogos.catInves') as $key => $value)
                                                                                <option value="{{ $key }}"> {{ $value }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>

                                                                    <div class="col-lg-6">
                                                                        <label for="exampleFormControlInput1" class="form-label">Referencias laborales obtenidas</label>
                                                                         <select class="form-control"  id="referenciasi" name="referenciasi">
                                                                            @foreach (config('catalogos.catInves') as $key => $value)
                                                                                <option value="{{ $key }}"> {{ $value }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>

                                                                    <div class="col-lg-6">
                                                                        <label for="exampleFormControlInput1" class="form-label">Información confiable y verificable</label>
                                                                         <select class="form-control"  id="confiablei" name="confiablei">
                                                                            @foreach (config('catalogos.catInves') as $key => $value)
                                                                                <option value="{{ $key }}"> {{ $value }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>

                                                                    <div class="col-lg-12">
                                                                        <label for="exampleFormControlInput1" class="form-label">COMENTARIOS GENERALES DE LA INVESTIGACIÓN LABORAL</label>
                                                                        <textarea class="form-control" name="comentariosi" id="comentariosi"></textarea>
                                                                    </div>
                                                                    <div class="col-lg-12">
                                                                        <label for="exampleFormControlInput1" class="form-label">Notas legales</label>
                                                                        <textarea class="form-control" name="notasLegalesi" id="notasLegalesi"></textarea>
                                                                    </div>

                                                                    <div class="col-lg-12"><hr></div>

                                                                    <div class="col-lg-12"><button class="btn btn-outline-primary" id="btnInvestigacion" style="width: 100%">Registrar</button></div>


                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    {{-- Entrono ccep --}}
                                                    <div id="entornoccep" style="display: none ;" >
                                                        <div class="card portlet border">
                                                            <div class="card-header portlet-header">
                                                                <h3 class="card-title portlet-title">Entorno</h3>
                                                            </div>
                                                            <div class="card-body">
                                                                <div class="row">
                                                                    <input type="hidden" class="form-control" id="idEntornoccep" name="idEntornoccep"  />

                                                                    <div class="col-lg-12">
                                                                        <label for="exampleFormControlInput1" class="form-label">Comentarios</label>
                                                                        <textarea class="form-control" name="comentariosenn" id="comentariosenn"></textarea>
                                                                    </div>
                                                                    <div class="col-lg-4">
                                                                        <label for="exampleFormControlInput1" class="form-label">Tiempo de vivir en el domicilio</label>
                                                                        <input type="text" class="form-control" id="tiempoVivirenn" name="tiempoVivirenn"  />
                                                                    </div>
                                                                    <div class="col-lg-4">
                                                                        <label for="exampleFormControlInput1" class="form-label">Calle</label>
                                                                        <input type="text" class="form-control" id="calleenn" name="calleenn"  />
                                                                    </div>
                                                                    <div class="col-lg-4">
                                                                        <label for="exampleFormControlInput1" class="form-label">No.</label>
                                                                        <input type="text" class="form-control" id="numeroenn" name="numeroenn"  />
                                                                    </div>
                                                                    <div class="col-lg-4">
                                                                        <label for="exampleFormControlInput1" class="form-label">No. Int</label>
                                                                        <input type="text" class="form-control" id="interiorenn" name="interiorenn"  />
                                                                    </div>
                                                                    <div class="col-lg-4">
                                                                        <label for="exampleFormControlInput1" class="form-label">C.P</label>
                                                                        <input type="text" class="form-control" id="cpenn" name="cpenn"  />
                                                                    </div>
                                                                    <div class="col-lg-4">
                                                                        <label for="exampleFormControlInput1" class="form-label">Colonia</label>
                                                                        <input type="text" class="form-control" id="coloniaenn" name="coloniaenn"  />
                                                                    </div>
                                                                    <div class="col-lg-4">
                                                                        <label for="exampleFormControlInput1" class="form-label">Entre</label>
                                                                        <input type="text" class="form-control" id="entreenn" name="entreenn"  />
                                                                    </div>
                                                                    <div class="col-lg-4">
                                                                        <label for="exampleFormControlInput1" class="form-label">Delegación o municipio</label>
                                                                        <input type="text" class="form-control" id="delegacionMunicpioenn" name="delegacionMunicpioenn"  />
                                                                    </div>
                                                                    <div class="col-lg-4">
                                                                        <label for="exampleFormControlInput1" class="form-label">Estado</label>
                                                                        <select class="form-control"  id="estadoenn" name="estadoenn">
                                                                            @foreach (config('catalogos.catestadosMexico') as $key => $value)
                                                                                <option value="{{ $key }}"> {{ $value }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                    <div class="col-lg-4">
                                                                        <label for="exampleFormControlInput1" class="form-label">Color y descripción de la fachada</label>
                                                                        <input type="text" class="form-control" id="colorenn" name="colorenn"  />
                                                                    </div>
                                                                    <div class="col-lg-4">
                                                                        <label for="exampleFormControlInput1" class="form-label">Tipo de vivienda</label>
                                                                        <select class="form-control"  id="tipoenn" name="tipoenn">
                                                                            @foreach (config('catalogos.cattiposVivienda') as $key => $value)
                                                                                <option value="{{ $key }}"> {{ $value }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                    <div class="col-lg-4">
                                                                        <label for="exampleFormControlInput1" class="form-label">El domicilio donde vive es</label>
                                                                        <input type="text" class="form-control" id="dondeEsenn" name="dondeEsenn"  />
                                                                    </div>
                                                                    <div class="col-lg-4">
                                                                        <label for="exampleFormControlInput1" class="form-label">Ubicación geográfica</label>
                                                                        <input type="text" class="form-control" id="ubicacionenn" name="ubicacionenn"  />
                                                                    </div>

                                                                    <div class="col-lg-12"><hr></div>

                                                                    <div class="col-lg-12"><button class="btn btn-outline-primary" id="btnEntrono" style="width: 100%">Registrar</button></div>


                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    {{-- concluciuones ccep --}}
                                                    <div id="conclucionesccep" style="display: none ;" >
                                                        <div class="card portlet border">
                                                            <div class="card-header portlet-header">
                                                                <h3 class="card-title portlet-title">Concluciones</h3>
                                                            </div>
                                                            <div class="card-body">
                                                                <div class="row">
                                                                    <input type="hidden" class="form-control" id="idConclucionesccep" name="idConclucionesccep"  />
                                                                    <div class="col-lg-6">
                                                                        <label for="exampleFormControlInput1" class="form-label">Acerca del candidato</label>
                                                                        <input type="text" class="form-control" id="acercaCandidatocon" name="acercaCandidatocon"  />
                                                                    </div>

                                                                    <div class="col-lg-6">
                                                                        <label for="exampleFormControlInput1" class="form-label">Acerca de su familia y entrono</label>
                                                                        <input type="text" class="form-control" id="acercaFamiliacon" name="acercaFamiliacon"  />
                                                                    </div>

                                                                    <div class="col-lg-6">
                                                                        <label for="exampleFormControlInput1" class="form-label">Conclusiones del entrevistador</label>
                                                                        <input type="text" class="form-control" id="conclucionesEntrevistadorcon" name="conclucionesEntrevistadorcon"  />
                                                                    </div>

                                                                    <div class="col-lg-6">
                                                                        <label for="exampleFormControlInput1" class="form-label">Estatus final</label>
                                                                        <select class="form-control"  id="estatusfinalcon" name="estatusfinalcon">
                                                                            @foreach (config('catalogos.catFinalCon') as $key => $value)
                                                                                <option value="{{ $key }}"> {{ $value }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>

                                                                    <div class="col-lg-6">
                                                                        <label for="exampleFormControlInput1" class="form-label">Participación del candidato
                                                                        </label>
                                                                        <select class="form-control"  id="participacioncon" name="participacioncon">
                                                                            @foreach (config('catalogos.catFinalCon') as $key => $value)
                                                                                <option value="{{ $key }}"> {{ $value }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>

                                                                    <div class="col-lg-6">
                                                                        <label for="exampleFormControlInput1" class="form-label">Entorno familiar
                                                                        </label>
                                                                        <select class="form-control"  id="entornocon" name="entornocon">
                                                                            @foreach (config('catalogos.catFinalCon') as $key => $value)
                                                                                <option value="{{ $key }}"> {{ $value }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>

                                                                    <div class="col-lg-6">
                                                                        <label for="exampleFormControlInput1" class="form-label">Referencias personales
                                                                        </label>
                                                                        <select class="form-control"  id="referenciascon" name="referenciascon">
                                                                            @foreach (config('catalogos.catFinalCon') as $key => $value)
                                                                                <option value="{{ $key }}"> {{ $value }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>

                                                                    <div class="col-lg-12">
                                                                        <label for="exampleFormControlInput1" class="form-label">COMENTARIOS GENERALES DE LA VERIFICACIÓN</label>
                                                                        <textarea class="form-control" name="comentariosGeneralescon" id="comentariosGeneralescon"></textarea>
                                                                    </div>

                                                                    <div class="col-lg-12">
                                                                        <label for="exampleFormControlInput1" class="form-label">ANÁLISIS DE LA VERIFICACIÓN</label>
                                                                        <textarea class="form-control" name="analisisVerificacioncon" id="analisisVerificacioncon"></textarea>
                                                                    </div>

                                                                    <div class="col-lg-6">
                                                                        <label for="exampleFormControlInput1" class="form-label">¿Atendió puntual y en fecha y hora acordada?</label>
                                                                        <input type="text" class="form-control" id="atendiocon" name="atendiocon"  />
                                                                    </div>
                                                                    <div class="col-lg-6">
                                                                        <label for="exampleFormControlInput1" class="form-label">¿Presentó la documentación solicitada para corroborar su arraigo domiciliario?</label>
                                                                        <input type="text" class="form-control" id="presentocon" name="presentocon"  />
                                                                    </div>
                                                                    <div class="col-lg-6">
                                                                        <label for="exampleFormControlInput1" class="form-label">¿La documentación compartida por el candidato coincide en su totalidad?</label>
                                                                        <input type="text" class="form-control" id="documentacionCompartidacon" name="documentacionCompartidacon"  />
                                                                    </div>
                                                                    <div class="col-lg-6">
                                                                        <label for="exampleFormControlInput1" class="form-label">¿Las referencias personales del candidato respondieron en su totalidad?</label>
                                                                        <input type="text" class="form-control" id="referenciasPersonalescon" name="referenciasPersonalescon"  />
                                                                    </div>

                                                                    <div class="col-lg-12"><hr></div>

                                                                    <div class="col-lg-12"><button class="btn btn-outline-primary" id="btnConclucionesccerp" style="width: 100%">Registrar</button></div>


                                                                </div>
                                                            </div>
                                                        </div>
                                                        <table id="datatable16" class="table table-hover table-bordered table-striped " style="border-collapse: collapse; width: 100%;">
                                                            <thead>
                                                                <tr>
                                                                    <th>Id</th>
                                                                    <th>Acerca del candidato</th>
                                                                    <th>Acerca de su familia y entrono</th>
                                                                    <th>Conclusiones del entrevistador</th>
                                                                    <th>Estatus final</th>
                                                                    <th>Acción</th>

                                                                </tr>
                                                            </thead>
                                                            <tbody>

                                                            </tbody>
                                                        </table>
                                                    </div>

                                            </div>
                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>

                    </div>

                </div>

            </div>

        </div>

        @include('include.pie')

    </div>
</div>
{{-- ///////////////////////////////////////////////////// --}}
{{-- seccion de modals --}}

    {{-- modal para cambiar cancelar por el cliente --}}
    <div class="modal fade" id="modalCancelar" tabindex="-1" role="dialog" aria-labelledby="modal1Label" aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal1Label">Cancelacion de estudio</h5>
                    <button type="button" class="btn btn-sm btn-label-danger btn-icon" data-bs-dismiss="modal" aria-label="Close"> <i class="mdi mdi-close"></i></button>
                </div>
                <form id="">
                    @csrf
                    <input type="hidden" id="idEstudioCancelar">
                    <div class="modal-body">
                        <div class="alert alert-label-danger text-center"><b>Esta seguro de cancelar el estudio</b></div>
                        <label for="exampleFormControlInput1" class="form-label">Motivo de cancelación</label>
                        <textarea id="motivoCancelacion" class="form-control" rows="3"></textarea>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-success" id="btnCanclear">Registrar</button>
                        <button class="btn btn-outline-danger">Cerrar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- modal para terminar elp estudio --}}
    <div class="modal fade" id="modalterminar" tabindex="-1" role="dialog" aria-labelledby="modal1Label" aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal1Label">Terminar estudio</h5>
                    <button type="button" class="btn btn-sm btn-label-danger btn-icon" data-bs-dismiss="modal" aria-label="Close"> <i class="mdi mdi-close"></i></button>
                </div>
                <form id="">
                    @csrf
                    <input type="hidden" id="idEstudioTerminar">
                    <div class="modal-body">
                        <div class="alert alert-label-success text-center"><b>Esta seguro de terminar el estudio, hecho eso no se podra modificar nada de información.</b></div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-success" id="btnTerminar">Registrar</button>
                        <button class="btn btn-outline-danger">Cerrar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

{{-- ///////////////////////////////////////////////////// --}}

@include('include.footer')
<script type="text/javascript">

    /* /////////////////////////////////////////////////////////// */
    /* SECCION DE DATATABLES */
    /* /////////////////////////////////////////////////////////// */
    /* carga de datatable */
    $(function () {
        var table = $('#datatable17').DataTable({
            processing: true,
            responsive: true,
            language: {
                url: 'https://cdn.datatables.net/plug-ins/1.10.21/i18n/Spanish.json'
            },
            columnDefs: [
                { targets: '_all', className: 'dt-responsive nowrap' } // Fuerza las columnas a ser responsivas
            ],
            autoWidth: false, // Desactiva el ajuste automático del ancho
            scrollX: true, // Habilita el desplazamiento horizontal
            scroller: true, // Habilita el desplazamiento de filas
            paging: true, // Habilita la paginación si es necesario
            fixedHeader: true // Fija el encabezado para hacer scroll en la tabla
        });
    });


    /* /////////////////////////////////////////////////////////// */

    /* /////////////////////////////////////////////////////////// */
    /* CATALOGOS */
    /* /////////////////////////////////////////////////////////// */

    /* empresas */
    cataempresas()
    function cataempresas(){
        var url = `/empresas/relacion/`;
        $.ajax({
            url: url,
            method: 'GET',
            success: function(response) {

               let datos = response.data
               const select = document.createElement('select');
                select.id = "idEmpresa";
                select.classList.add('form-control');

                // Agregar una opción por defecto
                const defaultOption = document.createElement('option');
                defaultOption.text = "Seleccione una opción";
                defaultOption.value = "";
                select.appendChild(defaultOption);

                // Llenar el <select> con las opciones del JSON
                datos.forEach(item => {
                    const option = document.createElement('option');
                    option.value = item.nombre; // Usar el ID como valor
                    option.text = item.nombre; // Usar el nombre como texto visible
                    select.appendChild(option);
                });

                // Agregar el <select> al contenedor en el DOM
                document.getElementById('select-container').appendChild(select);
            },
            error: function(response) { alert('Error al editar la empresa.'); }
        });
    }
    /* empresas */
    catEjecutivos()
    function catEjecutivos(){
        var url = `/usuarios/relacionEje/`;
        $.ajax({
            url: url,
            method: 'GET',
            success: function(response) {
               let datos = response.data
               const select = document.createElement('select');
                select.id = "realizo";
                select.classList.add('form-control');

                // Agregar una opción por defecto
                const defaultOption = document.createElement('option');
                defaultOption.text = "Seleccione una opción";
                defaultOption.value = "";
                select.appendChild(defaultOption);

                // Llenar el <select> con las opciones del JSON
                datos.forEach(item => {
                    const option = document.createElement('option');
                    option.value = item.email; // Usar el ID como valor
                    option.text = item.name; // Usar el nombre como texto visible
                    select.appendChild(option);
                });

                // Agregar el <select> al contenedor en el DOM
                document.getElementById('select-containera').appendChild(select);
            },
            error: function(response) { alert('Error al editar la empresa.'); }
        });
    }
    /* empresas */
    catEncuestadores()
    function catEncuestadores(){
        var url = `/usuarios/relacionEcu/`;
        $.ajax({
            url: url,
            method: 'GET',
            success: function(response) {

               let datos = response.data
               const select = document.createElement('select');
                select.id = "encuestador";
                select.classList.add('form-control');

                // Agregar una opción por defecto
                const defaultOption = document.createElement('option');
                defaultOption.text = "Seleccione una opción";
                defaultOption.value = "";
                select.appendChild(defaultOption);

                // Llenar el <select> con las opciones del JSON
                datos.forEach(item => {
                    const option = document.createElement('option');
                    option.value = item.email; // Usar el ID como valor
                    option.text = item.name; // Usar el nombre como texto visible
                    select.appendChild(option);
                });

                // Agregar el <select> al contenedor en el DOM
                document.getElementById('select-containere').appendChild(select);
            },
            error: function(response) { alert('Error al editar la empresa.'); }
        });
    }
    /* /////////////////////////////////////////////////////////// */

    /* /////////////////////////////////////////////////////////// */
    /* CARGAS DE INFORMACION */
    /* /////////////////////////////////////////////////////////// */
    /* carga de domicilio */
    cargaDomilio()
    function cargaDomilio(){
        const div = document.getElementById('alerta');
        div.style.display = 'none';

        let idUsu = document.getElementById("idEstudioEdi").value;

        $.ajax({
        url: `/domicilio/muestro/${idUsu}`,
        method: 'POST',
        /*  processData: false, // Necesario para evitar que jQuery procese los datos
        contentType: false, */
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')  },
        success: function(response) {
            console.log(response.data)
            if (response.data && response.data.length > 0) {
                $('#idDomiciliot').val(response.data[0].id);
                $('#calle').val(response.data[0].calle);
                $('#numero').val(response.data[0].numero);
                $('#colonia').val(response.data[0].colonia);
                $('#delegacionMunicipio').val(response.data[0].delegacionMunicipio);
                $('#ciudad').val(response.data[0].ciudad);
                $('#estado').val(response.data[0].estado);
                $('#cp').val(response.data[0].cp);
                $('#tiempoResindir').val(response.data[0].tiempoResindir);
                $('#tel1').val(response.data[0].tel1);
                $('#tel2').val(response.data[0].tel2);
                $('#cel1').val(response.data[0].cel1);
                $('#cel2').val(response.data[0].cel2);
                }

        },
        error: function(response) { alert('Error al crear la empresa.'); }
        });
    }
    /* funcion para mostrar las listas de documentos */
    function cargarDocumentos(){
        const div = document.getElementById('alerta');
        div.style.display = 'none';

        let idUsu = document.getElementById("idEstudioEdi").value;
        let jsonData = []
        $.ajax({
        url: `/documentos/muestro/${idUsu}`,
        method: 'POST',
        /*  processData: false, // Necesario para evitar que jQuery procese los datos
        contentType: false, */
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')  },
        success: function(response) {

            const tabla = $('#datatable1').DataTable();
            tabla.destroy();
            $('#datatable1 tbody').empty();
            jsonData = Array.isArray(response) ? response : response.data;

            jsonData.forEach(row => {
                tabla.row.add([
                    row.id,
                    row.titulo,
                    row.folio,
                    row.observaciones,
                    `<a href="${row.archivo}" download>Archivo</a>`,
                    `

                        <a onclick="veoEditoDoc('${row.id}','${row.titulo}','${row.folio}','${row.observaciones}')"><button class="btn btn-outline-success"><i class="fas fa-edit"></i></button></a>
                        <a onclick="eliDocumento(${row.id})"><button class="btn btn-outline-danger"><i class=" far fa-trash-alt"></i></button></a>

                    `
                ]).draw(false); // `draw(false)` evita recalcular toda la tabla
            });

        },
        error: function(response) { alert('Error al crear la empresa.'); }
        });
    }
    /* funcion para mostrar la estructura familiar */
    function cargarEstructuraFamiliar(){
        const div = document.getElementById('alerta');
        div.style.display = 'none';

        let idUsu = document.getElementById("idEstudioEdi").value;
        let jsonData = []
        $.ajax({
        url: `/estructura/muestro/${idUsu}`,
        method: 'POST',
        /*  processData: false, // Necesario para evitar que jQuery procese los datos
        contentType: false, */
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')  },
        success: function(response) {

            const tabla = $('#datatable2').DataTable();
            tabla.destroy();
            $('#datatable2 tbody').empty();
            jsonData = Array.isArray(response) ? response : response.data;

            jsonData.forEach(row => {
                tabla.row.add([
                    row.id,
                    row.familiar,
                    row.edad,
                    row.ocupacion,
                    row.laboraEstudia,
                    row.calle,
                    row.tiempoReside,
                    row.tel1,
                    `
                        <a onclick="veoEditoEstructura('${row.id}','${row.familiar}','${row.edad}','${row.ocupacion}','${row.laboraEstudia}','${row.calle}','${row.numero}','${row.colonia}','${row.delegacionMunicipio}','${row.ciudad}','${row.estado}','${row.cpde}','${row.tiempoReside}','${row.tel1}')"><button class="btn btn-outline-success"><i class="fas fa-edit"></i></button></a>
                        <a onclick="eliEstructura(${row.id})"><button class="btn btn-outline-danger"><i class=" far fa-trash-alt"></i></button></a>

                    `
                ]).draw(false); // `draw(false)` evita recalcular toda la tabla
            });

        },
        error: function(response) { alert('Error al crear la empresa.'); }
        });
    }
    /* funcion para mostrar las redes  */
    function cargaRedes(){
        const div = document.getElementById('alerta');
        div.style.display = 'none';

        let idUsu = document.getElementById("idEstudioEdi").value;

        $.ajax({
        url: `/redes/muestro/${idUsu}`,
        method: 'POST',
        /*  processData: false, // Necesario para evitar que jQuery procese los datos
        contentType: false, */
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')  },
        success: function(response) {
            if (response.data && response.data.length > 0) {
            $('#idRedes').val(response.data[0].id);
            $('#facebook').val(response.data[0].facebook);
            $('#twitter').val(response.data[0].twitter);
            $('#instagram').val(response.data[0].instagram);
            $('#linkedin').val(response.data[0].linkedin);
            }
        },
        error: function(response) { alert('Error al crear la empresa.'); }
        });
    }
    /* funcion para mostar conducta social */
    function cargaConducta(){
        const div = document.getElementById('alerta');
        div.style.display = 'none';

        let idUsu = document.getElementById("idEstudioEdi").value;

        $.ajax({
        url: `/conducta/muestro/${idUsu}`,
        method: 'POST',
        /*  processData: false, // Necesario para evitar que jQuery procese los datos
        contentType: false, */
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')  },
        success: function(response) {
            if (response.data && response.data.length > 0) {
            $('#idConducta').val(response.data[0].id);
            $('#quienEstuvo').val(response.data[0].quienEstuvo);
            $('#conductaEntrevistado').val(response.data[0].conductaEntrevistado);
            $('#relacionVecinos').val(response.data[0].relacionVecinos);
            $('#pertenecegrupo').val(response.data[0].pertenecegrupo);
            $('#problemasLegales').val(response.data[0].problemasLegales);
            $('#familiarRecluido').val(response.data[0].familiarRecluido);
            $('#familiaresAdentro').val(response.data[0].familiaresAdentro);
            }
        },
        error: function(response) { alert('Error al crear la empresa.'); }
        });
    }
    /* funcion para mostrar la situacuion */
    function cargaSituacion(){
        const div = document.getElementById('alerta');
        div.style.display = 'none';

        let idUsu = document.getElementById("idEstudioEdi").value;

        $.ajax({
        url: `/situacion/muestro/${idUsu}`,
        method: 'POST',
        /*  processData: false, // Necesario para evitar que jQuery procese los datos
        contentType: false, */
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')  },
        success: function(response) {

            const tabla = $('#datatable9').DataTable();
            tabla.destroy();
            $('#datatable9 tbody').empty();
            jsonData = Array.isArray(response) ? response : response.data;

            jsonData.forEach(row => {
                tabla.row.add([
                    row.id,
                    row.nombre,
                    row.parentesco,
                    row.salario,
                    row.ingreso,
                    row.concepto,
                    row.egresos,
                    row.observaciones,
                    row.superavit,
                    `

                        <a onclick="veoEditoSituacion('${row.id}','${row.nombre}','${row.parentesco}','${row.salario}','${row.ingreso}','${row.concepto}','${row.egresos}','${row.observaciones}','${row.superavit}')"><button class="btn btn-outline-success"><i class="fas fa-edit"></i></button></a>
                        <a onclick="eliSituacion(${row.id})"><button class="btn btn-outline-danger"><i class=" far fa-trash-alt"></i></button></a>

                    `
                ]).draw(false); // `draw(false)` evita recalcular toda la tabla
            });



        },
        error: function(response) { alert('Error al crear la empresa.'); }
        });
    }
    /* funcion para cargar deudas */
    function cargaDeuda(){
        const div = document.getElementById('alerta');
        div.style.display = 'none';

        let idUsu = document.getElementById("idEstudioEdi").value;

        $.ajax({
        url: `/deudas/muestro/${idUsu}`,
        method: 'POST',
        /*  processData: false, // Necesario para evitar que jQuery procese los datos
        contentType: false, */
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')  },
        success: function(response) {
            if (response.data && response.data.length > 0) {
            $('#idDeudas').val(response.data[0].id);
            $('#cuentaDeuda').val(response.data[0].cuentaDeuda);
            $('#conQuien').val(response.data[0].conQuien);
            $('#monto').val(response.data[0].monto);
            $('#abonoMensual').val(response.data[0].abonoMensual);
            $('#apagaren').val(response.data[0].apagaren);
            $('#cuentaauto').val(response.data[0].cuentaauto);
            $('#modelo').val(response.data[0].modelo);
            $('#placas').val(response.data[0].placas);
            $('#valorAuto').val(response.data[0].valorAuto);
            $('#propiedad').val(response.data[0].propiedad);
            $('#ubicacon').val(response.data[0].ubicacon);
            $('#tarjetaCredito').val(response.data[0].tarjetaCredito);
            $('#bancotarjetaCredito').val(response.data[0].bancotarjetaCredito);
            $('#creditoAutorizado').val(response.data[0].creditoAutorizado);
            $('#tarjetaTienda').val(response.data[0].tarjetaTienda);
            $('#conquienTienda').val(response.data[0].conquienTienda);
            $('#creditoAutorizadotienda').val(response.data[0].creditoAutorizadotienda);
            $('#observacionesDeu').val(response.data[0].observaciones);
            }
        },
        error: function(response) { alert('Error al crear la empresa.'); }
        });
    }
    /* funcino para cargar el entorno */
    function cargaEntorno(){
        const div = document.getElementById('alerta');
        div.style.display = 'none';

        let idUsu = document.getElementById("idEstudioEdi").value;

        $.ajax({
        url: `/entorno/muestro/${idUsu}`,
        method: 'POST',
        /*  processData: false, // Necesario para evitar que jQuery procese los datos
        contentType: false, */
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')  },
        success: function(response) {
            if (response.data && response.data.length > 0) {
            $('#idEntorno').val(response.data[0].id);
            $('#tipoZona').val(response.data[0].tipoZona)
            $('#tipoVivienda').val(response.data[0].tipoVivienda)
            $('#edificacion').val(response.data[0].edificacion)
            $('#titular').val(response.data[0].titular)
            $('#parentesco').val(response.data[0].parentesco)
            $('#numRecamaras').val(response.data[0].numRecamaras)
            $('#sala').prop('checked', response.data[0].sala == 1);
            $('#comedor').prop('checked', response.data[0].comedor == 1);
            $('#cocina').prop('checked', response.data[0].cocina == 1);
            $('#garaje').prop('checked', response.data[0].garaje == 1);
            $('#jardin').prop('checked', response.data[0].jardin == 1);
            $('#nomBano').val(response.data[0].nomBano)
            $('#tipobano').val(response.data[0].tipobano)
            $('#viasdeacceso').val(response.data[0].viasdeacceso)
            $('#medioTransporte').val(response.data[0].medioTransporte)
            $('#tiempoServicio').val(response.data[0].tiempoServicio)
            $('#entreCalles').val(response.data[0].entreCalles)
            $('#color').val(response.data[0].color)
            $('#porton').val(response.data[0].porton)
            $('#referencias').val(response.data[0].referencias)
            $('#observacionesent').val(response.data[0].observaciones)
            $('#idUSuario').val(response.data[0].idUSuario)
            $('#agua').prop('checked', response.data[0].agua == 1);
            $('#luz').prop('checked', response.data[0].luz == 1);
            $('#pavimentacion').prop('checked', response.data[0].pavimentacion == 1);
            $('#telefonoent').prop('checked', response.data[0].telefono == 1);
            $('#transporte').prop('checked', response.data[0].transporte == 1);
            $('#vigilancia').prop('checked', response.data[0].vigilancia == 1);
            $('#areas').prop('checked', response.data[0].areas == 1);
            $('#drenaje').prop('checked', response.data[0].drenaje == 1);
            $('#paredes').val(response.data[0].paredes)
            $('#techos').val(response.data[0].techos)
            $('#pisos').val(response.data[0].pisos)
            $('#telNormal').prop('checked', response.data[0].telNormal == 1);
            $('#telPlasma').prop('checked', response.data[0].telPlasma == 1);
            $('#estereo').prop('checked', response.data[0].estereo == 1);
            $('#dvd').prop('checked', response.data[0].dvd == 1);
            $('#blueray').prop('checked', response.data[0].blueray == 1);
            $('#estufa').prop('checked', response.data[0].estufa == 1);
            $('#horno').prop('checked', response.data[0].horno == 1);
            $('#lavadora').prop('checked', response.data[0].lavadora == 1);
            $('#centrolavado').prop('checked', response.data[0].centrolavado == 1);
            $('#refrigerador').prop('checked', response.data[0].refrigerador == 1);
            $('#computadora').prop('checked', response.data[0].computadora == 1);
            $('#extensionInmueble').val(response.data[0].extensionInmueble)
            $('#condicionesInmueble').val(response.data[0].condicionesInmueble)
            $('#condicionesMobiliario').val(response.data[0].condicionesMobiliario)
            $('#orden').val(response.data[0].orden)
            $('#limpieza').val(response.data[0].limpieza)
            $('#delincuencia').val(response.data[0].delincuencia)
            $('#vandalismo').val(response.data[0].vandalismo)
            $('#drogadiccion').val(response.data[0].drogadiccion)
            $('#alcoholismo').val(response.data[0].alcoholismo)
            $('#estudio').prop('checked', response.data[0].estudio == 1);
            $('#zotehuela').prop('checked', response.data[0].zotehuela == 1);
            $('#patio').val(response.data[0].patio)
            $('#internet').prop('checked', response.data[0].internet == 1);
            $('#renta').val(response.data[0].renta)
            $('#regadera').prop('checked', response.data[0].regadera == 1);
            }
        },
        error: function(response) { alert('Error al crear la empresa.'); }
        });
    }
    /* funcion para cargar las referencia personales */
    function cargaReferenicaPersonales(){
        const div = document.getElementById('alerta');
        div.style.display = 'none';

        let idUsu = document.getElementById("idEstudioEdi").value;
        const tabla = $('#datatable4').DataTable();
        tabla.destroy();
        $.ajax({
        url: `/referenciap/muestro/${idUsu}`,
        method: 'POST',
        /*  processData: false, // Necesario para evitar que jQuery procese los datos
        contentType: false, */
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')  },
        success: function(response) {

            $('#datatable4 tbody').empty();
            jsonData = Array.isArray(response) ? response : response.data;

            jsonData.forEach(row => {
                tabla.row.add([
                    row.id,
                    row.nombre,
                    row.tiempoConocerlo,
                    row.relacion,
                    row.domicilio,
                    row.tel1,
                    row.opinion,
                    `

                        <a onclick="veoEditoReferencia('${row.id}','${row.nombre}','${row.tiempoConocerlo}','${row.relacion}','${row.domicilio}','${row.tel1}','${row.opinion}')"><button class="btn btn-outline-success"><i class="fas fa-edit"></i></button></a>
                        <a onclick="eliReferencia(${row.id})"><button class="btn btn-outline-danger"><i class=" far fa-trash-alt"></i></button></a>

                    `
                ]).draw(false); // `draw(false)` evita recalcular toda la tabla
            });


        },
        error: function(response) { alert('Error al crear la empresa.'); }
        });
    }
    /* funcion para la carga de antecendentes laborales */
    function cargaAntecedentes(){
        const div = document.getElementById('alerta');
        div.style.display = 'none';

        let idUsu = document.getElementById("idEstudioEdi").value;
        /* console.log("entro a cargar antecendetes") */
        $.ajax({
        url: `/antecedentesl/muestro/${idUsu}`,
        method: 'POST',
        /*  processData: false, // Necesario para evitar que jQuery procese los datos
        contentType: false, */
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')  },
        success: function(response) {
            /* console.log(response) */
            jsonData = Array.isArray(response) ? response : response.data;
            const tabla = $('#datatable17').DataTable();
            $('#datatable1 tbody').empty();
            jsonData.forEach(row => {
                tabla.row.add([
                    row.id,
                    row.empresa,
                    row.giro,
                    row.direccion,
                    row.fechaIngreso,
                    row.fechaEgreso,
                    row.puesto,
                    row.area,
                    row.salario,
                    row.motivoSalida,
                    row.quienProporciono ,
                    row.puestoProporciono,
                    row.calificacion,
                    row.demanda,
                    row.volveria,
                    row.porque,
                    row.observaciones,
                    row.candidatoes,
                    row.periodosInactivo,

                    `
                        <a onclick="veoEditoAntecedentes('${row.id}','${row.empresa}','${row.giro}','${row.direccion}','${row.telefono}','${row.fechaIngreso}','${row.fechaEgreso}','${row.puesto}','${row.area}','${row.salario}','${row.motivoSalida}','${row.quienProporciono}','${row.puestoProporciono}','${row.calificacion}','${row.demanda}','${row.volveria}','${row.porque}','${row.observaciones}','${row.candidatoes}','${row.periodosInactivo}')"><button class="btn btn-outline-success"><i class="fas fa-edit"></i></button></a>
                        <a onclick="eliAntecedentes(${row.id})"><button class="btn btn-outline-danger"><i class=" far fa-trash-alt"></i></button></a>

                    `
                ]).draw(false); // `draw(false)` evita recalcular toda la tabla
            });


        },
        error: function(response) { alert('Error al crear la empresa.'); }
        });
    }
    /* funcino para la carga de salud */
    function cargaSalud(){
        const div = document.getElementById('alerta');
        div.style.display = 'none';

        let idUsu = document.getElementById("idEstudioEdi").value;

        $.ajax({
        url: `/salud/muestro/${idUsu}`,
        method: 'POST',
        /*  processData: false, // Necesario para evitar que jQuery procese los datos
        contentType: false, */
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')  },
        success: function(response) {
            if (response.data && response.data.length > 0) {
            $('#idSalud').val(response.data[0].id);
            $('#idEstudio').val(response.data[0].idEstudio)
            $('#droga').val(response.data[0].droga)
            $('#cualDroga').val(response.data[0].cualDroga)
            $('#fuma').val(response.data[0].fuma)
            $('#frecuenciaFuma').val(response.data[0].frecuenciaFuma)
            $('#bebidas').val(response.data[0].bebidas)
            $('#frecuenciaBebidas').val(response.data[0].frecuenciaBebidas)
            $('#cafe').val(response.data[0].cafe)
            $('#frecuenciaCafe').val(response.data[0].frecuenciaCafe)
            $('#lentes').val(response.data[0].lentes)
            $('#diagnostico').val(response.data[0].diagnostico)
            $('#intervenciones').val(response.data[0].intervenciones)
            $('#dequeintervenciones').val(response.data[0].dequeintervenciones)
            $('#enfermedadesCronicas').val(response.data[0].enfermedadesCronicas)
            $('#dequeCronicas').val(response.data[0].dequeCronicas)
            $('#hereditarias').val(response.data[0].hereditarias)
            $('#cualHereditarias').val(response.data[0].cualHereditarias)
            $('#quienConstante').val(response.data[0].quienConstante)
            $('#porqueConstante').val(response.data[0].porqueConstante)
            $('#ultimaVez').val(response.data[0].ultimaVez)
            $('#considera').val(response.data[0].considera)
            $('#porqueConsidera').val(response.data[0].porqueConsidera)
            $('#deporte').val(response.data[0].deporte)
            $('#pasatiempo').val(response.data[0].pasatiempo)
            $('#ultimavezDeque').val(response.data[0].ultimavezDeque)
            $('#embarazo').val(response.data[0].embarazo)
            }
        },
        error: function(response) { alert('Error al crear la empresa.'); }
        });
    }
    /* funcion para resumen */
    function cargaResumen(){
        const div = document.getElementById('alerta');
        div.style.display = 'none';

        let idUsu = document.getElementById("idEstudioEdi").value;

        $.ajax({
        url: `/resumen/muestro/${idUsu}`,
        method: 'POST',
        /*  processData: false, // Necesario para evitar que jQuery procese los datos
        contentType: false, */
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')  },
        success: function(response) {
            if (response.data && response.data.length > 0) {
            $('#idResumen').val(response.data[0].id);

            $('#idEstudio').val(response.data[0].idEstudio)
            $('#social').val(response.data[0].social)
            $('#escolar').val(response.data[0].escolar)
            $('#economica').val(response.data[0].economica)
            $('#laboral').val(response.data[0].laboral)
            $('#actitud').val(response.data[0].actitud)
            $('#observacionesr').val(response.data[0].observaciones)
            $('#recomendacion').val(response.data[0].recomendacion)
            $('#observacionesPersonal').val(response.data[0].observacionesPersonal)
            $('#observacionesLaboral').val(response.data[0].observacionesLaboral)
            $('#cali').val(response.data[0].cali)
            }
        },
        error: function(response) { alert('Error al crear la empresa.'); }
        });
    }
    /* funcion para hobby */
    function cargaHobby(){
        const div = document.getElementById('alerta');
        div.style.display = 'none';

        let idUsu = document.getElementById("idEstudioEdi").value;

        $.ajax({
        url: `/hobby/muestro/${idUsu}`,
        method: 'POST',
        /*  processData: false, // Necesario para evitar que jQuery procese los datos
        contentType: false, */
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')  },
        success: function(response) {
            if (response.data && response.data.length > 0) {
            $('#idHobby').val(response.data[0].id);
            $('#deportes').val(response.data[0].deportes)
            $('#cual').val(response.data[0].cual)
            $('#frecuencia').val(response.data[0].frecuencia)
            $('#pasatiempos').val(response.data[0].pasatiempos)
            $('#otros').val(response.data[0].otros)
            }
        },
        error: function(response) { alert('Error al crear la empresa.'); }
        });
    }
    /* funcion para cargar beneficiarios */
    function cargaBeneficiario(){
        const div = document.getElementById('alerta');
        div.style.display = 'none';

        let idUsu = document.getElementById("idEstudioEdi").value;
        const tabla = $('#datatable7').DataTable();
        tabla.destroy();

        $.ajax({
        url: `/beneficiario/muestro/${idUsu}`,
        method: 'POST',
        /*  processData: false, // Necesario para evitar que jQuery procese los datos
        contentType: false, */
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')  },
        success: function(response) {

            $('#datatable7 tbody').empty();
            jsonData = Array.isArray(response) ? response : response.data;

            jsonData.forEach(row => {
                tabla.row.add([
                    row.id,
                    row.parentesco,
                    row.nombre,
                    row.edad,
                    row.ocupacion,
                    row.donde,
                    row.calle,
                    row.numero,
                    row.colonia,
                    row.delegacion,
                    row.ciudad,
                    row.estado,
                    row.cp,
                    row.tiempo,
                    row.telefono,
                    `
                        <a onclick="veoEditoBeneficiario('${row.id}','${row.parentesco}','${row.nombre}','${row.edad}','${row.ocupacion}','${row.donde}','${row.calle}','${row.numero}','${row.colonia}','${row.delegacion}','${row.ciudad}','${row.estado}','${row.cp}','${row.tiempo}','${row.telefono}')"><button class="btn btn-outline-success"><i class="fas fa-edit"></i></button></a>
                        <a onclick="eliBeneficiario(${row.id})"><button class="btn btn-outline-danger"><i class=" far fa-trash-alt"></i></button></a>

                    `
                ]).draw(false); // `draw(false)` evita recalcular toda la tabla
            });


        },
        error: function(response) { alert('Error al crear la empresa.'); }
        });
    }
    /* funcion nivel academico */
    function cargaNivel(){
        const div = document.getElementById('alerta');
        div.style.display = 'none';

        let idUsu = document.getElementById("idEstudioEdi").value;

        $.ajax({
        url: `/nivel/muestro/${idUsu}`,
        method: 'POST',
        /*  processData: false, // Necesario para evitar que jQuery procese los datos
        contentType: false, */
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')  },
        success: function(response) {
            if (response.data && response.data.length > 0) {
            $('#idNivel').val(response.data[0].id);


            $('#ultimon').val(response.data[0].ultimo)
            $('#periodon').val(response.data[0].periodo)
            $('#profesionaln').val(response.data[0].profesional)
            $('#cedulan').val(response.data[0].cedula)
            $('#especialidadn').val(response.data[0].especialidad)
            $('#cason').val(response.data[0].caso)
            $('#otrosn').val(response.data[0].otros)
            }
        },
        error: function(response) { alert('Error al crear la empresa.'); }
        });
    }
    /* funcion para cargar periodos no laborados */
    function cargaPeriodos(){
        const div = document.getElementById('alerta');
        div.style.display = 'none';

        let idUsu = document.getElementById("idEstudioEdi").value;
        const tabla = $('#datatable8').DataTable();
        tabla.destroy();

        $.ajax({
        url: `/periodo/muestro/${idUsu}`,
        method: 'POST',
        /*  processData: false, // Necesario para evitar que jQuery procese los datos
        contentType: false, */
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')  },
        success: function(response) {

            $('#datatable8 tbody').empty();
            jsonData = Array.isArray(response) ? response : response.data;

            jsonData.forEach(row => {
                tabla.row.add([
                    row.id,
                    row.inicio,
                    row.termino,
                    row.motivo,
                    row.comentarios,

                    `
                        <a onclick="veoEditoPeriodo('${row.id}','${row.inicio}','${row.termino}','${row.motivo}','${row.comentarios}')"><button class="btn btn-outline-success"><i class="fas fa-edit"></i></button></a>
                        <a onclick="eliPeriodo(${row.id})"><button class="btn btn-outline-danger"><i class=" far fa-trash-alt"></i></button></a>

                    `
                ]).draw(false); // `draw(false)` evita recalcular toda la tabla
            });


        },
        error: function(response) { alert('Error al crear la empresa.'); }
        });
    }
    /* funcion carga historial laboral */
    function cargaHistorial(){
        const div = document.getElementById('alerta');
        div.style.display = 'none';

        let idUsu = document.getElementById("idEstudioEdi").value;

        $.ajax({
        url: `/historitall/muestro/${idUsu}`,
        method: 'POST',
        /*  processData: false, // Necesario para evitar que jQuery procese los datos
        contentType: false, */
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')  },
        success: function(response) {
            if (response.data && response.data.length > 0) {
            $('#idHistorial').val(response.data[0].id);

            $('#ultimoh').val(response.data[0].ultimo)
            $('#vidah').val(response.data[0].vida)
            $('#nusemanah').val(response.data[0].nusemana)
            $('#porcentajeh').val(response.data[0].porcentaje)
            $('#numeroempleadoresh').val(response.data[0].numeroempleadores)
            $('#progresionh').val(response.data[0].progresion)
            $('#finiquitoh').val(response.data[0].finiquito)
            $('#liquidacionh').val(response.data[0].liquidacion)
            $('#aguinaldoh').val(response.data[0].aguinaldo)
            $('#vacacionesh').val(response.data[0].vacaciones)
            $('#comentariosh').val(response.data[0].comentarios)
            }
        },
        error: function(response) { alert('Error al crear la empresa.'); }
        });
    }
    /* funcion para cargar los despidos */
    function cargaDespidos(){
        const div = document.getElementById('alerta');
        div.style.display = 'none';

        let idUsu = document.getElementById("idEstudioEdi").value;
        const tabla = $('#datatable12').DataTable();
        tabla.destroy();

        $.ajax({
        url: `/despidos/muestro/${idUsu}`,
        method: 'POST',
        /*  processData: false, // Necesario para evitar que jQuery procese los datos
        contentType: false, */
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')  },
        success: function(response) {

            $('#datatable12 tbody').empty();
            jsonData = Array.isArray(response) ? response : response.data;

            jsonData.forEach(row => {
                tabla.row.add([
                    row.id,
                    row.nombre,
                    row.periodo,
                    row.motivo,

                    `
                        <a onclick="veoEditoDespidos('${row.id}','${row.nombre}','${row.periodo}','${row.motivo}')"><button class="btn btn-outline-success"><i class="fas fa-edit"></i></button></a>
                        <a onclick="eliDespidos(${row.id})"><button class="btn btn-outline-danger"><i class=" far fa-trash-alt"></i></button></a>

                    `
                ]).draw(false); // `draw(false)` evita recalcular toda la tabla
            });


        },
        error: function(response) { alert('Error al crear la empresa.'); }
        });
    }
    /* funcion para cargar las incapaciaddes */
    function cargaIncapacidades(){
        const div = document.getElementById('alerta');
        div.style.display = 'none';

        let idUsu = document.getElementById("idEstudioEdi").value;
        const tabla = $('#datatable10').DataTable();
        tabla.destroy();

        $.ajax({
        url: `/incapacidades/muestro/${idUsu}`,
        method: 'POST',
        /*  processData: false, // Necesario para evitar que jQuery procese los datos
        contentType: false, */
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')  },
        success: function(response) {

            $('#datatable10 tbody').empty();
            jsonData = Array.isArray(response) ? response : response.data;

            jsonData.forEach(row => {
                tabla.row.add([
                    row.id,
                    row.nombre,
                    row.periodo,
                    row.motivo,

                    `
                        <a onclick="veoEditoIncapacidades('${row.id}','${row.nombre}','${row.periodo}','${row.motivo}')"><button class="btn btn-outline-success"><i class="fas fa-edit"></i></button></a>
                        <a onclick="eliIncapacidades(${row.id})"><button class="btn btn-outline-danger"><i class=" far fa-trash-alt"></i></button></a>

                    `
                ]).draw(false); // `draw(false)` evita recalcular toda la tabla
            });


        },
        error: function(response) { alert('Error al crear la empresa.'); }
        });
    }
    /* funcion pára problemas empleao actual */
    function cargaProblemas(){
        const div = document.getElementById('alerta');
        div.style.display = 'none';

        let idUsu = document.getElementById("idEstudioEdi").value;

        $.ajax({
        url: `/problemas/muestro/${idUsu}`,
        method: 'POST',
        /*  processData: false, // Necesario para evitar que jQuery procese los datos
        contentType: false, */
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')  },
        success: function(response) {
            if (response.data && response.data.length > 0) {
            $('#idProblemas').val(response.data[0].id);

            $('#nombrepro').val(response.data[0].nombre)
            $('#informantepro').val(response.data[0].informante)
            $('#comentariospro').val(response.data[0].comentarios)
            $('#datopro').val(response.data[0].dato)
            }

        },
        error: function(response) { alert('Error al crear la empresa.'); }
        });
    }
    /* funcion para cargar incidencias laboral */
    function cargaInfoLab(){
        const div = document.getElementById('alerta');
        div.style.display = 'none';

        let idUsu = document.getElementById("idEstudioEdi").value;

        $.ajax({
        url: `/infoLab/muestro/${idUsu}`,
        method: 'POST',
        /*  processData: false, // Necesario para evitar que jQuery procese los datos
        contentType: false, */
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')  },
        success: function(response) {
            if (response.data && response.data.length > 0) {
            $('#idInfoLab').val(response.data[0].id);
            $('#laborall').val(response.data[0].laboral)
            $('#campol').val(response.data[0].campol)
            $('#fechal').val(response.data[0].fechal)
            $('#acuerdol').val(response.data[0].acuerdol)
            $('#civiles').val(response.data[0].civiles)
            $('#campoc').val(response.data[0].campoc)
            $('#fechac').val(response.data[0].fechac)
            $('#acuerdoc').val(response.data[0].acuerdoc)
            $('#familiares').val(response.data[0].familiares)
            $('#campof').val(response.data[0].campof)
            $('#fechaf').val(response.data[0].fechaf)
            $('#acuerdof').val(response.data[0].acuerdof)
            $('#penales').val(response.data[0].penales)
            $('#campop').val(response.data[0].campop)
            $('#fechap').val(response.data[0].fechap)
            $('#acuerdop').val(response.data[0].acuerdop)
            $('#administrativa').val(response.data[0].administrativa)
            $('#campoa').val(response.data[0].campoa)
            $('#fechaa').val(response.data[0].fechaa)
            $('#acuerdoa').val(response.data[0].acuerdoa)
            $('#internacional').val(response.data[0].internacional)
            $('#campoi').val(response.data[0].campoi)
            $('#fechai').val(response.data[0].fechai)
            $('#acuerdoi').val(response.data[0].acuerdoi)
            $('#sat').val(response.data[0].sat)
            $('#camposat').val(response.data[0].camposat)
            $('#fechasat').val(response.data[0].fechasat)
            $('#acuerdosat').val(response.data[0].acuerdosat)
            $('#comentariol').val(response.data[0].comentariol)
            $('#comentarioc').val(response.data[0].comentarioc)
            $('#comentariof').val(response.data[0].comentariof)
            $('#comentariop').val(response.data[0].comentariop)
            $('#comentarioa').val(response.data[0].comentarioa)
            $('#comentarioi').val(response.data[0].comentarioi)
            $('#comentariosat').val(response.data[0].comentariosat)
            }
        },
        error: function(response) { alert('Error al crear la empresa.'); }
        });
    }
    /* funcion creditos */
    function cargaCreditos(){
        const div = document.getElementById('alerta');
        div.style.display = 'none';

        let idUsu = document.getElementById("idEstudioEdi").value;
        const tabla = $('#datatable11').DataTable();
        tabla.destroy();

        $.ajax({
        url: `/creditos/muestro/${idUsu}`,
        method: 'POST',
        /*  processData: false, // Necesario para evitar que jQuery procese los datos
        contentType: false, */
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')  },
        success: function(response) {

            $('#datatable11 tbody').empty();
            jsonData = Array.isArray(response) ? response : response.data;

            jsonData.forEach(row => {
                tabla.row.add([
                    row.id,
                    row.fecha,
                    row.entidad,
                    row.monto,
                    row.total,
                    row.estatus,
                    row.comentario,
                    row.endeudamiento,
                    row.hipoteca,
                    row.score,
                    `
                        <a onclick="veoEditoCreditos('${row.id}','${row.fecha}','${row.entidad}','${row.monto}','${row.total}','${row.estatus}','${row.comentario}','${row.endeudamiento}','${row.hipoteca}','${row.score}')"><button class="btn btn-outline-success"><i class="fas fa-edit"></i></button></a>
                        <a onclick="eliCreditos(${row.id})"><button class="btn btn-outline-danger"><i class=" far fa-trash-alt"></i></button></a>

                    `
                ]).draw(false); // `draw(false)` evita recalcular toda la tabla
            });


        },
        error: function(response) { alert('Error al crear la empresa.'); }
        });
    }
    /* funcion para cargar infonavit */
    function cargaInfonaviot(){
        const div = document.getElementById('alerta');
        div.style.display = 'none';

        let idUsu = document.getElementById("idEstudioEdi").value;

        $.ajax({
        url: `/infonavit/muestro/${idUsu}`,
        method: 'POST',
        /*  processData: false, // Necesario para evitar que jQuery procese los datos
        contentType: false, */
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')  },
        success: function(response) {
            if (response.data && response.data.length > 0) {
            $('#idInfonavit').val(response.data[0].id);
            $('#estatusvit').val(response.data[0].estatus)
            $('#puntosvit').val(response.data[0].puntos)
            $('#subcuentavit').val(response.data[0].subcuenta)
            $('#maximovit').val(response.data[0].maximo)
            $('#hipotecavit').val(response.data[0].hipoteca)
            }
        },
        error: function(response) { alert('Error al crear la empresa.'); }
        });
    }
    /* funcino para cargar servicio medico */
    function cargaServicioMedico(){
        const div = document.getElementById('alerta');
        div.style.display = 'none';

        let idUsu = document.getElementById("idEstudioEdi").value;

        $.ajax({
        url: `/medico/muestro/${idUsu}`,
        method: 'POST',
        /*  processData: false, // Necesario para evitar que jQuery procese los datos
        contentType: false, */
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')  },
        success: function(response) {
            if (response.data && response.data.length > 0) {
            $('#clinicai').val(response.data[0].clinicai)
            $('#incidentei').val(response.data[0].incidentei)
            $('#tipoi').val(response.data[0].tipoi)
            $('#clinicaim').val(response.data[0].clinicaim)
            $('#incidenteim').val(response.data[0].incidenteim)
            $('#tipoim').val(response.data[0].tipoim)
            $('#clinicais').val(response.data[0].clinicais)
            $('#incidenteis').val(response.data[0].incidenteis)
            $('#tipois').val(response.data[0].tipois)
            $('#clinicase').val(response.data[0].clinicase)
            $('#incidentese').val(response.data[0].incidentese)
            $('#tipose').val(response.data[0].tipose)
            $('#aseguradora').val(response.data[0].aseguradora)
            $('#incidentepri').val(response.data[0].incidentepri)
            $('#tipopri').val(response.data[0].tipopri)
            $('#clinicaisse').val(response.data[0].clinicaisse)
            $('#incidenteisse').val(response.data[0].incidenteisse)
            $('#tipoisse').val(response.data[0].tipoisse)
            $('#idMedico').val(response.data[0].id);
            }
        },
        error: function(response) { alert('Error al crear la empresa.'); }
        });
    }

    /* funcnio para cargar documentos presentados */
    function cargadp(){
        const div = document.getElementById('alerta');
        div.style.display = 'none';

        let idUsu = document.getElementById("idEstudioEdi").value;

        $.ajax({
        url: `/presentados/muestro/${idUsu}`,
        method: 'POST',
        /*  processData: false, // Necesario para evitar que jQuery procese los datos
        contentType: false, */
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')  },
        success: function(response) {
            if (response.data && response.data.length > 0) {
            $('#documentodp').val(response.data[0].documento)
            $('#inedp').val(response.data[0].ine)
            $('#comprobantedp').val(response.data[0].comprobante)
            $('#actadp').val(response.data[0].acta)
            $('#cartasdp').val(response.data[0].cartas)
            $('#avisodp').val(response.data[0].aviso)
            $('#comentariosdp').val(response.data[0].comentarios)

            $('#idPresentado').val(response.data[0].id);
            }
        },
        error: function(response) { alert('Error al crear la empresa.'); }
        });
    }
    /* funcion para cargar los grados  */
    function cargaGrados(){
        const div = document.getElementById('alerta');
        div.style.display = 'none';

        let idUsu = document.getElementById("idEstudioEdi").value;
        const tabla = $('#datatable14').DataTable();
        tabla.destroy();

        $.ajax({
        url: `/grados/muestro/${idUsu}`,
        method: 'POST',
        /*  processData: false, // Necesario para evitar que jQuery procese los datos
        contentType: false, */
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')  },
        success: function(response) {

            $('#datatable14 tbody').empty();
            jsonData = Array.isArray(response) ? response : response.data;

            jsonData.forEach(row => {
                tabla.row.add([
                    row.id,
                    row.grado,
                    row.nombre,
                    row.lugar,
                    row.periodo,
                    row.documento,
                    row.folio,
                    `
                        <a onclick="veoEditoGrados('${row.id}','${row.grado}','${row.nombre}','${row.lugar}','${row.periodo}','${row.documento}','${row.folio}')"><button class="btn btn-outline-success"><i class="fas fa-edit"></i></button></a>
                        <a onclick="eliGrados(${row.id})"><button class="btn btn-outline-danger"><i class=" far fa-trash-alt"></i></button></a>

                    `
                ]).draw(false); // `draw(false)` evita recalcular toda la tabla
            });


        },
        error: function(response) { alert('Error al crear la empresa.'); }
        });
    }
    /* funcion para cargar ionvestigaciones */
    function cargoInvestigaciones(){
        const div = document.getElementById('alerta');
        div.style.display = 'none';

        let idUsu = document.getElementById("idEstudioEdi").value;

        $.ajax({
        url: `/investigaciones/muestro/${idUsu}`,
        method: 'POST',
        /*  processData: false, // Necesario para evitar que jQuery procese los datos
        contentType: false, */
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')  },
        success: function(response) {
            if (response.data && response.data.length > 0) {
            $('#cuentaConstanciai').val(response.data[0].cuentaConstancia)
            $('#proporcionoi').val(response.data[0].proporciono)
            $('#casoNoi').val(response.data[0].casoNo)
            $('#demandadoi').val(response.data[0].demandado)
            $('#actualmentei').val(response.data[0].actualmente)
            $('#estabilidadi').val(response.data[0].estabilidad)
            $('#inactividadi').val(response.data[0].inactividad)
            $('#registoPatronali').val(response.data[0].registoPatronal)
            $('#referenciayPeriodosi').val(response.data[0].referenciayPeriodos)
            $('#dosEmpleosi').val(response.data[0].dosEmpleos)
            $('#ausentismoi').val(response.data[0].ausentismo)
            $('#abandonoi').val(response.data[0].abandono)
            $('#desempenoRegulari').val(response.data[0].desempenoRegular)
            $('#omitioi').val(response.data[0].omitio)
            $('#informacioni').val(response.data[0].informacion)
            $('#referenciasi').val(response.data[0].referencias)
            $('#confiablei').val(response.data[0].confiable)
            $('#comentariosi').val(response.data[0].comentarios)
            $('#notasLegalesi').val(response.data[0].notasLegales)
            }


            $('#idInvestigacion').val(response.data[0].id);
        },
        error: function(response) { alert('Error al crear la empresa.'); }
        });
    }
    /* funcion para cargar entornos */
    function cargoEntorno(){
        const div = document.getElementById('alerta');
        div.style.display = 'none';

        let idUsu = document.getElementById("idEstudioEdi").value;

        $.ajax({
        url: `/entornos/muestro/${idUsu}`,
        method: 'POST',
        /*  processData: false, // Necesario para evitar que jQuery procese los datos
        contentType: false, */
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')  },
        success: function(response) {
            if (response.data && response.data.length > 0) {
            $('#comentariosenn').val(response.data[0].comentarios)
            $('#tiempoVivirenn').val(response.data[0].tiempoVivir)
            $('#calleenn').val(response.data[0].calle)
            $('#numeroenn').val(response.data[0].numero)
            $('#interiorenn').val(response.data[0].interior)
            $('#coloniaenn').val(response.data[0].colonia)
            $('#entreenn').val(response.data[0].entre)
            $('#delegacionMunicpioenn').val(response.data[0].delegacionMunicpio)
            $('#estadoenn').val(response.data[0].estado)
            $('#cpenn').val(response.data[0].cp)
            $('#colorenn').val(response.data[0].color)
            $('#tipoenn').val(response.data[0].tipo)
            $('#dondeEsenn').val(response.data[0].dondeEs)
            $('#ubicacionenn').val(response.data[0].ubicacion)

            $('#idEntornoccep').val(response.data[0].id);
            }
        },
        error: function(response) { alert('Error al crear la empresa.'); }
        });
    }
    /* funcion concluciones */
    function cargaConcluciones(){
        const div = document.getElementById('alerta');
        div.style.display = 'none';

        let idUsu = document.getElementById("idEstudioEdi").value;
        const tabla = $('#datatable16').DataTable();
        tabla.destroy();

        $.ajax({
        url: `/concluciones/muestro/${idUsu}`,
        method: 'POST',
        /*  processData: false, // Necesario para evitar que jQuery procese los datos
        contentType: false, */
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')  },
        success: function(response) {

            $('#datatable16 tbody').empty();
            jsonData = Array.isArray(response) ? response : response.data;

            jsonData.forEach(row => {
                tabla.row.add([
                    row.id,
                    row.acercaCandidato,
                    row.acercaFamilia,
                    row.conclucionesEntrevistador,
                    row.estatusfinal,

                    `
                        <a onclick="veoEditoConclucion('${row.id}','${row.acercaCandidato}','${row.acercaFamilia}','${row.conclucionesEntrevistador}','${row.participacion}','${row.entorno}','${row.referencias}','${row.comentariosGenerales}','${row.analisisVerificacion}','${row.atendio}','${row.presento}','${row.documentacionCompartida}','${row.referenciasPersonales}','${row.estatusfinal}')"><button class="btn btn-outline-success"><i class="fas fa-edit"></i></button></a>
                        <a onclick="eliConclucion(${row.id})"><button class="btn btn-outline-danger"><i class=" far fa-trash-alt"></i></button></a>

                    `
                ]).draw(false); // `draw(false)` evita recalcular toda la tabla
            });


        },
        error: function(response) { alert('Error al crear la empresa.'); }
        });
    }
    /* /////////////////////////////////////////////////////////// */

    /* /////////////////////////////////////////////////////////// */
    /* FUNCION PARA SECCIONES */
    /* /////////////////////////////////////////////////////////// */

    /* funcion para mostrar lasseccion de informacion */
    function abrirSeccion(seccion) {
        /*  Domicilio */
        if (seccion == 1) {

            cargaDomilio()
            const Domicilio = document.getElementById("Domicilio");
            Domicilio.style.display = "";
            const Documentacion = document.getElementById("Documentacion");
            Documentacion.style.display = "none";
            const Estructurafamiliar = document.getElementById("Estructurafamiliar");
            Estructurafamiliar.style.display = "none";
            const Redes = document.getElementById("Redes");
            Redes.style.display = "none";
            const Conducta = document.getElementById("Conducta");
            Conducta.style.display = "none";
            const Situacion = document.getElementById("Situacion");
            Situacion.style.display = "none";
            const Deudas = document.getElementById("Deudas");
            Deudas.style.display = "none";
            const Entorno = document.getElementById("Entorno");
            Entorno.style.display = "none";
            const Referenciaspersonales = document.getElementById("Referenciaspersonales");
            Referenciaspersonales.style.display = "none";
            const Antecedenteslaborales = document.getElementById("Antecedenteslaborales");
            Antecedenteslaborales.style.display = "none";

            const Salud = document.getElementById("Salud");
            Salud.style.display = "none";
            const Resumen = document.getElementById("Resumen");
            Resumen.style.display = "none";
            const HobbyIntereses = document.getElementById("HobbyIntereses");
            HobbyIntereses.style.display = "none";
            const Beneficiarios = document.getElementById("Beneficiarios");
            Beneficiarios.style.display = "none";
            const NivelAcademico = document.getElementById("NivelAcademico");
            NivelAcademico.style.display = "none";
            const PeriodosnoLaborados = document.getElementById("PeriodosnoLaborados");
            PeriodosnoLaborados.style.display = "none";
            const HistorialLaboral = document.getElementById("HistorialLaboral");
            HistorialLaboral.style.display = "none";
            const Despidossalidas = document.getElementById("Despidossalidas");
            Despidossalidas.style.display = "none";
            const Diasincapacidad = document.getElementById("Diasincapacidad");
            Diasincapacidad.style.display = "none";
            const Problemasempleadoractual = document.getElementById("Problemasempleadoractual");
            Problemasempleadoractual.style.display = "none";
            const IncidenciasLegales = document.getElementById("IncidenciasLegales");
            IncidenciasLegales.style.display = "none";
            const CreditosActivosehistorialpago = document.getElementById("CreditosActivosehistorialpago");
            CreditosActivosehistorialpago.style.display = "none";
            const Infonavit = document.getElementById("Infonavit");
            Infonavit.style.display = "none";
            const Serviciomedico = document.getElementById("Serviciomedico");
            Serviciomedico.style.display = "none";
            const documentospresentados = document.getElementById("documentospresentados");
            documentospresentados.style.display = "none";

            const estudiosccep = document.getElementById("estudiosccep");
            estudiosccep.style.display = "none";
            const investigacionesccep = document.getElementById("investigacionesccep");
            investigacionesccep.style.display = "none";
            const entornoccep = document.getElementById("entornoccep");
            entornoccep.style.display = "none";
            const conclucionesccep = document.getElementById("conclucionesccep");
            conclucionesccep.style.display = "none";
        }
        /* Documentación */
        if (seccion == 2) {
            const tabla = $('#datatable1').DataTable();
            tabla.destroy();
            $('#datatable1 tbody').empty();
            cargarDocumentos()
            const Domicilio = document.getElementById("Domicilio");
            Domicilio.style.display = "none";
            const Documentacion = document.getElementById("Documentacion");
            Documentacion.style.display = "";
            const Estructurafamiliar = document.getElementById("Estructurafamiliar");
            Estructurafamiliar.style.display = "none";
            const Redes = document.getElementById("Redes");
            Redes.style.display = "none";
            const Conducta = document.getElementById("Conducta");
            Conducta.style.display = "none";
            const Situacion = document.getElementById("Situacion");
            Situacion.style.display = "none";
            const Deudas = document.getElementById("Deudas");
            Deudas.style.display = "none";
            const Entorno = document.getElementById("Entorno");
            Entorno.style.display = "none";
            const Referenciaspersonales = document.getElementById("Referenciaspersonales");
            Referenciaspersonales.style.display = "none";
            const Antecedenteslaborales = document.getElementById("Antecedenteslaborales");
            Antecedenteslaborales.style.display = "none";

            const Salud = document.getElementById("Salud");
            Salud.style.display = "none";
            const Resumen = document.getElementById("Resumen");
            Resumen.style.display = "none";
            const HobbyIntereses = document.getElementById("HobbyIntereses");
            HobbyIntereses.style.display = "none";
            const Beneficiarios = document.getElementById("Beneficiarios");
            Beneficiarios.style.display = "none";
            const NivelAcademico = document.getElementById("NivelAcademico");
            NivelAcademico.style.display = "none";
            const PeriodosnoLaborados = document.getElementById("PeriodosnoLaborados");
            PeriodosnoLaborados.style.display = "none";
            const HistorialLaboral = document.getElementById("HistorialLaboral");
            HistorialLaboral.style.display = "none";
            const Despidossalidas = document.getElementById("Despidossalidas");
            Despidossalidas.style.display = "none";
            const Diasincapacidad = document.getElementById("Diasincapacidad");
            Diasincapacidad.style.display = "none";
            const Problemasempleadoractual = document.getElementById("Problemasempleadoractual");
            Problemasempleadoractual.style.display = "none";
            const IncidenciasLegales = document.getElementById("IncidenciasLegales");
            IncidenciasLegales.style.display = "none";
            const CreditosActivosehistorialpago = document.getElementById("CreditosActivosehistorialpago");
            CreditosActivosehistorialpago.style.display = "none";
            const Infonavit = document.getElementById("Infonavit");
            Infonavit.style.display = "none";
            const Serviciomedico = document.getElementById("Serviciomedico");
            Serviciomedico.style.display = "none";
            const documentospresentados = document.getElementById("documentospresentados");
            documentospresentados.style.display = "none";

            const estudiosccep = document.getElementById("estudiosccep");
            estudiosccep.style.display = "none";
            const investigacionesccep = document.getElementById("investigacionesccep");
            investigacionesccep.style.display = "none";
            const entornoccep = document.getElementById("entornoccep");
            entornoccep.style.display = "none";
            const conclucionesccep = document.getElementById("conclucionesccep");
            conclucionesccep.style.display = "none";
        }
        /* Estructura familiar */
        if (seccion == 3) {

            $('#datatable2 tbody').empty();
            cargarEstructuraFamiliar()
            const Domicilio = document.getElementById("Domicilio");
            Domicilio.style.display = "none";
            const Documentacion = document.getElementById("Documentacion");
            Documentacion.style.display = "none";
            const Estructurafamiliar = document.getElementById("Estructurafamiliar");
            Estructurafamiliar.style.display = "";
            const Redes = document.getElementById("Redes");
            Redes.style.display = "none";
            const Conducta = document.getElementById("Conducta");
            Conducta.style.display = "none";
            const Situacion = document.getElementById("Situacion");
            Situacion.style.display = "none";
            const Deudas = document.getElementById("Deudas");
            Deudas.style.display = "none";
            const Entorno = document.getElementById("Entorno");
            Entorno.style.display = "none";
            const Referenciaspersonales = document.getElementById("Referenciaspersonales");
            Referenciaspersonales.style.display = "none";
            const Antecedenteslaborales = document.getElementById("Antecedenteslaborales");
            Antecedenteslaborales.style.display = "none";

            const Salud = document.getElementById("Salud");
            Salud.style.display = "none";
            const Resumen = document.getElementById("Resumen");
            Resumen.style.display = "none";
            const HobbyIntereses = document.getElementById("HobbyIntereses");
            HobbyIntereses.style.display = "none";
            const Beneficiarios = document.getElementById("Beneficiarios");
            Beneficiarios.style.display = "none";
            const NivelAcademico = document.getElementById("NivelAcademico");
            NivelAcademico.style.display = "none";
            const PeriodosnoLaborados = document.getElementById("PeriodosnoLaborados");
            PeriodosnoLaborados.style.display = "none";
            const HistorialLaboral = document.getElementById("HistorialLaboral");
            HistorialLaboral.style.display = "none";
            const Despidossalidas = document.getElementById("Despidossalidas");
            Despidossalidas.style.display = "none";
            const Diasincapacidad = document.getElementById("Diasincapacidad");
            Diasincapacidad.style.display = "none";
            const Problemasempleadoractual = document.getElementById("Problemasempleadoractual");
            Problemasempleadoractual.style.display = "none";
            const IncidenciasLegales = document.getElementById("IncidenciasLegales");
            IncidenciasLegales.style.display = "none";
            const CreditosActivosehistorialpago = document.getElementById("CreditosActivosehistorialpago");
            CreditosActivosehistorialpago.style.display = "none";
            const Infonavit = document.getElementById("Infonavit");
            Infonavit.style.display = "none";
            const Serviciomedico = document.getElementById("Serviciomedico");
            Serviciomedico.style.display = "none";
            const documentospresentados = document.getElementById("documentospresentados");
            documentospresentados.style.display = "none";

            const estudiosccep = document.getElementById("estudiosccep");
            estudiosccep.style.display = "none";
            const investigacionesccep = document.getElementById("investigacionesccep");
            investigacionesccep.style.display = "none";
            const entornoccep = document.getElementById("entornoccep");
            entornoccep.style.display = "none";
            const conclucionesccep = document.getElementById("conclucionesccep");
            conclucionesccep.style.display = "none";
        }
        /* Redes */
        if (seccion == 4) {
            cargaRedes()
            const Domicilio = document.getElementById("Domicilio");
            Domicilio.style.display = "none";
            const Documentacion = document.getElementById("Documentacion");
            Documentacion.style.display = "none";
            const Estructurafamiliar = document.getElementById("Estructurafamiliar");
            Estructurafamiliar.style.display = "none";
            const Redes = document.getElementById("Redes");
            Redes.style.display = "";
            const Conducta = document.getElementById("Conducta");
            Conducta.style.display = "none";
            const Situacion = document.getElementById("Situacion");
            Situacion.style.display = "none";
            const Deudas = document.getElementById("Deudas");
            Deudas.style.display = "none";
            const Entorno = document.getElementById("Entorno");
            Entorno.style.display = "none";
            const Referenciaspersonales = document.getElementById("Referenciaspersonales");
            Referenciaspersonales.style.display = "none";
            const Antecedenteslaborales = document.getElementById("Antecedenteslaborales");
            Antecedenteslaborales.style.display = "none";

            const Salud = document.getElementById("Salud");
            Salud.style.display = "none";
            const Resumen = document.getElementById("Resumen");
            Resumen.style.display = "none";
            const HobbyIntereses = document.getElementById("HobbyIntereses");
            HobbyIntereses.style.display = "none";
            const Beneficiarios = document.getElementById("Beneficiarios");
            Beneficiarios.style.display = "none";
            const NivelAcademico = document.getElementById("NivelAcademico");
            NivelAcademico.style.display = "none";
            const PeriodosnoLaborados = document.getElementById("PeriodosnoLaborados");
            PeriodosnoLaborados.style.display = "none";
            const HistorialLaboral = document.getElementById("HistorialLaboral");
            HistorialLaboral.style.display = "none";
            const Despidossalidas = document.getElementById("Despidossalidas");
            Despidossalidas.style.display = "none";
            const Diasincapacidad = document.getElementById("Diasincapacidad");
            Diasincapacidad.style.display = "none";
            const Problemasempleadoractual = document.getElementById("Problemasempleadoractual");
            Problemasempleadoractual.style.display = "none";
            const IncidenciasLegales = document.getElementById("IncidenciasLegales");
            IncidenciasLegales.style.display = "none";
            const CreditosActivosehistorialpago = document.getElementById("CreditosActivosehistorialpago");
            CreditosActivosehistorialpago.style.display = "none";
            const Infonavit = document.getElementById("Infonavit");
            Infonavit.style.display = "none";
            const Serviciomedico = document.getElementById("Serviciomedico");
            Serviciomedico.style.display = "none";
            const documentospresentados = document.getElementById("documentospresentados");
            documentospresentados.style.display = "none";

            const estudiosccep = document.getElementById("estudiosccep");
            estudiosccep.style.display = "none";
            const investigacionesccep = document.getElementById("investigacionesccep");
            investigacionesccep.style.display = "none";
            const entornoccep = document.getElementById("entornoccep");
            entornoccep.style.display = "none";
            const conclucionesccep = document.getElementById("conclucionesccep");
            conclucionesccep.style.display = "none";
        }
        /* Conducta */
        if (seccion == 5) {
            cargaConducta()
            const Domicilio = document.getElementById("Domicilio");
            Domicilio.style.display = "none";
            const Documentacion = document.getElementById("Documentacion");
            Documentacion.style.display = "none";
            const Estructurafamiliar = document.getElementById("Estructurafamiliar");
            Estructurafamiliar.style.display = "none";
            const Redes = document.getElementById("Redes");
            Redes.style.display = "none";
            const Conducta = document.getElementById("Conducta");
            Conducta.style.display = "";
            const Situacion = document.getElementById("Situacion");
            Situacion.style.display = "none";
            const Deudas = document.getElementById("Deudas");
            Deudas.style.display = "none";
            const Entorno = document.getElementById("Entorno");
            Entorno.style.display = "none";
            const Referenciaspersonales = document.getElementById("Referenciaspersonales");
            Referenciaspersonales.style.display = "none";
            const Antecedenteslaborales = document.getElementById("Antecedenteslaborales");
            Antecedenteslaborales.style.display = "none";

            const Salud = document.getElementById("Salud");
            Salud.style.display = "none";
            const Resumen = document.getElementById("Resumen");
            Resumen.style.display = "none";
            const HobbyIntereses = document.getElementById("HobbyIntereses");
            HobbyIntereses.style.display = "none";
            const Beneficiarios = document.getElementById("Beneficiarios");
            Beneficiarios.style.display = "none";
            const NivelAcademico = document.getElementById("NivelAcademico");
            NivelAcademico.style.display = "none";
            const PeriodosnoLaborados = document.getElementById("PeriodosnoLaborados");
            PeriodosnoLaborados.style.display = "none";
            const HistorialLaboral = document.getElementById("HistorialLaboral");
            HistorialLaboral.style.display = "none";
            const Despidossalidas = document.getElementById("Despidossalidas");
            Despidossalidas.style.display = "none";
            const Diasincapacidad = document.getElementById("Diasincapacidad");
            Diasincapacidad.style.display = "none";
            const Problemasempleadoractual = document.getElementById("Problemasempleadoractual");
            Problemasempleadoractual.style.display = "none";
            const IncidenciasLegales = document.getElementById("IncidenciasLegales");
            IncidenciasLegales.style.display = "none";
            const CreditosActivosehistorialpago = document.getElementById("CreditosActivosehistorialpago");
            CreditosActivosehistorialpago.style.display = "none";
            const Infonavit = document.getElementById("Infonavit");
            Infonavit.style.display = "none";
            const Serviciomedico = document.getElementById("Serviciomedico");
            Serviciomedico.style.display = "none";
            const documentospresentados = document.getElementById("documentospresentados");
            documentospresentados.style.display = "none";

            const estudiosccep = document.getElementById("estudiosccep");
            estudiosccep.style.display = "none";
            const investigacionesccep = document.getElementById("investigacionesccep");
            investigacionesccep.style.display = "none";
            const entornoccep = document.getElementById("entornoccep");
            entornoccep.style.display = "none";
            const conclucionesccep = document.getElementById("conclucionesccep");
            conclucionesccep.style.display = "none";
        }
        /* Situación */
        if (seccion == 6) {
            const tabla = $('#datatable9').DataTable();
            tabla.destroy();
            $('#datatable9 tbody').empty();
            cargaSituacion()
            const Domicilio = document.getElementById("Domicilio");
            Domicilio.style.display = "none";
            const Documentacion = document.getElementById("Documentacion");
            Documentacion.style.display = "none";
            const Estructurafamiliar = document.getElementById("Estructurafamiliar");
            Estructurafamiliar.style.display = "none";
            const Redes = document.getElementById("Redes");
            Redes.style.display = "none";
            const Conducta = document.getElementById("Conducta");
            Conducta.style.display = "none";
            const Situacion = document.getElementById("Situacion");
            Situacion.style.display = "";
            const Deudas = document.getElementById("Deudas");
            Deudas.style.display = "none";
            const Entorno = document.getElementById("Entorno");
            Entorno.style.display = "none";
            const Referenciaspersonales = document.getElementById("Referenciaspersonales");
            Referenciaspersonales.style.display = "none";
            const Antecedenteslaborales = document.getElementById("Antecedenteslaborales");
            Antecedenteslaborales.style.display = "none";

            const Salud = document.getElementById("Salud");
            Salud.style.display = "none";
            const Resumen = document.getElementById("Resumen");
            Resumen.style.display = "none";
            const HobbyIntereses = document.getElementById("HobbyIntereses");
            HobbyIntereses.style.display = "none";
            const Beneficiarios = document.getElementById("Beneficiarios");
            Beneficiarios.style.display = "none";
            const NivelAcademico = document.getElementById("NivelAcademico");
            NivelAcademico.style.display = "none";
            const PeriodosnoLaborados = document.getElementById("PeriodosnoLaborados");
            PeriodosnoLaborados.style.display = "none";
            const HistorialLaboral = document.getElementById("HistorialLaboral");
            HistorialLaboral.style.display = "none";
            const Despidossalidas = document.getElementById("Despidossalidas");
            Despidossalidas.style.display = "none";
            const Diasincapacidad = document.getElementById("Diasincapacidad");
            Diasincapacidad.style.display = "none";
            const Problemasempleadoractual = document.getElementById("Problemasempleadoractual");
            Problemasempleadoractual.style.display = "none";
            const IncidenciasLegales = document.getElementById("IncidenciasLegales");
            IncidenciasLegales.style.display = "none";
            const CreditosActivosehistorialpago = document.getElementById("CreditosActivosehistorialpago");
            CreditosActivosehistorialpago.style.display = "none";
            const Infonavit = document.getElementById("Infonavit");
            Infonavit.style.display = "none";
            const Serviciomedico = document.getElementById("Serviciomedico");
            Serviciomedico.style.display = "none";
            const documentospresentados = document.getElementById("documentospresentados");
            documentospresentados.style.display = "none";

            const estudiosccep = document.getElementById("estudiosccep");
            estudiosccep.style.display = "none";
            const investigacionesccep = document.getElementById("investigacionesccep");
            investigacionesccep.style.display = "none";
            const entornoccep = document.getElementById("entornoccep");
            entornoccep.style.display = "none";
            const conclucionesccep = document.getElementById("conclucionesccep");
            conclucionesccep.style.display = "none";
        }
        /* Deudas */
        if (seccion == 7) {
            cargaDeuda()
            const Domicilio = document.getElementById("Domicilio");
            Domicilio.style.display = "none";
            const Documentacion = document.getElementById("Documentacion");
            Documentacion.style.display = "none";
            const Estructurafamiliar = document.getElementById("Estructurafamiliar");
            Estructurafamiliar.style.display = "none";
            const Redes = document.getElementById("Redes");
            Redes.style.display = "none";
            const Conducta = document.getElementById("Conducta");
            Conducta.style.display = "none";
            const Situacion = document.getElementById("Situacion");
            Situacion.style.display = "none";
            const Deudas = document.getElementById("Deudas");
            Deudas.style.display = "";
            const Entorno = document.getElementById("Entorno");
            Entorno.style.display = "none";
            const Referenciaspersonales = document.getElementById("Referenciaspersonales");
            Referenciaspersonales.style.display = "none";
            const Antecedenteslaborales = document.getElementById("Antecedenteslaborales");
            Antecedenteslaborales.style.display = "none";

            const Salud = document.getElementById("Salud");
            Salud.style.display = "none";
            const Resumen = document.getElementById("Resumen");
            Resumen.style.display = "none";
            const HobbyIntereses = document.getElementById("HobbyIntereses");
            HobbyIntereses.style.display = "none";
            const Beneficiarios = document.getElementById("Beneficiarios");
            Beneficiarios.style.display = "none";
            const NivelAcademico = document.getElementById("NivelAcademico");
            NivelAcademico.style.display = "none";
            const PeriodosnoLaborados = document.getElementById("PeriodosnoLaborados");
            PeriodosnoLaborados.style.display = "none";
            const HistorialLaboral = document.getElementById("HistorialLaboral");
            HistorialLaboral.style.display = "none";
            const Despidossalidas = document.getElementById("Despidossalidas");
            Despidossalidas.style.display = "none";
            const Diasincapacidad = document.getElementById("Diasincapacidad");
            Diasincapacidad.style.display = "none";
            const Problemasempleadoractual = document.getElementById("Problemasempleadoractual");
            Problemasempleadoractual.style.display = "none";
            const IncidenciasLegales = document.getElementById("IncidenciasLegales");
            IncidenciasLegales.style.display = "none";
            const CreditosActivosehistorialpago = document.getElementById("CreditosActivosehistorialpago");
            CreditosActivosehistorialpago.style.display = "none";
            const Infonavit = document.getElementById("Infonavit");
            Infonavit.style.display = "none";
            const Serviciomedico = document.getElementById("Serviciomedico");
            Serviciomedico.style.display = "none";
            const documentospresentados = document.getElementById("documentospresentados");
            documentospresentados.style.display = "none";

            const estudiosccep = document.getElementById("estudiosccep");
            estudiosccep.style.display = "none";
            const investigacionesccep = document.getElementById("investigacionesccep");
            investigacionesccep.style.display = "none";
            const entornoccep = document.getElementById("entornoccep");
            entornoccep.style.display = "none";
            const conclucionesccep = document.getElementById("conclucionesccep");
            conclucionesccep.style.display = "none";
        }
        /* Entorno */
        if (seccion == 8) {
            cargaEntorno()
            const Domicilio = document.getElementById("Domicilio");
            Domicilio.style.display = "none";
            const Documentacion = document.getElementById("Documentacion");
            Documentacion.style.display = "none";
            const Estructurafamiliar = document.getElementById("Estructurafamiliar");
            Estructurafamiliar.style.display = "none";
            const Redes = document.getElementById("Redes");
            Redes.style.display = "none";
            const Conducta = document.getElementById("Conducta");
            Conducta.style.display = "none";
            const Situacion = document.getElementById("Situacion");
            Situacion.style.display = "none";
            const Deudas = document.getElementById("Deudas");
            Deudas.style.display = "none";
            const Entorno = document.getElementById("Entorno");
            Entorno.style.display = "";
            const Referenciaspersonales = document.getElementById("Referenciaspersonales");
            Referenciaspersonales.style.display = "none";
            const Antecedenteslaborales = document.getElementById("Antecedenteslaborales");
            Antecedenteslaborales.style.display = "none";

            const Salud = document.getElementById("Salud");
            Salud.style.display = "none";
            const Resumen = document.getElementById("Resumen");
            Resumen.style.display = "none";
            const HobbyIntereses = document.getElementById("HobbyIntereses");
            HobbyIntereses.style.display = "none";
            const Beneficiarios = document.getElementById("Beneficiarios");
            Beneficiarios.style.display = "none";
            const NivelAcademico = document.getElementById("NivelAcademico");
            NivelAcademico.style.display = "none";
            const PeriodosnoLaborados = document.getElementById("PeriodosnoLaborados");
            PeriodosnoLaborados.style.display = "none";
            const HistorialLaboral = document.getElementById("HistorialLaboral");
            HistorialLaboral.style.display = "none";
            const Despidossalidas = document.getElementById("Despidossalidas");
            Despidossalidas.style.display = "none";
            const Diasincapacidad = document.getElementById("Diasincapacidad");
            Diasincapacidad.style.display = "none";
            const Problemasempleadoractual = document.getElementById("Problemasempleadoractual");
            Problemasempleadoractual.style.display = "none";
            const IncidenciasLegales = document.getElementById("IncidenciasLegales");
            IncidenciasLegales.style.display = "none";
            const CreditosActivosehistorialpago = document.getElementById("CreditosActivosehistorialpago");
            CreditosActivosehistorialpago.style.display = "none";
            const Infonavit = document.getElementById("Infonavit");
            Infonavit.style.display = "none";
            const Serviciomedico = document.getElementById("Serviciomedico");
            Serviciomedico.style.display = "none";
            const documentospresentados = document.getElementById("documentospresentados");
            documentospresentados.style.display = "none";

            const estudiosccep = document.getElementById("estudiosccep");
            estudiosccep.style.display = "none";
            const investigacionesccep = document.getElementById("investigacionesccep");
            investigacionesccep.style.display = "none";
            const entornoccep = document.getElementById("entornoccep");
            entornoccep.style.display = "none";
            const conclucionesccep = document.getElementById("conclucionesccep");
            conclucionesccep.style.display = "none";
        }
        /* Referencias personales */
        if (seccion == 9) {

            $('#datatable4 tbody').empty();
            cargaReferenicaPersonales()
            const Domicilio = document.getElementById("Domicilio");
            Domicilio.style.display = "none";
            const Documentacion = document.getElementById("Documentacion");
            Documentacion.style.display = "none";
            const Estructurafamiliar = document.getElementById("Estructurafamiliar");
            Estructurafamiliar.style.display = "none";
            const Redes = document.getElementById("Redes");
            Redes.style.display = "none";
            const Conducta = document.getElementById("Conducta");
            Conducta.style.display = "none";
            const Situacion = document.getElementById("Situacion");
            Situacion.style.display = "none";
            const Deudas = document.getElementById("Deudas");
            Deudas.style.display = "none";
            const Entorno = document.getElementById("Entorno");
            Entorno.style.display = "none";
            const Referenciaspersonales = document.getElementById("Referenciaspersonales");
            Referenciaspersonales.style.display = "";
            const Antecedenteslaborales = document.getElementById("Antecedenteslaborales");
            Antecedenteslaborales.style.display = "none";

            const Salud = document.getElementById("Salud");
            Salud.style.display = "none";
            const Resumen = document.getElementById("Resumen");
            Resumen.style.display = "none";
            const HobbyIntereses = document.getElementById("HobbyIntereses");
            HobbyIntereses.style.display = "none";
            const Beneficiarios = document.getElementById("Beneficiarios");
            Beneficiarios.style.display = "none";
            const NivelAcademico = document.getElementById("NivelAcademico");
            NivelAcademico.style.display = "none";
            const PeriodosnoLaborados = document.getElementById("PeriodosnoLaborados");
            PeriodosnoLaborados.style.display = "none";
            const HistorialLaboral = document.getElementById("HistorialLaboral");
            HistorialLaboral.style.display = "none";
            const Despidossalidas = document.getElementById("Despidossalidas");
            Despidossalidas.style.display = "none";
            const Diasincapacidad = document.getElementById("Diasincapacidad");
            Diasincapacidad.style.display = "none";
            const Problemasempleadoractual = document.getElementById("Problemasempleadoractual");
            Problemasempleadoractual.style.display = "none";
            const IncidenciasLegales = document.getElementById("IncidenciasLegales");
            IncidenciasLegales.style.display = "none";
            const CreditosActivosehistorialpago = document.getElementById("CreditosActivosehistorialpago");
            CreditosActivosehistorialpago.style.display = "none";
            const Infonavit = document.getElementById("Infonavit");
            Infonavit.style.display = "none";
            const Serviciomedico = document.getElementById("Serviciomedico");
            Serviciomedico.style.display = "none";
            const documentospresentados = document.getElementById("documentospresentados");
            documentospresentados.style.display = "none";

            const estudiosccep = document.getElementById("estudiosccep");
            estudiosccep.style.display = "none";
            const investigacionesccep = document.getElementById("investigacionesccep");
            investigacionesccep.style.display = "none";
            const entornoccep = document.getElementById("entornoccep");
            entornoccep.style.display = "none";
            const conclucionesccep = document.getElementById("conclucionesccep");
            conclucionesccep.style.display = "none";
        }
        /* Antecedentes laborales */
        if (seccion == 10) {
            cargaAntecedentes()
            const Domicilio = document.getElementById("Domicilio");
            Domicilio.style.display = "none";
            const Documentacion = document.getElementById("Documentacion");
            Documentacion.style.display = "none";
            const Estructurafamiliar = document.getElementById("Estructurafamiliar");
            Estructurafamiliar.style.display = "none";
            const Redes = document.getElementById("Redes");
            Redes.style.display = "none";
            const Conducta = document.getElementById("Conducta");
            Conducta.style.display = "none";
            const Situacion = document.getElementById("Situacion");
            Situacion.style.display = "none";
            const Deudas = document.getElementById("Deudas");
            Deudas.style.display = "none";
            const Entorno = document.getElementById("Entorno");
            Entorno.style.display = "none";
            const Referenciaspersonales = document.getElementById("Referenciaspersonales");
            Referenciaspersonales.style.display = "none";
            const Antecedenteslaborales = document.getElementById("Antecedenteslaborales");
            Antecedenteslaborales.style.display = "";

            const Salud = document.getElementById("Salud");
            Salud.style.display = "none";
            const Resumen = document.getElementById("Resumen");
            Resumen.style.display = "none";
            const HobbyIntereses = document.getElementById("HobbyIntereses");
            HobbyIntereses.style.display = "none";
            const Beneficiarios = document.getElementById("Beneficiarios");
            Beneficiarios.style.display = "none";
            const NivelAcademico = document.getElementById("NivelAcademico");
            NivelAcademico.style.display = "none";
            const PeriodosnoLaborados = document.getElementById("PeriodosnoLaborados");
            PeriodosnoLaborados.style.display = "none";
            const HistorialLaboral = document.getElementById("HistorialLaboral");
            HistorialLaboral.style.display = "none";
            const Despidossalidas = document.getElementById("Despidossalidas");
            Despidossalidas.style.display = "none";
            const Diasincapacidad = document.getElementById("Diasincapacidad");
            Diasincapacidad.style.display = "none";
            const Problemasempleadoractual = document.getElementById("Problemasempleadoractual");
            Problemasempleadoractual.style.display = "none";
            const IncidenciasLegales = document.getElementById("IncidenciasLegales");
            IncidenciasLegales.style.display = "none";
            const CreditosActivosehistorialpago = document.getElementById("CreditosActivosehistorialpago");
            CreditosActivosehistorialpago.style.display = "none";
            const Infonavit = document.getElementById("Infonavit");
            Infonavit.style.display = "none";
            const Serviciomedico = document.getElementById("Serviciomedico");
            Serviciomedico.style.display = "none";
            const documentospresentados = document.getElementById("documentospresentados");
            documentospresentados.style.display = "none";

            const estudiosccep = document.getElementById("estudiosccep");
            estudiosccep.style.display = "none";
            const investigacionesccep = document.getElementById("investigacionesccep");
            investigacionesccep.style.display = "none";
            const entornoccep = document.getElementById("entornoccep");
            entornoccep.style.display = "none";
            const conclucionesccep = document.getElementById("conclucionesccep");
            conclucionesccep.style.display = "none";
        }
        /* Salud */
        if (seccion == 12) {
            cargaSalud()
            const Domicilio = document.getElementById("Domicilio");
            Domicilio.style.display = "none";
            const Documentacion = document.getElementById("Documentacion");
            Documentacion.style.display = "none";
            const Estructurafamiliar = document.getElementById("Estructurafamiliar");
            Estructurafamiliar.style.display = "none";
            const Redes = document.getElementById("Redes");
            Redes.style.display = "none";
            const Conducta = document.getElementById("Conducta");
            Conducta.style.display = "none";
            const Situacion = document.getElementById("Situacion");
            Situacion.style.display = "none";
            const Deudas = document.getElementById("Deudas");
            Deudas.style.display = "none";
            const Entorno = document.getElementById("Entorno");
            Entorno.style.display = "none";
            const Referenciaspersonales = document.getElementById("Referenciaspersonales");
            Referenciaspersonales.style.display = "none";
            const Antecedenteslaborales = document.getElementById("Antecedenteslaborales");
            Antecedenteslaborales.style.display = "none";

            const Salud = document.getElementById("Salud");
            Salud.style.display = "";
            const Resumen = document.getElementById("Resumen");
            Resumen.style.display = "none";
            const HobbyIntereses = document.getElementById("HobbyIntereses");
            HobbyIntereses.style.display = "none";
            const Beneficiarios = document.getElementById("Beneficiarios");
            Beneficiarios.style.display = "none";
            const NivelAcademico = document.getElementById("NivelAcademico");
            NivelAcademico.style.display = "none";
            const PeriodosnoLaborados = document.getElementById("PeriodosnoLaborados");
            PeriodosnoLaborados.style.display = "none";
            const HistorialLaboral = document.getElementById("HistorialLaboral");
            HistorialLaboral.style.display = "none";
            const Despidossalidas = document.getElementById("Despidossalidas");
            Despidossalidas.style.display = "none";
            const Diasincapacidad = document.getElementById("Diasincapacidad");
            Diasincapacidad.style.display = "none";
            const Problemasempleadoractual = document.getElementById("Problemasempleadoractual");
            Problemasempleadoractual.style.display = "none";
            const IncidenciasLegales = document.getElementById("IncidenciasLegales");
            IncidenciasLegales.style.display = "none";
            const CreditosActivosehistorialpago = document.getElementById("CreditosActivosehistorialpago");
            CreditosActivosehistorialpago.style.display = "none";
            const Infonavit = document.getElementById("Infonavit");
            Infonavit.style.display = "none";
            const Serviciomedico = document.getElementById("Serviciomedico");
            Serviciomedico.style.display = "none";
            const documentospresentados = document.getElementById("documentospresentados");
            documentospresentados.style.display = "none";

            const estudiosccep = document.getElementById("estudiosccep");
            estudiosccep.style.display = "none";
            const investigacionesccep = document.getElementById("investigacionesccep");
            investigacionesccep.style.display = "none";
            const entornoccep = document.getElementById("entornoccep");
            entornoccep.style.display = "none";
            const conclucionesccep = document.getElementById("conclucionesccep");
            conclucionesccep.style.display = "none";
        }
        /* Resumen */
        if (seccion == 13) {
            cargaResumen()
            const Domicilio = document.getElementById("Domicilio");
            Domicilio.style.display = "none";
            const Documentacion = document.getElementById("Documentacion");
            Documentacion.style.display = "none";
            const Estructurafamiliar = document.getElementById("Estructurafamiliar");
            Estructurafamiliar.style.display = "none";
            const Redes = document.getElementById("Redes");
            Redes.style.display = "none";
            const Conducta = document.getElementById("Conducta");
            Conducta.style.display = "none";
            const Situacion = document.getElementById("Situacion");
            Situacion.style.display = "none";
            const Deudas = document.getElementById("Deudas");
            Deudas.style.display = "none";
            const Entorno = document.getElementById("Entorno");
            Entorno.style.display = "none";
            const Referenciaspersonales = document.getElementById("Referenciaspersonales");
            Referenciaspersonales.style.display = "none";
            const Antecedenteslaborales = document.getElementById("Antecedenteslaborales");
            Antecedenteslaborales.style.display = "none";

            const Salud = document.getElementById("Salud");
            Salud.style.display = "none";
            const Resumen = document.getElementById("Resumen");
            Resumen.style.display = "";
            const HobbyIntereses = document.getElementById("HobbyIntereses");
            HobbyIntereses.style.display = "none";
            const Beneficiarios = document.getElementById("Beneficiarios");
            Beneficiarios.style.display = "none";
            const NivelAcademico = document.getElementById("NivelAcademico");
            NivelAcademico.style.display = "none";
            const PeriodosnoLaborados = document.getElementById("PeriodosnoLaborados");
            PeriodosnoLaborados.style.display = "none";
            const HistorialLaboral = document.getElementById("HistorialLaboral");
            HistorialLaboral.style.display = "none";
            const Despidossalidas = document.getElementById("Despidossalidas");
            Despidossalidas.style.display = "none";
            const Diasincapacidad = document.getElementById("Diasincapacidad");
            Diasincapacidad.style.display = "none";
            const Problemasempleadoractual = document.getElementById("Problemasempleadoractual");
            Problemasempleadoractual.style.display = "none";
            const IncidenciasLegales = document.getElementById("IncidenciasLegales");
            IncidenciasLegales.style.display = "none";
            const CreditosActivosehistorialpago = document.getElementById("CreditosActivosehistorialpago");
            CreditosActivosehistorialpago.style.display = "none";
            const Infonavit = document.getElementById("Infonavit");
            Infonavit.style.display = "none";
            const Serviciomedico = document.getElementById("Serviciomedico");
            Serviciomedico.style.display = "none";
            const documentospresentados = document.getElementById("documentospresentados");
            documentospresentados.style.display = "none";

            const estudiosccep = document.getElementById("estudiosccep");
            estudiosccep.style.display = "none";
            const investigacionesccep = document.getElementById("investigacionesccep");
            investigacionesccep.style.display = "none";
            const entornoccep = document.getElementById("entornoccep");
            entornoccep.style.display = "none";
            const conclucionesccep = document.getElementById("conclucionesccep");
            conclucionesccep.style.display = "none";
        }
        /* Hobby/Intereses */
        if (seccion == 14) {
            cargaHobby()
            const Domicilio = document.getElementById("Domicilio");
            Domicilio.style.display = "none";
            const Documentacion = document.getElementById("Documentacion");
            Documentacion.style.display = "none";
            const Estructurafamiliar = document.getElementById("Estructurafamiliar");
            Estructurafamiliar.style.display = "none";
            const Redes = document.getElementById("Redes");
            Redes.style.display = "none";
            const Conducta = document.getElementById("Conducta");
            Conducta.style.display = "none";
            const Situacion = document.getElementById("Situacion");
            Situacion.style.display = "none";
            const Deudas = document.getElementById("Deudas");
            Deudas.style.display = "none";
            const Entorno = document.getElementById("Entorno");
            Entorno.style.display = "none";
            const Referenciaspersonales = document.getElementById("Referenciaspersonales");
            Referenciaspersonales.style.display = "none";
            const Antecedenteslaborales = document.getElementById("Antecedenteslaborales");
            Antecedenteslaborales.style.display = "none";

            const Salud = document.getElementById("Salud");
            Salud.style.display = "none";
            const Resumen = document.getElementById("Resumen");
            Resumen.style.display = "none";
            const HobbyIntereses = document.getElementById("HobbyIntereses");
            HobbyIntereses.style.display = "";
            const Beneficiarios = document.getElementById("Beneficiarios");
            Beneficiarios.style.display = "none";
            const NivelAcademico = document.getElementById("NivelAcademico");
            NivelAcademico.style.display = "none";
            const PeriodosnoLaborados = document.getElementById("PeriodosnoLaborados");
            PeriodosnoLaborados.style.display = "none";
            const HistorialLaboral = document.getElementById("HistorialLaboral");
            HistorialLaboral.style.display = "none";
            const Despidossalidas = document.getElementById("Despidossalidas");
            Despidossalidas.style.display = "none";
            const Diasincapacidad = document.getElementById("Diasincapacidad");
            Diasincapacidad.style.display = "none";
            const Problemasempleadoractual = document.getElementById("Problemasempleadoractual");
            Problemasempleadoractual.style.display = "none";
            const IncidenciasLegales = document.getElementById("IncidenciasLegales");
            IncidenciasLegales.style.display = "none";
            const CreditosActivosehistorialpago = document.getElementById("CreditosActivosehistorialpago");
            CreditosActivosehistorialpago.style.display = "none";
            const Infonavit = document.getElementById("Infonavit");
            Infonavit.style.display = "none";
            const Serviciomedico = document.getElementById("Serviciomedico");
            Serviciomedico.style.display = "none";
            const documentospresentados = document.getElementById("documentospresentados");
            documentospresentados.style.display = "none";

            const estudiosccep = document.getElementById("estudiosccep");
            estudiosccep.style.display = "none";
            const investigacionesccep = document.getElementById("investigacionesccep");
            investigacionesccep.style.display = "none";
            const entornoccep = document.getElementById("entornoccep");
            entornoccep.style.display = "none";
            const conclucionesccep = document.getElementById("conclucionesccep");
            conclucionesccep.style.display = "none";
        }
        /* Beneficiarios */
        if (seccion == 15) {
            $('#datatable7 tbody').empty();
            cargaBeneficiario()
            const Domicilio = document.getElementById("Domicilio");
            Domicilio.style.display = "none";
            const Documentacion = document.getElementById("Documentacion");
            Documentacion.style.display = "none";
            const Estructurafamiliar = document.getElementById("Estructurafamiliar");
            Estructurafamiliar.style.display = "none";
            const Redes = document.getElementById("Redes");
            Redes.style.display = "none";
            const Conducta = document.getElementById("Conducta");
            Conducta.style.display = "none";
            const Situacion = document.getElementById("Situacion");
            Situacion.style.display = "none";
            const Deudas = document.getElementById("Deudas");
            Deudas.style.display = "none";
            const Entorno = document.getElementById("Entorno");
            Entorno.style.display = "none";
            const Referenciaspersonales = document.getElementById("Referenciaspersonales");
            Referenciaspersonales.style.display = "none";
            const Antecedenteslaborales = document.getElementById("Antecedenteslaborales");
            Antecedenteslaborales.style.display = "none";

            const Salud = document.getElementById("Salud");
            Salud.style.display = "none";
            const Resumen = document.getElementById("Resumen");
            Resumen.style.display = "none";
            const HobbyIntereses = document.getElementById("HobbyIntereses");
            HobbyIntereses.style.display = "none";
            const Beneficiarios = document.getElementById("Beneficiarios");
            Beneficiarios.style.display = "";
            const NivelAcademico = document.getElementById("NivelAcademico");
            NivelAcademico.style.display = "none";
            const PeriodosnoLaborados = document.getElementById("PeriodosnoLaborados");
            PeriodosnoLaborados.style.display = "none";
            const HistorialLaboral = document.getElementById("HistorialLaboral");
            HistorialLaboral.style.display = "none";
            const Despidossalidas = document.getElementById("Despidossalidas");
            Despidossalidas.style.display = "none";
            const Diasincapacidad = document.getElementById("Diasincapacidad");
            Diasincapacidad.style.display = "none";
            const Problemasempleadoractual = document.getElementById("Problemasempleadoractual");
            Problemasempleadoractual.style.display = "none";
            const IncidenciasLegales = document.getElementById("IncidenciasLegales");
            IncidenciasLegales.style.display = "none";
            const CreditosActivosehistorialpago = document.getElementById("CreditosActivosehistorialpago");
            CreditosActivosehistorialpago.style.display = "none";
            const Infonavit = document.getElementById("Infonavit");
            Infonavit.style.display = "none";
            const Serviciomedico = document.getElementById("Serviciomedico");
            Serviciomedico.style.display = "none";
            const documentospresentados = document.getElementById("documentospresentados");
            documentospresentados.style.display = "none";

            const estudiosccep = document.getElementById("estudiosccep");
            estudiosccep.style.display = "none";
            const investigacionesccep = document.getElementById("investigacionesccep");
            investigacionesccep.style.display = "none";
            const entornoccep = document.getElementById("entornoccep");
            entornoccep.style.display = "none";
            const conclucionesccep = document.getElementById("conclucionesccep");
            conclucionesccep.style.display = "none";
        }
        /* Nivel Académico */
        if (seccion == 16) {
            cargaNivel()
            const Domicilio = document.getElementById("Domicilio");
            Domicilio.style.display = "none";
            const Documentacion = document.getElementById("Documentacion");
            Documentacion.style.display = "none";
            const Estructurafamiliar = document.getElementById("Estructurafamiliar");
            Estructurafamiliar.style.display = "none";
            const Redes = document.getElementById("Redes");
            Redes.style.display = "none";
            const Conducta = document.getElementById("Conducta");
            Conducta.style.display = "none";
            const Situacion = document.getElementById("Situacion");
            Situacion.style.display = "none";
            const Deudas = document.getElementById("Deudas");
            Deudas.style.display = "none";
            const Entorno = document.getElementById("Entorno");
            Entorno.style.display = "none";
            const Referenciaspersonales = document.getElementById("Referenciaspersonales");
            Referenciaspersonales.style.display = "none";
            const Antecedenteslaborales = document.getElementById("Antecedenteslaborales");
            Antecedenteslaborales.style.display = "none";

            const Salud = document.getElementById("Salud");
            Salud.style.display = "none";
            const Resumen = document.getElementById("Resumen");
            Resumen.style.display = "none";
            const HobbyIntereses = document.getElementById("HobbyIntereses");
            HobbyIntereses.style.display = "none";
            const Beneficiarios = document.getElementById("Beneficiarios");
            Beneficiarios.style.display = "none";
            const NivelAcademico = document.getElementById("NivelAcademico");
            NivelAcademico.style.display = "";
            const PeriodosnoLaborados = document.getElementById("PeriodosnoLaborados");
            PeriodosnoLaborados.style.display = "none";
            const HistorialLaboral = document.getElementById("HistorialLaboral");
            HistorialLaboral.style.display = "none";
            const Despidossalidas = document.getElementById("Despidossalidas");
            Despidossalidas.style.display = "none";
            const Diasincapacidad = document.getElementById("Diasincapacidad");
            Diasincapacidad.style.display = "none";
            const Problemasempleadoractual = document.getElementById("Problemasempleadoractual");
            Problemasempleadoractual.style.display = "none";
            const IncidenciasLegales = document.getElementById("IncidenciasLegales");
            IncidenciasLegales.style.display = "none";
            const CreditosActivosehistorialpago = document.getElementById("CreditosActivosehistorialpago");
            CreditosActivosehistorialpago.style.display = "none";
            const Infonavit = document.getElementById("Infonavit");
            Infonavit.style.display = "none";
            const Serviciomedico = document.getElementById("Serviciomedico");
            Serviciomedico.style.display = "none";
            const documentospresentados = document.getElementById("documentospresentados");
            documentospresentados.style.display = "none";

            const estudiosccep = document.getElementById("estudiosccep");
            estudiosccep.style.display = "none";
            const investigacionesccep = document.getElementById("investigacionesccep");
            investigacionesccep.style.display = "none";
            const entornoccep = document.getElementById("entornoccep");
            entornoccep.style.display = "none";
            const conclucionesccep = document.getElementById("conclucionesccep");
            conclucionesccep.style.display = "none";
        }
        /* Periodos no Laborados */
        if (seccion == 17) {
            $('#datatable8 tbody').empty();
            cargaPeriodos()
            const Domicilio = document.getElementById("Domicilio");
            Domicilio.style.display = "none";
            const Documentacion = document.getElementById("Documentacion");
            Documentacion.style.display = "none";
            const Estructurafamiliar = document.getElementById("Estructurafamiliar");
            Estructurafamiliar.style.display = "none";
            const Redes = document.getElementById("Redes");
            Redes.style.display = "none";
            const Conducta = document.getElementById("Conducta");
            Conducta.style.display = "none";
            const Situacion = document.getElementById("Situacion");
            Situacion.style.display = "none";
            const Deudas = document.getElementById("Deudas");
            Deudas.style.display = "none";
            const Entorno = document.getElementById("Entorno");
            Entorno.style.display = "none";
            const Referenciaspersonales = document.getElementById("Referenciaspersonales");
            Referenciaspersonales.style.display = "none";
            const Antecedenteslaborales = document.getElementById("Antecedenteslaborales");
            Antecedenteslaborales.style.display = "none";

            const Salud = document.getElementById("Salud");
            Salud.style.display = "none";
            const Resumen = document.getElementById("Resumen");
            Resumen.style.display = "none";
            const HobbyIntereses = document.getElementById("HobbyIntereses");
            HobbyIntereses.style.display = "none";
            const Beneficiarios = document.getElementById("Beneficiarios");
            Beneficiarios.style.display = "none";
            const NivelAcademico = document.getElementById("NivelAcademico");
            NivelAcademico.style.display = "none";
            const PeriodosnoLaborados = document.getElementById("PeriodosnoLaborados");
            PeriodosnoLaborados.style.display = "";
            const HistorialLaboral = document.getElementById("HistorialLaboral");
            HistorialLaboral.style.display = "none";
            const Despidossalidas = document.getElementById("Despidossalidas");
            Despidossalidas.style.display = "none";
            const Diasincapacidad = document.getElementById("Diasincapacidad");
            Diasincapacidad.style.display = "none";
            const Problemasempleadoractual = document.getElementById("Problemasempleadoractual");
            Problemasempleadoractual.style.display = "none";
            const IncidenciasLegales = document.getElementById("IncidenciasLegales");
            IncidenciasLegales.style.display = "none";
            const CreditosActivosehistorialpago = document.getElementById("CreditosActivosehistorialpago");
            CreditosActivosehistorialpago.style.display = "none";
            const Infonavit = document.getElementById("Infonavit");
            Infonavit.style.display = "none";
            const Serviciomedico = document.getElementById("Serviciomedico");
            Serviciomedico.style.display = "none";
            const documentospresentados = document.getElementById("documentospresentados");
            documentospresentados.style.display = "none";

            const estudiosccep = document.getElementById("estudiosccep");
            estudiosccep.style.display = "none";
            const investigacionesccep = document.getElementById("investigacionesccep");
            investigacionesccep.style.display = "none";
            const entornoccep = document.getElementById("entornoccep");
            entornoccep.style.display = "none";
            const conclucionesccep = document.getElementById("conclucionesccep");
            conclucionesccep.style.display = "none";
        }
        /* Historial Laboral */
        if (seccion == 18) {
            cargaHistorial()
            const Domicilio = document.getElementById("Domicilio");
            Domicilio.style.display = "none";
            const Documentacion = document.getElementById("Documentacion");
            Documentacion.style.display = "none";
            const Estructurafamiliar = document.getElementById("Estructurafamiliar");
            Estructurafamiliar.style.display = "none";
            const Redes = document.getElementById("Redes");
            Redes.style.display = "none";
            const Conducta = document.getElementById("Conducta");
            Conducta.style.display = "none";
            const Situacion = document.getElementById("Situacion");
            Situacion.style.display = "none";
            const Deudas = document.getElementById("Deudas");
            Deudas.style.display = "none";
            const Entorno = document.getElementById("Entorno");
            Entorno.style.display = "none";
            const Referenciaspersonales = document.getElementById("Referenciaspersonales");
            Referenciaspersonales.style.display = "none";
            const Antecedenteslaborales = document.getElementById("Antecedenteslaborales");
            Antecedenteslaborales.style.display = "none";

            const Salud = document.getElementById("Salud");
            Salud.style.display = "none";
            const Resumen = document.getElementById("Resumen");
            Resumen.style.display = "none";
            const HobbyIntereses = document.getElementById("HobbyIntereses");
            HobbyIntereses.style.display = "none";
            const Beneficiarios = document.getElementById("Beneficiarios");
            Beneficiarios.style.display = "none";
            const NivelAcademico = document.getElementById("NivelAcademico");
            NivelAcademico.style.display = "none";
            const PeriodosnoLaborados = document.getElementById("PeriodosnoLaborados");
            PeriodosnoLaborados.style.display = "none";
            const HistorialLaboral = document.getElementById("HistorialLaboral");
            HistorialLaboral.style.display = "";
            const Despidossalidas = document.getElementById("Despidossalidas");
            Despidossalidas.style.display = "none";
            const Diasincapacidad = document.getElementById("Diasincapacidad");
            Diasincapacidad.style.display = "none";
            const Problemasempleadoractual = document.getElementById("Problemasempleadoractual");
            Problemasempleadoractual.style.display = "none";
            const IncidenciasLegales = document.getElementById("IncidenciasLegales");
            IncidenciasLegales.style.display = "none";
            const CreditosActivosehistorialpago = document.getElementById("CreditosActivosehistorialpago");
            CreditosActivosehistorialpago.style.display = "none";
            const Infonavit = document.getElementById("Infonavit");
            Infonavit.style.display = "none";
            const Serviciomedico = document.getElementById("Serviciomedico");
            Serviciomedico.style.display = "none";
           const documentospresentados = document.getElementById("documentospresentados");
            documentospresentados.style.display = "none";

            const estudiosccep = document.getElementById("estudiosccep");
            estudiosccep.style.display = "none";
            const investigacionesccep = document.getElementById("investigacionesccep");
            investigacionesccep.style.display = "none";
            const entornoccep = document.getElementById("entornoccep");
            entornoccep.style.display = "none";
            const conclucionesccep = document.getElementById("conclucionesccep");
            conclucionesccep.style.display = "none";

        }
        /* Despidos/salidas pactadas */
        if (seccion == 19) {
            $('#datatable12 tbody').empty();
            cargaDespidos()
            const Domicilio = document.getElementById("Domicilio");
            Domicilio.style.display = "none";
            const Documentacion = document.getElementById("Documentacion");
            Documentacion.style.display = "none";
            const Estructurafamiliar = document.getElementById("Estructurafamiliar");
            Estructurafamiliar.style.display = "none";
            const Redes = document.getElementById("Redes");
            Redes.style.display = "none";
            const Conducta = document.getElementById("Conducta");
            Conducta.style.display = "none";
            const Situacion = document.getElementById("Situacion");
            Situacion.style.display = "none";
            const Deudas = document.getElementById("Deudas");
            Deudas.style.display = "none";
            const Entorno = document.getElementById("Entorno");
            Entorno.style.display = "none";
            const Referenciaspersonales = document.getElementById("Referenciaspersonales");
            Referenciaspersonales.style.display = "none";
            const Antecedenteslaborales = document.getElementById("Antecedenteslaborales");
            Antecedenteslaborales.style.display = "none";

            const Salud = document.getElementById("Salud");
            Salud.style.display = "none";
            const Resumen = document.getElementById("Resumen");
            Resumen.style.display = "none";
            const HobbyIntereses = document.getElementById("HobbyIntereses");
            HobbyIntereses.style.display = "none";
            const Beneficiarios = document.getElementById("Beneficiarios");
            Beneficiarios.style.display = "none";
            const NivelAcademico = document.getElementById("NivelAcademico");
            NivelAcademico.style.display = "none";
            const PeriodosnoLaborados = document.getElementById("PeriodosnoLaborados");
            PeriodosnoLaborados.style.display = "none";
            const HistorialLaboral = document.getElementById("HistorialLaboral");
            HistorialLaboral.style.display = "none";
            const Despidossalidas = document.getElementById("Despidossalidas");
            Despidossalidas.style.display = "";
            const Diasincapacidad = document.getElementById("Diasincapacidad");
            Diasincapacidad.style.display = "none";
            const Problemasempleadoractual = document.getElementById("Problemasempleadoractual");
            Problemasempleadoractual.style.display = "none";
            const IncidenciasLegales = document.getElementById("IncidenciasLegales");
            IncidenciasLegales.style.display = "none";
            const CreditosActivosehistorialpago = document.getElementById("CreditosActivosehistorialpago");
            CreditosActivosehistorialpago.style.display = "none";
            const Infonavit = document.getElementById("Infonavit");
            Infonavit.style.display = "none";
            const Serviciomedico = document.getElementById("Serviciomedico");
            Serviciomedico.style.display = "none";
           const documentospresentados = document.getElementById("documentospresentados");
            documentospresentados.style.display = "none";

            const estudiosccep = document.getElementById("estudiosccep");
            estudiosccep.style.display = "none";
            const investigacionesccep = document.getElementById("investigacionesccep");
            investigacionesccep.style.display = "none";
            const entornoccep = document.getElementById("entornoccep");
            entornoccep.style.display = "none";
            const conclucionesccep = document.getElementById("conclucionesccep");
            conclucionesccep.style.display = "none";
        }
        /* Días incapacidad */
        if (seccion == 20) {
            $('#datatable10 tbody').empty();
            cargaIncapacidades()
            const Domicilio = document.getElementById("Domicilio");
            Domicilio.style.display = "none";
            const Documentacion = document.getElementById("Documentacion");
            Documentacion.style.display = "none";
            const Estructurafamiliar = document.getElementById("Estructurafamiliar");
            Estructurafamiliar.style.display = "none";
            const Redes = document.getElementById("Redes");
            Redes.style.display = "none";
            const Conducta = document.getElementById("Conducta");
            Conducta.style.display = "none";
            const Situacion = document.getElementById("Situacion");
            Situacion.style.display = "none";
            const Deudas = document.getElementById("Deudas");
            Deudas.style.display = "none";
            const Entorno = document.getElementById("Entorno");
            Entorno.style.display = "none";
            const Referenciaspersonales = document.getElementById("Referenciaspersonales");
            Referenciaspersonales.style.display = "none";
            const Antecedenteslaborales = document.getElementById("Antecedenteslaborales");
            Antecedenteslaborales.style.display = "none";

            const Salud = document.getElementById("Salud");
            Salud.style.display = "none";
            const Resumen = document.getElementById("Resumen");
            Resumen.style.display = "none";
            const HobbyIntereses = document.getElementById("HobbyIntereses");
            HobbyIntereses.style.display = "none";
            const Beneficiarios = document.getElementById("Beneficiarios");
            Beneficiarios.style.display = "none";
            const NivelAcademico = document.getElementById("NivelAcademico");
            NivelAcademico.style.display = "none";
            const PeriodosnoLaborados = document.getElementById("PeriodosnoLaborados");
            PeriodosnoLaborados.style.display = "none";
            const HistorialLaboral = document.getElementById("HistorialLaboral");
            HistorialLaboral.style.display = "none";
            const Despidossalidas = document.getElementById("Despidossalidas");
            Despidossalidas.style.display = "none";
            const Diasincapacidad = document.getElementById("Diasincapacidad");
            Diasincapacidad.style.display = "";
            const Problemasempleadoractual = document.getElementById("Problemasempleadoractual");
            Problemasempleadoractual.style.display = "none";
            const IncidenciasLegales = document.getElementById("IncidenciasLegales");
            IncidenciasLegales.style.display = "none";
            const CreditosActivosehistorialpago = document.getElementById("CreditosActivosehistorialpago");
            CreditosActivosehistorialpago.style.display = "none";
            const Infonavit = document.getElementById("Infonavit");
            Infonavit.style.display = "none";
            const Serviciomedico = document.getElementById("Serviciomedico");
            Serviciomedico.style.display = "none";
           const documentospresentados = document.getElementById("documentospresentados");
            documentospresentados.style.display = "none";

            const estudiosccep = document.getElementById("estudiosccep");
            estudiosccep.style.display = "none";
            const investigacionesccep = document.getElementById("investigacionesccep");
            investigacionesccep.style.display = "none";
            const entornoccep = document.getElementById("entornoccep");
            entornoccep.style.display = "none";
            const conclucionesccep = document.getElementById("conclucionesccep");
            conclucionesccep.style.display = "none";
        }
        /* Problemas empleador actual */
        if (seccion == 21) {
            cargaProblemas()
            const Domicilio = document.getElementById("Domicilio");
            Domicilio.style.display = "none";
            const Documentacion = document.getElementById("Documentacion");
            Documentacion.style.display = "none";
            const Estructurafamiliar = document.getElementById("Estructurafamiliar");
            Estructurafamiliar.style.display = "none";
            const Redes = document.getElementById("Redes");
            Redes.style.display = "none";
            const Conducta = document.getElementById("Conducta");
            Conducta.style.display = "none";
            const Situacion = document.getElementById("Situacion");
            Situacion.style.display = "none";
            const Deudas = document.getElementById("Deudas");
            Deudas.style.display = "none";
            const Entorno = document.getElementById("Entorno");
            Entorno.style.display = "none";
            const Referenciaspersonales = document.getElementById("Referenciaspersonales");
            Referenciaspersonales.style.display = "none";
            const Antecedenteslaborales = document.getElementById("Antecedenteslaborales");
            Antecedenteslaborales.style.display = "none";

            const Salud = document.getElementById("Salud");
            Salud.style.display = "none";
            const Resumen = document.getElementById("Resumen");
            Resumen.style.display = "none";
            const HobbyIntereses = document.getElementById("HobbyIntereses");
            HobbyIntereses.style.display = "none";
            const Beneficiarios = document.getElementById("Beneficiarios");
            Beneficiarios.style.display = "none";
            const NivelAcademico = document.getElementById("NivelAcademico");
            NivelAcademico.style.display = "none";
            const PeriodosnoLaborados = document.getElementById("PeriodosnoLaborados");
            PeriodosnoLaborados.style.display = "none";
            const HistorialLaboral = document.getElementById("HistorialLaboral");
            HistorialLaboral.style.display = "none";
            const Despidossalidas = document.getElementById("Despidossalidas");
            Despidossalidas.style.display = "none";
            const Diasincapacidad = document.getElementById("Diasincapacidad");
            Diasincapacidad.style.display = "none";
            const Problemasempleadoractual = document.getElementById("Problemasempleadoractual");
            Problemasempleadoractual.style.display = "";
            const IncidenciasLegales = document.getElementById("IncidenciasLegales");
            IncidenciasLegales.style.display = "none";
            const CreditosActivosehistorialpago = document.getElementById("CreditosActivosehistorialpago");
            CreditosActivosehistorialpago.style.display = "none";
            const Infonavit = document.getElementById("Infonavit");
            Infonavit.style.display = "none";
            const Serviciomedico = document.getElementById("Serviciomedico");
            Serviciomedico.style.display = "none";
           const documentospresentados = document.getElementById("documentospresentados");
            documentospresentados.style.display = "none";

            const estudiosccep = document.getElementById("estudiosccep");
            estudiosccep.style.display = "none";
            const investigacionesccep = document.getElementById("investigacionesccep");
            investigacionesccep.style.display = "none";
            const entornoccep = document.getElementById("entornoccep");
            entornoccep.style.display = "none";
            const conclucionesccep = document.getElementById("conclucionesccep");
            conclucionesccep.style.display = "none";
        }
        /* Incidencias Legales */
        if (seccion == 22) {
            cargaInfoLab()
            const Domicilio = document.getElementById("Domicilio");
            Domicilio.style.display = "none";
            const Documentacion = document.getElementById("Documentacion");
            Documentacion.style.display = "none";
            const Estructurafamiliar = document.getElementById("Estructurafamiliar");
            Estructurafamiliar.style.display = "none";
            const Redes = document.getElementById("Redes");
            Redes.style.display = "none";
            const Conducta = document.getElementById("Conducta");
            Conducta.style.display = "none";
            const Situacion = document.getElementById("Situacion");
            Situacion.style.display = "none";
            const Deudas = document.getElementById("Deudas");
            Deudas.style.display = "none";
            const Entorno = document.getElementById("Entorno");
            Entorno.style.display = "none";
            const Referenciaspersonales = document.getElementById("Referenciaspersonales");
            Referenciaspersonales.style.display = "none";
            const Antecedenteslaborales = document.getElementById("Antecedenteslaborales");
            Antecedenteslaborales.style.display = "none";

            const Salud = document.getElementById("Salud");
            Salud.style.display = "none";
            const Resumen = document.getElementById("Resumen");
            Resumen.style.display = "none";
            const HobbyIntereses = document.getElementById("HobbyIntereses");
            HobbyIntereses.style.display = "none";
            const Beneficiarios = document.getElementById("Beneficiarios");
            Beneficiarios.style.display = "none";
            const NivelAcademico = document.getElementById("NivelAcademico");
            NivelAcademico.style.display = "none";
            const PeriodosnoLaborados = document.getElementById("PeriodosnoLaborados");
            PeriodosnoLaborados.style.display = "none";
            const HistorialLaboral = document.getElementById("HistorialLaboral");
            HistorialLaboral.style.display = "none";
            const Despidossalidas = document.getElementById("Despidossalidas");
            Despidossalidas.style.display = "none";
            const Diasincapacidad = document.getElementById("Diasincapacidad");
            Diasincapacidad.style.display = "none";
            const Problemasempleadoractual = document.getElementById("Problemasempleadoractual");
            Problemasempleadoractual.style.display = "none";
            const IncidenciasLegales = document.getElementById("IncidenciasLegales");
            IncidenciasLegales.style.display = "";
            const CreditosActivosehistorialpago = document.getElementById("CreditosActivosehistorialpago");
            CreditosActivosehistorialpago.style.display = "none";
            const Infonavit = document.getElementById("Infonavit");
            Infonavit.style.display = "none";
            const Serviciomedico = document.getElementById("Serviciomedico");
            Serviciomedico.style.display = "none";
           const documentospresentados = document.getElementById("documentospresentados");
            documentospresentados.style.display = "none";

            const estudiosccep = document.getElementById("estudiosccep");
            estudiosccep.style.display = "none";
            const investigacionesccep = document.getElementById("investigacionesccep");
            investigacionesccep.style.display = "none";
            const entornoccep = document.getElementById("entornoccep");
            entornoccep.style.display = "none";
            const conclucionesccep = document.getElementById("conclucionesccep");
            conclucionesccep.style.display = "none";
        }
        /* Creditos Activos e historial pago */
        if (seccion == 23) {
            $('#datatable11 tbody').empty();
            cargaCreditos()
            const Domicilio = document.getElementById("Domicilio");
            Domicilio.style.display = "none";
            const Documentacion = document.getElementById("Documentacion");
            Documentacion.style.display = "none";
            const Estructurafamiliar = document.getElementById("Estructurafamiliar");
            Estructurafamiliar.style.display = "none";
            const Redes = document.getElementById("Redes");
            Redes.style.display = "none";
            const Conducta = document.getElementById("Conducta");
            Conducta.style.display = "none";
            const Situacion = document.getElementById("Situacion");
            Situacion.style.display = "none";
            const Deudas = document.getElementById("Deudas");
            Deudas.style.display = "none";
            const Entorno = document.getElementById("Entorno");
            Entorno.style.display = "none";
            const Referenciaspersonales = document.getElementById("Referenciaspersonales");
            Referenciaspersonales.style.display = "none";
            const Antecedenteslaborales = document.getElementById("Antecedenteslaborales");
            Antecedenteslaborales.style.display = "none";

            const Salud = document.getElementById("Salud");
            Salud.style.display = "none";
            const Resumen = document.getElementById("Resumen");
            Resumen.style.display = "none";
            const HobbyIntereses = document.getElementById("HobbyIntereses");
            HobbyIntereses.style.display = "none";
            const Beneficiarios = document.getElementById("Beneficiarios");
            Beneficiarios.style.display = "none";
            const NivelAcademico = document.getElementById("NivelAcademico");
            NivelAcademico.style.display = "none";
            const PeriodosnoLaborados = document.getElementById("PeriodosnoLaborados");
            PeriodosnoLaborados.style.display = "none";
            const HistorialLaboral = document.getElementById("HistorialLaboral");
            HistorialLaboral.style.display = "none";
            const Despidossalidas = document.getElementById("Despidossalidas");
            Despidossalidas.style.display = "none";
            const Diasincapacidad = document.getElementById("Diasincapacidad");
            Diasincapacidad.style.display = "none";
            const Problemasempleadoractual = document.getElementById("Problemasempleadoractual");
            Problemasempleadoractual.style.display = "none";
            const IncidenciasLegales = document.getElementById("IncidenciasLegales");
            IncidenciasLegales.style.display = "none";
            const CreditosActivosehistorialpago = document.getElementById("CreditosActivosehistorialpago");
            CreditosActivosehistorialpago.style.display = "";
            const Infonavit = document.getElementById("Infonavit");
            Infonavit.style.display = "none";
            const Serviciomedico = document.getElementById("Serviciomedico");
            Serviciomedico.style.display = "none";
           const documentospresentados = document.getElementById("documentospresentados");
            documentospresentados.style.display = "none";

            const estudiosccep = document.getElementById("estudiosccep");
            estudiosccep.style.display = "none";
            const investigacionesccep = document.getElementById("investigacionesccep");
            investigacionesccep.style.display = "none";
            const entornoccep = document.getElementById("entornoccep");
            entornoccep.style.display = "none";
            const conclucionesccep = document.getElementById("conclucionesccep");
            conclucionesccep.style.display = "none";
        }
        /* Infonavit */
        if (seccion == 24) {
            cargaInfonaviot()
            const Domicilio = document.getElementById("Domicilio");
            Domicilio.style.display = "none";
            const Documentacion = document.getElementById("Documentacion");
            Documentacion.style.display = "none";
            const Estructurafamiliar = document.getElementById("Estructurafamiliar");
            Estructurafamiliar.style.display = "none";
            const Redes = document.getElementById("Redes");
            Redes.style.display = "none";
            const Conducta = document.getElementById("Conducta");
            Conducta.style.display = "none";
            const Situacion = document.getElementById("Situacion");
            Situacion.style.display = "none";
            const Deudas = document.getElementById("Deudas");
            Deudas.style.display = "none";
            const Entorno = document.getElementById("Entorno");
            Entorno.style.display = "none";
            const Referenciaspersonales = document.getElementById("Referenciaspersonales");
            Referenciaspersonales.style.display = "none";
            const Antecedenteslaborales = document.getElementById("Antecedenteslaborales");
            Antecedenteslaborales.style.display = "none";

            const Salud = document.getElementById("Salud");
            Salud.style.display = "none";
            const Resumen = document.getElementById("Resumen");
            Resumen.style.display = "none";
            const HobbyIntereses = document.getElementById("HobbyIntereses");
            HobbyIntereses.style.display = "none";
            const Beneficiarios = document.getElementById("Beneficiarios");
            Beneficiarios.style.display = "none";
            const NivelAcademico = document.getElementById("NivelAcademico");
            NivelAcademico.style.display = "none";
            const PeriodosnoLaborados = document.getElementById("PeriodosnoLaborados");
            PeriodosnoLaborados.style.display = "none";
            const HistorialLaboral = document.getElementById("HistorialLaboral");
            HistorialLaboral.style.display = "none";
            const Despidossalidas = document.getElementById("Despidossalidas");
            Despidossalidas.style.display = "none";
            const Diasincapacidad = document.getElementById("Diasincapacidad");
            Diasincapacidad.style.display = "none";
            const Problemasempleadoractual = document.getElementById("Problemasempleadoractual");
            Problemasempleadoractual.style.display = "none";
            const IncidenciasLegales = document.getElementById("IncidenciasLegales");
            IncidenciasLegales.style.display = "none";
            const CreditosActivosehistorialpago = document.getElementById("CreditosActivosehistorialpago");
            CreditosActivosehistorialpago.style.display = "none";
            const Infonavit = document.getElementById("Infonavit");
            Infonavit.style.display = "";
            const Serviciomedico = document.getElementById("Serviciomedico");
            Serviciomedico.style.display = "none";
           const documentospresentados = document.getElementById("documentospresentados");
            documentospresentados.style.display = "none";

            const estudiosccep = document.getElementById("estudiosccep");
            estudiosccep.style.display = "none";
            const investigacionesccep = document.getElementById("investigacionesccep");
            investigacionesccep.style.display = "none";
            const entornoccep = document.getElementById("entornoccep");
            entornoccep.style.display = "none";
            const conclucionesccep = document.getElementById("conclucionesccep");
            conclucionesccep.style.display = "none";
        }
        /* Servicio médico */
        if (seccion == 25) {
            cargaServicioMedico()
            const Domicilio = document.getElementById("Domicilio");
            Domicilio.style.display = "none";
            const Documentacion = document.getElementById("Documentacion");
            Documentacion.style.display = "none";
            const Estructurafamiliar = document.getElementById("Estructurafamiliar");
            Estructurafamiliar.style.display = "none";
            const Redes = document.getElementById("Redes");
            Redes.style.display = "none";
            const Conducta = document.getElementById("Conducta");
            Conducta.style.display = "none";
            const Situacion = document.getElementById("Situacion");
            Situacion.style.display = "none";
            const Deudas = document.getElementById("Deudas");
            Deudas.style.display = "none";
            const Entorno = document.getElementById("Entorno");
            Entorno.style.display = "none";
            const Referenciaspersonales = document.getElementById("Referenciaspersonales");
            Referenciaspersonales.style.display = "none";
            const Antecedenteslaborales = document.getElementById("Antecedenteslaborales");
            Antecedenteslaborales.style.display = "none";

            const Salud = document.getElementById("Salud");
            Salud.style.display = "none";
            const Resumen = document.getElementById("Resumen");
            Resumen.style.display = "none";
            const HobbyIntereses = document.getElementById("HobbyIntereses");
            HobbyIntereses.style.display = "none";
            const Beneficiarios = document.getElementById("Beneficiarios");
            Beneficiarios.style.display = "none";
            const NivelAcademico = document.getElementById("NivelAcademico");
            NivelAcademico.style.display = "none";
            const PeriodosnoLaborados = document.getElementById("PeriodosnoLaborados");
            PeriodosnoLaborados.style.display = "none";
            const HistorialLaboral = document.getElementById("HistorialLaboral");
            HistorialLaboral.style.display = "none";
            const Despidossalidas = document.getElementById("Despidossalidas");
            Despidossalidas.style.display = "none";
            const Diasincapacidad = document.getElementById("Diasincapacidad");
            Diasincapacidad.style.display = "none";
            const Problemasempleadoractual = document.getElementById("Problemasempleadoractual");
            Problemasempleadoractual.style.display = "none";
            const IncidenciasLegales = document.getElementById("IncidenciasLegales");
            IncidenciasLegales.style.display = "none";
            const CreditosActivosehistorialpago = document.getElementById("CreditosActivosehistorialpago");
            CreditosActivosehistorialpago.style.display = "none";
            const Infonavit = document.getElementById("Infonavit");
            Infonavit.style.display = "none";
            const Serviciomedico = document.getElementById("Serviciomedico");
            Serviciomedico.style.display = ""
           const documentospresentados = document.getElementById("documentospresentados");
            documentospresentados.style.display = "none";

            const estudiosccep = document.getElementById("estudiosccep");
            estudiosccep.style.display = "none";
            const investigacionesccep = document.getElementById("investigacionesccep");
            investigacionesccep.style.display = "none";
            const entornoccep = document.getElementById("entornoccep");
            entornoccep.style.display = "none";
            const conclucionesccep = document.getElementById("conclucionesccep");
            conclucionesccep.style.display = "none";
        }
        /* documentos presentados */
        if (seccion == 26) {
            cargadp()
            const Domicilio = document.getElementById("Domicilio");
            Domicilio.style.display = "none";
            const Documentacion = document.getElementById("Documentacion");
            Documentacion.style.display = "none";
            const Estructurafamiliar = document.getElementById("Estructurafamiliar");
            Estructurafamiliar.style.display = "none";
            const Redes = document.getElementById("Redes");
            Redes.style.display = "none";
            const Conducta = document.getElementById("Conducta");
            Conducta.style.display = "none";
            const Situacion = document.getElementById("Situacion");
            Situacion.style.display = "none";
            const Deudas = document.getElementById("Deudas");
            Deudas.style.display = "none";
            const Entorno = document.getElementById("Entorno");
            Entorno.style.display = "none";
            const Referenciaspersonales = document.getElementById("Referenciaspersonales");
            Referenciaspersonales.style.display = "none";
            const Antecedenteslaborales = document.getElementById("Antecedenteslaborales");
            Antecedenteslaborales.style.display = "none";

            const Salud = document.getElementById("Salud");
            Salud.style.display = "none";
            const Resumen = document.getElementById("Resumen");
            Resumen.style.display = "none";
            const HobbyIntereses = document.getElementById("HobbyIntereses");
            HobbyIntereses.style.display = "none";
            const Beneficiarios = document.getElementById("Beneficiarios");
            Beneficiarios.style.display = "none";
            const NivelAcademico = document.getElementById("NivelAcademico");
            NivelAcademico.style.display = "none";
            const PeriodosnoLaborados = document.getElementById("PeriodosnoLaborados");
            PeriodosnoLaborados.style.display = "none";
            const HistorialLaboral = document.getElementById("HistorialLaboral");
            HistorialLaboral.style.display = "none";
            const Despidossalidas = document.getElementById("Despidossalidas");
            Despidossalidas.style.display = "none";
            const Diasincapacidad = document.getElementById("Diasincapacidad");
            Diasincapacidad.style.display = "none";
            const Problemasempleadoractual = document.getElementById("Problemasempleadoractual");
            Problemasempleadoractual.style.display = "none";
            const IncidenciasLegales = document.getElementById("IncidenciasLegales");
            IncidenciasLegales.style.display = "none";
            const CreditosActivosehistorialpago = document.getElementById("CreditosActivosehistorialpago");
            CreditosActivosehistorialpago.style.display = "none";
            const Infonavit = document.getElementById("Infonavit");
            Infonavit.style.display = "none";
            const Serviciomedico = document.getElementById("Serviciomedico");
            Serviciomedico.style.display = "none";
            const documentospresentados = document.getElementById("documentospresentados");
            documentospresentados.style.display = ""

            const estudiosccep = document.getElementById("estudiosccep");
            estudiosccep.style.display = "none";
            const investigacionesccep = document.getElementById("investigacionesccep");
            investigacionesccep.style.display = "none";
            const entornoccep = document.getElementById("entornoccep");
            entornoccep.style.display = "none";
            const conclucionesccep = document.getElementById("conclucionesccep");
            conclucionesccep.style.display = "none";
        }
        /* estudios */
        if (seccion == 27) {
            cargaGrados()
            const Domicilio = document.getElementById("Domicilio");
            Domicilio.style.display = "none";
            const Documentacion = document.getElementById("Documentacion");
            Documentacion.style.display = "none";
            const Estructurafamiliar = document.getElementById("Estructurafamiliar");
            Estructurafamiliar.style.display = "none";
            const Redes = document.getElementById("Redes");
            Redes.style.display = "none";
            const Conducta = document.getElementById("Conducta");
            Conducta.style.display = "none";
            const Situacion = document.getElementById("Situacion");
            Situacion.style.display = "none";
            const Deudas = document.getElementById("Deudas");
            Deudas.style.display = "none";
            const Entorno = document.getElementById("Entorno");
            Entorno.style.display = "none";
            const Referenciaspersonales = document.getElementById("Referenciaspersonales");
            Referenciaspersonales.style.display = "none";
            const Antecedenteslaborales = document.getElementById("Antecedenteslaborales");
            Antecedenteslaborales.style.display = "none";

            const Salud = document.getElementById("Salud");
            Salud.style.display = "none";
            const Resumen = document.getElementById("Resumen");
            Resumen.style.display = "none";
            const HobbyIntereses = document.getElementById("HobbyIntereses");
            HobbyIntereses.style.display = "none";
            const Beneficiarios = document.getElementById("Beneficiarios");
            Beneficiarios.style.display = "none";
            const NivelAcademico = document.getElementById("NivelAcademico");
            NivelAcademico.style.display = "none";
            const PeriodosnoLaborados = document.getElementById("PeriodosnoLaborados");
            PeriodosnoLaborados.style.display = "none";
            const HistorialLaboral = document.getElementById("HistorialLaboral");
            HistorialLaboral.style.display = "none";
            const Despidossalidas = document.getElementById("Despidossalidas");
            Despidossalidas.style.display = "none";
            const Diasincapacidad = document.getElementById("Diasincapacidad");
            Diasincapacidad.style.display = "none";
            const Problemasempleadoractual = document.getElementById("Problemasempleadoractual");
            Problemasempleadoractual.style.display = "none";
            const IncidenciasLegales = document.getElementById("IncidenciasLegales");
            IncidenciasLegales.style.display = "none";
            const CreditosActivosehistorialpago = document.getElementById("CreditosActivosehistorialpago");
            CreditosActivosehistorialpago.style.display = "none";
            const Infonavit = document.getElementById("Infonavit");
            Infonavit.style.display = "none";
            const Serviciomedico = document.getElementById("Serviciomedico");
            Serviciomedico.style.display = "none";
            const documentospresentados = document.getElementById("documentospresentados");
            documentospresentados.style.display = "none"

            const estudiosccep = document.getElementById("estudiosccep");
            estudiosccep.style.display = "";
            const investigacionesccep = document.getElementById("investigacionesccep");
            investigacionesccep.style.display = "none";
            const entornoccep = document.getElementById("entornoccep");
            entornoccep.style.display = "none";
            const conclucionesccep = document.getElementById("conclucionesccep");
            conclucionesccep.style.display = "none";
        }
        /* investigaciones */
        if (seccion == 28) {
            cargoInvestigaciones()
            const Domicilio = document.getElementById("Domicilio");
            Domicilio.style.display = "none";
            const Documentacion = document.getElementById("Documentacion");
            Documentacion.style.display = "none";
            const Estructurafamiliar = document.getElementById("Estructurafamiliar");
            Estructurafamiliar.style.display = "none";
            const Redes = document.getElementById("Redes");
            Redes.style.display = "none";
            const Conducta = document.getElementById("Conducta");
            Conducta.style.display = "none";
            const Situacion = document.getElementById("Situacion");
            Situacion.style.display = "none";
            const Deudas = document.getElementById("Deudas");
            Deudas.style.display = "none";
            const Entorno = document.getElementById("Entorno");
            Entorno.style.display = "none";
            const Referenciaspersonales = document.getElementById("Referenciaspersonales");
            Referenciaspersonales.style.display = "none";
            const Antecedenteslaborales = document.getElementById("Antecedenteslaborales");
            Antecedenteslaborales.style.display = "none";

            const Salud = document.getElementById("Salud");
            Salud.style.display = "none";
            const Resumen = document.getElementById("Resumen");
            Resumen.style.display = "none";
            const HobbyIntereses = document.getElementById("HobbyIntereses");
            HobbyIntereses.style.display = "none";
            const Beneficiarios = document.getElementById("Beneficiarios");
            Beneficiarios.style.display = "none";
            const NivelAcademico = document.getElementById("NivelAcademico");
            NivelAcademico.style.display = "none";
            const PeriodosnoLaborados = document.getElementById("PeriodosnoLaborados");
            PeriodosnoLaborados.style.display = "none";
            const HistorialLaboral = document.getElementById("HistorialLaboral");
            HistorialLaboral.style.display = "none";
            const Despidossalidas = document.getElementById("Despidossalidas");
            Despidossalidas.style.display = "none";
            const Diasincapacidad = document.getElementById("Diasincapacidad");
            Diasincapacidad.style.display = "none";
            const Problemasempleadoractual = document.getElementById("Problemasempleadoractual");
            Problemasempleadoractual.style.display = "none";
            const IncidenciasLegales = document.getElementById("IncidenciasLegales");
            IncidenciasLegales.style.display = "none";
            const CreditosActivosehistorialpago = document.getElementById("CreditosActivosehistorialpago");
            CreditosActivosehistorialpago.style.display = "none";
            const Infonavit = document.getElementById("Infonavit");
            Infonavit.style.display = "none";
            const Serviciomedico = document.getElementById("Serviciomedico");
            Serviciomedico.style.display = "none";
            const documentospresentados = document.getElementById("documentospresentados");
            documentospresentados.style.display = "none"

            const estudiosccep = document.getElementById("estudiosccep");
            estudiosccep.style.display = "none";
            const investigacionesccep = document.getElementById("investigacionesccep");
            investigacionesccep.style.display = "";
            const entornoccep = document.getElementById("entornoccep");
            entornoccep.style.display = "none";
            const conclucionesccep = document.getElementById("conclucionesccep");
            conclucionesccep.style.display = "none";
        }
        /* entorno */
        if (seccion == 29) {
            cargoEntorno()
            const Domicilio = document.getElementById("Domicilio");
            Domicilio.style.display = "none";
            const Documentacion = document.getElementById("Documentacion");
            Documentacion.style.display = "none";
            const Estructurafamiliar = document.getElementById("Estructurafamiliar");
            Estructurafamiliar.style.display = "none";
            const Redes = document.getElementById("Redes");
            Redes.style.display = "none";
            const Conducta = document.getElementById("Conducta");
            Conducta.style.display = "none";
            const Situacion = document.getElementById("Situacion");
            Situacion.style.display = "none";
            const Deudas = document.getElementById("Deudas");
            Deudas.style.display = "none";
            const Entorno = document.getElementById("Entorno");
            Entorno.style.display = "none";
            const Referenciaspersonales = document.getElementById("Referenciaspersonales");
            Referenciaspersonales.style.display = "none";
            const Antecedenteslaborales = document.getElementById("Antecedenteslaborales");
            Antecedenteslaborales.style.display = "none";

            const Salud = document.getElementById("Salud");
            Salud.style.display = "none";
            const Resumen = document.getElementById("Resumen");
            Resumen.style.display = "none";
            const HobbyIntereses = document.getElementById("HobbyIntereses");
            HobbyIntereses.style.display = "none";
            const Beneficiarios = document.getElementById("Beneficiarios");
            Beneficiarios.style.display = "none";
            const NivelAcademico = document.getElementById("NivelAcademico");
            NivelAcademico.style.display = "none";
            const PeriodosnoLaborados = document.getElementById("PeriodosnoLaborados");
            PeriodosnoLaborados.style.display = "none";
            const HistorialLaboral = document.getElementById("HistorialLaboral");
            HistorialLaboral.style.display = "none";
            const Despidossalidas = document.getElementById("Despidossalidas");
            Despidossalidas.style.display = "none";
            const Diasincapacidad = document.getElementById("Diasincapacidad");
            Diasincapacidad.style.display = "none";
            const Problemasempleadoractual = document.getElementById("Problemasempleadoractual");
            Problemasempleadoractual.style.display = "none";
            const IncidenciasLegales = document.getElementById("IncidenciasLegales");
            IncidenciasLegales.style.display = "none";
            const CreditosActivosehistorialpago = document.getElementById("CreditosActivosehistorialpago");
            CreditosActivosehistorialpago.style.display = "none";
            const Infonavit = document.getElementById("Infonavit");
            Infonavit.style.display = "none";
            const Serviciomedico = document.getElementById("Serviciomedico");
            Serviciomedico.style.display = "none";
            const documentospresentados = document.getElementById("documentospresentados");
            documentospresentados.style.display = "none"

            const estudiosccep = document.getElementById("estudiosccep");
            estudiosccep.style.display = "none";
            const investigacionesccep = document.getElementById("investigacionesccep");
            investigacionesccep.style.display = "none";
            const entornoccep = document.getElementById("entornoccep");
            entornoccep.style.display = "";
            const conclucionesccep = document.getElementById("conclucionesccep");
            conclucionesccep.style.display = "none";
        }
        /* concluciones */
        if (seccion == 30) {
            cargaConcluciones()
            const Domicilio = document.getElementById("Domicilio");
            Domicilio.style.display = "none";
            const Documentacion = document.getElementById("Documentacion");
            Documentacion.style.display = "none";
            const Estructurafamiliar = document.getElementById("Estructurafamiliar");
            Estructurafamiliar.style.display = "none";
            const Redes = document.getElementById("Redes");
            Redes.style.display = "none";
            const Conducta = document.getElementById("Conducta");
            Conducta.style.display = "none";
            const Situacion = document.getElementById("Situacion");
            Situacion.style.display = "none";
            const Deudas = document.getElementById("Deudas");
            Deudas.style.display = "none";
            const Entorno = document.getElementById("Entorno");
            Entorno.style.display = "none";
            const Referenciaspersonales = document.getElementById("Referenciaspersonales");
            Referenciaspersonales.style.display = "none";
            const Antecedenteslaborales = document.getElementById("Antecedenteslaborales");
            Antecedenteslaborales.style.display = "none";

            const Salud = document.getElementById("Salud");
            Salud.style.display = "none";
            const Resumen = document.getElementById("Resumen");
            Resumen.style.display = "none";
            const HobbyIntereses = document.getElementById("HobbyIntereses");
            HobbyIntereses.style.display = "none";
            const Beneficiarios = document.getElementById("Beneficiarios");
            Beneficiarios.style.display = "none";
            const NivelAcademico = document.getElementById("NivelAcademico");
            NivelAcademico.style.display = "none";
            const PeriodosnoLaborados = document.getElementById("PeriodosnoLaborados");
            PeriodosnoLaborados.style.display = "none";
            const HistorialLaboral = document.getElementById("HistorialLaboral");
            HistorialLaboral.style.display = "none";
            const Despidossalidas = document.getElementById("Despidossalidas");
            Despidossalidas.style.display = "none";
            const Diasincapacidad = document.getElementById("Diasincapacidad");
            Diasincapacidad.style.display = "none";
            const Problemasempleadoractual = document.getElementById("Problemasempleadoractual");
            Problemasempleadoractual.style.display = "none";
            const IncidenciasLegales = document.getElementById("IncidenciasLegales");
            IncidenciasLegales.style.display = "none";
            const CreditosActivosehistorialpago = document.getElementById("CreditosActivosehistorialpago");
            CreditosActivosehistorialpago.style.display = "none";
            const Infonavit = document.getElementById("Infonavit");
            Infonavit.style.display = "none";
            const Serviciomedico = document.getElementById("Serviciomedico");
            Serviciomedico.style.display = "none";
            const documentospresentados = document.getElementById("documentospresentados");
            documentospresentados.style.display = "none"

            const estudiosccep = document.getElementById("estudiosccep");
            estudiosccep.style.display = "none";
            const investigacionesccep = document.getElementById("investigacionesccep");
            investigacionesccep.style.display = "none";
            const entornoccep = document.getElementById("entornoccep");
            entornoccep.style.display = "none";
            const conclucionesccep = document.getElementById("conclucionesccep");
            conclucionesccep.style.display = "";
        }

    }
    /* /////////////////////////////////////////////////////////// */

    /* /////////////////////////////////////////////////////////// */
    /* FUNCIONES */
    /* /////////////////////////////////////////////////////////// */

    /* funcion para cancelar estudio */
    function cancelarEstudioCliente(id){
        document.getElementById('idEstudioCancelar').value = id
        $('#modalCancelar').modal('show');
    }

    $('#btnCanclear').click(function(e) {
        e.preventDefault();
        var formData = {
            id: $('#idEstudioCancelar').val(),
            motivoCancelacion: $('#motivoCancelacion').val(),
        };

        const id = $('#idEstudioCancelar').val();

        console.log(id)

        $.ajax({
            url: `/estudio/canceCliente/${id}`,
            method: 'POST',
            data: formData,
          /*  processData: false, // Necesario para evitar que jQuery procese los datos
            contentType: false, */
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')  },
            success: function(response) {
                $('#modalCancelar').modal('hide');
                const div = document.getElementById('alerta');
                div.style.display = 'block';
                window.location.href = '/estudios';
            },
            error: function(response) { alert('Error al cancelar estudio.'); }
        });
    });

    /* funcion para termianr estudio */
    function terminarEstudio(id){
        document.getElementById('idEstudioTerminar').value = id
        $('#modalterminar').modal('show');
    }

    $('#btnTerminar').click(function(e) {
        e.preventDefault();
        var formData = {
            id: $('#idEstudioTerminar').val(),
        };

        const id = $('#idEstudioTerminar').val();

        console.log(id)

        $.ajax({
            url: `/estudio/terminarEstudio/${id}`,
            method: 'POST',
            data: formData,
          /*  processData: false, // Necesario para evitar que jQuery procese los datos
            contentType: false, */
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')  },
            success: function(response) {
                $('#modalterminar').modal('hide');
                const div = document.getElementById('alerta');
                div.style.display = 'block';
                window.location.href = '/estudios';
            },
            error: function(response) { alert('Error al cancelar estudio.'); }
        });
    });

    /* funcion para activar o desactivar los documentos */
    function verActivar(id,valor){

        var formData = {
            valor: valor,
            id: id,
        };

        const idvalor = id;

        $.ajax({
            url: `/estudio/verdocumen/${idvalor}`,
            method: 'POST',
            data: formData,
          /*  processData: false, // Necesario para evitar que jQuery procese los datos
            contentType: false, */
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')  },
            success: function(response) {
                const div = document.getElementById('alerta');
                div.style.display = 'block';
                setTimeout(() => { location.reload(); }, 1000);
            },
            error: function(response) { alert('Error al cancelar estudio.'); }
        });
    }

    /* funcion para editar la informacion */
    $('#btnEditar').click(function(e) {
        e.preventDefault(); // Previene el envío normal del formulario
        /* var formData = $(this).serialize(); */ // Obtiene los datos del formulario

        var formData = {

                idUsuario: $('#idUsuario').val(),
                idEmpresa: $('#idEmpresa').val(),
                nombreCandidato: $('#nombreCandidato').val(),
                apePaterno: $('#apePaterno').val(),
                apeMaterno: $('#apeMaterno').val(),
                puesto: $('#puesto').val(),
                fechaSolicitud: $('#fechaSolicitud').val(),
                rfc: $('#rfc').val(),
                curp: $('#curp').val(),
                archivo: $('#outputBase64f').val(),
                encuestador: $('#encuestador').val(),
                fechaCita: $('#fechaCita').val(),
                nss: $('#nss').val(),
                tiposervicio: $('#tiposervicio').val(),
                telefono: $('#telefono').val(),
                correo: $('#correo').val(),
                sexo: $('#sexo').val(),
                edad: $('#edad').val(),
                estadoCivil: $('#estadoCivil').val(),
                lugarNacimiento: $('#lugarNacimiento').val(),
                fechaNacimiento: $('#fechaNacimiento').val(),
                escolaridad: $('#escolaridad').val(),
                hijos: $('#hijos').val(),
                nacionalidad: $('#nacionalidad').val(),
                viveCon: $('#viveCon').val(),
                direccion: $('#direccion').val(),
                celular: $('#celular').val(),
                otroContacto: $('#otroContacto').val(),
                infonavit: $('#infonavit').val(),
                fonacot: $('#fonacot').val(),
                cv: $('#outputBase64c').val(),
                clincaImss: $('#clincaImss').val(),
                realizo: $('#realizo').val(),
                idEmpresa: $('#idEmpresa').val(),

            };
        let idUsu = document.getElementById("idEstudioEdi").value;
        $.ajax({
            url: `/estudio/editaEstudioCliente/${idUsu}`,
            method: 'POST',
            data: formData,
           /*  processData: false, // Necesario para evitar que jQuery procese los datos
            contentType: false, */
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')  },
            success: function(response) {
                const div = document.getElementById('alerta');
                div.style.display = 'block';
                setTimeout(() => { location.reload(); }, 1000);
            },
            error: function(response) { alert('Error al crear la empresa.'); }
        });
    });

    /* DOMICILIO */
    /* funcion para editar domicilio */
    $('#btnDomicilio').click(function(e) {
        e.preventDefault(); // Previene el envío normal del formulario
        /* var formData = $(this).serialize(); */ // Obtiene los datos del formulario

        var formData = {

            calle: $('#calle').val(),
            numero: $('#numero').val(),
            colonia: $('#colonia').val(),
            delegacionMunicipio: $('#delegacionMunicipio').val(),
            ciudad: $('#ciudad').val(),
            estado: $('#estado').val(),
            cp: $('#cp').val(),
            tiempoResindir: $('#tiempoResindir').val(),
            tel1: $('#tel1').val(),
            tel2: $('#tel2').val(),
            cel1: $('#cel1').val(),
            cel2: $('#cel2').val(),

        };

        if ($('#idEstudioEdi').val() != "") {
            formData.idEstudio = $('#idEstudioEdi').val();
        }

        if ($('#idDomiciliot').val() != "") {
            formData.id = $('#idDomiciliot').val();
        }


        let idDomiciliot = document.getElementById("idDomiciliot").value;

        if(idDomiciliot != ''){
            $.ajax({
                url: `/domicilio/editar/${idDomiciliot}`,
                method: 'GET',
                data: formData,
            /*  processData: false, // Necesario para evitar que jQuery procese los datos
                contentType: false, */
                headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')  },
                success: function(response) {
                    const div = document.getElementById('alerta');
                    div.style.display = 'block';
                },
                error: function(response) { alert('Error al crear la empresa.'); }
            });
        }
        else{
            console.log("entro a crear")
            $.ajax({
                url: `/domicilio/crear`,
                method: 'POST',
                data: formData,
            /*  processData: false, // Necesario para evitar que jQuery procese los datos
                contentType: false, */
                headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')  },
                success: function(response) {
                    const div = document.getElementById('alerta');
                    div.style.display = 'block';
                },
                error: function(response) { alert('Error al crear la empresa.'); }
            });
        }

    });

    /* DOCUMENTOS */
    /* funcion par agregar documentos */
    $('#btndocumentos').click(function(e) {
        e.preventDefault(); // Previene el envío normal del formulario
        /* var formData = $(this).serialize(); */ // Obtiene los datos del formulario

        var formData = {
            titulo: $('#titulo').val(),
            folio: $('#folio').val(),
            observaciones: $('#observaciones').val(),
            archivo: $('#outputBase64docu').val()
        };

        if ($('#idEstudioEdi').val() != "") { formData.idEstudio = $('#idEstudioEdi').val(); }
        /* valor de id de la seccion */
        if ($('#idDocumento').val() != "") { formData.id = $('#idDocumento').val(); }


        let idDocumento = document.getElementById("idDocumento").value;

        if(idDocumento != ''){
            $.ajax({
                url: `/documentos/editar/${idDocumento}`,
                method: 'GET',
                data: formData,
                headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')  },
                success: function(response) {
                    const div = document.getElementById('alerta');
                    div.style.display = 'block';
                    const tabla = $('#datatable1').DataTable();
                    tabla.destroy(); // Destruye la instancia del DataTable
                    $('#datatable1 tbody').empty(); // Limpia las filas de la tabla
                    /* limpiamos los valores */
                    $('#titulo').val('')
                    $('#folio').val('')
                    $('#observaciones').val('')
                    $('#archivoDocument').val('')
                    $('#datatable1 tbody').empty(); // Limpia las filas de la tabla
                    cargarDocumentos()
                },
                error: function(response) { alert('Error al crear la empresa.'); }
            });
        }
        else{

            $.ajax({
                url: `/documentos/crear`,
                method: 'POST',
                data: formData,
                headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')  },
                success: function(response) {
                    const div = document.getElementById('alerta');
                    div.style.display = 'block';
                    const tabla = $('#datatable1').DataTable();
                    tabla.destroy(); // Destruye la instancia del DataTable
                    $('#datatable1 tbody').empty(); // Limpia las filas de la tabla
                    /* limpiamos los valores */
                    $('#titulo').val('')
                    $('#folio').val('')
                    $('#observaciones').val('')
                    $('#archivoDocument').val('')
                    /* traemos los valores */
                    cargarDocumentos()
                },
                error: function(response) { alert('Error al crear la empresa.'); }
            });
        }


    });
    /* funcion para eliminar documentos, */
    function eliDocumento(id){
        $.ajax({
            url: `/documentos/eliminar/${id}`,
            method: 'DELETE',
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')  },
            success: function(response) {
                const div = document.getElementById('alerta');
                div.style.display = 'block';
                const tabla = $('#datatable1').DataTable();
                tabla.destroy(); // Destruye la instancia del DataTable
                $('#datatable1 tbody').empty(); // Limpia las filas de la tabla
                cargarDocumentos()
            },
            error: function(response) { alert('Error al crear la empresa.'); }
        });

    }
    /* funcion para editar el documento */
    function veoEditoDoc(id,titulo,folio,observaciones){
        document.getElementById('idDocumento').value = id
        document.getElementById('titulo').value =titulo
        document.getElementById('folio').value =folio
        document.getElementById('observaciones').value =observaciones

    }

    /* ESTRUCTURA FAMILIAR */
    /* funcion par agregar editar documentos */
    $('#btnEstructuraFamilair').click(function(e) {
        e.preventDefault(); // Previene el envío normal del formulario
        /* var formData = $(this).serialize(); */ // Obtiene los datos del formulario

        var formData = {
            familiar: $('#familiaress').val(),
            ocupacion: $('#ocupaciones').val(),
            edad: $('#edades').val(),
            laboraEstudia: $('#laboraEstudiaes').val(),
            tiempoReside: $('#tiempoResidees').val(),
            calle: $('#callees').val(),
            numero: $('#numeroes').val(),
            cpde: $('#cpdees').val(),
            colonia: $('#coloniaes').val(),
            delegacionMunicipio: $('#delegacionMunicipioes').val(),
            ciudad: $('#ciudadess').val(),
            estado: $('#estadoes').val(),
            tel1: $('#tel1es').val()
        };

        if ($('#idEstudioEdi').val() != "") { formData.idEstudio = $('#idEstudioEdi').val(); }
        /* valor de id de la seccion */
        if ($('#idEstructura').val() != "") { formData.id = $('#idEstructura').val(); }


        let idDocumento = document.getElementById("idEstructura").value;

        if(idDocumento != ''){
            $.ajax({
                url: `/estructura/editar/${idDocumento}`,
                method: 'POST',
                data: formData,
                headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')  },
                success: function(response) {
                    const div = document.getElementById('alerta');
                    div.style.display = 'block';
                    const tabla = $('#datatable2').DataTable();
                    tabla.destroy(); // Destruye la instancia del DataTable
                    $('#datatable2 tbody').empty(); // Limpia las filas de la tabla
                    /* limpiamos los valores */
                    $('#familiaress').val('')
                    $('#ocupaciones').val('')
                    $('#edades').val('')
                    $('#laboraEstudiaes').val('')
                    $('#tiempoResidees').val('')
                    $('#callees').val('')
                    $('#numeroes').val('')
                    $('#cpdees').val('')
                    $('#coloniaes').val('')
                    $('#delegacionMunicipioes').val('')
                    $('#ciudadess').val('')
                    $('#estadoes').val('')
                    $('#tel1es').val('')
                    cargarEstructuraFamiliar()
                },
                error: function(response) { alert('Error al crear la empresa.'); }
            });
        }
        else{

            $.ajax({
                url: `/estructura/crear`,
                method: 'POST',
                data: formData,
                headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')  },
                success: function(response) {
                    const div = document.getElementById('alerta');
                    div.style.display = 'block';
                    const tabla = $('#datatable2').DataTable();
                    tabla.destroy(); // Destruye la instancia del DataTable
                    $('#datatable2 tbody').empty(); // Limpia las filas de la tabla
                    /* limpiamos los valores */
                    $('#familiaress').val('')
                    $('#ocupaciones').val('')
                    $('#edades').val('')
                    $('#laboraEstudiaes').val('')
                    $('#tiempoResidees').val('')
                    $('#callees').val('')
                    $('#numeroes').val('')
                    $('#cpdees').val('')
                    $('#coloniaes').val('')
                    $('#delegacionMunicipioes').val('')
                    $('#ciudadess').val('')
                    $('#estadoes').val('')
                    $('#tel1es').val('')
                    /* traemos los valores */
                    cargarEstructuraFamiliar()
                },
                error: function(response) { alert('Error al crear la empresa.'); }
            });
        }


    });
    /* funcion para eliminar documentos, */
    function eliEstructura(id){
        $.ajax({
            url: `/estructura/eliminar/${id}`,
            method: 'DELETE',
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')  },
            success: function(response) {
                const div = document.getElementById('alerta');
                div.style.display = 'block';
                const tabla = $('#datatable2').DataTable();
                tabla.destroy(); // Destruye la instancia del DataTable
                $('#datatable2 tbody').empty(); // Limpia las filas de la tabla
                cargarEstructuraFamiliar()
            },
            error: function(response) { alert('Error al crear la empresa.'); }
        });

    }
    /* funcion para editar el documento */
    function veoEditoEstructura(id,idEstructura,familiar,ocupacion,edad,laboraEstudia,tiempoReside,calle,numero,cpde,colonia,delegacionMunicipio,ciudad,estado,tel1){
       /*  document.getElementById('').value = */

        document.getElementById('idEstructura').value =id
        document.getElementById('familiaress').value = familiar
        document.getElementById('ocupaciones').value = ocupacion
        document.getElementById('edades').value = edad
        document.getElementById('laboraEstudiaes').value = laboraEstudia
        document.getElementById('tiempoResidees').value = tiempoReside
        document.getElementById('callees').value = calle
        document.getElementById('numeroes').value = numero
        document.getElementById('cpdees').value = cpde
        document.getElementById('coloniaes').value = colonia
        document.getElementById('delegacionMunicipioes').value = delegacionMunicipio
        document.getElementById('ciudadess').value = ciudad
        document.getElementById('estadoes').value = estado
        document.getElementById('tel1es').value = tel1

    }

    /* REDES */
    $('#btnRedes').click(function(e) {
        e.preventDefault(); // Previene el envío normal del formulario
        /* var formData = $(this).serialize(); */ // Obtiene los datos del formulario

        var formData = {

            facebook: $('#facebook').val(),
            twitter: $('#twitter').val(),
            instagram: $('#instagram').val(),
            linkedin: $('#linkedin').val(),

        };

        if ($('#idEstudioEdi').val() != "") {
            formData.idEstudio = $('#idEstudioEdi').val();
        }

        if ($('#idRedes').val() != "") {
            formData.id = $('#idRedes').val();
        }


        let idRedes = document.getElementById("idRedes").value;

        if(idRedes != ''){
            $.ajax({
                url: `/redes/editar/${idRedes}`,
                method: 'GET',
                data: formData,
            /*  processData: false, // Necesario para evitar que jQuery procese los datos
                contentType: false, */
                headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')  },
                success: function(response) {
                    const div = document.getElementById('alerta');
                    div.style.display = 'block';
                },
                error: function(response) { alert('Error al crear la empresa.'); }
            });
        }
        else{
            console.log("entro a crear")
            $.ajax({
                url: `/redes/crear`,
                method: 'POST',
                data: formData,
            /*  processData: false, // Necesario para evitar que jQuery procese los datos
                contentType: false, */
                headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')  },
                success: function(response) {
                    const div = document.getElementById('alerta');
                    div.style.display = 'block';
                },
                error: function(response) { alert('Error al crear la empresa.'); }
            });
        }

    });

    /* CONDUCTA */
    $('#btnConducta').click(function(e) {
        e.preventDefault(); // Previene el envío normal del formulario
        /* var formData = $(this).serialize(); */ // Obtiene los datos del formulario

        var formData = {

            quienEstuvo: $('#quienEstuvo').val(),
            conductaEntrevistado: $('#conductaEntrevistado').val(),
            relacionVecinos: $('#relacionVecinos').val(),
            pertenecegrupo: $('#pertenecegrupo').val(),
            problemasLegales: $('#problemasLegales').val(),
            familiarRecluido: $('#familiarRecluido').val(),
            familiaresAdentro: $('#familiaresAdentro').val(),

        };

        if ($('#idEstudioEdi').val() != "") {
            formData.idEstudio = $('#idEstudioEdi').val();
        }

        if ($('#idConducta').val() != "") {
            formData.id = $('#idConducta').val();
        }


        let idConducta = document.getElementById("idConducta").value;

        if(idConducta != ''){
            $.ajax({
                url: `/conducta/editar/${idConducta}`,
                method: 'GET',
                data: formData,
            /*  processData: false, // Necesario para evitar que jQuery procese los datos
                contentType: false, */
                headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')  },
                success: function(response) {
                    const div = document.getElementById('alerta');
                    div.style.display = 'block';
                },
                error: function(response) { alert('Error al crear la empresa.'); }
            });
        }
        else{
            $.ajax({
                url: `/conducta/crear`,
                method: 'POST',
                data: formData,
            /*  processData: false, // Necesario para evitar que jQuery procese los datos
                contentType: false, */
                headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')  },
                success: function(response) {
                    const div = document.getElementById('alerta');
                    div.style.display = 'block';
                },
                error: function(response) { alert('Error al crear la empresa.'); }
            });
        }

    });

    /* SITUACION */
    /* funcion par agregar editar documentos */
    $('#btnSituacion').click(function(e) {
        e.preventDefault(); // Previene el envío normal del formulario
        /* var formData = $(this).serialize(); */ // Obtiene los datos del formulario

        var formData = {
            nombre: $('#nombresi').val(),
            parentesco: $('#parentescosi').val(),
            salario: $('#salariosi').val(),
            ingreso: $('#ingresosi').val(),
            concepto: $('#conceptosi').val(),
            egresos: $('#egresossi').val(),
            observaciones: $('#observacionessi').val(),
            superavit: $('#superavitsi').val(),


        };

        if ($('#idEstudioEdi').val() != "") { formData.idEstudio = $('#idEstudioEdi').val(); }
        /* valor de id de la seccion */
        if ($('#idSituacion').val() != "") { formData.id = $('#idSituacion').val(); }


        let idSituacion = document.getElementById("idSituacion").value;

        if(idSituacion != ''){
            $.ajax({
                url: `/situacion/editar/${idSituacion}`,
                method: 'GET',
                data: formData,
                headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')  },
                success: function(response) {
                    const div = document.getElementById('alerta');
                    div.style.display = 'block';
                    const tabla = $('#datatable9').DataTable();
                    tabla.destroy(); // Destruye la instancia del DataTable
                    $('#datatable9 tbody').empty(); // Limpia las filas de la tabla
                    /* limpiamos los valores */
                    $('#nombresi').val(''),
                    $('#parentescosi').val(''),
                    $('#salariosi').val(''),
                    $('#ingresosi').val(''),
                    $('#conceptosi').val(''),
                    $('#egresossi').val(''),
                    $('#observacionessi').val(''),
                    $('#superavitsi').val(''),
                    cargaSituacion()
                },
                error: function(response) { alert('Error al crear la empresa.'); }
            });
        }
        else{

            $.ajax({
                url: `/situacion/crear`,
                method: 'POST',
                data: formData,
                headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')  },
                success: function(response) {
                    const div = document.getElementById('alerta');
                    div.style.display = 'block';
                    const tabla = $('#datatable9').DataTable();
                    tabla.destroy(); // Destruye la instancia del DataTable
                    $('#datatable9 tbody').empty(); // Limpia las filas de la tabla
                    /* limpiamos los valores */
                    $('#nombresi').val(''),
                    $('#parentescosi').val(''),
                    $('#salariosi').val(''),
                    $('#ingresosi').val(''),
                    $('#conceptosi').val(''),
                    $('#egresossi').val(''),
                    $('#observacionessi').val(''),
                    $('#superavitsi').val(''),
                    /* traemos los valores */
                    cargaSituacion()
                },
                error: function(response) { alert('Error al crear la empresa.'); }
            });
        }


    });
    /* funcion para eliminar documentos, */
    function eliSituacion(id){
        $.ajax({
            url: `/situacion/eliminar/${id}`,
            method: 'DELETE',
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')  },
            success: function(response) {
                const div = document.getElementById('alerta');
                div.style.display = 'block';
                const tabla = $('#datatable9').DataTable();
                tabla.destroy(); // Destruye la instancia del DataTable
                $('#datatable9 tbody').empty(); // Limpia las filas de la tabla
                cargaSituacion()
            },
            error: function(response) { alert('Error al crear la empresa.'); }
        });

    }
    /* funcion para editar el documento */
    function veoEditoSituacion(id,nombre,parentesco,salario,ingreso,concepto,egresos,observaciones,superavit){
       /*  document.getElementById('').value = */
        document.getElementById('idSituacion').value = id
        document.getElementById('nombresi').value = nombre
        document.getElementById('parentescosi').value = parentesco
        document.getElementById('salariosi').value = salario
        document.getElementById('ingresosi').value = ingreso
        document.getElementById('conceptosi').value = concepto
        document.getElementById('egresossi').value = egresos
        document.getElementById('observacionessi').value = observaciones
        document.getElementById('superavitsi').value = superavit

    }

    /* DEUDAS */
    $('#btnDeudas').click(function(e) {
        e.preventDefault(); // Previene el envío normal del formulario
        /* var formData = $(this).serialize(); */ // Obtiene los datos del formulario

        var formData = {

            cuentaDeuda: $('#cuentaDeuda').val(),
            conQuien: $('#conQuien').val(),
            monto: $('#monto').val(),
            abonoMensual: $('#abonoMensual').val(),
            apagaren: $('#apagaren').val(),
            cuentaauto: $('#cuentaauto').val(),
            modelo: $('#modelo').val(),
            placas: $('#placas').val(),
            valorAuto: $('#valorAuto').val(),
            propiedad: $('#propiedad').val(),
            ubicacon: $('#ubicacon').val(),
            tarjetaCredito: $('#tarjetaCredito').val(),
            bancotarjetaCredito: $('#bancotarjetaCredito').val(),
            creditoAutorizado: $('#creditoAutorizado').val(),
            tarjetaTienda: $('#tarjetaTienda').val(),
            conquienTienda: $('#conquienTienda').val(),
            creditoAutorizadotienda: $('#creditoAutorizadotienda').val(),
            observaciones: $('#observacionesDeu').val()

        };

        if ($('#idEstudioEdi').val() != "") {
            formData.idEstudio = $('#idEstudioEdi').val();
        }

        if ($('#idDeudas').val() != "") {
            formData.id = $('#idDeudas').val();
        }


        let idDeudas = document.getElementById("idDeudas").value;

        if(idDeudas != ''){
            $.ajax({
                url: `/deudas/editar/${idDeudas}`,
                method: 'GET',
                data: formData,
            /*  processData: false, // Necesario para evitar que jQuery procese los datos
                contentType: false, */
                headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')  },
                success: function(response) {
                    const div = document.getElementById('alerta');
                    div.style.display = 'block';
                },
                error: function(response) { alert('Error al crear la empresa.'); }
            });
        }
        else{
            console.log("entro a crear")
            $.ajax({
                url: `/deudas/crear`,
                method: 'POST',
                data: formData,
            /*  processData: false, // Necesario para evitar que jQuery procese los datos
                contentType: false, */
                headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')  },
                success: function(response) {
                    const div = document.getElementById('alerta');
                    div.style.display = 'block';
                },
                error: function(response) { alert('Error al crear la empresa.'); }
            });
        }

    });

    /* ENTORNO */
    $('#btnEntorno').click(function(e) {
        e.preventDefault(); // Previene el envío normal del formulario
        /* var formData = $(this).serialize(); */ // Obtiene los datos del formulario

        var formData = {



            id: $('#idEntorno').val(),
            tipoZona: $('#tipoZona').val(),
            tipoVivienda: $('#tipoVivienda').val(),
            edificacion: $('#edificacion').val(),
            titular: $('#titular').val(),
            parentesco: $('#parentesco').val(),
            numRecamaras: $('#numRecamaras').val(),
            sala: $('#sala').is(':checked') ? $('#sala').val() : 0,
            comedor: $('#comedor').is(':checked') ? $('#comedor').val() : 0,
            cocina: $('#cocina').is(':checked') ? $('#cocina').val() : 0,
            garaje: $('#garaje').is(':checked') ? $('#garaje').val() : 0,
            jardin: $('#jardin').is(':checked') ? $('#jardin').val() : 0,
            nomBano: $('#nomBano').val(),
            tipobano: $('#tipobano').val(),
            viasdeacceso: $('#viasdeacceso').val(),
            medioTransporte: $('#medioTransporte').val(),
            tiempoServicio: $('#tiempoServicio').val(),
            entreCalles: $('#entreCalles').val(),
            color: $('#color').val(),
            porton: $('#porton').val(),
            referencias: $('#referencias').val(),
            observaciones: $('#observacionesent').val(),
            idUSuario: $('#idUSuario').val(),
            agua: $('#agua').is(':checked') ? $('#agua').val() : 0,
            luz: $('#luz').is(':checked') ? $('#luz').val() : 0,
            pavimentacion: $('#pavimentacion').is(':checked') ? $('#pavimentacion').val() : 0,
            telefono: $('#telefonoent').is(':checked') ? $('#telefonoent').val() : 0,
            transporte: $('#transporte').is(':checked') ? $('#transporte').val() : 0,
            vigilancia: $('#vigilancia').is(':checked') ? $('#vigilancia').val() : 0,
            areas: $('#areas').is(':checked') ? $('#areas').val() : 0,
            drenaje: $('#drenaje').is(':checked') ? $('#drenaje').val() : 0,
            paredes: $('#paredes').val(),
            techos: $('#techos').val(),
            pisos: $('#pisos').val(),
            telNormal: $('#telNormal').is(':checked') ? $('#telNormal').val() : 0,
            telPlasma: $('#telPlasma').is(':checked') ? $('#telPlasma').val() : 0,
            estereo: $('#estereo').is(':checked') ? $('#estereo').val() : 0,
            dvd: $('#dvd').is(':checked') ? $('#dvd').val() : 0,
            blueray: $('#blueray').is(':checked') ? $('#blueray').val() : 0,
            estufa: $('#estufa').is(':checked') ? $('#estufa').val() : 0,
            horno: $('#horno').is(':checked') ? $('#horno').val() : 0,
            lavadora: $('#lavadora').is(':checked') ? $('#lavadora').val() : 0,
            centrolavado: $('#centrolavado').is(':checked') ? $('#centrolavado').val() : 0,
            refrigerador: $('#refrigerador').is(':checked') ? $('#refrigerador').val() : 0,
            computadora: $('#computadora').is(':checked') ? $('#computadora').val() : 0,
            extensionInmueble: $('#extensionInmueble').val(),
            condicionesInmueble: $('#condicionesInmueble').val(),
            condicionesMobiliario: $('#condicionesMobiliario').val(),
            orden: $('#orden').val(),
            limpieza: $('#limpieza').val(),
            delincuencia: $('#delincuencia').val(),
            vandalismo: $('#vandalismo').val(),
            drogadiccion: $('#drogadiccion').val(),
            alcoholismo: $('#alcoholismo').val(),
            estudio: $('#estudio').is(':checked') ? $('#estudio').val() : 0,
            zotehuela: $('#zotehuela').is(':checked') ? $('#zotehuela').val() : 0,
            patio: $('#patio').is(':checked') ? $('#patio').val() : 0,
            internet: $('#internet').is(':checked') ? $('#internet').val() : 0,
            renta: $('#renta').val(),
            regadera: $('#regadera').is(':checked') ? $('#regadera').val() : 0,

        };

        if ($('#idEstudioEdi').val() != "") {
            formData.idEstudio = $('#idEstudioEdi').val();
        }

        if ($('#idEntorno').val() != "") {
            formData.id = $('#idEntorno').val();
        }


        let idEntorno = document.getElementById("idEntorno").value;

        if(idEntorno != ''){
            $.ajax({
                url: `/entorno/editar/${idEntorno}`,
                method: 'GET',
                data: formData,
            /*  processData: false, // Necesario para evitar que jQuery procese los datos
                contentType: false, */
                headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')  },
                success: function(response) {
                    const div = document.getElementById('alerta');
                    div.style.display = 'block';
                },
                error: function(response) { alert('Error al crear la empresa.'); }
            });
        }
        else{
            $.ajax({
                url: `/entorno/crear`,
                method: 'POST',
                data: formData,
            /*  processData: false, // Necesario para evitar que jQuery procese los datos
                contentType: false, */
                headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')  },
                success: function(response) {
                    const div = document.getElementById('alerta');
                    div.style.display = 'block';
                },
                error: function(response) { alert('Error al crear la empresa.'); }
            });
        }

    });

    /* REFERENCIAS PERSONALES */
    /* funcion par agregar editar documentos */
    $('#btnReferenciap').click(function(e) {
        e.preventDefault(); // Previene el envío normal del formulario
        /* var formData = $(this).serialize(); */ // Obtiene los datos del formulario

        var formData = {
            nombre: $('#nombrep').val(),
            tiempoConocerlo: $('#tiempoConocerlop').val(),
            relacion: $('#relacionp').val(),
            domicilio: $('#domiciliop').val(),
            tel1: $('#tel1p').val(),
            opinion: $('#opinionp').val(),

        };

        if ($('#idEstudioEdi').val() != "") { formData.idEstudio = $('#idEstudioEdi').val(); }
        /* valor de id de la seccion */
        if ($('#idReferenciap').val() != "") { formData.id = $('#idReferenciap').val(); }


        let idReferenciap = document.getElementById("idReferenciap").value;

        if(idReferenciap != ''){
            $.ajax({
                url: `/referenciap/editar/${idReferenciap}`,
                method: 'GET',
                data: formData,
                headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')  },
                success: function(response) {
                    const div = document.getElementById('alerta');
                    div.style.display = 'block';
                    const tabla = $('#datatable4').DataTable();
                    tabla.destroy(); // Destruye la instancia del DataTable
                    $('#datatable4 tbody').empty(); // Limpia las filas de la tabla
                    /* limpiamos los valores */
                    $('#nombrep').val(''),
                    $('#tiempoConocerlop').val(''),
                    $('#relacionp').val(''),
                    $('#domiciliop').val(''),
                    $('#tel1p').val(''),
                    $('#opinionp').val(''),

                    cargaReferenicaPersonales()
                },
                error: function(response) { alert('Error al crear la empresa.'); }
            });
        }
        else{

            $.ajax({
                url: `/referenciap/crear`,
                method: 'POST',
                data: formData,
                headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')  },
                success: function(response) {
                    const div = document.getElementById('alerta');
                    div.style.display = 'block';

                    $('#datatable4 tbody').empty(); // Limpia las filas de la tabla

                    /* limpiamos los valores */
                    $('#nombrep').val(''),
                    $('#tiempoConocerlop').val(''),
                    $('#relacionp').val(''),
                    $('#domiciliop').val(''),
                    $('#tel1p').val(''),
                    $('#opinionp').val(''),

                    /* traemos los valores */
                    cargaReferenicaPersonales()
                },
                error: function(response) { alert('Error al crear la empresa.'); }
            });
        }


    });
    /* funcion para eliminar documentos, */
    function eliReferencia(id){
        $.ajax({
            url: `/referenciap/eliminar/${id}`,
            method: 'DELETE',
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')  },
            success: function(response) {
                const div = document.getElementById('alerta');
                div.style.display = 'block';

                $('#datatable4 tbody').empty(); // Limpia las filas de la tabla
                cargaReferenicaPersonales()
            },
            error: function(response) { alert('Error al crear la empresa.'); }
        });

    }
    /* funcion para editar el documento */
    function veoEditoReferencia(id,nombre,tiempoConocerlo,relacion,domicilio,tel1,opinion){
        /*  document.getElementById('').value = */
        document.getElementById('idReferenciap').value = id
        document.getElementById('nombrep').value = nombre
        document.getElementById('tiempoConocerlop').value = tiempoConocerlo
        document.getElementById('relacionp').value = relacion
        document.getElementById('domiciliop').value = domicilio
        document.getElementById('tel1p').value = tel1
        document.getElementById('opinionp').value = opinion


    }

    /* ANTECEDENTES LABORALES */
    $('#btnAntecendesl').click(function(e) {
        e.preventDefault(); // Previene el envío normal del formulario
        /* var formData = $(this).serialize(); */ // Obtiene los datos del formulario

        var formData = {
           empresa: $('#empresal').val(),
           giro: $('#girol').val(),
           direccion: $('#direccionl').val(),
           telefono: $('#telefonol').val(),
           fechaIngreso: $('#fechaIngresol').val(),
           fechaEgreso: $('#fechaEgresol').val(),
           puesto: $('#puestol').val(),
           area: $('#areal').val(),
           salario: $('#salariol').val(),
           motivoSalida: $('#motivoSalidal').val(),
           quienProporciono: $('#quienProporcionol').val(),
           puestoProporciono: $('#puestoProporcionol').val(),
           calificacion: $('#calificacionl').val(),
           demanda: $('#demandal').val(),
           volveria: $('#volverial').val(),
           porque: $('#porquel').val(),
           observaciones: $('#observacionesl').val(),
           candidatoes: $('#candidatoesl').val(),
           periodosInactivo: $('#periodosInactivol').val(),

        };

        if ($('#idEstudioEdi').val() != "") { formData.idEstudio = $('#idEstudioEdi').val(); }
        /* valor de id de la seccion */
        if ($('#idAntecedentesl').val() != "") { formData.id = $('#idAntecedentesl').val(); }


        let idAntecedentesl = document.getElementById("idAntecedentesl").value;

        if(idAntecedentesl != ''){
            $.ajax({
                url: `/antecedentesl/editar/${idAntecedentesl}`,
                method: 'GET',
                data: formData,
                headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')  },
                success: function(response) {
                    const div = document.getElementById('alerta');
                    div.style.display = 'block';

                    const tabla = $('#datatable17').DataTable();
                    tabla.destroy(); // Destruye la instancia del DataTable
                    $('#datatable17 tbody').empty(); // Limpia las filas de la tabla
                    /* limpiamos los valores */

                    $('#empresal').val(''),
                    $('#girol').val(''),
                    $('#direccionl').val(''),
                    $('#telefonol').val(''),
                    $('#fechaIngresol').val(''),
                    $('#fechaEgresol').val(''),
                    $('#puestol').val(''),
                    $('#areal').val(''),
                    $('#salariol').val(''),
                    $('#motivoSalidal').val(''),
                    $('#quienProporcionol').val(''),
                    $('#puestoProporcionol').val(''),
                    $('#calificacionl').val(''),
                    $('#demandal').val(''),
                    $('#volverial').val(''),
                    $('#porquel').val(''),
                    $('#observacionesl').val(''),
                    $('#candidatoesl').val(''),
                    $('#periodosInactivol').val(''),

                    cargaAntecedentes()
                },
                error: function(response) { alert('Error al crear la empresa.'); }
            });
        }
        else{
            /* alert("entro a enviar") */
            $.ajax({
                url: `/antecedentesl/crear`,
                method: 'POST',
                data: formData,
                headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')  },
                success: function(response) {
                    const div = document.getElementById('alerta');
                    div.style.display = 'block';



                    /* limpiamos los valores */
                    $('#empresal').val(''),
                    $('#girol').val(''),
                    $('#direccionl').val(''),
                    $('#telefonol').val(''),
                    $('#fechaIngresol').val(''),
                    $('#fechaEgresol').val(''),
                    $('#puestol').val(''),
                    $('#areal').val(''),
                    $('#salariol').val(''),
                    $('#motivoSalidal').val(''),
                    $('#quienProporcionol').val(''),
                    $('#puestoProporcionol').val(''),
                    $('#calificacionl').val(''),
                    $('#demandal').val(''),
                    $('#volverial').val(''),
                    $('#porquel').val(''),
                    $('#observacionesl').val(''),
                    $('#candidatoesl').val(''),
                    $('#periodosInactivol').val(''),

                    /* traemos los valores */
                    cargaAntecedentes()
                },
                error: function(response) { alert('Error al crear la empresa.'); }
            });
        }


    });
    /* funcion para eliminar documentos, */
    function eliAntecedentes(id){
        $.ajax({
            url: `/antecedentesl/eliminar/${id}`,
            method: 'DELETE',
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')  },
            success: function(response) {
                const div = document.getElementById('alerta');
                div.style.display = 'block';

                $('#datatable5 tbody').empty(); // Limpia las filas de la tabla
                cargaAntecedentes()
            },
            error: function(response) { alert('Error al crear la empresa.'); }
        });

    }
    /* funcion para editar el documento */
    function veoEditoAntecedentes(id,empresa,giro,direccion,telefono,fechaIngreso,fechaEgreso,puesto,area,salario,motivoSalida,quienProporciono,puestoProporciono,calificacion,demanda,volveria,porque,observaciones,candidatoes,periodosInactivo){

        /*  document.getElementById('').value = */
        document.getElementById('idAntecedentesl').value = id
        document.getElementById('empresal').value = empresa
        document.getElementById('girol').value = giro
        document.getElementById('direccionl').value = direccion
        document.getElementById('telefonol').value = telefono
        document.getElementById('fechaIngresol').value = fechaIngreso
        document.getElementById('fechaEgresol').value = fechaEgreso
        document.getElementById('puestol').value = puesto
        document.getElementById('areal').value = area
        document.getElementById('salariol').value = salario
        document.getElementById('motivoSalidal').value = motivoSalida
        document.getElementById('quienProporcionol').value = quienProporciono
        document.getElementById('puestoProporcionol').value = puestoProporciono
        document.getElementById('calificacionl').value = calificacion
        document.getElementById('demandal').value = demanda
        document.getElementById('volverial').value = volveria
        document.getElementById('porquel').value = porque
        document.getElementById('observacionesl').value = observaciones
        document.getElementById('candidatoesl').value = candidatoes
        document.getElementById('periodosInactivol').value = periodosInactivo

    }

    /* SALUD */
    $('#btnSalud').click(function(e) {
        e.preventDefault(); // Previene el envío normal del formulario
        /* var formData = $(this).serialize(); */ // Obtiene los datos del formulario

        var formData = {

            droga : $('#droga').val(),
            cualDroga : $('#cualDroga').val(),
            fuma : $('#fuma').val(),
            frecuenciaFuma : $('#frecuenciaFuma').val(),
            bebidas : $('#bebidas').val(),
            frecuenciaBebidas : $('#frecuenciaBebidas').val(),
            cafe : $('#cafe').val(),
            frecuenciaCafe : $('#frecuenciaCafe').val(),
            lentes : $('#lentes').val(),
            diagnostico : $('#diagnostico').val(),
            intervenciones : $('#intervenciones').val(),
            dequeintervenciones : $('#dequeintervenciones').val(),
            enfermedadesCronicas : $('#enfermedadesCronicas').val(),
            dequeCronicas : $('#dequeCronicas').val(),
            hereditarias : $('#hereditarias').val(),
            cualHereditarias : $('#cualHereditarias').val(),
            quienConstante : $('#quienConstante').val(),
            porqueConstante : $('#porqueConstante').val(),
            ultimaVez : $('#ultimaVez').val(),
            considera : $('#considera').val(),
            porqueConsidera : $('#porqueConsidera').val(),
            deporte : $('#deporte').val(),
            pasatiempo : $('#pasatiempo').val(),
            ultimavezDeque : $('#ultimavezDeque').val(),
            embarazo : $('#embarazo').val(),
            idUsuario : $('#idUsuario').val()


        };

        if ($('#idEstudioEdi').val() != "") {
            formData.idEstudio = $('#idEstudioEdi').val();
        }

        if ($('#idSalud').val() != "") {
            formData.id = $('#idSalud').val();
        }


        let idSalud = document.getElementById("idSalud").value;

        if(idSalud != ''){
            $.ajax({
                url: `/salud/editar/${idSalud}`,
                method: 'GET',
                data: formData,
            /*  processData: false, // Necesario para evitar que jQuery procese los datos
                contentType: false, */
                headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')  },
                success: function(response) {
                    const div = document.getElementById('alerta');
                    div.style.display = 'block';
                },
                error: function(response) { alert('Error al crear la empresa.'); }
            });
        }
        else{

            $.ajax({
                url: `/salud/crear`,
                method: 'POST',
                data: formData,
            /*  processData: false, // Necesario para evitar que jQuery procese los datos
                contentType: false, */
                headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')  },
                success: function(response) {
                    const div = document.getElementById('alerta');
                    div.style.display = 'block';
                },
                error: function(response) { alert('Error al crear la empresa.'); }
            });
        }

    });

    /* RESUMEN */
    $('#btnResumen').click(function(e) {
        e.preventDefault(); // Previene el envío normal del formulario
        /* var formData = $(this).serialize(); */ // Obtiene los datos del formulario

        var formData = {

            social : $('#social').val(),
            escolar : $('#escolar').val(),
            economica : $('#economica').val(),
            laboral : $('#laboral').val(),
            actitud : $('#actitud').val(),
            observaciones : $('#observacionesr').val(),
            recomendacion : $('#recomendacion').val(),
            observacionesPersonal : $('#observacionesPersonal').val(),
            observacionesLaboral : $('#observacionesLaboral').val(),
            cali : $('#cali').val()

        };

        if ($('#idEstudioEdi').val() != "") {
            formData.idEstudio = $('#idEstudioEdi').val();
        }

        if ($('#idResumen').val() != "") {
            formData.id = $('#idResumen').val();
        }


        let idResumen = document.getElementById("idResumen").value;

        if(idResumen != ''){
            $.ajax({
                url: `/resumen/editar/${idResumen}`,
                method: 'GET',
                data: formData,
            /*  processData: false, // Necesario para evitar que jQuery procese los datos
                contentType: false, */
                headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')  },
                success: function(response) {
                    const div = document.getElementById('alerta');
                    div.style.display = 'block';
                },
                error: function(response) { alert('Error al crear la empresa.'); }
            });
        }
        else{

            $.ajax({
                url: `/resumen/crear`,
                method: 'POST',
                data: formData,
            /*  processData: false, // Necesario para evitar que jQuery procese los datos
                contentType: false, */
                headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')  },
                success: function(response) {
                    const div = document.getElementById('alerta');
                    div.style.display = 'block';
                },
                error: function(response) { alert('Error al crear la empresa.'); }
            });
        }

    });

    /* HOBBY */
    $('#btnHobby').click(function(e) {
        e.preventDefault(); // Previene el envío normal del formulario
        /* var formData = $(this).serialize(); */ // Obtiene los datos del formulario

        var formData = {

            deportes : $('#deportes').val(),
            cual : $('#cual').val(),
            frecuencia : $('#frecuencia').val(),
            pasatiempos : $('#pasatiempos').val(),
            otros : $('#otros').val()

        };

        if ($('#idEstudioEdi').val() != "") {
            formData.idEstudio = $('#idEstudioEdi').val();
        }

        if ($('#idHobby').val() != "") {
            formData.id = $('#idHobby').val();
        }


        let idHobby = document.getElementById("idHobby").value;

        if(idHobby != ''){
            $.ajax({
                url: `/hobby/editar/${idHobby}`,
                method: 'GET',
                data: formData,
            /*  processData: false, // Necesario para evitar que jQuery procese los datos
                contentType: false, */
                headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')  },
                success: function(response) {
                    const div = document.getElementById('alerta');
                    div.style.display = 'block';
                },
                error: function(response) { alert('Error al crear la empresa.'); }
            });
        }
        else{

            $.ajax({
                url: `/hobby/crear`,
                method: 'POST',
                data: formData,
            /*  processData: false, // Necesario para evitar que jQuery procese los datos
                contentType: false, */
                headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')  },
                success: function(response) {
                    const div = document.getElementById('alerta');
                    div.style.display = 'block';
                },
                error: function(response) { alert('Error al crear la empresa.'); }
            });
        }

    });

    /* BENEFICIARIOS */
    $('#btnBeneficiario').click(function(e) {
        e.preventDefault(); // Previene el envío normal del formulario
        /* var formData = $(this).serialize(); */ // Obtiene los datos del formulario

        var formData = {

            parentesco : $('#parentescob').val(),
            nombre : $('#nombreb').val(),
            edad : $('#edadb').val(),
            ocupacion : $('#ocupacionb').val(),
            donde : $('#dondeb').val(),
            calle : $('#calleb').val(),
            numero : $('#numerob').val(),
            colonia : $('#coloniab').val(),
            delegacion : $('#delegacionb').val(),
            ciudad : $('#ciudadb').val(),
            estado : $('#estadob').val(),
            cp : $('#cpb').val(),
            tiempo : $('#tiempob').val(),
            telefono : $('#telefonob').val(),

        };

        if ($('#idEstudioEdi').val() != "") { formData.idEstudio = $('#idEstudioEdi').val(); }
        /* valor de id de la seccion */
        if ($('#idBeneficiario').val() != "") { formData.id = $('#idBeneficiario').val(); }


        let idBeneficiario = document.getElementById("idBeneficiario").value;

        if(idBeneficiario != ''){
            $.ajax({
                url: `/beneficiario/editar/${idBeneficiario}`,
                method: 'GET',
                data: formData,
                headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')  },
                success: function(response) {
                    const div = document.getElementById('alerta');
                    div.style.display = 'block';
                    const tabla = $('#datatable7').DataTable();
                    tabla.destroy(); // Destruye la instancia del DataTable
                    $('#datatable7 tbody').empty(); // Limpia las filas de la tabla
                    /* limpiamos los valores */

                    $('#parentescob').val(''),
                    $('#nombreb').val(''),
                    $('#edadb').val(''),
                    $('#ocupacionb').val(''),
                    $('#dondeb').val(''),
                    $('#calleb').val(''),
                    $('#numerob').val(''),
                    $('#coloniab').val(''),
                    $('#delegacionb').val(''),
                    $('#ciudadb').val(''),
                    $('#estadob').val(''),
                    $('#cpb').val(''),
                    $('#tiempob').val(''),
                    $('#telefonob').val(''),

                    cargaBeneficiario()
                },
                error: function(response) { alert('Error al crear la empresa.'); }
            });
        }
        else{

            $.ajax({
                url: `/beneficiario/crear`,
                method: 'POST',
                data: formData,
                headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')  },
                success: function(response) {
                    const div = document.getElementById('alerta');
                    div.style.display = 'block';

                    $('#datatable7 tbody').empty(); // Limpia las filas de la tabla

                    /* limpiamos los valores */
                    $('#parentescob').val(''),
                    $('#nombreb').val(''),
                    $('#edadb').val(''),
                    $('#ocupacionb').val(''),
                    $('#dondeb').val(''),
                    $('#calleb').val(''),
                    $('#numerob').val(''),
                    $('#coloniab').val(''),
                    $('#delegacionb').val(''),
                    $('#ciudadb').val(''),
                    $('#estadob').val(''),
                    $('#cpb').val(''),
                    $('#tiempob').val(''),
                    $('#telefonob').val(''),

                    /* traemos los valores */
                    cargaBeneficiario()
                },
                error: function(response) { alert('Error al crear la empresa.'); }
            });
        }


    });
    /* funcion para eliminar documentos, */
    function eliBeneficiario(id){
        $.ajax({
            url: `/beneficiario/eliminar/${id}`,
            method: 'DELETE',
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')  },
            success: function(response) {
                const div = document.getElementById('alerta');
                div.style.display = 'block';

                $('#datatable7 tbody').empty(); // Limpia las filas de la tabla
                cargaBeneficiario()
            },
            error: function(response) { alert('Error al crear la empresa.'); }
        });

    }
    /* funcion para editar el documento */
    function veoEditoBeneficiario(id,parentesco,nombre,edad,ocupacion,donde,calle,numero,colonia,delegacion,ciudad,estado,cp,tiempo,telefono){
        document.getElementById('idBeneficiario').value = id
        document.getElementById('parentescob').value = parentesco
        document.getElementById('nombreb').value = nombre
        document.getElementById('edadb').value = edad
        document.getElementById('ocupacionb').value = ocupacion
        document.getElementById('dondeb').value = donde
        document.getElementById('calleb').value = calle
        document.getElementById('numerob').value = numero
        document.getElementById('coloniab').value = colonia
        document.getElementById('delegacionb').value = delegacion
        document.getElementById('ciudadb').value = ciudad
        document.getElementById('estadob').value = estado
        document.getElementById('cpb').value = cp
        document.getElementById('tiempob').value = tiempo
        document.getElementById('telefonob').value = telefono
        /*  document.getElementById('').value = */

    }

    /* NIVEL ACADEMICO */
    $('#btnNivel').click(function(e) {
        e.preventDefault(); // Previene el envío normal del formulario
        /* var formData = $(this).serialize(); */ // Obtiene los datos del formulario

        var formData = {

            ultimo : $('#ultimon').val(),
            periodo : $('#periodon').val(),
            profesional : $('#profesionaln').val(),
            cedula : $('#cedulan').val(),
            especialidad : $('#especialidadn').val(),
            caso : $('#cason').val(),
            otros : $('#otrosn').val()


        };

        if ($('#idEstudioEdi').val() != "") {
            formData.idEstudio = $('#idEstudioEdi').val();
        }

        if ($('#idNivel').val() != "") {
            formData.id = $('#idNivel').val();
        }


        let idNivel = document.getElementById("idNivel").value;

        if(idNivel != ''){
            $.ajax({
                url: `/nivel/editar/${idNivel}`,
                method: 'GET',
                data: formData,
            /*  processData: false, // Necesario para evitar que jQuery procese los datos
                contentType: false, */
                headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')  },
                success: function(response) {
                    const div = document.getElementById('alerta');
                    div.style.display = 'block';
                },
                error: function(response) { alert('Error al crear la empresa.'); }
            });
        }
        else{

            $.ajax({
                url: `/nivel/crear`,
                method: 'POST',
                data: formData,
            /*  processData: false, // Necesario para evitar que jQuery procese los datos
                contentType: false, */
                headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')  },
                success: function(response) {
                    const div = document.getElementById('alerta');
                    div.style.display = 'block';
                },
                error: function(response) { alert('Error al crear la empresa.'); }
            });
        }

    });

    /* PERIODOS NO LABORADOS */
    $('#btnPeriodo').click(function(e) {
        e.preventDefault(); // Previene el envío normal del formulario
        /* var formData = $(this).serialize(); */ // Obtiene los datos del formulario

        var formData = {

            inicio : $('#iniciop').val(),
            termino : $('#terminop').val(),
            motivo : $('#motivop').val(),
            comentarios : $('#comentariosp').val(),

        };

        if ($('#idEstudioEdi').val() != "") { formData.idEstudio = $('#idEstudioEdi').val(); }
        /* valor de id de la seccion */
        if ($('#idPeriodo').val() != "") { formData.id = $('#idPeriodo').val(); }


        let idPeriodo = document.getElementById("idPeriodo").value;

        if(idPeriodo != ''){
            $.ajax({
                url: `/periodo/editar/${idPeriodo}`,
                method: 'GET',
                data: formData,
                headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')  },
                success: function(response) {
                    const div = document.getElementById('alerta');
                    div.style.display = 'block';
                    const tabla = $('#datatable8').DataTable();
                    tabla.destroy(); // Destruye la instancia del DataTable
                    $('#datatable8 tbody').empty(); // Limpia las filas de la tabla
                    /* limpiamos los valores */

                    $('#iniciop').val(''),
                    $('#terminop').val(''),
                    $('#motivop').val(''),
                    $('#comentariosp').val(''),

                    cargaPeriodos()
                },
                error: function(response) { alert('Error al crear la empresa.'); }
            });
        }
        else{

            $.ajax({
                url: `/periodo/crear`,
                method: 'POST',
                data: formData,
                headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')  },
                success: function(response) {
                    const div = document.getElementById('alerta');
                    div.style.display = 'block';

                    $('#datatable8 tbody').empty(); // Limpia las filas de la tabla

                    /* limpiamos los valores */
                    $('#iniciop').val(''),
                    $('#terminop').val(''),
                    $('#motivop').val(''),
                    $('#comentariosp').val(''),

                    /* traemos los valores */
                    cargaPeriodos()
                },
                error: function(response) { alert('Error al crear la empresa.'); }
            });
        }


    });
    /* funcion para eliminar documentos, */
    function eliPeriodo(id){
        $.ajax({
            url: `/periodo/eliminar/${id}`,
            method: 'DELETE',
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')  },
            success: function(response) {
                const div = document.getElementById('alerta');
                div.style.display = 'block';

                $('#datatable8 tbody').empty(); // Limpia las filas de la tabla
                cargaPeriodos()
            },
            error: function(response) { alert('Error al crear la empresa.'); }
        });

    }
    /* funcion para editar el documento */
    function veoEditoPeriodo(id,inicio,termino,motivo,comentarios){

        document.getElementById('idPeriodo').value = id
        document.getElementById('iniciop').value = inicio
        document.getElementById('terminop').value = termino
        document.getElementById('motivop').value = motivo
        document.getElementById('comentariosp').value = comentarios


        /*  document.getElementById('').value = */

    }

    /* HSITORIAL LABORAL */
    $('#btnHistorial').click(function(e) {
        e.preventDefault(); // Previene el envío normal del formulario
        /* var formData = $(this).serialize(); */ // Obtiene los datos del formulario

        var formData = {

            ultimo : $('#ultimoh').val(),
            vida : $('#vidah').val(),
            nusemana : $('#nusemanah').val(),
            porcentaje : $('#porcentajeh').val(),
            numeroempleadores : $('#numeroempleadoresh').val(),
            progresion : $('#progresionh').val(),
            finiquito : $('#finiquitoh').val(),
            liquidacion : $('#liquidacionh').val(),
            aguinaldo : $('#aguinaldoh').val(),
            vacaciones : $('#vacacionesh').val(),
            comentarios : $('#comentariosh').val(),

        };

        if ($('#idEstudioEdi').val() != "") {
            formData.idEstudio = $('#idEstudioEdi').val();
        }

        if ($('#idHistorial').val() != "") {
            formData.id = $('#idHistorial').val();
        }


        let idHistorial = document.getElementById("idHistorial").value;

        if(idHistorial != ''){
            $.ajax({
                url: `/historitall/editar/${idHistorial}`,
                method: 'GET',
                data: formData,
            /*  processData: false, // Necesario para evitar que jQuery procese los datos
                contentType: false, */
                headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')  },
                success: function(response) {
                    const div = document.getElementById('alerta');
                    div.style.display = 'block';
                },
                error: function(response) { alert('Error al crear la empresa.'); }
            });
        }
        else{

            $.ajax({
                url: `/historitall/crear`,
                method: 'POST',
                data: formData,
            /*  processData: false, // Necesario para evitar que jQuery procese los datos
                contentType: false, */
                headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')  },
                success: function(response) {
                    const div = document.getElementById('alerta');
                    div.style.display = 'block';
                },
                error: function(response) { alert('Error al crear la empresa.'); }
            });
        }

    });

    /* DESPIDOS */
    $('#btnDespidos').click(function(e) {
        e.preventDefault(); // Previene el envío normal del formulario
        /* var formData = $(this).serialize(); */ // Obtiene los datos del formulario

        var formData = {

            nombre : $('#nombredes').val(),
            periodo : $('#periododes').val(),
            motivo : $('#motivodes').val(),


        };

        if ($('#idEstudioEdi').val() != "") { formData.idEstudio = $('#idEstudioEdi').val(); }
        /* valor de id de la seccion */
        if ($('#idDespidos').val() != "") { formData.id = $('#idDespidos').val(); }


        let idDespidos = document.getElementById("idDespidos").value;

        if(idDespidos != ''){
            $.ajax({
                url: `/despidos/editar/${idDespidos}`,
                method: 'GET',
                data: formData,
                headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')  },
                success: function(response) {
                    const div = document.getElementById('alerta');
                    div.style.display = 'block';
                    const tabla = $('#datatable12').DataTable();
                    tabla.destroy(); // Destruye la instancia del DataTable
                    $('#datatable12 tbody').empty(); // Limpia las filas de la tabla
                    /* limpiamos los valores */
                    $('#idDespidos').val(''),
                    $('#nombredes').val(''),
                    $('#periododes').val(''),
                    $('#motivodes').val(''),


                    cargaDespidos()
                },
                error: function(response) { alert('Error al crear la empresa.'); }
            });
        }
        else{

            $.ajax({
                url: `/despidos/crear`,
                method: 'POST',
                data: formData,
                headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')  },
                success: function(response) {
                    const div = document.getElementById('alerta');
                    div.style.display = 'block';

                    $('#datatable12 tbody').empty(); // Limpia las filas de la tabla

                    /* limpiamos los valores */
                    $('#nombredes').val(''),
                    $('#periododes').val(''),
                    $('#motivodes').val(''),

                    /* traemos los valores */
                    cargaDespidos()
                },
                error: function(response) { alert('Error al crear la empresa.'); }
            });
        }


    });
    /* funcion para eliminar documentos, */
    function eliDespidos(id){
        $.ajax({
            url: `/despidos/eliminar/${id}`,
            method: 'DELETE',
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')  },
            success: function(response) {
                const div = document.getElementById('alerta');
                div.style.display = 'block';

                $('#datatable12 tbody').empty(); // Limpia las filas de la tabla
                cargaDespidos()
            },
            error: function(response) { alert('Error al crear la empresa.'); }
        });

    }
    /* funcion para editar el documento */
    function veoEditoDespidos(id,nombre,periodo,motivo,comentarios){

        document.getElementById('idDespidos').value = id
        document.getElementById('nombredes').value = nombre
        document.getElementById('periododes').value = periodo
        document.getElementById('motivodes').value = motivo
        document.getElementById('comentariosdes').value = comentarios


        /*  document.getElementById('').value = */

    }

    /* INCAPCAIDADES */
    $('#btnIncapacidades').click(function(e) {
        e.preventDefault(); // Previene el envío normal del formulario
        /* var formData = $(this).serialize(); */ // Obtiene los datos del formulario

        var formData = {

            nombre : $('#nombrein').val(),
            periodo : $('#periodoin').val(),
            motivo : $('#motivoin').val(),


        };

        if ($('#idEstudioEdi').val() != "") { formData.idEstudio = $('#idEstudioEdi').val(); }
        /* valor de id de la seccion */
        if ($('#idIncapacidades').val() != "") { formData.id = $('#idIncapacidades').val(); }


        let idIncapacidades = document.getElementById("idIncapacidades").value;

        if(idIncapacidades != ''){
            $.ajax({
                url: `/incapacidades/editar/${idIncapacidades}`,
                method: 'GET',
                data: formData,
                headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')  },
                success: function(response) {
                    const div = document.getElementById('alerta');
                    div.style.display = 'block';
                    const tabla = $('#datatable10').DataTable();
                    tabla.destroy(); // Destruye la instancia del DataTable
                    $('#datatable10 tbody').empty(); // Limpia las filas de la tabla
                    /* limpiamos los valores */
                    $('#idIncapacidades').val(''),
                    $('#nombrein').val(''),
                    $('#periodoin').val(''),
                    $('#motivoin').val(''),

                    cargaIncapacidades()
                },
                error: function(response) { alert('Error al crear la empresa.'); }
            });
        }
        else{

            $.ajax({
                url: `/incapacidades/crear`,
                method: 'POST',
                data: formData,
                headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')  },
                success: function(response) {
                    const div = document.getElementById('alerta');
                    div.style.display = 'block';

                    $('#datatable10 tbody').empty(); // Limpia las filas de la tabla

                    /* limpiamos los valores */
                    $('#nombrein').val(''),
                    $('#periodoin').val(''),
                    $('#motivoin').val(''),

                    /* traemos los valores */
                    cargaIncapacidades()
                },
                error: function(response) { alert('Error al crear la empresa.'); }
            });
        }


    });
    /* funcion para eliminar documentos, */
    function eliIncapacidades(id){
        $.ajax({
            url: `/incapacidades/eliminar/${id}`,
            method: 'DELETE',
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')  },
            success: function(response) {
                const div = document.getElementById('alerta');
                div.style.display = 'block';

                $('#datatable10 tbody').empty(); // Limpia las filas de la tabla
                cargaIncapacidades()
            },
            error: function(response) { alert('Error al crear la empresa.'); }
        });

    }
    /* funcion para editar el documento */
    function veoEditoIncapacidades(id,nombre,periodo,motivo,comentarios){

        document.getElementById('idIncapacidades').value = id
        document.getElementById('nombrein').value = nombre
        document.getElementById('periodoin').value = periodo
        document.getElementById('motivoin').value = motivo
        document.getElementById('comentariosin').value = comentarios


        /*  document.getElementById('').value = */

    }

    /* PROBLEMAS */
    $('#btnProblemas').click(function(e) {
        e.preventDefault(); // Previene el envío normal del formulario
        /* var formData = $(this).serialize(); */ // Obtiene los datos del formulario

        var formData = {

            nombre : $('#nombrepro').val(),
            informante : $('#informantepro').val(),
            comentarios : $('#comentariospro').val(),
            dato : $('#datopro').val(),

        };

        if ($('#idEstudioEdi').val() != "") {
            formData.idEstudio = $('#idEstudioEdi').val();
        }

        if ($('#idProblemas').val() != "") {
            formData.id = $('#idProblemas').val();
        }


        let idProblemas = document.getElementById("idProblemas").value;

        if(idProblemas != ''){
            $.ajax({
                url: `/problemas/editar/${idProblemas}`,
                method: 'GET',
                data: formData,
            /*  processData: false, // Necesario para evitar que jQuery procese los datos
                contentType: false, */
                headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')  },
                success: function(response) {
                    const div = document.getElementById('alerta');
                    div.style.display = 'block';
                },
                error: function(response) { alert('Error al crear la empresa.'); }
            });
        }
        else{

            $.ajax({
                url: `/problemas/crear`,
                method: 'POST',
                data: formData,
            /*  processData: false, // Necesario para evitar que jQuery procese los datos
                contentType: false, */
                headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')  },
                success: function(response) {
                    const div = document.getElementById('alerta');
                    div.style.display = 'block';
                },
                error: function(response) { alert('Error al crear la empresa.'); }
            });
        }

    });

    /* INFO LABORAL */
    $('#btnInfoLab').click(function(e) {
        e.preventDefault(); // Previene el envío normal del formulario
        /* var formData = $(this).serialize(); */ // Obtiene los datos del formulario

        var formData = {

            laboral : $('#laborall').val(),
            campol : $('#campol').val(),
            fechal : $('#fechal').val(),
            acuerdol : $('#acuerdol').val(),
            civiles : $('#civiles').val(),
            campoc : $('#campoc').val(),
            fechac : $('#fechac').val(),
            acuerdoc : $('#acuerdoc').val(),
            familiares : $('#familiares').val(),
            campof : $('#campof').val(),
            fechaf : $('#fechaf').val(),
            acuerdof : $('#acuerdof').val(),
            penales : $('#penales').val(),
            campop : $('#campop').val(),
            fechap : $('#fechap').val(),
            acuerdop : $('#acuerdop').val(),
            administrativa : $('#administrativa').val(),
            campoa : $('#campoa').val(),
            fechaa : $('#fechaa').val(),
            acuerdoa : $('#acuerdoa').val(),
            internacional : $('#internacional').val(),
            campoi : $('#campoi').val(),
            fechai : $('#fechai').val(),
            acuerdoi : $('#acuerdoi').val(),
            sat : $('#sat').val(),
            camposat : $('#camposat').val(),
            fechasat : $('#fechasat').val(),
            acuerdosat : $('#acuerdosat').val(),
            comentariol : $('#comentariol').val(),
            comentarioc : $('#comentarioc').val(),
            comentariof : $('#comentariof').val(),
            comentariop : $('#comentariop').val(),
            comentarioa : $('#comentarioa').val(),
            comentarioi : $('#comentarioi').val(),
            comentariosat : $('#comentariosat').val()

        };

        if ($('#idEstudioEdi').val() != "") {
            formData.idEstudio = $('#idEstudioEdi').val();
        }

        if ($('#idInfoLab').val() != "") {
            formData.id = $('#idInfoLab').val();
        }


        let idInfoLab = document.getElementById("idInfoLab").value;

        if(idInfoLab != ''){
            $.ajax({
                url: `/infoLab/editar/${idInfoLab}`,
                method: 'GET',
                data: formData,
            /*  processData: false, // Necesario para evitar que jQuery procese los datos
                contentType: false, */
                headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')  },
                success: function(response) {
                    const div = document.getElementById('alerta');
                    div.style.display = 'block';
                },
                error: function(response) { alert('Error al crear la empresa.'); }
            });
        }
        else{

            $.ajax({
                url: `/infoLab/crear`,
                method: 'POST',
                data: formData,
            /*  processData: false, // Necesario para evitar que jQuery procese los datos
                contentType: false, */
                headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')  },
                success: function(response) {
                    const div = document.getElementById('alerta');
                    div.style.display = 'block';
                },
                error: function(response) { alert('Error al crear la empresa.'); }
            });
        }

    });

    /* CREDITOS */
    $('#btnCreditos').click(function(e) {
        e.preventDefault(); // Previene el envío normal del formulario
        /* var formData = $(this).serialize(); */ // Obtiene los datos del formulario

        var formData = {

            fecha : $('#fechacc').val(),
            entidad : $('#entidadc').val(),
            monto : $('#montoc').val(),
            total : $('#totalc').val(),
            estatus : $('#estatusc').val(),
            comentario : $('#comentariocc').val(),
            endeudamiento : $('#endeudamientoc').val(),
            hipoteca : $('#hipotecac').val(),
            score : $('#scorec').val()

        };

        if ($('#idEstudioEdi').val() != "") { formData.idEstudio = $('#idEstudioEdi').val(); }
        /* valor de id de la seccion */
        if ($('#idCreditos').val() != "") { formData.id = $('#idCreditos').val(); }


        let idCreditos = document.getElementById("idCreditos").value;

        if(idCreditos != ''){
            $.ajax({
                url: `/creditos/editar/${idCreditos}`,
                method: 'GET',
                data: formData,
                headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')  },
                success: function(response) {
                    const div = document.getElementById('alerta');
                    div.style.display = 'block';
                    const tabla = $('#datatable11').DataTable();
                    tabla.destroy(); // Destruye la instancia del DataTable
                    $('#datatable11 tbody').empty(); // Limpia las filas de la tabla
                    /* limpiamos los valores */
                    $('#idCreditos').val(''),
                    $('#fechacc').val(''),
                    $('#entidadc').val(''),
                    $('#montoc').val(''),
                    $('#totalc').val(''),
                    $('#estatusc').val(''),
                    $('#comentariocc').val(''),
                    $('#endeudamientoc').val(''),
                    $('#hipotecac').val(''),
                    $('#scorec').val('')

                    cargaCreditos()
                },
                error: function(response) { alert('Error al crear la empresa.'); }
            });
        }
        else{

            $.ajax({
                url: `/creditos/crear`,
                method: 'POST',
                data: formData,
                headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')  },
                success: function(response) {
                    const div = document.getElementById('alerta');
                    div.style.display = 'block';

                    $('#datatable11 tbody').empty(); // Limpia las filas de la tabla

                    /* limpiamos los valores */

                    $('#fechacc').val(''),
                    $('#entidadc').val(''),
                    $('#montoc').val(''),
                    $('#totalc').val(''),
                    $('#estatusc').val(''),
                    $('#comentariocc').val(''),
                    $('#endeudamientoc').val(''),
                    $('#hipotecac').val(''),
                    $('#scorec').val('')
                    /* traemos los valores */
                    cargaCreditos()
                },
                error: function(response) { alert('Error al crear la empresa.'); }
            });
        }


    });
    /* funcion para eliminar documentos, */
    function eliCreditos(id){
        $.ajax({
            url: `/creditos/eliminar/${id}`,
            method: 'DELETE',
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')  },
            success: function(response) {
                const div = document.getElementById('alerta');
                div.style.display = 'block';

                $('#datatable11 tbody').empty(); // Limpia las filas de la tabla
                cargaCreditos()
            },
            error: function(response) { alert('Error al crear la empresa.'); }
        });

    }
    /* funcion para editar el documento */
    function veoEditoCreditos(id,fecha, entidad, monto, total, estatus, comentario, endeudamiento, hipoteca, score){
        document.getElementById('idCreditos').value=id
        document.getElementById('fechacc').value=fecha
        document.getElementById('entidadc').value=entidad
        document.getElementById('montoc').value=monto
        document.getElementById('totalc').value=total
        document.getElementById('estatusc').value=estatus
        document.getElementById('comentariocc').value=comentario
        document.getElementById('endeudamientoc').value=endeudamiento
        document.getElementById('hipotecac').value=hipoteca
        document.getElementById('scorec').value=score


        /*  document.getElementById('').value = */

    }

    /* INFONAVIT */
    $('#btnInfonavit').click(function(e) {
        e.preventDefault(); // Previene el envío normal del formulario
        /* var formData = $(this).serialize(); */ // Obtiene los datos del formulario

        var formData = {

            estatus : $('#estatusvit').val(),
            puntos : $('#puntosvit').val(),
            subcuenta : $('#subcuentavit').val(),
            maximo : $('#maximovit').val(),
            hipoteca : $('#hipotecavit').val(),

        };

        if ($('#idEstudioEdi').val() != "") {
            formData.idEstudio = $('#idEstudioEdi').val();
        }

        if ($('#idInfonavit').val() != "") {
            formData.id = $('#idInfonavit').val();
        }


        let idInfonavit = document.getElementById("idInfonavit").value;

        if(idInfonavit != ''){
            $.ajax({
                url: `/infonavit/editar/${idInfonavit}`,
                method: 'GET',
                data: formData,
            /*  processData: false, // Necesario para evitar que jQuery procese los datos
                contentType: false, */
                headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')  },
                success: function(response) {
                    const div = document.getElementById('alerta');
                    div.style.display = 'block';
                },
                error: function(response) { alert('Error al crear la empresa.'); }
            });
        }
        else{

            $.ajax({
                url: `/infonavit/crear`,
                method: 'POST',
                data: formData,
            /*  processData: false, // Necesario para evitar que jQuery procese los datos
                contentType: false, */
                headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')  },
                success: function(response) {
                    const div = document.getElementById('alerta');
                    div.style.display = 'block';
                },
                error: function(response) { alert('Error al crear la empresa.'); }
            });
        }

    });

    /* SERIVICIO MEDICO */
    $('#btnMedico').click(function(e) {
        e.preventDefault(); // Previene el envío normal del formulario
        /* var formData = $(this).serialize(); */ // Obtiene los datos del formulario

        var formData = {

            clinicai : $('#clinicai').val(),
            incidentei : $('#incidentei').val(),
            tipoi : $('#tipoi').val(),
            clinicaim : $('#clinicaim').val(),
            incidenteim : $('#incidenteim').val(),
            tipoim : $('#tipoim').val(),
            clinicais : $('#clinicais').val(),
            incidenteis : $('#incidenteis').val(),
            tipois : $('#tipois').val(),
            clinicase : $('#clinicase').val(),
            incidentese : $('#incidentese').val(),
            tipose : $('#tipose').val(),
            aseguradora : $('#aseguradora').val(),
            incidentepri : $('#incidentepri').val(),
            tipopri : $('#tipopri').val(),
            clinicaisse : $('#clinicaisse').val(),
            incidenteisse : $('#incidenteisse').val(),
            tipoisse : $('#tipoisse').val(),


        };

        if ($('#idEstudioEdi').val() != "") {
            formData.idEstudio = $('#idEstudioEdi').val();
        }

        if ($('#idMedico').val() != "") {
            formData.id = $('#idMedico').val();
        }


        let idMedico = document.getElementById("idMedico").value;

        if(idMedico != ''){
            $.ajax({
                url: `/medico/editar/${idMedico}`,
                method: 'GET',
                data: formData,
            /*  processData: false, // Necesario para evitar que jQuery procese los datos
                contentType: false, */
                headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')  },
                success: function(response) {
                    const div = document.getElementById('alerta');
                    div.style.display = 'block';
                },
                error: function(response) { alert('Error al crear la empresa.'); }
            });
        }
        else{

            $.ajax({
                url: `/medico/crear`,
                method: 'POST',
                data: formData,
            /*  processData: false, // Necesario para evitar que jQuery procese los datos
                contentType: false, */
                headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')  },
                success: function(response) {
                    const div = document.getElementById('alerta');
                    div.style.display = 'block';
                },
                error: function(response) { alert('Error al crear la empresa.'); }
            });
        }

    });

    /* DOCUMENTOS PRESENTADOS */
    $('#btnPresentados').click(function(e) {
        e.preventDefault(); // Previene el envío normal del formulario
        /* var formData = $(this).serialize(); */ // Obtiene los datos del formulario

        var formData = {

            documento : $('#documentodp').val(),
            ine : $('#inedp').val(),
            comprobante : $('#comprobantedp').val(),
            acta : $('#actadp').val(),
            cartas : $('#cartasdp').val(),
            aviso : $('#avisodp').val(),
            comentarios : $('#comentariosdp').val(),

        };

        if ($('#idEstudioEdi').val() != "") {
            formData.idEstudio = $('#idEstudioEdi').val();
        }

        if ($('#idPresentado').val() != "") {
            formData.id = $('#idPresentado').val();
        }


        let idPresentado = document.getElementById("idPresentado").value;

        if(idPresentado != ''){
            $.ajax({
                url: `/presentados/editar/${idPresentado}`,
                method: 'GET',
                data: formData,
            /*  processData: false, // Necesario para evitar que jQuery procese los datos
                contentType: false, */
                headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')  },
                success: function(response) {
                    const div = document.getElementById('alerta');
                    div.style.display = 'block';
                },
                error: function(response) { alert('Error al crear la empresa.'); }
            });
        }
        else{

            $.ajax({
                url: `/presentados/crear`,
                method: 'POST',
                data: formData,
            /*  processData: false, // Necesario para evitar que jQuery procese los datos
                contentType: false, */
                headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')  },
                success: function(response) {
                    const div = document.getElementById('alerta');
                    div.style.display = 'block';
                },
                error: function(response) { alert('Error al crear la empresa.'); }
            });
        }

    });

    /* GRADOS DE ESTUDIOS */
    $('#btnGrado').click(function(e) {
        e.preventDefault(); // Previene el envío normal del formulario
        /* var formData = $(this).serialize(); */ // Obtiene los datos del formulario

        var formData = {

            grado : $('#gradog').val(),
            nombre : $('#nombreg').val(),
            lugar : $('#lugarg').val(),
            periodo : $('#periodog').val(),
            documento : $('#documentog').val(),
            folio : $('#foliog').val(),

        };

        if ($('#idEstudioEdi').val() != "") { formData.idEstudio = $('#idEstudioEdi').val(); }
        /* valor de id de la seccion */
        if ($('#idGrado').val() != "") { formData.id = $('#idGrado').val(); }


        let idGrado = document.getElementById("idGrado").value;

        if(idGrado != ''){
            $.ajax({
                url: `/grados/editar/${idGrado}`,
                method: 'GET',
                data: formData,
                headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')  },
                success: function(response) {
                    const div = document.getElementById('alerta');
                    div.style.display = 'block';
                    const tabla = $('#datatable14').DataTable();
                    tabla.destroy(); // Destruye la instancia del DataTable
                    $('#datatable14 tbody').empty(); // Limpia las filas de la tabla
                    /* limpiamos los valores */
                    $('#idGrado').val(''),
                    $('#gradog').val(''),
                    $('#nombreg').val(''),
                    $('#lugarg').val(''),
                    $('#periodog').val(''),
                    $('#documentog').val(''),
                    $('#foliog').val(''),

                    cargaGrados()
                },
                error: function(response) { alert('Error al crear la empresa.'); }
            });
        }
        else{

            $.ajax({
                url: `/grados/crear`,
                method: 'POST',
                data: formData,
                headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')  },
                success: function(response) {
                    const div = document.getElementById('alerta');
                    div.style.display = 'block';

                    $('#datatable14 tbody').empty(); // Limpia las filas de la tabla

                    /* limpiamos los valores */

                    $('#gradog').val(''),
                    $('#nombreg').val(''),
                    $('#lugarg').val(''),
                    $('#periodog').val(''),
                    $('#documentog').val(''),
                    $('#foliog').val(''),
                    /* traemos los valores */
                    cargaGrados()
                },
                error: function(response) { alert('Error al crear la empresa.'); }
            });
        }


    });
    /* funcion para eliminar documentos, */
    function eliGrados(id){
        $.ajax({
            url: `/grados/eliminar/${id}`,
            method: 'DELETE',
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')  },
            success: function(response) {
                const div = document.getElementById('alerta');
                div.style.display = 'block';

                $('#datatable14 tbody').empty(); // Limpia las filas de la tabla
                cargaGrados()
            },
            error: function(response) { alert('Error al crear la empresa.'); }
        });

    }
    /* funcion para editar el documento */
    function veoEditoGrados(id,grado,nombre,lugar,periodo,documento,folio){
        document.getElementById('idGrado').value=id
        document.getElementById('gradog').value=grado
        document.getElementById('nombreg').value=nombre
        document.getElementById('lugarg').value=lugar
        document.getElementById('periodog').value=periodo
        document.getElementById('documentog').value=documento
        document.getElementById('foliog').value=folio

        /*  document.getElementById('').value = */

    }

    /* INVESTIGACIONES */
    $('#btnInvestigacion').click(function(e) {
        e.preventDefault(); // Previene el envío normal del formulario
        /* var formData = $(this).serialize(); */ // Obtiene los datos del formulario

        var formData = {

            cuentaConstancia : $('#cuentaConstanciai').val(),
            proporciono : $('#proporcionoi').val(),
            casoNo : $('#casoNoi').val(),
            demandado : $('#demandadoi').val(),
            actualmente : $('#actualmentei').val(),
            estabilidad : $('#estabilidadi').val(),
            inactividad : $('#inactividadi').val(),
            registoPatronal : $('#registoPatronali').val(),
            referenciayPeriodos : $('#referenciayPeriodosi').val(),
            dosEmpleos : $('#dosEmpleosi').val(),
            ausentismo : $('#ausentismoi').val(),
            abandono : $('#abandonoi').val(),
            desempenoRegular : $('#desempenoRegulari').val(),
            omitio : $('#omitioi').val(),
            informacion : $('#informacioni').val(),
            referencias : $('#referenciasi').val(),
            confiable : $('#confiablei').val(),
            comentarios : $('#comentariosi').val(),
            notasLegales : $('#notasLegalesi').val(),

        };

        if ($('#idEstudioEdi').val() != "") {
            formData.idEstudio = $('#idEstudioEdi').val();
        }

        if ($('#idInvestigacion').val() != "") {
            formData.id = $('#idInvestigacion').val();
        }


        let idInvestigacion = document.getElementById("idInvestigacion").value;

        if(idInvestigacion != ''){
            $.ajax({
                url: `/investigaciones/editar/${idInvestigacion}`,
                method: 'GET',
                data: formData,
            /*  processData: false, // Necesario para evitar que jQuery procese los datos
                contentType: false, */
                headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')  },
                success: function(response) {
                    const div = document.getElementById('alerta');
                    div.style.display = 'block';
                },
                error: function(response) { alert('Error al crear la empresa.'); }
            });
        }
        else{

            $.ajax({
                url: `/investigaciones/crear`,
                method: 'POST',
                data: formData,
            /*  processData: false, // Necesario para evitar que jQuery procese los datos
                contentType: false, */
                headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')  },
                success: function(response) {
                    const div = document.getElementById('alerta');
                    div.style.display = 'block';
                },
                error: function(response) { alert('Error al crear la empresa.'); }
            });
        }

    });

    /* ENTRONOS */
    $('#btnEntrono').click(function(e) {
        e.preventDefault(); // Previene el envío normal del formulario
        /* var formData = $(this).serialize(); */ // Obtiene los datos del formulario

        var formData = {

            comentarios : $('#comentariosenn').val(),
            tiempoVivir: $('#tiempoVivirenn').val(),
            calle : $('#calleenn').val(),
            numero : $('#numeroenn').val(),
            interior: $('#interiorenn').val(),
            colonia: $('#coloniaenn').val(),
            entre : $('#entreenn').val(),
            delegacionMunicpio: $('#delegacionMunicpioenn').val(),
            estado: $('#estadoenn').val(),
            cp : $('#cpenn').val(),
            color: $('#colorenn').val(),
            tipo : $('#tipoenn').val(),
            dondeEs : $('#dondeEsenn').val(),
            ubicacion: $('#ubicacionenn').val(),

        };

        if ($('#idEstudioEdi').val() != "") {
            formData.idEstudio = $('#idEstudioEdi').val();
        }

        if ($('#idEntornoccep').val() != "") {
            formData.id = $('#idEntornoccep').val();
        }


        let idEntornoccep = document.getElementById("idEntornoccep").value;

        if(idEntornoccep != ''){
            $.ajax({
                url: `/entornos/editar/${idEntornoccep}`,
                method: 'GET',
                data: formData,
            /*  processData: false, // Necesario para evitar que jQuery procese los datos
                contentType: false, */
                headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')  },
                success: function(response) {
                    const div = document.getElementById('alerta');
                    div.style.display = 'block';
                },
                error: function(response) { alert('Error al crear la empresa.'); }
            });
        }
        else{

            $.ajax({
                url: `/entornos/crear`,
                method: 'POST',
                data: formData,
            /*  processData: false, // Necesario para evitar que jQuery procese los datos
                contentType: false, */
                headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')  },
                success: function(response) {
                    const div = document.getElementById('alerta');
                    div.style.display = 'block';
                },
                error: function(response) { alert('Error al crear la empresa.'); }
            });
        }

    });

    /* CONCLUCIONES */
    $('#btnConclucionesccerp').click(function(e) {
        e.preventDefault(); // Previene el envío normal del formulario
        /* var formData = $(this).serialize(); */ // Obtiene los datos del formulario

        var formData = {

            acercaCandidato : $('#acercaCandidatocon').val(),
            acercaFamilia : $('#acercaFamiliacon').val(),
            conclucionesEntrevistador : $('#conclucionesEntrevistadorcon').val(),
            participacion : $('#participacioncon').val(),
            entorno : $('#entornocon').val(),
            referencias : $('#referenciascon').val(),
            comentariosGenerales : $('#comentariosGeneralescon').val(),
            analisisVerificacion : $('#analisisVerificacioncon').val(),
            atendio : $('#atendiocon').val(),
            presento : $('#presentocon').val(),
            documentacionCompartida : $('#documentacionCompartidacon').val(),
            referenciasPersonales : $('#referenciasPersonalescon').val(),
            estatusfinal : $('#estatusfinalcon').val()

        };

        if ($('#idEstudioEdi').val() != "") { formData.idEstudio = $('#idEstudioEdi').val(); }
        /* valor de id de la seccion */
        if ($('#idConclucionesccep').val() != "") { formData.id = $('#idConclucionesccep').val(); }


        let idConclucionesccep = document.getElementById("idConclucionesccep").value;

        if(idConclucionesccep != ''){
            $.ajax({
                url: `/concluciones/editar/${idConclucionesccep}`,
                method: 'GET',
                data: formData,
                headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')  },
                success: function(response) {
                    const div = document.getElementById('alerta');
                    div.style.display = 'block';
                    const tabla = $('#datatable16').DataTable();
                    tabla.destroy(); // Destruye la instancia del DataTable
                    $('#datatable16 tbody').empty(); // Limpia las filas de la tabla
                    /* limpiamos los valores */
                    $('#acercaCandidatocon').val(''),
                    $('#acercaFamiliacon').val(''),
                    $('#conclucionesEntrevistadorcon').val(''),
                    $('#participacioncon').val(''),
                    $('#entornocon').val(''),
                    $('#referenciascon').val(''),
                    $('#comentariosGeneralescon').val(''),
                    $('#analisisVerificacioncon').val(''),
                    $('#atendiocon').val(''),
                    $('#presentocon').val(''),
                    $('#documentacionCompartidacon').val(''),
                    $('#referenciasPersonalescon').val(''),
                    $('#estatusfinalcon').val(''),

                    cargaConcluciones()
                },
                error: function(response) { alert('Error al crear la empresa.'); }
            });
        }
        else{

            $.ajax({
                url: `/concluciones/crear`,
                method: 'POST',
                data: formData,
                headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')  },
                success: function(response) {
                    const div = document.getElementById('alerta');
                    div.style.display = 'block';

                    $('#datatable16 tbody').empty(); // Limpia las filas de la tabla
                    $('#idConclucionesccep').val(''),
                    /* limpiamos los valores */
                    $('#acercaCandidatocon').val(''),
                    $('#acercaFamiliacon').val(''),
                    $('#conclucionesEntrevistadorcon').val(''),
                    $('#participacioncon').val(''),
                    $('#entornocon').val(''),
                    $('#referenciascon').val(''),
                    $('#comentariosGeneralescon').val(''),
                    $('#analisisVerificacioncon').val(''),
                    $('#atendiocon').val(''),
                    $('#presentocon').val(''),
                    $('#documentacionCompartidacon').val(''),
                    $('#referenciasPersonalescon').val(''),
                    $('#estatusfinalcon').val(''),
                    /* traemos los valores */
                    cargaConcluciones()
                },
                error: function(response) { alert('Error al crear la empresa.'); }
            });
        }


    });
    /* funcion para eliminar documentos, */
    function eliConclucion(id){
        $.ajax({
            url: `/concluciones/eliminar/${id}`,
            method: 'DELETE',
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')  },
            success: function(response) {
                const div = document.getElementById('alerta');
                div.style.display = 'block';

                $('#datatable16 tbody').empty(); // Limpia las filas de la tabla
                cargaConcluciones()
            },
            error: function(response) { alert('Error al crear la empresa.'); }
        });

    }
    /* funcion para editar el documento */
    function veoEditoConclucion(id,acercaCandidato,acercaFamilia,conclucionesEntrevistador,participacion,entorno,referencias,comentariosGenerales,analisisVerificacion,atendio,presento,documentacionCompartida,referenciasPersonales,estatusfinal){

        document.getElementById('acercaCandidatocon').value= acercaCandidato
        document.getElementById('acercaFamiliacon').value=acercaFamilia
        document.getElementById('conclucionesEntrevistadorcon').value=conclucionesEntrevistador
        document.getElementById('participacioncon').value=participacion
        document.getElementById('entornocon').value=entorno
        document.getElementById('referenciascon').value=referencias
        document.getElementById('comentariosGeneralescon').value=comentariosGenerales
        document.getElementById('analisisVerificacioncon').value=analisisVerificacion
        document.getElementById('atendiocon').value=atendio
        document.getElementById('presentocon').value=presento
        document.getElementById('documentacionCompartidacon').value=documentacionCompartida
        document.getElementById('referenciasPersonalescon').value=referenciasPersonales
        document.getElementById('estatusfinalcon').value=estatusfinal
        document.getElementById('idConclucionesccep').value=id


        /*  document.getElementById('').value = */

    }



    /* /////////////////////////////////////////////////////////// */

    /* /////////////////////////////////////////////////////////// */
    /* FUNCIONES CARGA DE ARCHIVOS*/
    /* /////////////////////////////////////////////////////////// */
    document.getElementById('archivoDocument').addEventListener('change', async (event) => {
        const input = event.target;

        if (!input.files || input.files.length === 0) {
            alert("Por favor selecciona un archivo.");
            return;
        }

        const file = input.files[0];
        try {
            let optimizedBase64;

            if (file.type.startsWith('image/')) {
                // Procesar imágenes para reducir tamaño
                optimizedBase64 = await processImage(file);
            } else {
                // Comprimir y convertir otros tipos de archivo
                optimizedBase64 = await compressAndConvertToBase64(file);
            }

            // Mostrar el resultado en el textarea
            document.getElementById('outputBase64docu').value = optimizedBase64;
        } catch (error) {
            console.error("Error al procesar el archivo:", error);
            alert("Hubo un error al procesar el archivo.");
        }
    });

    /**
     * Procesa una imagen para reducir su tamaño y convertirla a Base64
     * @param {File} file - Archivo de imagen
     * @returns {Promise<string>} - Cadena en formato Base64
     */
     async function processImage(file) {
        return new Promise((resolve, reject) => {
            const reader = new FileReader();
            reader.onload = () => {
                const img = new Image();
                img.onload = () => {
                    const canvas = document.createElement('canvas');
                    const ctx = canvas.getContext('2d');

                    const maxWidth = 800;
                    const maxHeight = 800;
                    let width = img.width;
                    let height = img.height;

                    if (width > maxWidth || height > maxHeight) {
                        if (width > height) {
                            height = Math.round((maxHeight / width) * height);
                            width = maxWidth;
                        } else {
                            width = Math.round((maxWidth / height) * width);
                            height = maxHeight;
                        }
                    }

                    canvas.width = width;
                    canvas.height = height;
                    ctx.drawImage(img, 0, 0, width, height);

                    const base64 = canvas.toDataURL(file.type);
                    resolve(base64);
                };
                img.onerror = (err) => reject(err);
                img.src = reader.result;
            };
            reader.onerror = (err) => reject(err);
            reader.readAsDataURL(file);
        });
    }

    /**
     * Comprime y convierte cualquier archivo a Base64
     * @param {File} file - Archivo cargado
     * @returns {Promise<string>} - Cadena en formato Base64
     */
    async function compressAndConvertToBase64(file) {
        return new Promise((resolve, reject) => {
            const reader = new FileReader();
            reader.onload = async () => {
                try {
                    const zip = new JSZip();
                    zip.file(file.name, reader.result);
                    const compressedBlob = await zip.generateAsync({ type: "blob" });

                    // Convertir Blob comprimido a Base64
                    const compressedReader = new FileReader();
                    compressedReader.onload = () => resolve(compressedReader.result);
                    compressedReader.onerror = (err) => reject(err);
                    compressedReader.readAsDataURL(compressedBlob);
                } catch (error) {
                    reject(error);
                }
            };
            reader.onerror = (err) => reject(err);
            reader.readAsArrayBuffer(file);
        });
    }
    /* /////////////////////////////////////////////////////////// */

</script>


