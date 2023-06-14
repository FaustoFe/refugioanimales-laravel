<?php

namespace App\Http\Controllers;

use App\Http\Requests\RazaCreateRequest;
use App\Models\Animal;
use App\Models\Raza;
use App\Models\Tipo_Animal;
use Exception;

class RazaController extends Controller
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
    $razas = Raza::all();
    return view('admin.razas')->with('razas', $razas);
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    $raza = Raza::findOrFail($id);
    $tipos_animal = Tipo_Animal::all();
    return view('admin.raza-edit')->with('raza', $raza)->with('tipos_animal', $tipos_animal);
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function delete($id)
  {
    $raza = Raza::findOrFail($id);
    $raza->delete();

    return redirect()->route('razas');
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    $tipos_animal = Tipo_Animal::all();
    return view('admin.raza-create')->with('tipos_animal', $tipos_animal);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function store(RazaCreateRequest $request)
  {
    try {

      $raza = new Raza();

      $raza->nombre = $request->nombre;
      $raza->tipo_animal_id = $request->tipo_animal_id;

      if ($request->has('checkWikipedia')) {
        $descripcion = self::searchWikipediaInfo($request->nombre);
        if ($descripcion == -1) {
          return redirect()->back()->withInput($request->input())->with('error', 'No se encontro informacion en Wikipedia sobre el nombre ingresado :(');
        }
        $raza->descripcion = $descripcion;
      } else {
        $raza->descripcion = $request->descripcion;
      }

      $raza->save();

      return redirect()->route('raza.edit', ['id' => $raza->id])->with('success', 'Se registro la raza correctamente');
    } catch (Exception $e) {
      return redirect()->back()->with('error', 'Hubo un error durante la creacion de la raza. Intente otra vez o contacte al administrador');
    }
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(RazaCreateRequest $request, $id)
  {
    try {

      $raza = Raza::findOrFail($id);

      $raza->nombre = $request->nombre;
      $raza->tipo_animal_id = $request->tipo_animal_id;
      $raza->descripcion = $request->descripcion;

      $raza->save();

      return redirect()->route('razas')->with('success', 'Se guardaron los datos correctamente');;
    } catch (Exception $e) {
      return redirect()->back()->with('error', 'Hubo un error durante la actualización de los datos de la raza. Intente otra vez o contacte al administrador');
    }
  }

  private function searchWikipediaInfo(String $raza)
  {

    $url = "https://es.wikipedia.org/w/api.php?format=json&action=query&prop=extracts&exintro&explaintext&indexpageids&redirects=1&titles=" . str_replace(' ', '%20', $raza);

    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $output = curl_exec($ch);
    curl_close($ch);

    $result = json_decode($output, true);
    $pageid = $result['query']['pageids'][0];

    if ($pageid != -1) {
      $descripcion = $result['query']['pages'][$pageid]['extract'];
    } else {
      $descripcion = -1;
    }

    return $descripcion;
  }
}
