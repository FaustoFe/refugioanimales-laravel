@extends('layouts.app')
@section('content')

<div class="p-5 text-center bg-light">
  <div class="mt-5">
    <h1 class="">Crear Tipo Animal</h1>
  </div>
</div>
<div class="container mt-5 shadow-lg p-4 mb-4 bg-white">
  @if(Session::has('error'))
  <div class="alert alert-danger">{{ Session::get('error') }}</div>
  @endif
  <form method="POST" action="{{route('tipo_animal.store')}}">
    @csrf

    <!-- campo de nombre -->
    <div class="input-group">
      <div class="input-group-prepend">
        <span class="input-group-text" id="basic-addon1">Nombre</span>
      </div>
      <input name="nombre" type="text" autocomplete="off" class="form-control" aria-label="Nombre" aria-describedby="basic-addon1">
    </div>
    @error('nombre')
    <small class="danger">{{$message}}</small>
    @enderror
    <div>
      <input type="submit" class="btn btn-primary mt-4" value="Crear animal">
    </div>
  </form>
</div>

@endsection