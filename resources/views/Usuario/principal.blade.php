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
            <i class="fa fa-user"></i> Registro de Usuarios

        </div>

        <div class="card-body">
            <div class="text-right "><a  href="{{ route('usuario.create') }}" class="btn btn-sm btn-outline-info" ><i class="fa fa-user-plus"></i> Nuevo Usuario</a></div>
            <br>
            <table class="table table-responsive-sm">
                <thead>
                <tr>
                    <th>N°</th>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($TraerTodos as $usuario )
                    <tr>
                        <td>{{$usuario->id}}</td>
                        <td>{{$usuario->name}}</td>
                        <td>{{$usuario->email}} </td>
                        <td>
                            <a href="{{route('usuario.editar', array($usuario->id))}}" title="Resetear Contraseña" class="btn btn-outline-info btn-sm"> <i class="fa fa-paste"></i> Editar</a>
                            @if($usuario->verificado =='0')
                            <a href="{{ route('usuario.verifica' ,$parameters = $usuario->id)}}" class="btn btn-outline-dark btn-sm"><i class="fa fa-check" title="Verificar"></i> Verificar</a>
                            @endif
                            <a href="{{ route('usuario.delete' ,$parameters = $usuario->id)}}" onclick="return confirm('Esta seguro de eliminar el usuario.')" class="btn btn-warning btn-sm"><i class="fa fa-ban" title="Eliminar"></i></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <ul class="pagination">
                <li class="page-item">
                    <a class="page-link" href="#">Prev</a>
                </li>
                <li class="page-item active">
                    <a class="page-link" href="#">1</a>
                </li>
                <li class="page-item">
                    <a class="page-link" href="#">2</a>
                </li>
                <li class="page-item">
                    <a class="page-link" href="#">3</a>
                </li>
                <li class="page-item">
                    <a class="page-link" href="#">4</a>
                </li>
                <li class="page-item">
                    <a class="page-link" href="#">Next</a>
                </li>
            </ul>
        </div>
    </div>

@endsection
