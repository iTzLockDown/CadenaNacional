@extends('layouts.app')

@section('content')
    @if(Session::has('message'))
        <div class="alert alert-success alert-dismissible" role = "alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <label class="text-center"> {{Session::get('message')}}</label>
        </div>
    @endif
    <div class="card">
        <div class="card-header">
            <i class="fa fa-user"></i> Registro de Emisoras

        </div>

        <div class="card-body">
            <div class="" align="left">
            {!!Form::open(['route'=>'emisora.lista','method'=>'GET','role'=>'form','enctype'=>'multipart/form-data','files' => true])!!}

            <div class="col-lg-4">
                <input type="text" id="txtBuscar" name="nombre" class="form-control" placeholder="Buscar ..." autocomplete="off">
            </div>
            <div class="col-lg-2">
                <button class="btn btn-tumblr btn-sm" id="btnBuscar" type="submit"><i class="fa fa-search"></i> Buscar</button>
            </div>
            <div class="col-lg-3">

            </div>
            {!!Form::close()!!}

            <div class="text-right "><a  href="{{ route('emisora.create') }}" class="btn btn-sm btn-outline-info" ><i class="fa fa-plus"></i> Nuevo Emisora</a></div>
            <br>
            <table class="table table-responsive-sm">
                <thead>
                <tr>
                    <th>N°</th>
                    <th>Emisora</th>
                    <th>R. Legal</th>
                    <th>R. Comercial</th>
                    <th>Telefono</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($TraerTodos as $emisora )
                    <tr>
                        <td>{{$emisora->id}}</td>
                        <td>{{$emisora->nombrecadena}} </td>
                        <td>{{$emisora->representanteLegal}}</td>
                        <td>{{$emisora->representanteComercial}}</td>
                        <td>{{$emisora->telefono}}</td>
                        <td>
                            <a href="{{route('emisora.editar' ,  array ($emisora->id))}}" class="btn btn-sm btn-dark"><i class="fa fa-edit" title="Editar" ></i></a>
                            <a href="{{ route('emisora.delete' ,$parameters = $emisora->id)}}" onclick="return confirm('Esta seguro de eliminar la emisora')" class="btn btn-warning btn-sm" title="Eliminar"><i class="fa fa-ban" title="Eliminar"></i></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <a href="{{route('exportar.excel')}}" class="btn btn-outline-success"> <i class="ico icon-docs"></i>Exportar excel</a>
                <center>    {!! $TraerTodos->links() !!}</center>
        </div>
    </div>

@endsection
