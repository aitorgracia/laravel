<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AsignaturaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('asignaturas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        //usar input que permite trabajar con arrays
        $datos= $request->validate([
            'nombre'=>'required|max:7',
            'curso'=>'required|integer|regex:/^[12]$/',
            'ciclo'=>'required|regex:/^DA[WM]$/'

        ],[
            'nombre.required'=> 'Debes rellenar el nombre',
            'curso.required'=> 'Debes rellenar el curso',
            'ciclo.required'=> 'Debes rellenar el ciclo',
            'nombre.max'=>'El nombre solo puede tener un maximo de 7 caracteres',
            'curso.integer'=>'El curso tiene que ser un entero',
            'curso.regex' => 'El curso debe estar comprendido entre 1 y 2'

        ]);

        dd($datos);

        /*
        $nombre= $request->input('nombre');
        $curso=$request->input('curso');
        $ciclo=$request->input('ciclo');
        dd($nombre,$curso,$ciclo);

        //Devuelve un array con todos los datos

        // $datos=$request->all();
        //dd($datos);

        //MEJOR OPCION
        //Devuelve un array con los datos que quieras

        //$datos=$request->only('nombre','ciclo');
        //dd($datos);

        //todo excepto el nombre
        //$datos=$request->except('nombre');
        //dd($datos);

        //verificar que existe un campo en el formulario
        /** */
        
       // $nuevocampo="";
        //if($request->has('nuevocampo')){
          //  dd($nuevocampo);
        //}else{
          //  dd("El campo no existe");
        //}

        //$nombre= $request->get('nombre');
        //$nombre= $request->('nombre');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
