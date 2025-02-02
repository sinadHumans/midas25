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
                                    <li class="breadcrumb-item active">Estudios Cancelados</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- seccion de alerta --}}
                @include('include.aviso')

                {{-- avisos del dia --}}
                <div class="row">

                    <div class="col-xl-12">
                        <div class="card border mb-0">
                            <div class="card-body">
                                <table id="datatable1" class="table table-hover table-bordered table-striped dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Nombre</th>
                                            <th>Puesto</th>
                                            <th>NSS</th>
                                            <th>Correo</th>
                                            <th>Celular</th>
                                            <th>Sexo</th>
                                            <th>Solicita</th>
                                            <th>Estatus</th>
                                            <th>Fecha Cancelación</th>
                                            <th>Motivo</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($estudios as $empresa)
                                            <tr>
                                                <td>{{ $empresa->id }}</td>
                                                <td>{{ $empresa->nombreCandidato }}</td>
                                                <td>{{ $empresa->puesto }}</td>
                                                <td>{{ $empresa->nss }}</td>
                                                <td>{{ $empresa->correo }}</td>
                                                <td>{{ $empresa->celular }}</td>
                                                <td>{{ $empresa->sexo }}</td>
                                                <td>{{ $empresa->idUsuario }}</td>
                                                <td>
                                                    Cancelado

                                                </td>
                                                <td>{{ $empresa->fechaCancelacion }}</td>
                                                <td>{{ $empresa->motivoCancelacion }}</td>

                                                <td>
                                                    {{-- archivos --}}
                                                    <a onclick="verDocEstudios({{ $empresa }},{{ $empresa->estatus }})"><button class="btn btn-outline-info"><i class="fas fa-file-alt"></i></button></a>

                                                    {{-- reporte --}}
                                                    <a href="/estudio/reporte/{{ $empresa->id }}"><button class="btn btn-outline-success"><i class=" far fa-chart-bar"></i></button></a>
                                                </td>
                                            </tr>
                                        @endforeach


                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

        @include('include.pie')

    </div>
</div>

{{-- seccion de modals --}}


{{-- modal para el resumen del estudio --}}
<div class="modal fade" id="resumenEstudio" tabindex="-1" role="dialog" aria-labelledby="modal1Label" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal1Label">Información estudio</h5>
                <button type="button" class="btn btn-sm btn-label-danger btn-icon" data-bs-dismiss="modal" aria-label="Close"> <i class="mdi mdi-close"></i></button>
            </div>

                <div class="modal-body">

                    <div class="card portlet border">
                        <div class="card-header portlet-header"> Datos Generales </div>
                        <div class="card-body">
                            <div class="row">

                                <div class="col-lg-4">
                                    <label for="exampleFormControlInput1" class="form-label">Nombre</label>
                                    <input type="text" class="form-control" id="nombreCandidatoe" disabled/>
                                </div>

                                <div class="col-lg-4">
                                    <label for="exampleFormControlInput1" class="form-label">Apellido paterno</label>
                                    <input type="text" class="form-control" id="apePaternoe" disabled  />
                                </div>

                                <div class="col-lg-4">
                                    <label for="exampleFormControlInput1" class="form-label">Apellido materno</label>
                                    <input type="text" class="form-control" id="apeMaternoe" disabled  />
                                </div>

                                <div class="col-lg-3">
                                    <label for="exampleFormControlInput1" class="form-label">Edad</label>
                                    <input type="text" class="form-control" id="edade" disabled  />
                                </div>

                                <div class="col-lg-3">
                                    <label for="exampleFormControlInput1" class="form-label">Sexo</label>
                                    <input type="text" class="form-control" id="sexoe" disabled  />
                                </div>

                                <div class="col-lg-3">
                                    <label for="exampleFormControlInput1" class="form-label">Estado Civil</label>
                                    <input type="text" class="form-control" id="estadoCivile" disabled  />
                                </div>

                                <div class="col-lg-3">
                                    <label for="exampleFormControlInput1" class="form-label">Hijos</label>
                                    <input type="number" class="form-control" id="hijose" disabled  />
                                </div>

                                <div class="col-lg-3">
                                    <label for="exampleFormControlInput1" class="form-label">NSS</label>
                                    <input type="text" class="form-control" id="nsse" disabled  />
                                </div>

                                <div class="col-lg-3">
                                    <label for="exampleFormControlInput1" class="form-label">RFC</label>
                                    <input type="text" class="form-control" id="rfce" disabled  />
                                </div>

                                <div class="col-lg-3">
                                    <label for="exampleFormControlInput1" class="form-label">CURP</label>
                                    <input type="text" class="form-control" id="curpe" disabled  />
                                </div>

                                <div class="col-lg-3">
                                    <label for="exampleFormControlInput1" class="form-label">Lugar de nacimiento</label>
                                    <input type="text" class="form-control" id="lugarNacimientoe" disabled  />
                                </div>

                                <div class="col-lg-3">
                                    <label for="exampleFormControlInput1" class="form-label">Fecha Nacimiento</label>
                                    <input type="date" class="form-control" id="fechaNacimientoe" disabled  />
                                </div>

                                <div class="col-lg-3">
                                    <label for="exampleFormControlInput1" class="form-label">Nacionalidad</label>
                                    <input type="text" class="form-control" id="nacionalidade" disabled  />
                                </div>

                                <div class="col-lg-3">
                                    <label for="exampleFormControlInput1" class="form-label">Puesto</label>
                                    <input type="text" class="form-control" id="puestoe" disabled  />
                                </div>

                                <div class="col-lg-3">
                                    <label for="exampleFormControlInput1" class="form-label">Tipo de servicio</label>
                                    <input type="text" class="form-control" id="tiposervicioe" disabled  />

                                </div>

                                <div class="col-lg-3">
                                    <label for="exampleFormControlInput1" class="form-label">Escolaridad</label>
                                    <input type="text" class="form-control" id="escolaridade" disabled  />

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
                                    <input type="text" class="form-control" id="telefonoe" disabled  />
                                </div>

                                <div class="col-lg-3">
                                    <label for="exampleFormControlInput1" class="form-label">Correo</label>
                                    <input type="mail" class="form-control" id="correoe" disabled  />
                                </div>

                                <div class="col-lg-3">
                                    <label for="exampleFormControlInput1" class="form-label">Celular</label>
                                    <input type="text" class="form-control" id="celulare" disabled />
                                </div>

                                <div class="col-lg-3">
                                    <label for="exampleFormControlInput1" class="form-label">Otro contacto</label>
                                    <input type="text" class="form-control" id="otroContactoe" disabled  />
                                </div>

                                <div class="col-lg-3">
                                    <label for="exampleFormControlInput1" class="form-label">Infonavit</label>
                                    <input type="text" class="form-control" id="infonavite" disabled  />
                                </div>

                                <div class="col-lg-3">
                                    <label for="exampleFormControlInput1" class="form-label">Fonacot</label>
                                    <input type="text" class="form-control" id="fonacote" disabled />
                                </div>

                                <div class="col-lg-3">
                                    <label for="exampleFormControlInput1" class="form-label">Clinica IMSS</label>
                                    <input type="text" class="form-control" id="clincaImsse" disabled />
                                </div>

                                <div class="col-lg-3">
                                    <label for="exampleFormControlInput1" class="form-label">Vive con</label>
                                    <input type="text" class="form-control" id="viveCone" disabled  />
                                </div>

                                <div class="col-lg-3">
                                    <label for="exampleFormControlInput1" class="form-label">Dirección</label>
                                    <input type="text" class="form-control" id="direccione" disabled  />
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="card portlet border">
                        <div class="card-header portlet-header">Asignaciones </div>
                        <div class="card-body">
                            <div class="row">

                                <div class="col-lg-3">
                                    <label for="exampleFormControlInput1" class="form-label">Analista</label>
                                    <input type="text" class="form-control" id="realizoe" disabled  />

                                </div>

                                <div class="col-lg-3">
                                    <label for="exampleFormControlInput1" class="form-label">Encuestador</label>
                                    <input type="text" class="form-control" id="encuestadore" disabled  />

                                </div>

                                <div class="col-lg-3">
                                    <label for="exampleFormControlInput1" class="form-label">Empresa</label>
                                    <input type="text" class="form-control" id="idEmpresae" disabled  />

                                </div>

                                <div class="col-lg-3">
                                    <label for="exampleFormControlInput1" class="form-label">Fecha Aplicación</label>
                                    <input type="text" class="form-control" id="fechaSolicitude" disabled  />

                                </div>

                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">

                    <button class="btn btn-outline-danger" data-bs-dismiss="modal" aria-label="Close">Cerrar</button>
                </div>

        </div>
    </div>
</div>

{{-- modal para ver los documentos cancelar por el cliente --}}
<div class="modal fade" id="docEstudio" tabindex="-1" role="dialog" aria-labelledby="modal1Label" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal1Label">Documentos del estudio </h5>
                <button type="button" class="btn btn-sm btn-label-danger btn-icon" data-bs-dismiss="modal" aria-label="Close"> <i class="mdi mdi-close"></i></button>
            </div>
            <form id="">
                @csrf
                <input type="hidden" id="idEstudioCancelar">
                <div class="modal-body">

                    <div class="card portlet border">
                        <div class="card-header portlet-header"> Foto y Curriculum </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6"><div id="foto" class="text-center"></div></div>
                                <div class="col-md-6"><div id="cv" class="text-center"></div></div>
                            </div>

                        </div>
                    </div>

                    <div class="card portlet border">
                        <div class="card-header portlet-header"> Documentos </div>
                        <div class="card-body">
                            <div id="archivos"></div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">

                    <button class="btn btn-outline-danger">Cerrar</button>
                </div>
            </form>
        </div>
    </div>
</div>


@include('include.footer')
<script type="text/javascript">

    /* carga de datatable */
    $(function () {
      var table = $('#datatable1').DataTable({
          processing: true,
          responsive: true,
          language: { url: '//cdn.datatables.net/plug-ins/1.10.21/i18n/Spanish.json' }
      });
    });

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
               console.log(response)
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

    function cataempresasedi(){
        var url = `/empresas/relacion/`;
        $.ajax({
            url: url,
            method: 'GET',
            success: function(response) {
               console.log(response)
               let datos = response.data
               const select = document.createElement('select');
                select.id = "idEmpresaedid";
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
                document.getElementById('select-containeredi').appendChild(select);
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
                    option.value = item.name; // Usar el ID como valor
                    option.text = item.name; // Usar el nombre como texto visible
                    select.appendChild(option);
                });

                // Agregar el <select> al contenedor en el DOM
                document.getElementById('select-containera').appendChild(select);
            },
            error: function(response) { alert('Error al editar la empresa.'); }
        });
    }

    function catEjecutivosedi(){
        var url = `/usuarios/relacionEje/`;
        $.ajax({
            url: url,
            method: 'GET',
            success: function(response) {
               let datos = response.data
               const select = document.createElement('select');
                select.id = "realizoEdi";
                select.classList.add('form-control');

                // Agregar una opción por defecto
                const defaultOption = document.createElement('option');
                defaultOption.text = "Seleccione una opción";
                defaultOption.value = "";
                select.appendChild(defaultOption);

                // Llenar el <select> con las opciones del JSON
                datos.forEach(item => {
                    const option = document.createElement('option');
                    option.value = item.name; // Usar el ID como valor
                    option.text = item.name; // Usar el nombre como texto visible
                    select.appendChild(option);
                });

                // Agregar el <select> al contenedor en el DOM
                document.getElementById('select-containeraedi').appendChild(select);
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
               console.log(response)
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
                    option.value = item.name; // Usar el ID como valor
                    option.text = item.name; // Usar el nombre como texto visible
                    select.appendChild(option);
                });

                // Agregar el <select> al contenedor en el DOM
                document.getElementById('select-containere').appendChild(select);
            },
            error: function(response) { alert('Error al editar la empresa.'); }
        });
    }

    function catEncuestadoresedi(){
        var url = `/usuarios/relacionEcu/`;
        $.ajax({
            url: url,
            method: 'GET',
            success: function(response) {
               console.log(response)
               let datos = response.data
               const select = document.createElement('select');
                select.id = "encuestadoredi";
                select.classList.add('form-control');

                // Agregar una opción por defecto
                const defaultOption = document.createElement('option');
                defaultOption.text = "Seleccione una opción";
                defaultOption.value = "";
                select.appendChild(defaultOption);

                // Llenar el <select> con las opciones del JSON
                datos.forEach(item => {
                    const option = document.createElement('option');
                    option.value = item.name; // Usar el ID como valor
                    option.text = item.name; // Usar el nombre como texto visible
                    select.appendChild(option);
                });

                // Agregar el <select> al contenedor en el DOM
                document.getElementById('select-containereedi').appendChild(select);
            },
            error: function(response) { alert('Error al editar la empresa.'); }
        });
    }
    /* /////////////////////////////////////////////////////////// */


    /* /////////////////////////////////////////////////////////// */

    /* /////////////////////////////////////////////////////////// */
    /* CREARCION */
    /* /////////////////////////////////////////////////////////// */
    /* boton crear */
    $('#btnCrear').click(function(e) {
        e.preventDefault(); // Previene el envío normal del formulario
        /* var formData = $(this).serialize(); */ // Obtiene los datos del formulario
        var url = '{{ route('estudio.crear') }}';
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
                realizo: $('#realizo').val()

            };
        $.ajax({
            url: url,
            method: 'POST',
            data: formData,
           /*  processData: false, // Necesario para evitar que jQuery procese los datos
            contentType: false, */
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')  },
            success: function(response) {
                $('#modal11').modal('hide');
                const div = document.getElementById('alerta');
                div.style.display = 'block';
                setTimeout(() => { location.reload(); }, 1000);
            },
            error: function(response) { alert('Error al crear la empresa.'); }
        });
    });
    /* /////////////////////////////////////////////////////////// */

    /* /////////////////////////////////////////////////////////// */
    /* FUNCION PARA RESUMEN DE ESTUDIO */
    /* /////////////////////////////////////////////////////////// */
    function resumenEstudio(valores){
        $('#resumenEstudio').modal('show');
        document.getElementById('nombreCandidatoe').value = valores.nombreCandidato
        document.getElementById('apePaternoe').value = valores.apePaterno
        document.getElementById('apeMaternoe').value = valores.apeMaterno
        document.getElementById('edade').value = valores.edad
        document.getElementById('sexoe').value = valores.sexo
        document.getElementById('estadoCivile').value = valores.estadoCivil
        document.getElementById('hijose').value = valores.hijos
        document.getElementById('nsse').value = valores.nss
        document.getElementById('rfce').value = valores.rfc
        document.getElementById('curpe').value = valores.curp
        document.getElementById('lugarNacimientoe').value = valores.lugarNacimiento
        document.getElementById('fechaNacimientoe').value = valores.fechaNacimiento
        document.getElementById('nacionalidade').value = valores.nacionalidad
        document.getElementById('puestoe').value = valores.puesto
        document.getElementById('tiposervicioe').value = valores.tiposervicio
        document.getElementById('escolaridade').value = valores.escolaridad
        document.getElementById('telefonoe').value = valores.telefono
        document.getElementById('correoe').value = valores.correo
        document.getElementById('celulare').value = valores.celular
        document.getElementById('otroContactoe').value = valores.otroContacto
        document.getElementById('infonavite').value = valores.infonavit
        document.getElementById('fonacote').value = valores.fonacot
        document.getElementById('clincaImsse').value = valores.clincaImss
        document.getElementById('viveCone').value = valores.viveCon
        document.getElementById('direccione').value = valores.direccion
        document.getElementById('realizoe').value = valores.realizo
        document.getElementById('encuestadore').value = valores.encuestador
        document.getElementById('idEmpresae').value = valores.idEmpresa
        document.getElementById('fechaSolicitude').value = valores.fechaSolicitud


    }
    /* /////////////////////////////////////////////////////////// */

    /* /////////////////////////////////////////////////////////// */
    /* FUNCION PARA IR A LA EDICION DEL ESTUDIO */
    /* /////////////////////////////////////////////////////////// */
    function editarEstudio(id){

        var formData = new FormData();

        // Agregar campos al FormData, verificando si los valores son válidos
        formData.append("id", id);

        const idUsu = id;

        $.ajax({
            url: `/estudio/editar/${idUsu}`,
            method: "POST",
            data: formData,
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'), },
            processData: false, // Evitar que jQuery procese los datos
            contentType: false, // Permitir que se establezca el encabezado de tipo de contenido adecuado
            success: function (response) {
                console.log("envio")
            },
            error: function (response) {
                alert("Error al editar la empresa.");
            }
        });// Creamos un objeto formData


    }
    /* /////////////////////////////////////////////////////////// */

    /* /////////////////////////////////////////////////////////// */
    /* FUNCION PARA IR A LA EDICION DEL ESTUDIO CLIENTE */
    /* /////////////////////////////////////////////////////////// */
    function edicionEstudioCliente(valores){

        $('#editarCliente').modal('show');
        document.getElementById('idEstudioEdiCli').value = valores.id
        document.getElementById('nombreCandidatoedi').value = valores.nombreCandidato
        document.getElementById('apePaternoedi').value = valores.apePaterno
        document.getElementById('apeMaternoedi').value = valores.apeMaterno
        document.getElementById('edadedi').value = valores.edad
        document.getElementById('sexoedi').value = valores.sexo
        document.getElementById('estadoCiviledi').value = valores.estadoCivil
        document.getElementById('hijosedi').value = valores.hijos
        document.getElementById('nssedi').value = valores.nss
        document.getElementById('rfcedi').value = valores.rfc
        document.getElementById('curpedi').value = valores.curp
        document.getElementById('lugarNacimientoedi').value = valores.lugarNacimiento
        document.getElementById('fechaNacimientoedi').value = valores.fechaNacimiento
        document.getElementById('nacionalidadedi').value = valores.nacionalidad
        document.getElementById('puestoedi').value = valores.puesto
        document.getElementById('tiposervicioedi').value = valores.tiposervicio
        document.getElementById('escolaridadedi').value = valores.escolaridad
        document.getElementById('telefonoedi').value = valores.telefono
        document.getElementById('correoedi').value = valores.correo
        document.getElementById('celularedi').value = valores.celular
        document.getElementById('otroContactoedi').value = valores.otroContacto
        document.getElementById('infonavitedi').value = valores.infonavit
        document.getElementById('fonacotedi').value = valores.fonacot
        document.getElementById('clincaImssedi').value = valores.clincaImss
        document.getElementById('viveConedi').value = valores.viveCon
        document.getElementById('direccionedi').value = valores.direccion
        document.getElementById('fechaSolicitudedi').value = valores.fechaSolicitud


    }
    $('#btnEditar').click(function(e) {
        e.preventDefault(); // Previene el envío normal del formulario
        /* var formData = $(this).serialize(); */ // Obtiene los datos del formulario

        var formData = {

            nombreCandidato: $('#nombreCandidatoedi').val(),
            apePaterno: $('#apePaternoedi').val(),
            apeMaterno: $('#apeMaternoedi').val(),
            edad: $('#edadedi').val(),
            sexo: $('#sexoedi').val(),
            estadoCivil: $('#estadoCiviledi').val(),
            hijos: $('#hijosedi').val(),
            nss: $('#nssedi').val(),
            rfc: $('#rfcedi').val(),
            curp: $('#curpedi').val(),
            lugarNacimiento: $('#lugarNacimientoedi').val(),
            fechaNacimiento: $('#fechaNacimientoedi').val(),
            nacionalidad: $('#nacionalidadedi').val(),
            puesto: $('#puestoedi').val(),
            tiposervicio: $('#tiposervicioedi').val(),
            escolaridad: $('#escolaridadedi').val(),
            telefono: $('#telefonoedi').val(),
            correo: $('#correoedi').val(),
            celular: $('#celularedi').val(),
            otroContacto: $('#otroContactoedi').val(),
            infonavit: $('#infonavitedi').val(),
            fonacot: $('#fonacotedi').val(),
            clincaImss: $('#clincaImssedi').val(),
            viveCon: $('#viveConedi').val(),
            direccion: $('#direccionedi').val(),
            fechaSolicitud: $('#fechaSolicitudedi').val()

        };

        let idUsu = document.getElementById("idEstudioEdiCli").value;

        $.ajax({
            url: `/estudio/editaEstudioCliente/${idUsu}`,
            method: 'POST',
            data: formData,
           /*  processData: false, // Necesario para evitar que jQuery procese los datos
            contentType: false, */
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')  },
            success: function(response) {
                $('#editarCliente').modal('hide');
                const div = document.getElementById('alerta');
                div.style.display = 'block';
                setTimeout(() => { location.reload(); }, 1000);
            },
            error: function(response) { alert('Error al crear la empresa.'); }
        });
    });
    /* /////////////////////////////////////////////////////////// */

    /* /////////////////////////////////////////////////////////// */
    /* FUNCION PARA CANCELAR EL ESTUDIO */
    /* /////////////////////////////////////////////////////////// */
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
               setTimeout(() => { location.reload(); }, 1000);
            },
            error: function(response) { alert('Error al cancelar estudio.'); }
        });
    });

    /* /////////////////////////////////////////////////////////// */
     /* /////////////////////////////////////////////////////////// */
    /* FUNCION PARA VER ARchivos */
    /* /////////////////////////////////////////////////////////// */
    function verDocEstudios(valores){
        $('#docEstudio').modal('show');
        const div = document.getElementById('foto');
        div.innerHTML = `<a href="${valores.archivo}" download>Ver Foto</a>`;
        const divw = document.getElementById('cv');
        divw.innerHTML = `<a href="${valores.cv}" download>Ver cv</a>`;

        traerdoc1(valores.id);
    }
    function traerdoc1(idUsu){

        $.ajax({
        url: `/documentos/muestro/${idUsu}`,
        method: 'POST',
        /*  processData: false, // Necesario para evitar que jQuery procese los datos
        contentType: false, */
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')  },
        success: function(response) {

            const array = response.data
            const div = document.getElementById('archivos');
            const ul = document.createElement('ul');

            array.forEach(item => {
                const li = document.createElement('li');
                li.innerHTML  = `<a href="${item.archivo}" download>${item.titulo}</a>`;
                ul.appendChild(li);
            });

            div.appendChild(ul);

        },
        error: function(response) { alert('Error al crear la empresa.'); }
        });

    }

    /* /////////////////////////////////////////////////////////// */

    /* /////////////////////////////////////////////////////////// */

    /* /////////////////////////////////////////////////////////// */
    /* funcion para la conversion de archivo crear*/
    document.getElementById('fileInputc').addEventListener('change', async (event) => {
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
            document.getElementById('outputBase64c').value = optimizedBase64;
        } catch (error) {
            console.error("Error al procesar el archivo:", error);
            alert("Hubo un error al procesar el archivo.");
        }
    });

    /* para el aedicion de archivo */
    document.getElementById('fileInputf').addEventListener('change', async (event) => {
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
            document.getElementById('outputBase64f').value = optimizedBase64;
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


