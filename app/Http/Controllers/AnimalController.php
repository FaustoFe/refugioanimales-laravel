<?php

namespace App\Http\Controllers;

use App\Http\Requests\AnimalCreateRequest;
use App\Http\Requests\AnimalUpdateRequest;
use App\Models\Animal;
use App\Models\Raza;
use App\Models\Tipo_Animal;
use Exception;
use Illuminate\Support\Facades\Storage;

class AnimalController extends Controller
{
  /* Agregar al publicador tambien
    public function __construct()
    {
        $this->middleware('admin');
    }
    */


  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $animales = Animal::all()->sortBy('id');
    return view('admin.index')->with('animales', $animales);
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
    $animal = Animal::findOrFail($id);
    $razas = Raza::all();
    $tipos_animal = Tipo_Animal::all();

    $animal->imagen = $animal->imagen ? stream_get_contents($animal->imagen) : null;

    return view('admin.animal')->with('animal', $animal)->with('razas', $razas)->with('tipos_animal', $tipos_animal);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    $razas = Raza::all();
    return view('admin.animal-create')->with('razas', $razas);
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function delete($id)
  {
    $animal = Animal::findOrFail($id);
    Animal::where('id', $id)->delete();
    return redirect()->route('animal-index');
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function store(AnimalCreateRequest $request)
  {
    try {

      $image = $request->file('imagen');

      $path = Storage::disk('s3')->put('images', $image, 'public');
      $imageUrl = Storage::disk('s3')->url($path);

      $animal = new Animal();
      $animal->nombre = $request->nombre;
      $animal->edad = $request->edad;
      $animal->sexo = $request->sexo;
      $animal->castrado = $request->castrado;
      $animal->vacunas = $request->vacunas;
      $animal->descripcion = $request->descripcion;
      $animal->imagen_path = $imageUrl;
      $animal->raza_id = $request->raza_id;

      $animal->save();

      return redirect()->route('animal-index')->with('success', 'Se registro el animal correctamente');
    } catch (Exception $e) {
      return redirect()->back()->with('error', 'Hubo un error durante la creacion del animal. Intente otra vez o contacte al administrador');
    }
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(AnimalUpdateRequest $request, $id)
  {
    try {

      $animal = Animal::findOrFail($id);

      $animal->nombre = $request->nombre;
      $animal->edad = $request->edad;
      $animal->sexo = $request->sexo;
      $animal->castrado = $request->castrado;
      $animal->vacunas = $request->vacunas;
      $animal->descripcion = $request->descripcion;
      $animal->raza_id = $request->raza_id;

      if ($request->file('imagen')) {
        $request->validate([
          'imagen' => ['image', 'required', 'mimes:jpeg,jpg,png', 'max:10240']
        ]);

        $image = $request->file('imagen');

        $path = Storage::disk('s3')->put('images', $image, 'public');
        $imageUrl = Storage::disk('s3')->url($path);

        $animal->imagen_path = $imageUrl;
      }

      $animal->save();

      return redirect()->route('animal-index');
    } catch (Exception $e) {
      dd($e);
      return redirect()->back()->with('error', 'Hubo un error durante la actualización de los datos del animal. Intente otra vez o contacte al administrador');
    }
  }
}
