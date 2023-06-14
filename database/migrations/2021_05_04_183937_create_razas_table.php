<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRazasTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('razas', function (Blueprint $table) {
      $table->id();
      $table->timestamps();
      $table->string('nombre');
      $table->text('descripcion');
      $table->unsignedBigInteger('tipo_animal_id');
      $table->foreign('tipo_animal_id')->references('id')->on('tipos_animales')->onDelete('cascade');
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('razas');
  }
}
