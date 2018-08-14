@extends('pages.templates.body')
@section('title', 'Maer - Home')
@section('css')
<link href="{{ asset('css/pages/calidad.css') }}" rel="stylesheet"/>
@endsection
@section('contenido')

<div class="container" style="width: 84%;">
    <div class="row" style="position: relative;top: 0px;height: 500px;">
    <div class="col l12 m12 s12">
        <div class="izqcalidad col l7 m7 s12">
            <span class="nombrecalidad">
                {!! $contenidosup->nombre !!}
            </span>
            <span class="descripcioncalidad">
                {!! $contenidosup->descripcion !!}
            </span>
            <span class="contenidocalidad">
                {!! $contenidosup->contenido !!}
            </span>
        </div>
        <div class="dercalidad col l5 m5 s12">
            <hr class="lineacalidad left" />
             <span class="descripcion2calidad">
                {!! $contenidosup->descripcion2!!}
            </span>
        </div>
        </div>
    </div>
</div>
<div class="seccion-banner hide-on-med-and-down" style="background-image: {!! $banner->imagen !!}">
    <div class="btexto">
        <div class="tbanner center">
            <p>
                {!! $banner->texto !!}
            </p>
        </div>
        <hr class="lineabanner"/>
    </div>
</div>
<div class="container" style="width: 84%;">
    <div class="row" style="position: relative;top: 50px;height: 500px;">
        <div class="izqcalidad col l7 m7 s12">
            <span class="nombrecalidad">
                {!! $contenido->nombre !!}
            </span>
            <span class="descripcioncalidad">
                {!! $contenido->descripcion !!}
            </span>
            <span class="contenidocalidad">
                {!! $contenido->contenido !!}
            </span>
        </div>
        <div class="dercalidad col l5 m5 s12">
            <hr class="lineacalidad left" />
             <span class="descripcion2calidad">
                {!! $contenido->descripcion2!!}
            </span>
        </div>
    </div>
</div>
@endsection

@section('js')
<script type="text/javascript">
    $('.slider').slider({
        indicators: true,
        height: 561,
    });
</script>
@endsection
