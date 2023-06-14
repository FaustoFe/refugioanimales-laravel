@extends('layouts.app')
@section('content')

<div class="p-5 text-center bg-light">
  <div class="mt-5">
    <h1 class="">Editar Raza</h1>
  </div>
</div>
<div class="container mt-5 shadow-lg p-4 mb-4 bg-white">
  @if(Session::has('error'))
  <div class="alert alert-danger">{{ Session::get('error') }}</div>
  @endif
  @if(Session::has('success'))
  <div class="alert alert-success">{{ Session::get('success') }}</div>
  @endif
  <form method="POST" action="{{route('raza.update', ['id' => $raza->id])}}">
    @csrf
    @method("PATCH")
    <!-- campo de nombre -->
    <div class="input-group">
      <div class="input-group-prepend">
        <span class="input-group-text" id="basic-addon1">Nombre</span>
      </div>
      <input name="nombre" type="text" autocomplete="off" class="form-control" aria-label="Nombre" value="{{$raza->nombre}}">
    </div>
    @error('nombre')
    <small class="danger">{{$message}}</small>
    @enderror

    <!-- campo de seleccion de tipo animal -->
    <div class="input-group mt-3">
      <div class="input-group-prepend">
        <span class="input-group-text">Tipo de animal</span>
      </div>
      <select name="tipo_animal_id" class="form-control selectpicker" data-live-search="true">
        @foreach($tipos_animal as $tipo_animal)
        <option value="{{$tipo_animal->id}}" {{($raza->tipo_animal->nombre === $tipo_animal->nombre) ? 'Selected' : ''}}>{{$tipo_animal->nombre}}</option>
        @endforeach
      </select>
    </div>
    @error('tipo_animal_id')
    <small class="danger">{{$message}}</small>
    @enderror

    <!-- campo de descripcion -->
    <div class="input-group mt-3">
      <div class="input-group-prepend">
        <span class="input-group-text">Descripción</span>
      </div>
      <textarea name="descripcion" autocomplete="off" class="form-control" rows="5">{{$raza->descripcion}}</textarea>
    </div>
    @error('descripcion')
    <small class="danger">{{$message}}</small>
    @enderror

    <div>
      <input type="submit" class="btn btn-primary mt-4" value="Guardar Cambios">
    </div>
  </form>
</div>

@endsection