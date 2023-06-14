<?php

namespace Database\Seeders;

use App\Models\Animal;
use App\Models\Raza;
use Illuminate\Database\Seeder;

class AnimalSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {

    // Perros
    Animal::insert([
      'nombre' => 'Puppy',
      'descripcion' => '',
      'edad' => 3,
      'sexo' => 'M',
      'castrado' => 1,
      'vacunas' => '',
      'imagen_path' => '',
      'raza_id' => Raza::where('nombre', 'Golden Retriever')->first()->id
    ]);

    Animal::insert([
      'nombre' => 'Cuzi',
      'descripcion' => '',
      'edad' => 4,
      'sexo' => 'M',
      'castrado' => 1,
      'vacunas' => '',
      'imagen_path' => '',
      'raza_id' => Raza::where('nombre', 'Dogo Argentino')->first()->id
    ]);

    Animal::insert([
      'nombre' => 'Killa',
      'descripcion' => '',
      'edad' => 1,
      'sexo' => 'H',
      'castrado' => 0,
      'vacunas' => '',
      'imagen_path' => '',
      'raza_id' => Raza::where('nombre', 'Desconocida (Perro)')->first()->id
    ]);


    // Gatos
    Animal::insert([
      'nombre' => 'Inti',
      'descripcion' => '',
      'edad' => 3,
      'sexo' => 'M',
      'castrado' => 1,
      'vacunas' => '',
      'imagen_path' => '',
      'raza_id' => Raza::where('nombre', 'Bobtail japonés')->first()->id
    ]);

    Animal::insert([
      'nombre' => 'Cleo',
      'descripcion' => '',
      'edad' => 2,
      'sexo' => 'H',
      'castrado' => 1,
      'vacunas' => '',
      'imagen_path' => '',
      'raza_id' => Raza::where('nombre', 'American shorthair')->first()->id
    ]);
  }
}
