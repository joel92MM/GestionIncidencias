@extends('layouts.panelusuario')
@section('contenidopanel')
    <div class="card">
        <div class="card-header bg-secondary text-light fs-3">Tablero registro de incidencias</div>
        <form action="" method="post">
            {{ csrf_field() }}
            <div class="card-body fs-4">

                <div class="form-group">
                    <label for="category_id">Categoria</label>
                    <select name="category_id" class="form-control">
                        <option value="0" selected>Seleccione la categoria</option>
                        {{-- cargamos nuestra categorias que estan en la BBDD --}}
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                {{-- mensaje de error de categoria --}}
                <div class=" danger text-danger">
                    @if ($errors->has('category_id'))
                        <p class="text-danger fw-bold fs-6">{{ $errors->first('category_id') }}</p>
                    @endif
                </div>
                <div class="form-group">
                    <label for="severity">Intensidad</label>
                    <select name="severity" class="form-control">
                        <option value="valor" selected>Seleccione la intensidad</option>
                        <option value="M">Menor</option>
                        <option value="N">Normal</option>
                        <option value="A">Alta</option>
                    </select>
                </div>
                {{-- mensaje de error de intensidad --}}
                <div class="danger text-danger">
                    @if ($errors->has('severity'))
                        <p class="text-danger fw-bold fs-6">{{ $errors->first('severity') }}</p>
                    @endif
                </div>
                <div class="form-group">
                    <label for="title">Titulo</label>
                    <input type="text" name="title" value="{{old('title')}}"
                        placeholder="Introduce el nombre de la incidencia" class="form-control">
                    </select>
                </div>
                {{-- mensaje de error de titulo --}}
                <div class=" danger text-danger">
                    @if ($errors->has('title'))
                        <p class="text-danger fw-bold fs-6">{{ $errors->first('title') }}</p>
                    @endif
                </div>
                <div class="form-group">
                    <label for="descripcion">Descripción</label>
                    <br />
                    <textarea name="descripcion" class="form-control" placeholder="Escriba aqui la descripción de la incidencia" value="{{old('descripcion')}}"></textarea>
                </div>
                {{-- mensaje de eror de descripcion --}}
                <div class=" danger text-danger">
                    @if ($errors->has('descripcion'))
                        <p class="text-danger fw-bold fs-6">{{ $errors->first('descripcion') }}</p>
                    @endif
                </div>
            </div>
            <div class="card-footer bg-secondary">
                <div class="form-group text-end text-dark ">
                    <button class="btn btn-light btn-lg">Registrar incidencias</button>
                </div>
            </div>
        </form>
    </div>
@endsection
