@extends('layouts.app')
@section('content')
<div class="p-5 text-center bg-light">
  <div class="mt-5">
    <h1 class="">Razas registrados</h1>
  </div>
</div>
<div class="container mt-2 shadow-lg p-4 mb-4 bg-white">
  <div class="my-2">
    <input class="rounded" type="text" id="myInput" onkeyup="myFunction()" placeholder="Buscar por nombre" title="Ingresar nombre">
    <a class="btn btn-primary float-right" href="{{route('raza.create')}}"><i class="fa fa-plus"></i> Crear raza</a>
  </div>
  @if(Session::has('success'))
  <div class="alert alert-success">{{ Session::get('success') }}</div>
  @endif
  <div class="my-2 table-responsive">
    <table id="myTable" class="table table-bordered">
      <thead>
        <tr class="">
          <th scope="col">Nombre</th>
          <th scope="col">Tipo</th>
          <th scope="col">Descripcion</th>
          <th scope="col">Acciones</th>
        </tr>
      </thead>
      <tbody>
        @foreach($razas as $raza)
        <tr class="">
          <td>{{$raza->nombre}}</td>
          <td>{{$raza->tipo_animal->nombre}}</td>
          <td>{{$raza->descripcion}}</td>

          <td class="">
            <a class="btn btn-primary mr-1" href="{{route('raza.edit', ['id' => $raza->id])}}"><i class="fa fa-edit"></i></a>
            <a class="btn btn-danger" href="{{route('raza.delete', ['id' => $raza->id])}}" onclick="return confirm('¿Seguro que quiere eliminar la raza {{$raza->nombre}} (id: {{$raza->id}})? Puede tener animales registrados a ella que tambien seran eliminados.')" data-toggle="tooltip"><i class="fa fa-trash-o fa-lg"></i></a>
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
      td = tr[i].getElementsByTagName("td")[0];
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