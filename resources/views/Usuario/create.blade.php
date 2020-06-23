@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            Registros de <strong>Usuarios</strong></div>
        <div class="card-body">
            {!!Form::open(['route'=>'usuario.store','method'=>'POST','role'=>'form','enctype'=>'multipart/form-data', 'class'=>'form-horizontal'])!!}


            <div class="form-group row">
                <label class="col-md-3 col-form-label">Nombre</label>
                <div class="col-md-3">

                    {{ Form::text('name',null,$attributes = ['class'=>'form-control', 'placeholder'=>'Nombre...','autocomplete'=>'off',])}}

                </div>


            </div>

            <div class="form-group row">
                <label class="col-md-3 col-form-label">Email</label>
                <div class="col-md-3">

                    {{ Form::email('email',null,$attributes = ['class'=>'form-control', 'placeholder'=>'Nombre...','autocomplete'=>'off',])}}

                </div>


            </div>

            <div class="form-group row">
                <label class="col-md-3 col-form-label">Permisos</label>
                <div class="col-md-3">

                   {{Form::select('rol', ['1' => 'Administrador', '2' => 'Usuario', '3'=>'Usuario Comun'],null ,['class'=>'form-control'])}}
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
