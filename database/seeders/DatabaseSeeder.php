<?php

namespace Database\Seeders;

use App\Models\Raza;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
  /**
   * Seed the application's database.
   *
   * @return void
   */
  public function run()
  {
    $this->call(RoleSeeder::class);
    $this->call(UserSeeder::class);
    $this->call(TipoAnimalSeeder::class);
    $this->call(RazaSeeder::class);
    $this->call(AnimalSeeder::class);
    $this->call(EventoSeeder::class);

    // \App\Models\User::factory(10)->create();
  }
}
