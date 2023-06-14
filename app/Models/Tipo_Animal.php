<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tipo_Animal extends Model
{

  protected $table = "tipos_animales";

  protected $fillable = [
    'nombre',
  ];
}
