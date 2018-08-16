@extends('pages.templates.body')
@section('title', 'Preguntas Frecuentes - Productos')
@section('css')
<link href="{{ asset('css/pages/slider.css') }}" rel="stylesheet">
    <link href="{{ asset('css/pages/productos.css') }}" rel="stylesheet">
        @endsection
@section('contenido')
        <div class="container" style="width: 90%;">
            <div class="categorias">
                <div style="">
                    <div class="row">
                            <h7 style="padding-left: 0px;    left: -24%!important;">
                                <a ;="" href="/categorias" style="color: gray">
                                    Productos |
                                </a>
                                <a href="" style="color: gray;text-transform: capitalize;">
                                    {!!$categoria->nombre !!} |
                                </a>
                                <a href="" style="color: gray;text-transform: capitalize;">
                                    {!!$p->nombre !!}
                                </a>
                            </h7>
                        <div class="col l3 s12 m3">
                            @include('pages.templates.nav_rubros')
                        </div>
                        {{-- Menu final --}}
                        <div class="galeria2 col l9 m9 s12">
                            <div class="col l12 m12 s12" style="padding: 0;    height: auto;    padding-left: 2%!important;    margin-bottom: 6%;">
                                <div class="col l5 m12 s12 galeriadeproducto">
                                    <div class="cont-ser">
                                        <div class="row imggrande">
                                            <div class="col s12" style="padding-left: 0px;">
                                                @foreach($p->imagenes as $imagen)
                                                <div class="cont-img">
                                                    <img alt="" class="responsive-img" id="producto" src="{{asset($imagen->imagen)}}" style="width: 100%;border:1px solid #AAAAAA;">
                                                    </img>
                                                </div>
                                                @if($ready == 0)    
                                        @break;
                                    @endif
                        @endforeach
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col s12" style="padding-left: 0px;padding-right: 0px;">
                                                @foreach($p->imagenes as $imagen)
                                                <div class="col l4 s4 m2" style="padding-left: 0px;">
                                                    <div class="cont-img">
                                                        <img alt="" class="responsive-img" onclick="actualizar('{{asset($imagen->imagen)}}')" src="{{asset($imagen->imagen)}}" style="border: 1px solid #AAAAAA;height: 110px; width: 110px;">
                                                        </img>
                                                    </div>
                                                </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col l7 m12 s12 infoproducto" style="padding-left: 29px;">
    <div class="nombreproducto">
        {!! $p->nombre !!}
    </div>
    <hr class="n-line left"/>
    <div class="left detalles">
        {!! $p->descripcion !!}
    </div>
    <br>
    <div class="descripcionproducto">
        {!! $p->contenido !!}
    </div>
@foreach($p->modelos as $modelo)
    <table class="highlight bordered" style="margin-top: 1.8%;color: #595959;;height: 40px;">
            <tbody>
                <tr>    
                    <td style="width: 22%;border: 1px solid #A2A2A2;color: #595959;">
                        {!!$modelo->codigo!!}
                    </td>
                    <td style="border: 1px solid #A2A2A2;color: #595959;">
                        {!!$modelo->medida!!}
                    </td>
                </tr>
            </tbody>
        </table>
@endforeach
</div>
<div class="row col l12 m12 s12" style="padding-left: 0;padding-right: 0;">
<div class="col l3 m3 s6">    
<a href="{{ url('/preguntas', $p->id) }}">
        <button class="pedido btn btn-default left" href="" style="background-color: white;height: 39px;width: 180px;color: #3F3F3F;height: 38px;border: 2px solid;font-size: 13px;font-weight: 500;font-family: 'Montserrat', sans-serif;border-radius: 6px;">
            <span class="rpedido">
                PREGUNTAS
            </span>
        </button>
    </a>
</div>
<div class="col l3 m3 s6">    
<a href="{{ route('despiece', $p->id) }}">
        <button class="pedido btn btn-default left" href="" style="background-color: white;height: 39px;width: 180px;color: #3F3F3F;height: 38px;border: 2px solid;font-size: 13px;font-weight: 500;font-family: 'Montserrat', sans-serif;border-radius: 6px;">
            <span class="rpedido">
                DESPIECE
            </span>
        </button>
    </a>
</div>
<div class="col l3 m3 s6">    
<a href="{{ route('manual', $p->id) }}">
        <button class="pedido btn btn-default left" href="" style="background-color: white;height: 39px;width: 180px;color: #3F3F3F;height: 38px;border: 2px solid;font-size: 13px;font-weight: 500;font-family: 'Montserrat', sans-serif;border-radius: 6px;">
            <span class="rpedido">
                MANUAL
            </span>
        </button>
    </a>
</div>
<div class="col l3 m3 s6">    
<a href="{{ url('/contacto') }}">
        <button class="pedido btn btn-default left" href="" style="background-color: white;height: 39px;width: 180px;color: #3F3F3F;height: 38px;border: 2px solid;font-size: 13px;font-weight: 500;font-family: 'Montserrat', sans-serif;border-radius: 6px;">
            <span class="rpedido">
                CONSULTAR
            </span>
        </button>
    </a>
</div>
</div>
<div class="row col l12 m12 s12" style="padding-left: 0;padding-right: 0;">
    <div class="tituloinfo" style="margin-top: 2%;margin-bottom: 2%">
                PREGUNTAS FRECUENTES
            </div>
            @foreach($preguntas as $pregunta)
            <div class="ventajas" style="font-weight: bold;">
                {!! $pregunta->pregunta !!}
            </div>
            <div class="ventajas">
                {!! $pregunta->respuesta !!}
            </div>
            @endforeach
</div>

                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </link>
</link>

@endsection

@section('js')
<script type="text/javascript">
    $(document).ready(function(){
    $('.collapsible').collapsible();
  });

    function actualizar(imagen){
      document.getElementById('producto').src = imagen;
    }

    $(document).ready(function(){
    $('.tabs').tabs();
  });

    $(document).ready(function(){
    $('.modal').modal();
  });
          
</script>
@endsection
