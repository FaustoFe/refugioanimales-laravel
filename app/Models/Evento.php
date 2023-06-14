<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{

  protected $table = "eventos";

  /**
   * The attributes that should be mutated to dates.
   *
   * @var array
   */
  protected $dates = [
    'fecha_inicio',
    'fecha_fin',
  ];

  protected $fillable = [
    'titulo',
    'fecha_inicio',
    'fecha_fin',
    'lugar',
    'descripcion'
  ];
}
