<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{

  protected $table = "animales";

  public function raza()
  {
    return $this->belongsTo(Raza::class);
  }

  protected $fillable = [
    'nombre',
    'descripcion',
    'edad',
    'sexo',
    'castrado',
    'vacunas',
    'imagen',
    'raza_id'
  ];
}
