@extends('layouts.app')
@section('content')

<div class="p-5 text-center bg-light">
  <div class="mt-5">
    <h1 class="">Editar Evento</h1>
  </div>
</div>
<div class="container shadow-lg p-4 mb-4 bg-white">
  @if(Session::has('error'))
  <div class="alert alert-danger">{{ Session::get('error') }}</div>
  @endif
  <form method="POST" action="{{route('evento.update', ['id' => $evento->id])}}">
    @csrf
    @method("PATCH")
    <!-- Titulo -->
    <div class="input-group">
      <div class="input-group-prepend">
        <label class="input-group-text" for="titulo">Titulo del evento</label>
      </div>
      <input name="titulo" autocomplete="off" type="text" class="form-control" id="titulo" value="{{$evento->titulo}}">
    </div>
    @error('titulo')
    <small class="danger">{{$message}}</small>
    @enderror

    <!-- Lugar -->
    <div class="input-group mt-3">
      <div class="input-group-prepend">
        <label class="input-group-text" for="lugar">Lugar</label>
      </div>
      <input name="lugar" autocomplete="off" type="text" class="form-control" id="lugar" value="{{$evento->lugar}}">
    </div>
    @error('lugar')
    <small class="danger">{{$message}}</small>
    @enderror

    <!-- Fecha -->
    <div class="input-group mt-3">
      <div class="input-group-prepend">
        <label class="input-group-text label-control">Fecha</label>
      </div>
      <input name="fecha" type="date" class="form-control datepicker" value="{{$evento->fecha_inicio->format('Y-m-d')}}">
    </div>
    @error('fecha')
    <small class="danger">{{$message}}</small>
    @enderror

    <!-- Hora Inicio/Fin -->
    <div class="input-group mt-3">
      <div class="input-group-prepend">
        <label class="input-group-text label-control">Hora de Inicio</label>
      </div>
      <input name="hora_ini" type="time" class="form-control timepicker" value="{{$evento->fecha_inicio->format('H:i')}}">
    </div>
    @error('hora_ini')
    <small class="danger">{{$message}}</small>
    @enderror
    <div class="input-group mt-3">
      <div class="input-group-prepend">
        <label class="input-group-text label-control">Hora de Finalizacion</label>
      </div>
      <input name="hora_fin" type="time" class="form-control timepicker" value="{{$evento->fecha_fin->format('H:i')}}">
    </div>
    @error('hora_fin')
    <small class="danger">{{$message}}</small>
    @enderror

    <!-- Descripcion -->
    <div class="input-group mt-3">
      <div class="input-group-prepend">
        <label class="input-group-text" for="descripcion">Descripción</label>
      </div>
      <textarea name="descripcion" autocomplete="off" type="text" class="form-control" id="descripcion">{{$evento->descripcion}}</textarea>
    </div>
    @error('descripcion')
    <small class="danger">{{$message}}</small>
    @enderror

    <!-- Boton -->
    <div class="mt-3">
      <button type="submit" class="btn btn-primary">Guardar Cambios</button>
    </div>
  </form>
</div>