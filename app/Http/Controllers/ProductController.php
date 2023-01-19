<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productList = Product::all(); //eloquent ORM
        return view('product.index',['productList' => $productList]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('product.create');
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
            'nombre'=>'required|max:100',
            'precio'=>'required|gt:0',
            'descripcion'=>'required'


        ],
        [

            'nombre.required'=>'Debes rellenar el campo nombre',
            'precio.required'=>'Debes rellenar el campo precio',
            'descripcion.required'=>'Debes rellenar el campo descricion',
            'precio.gt'=>'El precio a introducir debe superar 0',
            'nombre.max'=>'El nombre no puede exceder los 100 caracteres'

        ]);

        Product::create($request->all());

        return redirect()->route('products.index')->with('exit', 'El producto ha sido añadido');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);
        return view('product.show', ['product' => $product]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        return view('product.edit', ['product' => $product]);
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
            'nombre'=>'required|max:100',
            'precio'=>'required|gt:0',
            'descripcion'=>'required'


        ],
        [

            'nombre.required'=>'Debes rellenar el campo nombre',
            'precio.required'=>'Debes rellenar el campo precio',
            'descripcion.required'=>'Debes rellenar el campo descricion',
            'precio.gt'=>'El precio a introducir debe superar 0',
            'nombre.max'=>'El nombre no puede exceder los 100 caracteres'

        ]);

        $p = Product::find($id);
        $p->nombre = $request->input("nombre");
        $p->descripcion = $request->input("descripcion");
        $p->precio = $request->input("precio");
        $p->save();

        return redirect()->route('products.index')->with('exit', 'El producto ha sido actualizado');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $p = Product::find($id);;
        $p->delete();

        return redirect()->route('products.index')->with('exit', 'El producto ha sido borrado');
    }
}
