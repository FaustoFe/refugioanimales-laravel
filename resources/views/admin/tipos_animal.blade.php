@extends('layouts.app')
@section('content')
<div class="p-5 text-center bg-light">
  <div class="mt-5">
    <h1 class="">Tipos Animales</h1>
  </div>
</div>
<div class="container mt-2 shadow-lg p-4 mb-4 bg-white">
  <div class="my-2">
    <a class="btn btn-primary" href="{{route('tipo_animal.create')}}"><i class="fa fa-plus"></i> Crear Tipo Animal</a>
  </div>
  @if(Session::has('success'))
  <div class="alert alert-success">{{ Session::get('success') }}</div>
  @endif
  <div class="my-2 table-responsive">
    <table id="myTable" class="table table-bordered">
      <thead>
        <tr class="">
          <th scope="col">Nombre</th>
          <th scope="col">Acciones</th>
        </tr>
      </thead>
      <tbody>
        @foreach($tipos_animal as $tipo_animal)
        <tr class="">
          <td>{{$tipo_animal->nombre}}</td>

          <td class="">
            <a class="btn btn-primary mr-1" href="{{route('tipo_animal.edit', ['id' => $tipo_animal->id])}}"><i class="fa fa-edit"></i></a>
            <a class="btn btn-danger" href="{{route('tipo_animal.delete', ['id' => $tipo_animal->id])}}" onclick="return confirm('¿Seguro que quiere eliminar el tipo animal {{$tipo_animal->nombre}}? Puede tener animales y razas asociados a el que tambien seran eliminados.')" data-toggle="tooltip"><i class="fa fa-trash-o fa-lg"></i></a>
          </td>
        </tr>

        @endforeach
      </tbody>
    </table>
  </div>
</div>

@endsection