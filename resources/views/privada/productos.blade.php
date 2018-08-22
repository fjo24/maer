@extends('privada.templates.body')

@section('titulo', 'Línea Maer')

@section('contenido')
<link href="{{ asset('css/privada/zproductos.css') }}" rel="stylesheet" type="text/css"/>
<link href="{{ asset('css/privada/zproductos2.css') }}" rel="stylesheet" type="text/css"/>
<link href="{{ asset('css/privada/descuentos.css') }}" rel="stylesheet" type="text/css"/>
<body class="wide comments tprivada">
    <div class="fw-body">
        <div class="container" style="width: 85%">

<div class="row">
    <div class="col l12 m12 s12" style="margin-top: 5%;">
        <div class="box_descuento1 left col l6 m6 s12">
            <span class="descuento col l12 m12 s12">
                Descuento
            </span>
            @foreach($descuentos as $d)
                <div class="itemsdescuento col l12 m12 s12">
                    <div class="col l10 m10 s10">
                        @if(($d->minimo==1)&&($d->maximo==null))
                            {!! $d->minimo !!} unidad
                        @else
                            @empty($d->maximo)
                                +
                            @endisset
                                {!! $d->minimo !!}
                            @isset($d->maximo)
                                    a
                                {!! $d->maximo !!}
                            @endisset
                                unidades
                        @endif
                    </div>
                    <div class="col l2 m2 s2" style="color:#F07D00; font-weight: bold;">
                        {!! $d->porcentaje !!}%
                    </div>
                    <br>
                    <hr class="descuentoline">
                </div>
            @endforeach
        </div>
        <div class="box_descuento2 right col l6 m6 s12">
            <div class="col l12 m12 s12 center">
                    <img class="campana" alt="" src="{{asset('img/campana.png')}}">
                                        </img>
                    <img class="etiqueta" alt="" src="{{asset('img/etiqueta.png')}}">
                                        </img>
            </div>
            <div class="col l12 m12 s12 center" style="margin-top: 3%;">
                <div class="descuento_box2">
                    ¡Descuento de 5% por pago al contado!
                </div>
                <hr class="lineadescuento2"/>
                <div class="diferencia_box2">
                    @if($diferencia!=null)  
                    Sumando {!! $diferencia !!} productos accedés al descuento de {!! $proximo->porcentaje !!}% en el total de tu compra
                    @else
                        Tiene un descuento del {!! $desc !!}%
                    @endif
                </div>
            </div>
        </div>
    </div>  
</div>

    <div class="masiva">
        PEDIDOS
    </div>
    <br>
            <table class="display" id="tprivada" style="width:100%;margin-bottom: 11%;">
                <thead>
                    <tr class="trprincipal">
                        <th class="">
                            
                        </th>
                        <th class="">
                            PRODUCTO
                        </th>
                        <th class="">
                            CODIGO / MEDIDA
                        </th>
                        <th style="width: 128px" class="">
                            PRECIO UNITARIO
                        </th>
                        <th style="width: 128px" class="">
                            IVA
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
                    @php
                        $conteo = count($producto->modelos);
                    @endphp
                     
                        <tr>
                            
                            <td rowspan="{{ $conteo}}" class="timagen " style="width: 95px; height: 85px;">
                            @foreach($producto->imagenes as $img)
                            <a href="" data-target="modal{!! $producto->id !!}" class="modal-trigger" style="color: #7D0045">
                            <img class="responsive-img" src="{{ asset($img->imagen) }}"/>
                            </a>
                            @if($ready == 0)    
                                        @break;
                                    @endif
                            @endforeach
                            </td>
                            <td rowspan="{{ $conteo}}"  class="tdescripcion"  style="width: 29%;">
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
                    @foreach($producto->modelos as $modelo)
                    {!! Form::open(['route'=>'carrito.add','METHOD'=>'POST'])!!}
                    <div><input type="hidden" value="{{$producto->id}}" name="id"></div>
                            <td class="tablamodelos">
                                {!! $modelo->codigo!!}/{!!$modelo->medida !!}
                                {{ Form::hidden('modelo_id', $modelo->id) }}
                            </td>
                            <td class="tablamodelos">
                                {!! '$'.$producto->precio !!}
                            </td>
                            <td class="tablamodelos">
                                {!! $producto->iva .'%' !!}
                            </td>
                            <td class="tablamodelos">
                                <label for="cantidad">Cantidad</label>
                                @if (count(Cart::content())>0) 
     
                @php
                                $car = 0;
                            @endphp
                    @foreach(Cart::content()  as $row)
                        @if($row->id==$producto->id)
                        @if($row->options->codigo==$modelo->codigo)
                            <input type="number" name="cantidad" value="{!! $row->qty!!}" style="width: 46px;" required>
                            @php
                                $car = 1;
                            @endphp
                            @break
                            @endif
                        @endif
                    @endforeach
                    @if($car==0)
                            <input type="number" name="cantidad" value="" style="width: 46px;" required>
                        @endif
                            @else
                            <input type="number" name="cantidad" value="" style="width: 46px;" required>
                            @endif
                            </td>
                            {{ Form::hidden('precio', $producto->precio) }}

                            <td class="tablamodelos">
                                
                                @isset($items)

                                @foreach($items as $item)
                            @if($item->id==$producto->id)
                            @if($item->options->codigo==$modelo->codigo)
                                <?php $shop = 1; ?>
                                <button type="submit" name="submit" style="padding-bottom: 0px;padding-right: 0px;border-top-width: 0px;padding-left: 0px;background-color: white;border-left-width: 0px;margin-right: 0px;border-right-width: 0px;    border-bottom-width: 0px;"><i class="material-icons" style="color: green; background-color: transparent!important;">check_circle</i></button>
                            @endif
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
                    
                    @endforeach
                </tbody>
            </table>
            <div class="right"><a href="{{ route('carrito') }}">
<button class="enviar" class="bg-azul" href="" style="position: relative;bottom:95px;border-radius: 12px;padding: initial!important;color:white; padding: 20px; background-color: #3F3F3F; border: none; width: 181px;height: 42px!important;"><span style="font-family: 'Montserrat';font-size: 13px;font-weight: bold;">FINALIZAR COMPRA</span></button></a>
</div>
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

  $(document).ready(function(){
    $('select').formSelect();
  });
          

</script>

@endsection