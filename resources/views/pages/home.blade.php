@extends('pages.templates.body')
@section('title', 'Maer - Home')
@section('css')
<link href="{{ asset('css/pages/sliders/slider.css') }}" rel="stylesheet"/>
<link href="{{ asset('css/pages/destacados.css') }}" rel="stylesheet"/>
<link href="{{ asset('css/pages/home.css') }}" rel="stylesheet"/>
@endsection
@section('contenido')
<div class="slider">
    <ul class="slides" style="height: 461px!important;width: 100%">
        @foreach($sliders as $slider)
        <li>
            <img src="{{asset($slider->imagen)}}">
                @if(isset($slider->texto)||isset($slider->texto2))
                <div class="caption box-cap" style="">
                    <div style="">
                        <span class="slidertext2">
                            {!! $slider->texto !!}
                        </span>
                        <span class="slidertext1">
                            {!! $slider->texto2 !!}
                        </span>
                    </div>
                </div>
                @endif
            </img>
        </li>
        @endforeach
    </ul>
</div>
<!-- 
<div class="container" style="width: 87%;">
    <section class="destacados">
        <div class="row">
            <div class="col s12 l8 no-padding">
                <a href="{!!$bloque1->link !!}">
                    <div class="col s12">
                        <div class="card">
                            <div class="larga card-image">
                                <img src="{{asset($bloque1->imagen)}}" style="">
                                </img>
                                <div class="card-title" style="display: table;background-color: transparent;font-family: 'Montserrat';width: 100%;font-size: 26px;font-weight: bold;">
                                    <p style="display: table-cell;text-align: center;">
                                        {!!$bloque1->nombre !!}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
                <a href="{!!$bloque2->link !!}">
                <div class="col s12 l6">
                    <div class="card">
                        <div class="cuadradas card-image">
                            <img src="{{asset($bloque2->imagen)}}" style="">
                            </img>
                            <div class="card-title" style="display: table;background-color: transparent;font-family: 'Montserrat';width: 100%;font-size: 26px;font-weight: bold;">
                                <p style="display: table-cell;text-align: center;">
                                    {!!$bloque2->nombre !!}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                </a>
                <a href="{!!$bloque3->link !!}">
                    <div class="col s12 l6">
                        <div class="card">
                            <div class="cuadradas card-image">
                                <img src="{{asset($bloque3->imagen)}}" style="">
                                </img>
                                <div class="card-title" style="display: table;background-color: transparent;font-family: 'Montserrat';width: 100%;font-size: 26px;font-weight: bold;">
                                    <p style="display: table-cell;text-align: center;">
                                        {!!$bloque3->nombre !!}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col s12 l4 no-padding">
                <a href="{!!$bloque4->link !!}">
                <div class="col s12">
                    <div class="card">
                        <div class="alta card-image">
                            <img class="b3" src="{{asset($bloque4->imagen)}}" style="">
                            </img>
                            <div class="card-title" style="display: table;background-color: transparent;font-family: 'Montserrat';width: 100%;font-size: 26px;font-weight: bold;">
                                <p style="display: table-cell;text-align: center;">
                                    {!!$bloque4->nombre !!}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                </a>
            </div>
        </div>
    </section>
</div>
-->
<div class="destacado-home2">
    <div class="container" style="width: 84%;">
        <div class="row" style="position: relative;top: 66px;">
            <div class="col l6 s12 hide-on-med-and-down">
                <img class="img-destacado responsive-img" src="{!! $contenido->imagen !!}" style="">
                </img>
            </div>
            <div class="dest-text col l6 s12">
                <div class="subtit-dest">
                    {!! $contenido->nombre !!}
                </div>
                <div class="tit-dest">
                    {!! $contenido->descripcion !!}
                </div>
                <div class="cont-dest">
                    {!! $contenido->contenido !!}
                </div>
                <div class="col l12 m12 s12">
                    <a href="{!! $contenido->link !!}">
                    <button type="button" class="boton_empresa btn btn-default pull-right">NUESTRA EMPRESA</button>
                </a>
                </div> 
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
