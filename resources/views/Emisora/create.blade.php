@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            Registros de <strong>Emisoras</strong></div>
        @if($errors->any())
            <div class="alert alert-warning" role="alert">
                @foreach ($errors->all() as $error)
                    <div>{{ $error }}</div>
                @endforeach
            </div>
        @endif
        <div class="card-body">
            {!!Form::open(['route'=>'emisora.store','method'=>'POST','role'=>'form','enctype'=>'multipart/form-data', 'class'=>'form-horizontal'])!!}


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
                        <select class="form-control" id="departamento" name="departamento">
                            <option>Seleccionar departamento</option>
                            @foreach($departamento as $departamentos)
                                <option value="{{$departamentos->id}}">{{$departamentos->name}}</option>
                            @endforeach
                        </select>
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

        </div>
        <div class="card-footer">
            <button class="btn btn-sm btn-primary" type="submit"  >
                <i class="fa fa-save" ></i> Grabar</button> &nbsp;
            <a href="{{route('emisora.lista')}}" class="btn btn-sm btn-danger" > <i class="fa fa-arrow-left" ></i> Regresar</a>

        </div>
        {!!Form::close()!!}
    </div>

@endsection
