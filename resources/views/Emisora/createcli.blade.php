@extends('Normal.principal')

@section('content')

    @if (Route::has('login'))
        @auth
            @if(Auth::user()->verificado=='1')

                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <h2>Registro de Estacion</h2>
                                </div>
                                @if($errors->any())
                                    <div class="alert alert-warning" role="alert">
                                        @foreach ($errors->all() as $error)
                                            <div>{{ $error }}</div>
                                        @endforeach
                                    </div>
                                @endif

                                <div class="alert alert-info alert-dismissible" role = "alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    Todos los campos son necesarios, pero algunos no son obligatorios. Si no cuenta con alguno,<label class="text-center"> ingrese no asigna!</label>
                                </div>



                                <div class="card-body">
                                    {!!Form::open(['route'=>'veremisora.store','method'=>'POST','role'=>'form','enctype'=>'multipart/form-data', 'class'=>'form-horizontal'])!!}


                                    <div class="form-group row">
                                        <label class="col-md-3 col-form-label">Nombre</label>
                                        <div class="col-md-3">

                                            {{ Form::text('nombrecadena',null,$attributes = ['class'=>'form-control', 'placeholder'=>'Nombre...','autocomplete'=>'off',])}}

                                        </div>
                                        <label class="col-md-2 col-form-label text-left">Numero de Ruc</label>
                                        <div class="col-md-4">
                                            {{ Form::text('ruc',null,$attributes = ['class'=>'form-control', 'placeholder'=>'Ruc...','autocomplete'=>'off',])}}

                                        </div>


                                    </div>

                                    <div class="form-group row">
                                        <label class="col-md-3 col-form-label text-left">Representante Legal</label>
                                        <div class="col-md-3">
                                            {{ Form::text('representanteLegal',null,$attributes = ['class'=>'form-control', 'placeholder'=>'Representante Legal','autocomplete'=>'off',])}}

                                        </div>
                                        <label class="col-md-2 col-form-label">Representante Com.</label>
                                        <div class="col-md-4">
                                            {{ Form::text('representanteComercial',null,$attributes = ['class'=>'form-control', 'placeholder'=>'Representante comercial','autocomplete'=>'off',])}}

                                        </div>

                                    </div>

                                    <div class="form-group row">
                                        <label class="col-md-3 col-form-label">Frecuencia</label>
                                        <div class="col-md-3">
                                            {{ Form::text('frecuencia',null,$attributes = ['class'=>'form-control', 'placeholder'=>'Frecuencia de la radio','autocomplete'=>'off',])}}

                                        </div>

                                        <label class="col-md-2 col-form-label text-left">Numero</label>
                                        <div class="col-md-4">
                                            {{ Form::text('numeroRadio',null,$attributes = ['class'=>'form-control', 'placeholder'=>'Numero','autocomplete'=>'off',])}}

                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-md-3 col-form-label">Email</label>
                                        <div class="col-md-3">
                                            {{ Form::text('email',null,$attributes = ['class'=>'form-control', 'placeholder'=>'Dirección email"','autocomplete'=>'off',])}}
                                        </div>

                                        <label class="col-md-2 col-form-label text-left">Direccion</label>
                                        <div class="col-md-4">
                                            {{ Form::text('direccion',null,$attributes = ['class'=>'form-control', 'placeholder'=>'Dirección"','autocomplete'=>'off',])}}

                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-md-3 col-form-label">Telefono</label>
                                        <div class="col-md-3">
                                            {{ Form::text('telefono',null,$attributes = ['class'=>'form-control', 'placeholder'=>'Telefono..."','autocomplete'=>'off',])}}

                                        </div>

                                        <label class="col-md-2 col-form-label text-left">Descripcion</label>
                                        <div class="col-md-4">
                                            {{ Form::text('descripcion',null,$attributes = ['class'=>'form-control', 'placeholder'=>'Descripción..."','autocomplete'=>'off',])}}

                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-md-3 col-form-label">Departamento</label>
                                        <div class="col-md-3">
                                            {!! Form::select('departamento',$departamento,null,['id'=>'departamento','class'=>'form-control']) !!}
                                        </div>

                                        <label class="col-md-2 col-form-label text-left">Provincia</label>
                                        <div class="col-md-4">
                                            {!! Form::select('provincia',['placeholder'=>'Selecciona'],null,['id'=>'provincia','class'=>'form-control']) !!}

                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-3 col-form-label">Distrito</label>
                                        <div class="col-md-3">
                                            {!! Form::select('distrito',['placeholder'=>'Selecciona'],null,['id'=>'distrito','class'=>'form-control']) !!}

                                        </div>

                                        <label class="col-md-2 col-form-label">Estación</label>
                                        <div class="col-md-4">
                                            {!! Form::select('estacion', ['RADIO' => 'Radio', 'TELEVISION' => 'Television'], null, ['class'=>'form-control' ,'placeholder' => 'Seleccione la estación...']);
                                         !!}
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-3 col-form-label">Periodista</label>
                                        <div class="col-md-3">
                                            {{ Form::text('nomper1',null,$attributes = ['class'=>'form-control', 'placeholder'=>'Periodista...','autocomplete'=>'off',])}}

                                        </div>

                                        <label class="col-md-2 col-form-label">Telefono</label>
                                        <div class="col-md-4">
                                            {{ Form::text('telper1',null,$attributes = ['class'=>'form-control', 'placeholder'=>'Telefono/celular','autocomplete'=>'off',])}}

                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-3 col-form-label">Periodista</label>
                                        <div class="col-md-3">
                                            {{ Form::text('nomper2',null,$attributes = ['class'=>'form-control', 'placeholder'=>'Periodista...','autocomplete'=>'off',])}}

                                        </div>

                                        <label class="col-md-2 col-form-label">Telefono</label>
                                        <div class="col-md-4">
                                            {{ Form::text('telper2',null,$attributes = ['class'=>'form-control', 'placeholder'=>'Telefono/celular','autocomplete'=>'off',])}}

                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-3 col-form-label">Autorizacion N°</label>
                                        <div class="col-md-9">
                                            {{ Form::text('autorizacion',null,$attributes = ['class'=>'form-control', 'placeholder'=>'Autorizacion MTC...','autocomplete'=>'off',])}}

                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-3 col-form-label">Pagina de la Estación</label>
                                        <div class="col-md-9">
                                            {{ Form::text('website',null,$attributes = ['class'=>'form-control', 'placeholder'=>'Sitio Web...','autocomplete'=>'off',])}}

                                        </div>
                                    </div>

                                </div>
                                <div class="card-footer">
                                    <center><button class="btn btn-sm btn-primary" type="submit"  >
                                            <i class="fa fa-save" ></i> Registrar</button> &nbsp;</center>

                                </div>
                                {!!Form::close()!!}
                            </div>
                        </div>
                    </div>
                </div>

                <br>
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
