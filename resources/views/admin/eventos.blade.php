@extends('layouts.app')
@section('content')

<div class="p-5 text-center bg-light">
  <div class="mt-5">
    <h1 class="">Eventos</h1>
  </div>
</div>

<div class="container py-2 my-2 shadow-lg bg-white">
  <!-- Boton crear evento -->
  <div class="my-2">
    <a class="btn btn-primary" href="{{route('evento.create')}}"><i class="fa fa-plus mr-1"></i>Crear Evento</a>
  </div>

  @if(Session::has('success'))
  <div class="alert alert-success">{{ Session::get('success') }}</div>
  @endif

  <!-- Listado de eventos -->
  <div class="my-2 table-responsive">
    <table id="myTable" class="table table-bordered">
      <thead>
        <tr class="">
          <th scope="col">Fecha</th>
          <th scope="col">Titulo</th>
          <th scope="col">Lugar</th>
          <th scope="col">Horario</th>
          <th scope="col">Descripcion</th>
          <th scope="col">Acciones</th>
        </tr>
      </thead>
      <tbody>
        @foreach($eventos as $evento)
        <tr class="">
          <td>{{$evento->fecha_inicio->format("d/m")}}</td>
          <td>{{$evento->titulo}}</td>
          <td>{{$evento->lugar}}</td>
          <td>{{$evento->fecha_inicio->format("H:i")}} - {{$evento->fecha_fin->format("H:i")}}</td>
          <td>{{$evento->descripcion}}</td>

          <td class="">
            <a class="btn btn-primary mr-1" href="{{route('evento.edit', ['id' => $evento->id])}}"><i class="fa fa-edit"></i></a>
            <a class="btn btn-danger" href="{{route('evento.delete', ['id' => $evento->id])}}" onclick="return confirm('¿Seguro que quiere eliminar el evento: {{$evento->titulo}}?')" data-toggle="tooltip"><i class="fa fa-trash-o fa-lg"></i></a>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>

@endsection