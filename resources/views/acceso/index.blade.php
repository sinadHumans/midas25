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
                                <h4 class="fs-16 fw-semibold mb-1 mb-md-2">Bienvenidos, <span class="text-primary">{{ session('name') }}!</span></h4>
                            </div>
                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Inicio</a></li>
                                    <li class="breadcrumb-item active">Accesos al sistema</li>
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
                                            <th>Usuario</th>
                                            <th>Acceso</th>
                                            <th>Acción</th>
                                            <th>Fecha</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($accesos as $accesos)
                                            <tr>
                                                <td>{{ $accesos->id }}</td>
                                                <td>{{ $accesos->idUsuario }}</td>
                                                <td>{{ $accesos->acceso }}</td>
                                                @if($accesos->accion == 'Ingreso')
                                                    <td class="text-success">{{ $accesos->accion }}</td>
                                                @endif
                                                @if($accesos->accion == 'Salida')
                                                    <td class="text-danger" >{{ $accesos->accion }}</td>
                                                @endif
                                                <td>{{ $accesos->created_at }}</td>
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



{{-- modal para editar --}}

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
</script>


