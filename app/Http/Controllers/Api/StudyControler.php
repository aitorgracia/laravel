<?php

namespace App\Http\Controllers;

use App\Models\Study;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class StudyControler extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $study = Study::all();

        return response()->json(['status' => 'ok', 'data' => $study], 200);
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
            'name'=>'required',
            'code'=>'required',
            'level'=>'required'
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);            
        }

        $new = Study::create($request->all());
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
        $study=Study::find($id);

        // Chequeamos si encontró o no el study
        if (! $study)
        {
            // Se devuelve un array errors con los errores detectados y código 404
            return response()->json(['errors'=>(['code'=>404,'message'=>'No se encuentra un studyo con ese código.'])],404);
        }

        // Devolvemos la información encontrada.
        return response()->json(['status'=>'ok','data'=>$study],200);

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
        $study = Study::find($id);
        //si no se encuentra 404
        if (!$study) {
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
        $study->fill($request->all());
        $study->save();
        return response()->json([
            'status' => 'ok',
            'data' => $study
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
