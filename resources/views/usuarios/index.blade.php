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
                                    <li class="breadcrumb-item active">Usuarios</li>
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
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-xl-10">
                                        <div class="alert alert-label-primary text-center" style="display: none;" id="alerta"><b>Acción realizada</b></div>
                                    </div>
                                    <div class="col-xl-2">
                                        <button class="btn btn-outline-success" style="width: 100%" data-bs-toggle="modal" data-bs-target="#modal11">Nuevo usuario</button>
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>

                    <hr>
                    <div class="col-xl-12">
                        <div class="card border mb-0">
                            <div class="card-body">
                                <table id="datatable1" class="table table-hover table-bordered table-striped " style="border-collapse: collapse; width: 100%;">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Archivo</th>
                                            <th>Nombre</th>
                                            <th>Correo</th>
                                            <th>Empresa</th>
                                            <th>Tipo</th>
                                            <th>Banco / Cuenta</th>
                                            <th>Estatus</th>
                                            <th>Permisos</th>
                                            <th>Observaciones</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($usuarios as $empresa)
                                            <tr>
                                                <td>{{ $empresa->id }}</td>
                                                <td>
                                                    @if ($empresa->archivo != null)
                                                        <img src="{{ $empresa->archivo }}" class="img-thumbnail rounded avatar-2xs p-0">
                                                    @endif
                                                    @if ($empresa->archivo == null )
                                                    <img src="{{asset('backend/assets/images/users/avatar-6.png')}}" class="img-thumbnail rounded avatar-2xs p-0" alt="">
                                                    @endif
                                                </td>
                                                <td>{{ $empresa->name }}</td>
                                                <td>{{ $empresa->email }}</td>
                                                <td>{{ $empresa->idEmpresa }}</td>
                                                <td>{{ $empresa->tipo }}</td>
                                                <td>{{ $empresa->banco }}  {{ $empresa->cuenta }}</td>
                                                <td>
                                                    @if ($empresa->estatus == 1)
                                                        Activo
                                                    @endif
                                                    @if ($empresa->estatus == 2 )
                                                        Inactivo
                                                    @endif
                                                </td>
                                                <td>{{ $empresa->permisos }}</td>
                                                <td>{{ $empresa->observaciones }}</td>
                                                <td>
                                                    <a onclick="editarRegistro('{{$empresa->id }}','{{$empresa->name }}','{{$empresa->email }}','{{$empresa->password }}','{{$empresa->estatus }}','{{$empresa->idEmpresa }}','{{$empresa->tipo }}','{{$empresa->banco }}','{{$empresa->cuenta }}','{{$empresa->observaciones }}','{{$empresa->permisos }}','{{$empresa->archivo }}')"><button class="btn btn-outline-success"><i class=" fas fa-edit"></i></button></a>

                                                    @if ($empresa->estatus == 1)
                                                        <a onclick="actualizarEstatus({{ $empresa->id }},{{ $empresa->estatus }})"><button class="btn btn-outline-danger"><i class="fas fa-arrow-down"></i></button></a>
                                                    @endif
                                                    @if ($empresa->estatus == 2)
                                                        <a onclick="actualizarEstatus({{ $empresa->id }},{{ $empresa->estatus }})"><button class="btn btn-outline-success"><i class="fas fa-arrow-up"></i></button></a>
                                                    @endif
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

{{-- modal de creacion --}}
<div class="modal fade" id="modal11" tabindex="-1" role="dialog" aria-labelledby="modal1Label" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal1Label">Nuevo registro</h5>
                <button type="button" class="btn btn-sm btn-label-danger btn-icon" data-bs-dismiss="modal" aria-label="Close"> <i class="mdi mdi-close"></i></button>
            </div>
            <form id="createEmpresaForm">
                @csrf
                <div class="modal-body">
                    <input type="hidden" class="form-control" id="idUsuario" name="idUsuario" value="{{ session('id') }}" />
                    <div class="row">
                        <div class="col-lg-4">
                            <label for="exampleFormControlInput1" class="form-label">Nombre</label>
                            <input type="text" class="form-control" id="name" name="name"  />
                        </div>
                        <div class="col-lg-4">
                            <label for="exampleFormControlInput1" class="form-label">Correo</label>
                            <input type="mail" class="form-control" id="email" name="email"  />
                        </div>
                        <div class="col-lg-4">
                            <label for="exampleFormControlInput1" class="form-label">Clave</label>
                            <input type="password" class="form-control" id="password" name="password"  />
                        </div>
                        <div class="col-lg-4">
                            <label for="exampleFormControlInput1" class="form-label">Empresa</label>
                            <div id="select-container"></div>
                        </div>
                        <div class="col-lg-4">
                            <label for="exampleFormControlInput1" class="form-label">Banco</label>
                            <input type="text" class="form-control" id="banco" name="banco"  />
                        </div>
                        <div class="col-lg-4">
                            <label for="exampleFormControlInput1" class="form-label">Cuenta</label>
                            <input type="text" class="form-control" id="cuenta" name="cuenta"  />
                        </div>
                        <div class="col-lg-4">
                            <label for="exampleFormControlInput1" class="form-label">Archivo</label>
                            <input type="file" class="form-control" id="fileInput" name="fileInput"  />
                        </div>

                        <div class="col-lg-4">
                            <label for="exampleFormControlInput1" class="form-label">Permisos</label>
                            <select class="form-control" name="permisos" id="permisos">
                                @foreach (config('catalogos.catPermisos') as $key => $value)
                                    <option value="{{ $key }}"> {{ $value }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-lg-4">
                            <label for="exampleFormControlInput1" class="form-label">Tipo</label>
                            <select class="form-control" name="tipo" id="tipo" onchange="traercampos()">
                                @foreach (config('catalogos.catperfiles') as $key => $value)
                                    <option value="{{ $key }}"> {{ $value }}</option>
                                @endforeach
                            </select>
                        </div>
                        {{-- campo si es cliente coordinador --}}
                        <div class="col-lg-4">
                            <label for="exampleFormControlInput1" class="form-label">Usuario de coordinador</label>
                            <select class="form-control" name="usuarioCadena[]" id="usuarioCadena" multiple  disabled> </select>
                        </div>

                        <div class="col-lg-12">
                            <label for="exampleFormControlInput1" class="form-label">Observaciones</label>
                            <textarea class="form-control" id="observaciones" name="observaciones" rows="3"></textarea>
                        </div>
                        <textarea name="archivo" style="display: none" id="outputBase64" cols="30" rows="10" ></textarea>
                    </div>

                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary" id="btnCrear">Registrar</button>
                </form>
                    <button class="btn btn-outline-danger" data-bs-dismiss="modal" aria-label="Close">Cerrar</button>
                </div>

        </div>
    </div>
</div>

{{-- modal para editar --}}
<div class="modal fade" id="editar" tabindex="-1" role="dialog" aria-labelledby="modal1Label" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal1Label">Editar registro</h5>
                <button type="button" class="btn btn-sm btn-label-danger btn-icon" data-bs-dismiss="modal" aria-label="Close"> <i class="mdi mdi-close"></i></button>
            </div>
            <form id="editarEmpresaForm">
                @csrf
                <input type="hidden" name="id" id="idEdita">
                <div class="modal-body">
                    <input type="hidden" class="form-control" id="idUsuarioe" value="{{ session('id') }}" />
                    <div class="row">
                        <div class="col-lg-4">
                            <label for="exampleFormControlInput1" class="form-label">Nombre</label>
                            <input type="text" class="form-control" id="namee"  />
                        </div>
                        <div class="col-lg-4">
                            <label for="exampleFormControlInput1" class="form-label">Correo</label>
                            <input type="mail" class="form-control" id="emaile" disabled />
                        </div>
                        <div class="col-lg-4">
                            <label for="exampleFormControlInput1" class="form-label">Clave</label>
                            <input type="password" class="form-control" id="passworde"  />
                        </div>
                        <div class="col-lg-4">
                            <label for="exampleFormControlInput1" class="form-label">Empresa</label>
                            <div id="select-containere"></div>
                        </div>
                        <div class="col-lg-4">
                            <label for="exampleFormControlInput1" class="form-label">Banco</label>
                            <input type="text" class="form-control" id="bancoe"  />
                        </div>
                        <div class="col-lg-4">
                            <label for="exampleFormControlInput1" class="form-label">Cuenta</label>
                            <input type="text" class="form-control" id="cuentae"  />
                        </div>
                        <div class="col-lg-4">
                            <label for="exampleFormControlInput1" class="form-label">Archivo</label>
                            <input type="file" class="form-control" id="fileInpute" name="fileInpute"  />
                        </div>

                        <div class="col-lg-4">
                            <label for="exampleFormControlInput1" class="form-label">Permisos</label>
                            <select class="form-control"  id="permisose">
                                @foreach (config('catalogos.catPermisos') as $key => $value)
                                    <option value="{{ $key }}"> {{ $value }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-lg-4">
                            <label for="exampleFormControlInput1" class="form-label">Tipo</label>
                            <select class="form-control"  id="tipoe"  onchange="traercamposedi()">
                                @foreach (config('catalogos.catperfiles') as $key => $value)
                                    <option value="{{ $key }}"> {{ $value }}</option>
                                @endforeach
                            </select>
                        </div>

                        {{-- campo si es cliente coordinador --}}
                        <div class="col-lg-4">
                            <label for="exampleFormControlInput1" class="form-label">Usuario de coordinador</label>
                            <select class="form-control" name="usuarioCadenaedi[]" id="usuarioCadenaedi" multiple  disabled> </select>
                        </div>

                        <div class="col-lg-12">
                            <label for="exampleFormControlInput1" class="form-label">Observaciones</label>
                            <textarea class="form-control" id="observacionese" rows="3"></textarea>
                        </div>
                        <textarea name="archivo" style="display: none" id="outputBase64e" cols="30" rows="10"></textarea>
                    </div>


                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary" id="btnEditar">Registrar</button>
                </form>
                    <button class="btn btn-outline-danger">Cerrar</button>
                </div>

        </div>
    </div>
</div>

{{-- modal para cambiar estatus --}}
<div class="modal fade" id="modalEliminar" tabindex="-1" role="dialog" aria-labelledby="modal1Label" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal1Label">Cambio de estatus de registro</h5>
                <button type="button" class="btn btn-sm btn-label-danger btn-icon" data-bs-dismiss="modal" aria-label="Close"> <i class="mdi mdi-close"></i></button>
            </div>
            <form id="eliminarREgistro">
                @csrf
                <input type="hidden" id="idREgistro" name="id">
                <input type="hidden" id="estatusBaja" name="estatusBaja">
                <div class="modal-body">
                    <div class="alert alert-label-danger text-center"><b>Esta seguro de cambiar el estatus al registro</b></div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-success" id="btnEliminar">Registrar</button>
                    <button class="btn btn-outline-danger">Cerrar</button>
                </div>
            </form>
        </div>
    </div>
</div>


{{-- modal para editar --}}

@include('include.footer')
<script type="text/javascript">

    /* carga de datatable */
    $(function () {
        var table = $('#datatable1').DataTable({
            processing: true,
            responsive: true,
            language: {
                url: 'https://cdn.datatables.net/plug-ins/1.10.21/i18n/Spanish.json'
            },
            columnDefs: [
                { targets: '_all', className: 'dt-responsive nowrap' } // Fuerza las columnas a ser responsivas
            ],
            autoWidth: false // Desactiva el ajuste automático del ancho
        });
    });

    /* CATALOGO DE EMPRES(AS */
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

    cataempresase()
    function cataempresase(){
        var url = `/empresas/relacion/`;
        $.ajax({
            url: url,
            method: 'GET',
            success: function(response) {
               console.log(response)
               let datos = response.data
               const select = document.createElement('select');
                select.id = "idEmpresae";
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
                document.getElementById('select-containere').appendChild(select);
            },
            error: function(response) { alert('Error al editar la empresa.'); }
        });
    }

    /* /////////////////////////////////////////////////////////// */

    /* /////////////////////////////////////////////////////////// */
    /* CREARCION */
    /* /////////////////////////////////////////////////////////// */
    /* boton crear */
    $('#btnCrear').click(function(e) {
        e.preventDefault(); // Previene el envío normal del formulario
        /* var formData = $(this).serialize(); */ // Obtiene los datos del formulario
        var usuarioCadena = $('#usuarioCadena').val();

        if (usuarioCadena) {
            var cadenaUsuarios = usuarioCadena.map(function(valor) {
                return "'" + valor + "'";
            }).join(", ");
        }
        else {var cadenaUsuarios = 0 }

        var url = '{{ route('usuarios.crear') }}';
        var formData = {
                name: $('#name').val(), // Asegúrate de que el input con id="name" tiene un valor
                email: $('#email').val(),
                password: $('#password').val(),
                idEmpresa: $('#idEmpresa').val(),
                banco: $('#banco').val(),
                archivo: $('#outputBase64').val(),
                permisos: $('#permisos').val(),
                cuenta: $('#cuenta').val(),
                tipo: $('#tipo').val(),
                observaciones: $('#observaciones').val(),
                usuarioCadena: cadenaUsuarios
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
    /* Editar */
    /* /////////////////////////////////////////////////////////// */
    /* abrir modal de edicion */
    function editarRegistro(id,name,email,password,estatus,idEmpresa,tipo,banco,cuenta,observaciones,permisos,archivo){
        $('#editar').modal('show');

        document.getElementById('idEdita').value = id
        document.getElementById('namee').value = name
        document.getElementById('emaile').value = email

        /* para agregar el valor a la emrpesa  */
        const selectempre = document.getElementById("idEmpresae");
        const idEmpresaw = idEmpresa;
        selectempre.value = idEmpresaw;

        /* para agregar valor de permisos */
        const select = document.getElementById("permisose");
        const nuevaOpcion = document.createElement("option");
        nuevaOpcion.value = permisos;
        nuevaOpcion.textContent = permisos;
        select.appendChild(nuevaOpcion);

        /* para agregar el valor de tipo */
        const selecttipo = document.getElementById("tipoe");
        const nuevaOpciontipo = document.createElement("option");
        nuevaOpciontipo.value = tipo;
        nuevaOpciontipo.textContent = tipo;
        selecttipo.appendChild(nuevaOpciontipo);

        document.getElementById('bancoe').value = banco
        document.getElementById('cuentae').value = cuenta

        const textarea = document.getElementById('observacionese');
        textarea.value += observaciones;


    }
    /* funcion para enviar la edicion del registro */
    $('#btnEditar').click(function (e) {
        e.preventDefault();

        var usuarioCadena = $('#usuarioCadenaedi').val();

        if (usuarioCadena) {
            var cadenaUsuarios = usuarioCadena.map(function(valor) {
                return "'" + valor + "'";
            }).join(", ");
        }
        else {var cadenaUsuarios = 0 }

        var formData = new FormData();

        // Agregar campos al FormData, verificando si los valores son válidos
        formData.append("id", document.getElementById("idEdita").value);
        formData.append("name", document.getElementById("namee").value);
        formData.append("email", document.getElementById("emaile").value);
        formData.append("password", document.getElementById("passworde").value || ""); // Evitar valores nulos
        formData.append("idEmpresa", document.getElementById("idEmpresae").value);
        formData.append("tipo", document.getElementById("tipoe").value);
        formData.append("banco", document.getElementById("bancoe").value);
        formData.append("cuenta", document.getElementById("cuentae").value);
        formData.append("observaciones", document.getElementById("observacionese").value);
        formData.append("permisos", document.getElementById("permisose").value);
        formData.append("usuarioCadena",cadenaUsuarios);

        // Manejar el campo "archivo" solo si tiene un valor
        const archivo = document.getElementById("outputBase64e").value;
        if (archivo) {
            formData.append("archivo", archivo);
        }

        const idUsu = document.getElementById("idEdita").value;

        $.ajax({
            url: `/usuarios/editarValores/${idUsu}`,
            method: "POST",
            data: formData,
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'), },
            processData: false, // Evitar que jQuery procese los datos
            contentType: false, // Permitir que se establezca el encabezado de tipo de contenido adecuado
            success: function (response) {
                $('#editar').modal('hide');
                const div = document.getElementById('alerta');
                div.style.display = 'block';
                setTimeout(() => {
                    location.reload();
                }, 1000);
            },
            error: function (response) {
                alert("Error al editar la empresa.");
            }
        });
    });

    /* /////////////////////////////////////////////////////////// */

    /* /////////////////////////////////////////////////////////// */
    /* Eliminar */
    /* /////////////////////////////////////////////////////////// */

    /* funcion para mostrar el modal de elimianr */
    function actualizarEstatus(id,estatus) {
        $('#modalEliminar').modal('show');
        /* aegregamos valores a los input */
        const div = document.getElementById('idREgistro');
        div.value= id;
        const estatusBaja = document.getElementById('estatusBaja');
        estatusBaja.value= estatus;
    }
    /* eliminar registro */
    $('#btnEliminar').click(function(e) {
        e.preventDefault();
        const idEliminar = document.getElementById('idREgistro').value;
        var formData = {
            estatusBaja: $('#estatusBaja').val(), // Asegúrate de que el input con id="name" tiene un valor
        };
        $.ajax({
            url: `/usuarios/editarEs/${idEliminar}`,
            type: 'POST',
            data: formData,
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'), },
            success: function (response) {
                $('#modalEliminar').modal('hide');
                const div = document.getElementById('alerta');
                div.style.display = 'block';
                setTimeout(() => { location.reload(); }, 1000);
            },
            error: function (xhr) { alert('Hubo un error al eliminar el registro.'); },

        })
    });

    /* /////////////////////////////////////////////////////////// */

    /* /////////////////////////////////////////////////////////// */
    /* FUNCIONES PARA CUANDO ES UN COORDINADOR CLIENTE */
    /* /////////////////////////////////////////////////////////// */

    /* funcion para mostrar el modal de elimianr */
    function traercampos() {

        const valor = document.getElementById('tipo').value;

        if(valor == "Cliente Coordinador" ){
            const select = document.getElementById('usuarioCadena');
            select.disabled = false;

            var url = `/usuarios/relacionClientesEmpresa`;
            $.ajax({
                url: url,
                method: 'GET',
                success: function(response) {
                    const usuarios = response.data
                    const selectElement = document.getElementById('usuarioCadena');
                    selectElement.disabled = false;
                    selectElement.innerHTML = '';

                    usuarios.forEach(usuario => {
                        const option = document.createElement('option');
                        option.value = usuario.email;
                        option.textContent = `${usuario.email}`;
                        selectElement.appendChild(option);
                    });

                },
                error: function(response) { alert('Error al editar la empresa.'); }
            });
        }
        else{
            const select = document.getElementById('usuarioCadena');
            select.disabled = true;
        }


    }
    function traercamposedi() {

        const valor = document.getElementById('tipoe').value;

        if(valor == "Cliente Coordinador" ){
            const select = document.getElementById('usuarioCadenaedi');
            select.disabled = false;

            var url = `/usuarios/relacionClientesEmpresa`;
            $.ajax({
                url: url,
                method: 'GET',
                success: function(response) {
                    const usuarios = response.data
                    const selectElement = document.getElementById('usuarioCadenaedi');
                    selectElement.disabled = false;
                    selectElement.innerHTML = '';

                    usuarios.forEach(usuario => {
                        const option = document.createElement('option');
                        option.value = usuario.email;
                        option.textContent = `${usuario.email}`;
                        selectElement.appendChild(option);
                    });

                },
                error: function(response) { alert('Error al editar la empresa.'); }
            });
        }
        else{
            const select = document.getElementById('usuarioCadenaedi');
            select.disabled = true;
        }

    }
    /* eliminar registro */
   /*  $('#btnEliminar').click(function(e) {
        e.preventDefault();
        const idEliminar = document.getElementById('idREgistro').value;
        var formData = {
            estatusBaja: $('#estatusBaja').val(), // Asegúrate de que el input con id="name" tiene un valor
        };
        $.ajax({
            url: `/usuarios/editarEs/${idEliminar}`,
            type: 'POST',
            data: formData,
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'), },
            success: function (response) {
                $('#modalEliminar').modal('hide');
                const div = document.getElementById('alerta');
                div.style.display = 'block';
                setTimeout(() => { location.reload(); }, 1000);
            },
            error: function (xhr) { alert('Hubo un error al eliminar el registro.'); },

        })
    }); */

    /* /////////////////////////////////////////////////////////// */

    /* /////////////////////////////////////////////////////////// */
    /* funcion para la conversion de archivo crear*/
    document.getElementById('fileInput').addEventListener('change', async (event) => {
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
            document.getElementById('outputBase64').value = optimizedBase64;
        } catch (error) {
            console.error("Error al procesar el archivo:", error);
            alert("Hubo un error al procesar el archivo.");
        }
    });

    /* para el aedicion de archivo */
    document.getElementById('fileInpute').addEventListener('change', async (event) => {
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
            document.getElementById('outputBase64e').value = optimizedBase64;
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


