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
                                    <a class="" href="{{ url('/') }}" style="margin-top: -4%;">
                                        Zona privada
                                    </a>
                                </li>
                            </ul>
                    </div>
                </div>
            </div>
        </div>
        {{-- BARRA SUPERIOR --}}
    <div class="top">
        <div class="container hide-on-med-and-down">
            <ul class="item-left center hide-on-med-and-down">
                @if($activo=='home')
                <li>
                    <a class="activo" href="{{ url('/') }}">
                        PEDIDOS
                    </a>
                </li>
                @else
                <li>
                    <a href="{{ url('/') }}">
                        PEDIDOS
                    </a>
                </li>
                @endif
                @if($activo=='empresa')
                <li>
                    <a class="activo" href="{{ url('/empresa') }}">
                        CARRITO
                    </a>
                </li>
                @else
                <li>
                    <a href="{{ url('/empresa') }}">
                        CARRITO
                    </a>
                </li>
                @endif
                @if($activo=='productos')
                <li>
                    <a class="activo" href="{{ url('/') }}">
                        OFERTAS O NOVEDADES
                    </a>
                </li>
                @else
                <li>
                    <a href="{{ url('/') }}">
                        OFERTAS O NOVEDADES
                    </a>
                </li>
                @endif
                @if($activo=='videos')
                <li>
                    <a class="activo" href="{{ url('/empresa') }}">
                        VIDEOS
                    </a>
                </li>
                @else
                <li>
                    <a href="{{ url('/empresa') }}">
                        VIDEOS
                    </a>
                </li>
                @endif
                @if($activo=='home')
                <li>
                    <a class="calidad" href="{{ url('/') }}">
                        CALIDAD
                    </a>
                </li>
                @else
                <li>
                    <a href="{{ url('/') }}">
                        CALIDAD
                    </a>
                </li>
                @endif
                @if($activo=='novedades')
                <li>
                    <a class="activo" href="{{ url('/empresa') }}">
                        NOVEDADES
                    </a>
                </li>
                @else
                <li>
                    <a href="{{ url('/empresa') }}">
                        NOVEDADES
                    </a>
                </li>
                @endif
                @if($activo=='contacto')
                <li>
                    <a class="activo" href="{{ url('/empresa') }}">
                        CONTACTO
                    </a>
                </li>
                @else
                <li>
                    <a href="{{ url('/empresa') }}">
                        CONTACTO
                    </a>
                </li>
                @endif
            </ul>
        </div>
    </div>
    </nav>
</header>