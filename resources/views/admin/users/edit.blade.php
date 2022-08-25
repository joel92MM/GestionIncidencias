@extends('layouts.panelusuario')
@section('contenidopanel')
    <div class="card">
        <div class="card-header bg-secondary text-light fs-3">Tablero edición de usuarios</div>
        @if (session('notificaciones'))
            <div class="alert alert-success mt-3">
                {{ session('notificaciones') }}
            </div>
        @endif
        <form action="" method="post">
            {{ csrf_field() }}
            <div class="card-body fs-4">
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" value="{{ old('email', 'support@gmail.com') }}"
                        placeholder="Introduce el nombre de la incidencia" class="form-control" readonly>
                    </select>
                </div>
                {{-- mensaje de error de titulo --}}
                <div class=" danger text-danger">
                    @if ($errors->has('email'))
                        <p class="text-danger fw-bold fs-6">{{ $errors->first('email') }}</p>
                    @endif
                </div>
                <div class="form-group">
                    <label for="name">Nombre</label>
                    <input type="text" name="name" value="{{ old('name', $user->name) }}"
                        placeholder="Introduce el nombre del usuario" class="form-control">
                    </select>
                </div>
                {{-- mensaje de error de titulo --}}
                <div class=" danger text-danger">
                    @if ($errors->has('name'))
                        <p class="text-danger fw-bold fs-6">{{ $errors->first('name') }}</p>
                    @endif
                </div>
                <div class="form-group">
                    <label for="password">Contraseña</label>
                    <input type="text" name="password" value="{{ old('password') }}"
                        placeholder="Introduce la contraseña del usuario" class="form-control">
                    </select>
                    <span class="text-danger fw-bold fs-5">Solo si desea modificar la contraseña</span>
                </div>
                {{-- mensaje de error de titulo --}}
                <div class=" danger text-danger">
                    @if ($errors->has('password'))
                        <p class="text-danger fw-bold fs-6">{{ $errors->first('password') }}</p>
                    @endif
                </div>
            </div>
            <div class="form-group ms-3">
                <button class="btn btn-secondary btn-lg">Guardar usuarios</button>
            </div>
        </form>
        <div class="row mt-3 align-item-center ms-3">
            <div class="col-md-4">
                <select name="" id="select-project" class="form-control form-select">
                    <option value="">Seleccione proyecto</option>
                    @foreach ($projects as $project)
                        <option value="{{$project->id}}">{{$project->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-4">
                <select name="" id="select-level" class="form-control  form-select">
                    <option value="">Seleccione nivel</option>
                </select>
            </div>
            <div class="col-md-3">
                <button class="btn btn-primary btn-block">Asignar proyecto</button>
            </div>
        </div>
        <p class="mt-3 ms-3">Proyectos asignados</p>
        <br />
        {{-- aqui va la tabla del el crud de usuarios --}}
        <table class="table text-center">
            <thead class="bg-success text-light ">
                <tr>
                    <th>Proyecto</th>
                    <th>Nivel</th>
                    <th>Opciones</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Proyecto A</td>
                    <td>N1</td>
                    <td>
                        <a href="" class="btn btn-sm btn-primary">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-pencil-fill" viewBox="0 0 16 16">
                                <path
                                    d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z" />
                            </svg>
                        </a>
                        <a href="" class="btn btn-sm btn-danger">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-trash3-fill" viewBox="0 0 16 16">
                                <path
                                    d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z" />
                            </svg>
                        </a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    {{-- <div class="btn-group mt-4 " role="group">
        {{ $user->links('pagination::bootstrap-4') }}
    </div> --}}
@endsection
@section('scripts')
    <script src="{{asset('js/admin/users/edit.js')}}"></script>
@endsection
