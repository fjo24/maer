@extends('pages.templates.body')
@section('title', 'Maer - Home')
@section('css')
<link href="{{ asset('css/pages/sliders/slider.css') }}" rel="stylesheet"/>
<link href="{{ asset('css/pages/empresa.css') }}" rel="stylesheet"/>
@endsection
@section('contenido')
@if(count($errors) > 0)
<div class="col s12 card-panel red lighten-4 red-text text-darken-4">
    <ul>
        @foreach($errors->all() as $error)
        <li>
            {!!$error!!}
        </li>
        @endforeach
    </ul>
</div>
@endif
        @isset($success)
<div class="col s12 card-panel green lighten-4 green-text text-darken-4">
    {{ $success }}
</div>
@endisset
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
{{-- Linea de Tiempo --}}

<section class="timeline-section" style="height: 389px;margin-top: -3%;padding-top: 98px; padding-bottom: 10px;">

    <div id="timeline">

      <ul id="dates">

        @foreach($tiempos as $tiempo)

          <li><a href="#{{ $tiempo->ano }}">{{ $tiempo->ano }}</a></li>

        @endforeach

      </ul>

      

      <ul id="issues">

        @foreach($tiempos as $tiempo)

        <li id="{{ $tiempo->ano }}">

          <div class="imglinea" align="center"><br>

          

        @if($tiempo->imagen!=null)

          <div align="center" style="margin-left: 315px;">            
          
          <img src="{{asset('imagenes/tiempos/'.$tiempo->imagen)}}" class="img-responsive" width="276px" style="max-height: 180px;">

          </div>
        @else
          <div class="Lato blanc1 editorRico" style="width: 700px; letter-spacing: 0.3px;">{!!$tiempo->parrafo!!}</div><br>
        @endif          

          </div>

        </li>

        @endforeach

      </ul>

          

    </div>

</section>
<!-- FIN LINEA DE TIEMPO -->
<div class="container" style="width: 90%">
<div class="row toptab">
						<div class="col s12 m6">
							<span class="descripcion_empresa">	
								{!! $empresa->descripcion !!}
							</span>
							<br>
							<span class="nombre_empresa">	
								{!! $empresa->nombre !!}
							</span>
							<br>
							<span class="contenido_empresa">	
								{!! $empresa->contenido !!}
							</span>
						</div>
						<div class="col s12 m6">
						<div align="center hide-on-med-and-down" style="">            
			          		<img src="{{asset($empresa->imagen)}}" class="hide-on-med-and-down img-responsive" width="276px" style="color: #5F5F5F;font-size: 17px;font-family: 'Montserrat';width: 543px;height: 145px;margin-top: 13%;">
			          	</div>
				          	<div class="estadisticas" style="margin-left: 18%;">	
								<p style="margin-top: 0px; margin-bottom: 0px;">
									<strong class="box1">
									{{$empresa->numero1}}
									</strong>
									<span class="box2">
									{!! $empresa->texto1 !!}
									</span>
								</p>
								<p style=" margin-top: 0px; margin-bottom: 0px;">
									<strong class="box1">
									{{$empresa->numero2}}
									</strong>
									<span class="box2">
									{!! $empresa->texto2 !!}
									</span>
								</p>
								<p style=" margin-top: 0px; margin-bottom: 0px;">
									<strong class="box1">
									{{$empresa->numero3}}
									</strong>
									<span class="box2">
									{!! $empresa->texto3 !!}
									</span>
								</p>
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
<script>
            $(function(){
                $().timelinr({
                    arrowKeys: 'true'
                })
            });
        </script>
@endsection
