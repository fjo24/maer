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
                                <a ;="" href="/categorias" style="color: gray">
                                    Productos |
                                </a>
                                <a href="" style="color: gray;text-transform: lowercase">
                                    
                                </a>
                            </h7>
                            @include('pages.templates.nav_todos')
                        </div>
                        <div class="col l9 s12 m9" style="">
                            @foreach($productos as $producto)
                            <div class="col l4 s12 m4">
                                <div class="div-product">
                                    <a href="{{ route('productoinfo2', $producto->id)}}">
                                        @foreach($producto->imagenes as $imagen)
                                        <img alt="" class="responsive-img" src="{{asset($imagen->imagen)}}" style="width: 373px;height: 284px;">
                                            @if($ready == 0)	
	                             		@break;
	                             	@endif
	                             	@endforeach
                                                <div class="div-nombre" style="text-transform: uppercase;">
                                                    {!!$producto->nombre !!}
                                                </div>
                                        </img>
                                    </a>
                                </div>
                            </div>
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