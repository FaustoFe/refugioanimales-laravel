@extends('layouts.app')
@section('content')
<div class="p-5 text-center bg-light">
  <div class="mt-5">
    <h1 class="">Animales registrados</h1>
  </div>
</div>
<div class="container mt-2 shadow-lg p-4 mb-4 bg-white">
  @if(Session::has('error'))
  <div class="alert alert-danger">{{ Session::get('error') }}</div>
  @endif
  <div class="my-2 row">
    <div class="col-3">
      <input class="rounded" type="text" id="myInput" onkeyup="myFunction()" placeholder="Buscar por nombre" title="Ingresar nombre">
    </div>
    <div class="col-5">
    </div>
    <div class="col-4">
      <a class="btn btn-primary float-right" href="{{route('animal-create')}}"><i class="fa fa-plus"></i> Agregar Animal</a>
    </div>
  </div>
  @if(Session::has('success'))
  <div class="alert alert-success">{{ Session::get('success') }}</div>
  @endif
  <div class="my-2 table-responsive">
    <table id="myTable" class="table table-bordered">
      <thead>
        <tr class="">
          <th scope="col">ID</th>
          <th scope="col">Nombre</th>
          <th scope="col">Edad</th>
          <th scope="col">Sexo</th>
          <th scope="col">Tipo</th>
          <th scope="col">Raza</th>
          <th scope="col">Acciones</th>
        </tr>
      </thead>
      <tbody>
        @foreach($animales as $animal)
        <tr class="">
          <td>{{$animal->id}}</td>
          <td>{{$animal->nombre}}</td>
          <td>{{$animal->edad}}</td>
          <td>{{$animal->sexo}}</td>
          <td>{{$animal->raza->tipo_animal->nombre}}</td>
          <td>{{$animal->raza->nombre}}</td>

          <td class="">
            <a class="btn btn-primary mr-1" href="{{route('animal-show', ['id' => $animal->id])}}"><i class="fa fa-edit"></i></a>
            <a class="btn btn-danger" href="{{route('animal-delete', ['id' => $animal->id])}}" onclick="return confirm('¿Seguro que quiere eliminar a {{$animal->nombre}} (id: {{$animal->id}})?')" data-toggle="tooltip"><i class="fa fa-trash-o fa-lg"></i></a>
          </td>
        </tr>

        @endforeach
      </tbody>
    </table>
  </div>
</div>

<script>
  /*
        Searchbox -> Busqueda por nombre
    */
  function myFunction() {
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("myInput");
    filter = input.value.toUpperCase();
    table = document.getElementById("myTable");
    tr = table.getElementsByTagName("tr");
    for (i = 0; i < tr.length; i++) {
      td = tr[i].getElementsByTagName("td")[1];
      if (td) {
        txtValue = td.textContent || td.innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
          tr[i].style.display = "";
        } else {
          tr[i].style.display = "none";
        }
      }
    }
  }
</script>

@endsection