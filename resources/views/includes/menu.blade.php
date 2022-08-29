@if (auth()->check())
    <div class="container">
        <div class="card">

            <div class="card-header bg-secondary text-light fs-3">
                <a href="#" class="list-group-item list-group-item-action active" aria-current="true">
                    Menú
                </a>
            </div>
            <div class="card-body fs-4">
                <ul class="nav nav-pills flex-column">
                    <li class="nav-item">
                        <a class=" nav-link" href="/listadoIncidencias">Listado de Incidencias</a>
                    </li>
                    {{-- pendiente de modificar los enlaces de acceso segun el rol --}}
                    @if (!auth()->user()->is_client)
                        <li @if (request()->is('ver')) class="nav-item" @endif>
                            <a class=" nav-link" href="#">Ver Incidencias</a>
                        </li>
                    @endif
                    <li @if (request()->is('reportar')) class="nav-item" @endif>
                        <a class="nav-link" href="{{ url('/reportar') }}">Nuevas Incidencias</a>
                    </li>
                    @if (auth()->user()->is_admin)
                        <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    Administración
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="{{ url('/usuarios') }}">Usuarios</a></li>
                                    <li><a class="dropdown-item" href="{{ url('/proyectos') }}">Proyectos</a></li>
                                    <li><a class="dropdown-item" href="#">Configuración</a></li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    @else
        <div class="container">
            <div class="row">
                <div class="col-md-12 mt-5">
                    <div class="card">
                        <div class="card-header bg-secondary text-light d-flex fs-3 justify-content-between">
                            <h1 class="text-center mt-3">Bienvenido al sistema Registro de incidencias TIC</h1>
                            <img src="{{ asset('imagenes/logoSmallPrincipal.png') }}" alt="imagen principal">
                        </div>
                        <div class="card-body fs-4">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Instrucciones de uso</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ url('/') }}">Anotaciones</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link ">Créditos</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
