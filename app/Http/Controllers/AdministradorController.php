<?php

namespace App\Http\Controllers;

use App\Departamento;
use App\Distrito;
use App\Emisora;
use App\Imports\EmisoraImport;
use App\Provincia;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Excel;

class AdministradorController extends Controller
{
    public function ListarEmisora(Request $request)
    {

        $TraerTodos = Emisora::where('nombrecadena','like',"%".$request->get('nombre')."%")
                                ->where('estado',1)->paginate(7);
        return view('Emisora.principal', compact('TraerTodos'));

    }

    public function ListarEmisoraVerifica()
    {
        $TraerTodos = Emisora::where('estado',0)->paginate(7);;
        return view('Emisora.principalver', compact('TraerTodos'));

    }
    public function CrearEmisora()
    {
        $departamento = Departamento::all();
        return view('Emisora.create', compact('departamento'));
    }

    public function ListarUsuario()
    {
        $TraerTodos = User::all();
        return view('Usuario.principal', compact('TraerTodos'));

    }

    public function CrearUsuario()
    {

        return view('Usuario.create');
    }

    public function getProvincia(Request $request, $id){
        if($request->ajax()){
            $provincias = Provincia::provincias($id);
            return response()->json($provincias);
        }
    }

    public function getDistrito(Request $request, $id){
        if($request->ajax()){
            $distritos = Distrito::distritos($id);
            return response()->json($distritos);
        }
    }

    public function EditarEmisora($id)
    {
        $TraerUno = Emisora::find($id);
        $departamento = Departamento::all();
        return view('Emisora.update', ['emisora'=>$TraerUno], compact('departamento'));
    }
    public function VerificarInfoEmisora($id)
    {
        $TraerUno = Emisora::find($id);
        $departamento = Departamento::pluck('name','id' );
        return view('Emisora.emisoraver', ['emisora'=>$TraerUno], compact('departamento'));
    }


    public function EliminarEmisora($id)
    {
        $TraerUno = PDCategoria::find($id);
        $TraerUno->save();

        Session::flash('message', 'Categoria eliminado correctamente.');
        return Redirect::route('Emisora.lista');
    }

    public function EditarUsuario($id)
    {
        $TraerUno = User::find($id);
        return view('Usuario.update', ['usuario'=>$TraerUno]);
    }

    public function EliminarUsuario($id)
    {
        $TraerUno = User::find($id);
        $TraerUno->save();

        Session::flash('message', 'Usuario eliminado correctamente.');
        return Redirect::route('usuario.lista');
    }

    public function VerEmisora()
    {
        $TraerMasPoblados = Distrito::
            orderBy('name', 'ASC')
            ->get();
        $departamento = Departamento::all();
        return view('welcome', compact('departamento', 'TraerMasPoblados'));
    }


    public function getEmisora(Request $request, $id){
        if($request->ajax()){
            $emisoras = Emisora::emisoras($id);
            return response()->json($emisoras);
        }
    }

    public function  getEmisoraProv(Request $request, $id)
    {
         if($request->ajax()){
             $emisoras = Emisora::EmisoraProv($id);
             return response()->json($emisoras);
         }
    }

    public function  getEmisoraProvincia(Request $request, $id)
    {
        if($request->ajax()){
            $emisoras = Emisora::EmisoraProvincia($id);
            return response()->json($emisoras);
        }
    }

    public function  getEmisoraDistrito(Request $request, $id)
    {
        if($request->ajax()){
            $emisoras = Emisora::EmisoraDistrito($id);
            return response()->json($emisoras);
        }
    }

    public function  getEmisoras(Request $request, $id, $distrito, $state)
    {
        if($request->ajax()){
            if ($state=='dep')
            {
                $emisora = Emisora::where('estacion',$id)
                    ->where('departamento', $distrito)->where('estado',1)
                    ->get();
            }
            if ($state=='prov')
            {
                $emisora = Emisora::where('estacion',$id)
                    ->where('provincia', $distrito)->where('estado',1)
                    ->get();
            }
            if ($state=='dist')
            {
                $emisora = Emisora::where('estacion',$id)
                    ->where('distrito', $distrito)->where('estado',1)
                    ->get();
            }


            return response()->json($emisora);
        }
    }


    public function getEmi(Request $request, $id){
        if($request->ajax()){
            $emisora = Emisora::emisora($id);
            return response()->json($emisora);
        }
    }

    public function CambiarPass($id){
        $TraerUno = User::find($id);
        return view('Usuario.changepass',['usuario'=>$TraerUno]);
    }
    public function deleteEmi($id)
    {

        $delete =Emisora::find($id);
        $delete->delete();
        Session::flash('message', 'Emisora eliminado exitosamente.!');
        return Redirect::route('emisora.lista');

    }

    public function deleteUsu($id)
    {

        $delete = User::find($id);
        $delete->delete();
        Session::flash('message', 'Usuario eliminado exitosamente.!');
        return Redirect::route('usuario.lista');
    }

    public function verificaUsu($id)
    {

        $verifica = User::find($id);
        $verifica->verificado = '1';
        $verifica->save();
        Session::flash('message', 'Usuario verificado exitosamente.!');
        return Redirect::route('usuario.lista');
    }

    public function RegistrarEmisoraCli()
    {
        $departamento = Departamento::pluck('name','id' );
        return view('Emisora.createcli', compact('departamento'));
    }

    public function  importExcel(Request $request)
    {
        $file=$request->file('file');
        Excel::import(new EmisoraImport, $file);
        return back()->with('message', 'Importacion exitosa');
    }
    public  function importar()
    {
        return view('Emisora.importar');
    }
    public function CambiarPassword($id){
        $TraerUno = User::find($id);
        return view('Usuario.changepasscli',['usuario'=>$TraerUno]);
    }
}
