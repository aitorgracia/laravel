<?php

use App\Http\Controllers\AlumnoController;
use App\Http\Controllers\AppEjemplo;
use App\Http\Controllers\AsignaturaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudyController;
use App\Http\Controllers\PruebaController;

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
/**
 * Asignaturas
 */

 Route::resource('asignaturas',AsignaturaController::class);

 /**ejemplos  varios */
Route::get('/informacion-asignatura',[AppEjemplo::class,'mostrarinformacion'] )->name('infoasig');

Route::get('/', function () {
    echo "<a href=".route('infoasig').">Mostrar informacion Asignatura</a><br>";

});


//Route::get('/', function () {
//    return view('welcome');
//});
//Route::get('/prueba2/{name}',[PruebaController::class, 'saludoCompleto']);
//Route::get('/hola/{nombre?}',function($nombre="MUNDO"){
//  echo "hola Mundo $nombre";
//});
//Route::get('/studies/{id}',[StudyController::class, 'show'])->where('id','\d+');
//Route::get('/studies/create',[StudyController::class, 'create']);
//Route::get('/studies/edit/{id}',[StudyController::class, 'edit']);
//Route::get('/studies',[StudyController::class, 'index']);
//Route::get('/studies/{id}',[StudyController::class, 'show']);
//Route::delete('/studies/{id}',[StudyController::class,'destroy']);


//Route::resource('/students',AlumnoController::class);
