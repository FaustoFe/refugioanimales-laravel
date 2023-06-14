<?php

use App\Http\Controllers\AnimalController;
use App\Http\Controllers\EventoController;
use App\Http\Controllers\RazaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TipoAnimalController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware(['auth'])->group(function () {


  Route::get('/', [AnimalController::class, 'index'])->name('animal-index');
  Route::get('/animal/{id}', [AnimalController::class, 'show'])->name('animal-show');
  Route::get('/animal/delete/{id}', [AnimalController::class, 'delete'])->name('animal-delete');
  Route::patch('/animal/update/{id}', [AnimalController::class, 'update'])->name('animal-edit');
  Route::get('/animal-create', [AnimalController::class, 'create'])->name('animal-create');
  Route::post('/animal-post', [AnimalController::class, 'store'])->name('animal-store');

  Route::get('/eventos', [EventoController::class, 'index'])->name('eventos');
  Route::get('/evento/delete/{id}', [EventoController::class, 'delete'])->name('evento.delete');
  Route::get('/evento/edit/{id}', [EventoController::class, 'edit'])->name('evento.edit');
  Route::patch('/evento/update/{id}', [EventoController::class, 'update'])->name('evento.update');
  Route::get('/evento-create', [EventoController::class, 'create'])->name('evento.create');
  Route::post('/evento-post', [EventoController::class, 'store'])->name('evento.store');

  Route::middleware(['admin'])->group(function () {

    Route::get('/razas', [RazaController::class, 'index'])->name('razas');
    Route::get('/raza/delete/{id}', [RazaController::class, 'delete'])->name('raza.delete');
    Route::get('/raza/edit/{id}', [RazaController::class, 'edit'])->name('raza.edit');
    Route::patch('/raza/update/{id}', [RazaController::class, 'update'])->name('raza.update');
    Route::get('/raza/create', [RazaController::class, 'create'])->name('raza.create');
    Route::post('/raza/post', [RazaController::class, 'store'])->name('raza.store');

    Route::get('/tipo-animal', [TipoAnimalController::class, 'index'])->name('tipos_animal');
    Route::get('/tipo-animal/delete/{id}', [TipoAnimalController::class, 'delete'])->name('tipo_animal.delete');
    Route::get('/tipo-animal/edit/{id}', [TipoAnimalController::class, 'edit'])->name('tipo_animal.edit');
    Route::patch('/tipo-animal/update/{id}', [TipoAnimalController::class, 'update'])->name('tipo_animal.update');
    Route::get('/tipo-animal/create', [TipoAnimalController::class, 'create'])->name('tipo_animal.create');
    Route::post('/tipo-animal/post', [TipoAnimalController::class, 'store'])->name('tipo_animal.store');
  });
});

require __DIR__ . '/auth.php';
