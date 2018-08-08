<header>
    {{-- BARRA PRINCIPAL --}}
    <nav class="principal">
        <div class="container" style="width: 93%">
            <a href="#" data-target="slide-out" class="sidenav-trigger" style=" "><i class="material-icons" style="color: white;">menu</i></a>
            <div class="row">
                <div class="col l12 m12 s12">
                    <div class="redeshead col l4 m4 s4 center">
                            <ul class="center" style="margin-left: 38%;margin-top: 13%;">
                                <li class="redes_head">
                                    <a class="" href="{{$facebook->link}}">
                                        <img alt="" src="{{asset('img/layouts/facebook.png')}}">
                                        </img>
                                    </a>
                                </li>
                                <li class="redes_head">
                                    <a class="" href="{{$youtube->link}}">
                                        <img alt="" src="{{asset('img/layouts/youtube.png')}}">
                                        </img>
                                    </a>
                                </li>
                            </ul>
                    </div>
                    <div class="col l4 m4 s4">
                        <a class="brand-logo center" href="{{ url('/') }}">
                            <img alt="" src="{{asset('img/logo_head.jpg')}}">
                            </img>
                        </a>
                    </div>
                    <div class="privadohead col l4 m4 s4 center">
                            <ul class="center" style="margin-left: 22%;margin-top: 13%;">
                                <li class="privado_head" style="margin-top: 15px;">
                                    <a class="" href="{{ url('/') }}">
                                        <img alt="" src="{{asset('img/layouts/privado.png')}}">
                                        </img>
                                    </a>
                                </li>
                                <li class="privado_head">
                                                    <div class="dropdown-trigger" data-target="dropdown1">
                                        <a href="zonaprivada/productos" style="color: #F07D00;margin-top: -4%;">
                                            Zona privada
                                        </a>
                                    </div>
                    <!-- Dropdown LOGIN -->
                <div class="areaprivada">
                    <ul class="dropdown-content" id="dropdown1" style="background: none, width:400px!important; height: 282px!important;">
                        <div class="container" style="background: #FAFAFA; margin-top: 19px !important; outline: none; width: 282px;height: 62px;">
                            {!!Form::open(['route'=>'logindistribuidor', 'method'=>'POST'])!!}
                            <div class="input-field col s12" style="padding-left: 10px;    border-bottom: 1px solid #595959; margin: 2px; margin-top: 1px; margin-bottom: 9px;">
                                {!!Form::text('username',null,['class'=>'', 'required'])!!}
                                <label for="username" style="color:gray; font-weight: 500; font-family: 'Lato'; font-size: 15px;">
                                    Username
                                </label>
                            </div>
                            <div class="input-field col s12" placeholder="password" style="padding-left: 10px;    border-bottom: 1px solid #595959; margin: 2px;">
                                {!!Form::password('password',null,['class'=>'', 'required'])!!}
                                <label for="password" style="color:gray; font-weight: 500; font-family: 'Lato'; font-size: 15px;">
                                    Contraseña
                                </label>
                            </div>
                            <style type="text/css">
                                .color-del-boton{
                 background-color: #01A0E2;
            }
            .color-del-boton:hover{
                 background-color: #01A0E2;
            }
                            </style>
                            <div class="col s12" style="position: relative;right: 24%;margin-top: 9%;
    margin-bottom: 2%;">
                                <input class="waves-effect waves-light btn right colorboton" style="color: white;font-family: 'Lato';font-weight: bold;" type="submit" value="INGRESAR">
                                </input>
                            </div>
                            <li class="center" style="font-size: 12px;color: pink; text-decoration: none;">
                                <a href="{{ url('registro') }}" style="color: #F07D00!important; text-align: center;">
                                    CREAR UNA CUENTA NUEVA
                                </a>
                            </li>
                            {!!Form::close()!!}
                        </div>
                    </ul>
                </div>
                <!-- Dropdown LOGIN FIN -->
                                </li>
                            </ul>
                    </div>
                </div>
            </div>
        </div>
        {{-- BARRA SUPERIOR --}}
    <div class="top">
        <div class="container hide-on-med-and-down" style="width: 76%;">
            <ul class="item-left center hide-on-med-and-down">
                @if($activo=='home')
                <li>
                    <a class="activo" href="{{ url('/') }}">
                        INICIO
                    </a>
                </li>
                @else
                <li>
                    <a href="{{ url('/') }}">
                        INICIO
                    </a>
                </li>
                @endif
                @if($activo=='empresa')
                <li>
                    <a class="activo" href="{{ url('/empresa') }}">
                        QUIÉNES SOMOS
                    </a>
                </li>
                @else
                <li>
                    <a href="{{ url('/empresa') }}">
                        QUIÉNES SOMOS
                    </a>
                </li>
                @endif
                @if($activo=='productos')
                <li id="menu_productos">
                    <a class="activo prod_menu" href="">
                        PRODUCTO
                    </a>
                    <ul style="margin-top: -2%!important;">
                        <li class="menu_cate">
                            <a href="{{ route('sistemas')}}" style="text-transform: uppercase;">
                                POR SISTEMA
                            </a>
                        </li>
                        <li class="menu_cate">
                            <a href="{{ route('rubros')}}" style="text-transform: uppercase;">
                                POR RUBRO
                            </a>
                        </li>
                    </ul>
                </li>
                @else
                <li id="menu_productos">
                    <a class="prod_menu" href="">
                        PRODUCTO
                    </a>
                    <ul style="margin-top: -2%!important;">
                        <li class="menu_cate">
                            <a href="{{ route('sistemas')}}" style="text-transform: uppercase;">
                                POR SISTEMA
                            </a>
                        </li>
                        <li class="menu_cate">
                            <a href="{{ route('rubros')}}" style="text-transform: uppercase;">
                                POR RUBRO
                            </a>
                        </li>
                    </ul>
                </li>
                @endif
                @if($activo=='videos')
                <li>
                    <a class="activo" href="{{ url('/videos') }}">
                        VIDEOS
                    </a>
                </li>
                @else
                <li>
                    <a href="{{ url('/videos') }}">
                        VIDEOS
                    </a>
                </li>
                @endif
                @if($activo=='calidad')
                <li>
                    <a class="activo" href="{{ url('/calidad') }}">
                        ESCUELA MAER
                    </a>
                </li>
                @else
                <li>
                    <a href="{{ url('/calidad') }}">
                        ESCUELA MAER
                    </a>
                </li>
                @endif
                @if($activo=='novedades')
                <li>
                    <a class="activo" href="{{ route('pagenovedades') }}">
                        NOVEDADES
                    </a>
                </li>
                @else
                <li>
                    <a href="{{ route('pagenovedades') }}">
                        NOVEDADES
                    </a>
                </li>
                @endif
                @if($activo=='contacto')
                <li>
                    <a class="activo" href="{{ url('/contacto') }}">
                        CONTACTO
                    </a>
                </li>
                @else
                <li>
                    <a href="{{ url('/contacto') }}">
                        CONTACTO
                    </a>
                </li>
                @endif
                <li>
                    <a href="" data-target="modalbuscador" class="iconos-redes modal-trigger" style="">
                  <img style="margin-top: 20px;" src="{{asset('img/lupa.png')}}"/></a>
                  <!-- Modal Structure -->
                  <div id="modalbuscador" class="modal">
                    <div class="modal-content">
                        <h4><a href="#!" class="right modal-close waves-effect waves-green btn-flat" style="font-family: 'Lato';color: #F07D00;font-weight: bold;">Cerrar</a></h4>
                        <div class="row">
                            <h4 style="font-family: 'Source Sans Pro', sans-serif; color: #F07D00">Buscar por nombre de producto</h4>
                            <div class="col l12 m12 s12" style="">   
                                {!!  Form::open(['route' => 'buscar', 'method' => 'POST','class' => 'left']) !!}
                                <div class="lupa">
                                     <div class="col l6 m6 s6" style=""> 
                                    {!!Form::text('buscar', null , ['class'=>''])!!}
                                    </input>
                                    </div>
                                    <div class="col l6 m6 s6" style=""> 
                                    <button class="btn waves-effect waves-light z-depth-0" type="submit" name="action" style="background-color: white!important;height: 39px;width: 153px;color: #F07D00;    border: 1px solid;font-family: 'Source Sans Pro', sans-serif;">Buscar
                                    </button>
                                    </div>
                                </div>
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                  </div>
                </li>

            </ul>
        </div>
    </div>
    </nav>

{{-- Para moviles --}}
<ul class="sidenav" id="slide-out" style="position: absolute;color: #7D0045;">
        <ul class="collapsible collapsible-accordion">
            <li class="bold">
                <a class="principalmovil collapsible-header waves-effect waves-admin" href="{{ url('/') }}">
                    <span class="side">
                        INICIO
                    </span>
                    <i class="material-icons">
                        home
                    </i>
                </a>
            </li>
            <li class="bold">
                <a class="principalmovil collapsible-header waves-effect waves-admin" href="{{ url('/empresa') }}">
                    <i class="material-icons">
                        group
                    </i>
                    QUIÉNES SOMOS
                </a>
            </li>
            <li class="bold">
                <a class="collapsible-header waves-effect waves-admin">
                    <i class="material-icons">
                        map
                    </i>
                    PRODUCTOS
                </a>
                <div class="collapsible-body">
                            <ul>
                                <li>
                                    <a href="{{ route('sistemas')}}">
                                        SISTEMA
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('rubros')}}">
                                        RUBRO
                                    </a>
                                </li>
                            </ul>
                        </div>
            </li>
            <li class="bold">
                <a class="principalmovil collapsible-header waves-effect waves-admin" href="{{ url('/videos') }}contacto">
                    <i class="material-icons">
                        new_releases
                    </i>
                    VIDEOS
                </a>
            </li>
            <li class="bold">
                <a class="principalmovil collapsible-header waves-effect waves-admin" href="{{ url('/calidad') }}">
                    <i class="material-icons">
                        build
                    </i>
                    CALIDAD
                </a>
            </li>
            <li class="bold">
                <a class="principalmovil collapsible-header waves-effect waves-admin" href="{{ url('pagenovedades') }}">
                    <i class="material-icons">
                        format_list_numbered
                    </i>
                    NOVEDADES
                </a>
            </li>
            <li class="bold">
                <a class="principalmovil collapsible-header waves-effect waves-admin" href="{{ url('/contacto') }}">
                    <i class="material-icons">
                        contact_mail
                    </i>
                    CONTACTO
                </a>
            </li>
        </ul>
    </ul>
 {{-- Para moviles fin--}} 
         
</header>