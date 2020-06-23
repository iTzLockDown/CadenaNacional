@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            Resetear <strong>Contraseña</strong></div>
        <div class="card-body">
            {!!Form::model($usuario,['route'=>['usuario.update', $usuario->id],'method'=>'PUT','role'=>'form','enctype'=>'multipart/form-data', 'class'=>'form-horizontal'])!!}



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
                <i class="fa fa-save" ></i> Resetear Contraseña</button> &nbsp;
            <a href="{{route('usuario.lista')}}" class="btn btn-sm btn-danger" > <i class="fa fa-arrow-left" ></i> Regresar</a>

        </div>
        {!!Form::close()!!}
    </div>

@endsection
