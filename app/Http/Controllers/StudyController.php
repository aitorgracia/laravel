<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudyController extends Controller
{
    public function Index()
    {
       echo "En index de estudios";
    }

    public function show($id)
    {
       echo "es el id = $id";
    }
    public function create()
    {
       echo "este es el metodo create";
    }
    public function edit($id)
    {
       echo "Estas editando este = $id";
    }
    public function destroy($id){
        echo "estasa borrando este $id";
    }
}
