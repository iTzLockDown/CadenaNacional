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
            <i class="fa fa-user"></i> Importar de Excel las cadenas de radio o televisión.

        </div>

        <div class="card-body">
            <form action="{{route('emisoras.import.excel')}}" method="post" enctype="multipart/form-data">
                @csrf
                @if(Session::has('message'))
                    <p>{{Session::get('message')}}</p>
                @endif
                <input type="file" name="file">
                <button>Importar Emisora</button>
            </form>

        </div>







    @stop
