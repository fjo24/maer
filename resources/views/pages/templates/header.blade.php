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
                                @if(Auth::user())

                                                    <div class="dropdown-trigger hide-on-med-and-down">
                                        <a href="{{ route('zproductos')}}" style="color: #F07D00;margin-top: -4%;">
                                            Zona privada
                                        </a>
                                    </div>
                                    @else
                                    <div class="dropdown-trigger hide-on-med-and-down" data-target="dropdown1">
                                        <a href="zonaprivada/productos" style="color: #F07D00;margin-top: -4%;">
                                            Zona privada
                                        </a>
                                    </div>
                                @endif
                <!-- Dropdown LOGIN FIN -->
                                </li>
                            </ul>
                    </div>
                </div>
            </div>
        </div>
                
        {{-- BARRA SUPERIOR --}}
    <div class="top hide-on-med-and-down">
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
                        PRODUCTOS
                    </a>
                    <!-- 
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
                    </ul>-->
                </li>
                @else
                <li id="menu_productos">
                    <a class="prod_menu" href="{{ route('rubros')}}">
                        PRODUCTOS
                    </a>
                 <!--   <ul style="margin-top: -2%!important;">
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
                    </ul>-->
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
                <a href="{{ route('rubros')}}" class="collapsible-header waves-effect waves-admin">
                    <i class="material-icons">
                        map
                    </i>
                    PRODUCTOS
                </a>
                <div class="collapsible-body">
                  <!--          <ul>
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
                        </div>-->
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