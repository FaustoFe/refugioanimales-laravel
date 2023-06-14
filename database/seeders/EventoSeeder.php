<?php

namespace Database\Seeders;

use App\Models\Evento;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class EventoSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    Evento::insert([
      'titulo' => 'Dia 1 de adopción',
      'fecha_inicio' => Carbon::now()->addDays(5)->setTime(14, 30),
      'fecha_fin' => Carbon::now()->addDays(5)->setTime(19, 00),
      'lugar' => 'Plaza Sarmiento',
      'descripcion' => 'Adopcón de mascotas',
    ]);

    Evento::insert([
      'titulo' => 'Dia 2 de adopción',
      'fecha_inicio' => Carbon::now()->addDays(6)->setTime(14, 00),
      'fecha_fin' => Carbon::now()->addDays(6)->setTime(18, 30),
      'lugar' => 'Plaza Sarmiento',
      'descripcion' => 'Adopcón de mascotas',
    ]);

    Evento::insert([
      'titulo' => 'Vacunación gratuita',
      'fecha_inicio' => Carbon::now()->addMonth()->addDays(7)->setTime(9, 30),
      'fecha_fin' => Carbon::now()->addMonth()->addDays(7)->setTime(15, 40),
      'lugar' => 'Parque del ferrocarríl',
      'descripcion' => 'Vacunación gratuita para perros',
    ]);
  }
}
