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
                                <a href="{{route('emisora.ver.verificar' ,  array ($emisora->id))}}" class="btn btn-sm btn-dark"><i class="fa fa-eye" title="Ver Información" ></i></a>

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
