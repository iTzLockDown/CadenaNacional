@extends('Normal.principal')

@section('content')





@if (Route::has('login'))
        @auth
            @if(Auth::user()->verificado=='1')
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <button class="btn btn-dark" onclick="cambio()"><label for="" id="cambiarBusqueda">Busqueda por Habitantes</label> </button>
                    </div>
                </div>
            </div>
            <div class="container" id="departamentoPobl">
                <div class="row">

                    <div class="col-lg-3">
                        <label for=""> <strong>Departamento:</strong>  </label> <br>

                        <select class="form-control" id="departamento" name="departamento">
                            <option>Seleccionar departamento</option>
                            @foreach($departamento as $departamentos)
                                <option value="{{$departamentos->id}}">{{$departamentos->name}}</option>
                            @endforeach
                        </select>


                    </div>

                    <div class="col-lg-3">
                        <label for=""> <strong>Provincia:</strong>  </label> <br>
                        {!! Form::select('provincia',['placeholder'=>'Selecciona'],null,['id'=>'provincia','class'=>'form-control']) !!}

                    </div>

                    <div class="col-lg-3">
                        <label for=""> <strong>Distrito:</strong>  </label> <br>
                        {!! Form::select('distrito',['placeholder'=>'Selecciona'],null,['id'=>'distrito','class'=>'form-control']) !!}
                    </div>

                    <div class="col-lg-3">
                        <label for=""> <strong>Emisora:</strong>  </label> <br>
                        {!! Form::select('emisora',['placeholder'=>'Selecciona'],null,['id'=>'emisora','class'=>'form-control']) !!}

                    </div>
                    <hr>

                </div>
            </div>


            <div class="container" id="distritosPobl">
                <div class="row">


                    <div class="col-lg-3">
                        <div class="form-group">
                            <label for=""> <strong>Ciudad mas poblada:</strong>  </label> <br>
                            <select class="form-control" id="distritoPobl" name="distritoPobl">
                                <option>Seleccionar Distrito</option>
                                @foreach($TraerMasPoblados as $distrito)
                                <option value="{{$distrito->id}}">{{$distrito->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <label for=""> <strong>Emisora:</strong>  </label> <br>
                        {!! Form::select('emisoraPobl',['placeholder'=>'Selecciona'],null,['id'=>'emisoraPobl','class'=>'form-control']) !!}

                    </div>
                    <hr>

                </div>
            </div>

            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-12">
                        <table class="table" id="myTable">
                            <thead>
                            <tr>
                                <th scope="col">Nombre de Cadena</th>
                                <th scope="col">Representante Legal</th>
                                <th scope="col">Representante Comercial</th>
                                <th scope="col">Telefono</th>
                            </tr>
                            </thead>
                            <tbody>


                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div id="myModal" class="modal fade" role="dialog">
                <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <section id="intro">
                            <h3>Estacion: <strong><label for="" id="nombreCadena"> </strong> </h3>
                            </section>
                        </div>
                        <div class="modal-body">

                            <section id="trainer-list">
                                <div class="trainer row">
                                    <div class="col-xs-12 col-sm-12">
                                        <p class="card-text"> Titular                :  <label for="" id="repComercial"></label></p>
                                        <p class="card-text"> Respresentate Legal    :  <label for="" id="respLegal"></label></p>
                                        <p class="card-text"> Autorización RVM N°    :  <label for="" id="autorizacion"></label></p>
                                        <p class="card-text"> Frecuencia             :  <label for="" id="numeroRad"></label> <label for="" id="frencuencia"></label></p>
                                        <p class="card-text"> Estación               :  <label for="" id="estacion"></label></p>
                                        <p class="card-text"> Email                  :  <label for="" id="email"></label></p>
                                        <p class="card-text"> Telefono               :  <label for="" id="telefono"></label></p>
                                        <p class="card-text"> Periodista             :  <label for="" id="periodista1"> </label> Cel: <label for="" id="telfper1"></label></p>
                                        <p class="card-text"> Periodista             :  <label for="" id="periodista2"> </label> Cel: <label for="" id="telfper2"></label></p>
                                        <p class="card-text"> Ruc                    :  <label for="" id="ruc"></label></p>
                                        <p class="card-text"> Dirección              :  <label for="" id="direccion"></label></p>
                                        <p class="card-text"> Sitio Web              : <label href="" id="websiteref" onclick="cargarpagina()">Link</label>
                                    </div>
                                </div>
                            </section>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>

                </div>
            </div>
            @else
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12">
                            <h2>Su cuenta aun no ha sido verificada por algun administrador.</h2>
                        </div>
                    </div>
                </div>

            @endif

        @else
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <h2>Inicia Sesión Porfavor</h2>
                    </div>
                </div>
            </div>

        @endauth
@endif

@endsection



