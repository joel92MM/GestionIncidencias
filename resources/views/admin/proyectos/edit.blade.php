@extends('layouts.panelusuario')
@section('contenidopanel')
    <div class="card">
        <div class="card-header bg-secondary text-light fs-3">Tablero edición de proyectos</div>
        @if (session('notificaciones'))
            <div class="alert alert-success mt-3">
                {{ session('notificaciones') }}
            </div>
        @endif
        <form action="" method="post">
            {{ csrf_field() }}
            <div class="card-body fs-4">
                {{-- <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" value="{{ old('email') }}"
                        placeholder="Introduce el nombre de la incidencia" class="form-control">
                    </select>
                </div> --}}
                {{-- mensaje de error de titulo --}}
                {{-- <div class=" danger text-danger">
                    @if ($errors->has('email'))
                        <p class="text-danger fw-bold fs-6">{{ $errors->first('email') }}</p>
                    @endif
                </div> --}}
                <div class="form-group">
                    <label for="name">Nombre</label>
                    <input type="text" name="name" value="{{ old('name', $project->name) }}"
                        placeholder="Introduce el nombre del proyecto" class="form-control">
                </div>
                {{-- mensaje de error de titulo
                <div class=" danger text-danger">
                    @if ($errors->has('name'))
                        <p class="text-danger fw-bold fs-6">{{ $errors->first('name') }}</p>
                    @endif
                </div> --}}
                <div class="form-group">
                    <label for="description">Descripción</label>
                    <input type="text" name="description" value="{{ old('description', $project->descripcion) }}"
                        placeholder="Introduce la descripcion" class="form-control">
                </div>
                {{-- mensaje de error de titulo
                <div class=" danger text-danger">
                    @if ($errors->has('description'))
                        <p class="text-danger fw-bold fs-6">{{ $errors->first('description') }}</p>
                    @endif
                </div> --}}
                <div class="form-group">
                    <label for="start">Fecha de inicio</label>
                    <input type="date" name="start" value="{{ old('start', $project->start) }}"
                        placeholder="Introduce la contraseña del usuario" class="form-control">
                    </select>
                </div>
                {{-- mensaje de error de titulo
                <div class=" danger text-danger">
                    @if ($errors->has('password'))
                        <p class="text-danger fw-bold fs-6">{{ $errors->first('password') }}</p>
                    @endif
                </div> --}}
            </div>
            <div class="form-group text-end text-light me-3">
                <button class="btn btn-secondary btn-lg">Guardar proyecto</button>
            </div>
        </form>
        <br />
        <div class="row me-1 ms-1">
            <div class="col-md-6">
                <p>Categorías.</p>
                <form action="/categorias" method="post" class="d-inline">
                    {{ csrf_field() }}
                    <input type="hidden" name="project_id" value="{{ $project->id }}">
                    <div class="form-group d-flex gap-2 mb-1">
                        <input type="text" placeholder="Ingrese nombre de la categoria" name="name" class="form-control">
                        <button class="btn btn-primary">Añadir</button>
                    </div>

                </form>
                 {{-- mensaje de error de titulo
                <div class=" danger text-danger">
                    @if ($errors->has('names'))
                        <p class="text-danger fw-bold fs-6">{{ $errors->first('names') }}</p>
                    @endif
                </div> --}}
                {{-- aqui va la tabla del el crud de usuarios --}}
                <table class="table table-bordered text-center">
                    <thead class="bg-success text-light ">
                        <tr>
                            <th>Categoria</th>
                            <th>Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categorias as $categoria)
                            <tr>
                                <td>{{ $categoria->name}}</td>
                                <td>
                                    <button type="button" class="btn btn-sm btn-primary"
                                        data-category="{{ $categoria->id }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                                            <path
                                                d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z" />
                                        </svg>
                                    </button>
                                    <a href="/categoria/{{$categoria->id}}/eliminar" class="btn btn-sm btn-danger">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                                            <path
                                                d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z" />
                                        </svg>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="col-md-6">
                <p>Niveles.</p>
                <form action="/niveles" method="post" class="form-inline">
                    {{ csrf_field() }}
                    <input type="hidden" name="project_id" value="{{ $project->id }}">
                    <div class="form-group d-flex gap-2 mb-1">
                        <input type="text" name="name" placeholder="Ingrese nombre del nivel" class="form-control">
                        <button class="btn btn-primary">Añadir</button>
                    </div>

                </form>
                {{-- aqui va la tabla del el crud de usuarios --}}
                <table class="table table-bordered text-center">
                    <thead class="bg-success text-light ">
                        <tr>
                            <th>#</th>
                            <th>Nivel</th>
                            <th>Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($levels as $key => $level)
                            <tr>
                                <td>N{{ $key + 1 }}</td>
                                <td>{{ $level->name }}</td>
                                <td>
                                    <button type="button" class="btn btn-sm btn-primary" title="Editar" data-level="{{$level->id}}">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                                            <path
                                                d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z" />
                                        </svg>
                                    </button>
                                    <a href="/nivel/{{$level->id}}/eliminar" class="btn btn-sm btn-danger">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                                            <path
                                                d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z" />
                                        </svg>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <br />

    </div>

    {{-- <div class="btn-group mt-4 " role="group">
        {{ $user->links('pagination::bootstrap-4') }}
    </div> --}}
    @include('modales.modals')
@endsection
@section('scriptProject')
    <script src="{{ asset('js/admin/proyectos/edit.js') }}"></script>
@endsection
