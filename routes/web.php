<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Auth::routes();

Route::prefix('emisora')->group(function ()
{
    Route::get('/listaremisora', 'AdministradorController@ListarEmisora')->name('emisora.lista');
    Route::get('/listaremisoraverifica', 'AdministradorController@ListarEmisoraVerifica')->name('emisora.lista.verificar');
    Route::resource('/emisora','EmisoraController');
});
Route::get('/createemi','AdministradorController@CrearEmisora')->name('emisora.create');
Route::get('/editaremi/{id}', 'AdministradorController@EditarEmisora')->name('emisora.editar');
Route::get('/verificainforemi/{id}', 'AdministradorController@VerificarInfoEmisora')->name('emisora.ver.verificar');
Route::get('/eliminaremi/{id}', 'AdministradorController@EliminarEmisora')->name('emisora.eliminar');

Route::resource('/veremisora', 'ControllerREgitroEmisora');


Route::get('provincias/{id}','AdministradorController@getProvincia');
Route::get('distritos/{id}','AdministradorController@getDistrito');
Route::get('emisoras/{id}','AdministradorController@getEmisora');
Route::get('


/{id}','AdministradorController@getEmi');
Route::get('emisorabusquedaSu/{id}','AdministradorController@getEmisoraSusanMiAmor');
Route::get('emisorabusprov/{id}','AdministradorController@getEmisoraProv');
Route::get('emisorabusprovincia/{id}','AdministradorController@getEmisoraProvincia');
Route::get('emisorabusdistrito/{id}','AdministradorController@getEmisoraDistrito');
Route::get('emisorasbus/{id}/{distritos}/{state}', 'AdministradorController@getEmisoras');

Route::get('/home', 'HomeController@index')->name('home');


Route::prefix('usuario')->group(function ()
{
    Route::get('/listausuario', 'AdministradorController@ListarUsuario')->name('usuario.lista');
    Route::resource('/usuario','UsuarioController');
});

Route::resource('/changue', 'ChanguePassController');
Route::resource('/changuecli', 'ChanguePassCli');

Route::get('/editarusu/{id}', 'AdministradorController@EditarUsuario')->name('usuario.editar');
Route::get('/cambiapass/{id}', 'AdministradorController@CambiarPass')->name('usuario.password');
Route::get('/cambiapassword/{id}', 'AdministradorController@CambiarPassword')->name('cliente.password');

Route::get('/createusu','AdministradorController@CrearUsuario')->name('usuario.create');


Route::get('/', 'AdministradorController@VerEmisora')->name('cliente.emisora');


Route::get('/registrarestacion', 'AdministradorController@RegistrarEmisoraCli')->name('reg.emisora.cli');





Route::get('/eliminaemisora/{id}', 'AdministradorController@deleteEmi')->name('emisora.delete');
Route::get('/eliminauser/{id}', 'AdministradorController@deleteUsu')->name('usuario.delete');
Route::get('/verificauser/{id}', 'AdministradorController@verificaUsu')->name('usuario.verifica');


Route::get('/exportar', function () {
    return Excel::download(new \App\Exports\EmisoraExport(), 'emisoras.xlsx');
})->name('exportar.excel');


Route::get('importar','AdministradorController@importar' )->name('importar');
Route::post('import-list-excel','AdministradorController@importExcel')->name('emisoras.import.excel');
