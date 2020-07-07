<?php

namespace App\Http\Controllers;

use App\Distrito;
use App\Emisora;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Session;
use Validator;

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



        $v = \Validator::make($request->all(), [

            'nombrecadena' => 'required',
            'representanteLegal' => 'required',
            'representanteComercial' => 'required',
            'frecuencia' => 'required',
            'direccion' => 'required',
            'numeroRadio' => 'required',
            'email' => 'required|email',
            'ruc' => ['required', 'string', 'min:11'],
            'descripcion' => 'required',
            'telefono' => ['required', 'min:9'],
            'estacion' => ['required', 'string'],
            'autorizacion' => ['required', 'string'],

            'nomper1' => ['required', 'string'],
            'telper1' => ['required', 'string'],
            'nomper2' => ['required', 'string'],
            'telper2' => ['required', 'string'],
            'website' => ['required', 'string'],

            'departamento' => ['required', 'string'],
            'provincia' => ['required', 'string'],
            'distrito' => ['required', 'string'],



        ]);

        if ($v->fails())
        {
            return redirect()->back()->withInput()->withErrors($v->errors());
        }


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
        $grabar->estado = 1;
        $grabar->nomper1 = $request->nomper1;
        $grabar->telper1 = $request->telper1;
        $grabar->nomper2 = $request->nomper2;
        $grabar->telper2 = $request->telper2;
        $grabar->autorizacion = $request->autorizacion;
        $grabar->website = $request->website;
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

        $v = \Validator::make($request->all(), [

            'nombrecadena' => 'required',
            'representanteLegal' => 'required',
            'representanteComercial' => 'required',
            'frecuencia' => 'required',
            'direccion' => 'required',
            'numeroRadio' => 'required',
            'email' => 'required|email',
            'ruc' => ['required', 'string', 'min:11'],
            'descripcion' => 'required',
            'telefono' => ['required', 'min:9'],
            'estacion' => ['required', 'string'],

            'nomper1' => ['required', 'string'],
            'telper1' => ['required', 'string'],
            'nomper2' => ['required', 'string'],
            'telper2' => ['required', 'string'],
            'website' => ['required', 'string'],

            'autorizacion' => ['required', 'string'],

        ]);

        if ($v->fails())
        {
            return redirect()->back()->withInput()->withErrors($v->errors());
        }


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
        $editar->nomper1 = $request->nomper1;
        $editar->telper1 = $request->telper1;
        $editar->nomper2 = $request->nomper2;
        $editar->telper2 = $request->telper2;
        $editar->autorizacion = $request->autorizacion;
        $editar->website = $request->website;

        if ($request->departamento==="Seleccionar departamento")
        {}
        else{

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
