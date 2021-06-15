<?php

namespace App\Http\Controllers;

use App\Http\Requests\propietariosRequest;
use App\Models\propietarios_user;
use Illuminate\Http\Request;

class PropietariosUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $propietarios = propietarios_user::get();
        return view('propietarios/propietarios',compact('propietarios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $propietarios = new propietarios_user;
        return view('propietarios/crearPropietarios',compact('propietarios'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(propietariosRequest $request)
    {
        //
        propietarios_user::create($request->all());
        return redirect()->route('propietarios.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\propietarios_user  $propietarios_user
     * @return \Illuminate\Http\Response
     */
    public function show(propietarios_user $propietarios_user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\propietarios_user  $propietarios_user
     * @return \Illuminate\Http\Response
     */
    public function edit(propietarios_user $propietarios_user,$id)
    {
        //
        $propietarios = propietarios_user::findOrFail($id);
        return view('propietarios/editarPropietarios',compact('propietarios'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\propietarios_user  $propietarios_user
     * @return \Illuminate\Http\Response
     */
    public function update(propietariosRequest $request, propietarios_user $propietarios_user,$id)
    {
        //
        $propietarios = propietarios_user::findOrFail($id);
        $propietarios->fill($request->all());
        $propietarios->update();
        return redirect()->route('propietarios.index')->with('mensaje','Se ha actualizado con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\propietarios_user  $propietarios_user
     * @return \Illuminate\Http\Response
     */
    public function destroy(propietarios_user $propietarios_user,$id)
    {
        //
        propietarios_user::where('id','=',$id)->delete();
        return redirect()->route('propietarios.index')->with('mensaje','Se ha eliminado con exito');
    }
}
