<?php

namespace App\Http\Controllers;

use App\Http\Requests\TipoAnimalCreateRequest;
use App\Models\Animal;
use App\Models\Raza;
use App\Models\Tipo_Animal;
use Exception;
use Illuminate\Http\Request;

class TipoAnimalController extends Controller
{
  /*
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
    $tipos_animal = Tipo_Animal::all();
    return view('admin.tipos_animal')->with('tipos_animal', $tipos_animal);
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    $tipo_animal = Tipo_Animal::findOrFail($id);
    return view('admin.tipo_animal-edit')->with('tipo_animal', $tipo_animal);
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function delete($id)
  {
    $tipo_animal = Tipo_Animal::findOrFail($id);
    $tipo_animal->delete();

    return redirect()->route('tipos_animal');
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    return view('admin.tipo_animal-create');
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function store(TipoAnimalCreateRequest $request)
  {
    try {

      $tipo_animal = new Tipo_Animal();

      $tipo_animal->nombre = $request->nombre;

      $tipo_animal->save();

      return redirect()->route('tipos_animal')->with('success', 'Se registro el tipo animal correctamente');
    } catch (Exception $e) {
      return redirect()->back()->with('error', 'Hubo un error durante la creacion del tipo animal. Intente otra vez o contacte al administrador');
    }
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(TipoAnimalCreateRequest $request, $id)
  {
    try {

      $tipo_animal = Tipo_Animal::findOrFail($id);

      $tipo_animal->nombre = $request->nombre;

      $tipo_animal->save();

      return redirect()->route('tipos_animal')->with('success', 'Se guardaron los datos correctamente');;
    } catch (Exception $e) {
      return redirect()->back()->with('error', 'Hubo un error durante la actualización de los datos del tipo animal. Intente otra vez o contacte al administrador');
    }
  }
}
