@extends('pages.templates.body')
@section('title', 'Maer - Home')
@section('css')
        <link href="{{ asset('css/page/slider.css') }}" rel="stylesheet">
            <link href="{{ asset('css/estilos.css') }}" rel="stylesheet">
@endsection
@section('contenido')

<div class="container" style="width: 86%; margin-top: 10px; margin-bottom: 120px;">
<div class="row">
  <div class="col l12">
@foreach($categorias as $categoria)
@if($categoria->id == $novedadI->categoria_novedad_id)
      <div style="margin-top: 15px; font-family: 'Montserrat'; color:#3F3F3F;">
        <a href="{{route('pagenovedades')}}" style="font-size: 14; color: #3F3F3F;  font-weight: 500; letter-spacing: 1px;">        
        {{strtoupper('NovEdAdEs')}}
        </a> 
        &nbsp;|&nbsp;
          <a href="{{route('filter', $categoria->id)}}" style="font-size: 14; color: #3F3F3F; font-weight: 500; letter-spacing: 1px;">{{strtoupper($categoria->nombre)}}</a>
        @if($novedadI->nombre != '')
        &nbsp;|&nbsp;
        <span style="font-size: 14; color: #3F3F3F; font-weight: 500; letter-spacing: 1px;">
        {{strtoupper($novedadI->nombre)}}
        </span>
        @endif
    </div>
  </div>
</div>

<div class="row" style=" margin-top: 60px;">
  <div class="col l9 m12 s12">
      <div class="container left" style="width: 95%;">
        <img class="responsive-img" src="{{asset($novedadI->imagen2)}}" style="height: 343px; width: 100%;">
                <div>
          <div style="padding-top:15px;border-bottom: 1px solid #DDDDDD;">
            <div style="padding-left: 8px; font-family: 'Montserrat'; font-size: 14px; color: #434242;font-weight: 500;">
              @if($categoria->nombre != '')
              {{strtoupper($categoria->nombre)}}
              @endif
@endif
@endforeach
            </div>
          </div>
          <div style="padding-top: 20px;">
            <div style="font-family: 'Montserrat'; font-size: 28px; color: #F27D00; font-weight: 600;">
              {!!$novedadI->nombre!!}
            </div>
            <div style="font-family: 'Montserrat'; font-size: 16px; color: #858585; font-weight: 500; ">
              {{$novedadI->fecha}}
            </div>
            <div style="font-family: 'Montserrat'; font-size: 18px; color: #6B6B6B; font-weight: 400;">
              {!!$novedadI->contenido!!}
            </div>
            <div style="font-family: 'Montserrat'; font-size: 18px; color: #F27D00; font-weight: 500;">
              {!!$novedadI->descripcion!!}
            </div>
            <div style="padding-top: 12px; padding-left: 9px;">
            @if($novedadI->producto_id != '')
              <a href="{{ route('manual', $novedadI->producto_id) }}" class="btn btn-ficha" target="_blank" style="background: white;color: #6B6B6B;
    border: 2px solid #6B6B6B;padding-left: 45px; padding-right: 45px; font-weight: 600;font-weight: 500;width: 215px;height: 38px;font-size: 13px!important;    border-radius: 6px;">DESCARGAR PDF</a>
            @endif
            </div>
          </div>
        </div>
      </div>
    </div>

  <div class="right col l3 m12 s12">
    <div class="hide-on-med-and-down">
      <nav class="z-depth-0" style="padding: 0; margin: 0;background-color: white; border: 1px solid #DDDDDD">
        <div class="nav-wrapper">
          {!!Form::open(['route'=>'buscar_novedad', 'method'=>'POST'])!!}
            <div style="padding-left: 10px; padding-right: 10px;">
              <div>{!!Form::text('buscar',null,['placeholder'=>'Buscar...', 'required'])!!}</div>            
              <div class="hide">{!!Form::submit('crear', ['class'=>'hidden'])!!}</div>
              <!-- <i class="material-icons">close</i> -->
            </div>
          {!!Form::close()!!} 
        </div>
      </nav>
    </div>
    <div style="padding-top: 40px; padding-bottom: 40px;">
      <div style="border-bottom: 2px solid #B0B0B0;">
        <h5 style="padding-left: 5px; color: #F07D00; font-weight: 400; font-size: 22px;">CATEGOR&IacuteAS</h5>
      </div>
      <div style="padding-top: 15px;">
        @foreach($categorias as $categoria)
        <div style="padding-left: 5px;  font-size: 18px; padding-bottom: 10px; ">
          <a href="{{route('filter', $categoria->id)}}" style="color: #3F3F3F;">» {{($categoria->nombre)}}</a>
           
        </div>
        @endforeach
      </div>
    </div>
  </div>
  </div>  
</div>
@endsection

    <script type="text/javascript" src="{{ asset('js/jquery/jquery.js')}}"></script>
    <script type="text/javascript" src="{{ asset('js/jquery/jquery.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('js/materialize/materialize.min.js') }}"></script>
@section('js')

<script type="text/javascript">
 $(document).ready(function(){
  $('.dropdown-trigger').dropdown({
    constrainWidth: false,
    closeOnClick: false
  });
   });
</script>
<script type="text/javascript">
  $(document).ready(function(){
    $('.sidenav').sidenav();
  });
</script>

@endsection