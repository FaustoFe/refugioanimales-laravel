<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Raza extends Model
{

  protected $table = "razas";

  public function tipo_animal()
  {
    return $this->belongsTo(Tipo_Animal::class);
  }

  protected $fillable = [
    'nombre',
    'descripcion',
    'tipo_animal_id'
  ];
}
