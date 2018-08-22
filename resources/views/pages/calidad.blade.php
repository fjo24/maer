@extends('pages.templates.body')
@section('title', 'Maer - Home')
@section('css')
<link href="{{ asset('css/pages/calidad.css') }}" rel="stylesheet"/>
@endsection
@section('contenido')

<div class="container" style="width: 84%;">
    <div class="row" style="position: relative;top: 0px;">
    <div class="col l12 m12 s12">
        <div class="izqcalidad col l7 m7 s12">
            <div class="nombrecalidad">
                {!! $contenidosup->nombre !!}
            </div>
            <div class="descripcioncalidad">
                {!! $contenidosup->descripcion !!}
            </div>
            <div class="contenidocalidad">
                {!! $contenidosup->contenido !!}
            </div>
        </div>
        <div class="dercalidad col l5 m5 s12">
            <hr class="lineacalidad left" />
             <div class="descripcion2calidad">
                {!! $contenidosup->descripcion2!!}
            </div>
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
<div class="container" style="width: 84%;    margin-bottom: 3%;">
    <div class="row" style="position: relative;top: 50px;">
        <div class="izqcalidad col l7 m7 s12">
            <div class="nombrecalidad">
                {!! $contenido->nombre !!}
            </div>
            <div class="descripcioncalidad">
                {!! $contenido->descripcion !!}
            </div>
            <div class="contenidocalidad">
                {!! $contenido->contenido !!}
            </div>
        </div>
        <div class="dercalidad col l5 m5 s12">
            <hr class="lineacalidad left" />
             <div class="descripcion2calidad">
                {!! $contenido->descripcion2!!}
            </div>
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
