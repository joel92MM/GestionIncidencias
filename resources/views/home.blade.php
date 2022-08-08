@extends('layouts.app')

@section('content')
    <div class="container mensajeLogeo">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-primary text-light d-flex justify-content-between">
                        <p class="fs-3 mt-2"> {{ __('Bienvenido a ') }}</p>
                        <img src="{{ asset('imagenes/logoSmallPrincipal.png') }}" alt="logo de la empresa">
                    </div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <p class="fw-bold fs-5">Sus datos de acceso son: </p>
                        <div class="d-flex justify-content-around fs-5">
                            <p><span class="fw-bold ">Nombre:</span> {{ auth()->user()->name }}</p>
                            <p><span class="fw-bold ">Email:</span> {{ auth()->user()->email }}</p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            setTimeout(function() {
                $(".mensajeLogeo").fadeOut(1500);
            }, 2000);
        });
    </script>
@endsection
