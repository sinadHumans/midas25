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
                                    <li class="breadcrumb-item active">Aviso de sistema</li>
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
                                        <button class="btn btn-outline-success" style="width: 100%" data-bs-toggle="modal" data-bs-target="#modal11">Nuevo aviso</button>
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
                                            <th>Titulo</th>
                                            <th>Mensaje</th>
                                            <th>Dirijido</th>
                                            <th>Tipo</th>
                                            <th>Estatus</th>
                                            <th>Creacion</th>
                                            <th>Creo</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($avisos as $aviso)
                                            <tr>
                                                <td>{{ $aviso->id }}</td>
                                                <td>{{ $aviso->titulo }}</td>
                                                <td>{{ $aviso->mensaje }}</td>
                                                <td>{{ $aviso->dirigido }}</td>
                                                @if($aviso->tipo == 'Normal')
                                                    <td class="text-success">{{ $aviso->tipo }}</td>
                                                @endif
                                                @if($aviso->tipo == 'Media')
                                                    <td class="text-warning" >{{ $aviso->tipo }}</td>
                                                @endif
                                                @if($aviso->tipo == 'Alta')
                                                    <td class="text-danger" >{{ $aviso->tipo }}</td>
                                                @endif

                                                @if($aviso->estatus == 'Activo')
                                                    <td class="text-success">{{ $aviso->estatus }}</td>
                                                @endif
                                                @if($aviso->estatus == 'Cancelado')
                                                    <td class="text-danger" >{{ $aviso->estatus }}</td>
                                                @endif

                                                <td>{{ $aviso->created_at }}</td>
                                                <td>{{ $aviso->idUsuario }}</td>
                                                <td>
                                                    <a onclick="editarRegistro('{{ $aviso->id }}','{{ $aviso->titulo }}','{{ $aviso->mensaje }}','{{ $aviso->dirigido }}','{{ $aviso->tipo }}','{{ $aviso->estatus }}','{{ $aviso->paginaWeb }}','{{ $aviso->comentarios }}')"><button class="btn btn-outline-success"><i class=" fas fa-edit"></i></button></a>
                                                    <a onclick="eliminarRegistro({{ $aviso->id }})"><button class="btn btn-outline-danger"><i class="mdi mdi-window-close"></i></button></a>
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
            <form id="createavisoForm">
                @csrf
                <div class="modal-body">
                    <input type="hidden" class="form-control" id="dirigido" name="dirigido" value="Todos"  />
                    <input type="hidden" class="form-control" id="idUsuario" name="idUsuario" value="{{ session('user') }}" />
                    <div class="row">
                        <div class="col-lg-12">
                            <label for="exampleFormControlInput1" class="form-label">Titulo</label>
                            <input type="text" class="form-control" id="titulo" name="titulo"  />
                        </div>
                        {{-- <div class="col-lg-4">
                            <label for="exampleFormControlInput1" class="form-label">Dirigido</label>
                            <
                        </div> --}}
                        <div class="col-lg-6">
                            <label for="exampleFormControlInput1" class="form-label">Tipo</label>
                            <select class="form-control" name="tipo" id="tipo">
                                @foreach (config('catalogos.cattipoAvisos') as $key => $value)
                                    <option value="{{ $key }}"> {{ $value }}</option>
                                @endforeach
                            </select>

                        </div>
                        <div class="col-lg-6">
                            <label for="exampleFormControlInput1" class="form-label">Estatus</label>
                            <select class="form-control" name="estatus" id="estatus">
                                @foreach (config('catalogos.catEstatusoAvisos') as $key => $value)
                                    <option value="{{ $key }}"> {{ $value }}</option>
                                @endforeach
                            </select>

                        </div>
                        <div class="col-lg-12">
                            <label for="exampleFormControlInput1" class="form-label">Mensaje</label>
                            <textarea class="form-control" id="mensaje" name="mensaje" rows="3"></textarea>
                        </div>
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
            <form id="editarForm">
                @csrf
                <input type="hidden" name="id" id="idEdita">
                <div class="modal-body">
                    <input type="hidden" class="form-control" id="dirigido" name="dirigido" value="Todos"  />
                    <input type="hidden" id="idUsuario" name="idUsuario" value="{{ session('user') }}" />
                    <div class="row">
                        <div class="col-lg-12">
                            <label for="exampleFormControlInput1" class="form-label">Titulo</label>
                            <input type="text" class="form-control" id="tituloe" name="titulo"  />
                        </div>
                        {{-- <div class="col-lg-4">
                            <label for="exampleFormControlInput1" class="form-label">Dirigido</label>
                            <
                        </div> --}}
                        <div class="col-lg-6">
                            <label for="exampleFormControlInput1" class="form-label">Tipo</label>
                            <select class="form-control" name="tipo" id="tipoe">
                                @foreach (config('catalogos.cattipoAvisos') as $key => $value)
                                    <option value="{{ $key }}"> {{ $value }}</option>
                                @endforeach
                            </select>

                        </div>
                        <div class="col-lg-6">
                            <label for="exampleFormControlInput1" class="form-label">Estatus</label>
                            <select class="form-control" name="estatus" id="estatuse">
                                @foreach (config('catalogos.catEstatusoAvisos') as $key => $value)
                                    <option value="{{ $key }}"> {{ $value }}</option>
                                @endforeach
                            </select>

                        </div>
                        <div class="col-lg-12">
                            <label for="exampleFormControlInput1" class="form-label">Mensaje</label>
                            <textarea class="form-control" id="mensajee" name="mensaje" rows="3"></textarea>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary" id="btnEditar">Registrar</button>
                </form>
                    <button class="btn btn-outline-danger" data-bs-dismiss="modal" aria-label="Close">Cerrar</button>
                </div>

        </div>
    </div>
</div>

{{-- modal para eliminar --}}
<div class="modal fade" id="modalEliminar" tabindex="-1" role="dialog" aria-labelledby="modal1Label" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal1Label">Eliminar registro</h5>
                <button type="button" class="btn btn-sm btn-label-danger btn-icon" data-bs-dismiss="modal" aria-label="Close"> <i class="mdi mdi-close"></i></button>
            </div>
            <form id="eliminarREgistro">
                @csrf
                <input type="hidden" id="idREgistro" name="id">
                <div class="modal-body">
                    <div class="alert alert-label-danger text-center"><b>Esta seguro de eliminar el registro</b></div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-danger" id="btnEliminar">Eliminar</button>
                </form>
                    <button class="btn btn-outline-danger" data-bs-dismiss="modal" aria-label="Close">Cerrar</button>
                </div>

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

    /* /////////////////////////////////////////////////////////// */
    /* CREARCION */
    /* /////////////////////////////////////////////////////////// */
    /* boton crear */
    $('#btnCrear').click(function(e) {
        e.preventDefault();
        var formElement = $('#createavisoForm').get(0);
        var formData = new FormData(formElement);
        var url = '{{ route('avisos.crear') }}';
        $.ajax({
            url: url,
            method: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                $('#modal11').modal('hide');
                const div = document.getElementById('alerta');
                div.style.display = 'block';
                setTimeout(() => { location.reload(); }, 10000);
            },
            error: function(response) { alert('Error al crear la empresa.'); }
        });
    });
    /* /////////////////////////////////////////////////////////// */

    /* /////////////////////////////////////////////////////////// */
    /* Editar */
    /* /////////////////////////////////////////////////////////// */
    /* abrir modal de edicion */
    function editarRegistro(id,titulo,mensaje,dirigido,tipo,estatus ){
        $('#editar').modal('show');

        document.getElementById('idEdita').value = id
        document.getElementById('tituloe').value = titulo
        document.getElementById('mensajee').value = mensaje
        document.getElementById('dirigidoe').value = dirigido
        document.getElementById('tipoe').value = tipo
        document.getElementById('estatuse').value = estatus


    }
    /* funcion para enviar la edicion del registro */
    $('#btnEditar').click(function(e) {
        e.preventDefault();
        var formElement = $('#editarForm').get(0);
        var formData = new FormData(formElement);

        let id =  document.getElementById('idEdita').value
        var url = `/avisos/editar/${id}`;
        $.ajax({
            url: url,
            method: 'POST',
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                $('#editar').modal('hide');
                const div = document.getElementById('alerta');
                div.style.display = 'block';
                setTimeout(() => { location.reload(); }, 1000);
            },
            error: function(response) { alert('Error al editar la empresa.'); }
        });
    });

    /* /////////////////////////////////////////////////////////// */

    /* /////////////////////////////////////////////////////////// */
    /* Eliminar */
    /* /////////////////////////////////////////////////////////// */

    /* funcion para mostrar el modal de elimianr */
    function eliminarRegistro(id) {
        $('#modalEliminar').modal('show');
        /* aegregamos valores a los input */
        const div = document.getElementById('idREgistro');
        div.value= id;
    }

    /* eliminar registro */
    $('#btnEliminar').click(function(e) {
        e.preventDefault();

        const idEliminar = document.getElementById('idREgistro').value;
        $.ajax({
            url: `/avisos/eliminar/${idEliminar}`,
            type: 'DELETE',
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



</script>


