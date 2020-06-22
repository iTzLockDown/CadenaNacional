<?php

namespace App\Http\Controllers;

use App\Emisora;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Hash;
use Session;
class UsuarioController extends Controller
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
        $grabar = new User();
        $grabar->name = $request->name;
        $grabar->email = $request->email;
        $grabar->rol = $request->rol;
        $grabar->password = Hash::make($request->email) ;
        $grabar->verificado = '0';

        $grabar->save();
        Session::flash('message', 'Usuario registrado correctamente.');
        return Redirect::route('usuario.lista');
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
        $editar =User::find($id);
        $editar->name = $request->name;
        $editar->email = $request->email;

        $editar->rol = $request->rol;
        $editar->password = Hash::make($request->email) ;
        $editar -> save();

        Session::flash('message', 'Usuario actualizado correctamente.');
        return Redirect::route('usuario.lista');
    }
    public function update2($id)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {

    }
}
