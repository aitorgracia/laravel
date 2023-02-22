<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Product;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();

        return response()->json(['status' => 'ok', 'data' => $products], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nombre'=>'required|max:100',
            'precio'=>'required|gt:0',
            'descripcion'=>'required'
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);            
        }

        $new = Product::create($request->all());
        return response()->json($new, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        // Corresponde con la ruta /studies/{study}
        // Buscamos un study por el ID.
        $product=Product::find($id);

        // Chequeamos si encontró o no el product
        if (! $product)
        {
            // Se devuelve un array errors con los errores detectados y código 404
            return response()->json(['errors'=>(['code'=>404,'message'=>'No se encuentra un producto con ese código.'])],404);
        }

        // Devolvemos la información encontrada.
        return response()->json(['status'=>'ok','data'=>$product],200);

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
        $product = Product::find($id);
        //si no se encuentra 404
        if (!$product) {
            return response()->json([
                'status' => 404,
                'message' => 'No se ha encontrado un estudio con ese código'
            ], 404);
        }
        //si no valida 422
        $validator = Validator::make($request->all(), [
            'code' => 'required|unique:studies,code|max:6',
            'name' => 'required',
            'abreviation' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);            
        }

        //todo ok 201
        $product->fill($request->all());
        $product->save();
        return response()->json([
            'status' => 'ok',
            'data' => $product
        ], 200);
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
