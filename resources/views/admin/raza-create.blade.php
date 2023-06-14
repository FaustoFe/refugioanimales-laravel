@extends('layouts.app')
@section('content')

<div class="p-5 text-center bg-light">
  <div class="mt-5">
    <h1 class="">Crear Raza</h1>
  </div>
</div>
<div class="container mt-5 shadow-lg p-4 mb-4 bg-white">
  @if(Session::has('error'))
  <div class="alert alert-danger">{{ Session::get('error') }}</div>
  @endif
  <form method="POST" action="{{route('raza.store')}}">
    @csrf
    <!-- campo de nombre -->
    <div class="input-group">
      <div class="input-group-prepend">
        <span class="input-group-text">Nombre</span>
      </div>
      <input name="nombre" type="text" autocomplete="off" class="form-control" aria-label="Nombre" value="{{old('nombre')}}">
    </div>
    @error('nombre')
    <small class="danger">{{$message}}</small>
    @enderror

    <!-- campo de seleccion de raza -->
    <div class="input-group mt-3">
      <div class="input-group-prepend">
        <span class="input-group-text">Tipo de animal</span>
      </div>
      <select name="tipo_animal_id" class="form-control selectpicker" data-live-search="true">
        @foreach($tipos_animal as $tipo_animal)
        <option value="{{$tipo_animal->id}}" {{ old('tipo_animal_id') == $tipo_animal->id ? "selected" : ""}} data-tokens="{{$tipo_animal->nombre}}">{{$tipo_animal->nombre}}</option>
        @endforeach
      </select>
    </div>
    @error('tipo_animal_id')
    <small class="danger">{{$message}}</small>
    @enderror

    <!-- checkbox de busqueda de info en wikipedia -->
    <div class="form-check mb-3 mt-3">
      <input name="checkWikipedia" class="form-check-input" type="checkbox" onclick="funCheck()" value="" id="check">
      <label class="form-check-label ml-1" for="flexCheckDefault">
        Completar descripcion con información de Wikipedia
      </label>
    </div>

    <!-- aviso de la carga de datos de wikipedia -->
    <p id="textoAviso" style="display:none">La informacion en el campo descripción no será guardada, en su reemplazo, se obtendra de Wikipedia</p>

    <!-- campo de descripcion -->
    <div class="input-group">
      <div class="input-group-prepend">
        <span class="input-group-text">Descripción</span>
      </div>
      <textarea name="descripcion" id="desc" autocomplete="off" class="form-control" aria-label="With textarea" rows="5"></textarea>
    </div>
    @error('descripcion')
    <small class="danger">{{$message}}</small>
    @enderror

    <div>
      <input type="submit" class="btn btn-primary mt-4" value="Crear Raza">
    </div>
  </form>
</div>

<script>
  function funCheck() {
    if (document.getElementById('check').checked) {
      document.getElementById('desc').disabled = true;
      document.getElementById("textoAviso").style.display = "block";
    } else {
      document.getElementById('desc').disabled = false;
      document.getElementById("textoAviso").style.display = "none";
    }
  }
</script>

@endsection