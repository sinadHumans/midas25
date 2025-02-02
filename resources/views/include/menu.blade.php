<header id="page-topbar" >
    <div class="navbar-header" data-bs-theme="dark">

        <!-- logotipo-->
        <div class="navbar-logo-box">
            <a href="index.html" class="logo logo-dark">
                <span class="logo-sm"> <img src="{{asset('backend/assets/images/logo-sm.png')}}" alt="logo-sm-dark" height="20"> </span>
                <span class="logo-lg"> <img src="{{asset('backend/assets/images/logo-dark.png')}}" alt="logo-dark" height="18"> </span>
            </a>

            <a href="index.html" class="logo logo-light">
                <span class="logo-sm"> <img src="{{asset('backend/assets/images/logo-sm.png')}}" alt="logo-sm-light" height="20"> </span>
                <span class="logo-lg"> <img src="{{asset('backend/assets/images/logo-light.png')}}" alt="logo-light" height="18"> </span>
            </a>

            <button type="button" class="btn btn-sm top-icon sidebar-btn" id="sidebar-btn"> <i class="mdi mdi-menu-open align-middle fs-19"></i> </button>
        </div>

        <!-- Seccion de menu de barra superior -->
        <div class="d-flex justify-content-between menu-sm px-3 ms-auto" data-bs-theme="dark">
            <div class="d-flex align-items-center gap-2"> <div class="dropdown d-none d-lg-block"> </div> </div>

            <div class="d-flex align-items-center gap-2">

                <div class="dropdown d-inline-block">
                    <button type="button" class="btn btn-sm top-icon p-0" id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        @if (session('archivo') != "")
                            <img class="rounded avatar-2xs p-0" src="{{session('archivo')}}" alt="Header Avatar">
                        @endif
                        @if (session('archivo') == "")
                            <img class="rounded avatar-2xs p-0" src="{{asset('backend/assets/images/users/avatar-6.png')}}" alt="Header Avatar">
                        @endif

                    </button>

                    <div class="dropdown-menu dropdown-menu-wide dropdown-menu-end dropdown-menu-animated overflow-hidden py-0">
                        <div class="card border-0">
                            <div class="card-header bg-primary rounded-0">
                                <div class="rich-list-item w-100 p-0">
                                    <div class="rich-list-prepend">
                                        <div class="avatar avatar-label-light avatar-circle">
                                            <div class="avatar-display"><i class="fa fa-user-alt"></i></div>
                                        </div>
                                    </div>
                                    <div class="rich-list-content">
                                        <h3 class="rich-list-title text-white">{{ session('name') }}</h3>
                                        <span class="rich-list-subtitle text-white">{{ session('email') }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body p-0"></div>
                            <div class="card-footer card-footer-bordered rounded-0"><a href="{{ route('usuario.cerrar') }}" class="btn btn-label-danger" style="width: 100%">Cerrar sesión</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

<!-- ========== Menu del lado izquierdo ========== -->
<div class="sidebar-left" data-bs-theme="dark">
    <div data-simplebar class="h-100">
        <div id="sidebar-menu">
            <ul class="left-menu list-unstyled" id="side-menu">
                {{-- Administrador --}}
                @if(session('tipo') == 'Administrador')
                    <li> <a href="portada" class=""> <i class="fas fa-home"></i> <span>Inicio</span> </a> </li>
                    <li> <a href="/estudios" class=""> <i class="fas fa-desktop"></i> <span>Estudios</span> </a> </li>
                    <li> <a href="/estudios/terminados" class=""> <i class="fas fa-check-double"></i> <span>Estudios Terminados</span> </a> </li>
                    <li> <a href="/estudios/canceladosTotal" class=""> <i class="fas fa-times-circle"></i> <span>Estudios Cancelados</span> </a> </li>
                    <li> <a href="/empresas" class=""> <i class="fas fa-user-friends"></i> <span>Empresas</span> </a> </li>
                    <li> <a href="/usuarios" class=""> <i class="fas fa-user"></i> <span>Usuarios</span> </a> </li>
                    <li> <a href="/avisos" class=""> <i class="fas fa-sms"></i> <span>Avisos</span> </a> </li>
                    <li> <a href="/excel" class=""> <i class=" fas fa-file-excel"></i> <span>Carga Excel</span> </a> </li>
                    <li> <a href="/accesos" class=""> <i class="fas fa-terminal"></i> <span>Accesos</span> </a> </li>
                    <li> <a href="/acciones" class=""> <i class="fas fa-check-double"></i> <span>Acciones</span> </a> </li>
                @endif
                {{-- Coordinador --}}
                @if(session('tipo') == 'Coordinador')
                    <li> <a href="portada" class=""> <i class="fas fa-home"></i> <span>Inicio</span> </a> </li>
                    <li> <a href="/estudios" class=""> <i class="fas fa-desktop"></i> <span>Estudios</span> </a> </li>
                    <li> <a href="/estudios/terminados" class=""> <i class="fas fa-check-double"></i> <span>Estudios Terminados</span> </a> </li>
                    <li> <a href="/estudios/canceladosTotal" class=""> <i class="fas fa-times-circle"></i> <span>Estudios Cancelados</span> </a> </li>
                    <li> <a href="/excel" class=""> <i class=" fas fa-file-excel"></i> <span>Carga Excel</span> </a> </li>
                    {{-- <li> <a href="/acciones" class=""> <i class="fas fa-check-double"></i> <span>Acciones</span> </a> </li> --}}
                @endif
                {{--Ejecutivo--}}
                @if(session('tipo') == 'Ejecutivo')
                    <li> <a href="portada" class=""> <i class="fas fa-home"></i> <span>Inicio</span> </a> </li>
                    <li> <a href="/estudios" class=""> <i class="fas fa-desktop"></i> <span>Estudios</span> </a> </li>
                    <li> <a href="/excel" class=""> <i class=" fas fa-file-excel"></i> <span>Carga Excel</span> </a> </li>
                    <li> <a href="/estudios/terminados" class=""> <i class="fas fa-check-double"></i> <span>Estudios Terminados</span> </a> </li>
                @endif
                {{-- Encuestador --}}
                @if(session('tipo') == 'Encuestador')
                    <li> <a href="portada" class=""> <i class="fas fa-home"></i> <span>Inicio</span> </a> </li>
                    <li> <a href="/estudios" class=""> <i class="fas fa-desktop"></i> <span>Estudios</span> </a> </li>
                    <li> <a href="/excel" class=""> <i class=" fas fa-file-excel"></i> <span>Carga Excel</span> </a> </li>
                    {{-- <li> <a href="/estudios/terminados" class=""> <i class="fas fa-check-double"></i> <span>Estudios Terminados</span> </a> </li> --}}
                @endif
                {{-- Cliente Admin --}}
                @if(session('tipo') == 'Cliente Admin')
                    <li> <a href="portada" class=""> <i class="fas fa-home"></i> <span>Inicio</span> </a> </li>
                    <li> <a href="/estudios" class=""> <i class="fas fa-desktop"></i> <span>Estudios</span> </a> </li>
                    <li> <a href="/estudios/terminados" class=""> <i class="fas fa-check-double"></i> <span>Estudios Terminados</span> </a> </li>
                    {{-- <li> <a href="/estudios/canceladosTotal" class=""> <i class="fas fa-times-circle"></i> <span>Estudios Cancelados</span> </a> </li> --}}
                @endif
                {{-- Cliente Coordinador --}}
                @if(session('tipo') == 'Cliente Coordinador')
                    <li> <a href="portada" class=""> <i class="fas fa-home"></i> <span>Inicio</span> </a> </li>
                    <li> <a href="/estudios" class=""> <i class="fas fa-desktop"></i> <span>Estudios</span> </a> </li>
                    <li> <a href="/estudios/terminados" class=""> <i class="fas fa-check-double"></i> <span>Estudios Terminados</span> </a> </li>
                   {{--  <li> <a href="/estudios/canceladosTotal" class=""> <i class="fas fa-times-circle"></i> <span>Estudios Cancelados</span> </a> </li> --}}
                @endif
                {{--Cliente  --}}
                @if(session('tipo') == 'Cliente')
                    <li> <a href="portada" class=""> <i class="fas fa-homme"></i> <span>Inicio</span> </a> </li>
                    <li> <a href="/estudios" class=""> <i class="fas fa-desktop"></i> <span>Estudios</span> </a> </li>
                    <li> <a href="/estudios/terminados" class=""> <i class="fas fa-check-double"></i> <span>Estudios Terminados</span> </a> </li>
                @endif

            </ul>
        </div>
    </div>
</div>


