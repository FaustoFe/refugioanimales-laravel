@extends('layouts.app')
@section('content')

<div class="p-5 text-center bg-light">
  <div class="mt-5">
    <h1 class="">Crear Animal</h1>
  </div>
</div>
<div class="container mt-5 shadow-lg p-4 mb-4 bg-white">
  @if(Session::has('error'))
  <div class="alert alert-danger">{{ Session::get('error') }}</div>
  @endif
  <form method="POST" action="{{route('animal-store')}}" enctype="multipart/form-data">
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

    <!-- campo de edad -->
    <div class="input-group mt-3">
      <div class="input-group-prepend">
        <span class="input-group-text" id="basic-addon1">Edad</span>
      </div>
      <input name="edad" type="text" autocomplete="off" class="form-control" aria-label="Edad" aria-describedby="basic-addon1">
    </div>
    @error('edad')
    <small class="danger">{{$message}}</small>
    @enderror

    <!-- campo de seleccion de sexo -->
    <div class="input-group mt-3">
      <div class="input-group-prepend">
        <span class="input-group-text" id="basic-addon1">Sexo</span>
      </div>
      <div class="form-check-inline">
        <div class="mx-4">
          <input type="radio" class="flat" name="sexo" value="M"> Macho
        </div>
        <div>
          <input type="radio" class="flat" name="sexo" value="H"> Hembra
        </div>
      </div>
    </div>
    @error('sexo')
    <small class="danger">{{$message}}</small>
    @enderror

    <!-- campo de seleccion de raza -->
    <div class="input-group mt-3">
      <div class="input-group-prepend">
        <span class="input-group-text">Raza</span>
      </div>
      <select name="raza_id" class="form-control selectpicker" data-live-search="true">
        <option value="" disabled selected>Elige la Raza</option>
        @foreach($razas as $raza)
        <option value="{{$raza->id}}" data-tokens="{{$raza->nombre}}">{{$raza->nombre}}</option>
        @endforeach
      </select>
    </div>
    @error('raza_id')
    <small class="danger">{{$message}}</small>
    @enderror

    <!-- campo para seleccionar si el animal esta castrado o no -->
    <div class="input-group mt-3">
      <div class="input-group-prepend">
        <span class="input-group-text" id="basic-addon1">Castrado</span>
      </div>
      <div class="form-check-inline">
        <div class="mx-4">
          <input type="radio" class="flat" name="castrado" value="1"> Si
        </div>
        <div>
          <input type="radio" class="flat" name="castrado" value="0"> No
        </div>
      </div>
    </div>
    @error('castrado')
    <small class="danger">{{$message}}</small>
    @enderror

    <!-- campo de vacunas -->
    <div class="input-group mt-3">
      <div class="input-group-prepend">
        <span class="input-group-text" id="basic-addon1">Vacunas Aplicadas</span>
      </div>
      <input name="vacunas" type="text" autocomplete="off" class="form-control" aria-label="Vacunas" aria-describedby="basic-addon1">
    </div>
    @error('vacunas')
    <small class="danger">{{$message}}</small>
    @enderror

    <!-- campo de descripcion -->
    <div class="input-group mt-3">
      <div class="input-group-prepend">
        <span class="input-group-text">Descripción</span>
      </div>
      <textarea name="descripcion" autocomplete="off" class="form-control" aria-label="With textarea" rows="5"></textarea>
    </div>
    @error('descripcion')
    <small class="danger">{{$message}}</small>
    @enderror

    <!-- campo de subida de imagen -->
    <div class="mt-3">
      <div class="input-group mb-2">
        <div id="msg"></div>
        <input type="file" name="imagen" class="file hidden" accept="image/*">
        <div class="input-group">
          <div class="input-group-prepend">
            <button type="button" class="browse btn btn-secondary">Buscar Imagen...</button>
          </div>
          <input type="text" class="form-control" disabled placeholder="Subir Foto" id="file">
        </div>
      </div>
      <div class="col-6">
        <img src="https://placehold.it/80x80" id="preview" class="img-thumbnail">
      </div>
    </div>
    @error('imagen')
    <small class="danger">{{$message}}</small>
    @enderror
    <div>
      <input type="submit" class="btn btn-primary mt-4" value="Crear animal">
    </div>
  </form>
</div>

<script>
  /*
        Image preview
    */
  $(document).on("click", ".browse", function() {
    var file = $(this).parents().find(".file");
    file.trigger("click");
  });
  $('input[type="file"]').change(function(e) {
    var fileName = e.target.files[0].name;
    $("#file").val(fileName);

    var reader = new FileReader();
    reader.onload = function(e) {
      // get loaded data and render thumbnail.
      document.getElementById("preview").src = e.target.result;
    };
    // read the image file as a data URL.
    reader.readAsDataURL(this.files[0]);
  });
</script>

@endsection