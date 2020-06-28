<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="PaginaMuestra/css/workshops.css">
    <title>Cadena Nacional de Radio</title>

    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
    <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
    {!! Html::style('PaginaMuestra/css/style.css') !!}


</head>
<body>
<header id="main-header">
    <div class="container">
        <div class="row">
            <div class="col-xs-5 col-sm-3">
                <h1 id="main-logo"><a href="index.php">CNR<span>Cadena Nacional de Radio</span></a></h1>
            </div>
            <div class="col-xs-7 col-sm-9">
                <ul id="main-menu" class="nav nav-pills hidden-xs">
                    <li class="active"><a href="{{route('cliente.emisora')}}">Inicio</a></li>

                    @if (Route::has('login'))
                        @auth
                            @if(Auth::user()->verificado=='1')
                            <li ><a href="{{route('reg.emisora.cli')}}">Registrar Estacion</a></li>
                                <li ><a href="{{route('cliente.password', array (Auth::user()->id))}}">Cambiar Password</a></li>
                            @endif
                            <li><a href="">{{Auth::user()->name}}</a></li>
                        @else
                            <li><a href=""></a></li>
                        @endauth
                    @endif


                    @if (Route::has('login'))
                            @auth

                                @if(Auth::user()->rol ==1 || Auth::user()->rol==2)
                                @if(Auth::user()->verificado=='1')
                                    <li id="nada"><a href="{{ url('/home') }}">Ingresar al panel</a></li>
                                    <li>
                                        <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">Salir</a></li>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                @else
                                    <li><a href="" style="background: #ffeeba">Verifique su cuenta!</a></li>
                                    <li>
                                        <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">Salir</a></li>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                @endif
                                @else

                                    <li>
                                        <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">Salir</a></li>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                @endif

                            @else
                            <li><a href="{{ route('register') }}">Registrate</a></li>
                                <li><a href="{{ route('login') }}">Iniciar Sesion</a></li>

                                {{--                        @if (Route::has('register'))--}}
                                {{--                            <a href="{{ route('register') }}">Register</a>--}}
                                {{--                        @endif--}}
                            @endauth
                    @endif




                </ul>

                <a href="#" id="mobile-menu-button" class="btn btn-default visible-xs">
                    <span class="glyphicon glyphicon-th-list"></span>
                </a>
            </div>
        </div>
    </div>
    <div class="visible-xs">
        <ul id="mobile-main-menu">
            <li class="active"><a href="{{route('cliente.emisora')}}">Inicio</a></li>
            <li><a href="{{route('reg.emisora.cli')}}">Registrar Estacion</a></li>
            @if (Route::has('login'))
                @auth
                    <li><a href="">{{Auth::user()->name}}</a></li>
                @else
                    <li><a href="">Hola!</a></li>
                @endauth
            @endif


            @if (Route::has('login'))
                @auth

                    @if(Auth::user()->rol ==1 || Auth::user()->rol==2)
                        @if(Auth::user()->verificado=='1')
                            <li id="nada"><a href="{{ url('/home') }}">Ingresar al panel</a></li>
                        @else
                            <li>Verifique su cuenta</li>
                        @endif
                    @else

                        <li>
                            <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">Salir</a></li>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    @endif

                @else
                    <li><a href="{{ route('login') }}">Iniciar Sesion</a></li>

                    {{--                        @if (Route::has('register'))--}}
                    {{--                            <a href="{{ route('register') }}">Register</a>--}}
                    {{--                        @endif--}}
                @endauth
            @endif
        </ul>
    </div>
</header>


<div id="workshop-list">
    <article id="w1-detail" class="detail">
        <header>
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <h2>Busqueda de Emisoras a nivel nacional</h2>
                    </div>
                </div>
            </div>
        </header>
        @yield('content')

    </article>

</div>

<footer>
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12">
                <div class="col-lg-3">
                    <a href="">©2019 ,Cadena Nacional de Radio </a>

                </div>
                <div class="col-lg-3">
                    <a href="">Término y Condiciones</a>
                </div>
                <div class="col-lg-3">
                    <a href=""> Política y  Privacidad </a>
                </div>
                <div class="col-lg-3">
                    <a href="">Marca Registrada</a>
                </div>
            </div>
        </div>
    </div>
</footer>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<!-- Latest compiled and minified JavaScript -->
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
{!! Html::script('js/appProyecto.js') !!}
<script>
    function toggleMobileMenu()
    {
        var $mobileMenu = $('#mobile-main-menu');
        $mobileMenu.slideToggle('fast');
    }

    $(document).ready(function() {
        $('#mobile-menu-button').on('click', toggleMobileMenu);
    });
</script>
</body>
</html>
