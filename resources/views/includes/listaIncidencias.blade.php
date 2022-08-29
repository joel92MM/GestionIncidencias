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
                        <div class="card">
                            <div class="card-header bg-primary text-light fs-3">
                                <a href="#" class="list-group-item list-group-item-action active" aria-current="true">
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
                                            <th>Resumen</th>
                                        </tr>
                                    </thead>
                                    <tbody id="dashboard_my_incidents"></tbody>
                                </table>
                            </div>
                        </div>
                        <br/>
                        {{-- incidencias sin asignar --}}
                        <div class="card">
                            <div class="card-header bg-primary text-light fs-3">
                                <a href="#" class="list-group-item list-group-item-action active" aria-current="true">
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
                                            <th>Resumen</th>
                                            <th>Opción</th>
                                        </tr>
                                    </thead>
                                    <tbody id="dashboard_no_responsible"></tbody>
                                </table>
                            </div>
                        </div>
                        <br/>
                        {{-- incidencias sasignadas a otros --}}
                        <div class="card">
                            <div class="card-header bg-primary text-light fs-3">
                                <a href="#" class="list-group-item list-group-item-action active" aria-current="true">
                                    Incidencias asignadas a otros
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
                                            <th>Resumen</th>
                                            <th>Responsable</th>
                                        </tr>
                                    </thead>
                                    <tbody id="dashboard_to_others"></tbody>
                                </table>
                            </div>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>

    </div>
@endsection
