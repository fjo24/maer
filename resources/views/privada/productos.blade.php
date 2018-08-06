@extends('privada.templates.body')

@section('titulo', 'Línea Parpen')

@section('contenido')
<link href="{{ asset('css/privada/zproductos.css') }}" rel="stylesheet" type="text/css"/>
<link href="{{ asset('css/privada/zproductos2.css') }}" rel="stylesheet" type="text/css"/>
<body class="wide comments tprivada">
    <div class="fw-body">
        <div class="container" style="width: 85%">
    <div class="masiva">
        PEDIDOS
    </div>
    <br>
            <div class="center buscadorprivado">


                {!!  Form::open(['route' => 'buscador', 'method' => 'POST', 'id'=>'buscador']) !!}
                <input id="pbuscar" name="pbuscar" type="psearch">
                </input>
                    {!! Form::close() !!}
            </div>
            <table class="display" id="tprivada" style="width:100%;margin-bottom: 11%;">
                <thead>
                    <tr class="trprincipal">
                        <th class="">
                            
                        </th>
                        <th class="">
                            FAMILIA
                        </th>
                        <th class="">
                            PRODUCTO
                        </th>
                        <th class="">
                            MODELO
                        </th>
                        <th class="">
                            MEDIDA
                        </th>
                        <th style="width: 128px" class="">
                            PRECIO UNITARIO
                        </th>
                        <th style="width: 128px" class="">
                            CANTIDAD
                        </th>
                        <th>
                            AÑADIR
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($productos as $producto)
                     {!! Form::open(['route'=>'carrito.add','id'=>'formpedido','METHOD'=>'POST'])!!}
                        <tr>
                            <div><input type="hidden" value="{{$producto->id}}" name="id"></div>
                            <td class="timagen " style="width: 95px; height: 85px;">
                            @foreach($producto->imagenes as $img)
                            <img class="responsive-img" src="{{ asset($img->imagen) }}"/>
                            @if($ready == 0)    
                                        @break;
                                    @endif
                            @endforeach
                            </td>
                            <td class="tcodigo ">{!! $producto->categoria->nombre !!}</td>
                            <td class="tdescripcion ">
                            <a href="" data-target="modal{!! $producto->id !!}" class="modal-trigger" style="color: #7D0045"> 
                                {!! $producto->nombre !!}
                            </a>
  <!-- Modal Structure -->
  <div id="modal{!! $producto->id !!}" class="modal">
    <div class="modal-content">
        <h4>{!! $producto->nombre !!}<a href="#!" class="right modal-close waves-effect waves-green btn-flat" style="font-family: 'Lato';color: #B3004A;font-weight: bold;">Cerrar</a></h4>
        <div class="row">
            <div class="col l12 m12 s12" style="padding-left: 0px;">   
                <div class="col l5 m5 s5" style="padding-left: 0px;">    
                @foreach($producto->imagenes as $img)
                    <img class="responsive-img modal_img" src="{{ asset($img->imagen) }}"/>
                    @if($ready == 0)    
                        @break;
                    @endif
                @endforeach
                </div> 
                <div class="col l7 m7 s7">   
                <div class="modal_descripcion">
                    {!! $producto->descripcion !!}
                </div> 
                <div class="modal_contenido">
                    {!! $producto->contenido !!}
                </div>
                </div> 
            </div>
        </div>
    </div>
  </div>
                            </td>
                            <td class="" value="medida" name="medida">
                                @foreach($producto->modelos as $modelo)
                                    {!! $modelo->codigo !!}
                                    @break              
                                @endforeach
                            </td>
                            <td class="">
                                @foreach($producto->modelos as $modelo)
                                    {!! $modelo->medida !!}
                                    @break              
                                @endforeach
                            </td>
                            <td class="">
                                {!! $producto->precio !!}
                            </td>
                            <td class="">
                                <label for="cantidad">Cantidad</label>
                            <input type="number" name="cantidad" value="1" style="width: 46px;">
                            </td>
                            {{ Form::hidden('precio', $producto->precio) }}

                            <td class="">
                                
                                @isset($items)

                                @foreach($items as $item)
                            @if($item->id==$producto->id)
                                <?php $shop = 1; ?>
                                <button type="submit" name="submit" style="padding-bottom: 0px;padding-right: 0px;border-top-width: 0px;padding-left: 0px;background-color: white;border-left-width: 0px;margin-right: 0px;border-right-width: 0px;    border-bottom-width: 0px;"><i class="material-icons" style="color: green; background-color: transparent!important;">check_circle</i></button>
                            @endif
                            @endforeach
                            @endisset
                            @if($shop==0)
                                <button type="submit" name="submit" style="padding-bottom: 0px;padding-right: 0px;border-top-width: 0px;padding-left: 0px;background-color: white;border-left-width: 0px;margin-right: 0px;border-right-width: 0px;    border-bottom-width: 0px;"><i class="material-icons" style="color: #F07D00; background-color: transparent!important;">shopping_cart</i></button>
                            @endif
                            <?php $shop = 0; ?>
                            </td>
  
                            </td>
                        </tr>
                    {!!Form::close()!!}

                    @endforeach
                </tbody>
            </table>
              <!-- Modal Trigger -->
          

        </div>
    </div>
</body>

 
@endsection
@section('js')
<script class="init" type="text/javascript">
    /*$(document).ready(function() {
    $('#example').DataTable();
} );*/
$(document).ready(function(){
    $("#formpedido").on("change", "input:checkbox", function(){
        $("#formpedido").submit();
    });
});


  $(document).ready(function(){
    $('.modal').modal();
  });
          

</script>

@endsection
