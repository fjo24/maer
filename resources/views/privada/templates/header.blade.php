<header>
    {{-- BARRA PRINCIPAL --}}
    <nav class="principal">
        <div class="container" style="width: 93%">
            <div class="row">
                <div class="col l12 m12 s12">
                    <div class="redeshead col l4 m4 s4 center">
                            <ul class="center" style="margin-left: 38%;margin-top: 13%;">
                                <li class="redes_head">
                                    <a class="" href="{{ url('/') }}">
                                        <img alt="" src="{{asset('img/layouts/facebook.png')}}">
                                        </img>
                                    </a>
                                </li>
                                <li class="redes_head">
                                    <a class="" href="{{ url('/') }}">
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
                                <li class="privado_head">
                                    <a class="" href="{{ url('/') }}">
                                        <img alt="" src="{{asset('img/layouts/privado.png')}}">
                                        </img>
                                    </a>
                                </li>
                                <li class="privado_head">
                                    <div class="dropdown-trigger" data-target="dropdown1">
                                        <a class="right" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();" style="text-transform: capitalize;line-height: 125%;margin-top: 8%;color: #F07D00">
                            Bienvenido, {{ Auth::User()->name }}<br>
                            (Cerrar Sesión)
                     
                                        </a>
                                        <form action="{{ route('logout') }}" id="logout-form" method="POST" style="display: none;">
                                            @csrf
                                        </form>

                                    </div>
                                </li>
                            </ul>
                    </div>
                </div>
            </div>
        </div>
        {{-- BARRA SUPERIOR --}}
    <div class="top center">
        <div class="container hide-on-med-and-down">
            <ul class="item-left center hide-on-med-and-down">
                @if($activo=='pedidos')
                <li>
                    <a class="activo" href="{{ route('zproductos') }}">
                        PEDIDOS
                    </a>
                </li>
                @else
                <li>
                    <a href="{{ route('zproductos') }}">
                        PEDIDOS
                    </a>
                </li>
                @endif
                @if($activo=='carrito')
                <li>
                    <a class="activo" href="{{ route('carrito') }}">
                        CARRITO
                    </a>
                </li>
                @else
                <li>
                    <a href="{{ route('carrito') }}">
                        CARRITO
                    </a>
                </li>
                @endif
                @if($activo=='ofertasynovedades')
                <li>
                    <a class="activo" href="{{ route('ofertasynovedades') }}">
                        OFERTAS O NOVEDADES
                    </a>
                </li>
                @else
                <li>
                    <a href="{{ route('ofertasynovedades') }}">
                        OFERTAS O NOVEDADES
                    </a>
                </li>
                @endif
                @if($activo=='historico')
                <li>
                    <a class="activo" href="{{ route('historico') }}">
                        HISTORICO
                    </a>
                </li>
                @else
                <li>
                    <a href="{{ route('historico') }}">
                        HISTORICO
                    </a>
                </li>
                @endif
                @if($activo=='listadeprecios')
                <li>
                    <a class="activo" href="{{ route('listadeprecios') }}">
                        LISTA DE PRECIOS
                    </a>
                </li>
                @else
                <li>
                    <a href="{{ route('listadeprecios') }}">
                        LISTA DE PRECIOS
                    </a>
                </li>
                @endif
                <a href="" data-target="modalbuscador" class="iconos-redes modal-trigger" style="">
                  <img style="margin-top: 20px;" src="{{asset('img/lupa.png')}}"/></a>
                  <!-- Modal Structure -->
                  <div id="modalbuscador" class="modal">
                    <div class="modal-content">
                        <h4><a href="#!" class="right modal-close waves-effect waves-green btn-flat" style="font-family: 'Lato';color: #F07D00;font-weight: bold;">Cerrar</a></h4>
                        <div class="row">
                            <h4 style="font-family: 'Source Sans Pro', sans-serif; color: #F07D00">Buscar por nombre de producto</h4>
                            <div class="col l12 m12 s12" style="">   
                                {!!  Form::open(['route' => 'buscar', 'method' => 'POST','class' => '']) !!}
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
            </ul>
        </div>
    </div>
    </nav>
</header>