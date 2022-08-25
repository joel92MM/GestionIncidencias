
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

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous">
</script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
