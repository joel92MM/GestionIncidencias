@extends('layouts.app')
@section('contenidoPrincipal')
    @if (auth()->check())
        <div class="container mt-5">
            <div class="row">
                <div class="col-md-3">
                    @include('includes.menu')
                </div>
                <div class="col-md-9">{{-- col-md-offset-2 --}}
                    @yield('contenidopanel')
                </div>
            </div>
        </div>
    @else
        <div class="container mt-5">
            <div class="row">
                <div class="col-md-12">
                    @include('includes.menu')
                </div>

            </div>
        </div>
    @endif
@endsection
