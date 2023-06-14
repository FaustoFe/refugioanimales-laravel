<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    User::insert(array(
      'name' => 'admin',
      'email' => 'admin@admin.com',
      'role_id' => Role::where('name', 'admin')->first()->id,
      'password' => bcrypt('1234'),
    ));

    User::insert(array(
      'name' => 'publicador',
      'email' => 'publicador@publicador.com',
      'role_id' => Role::where('name', 'publicador')->first()->id,
      'password' => bcrypt('1234'),
    ));
  }
}
