<?php

use App\Http\Controllers\AlumnoController;
use App\Http\Controllers\AppEjemplo;
use App\Http\Controllers\AsignaturaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudyController;
use App\Http\Controllers\ProductController;

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

 Route::resource('products',ProductController::class);
