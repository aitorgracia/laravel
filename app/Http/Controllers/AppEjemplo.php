<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AppEjemplo extends Controller
{
    public function mostrarinformacion()
    {
   
    /*return view("muestraAsignatura",array("nombremodulo"=>"dwes","ciclo"=>"DAW"));*/
    /*return view("muestraAsignatura",["nombremodulo"=>"dwes","ciclo"=>"DAW"]);*/
    /*return view("muestraAsignatura")->with(["nombremodulo"=>"dwes","ciclo"=>"DAW"]);*/

    $nombremodulo="dwes";
    $ciclo="DAW";

$departamentos["nombredpto"]= "Informatica";
$departamentos["ubicacion"]= "edificio A";
    //return view("asignaturas.muestraAsignatura",compact('nombremodulo','ciclo','departamentos'));
    return view('page');
    }
}
