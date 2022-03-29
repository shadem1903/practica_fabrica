<?php

namespace App\Http\Controllers;

use App\Models\estudiante;
use Illuminate\Http\Request;

class EstudianteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $estudiante = estudiante::all();
        return $estudiante;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $estudiante = new estudiante();
        $estudiante->name = $request->name;
        $estudiante->apellido= $request->apellido;
        $estudiante->direccion = $request->direccion;
        $estudiante->tipodedocumento = $request->tipodedocumento;
        $estudiante->documento = $request->documento;
        
        $estudiante->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\estudiante  $estudiante
     * @return \Illuminate\Http\Response
     */
    public function show(estudiante $estudiante)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\estudiante  $estudiante
     * @return \Illuminate\Http\Response
     */
    public function edit(estudiante $estudiante)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\estudiante  $estudiante
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, estudiante $estudiante)
    {
            $estudiante = estudiante::findOrFail($request->id);
            $estudiante->name = $request->name;
            $estudiante->apellido= $request->apellido;
            $estudiante->direccion = $request->direccion;
            $estudiante->tipodedocumento = $request->tipodedocumento;
            $estudiante->documento = $request->documento;
            $estudiante->save();
            return $estudiante;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\estudiante  $estudiante
     * @return \Illuminate\Http\Response
     * @param int $id
     */
    public function destroy(Request $request,$id)
    {
        $estudiante = estudiante::destroy($request->id);
        return $estudiante;
    }
}
