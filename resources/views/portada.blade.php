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
                                    <li class="breadcrumb-item active">Portada</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- seccion de alerta --}}
                @include('include.aviso')

                {{-- seccion de contadores generales --}}
                <div class="row">
                    <div class="col-xl-12 text-center"> <img src="{{asset('backend/assets/images/portada.png')}}" alt=""> </div>
                    {{--< div class="col-xl-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex">
                                    <div class="flex-shrink-0 avatar avatar-xs avatar-label-info"> <i class="fas fa-user-friends fs-16"></i> </div>
                                    <div class="flex-grow-1 ms-2">
                                        <h4 class="fs-14 mb-1">Usuarios</h4>
                                        <p class="text-muted fs-12 mb-0">{{ session('tipo') }}</p>
                                    </div>
                                    <p class="text-muted mb-0">10</p>
                                </div>
                            </div>
                        </div>
                    </>

                    <div class="col-xl-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex">
                                    <div class="flex-shrink-0 avatar avatar-xs avatar-label-info"> <i class="fas fa-clock fs-16"></i> </div>
                                    <div class="flex-grow-1 ms-2">
                                        <h4 class="fs-14 mb-1">Hoy</h4>
                                        <p class="text-muted fs-12 mb-0">Asuntos del dia de hoy</p>
                                    </div>
                                    <p class="text-muted mb-0">3</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex">
                                    <div class="flex-shrink-0 avatar avatar-xs avatar-label-info"> <i class="fas fa-user-check fs-16"></i>  </div>
                                    <div class="flex-grow-1 ms-2">
                                        <h4 class="fs-14 mb-1">Clientes</h4>
                                        <p class="text-muted fs-12 mb-0">Número de clientes</p>
                                    </div>
                                    <p class="text-muted mb-0">100</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex">
                                    <div class="flex-shrink-0 avatar avatar-xs avatar-label-info"> <i class="fas fa-crown fs-16"></i> </div>
                                    <div class="flex-grow-1 ms-2">
                                        <h4 class="fs-14 mb-1">Asuntos</h4>
                                        <p class="text-muted fs-12 mb-0">Total de asuntos</p>
                                    </div>
                                    <p class="text-muted mb-0">20</p>
                                </div>
                            </div>
                        </div>
                    </div> --}}

                </div>

                {{-- seccion de grafica --}}
                <div class="row">

                 {{--    <div class="col-xl-6">
                        <div class="card" style="overflow: hidden auto;" data-simplebar="init">
                            <div class="card-header">
                                <h3 class="card-title">Estudios activos</h3>
                            </div>

                            <div class="card-body">
                                <div class="table-responsive-md">
                                    <table class="table text-nowrap mb-0">
                                        <thead>
                                            <tr>
                                                <th>No. Asunto</th>
                                                <th>Cliente</th>
                                                <th>Tipo</th>
                                                <th>Descripción</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="align-middle">837563</td>
                                                <td class="align-middle">Cliente</td>
                                                <td class="align-middle">Penal</td>
                                                <td class="align-middle">Descripcion general</td>
                                            </tr>
                                            <tr>
                                                <td class="align-middle">837563</td>
                                                <td class="align-middle">Cliente</td>
                                                <td class="align-middle">Penal</td>
                                                <td class="align-middle">Descripcion general</td>
                                            </tr>
                                            <tr>
                                                <td class="align-middle">837563</td>
                                                <td class="align-middle">Cliente</td>
                                                <td class="align-middle">Penal</td>
                                                <td class="align-middle">Descripcion general</td>
                                            </tr>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div> --}}

                </div>

            </div>

        </div>

        @include('include.pie')

    </div>
</div>


@include('include.footer')
