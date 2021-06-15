<?php

namespace App\Http\Controllers;

use App\Models\convocatorias;
use App\Models\propietarios_user;
use Illuminate\Http\Request;

class ConvocatoriasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $convocatorias = convocatorias::get();
        return view('convocatorias/convocatorias',compact('convocatorias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $convocatorias = new convocatorias;
        $propietarios = propietarios_user::get();
        return  view('convocatorias/crearConvocatorias',compact('convocatorias','propietarios'));
      
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        //convocatorias::create($request->all());
        $input = $request->except('_token');
        $inputPropiedades = $input['propiedad'];
        $nPropiedades = count($inputPropiedades);

        if(isset($input['checkbox'])){
            for($i = 0; $i < $nPropiedades; $i++ ){
                if(in_array($input['propiedad'][$i], $input['checkbox'])  ){
                    $convocatorias = new convocatorias();
                    $convocatorias -> fecha      = $input['fecha'];
                    $convocatorias -> hora1      = $input['hora1'];
                    $convocatorias -> hora2      = $input['hora2'];
                    $convocatorias -> asunto      = $input['asunto'];
                    $convocatorias -> tipo      = $input['tipo'];
                    $convocatorias -> nombre    = $input['nombre'][$i];  
                    $convocatorias -> propiedad    = $input['propiedad'][$i];                
                    $convocatorias -> save();
                    }else{
                        return redirect()->route('convocatorias.create')->with('mensaje','Tienes que selecionar alguna propiedad');

                    }
                }

            }
            return redirect()->route('convocatorias.index')->with('mensaje','Se ha creado satisfactoriamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\convocatorias  $convocatorias
     * @return \Illuminate\Http\Response
     */
    public function show(convocatorias $convocatorias,$asunto)
    {
        //  
        $convocatorias = convocatorias::where('asunto','=',$asunto)->get();
        return view('convocatorias/showConvocatorias',compact('convocatorias'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\convocatorias  $convocatorias
     * @return \Illuminate\Http\Response
     */
    public function edit(convocatorias $convocatorias,$id)
    {
        //
        $convocatorias = convocatorias::findOrFail($id);
        $propietarios = propietarios_user::get();

        return view('convocatorias/editarConvocatorias',compact('convocatorias','propietarios'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\convocatorias  $convocatorias
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, convocatorias $convocatorias,$id)
    {
        //
        /*
        $convocatorias = convocatorias::findOrFail($id);
        dd($convocatorias);

        $inputPropiedades = $convocatorias['propiedad'];
        $nPropiedades = count($inputPropiedades);
        dd($nPropiedades);


        if(isset($convocatorias['checkbox'])){
            for($i = 0; $i < $nPropiedades; $i++ ){
                if(in_array($convocatorias['propiedad'][$i], $convocatorias['checkbox'])  ){
                    $convocatorias = new convocatorias();
                    $convocatorias -> fecha      = $convocatorias['fecha'];
                    $convocatorias -> hora1      = $convocatorias['hora1'];
                    $convocatorias -> hora2      = $convocatorias['hora2'];
                    $convocatorias -> asunto      = $convocatorias['asunto'];
                    $convocatorias -> tipo      = $convocatorias['tipo'];
                    $convocatorias -> nombre    = $convocatorias['nombre'][$i];  
                    $convocatorias -> propiedad    = $convocatorias['propiedad'][$i];                
                    $convocatorias -> update();
                    }else{
                        return redirect()->route('convocatorias.create')->with('mensaje','Tienes que selecionar alguna propiedad');

                    }
                }

            }
            return redirect()->route('convocatorias.index')->with('mensaje','Se ha creado satisfactoriamente');
            */


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\convocatorias  $convocatorias
     * @return \Illuminate\Http\Response
     */
    public function destroy(convocatorias $convocatorias,$id)
    {
        //
        convocatorias::where('id','=',$id)->delete();
        return redirect()->route('convocatorias.index')->with('mensaje','Se ha eliminado con exito');

    }
}
