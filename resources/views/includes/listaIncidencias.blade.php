@extends('layouts.panelusuario')
@section('contenidopanel')
    <div class="container">
        <table class="table table-bordered">
            <thead class="table-header bg-success fs-5 text-light">
                <tr>
                    <th>Lista de Incidencias</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        @if  (auth()->user()->is_support)
                            <div class="card">
                                <div class="card-header bg-primary text-light fs-3">
                                    <a href="#" class="list-group-item list-group-item-action active"
                                        aria-current="true">
                                        Incidencias asignadas a mi
                                    </a>
                                </div>
                                <div class="card-body fs-4">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Código</th>
                                                <th>Categoria</th>
                                                <th>Severidad</th>
                                                <th>Estado</th>
                                                <th>Fecha de creación</th>
                                                <th>Titulo</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($incidents as $incidente)
                                                <tr>
                                                    <td>{{ $incidente->id }}</td>
                                                    <td>{{ $incidente->category->name }}</td>
                                                    <td>{{ $incidente->severity_full }}</td>
                                                    <td>{{ $incidente->id }}</td>
                                                    <td>{{ $incidente->created_at }}</td>
                                                    <td>{{ $incidente->title_short }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <br />
                            {{-- incidencias sin asignar --}}
                            <div class="card">
                                <div class="card-header bg-primary text-light fs-3">
                                    <a href="#" class="list-group-item list-group-item-action active"
                                        aria-current="true">
                                        Incidencias sin asignar
                                    </a>
                                </div>
                                <div class="card-body fs-4">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Código</th>
                                                <th>Categoria</th>
                                                <th>Severidad</th>
                                                <th>Estado</th>
                                                <th>Fecha de creación</th>
                                                <th>Titulo</th>
                                                <th>Opción</th>
                                            </tr>
                                        </thead>
                                        <tbody id="dashboard_pending_incidents">
                                            @foreach ($pending_incidents as $incidente_pendiente)
                                                <tr>
                                                    <td>{{ $incidente_pendiente->id }}</td>
                                                    <td>{{ $incidente_pendiente->category->name }}</td>
                                                    <td>{{ $incidente_pendiente->severity_full }}</td>
                                                    <td>{{ $incidente_pendiente->id }}</td>
                                                    <td>{{ $incidente_pendiente->created_at }}</td>
                                                    <td>{{ $incidente_pendiente->title_short }}</td>
                                                    <td>
                                                        <a href="" class="btn btn-primary btn-sm">
                                                            Atender
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        @endif
                            <br />
                            {{-- incidencias sasignadas a otros --}}
                            <div class="card">
                                <div class="card-header bg-primary text-light fs-3">
                                    <a href="#" class="list-group-item list-group-item-action active"
                                        aria-current="true">
                                        Incidencias hechas por mi
                                    </a>
                                </div>
                                <div class="card-body fs-4">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Código</th>
                                                <th>Categoria</th>
                                                <th>Severidad</th>
                                                <th>Estado</th>
                                                <th>Fecha de creación</th>
                                                <th>Titulo</th>
                                                <th>Responsable</th>
                                            </tr>
                                        </thead>
                                        <tbody id="dashboard_to_others">
                                        @foreach ($incidents_asignar as $incidente_asignar)
                                            <tr>
                                                <td>{{ $incidente_asignar->id }}</td>
                                                <td>{{ $incidente_asignar->category_name }}</td>
                                                <td>{{ $incidente_asignar->severity_full }}</td>
                                                <td>{{ $incidente_asignar->id }}</td>
                                                <td>{{ $incidente_asignar->created_at }}</td>
                                                <td>{{ $incidente_asignar->title_short }}</td>
                                                <td>
                                                    {{ $incidente_asignar->support_id ?: 'Sin asignar' }}
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    </table>
                                </div>
                            </div>
                    </td>
                </tr>
            </tbody>
        </table>

    </div>
@endsection
