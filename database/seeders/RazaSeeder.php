<?php

namespace Database\Seeders;

use App\Models\Raza;
use App\Models\Tipo_Animal;
use Illuminate\Database\Seeder;

class RazaSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {

    //Razas Desconocidas
    Raza::insert([
      'nombre' => 'Desconocida (Perro)',
      'descripcion' => '',
      'tipo_animal_id' => Tipo_Animal::where('nombre', 'Perro')->first()->id
    ]);

    Raza::insert([
      'nombre' => 'Desconocida (Gato)',
      'descripcion' => '',
      'tipo_animal_id' => Tipo_Animal::where('nombre', 'Gato')->first()->id
    ]);

    // Razas de perros
    Raza::insert([
      'nombre' => 'Golden Retriever',
      'descripcion' => 'El golden retriever o cobrador dorado es una raza de perro que se desarrolló alrededor de 1850 en el Reino Unido, más concretamente en Escocia. Posee una disposición amigable y una actitud que lo ha convertido en una de las razas familiares más populares.',
      'tipo_animal_id' => Tipo_Animal::where('nombre', 'Perro')->first()->id
    ]);

    Raza::insert([
      'nombre' => 'Pastor Aleman',
      'descripcion' => 'El pastor alemán u ovejero es una raza canina que proviene de Alemania. La raza es relativamente nueva, ya que su origen se remonta a 1899.​ Forman parte del grupo de pastoreo, ya que fueron perros desarrollados originalmente para reunir y vigilar ovejas.',
      'tipo_animal_id' => Tipo_Animal::where('nombre', 'Perro')->first()->id
    ]);

    Raza::insert([
      'nombre' => 'Dogo Argentino',
      'descripcion' => 'Junto con el Perro Pila Argentino son las únicas razas de perros desarrolladas en la República Argentina que aún existen. A nivel estándar racial, es un perro robusto, de estructura maciza y resistente en todas las partes del cuerpo. Con la capa de pelo completamente blanca, para distinguirlo fácilmente en el campo y el monte.',
      'tipo_animal_id' => Tipo_Animal::where('nombre', 'Perro')->first()->id
    ]);


    // Razas de gatos
    Raza::insert([
      'nombre' => 'Bobtail japonés',
      'descripcion' => 'El bobtail japonés es una raza de gato doméstico con una cola corta semejante a la de un conejo, a diferencia de otras razas de gato que poseen colas largas. La cola corta de esta raza se debe a un gen recesivo. Son pequeños gatos domésticos nativos de Japón y de todo el Sureste Asiático.',
      'tipo_animal_id' => Tipo_Animal::where('nombre', 'Gato')->first()->id
    ]);

    Raza::insert([
      'nombre' => 'American shorthair',
      'descripcion' => 'El gato americano de pelo corto o American shorthair es una raza de gato originaria de Estados Unidos. Se trata de una raza robusta que debe mucho a los gatos de trabajo que los primeros colonizadores trajeron a los Estados Unidos.',
      'tipo_animal_id' => Tipo_Animal::where('nombre', 'Gato')->first()->id
    ]);
  }
}
