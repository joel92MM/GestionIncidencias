 <div id="app">
     <nav class="navbar navbar-expand-lg bg-primary">
         <div class="container-fluid text-light">
             <a class="navbar-brand text-light">Aplicación de Incidencias</a>
             <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                 data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                 aria-label="Toggle navigation">
                 <span class="navbar-toggler-icon"></span>
             </button>

             <div class="collapse navbar-collapse" id="navbarSupportedContent">
                 {{-- si el usuario se a identificado mostraremos el select --}}
                 @if (auth()->check())
                     <form action="" class="navbar-form">
                         <div class="form-group">
                             <select name="" id="list-of-projects" class="form-control">
                                 {{-- mostraremos todos los proyecto que se le han asignado a un usuario, a partir del usuario autentificado
                            accederemos a la variable para ver los proyectos que tiene asignado --}}
                            <option value="" class="text-center">**Menu de proyectos**</option>
                                 @foreach (auth()->user()->list_of_projects as $project)
                                     <option value="{{ $project->id }}" @if($project->id==auth()->user()->selected_project_id) selected @endif>
                                        {{ $project->name }}</option>
                                 @endforeach
                             </select>
                         </div>
                     </form>


                 <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                     {{-- @guest --}}
                     @if (auth()->check())
                         <li class="nav-item">
                             <a class="nav-link text-light" href="{{ url('/panelusuario') }}">Panel de Usuario</a>
                         </li>
                         <li class="nav-item">
                             <a class="nav-link text-light" href="{{ route('signout') }}">Cerrar sesion</a>
                         </li>
                     @endif
                 </ul>
                 {{-- <form class="d-flex" role="search">
                     <input class="form-control me-2" type="search" placeholder="Texto a buscar" aria-label="Search">
                     <button class="btn btn-outline-light" type="submit">Buscar</button>
                 </form> --}}
                 <ul class="navbar-nav  mb-2 mb-lg-0 text-end">
                     <li class="nav-item text-end">
                         <a id="navbarDropdown" class="nav-link text-light fs-5">
                             {{ Auth::user()->name }}
                             <span class="avatar avatar-sm rounded-circle">
                                 <img alt="Image placeholder" src="{{ asset('imagenes/avatar.png') }}">
                             </span>

                         </a>
                     </li>
                 </ul>
             @else
                 <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                     <li class="nav-item">
                         <a class="nav-link text-light" href="{{ url('/panelusuario') }}">Panel de Usuario</a>
                     </li>
                     {{-- <li class="nav-item">
                             <a class="nav-link active text-light" aria-current="page"
                                 href="{{ url('/inicio') }}">Inicio</a>
                         </li> --}}
                     <li class="nav-item">
                         <a class="nav-link text-light" href="{{ route('login') }}">Iniciar sesion</a>
                     </li>
                     <li class="nav-item">
                         <a class="nav-link text-light" href="{{ route('register') }}">Registrarse</a>
                     </li>
                 </ul>
            @endif
                 {{-- @endguest --}}
             </div>
         </div>
     </nav>
 </div>
