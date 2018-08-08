@extends('pages.templates.body')
@section('title', 'Maer - Home')
@section('css')
<link href="{{ asset('css/pages/sliders/slider.css') }}" rel="stylesheet"/>
<link href="{{ asset('css/pages/destacados.css') }}" rel="stylesheet"/>
<link href="{{ asset('css/pages/home.css') }}" rel="stylesheet"/>
        <link href="{{ asset('css/page/slider.css') }}" rel="stylesheet">
            <link href="{{ asset('css/estilos.css') }}" rel="stylesheet">
            <link href="{{ asset('css/novedad.css') }}" rel="stylesheet">

@endsection
@section('contenido')
<div class="container" style="width: 82%; margin-top: 50px;">   
<div class="row">
  <div class="col l12">
  <h6 style="font-family: 'Montserrat'; color:#F07D00;">ULTIMAS NOTICIAS</h6>
  <h4 style="font-family: 'Montserrat'; color:#F07D00; margin-top: 0px;"><b>Novedades</b></h4>  
  </div>
</div>

<div class="row">
  <div class="col l9 m12 s12">
    <ul class="flex-container-nov">
    @foreach($categories as $categoria)
    @foreach($novedades as $novedad)
    @if($novedad->categoria_novedad_id == $categoria->id)
    <li class="flex-item-nov" style="border: none; padding-bottom: 20px;">
      <div>
      <img src="{{asset($novedad->imagen1)}}" class="clientes-box-img" style="height:220px; width: 100%;">
      </div>                  
      <div>
        <div>
          <div style="padding-bottom: 3px;border-bottom: 1px solid #DDDDDD;">
            <div style="padding-left: 8px; font-family: 'Montserrat'; font-size: 14px; color: #434242; font-weight: 500;">
              {{strtoupper($categoria->nombre)}}
            </div>
          </div>
          <div style="padding: 5px;">
          <div style="padding-top:5px; font-family: 'Montserrat'; font-size: 24px; color: #F07D00; font-weight: 600; padding-top: 10px;">
            {{$novedad->nombre}}
          </div>
          <div style="padding-top:5px; font-family: 'Montserrat'; font-size: 12px; color: #858585; font-weight: 500;">
            {{$novedad->fecha}}
          </div>
          <div style="padding-top:0px; font-family: 'Montserrat'; font-size: 17px; color: #666666; font-weight: 400;">
            {!! str_limit($novedad->contenido, $limit = 150, $end = '...') !!}
          </div>
          <div style="padding-top:0px; font-family: 'Montserrat'; font-size: 18px; color: #009FE1; font-weight: 400; ">
            <a style="color:#F07D00" href="{{('novedad/')}}{{($novedad->id)}}">Leer más</a>
          </div>
          </div>
        </div>
      </div>
    </li>
    @endif
    @endforeach
    @endforeach
    </ul>
  </div>
  <div class="right col l3 m12 s12">
    <div class="hide-on-med-and-down">
      <nav class="z-depth-0" style="background-color: white; border: 1px solid #DDDDDD">
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
      <div style="border-bottom: 2px solid #595959;">
        <h5 style="padding-left: 5px; color: #F07D00; font-weight: 400; font-size: 22px;">CATEGORIAS</h5>
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