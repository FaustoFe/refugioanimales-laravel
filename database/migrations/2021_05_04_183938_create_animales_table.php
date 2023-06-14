<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnimalesTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('animales', function (Blueprint $table) {
      $table->id();
      $table->timestamps();
      $table->string('nombre');
      $table->text('descripcion')->nullable();
      $table->integer('edad');
      $table->string('sexo');
      $table->integer('castrado');
      $table->string('vacunas')->nullable();
      $table->unsignedBigInteger('raza_id');
      $table->foreign('raza_id')->references('id')->on('razas')->onDelete('cascade');
      $table->string('imagen_path')->nullable();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('animales');
  }
}
