@extends('pages.templates.body')
@section('title', 'Maer - Videos')
@section('css')
<link href="{{ asset('css/pages/clientes.css') }}" rel="stylesheet"/>
@endsection
@section('contenido')
<div class="container" style="width: 85%;">
    <div class="row bloquecont center">
        <div class="row" style= "margin-bottom: 5px;">
  <div class="col l12" style="text-align: left;">
  <h6 style="font-family: 'Montserrat'; color:#F07D00;font-size: 22px;">NUESTROS VIDEOS</h6>
  <h4 style="font-family: 'Montserrat'; color:#F07D00; margin-top: 0px;font-size: 38px;"><b>Descubrí MAER</b></h4>  
  </div>
</div>
        <div class="servicios" style="align-items: center">
            <div class="items-servicio row" style="align-items: center;">
                <div class="bloquecard col l12 s12 m12">
                    @foreach($videos as $video)
                    <div class="col l4 s12 m6">
                        <div class="card white darken-1" style="">
                            <div class="card-content white-text">
                                <div class="center masproducto hide-on-med-and-down col l12 m12 s12" style="">
                                    <iframe style="position: relative;right: 12.6%;z-index: 1;width: 125%;" width="364" height="245" src="{{$video->video}}" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>            
                                </div>
                            </div>
                            <div class="card-action" style="height: 29%;padding-top: 5%;">
                                <div class="titulo_video left">
                                    {{$video->nombre}}
                                </div>
                                <div class="contenido_video left">
                                    {{$video->descripcion}}
                                </div>
                                </a>
                            </div>
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

@endsection
