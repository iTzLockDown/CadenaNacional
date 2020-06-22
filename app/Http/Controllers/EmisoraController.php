<?php

namespace App\Http\Controllers;

use App\Distrito;
use App\Emisora;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Session;

class EmisoraController extends Controller
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



    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $grabar = new Emisora();
        $grabar->nombrecadena = $request->nombrecadena;
        $grabar->representanteLegal = $request->representanteLegal;
        $grabar->representanteComercial = $request->representanteComercial;
        $grabar->frecuencia = $request->frecuencia;
        $grabar->direccion = $request->direccion ;

        $grabar->numeroRadio = $request->numeroRadio ;
        $grabar->email = $request->email ;
        $grabar->ruc = $request->ruc ;
        $grabar->descripcion = $request->descripcion ;
        $grabar->telefono = $request->telefono ;
        $grabar->estacion = $request->estacion;
        $grabar->estado = 0;
        $grabar->departamento = $request->departamento ;
        $grabar->provincia = $request->provincia ;
        $grabar->distrito = $request->distrito ;

        $grabar->save();
        Session::flash('message', 'Emisora registrada correctamente.');
        return Redirect::route('emisora.lista');
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

        $editar =Emisora::find($id);
        $editar->nombrecadena = $request->nombrecadena;
        $editar->representanteLegal = $request->representanteLegal;
        $editar->representanteComercial = $request->representanteComercial;
        $editar->frecuencia = $request->frecuencia;
        $editar->direccion = $request->direccion ;

        $editar->numeroRadio = $request->numeroRadio ;
        $editar->email = $request->email ;
        $editar->ruc = $request->ruc ;
        $editar->estacion = $request->estacion;
        $editar->descripcion = $request->descripcion ;
        $editar->telefono = $request->telefono ;
        if (!$request->provincia=='placeholder')
        {
            $editar->departamento = $request->departamento ;
            $editar->provincia = $request->provincia ;
            $editar->distrito = $request->distrito ;
        }


        $editar -> save();

        Session::flash('message', 'Emisora actualizado correctamente.');
        return Redirect::route('emisora.lista');
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
