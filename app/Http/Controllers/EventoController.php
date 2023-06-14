<?php

namespace App\Http\Controllers;

use App\Http\Requests\EventoCreateRequest;
use App\Models\Evento;
use Carbon\Carbon;
use Exception;

class EventoController extends Controller
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
    $eventos = Evento::all()->sortBy('fecha_inicio');
    return view('admin.eventos')->with('eventos', $eventos);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    return view('admin.evento-create');
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function store(EventoCreateRequest $request)
  {
    try {
      $fecha_inicio = Carbon::createFromFormat('Y-m-d H:i', "{$request->fecha} {$request->hora_ini}");
      $fecha_fin = Carbon::createFromFormat('Y-m-d H:i', "{$request->fecha} {$request->hora_fin}");

      $evento = new Evento();

      $evento->titulo = $request->titulo;
      $evento->lugar = $request->lugar;
      $evento->descripcion = $request->descripcion;
      $evento->fecha_inicio = $fecha_inicio;
      $evento->fecha_fin = $fecha_fin;

      $evento->save();

      return redirect()->route('eventos')->with('success', 'Se registro el evento correctamente');
    } catch (Exception $e) {
      dd($e->getMessage());
      return redirect()->back()->with('error', 'Hubo un error durante la creacion del evento. Intente otra vez o contacte al administrador');
    }
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function delete($id)
  {
    $evento = Evento::findOrFail($id);
    Evento::where('id', $id)->delete();
    return redirect()->route('eventos');
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    $evento = Evento::findOrFail($id);
    return view('admin.evento-edit')->with('evento', $evento);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(EventoCreateRequest $request, $id)
  {
    try {

      $evento = Evento::findOrFail($id);

      $fecha_inicio = Carbon::createFromFormat('Y-m-d H:i', "{$request->fecha} {$request->hora_ini}");
      $fecha_fin = Carbon::createFromFormat('Y-m-d H:i', "{$request->fecha} {$request->hora_fin}");

      $evento->titulo = $request->titulo;
      $evento->lugar = $request->lugar;
      $evento->descripcion = $request->descripcion;
      $evento->fecha_inicio = $fecha_inicio;
      $evento->fecha_fin = $fecha_fin;

      $evento->save();

      return redirect()->route('eventos')->with('success', 'Se guardo el evento correctamente');
    } catch (Exception $e) {
      dd($e->getMessage());
      return redirect()->back()->with('error', 'Hubo un error durante la creacion del evento. Intente otra vez o contacte al administrador');
    }
  }
}
