@extends('pages.templates.body')
@section('title', 'Maer - Todos los productos')
@section('css')
<link href="{{ asset('css/pages/slider.css') }}" rel="stylesheet">
    <link href="{{ asset('css/pages/productos.css') }}" rel="stylesheet">
        @endsection
@section('contenido')
        <div class="container" style="width: 90%;">
            <div class="categorias">
                <div style="">
                    <div class="row">
                        <div class="col l3 s12 m3">
                            <h7>
                                <a ;="" href="" style="color: gray">
                                    Productos |
                                </a>
                                <a href="" style="color: gray;text-transform: lowercase">
                                    {!! $categoria->nombre !!}
                                </a>
                            </h7>
                            @include('pages.templates.nav_rubros')
                        </div>
                        <div class="col l9 s12 m9" style="margin-top: -1.5%;">
                            @foreach($productos as $producto)
                            @foreach($categoria->productos as $pro)
                            @if($pro->id==$producto->id)
                            <div class="col l4 s12 m4">
                                <div class="div-product">
                                    <a href="{{ route('productoinfo', $pro->id)}}">
                                        @foreach($pro->imagenes as $imagen)
                                        <div class="efecto hide-on-med-and-down">
                                                    <span class="central">
                                                        <i class="center material-icons">
                                                            add
                                                        </i>
                                                    </span>
                                                </div>
                                        <img alt="" class="responsive-img" src="{{asset($imagen->imagen)}}" style="width: 373px;height: 284px;">
                                            @if($ready == 0)	
	                             		@break;
	                             	@endif
	                             	@endforeach
                                                <div class="div-nombre" style="text-transform: uppercase;">
                                                    {!!$pro->nombre !!}
                                                </div>
                                        </img>
                                    </a>
                                </div>
                            </div>
                            @endif
                            @endforeach
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endsection

@section('js')
        <script type="text/javascript">
            $(document).ready(function(){
    $('.collapsible').collapsible();
  });
        </script>
        @endsection
    </link>
</link>