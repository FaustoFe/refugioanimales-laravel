<?php

namespace Database\Seeders;

use App\Models\Tipo_Animal;

use Illuminate\Database\Seeder;

class TipoAnimalSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    Tipo_Animal::insert([
      'nombre' => 'Perro'
    ]);

    Tipo_Animal::insert([
      'nombre' => 'Gato'
    ]);
  }
}
