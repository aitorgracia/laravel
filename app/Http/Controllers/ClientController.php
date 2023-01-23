<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clientList = Client::all(); //eloquent ORM
        return view('client.index',['clientList' => $clientList]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('client.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'dni'=>'required',
            'nombre'=>'required|max:100',
            'apellidos'=>'required|max:100',
            'telefono'=>'required',
            'email'=>'required'


        ],
        [
            'dni.required'=>'Debes rellenar el dni',
            'nombre.required'=>'Debes rellenar el campo nombre',
            'apellidos.required'=>'Debes rellenar el campo precio',
            'telefono.required'=>'Debes rellenar el campo descricion',
            'email.required'=>'Debes rellenar el campo descricion',
            'nombre.max'=>'El nombre no puede exceder los 100 caracteres',
            'apellidos.max'=>'El nombre no puede exceder los 100 caracteres',
            'dni.regex'=>'El formato del dni no es el correcto',

        ]);

        Client::create($request->all());

        return redirect()->route('clients.index')->with('exit', 'El client ha sido añadido');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $client = Client::find($id);
        return view('client.show', ['client' => $client]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $client = Client::find($id);
        return view('client.edit', ['client' => $client]);
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

        $request->validate([
            'dni'=>'required|regex:/^[0-9]{8}[TRWAGMYFPDXBNJZSQVHLCKE]$/',
            'nombre'=>'required|max:100',
            'apellidos'=>'required|max:100',
            'telefono'=>'required',
            'email'=>'required'


        ],
        [
            'dni.required'=>'Debes rellenar el dni',
            'nombre.required'=>'Debes rellenar el campo nombre',
            'apellidos.required'=>'Debes rellenar el campo precio',
            'telefono.required'=>'Debes rellenar el campo descricion',
            'email.required'=>'Debes rellenar el campo descricion',
            'nombre.max'=>'El nombre no puede exceder los 100 caracteres',
            'apellidos.max'=>'El nombre no puede exceder los 100 caracteres',
            'dni.regex'=>'El formato del dni no es el correcto',

        ]);

        $c = Client::find($id);
        $c->dni = $request->input("dni");
        $c->nombre = $request->input("nombre");
        $c->apellidos = $request->input("apellidos");
        $c->telefono = $request->input("telefono");
        $c->email = $request->input("email");
        $c->save();

        return redirect()->route('clients.index')->with('exit', 'El cliente ha sido actualizado');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $c = Client::find($id);;
        $c->delete();

        return redirect()->route('clients.index')->with('exit', 'El cliente ha sido borrado');
    }
}
