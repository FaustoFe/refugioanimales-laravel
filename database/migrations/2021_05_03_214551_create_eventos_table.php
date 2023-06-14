<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventosTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('eventos', function (Blueprint $table) {
      $table->id();
      $table->timestamps();
      $table->string('titulo');
      $table->datetime('fecha_inicio');
      $table->datetime('fecha_fin');
      $table->string('lugar');
      $table->string('descripcion')->nullable();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('eventos');
  }
}
