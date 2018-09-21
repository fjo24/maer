@extends('privada.templates.body')

@section('titulo', 'Línea Maer')

@section('contenido')
<link href="{{ asset('css/privada/zproductos.css') }}" rel="stylesheet" type="text/css"/>
<link href="{{ asset('css/privada/zproductos2.css') }}" rel="stylesheet" type="text/css"/>
<link href="{{ asset('css/privada/descuentos.css') }}" rel="stylesheet" type="text/css"/>
<script type="text/javascript">

  </script>
<body class="wide comments tprivada">
    <div class="fw-body">
        <div class="container" style="width: 90%">

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
        <div class="col l6 m6 s12">
            
        </div>
    </div>  
</div>
<div class="col l12 m12 s12">
    <div class="masiva">
        PEDIDOS
    </div>
    <div class="right"><a href="{{ route('carrito') }}">
<button class="enviar" class="bg-azul" href="" style="position: relative;bottom:30px;border-radius: 12px;padding: initial!important;color:white; padding: 20px; background-color: #3F3F3F; border: none; width: 181px;height: 42px!important;"><span style="font-family: 'Montserrat';font-size: 13px;font-weight: bold;">FINALIZAR COMPRA</span></button></a>
</div>
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
                        $cont++;
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
  <!-- Modal Structure
$("#cant"+modelo).html("<input type='number' min='1' id='1' name='cantidades' value='99' style='width: 46px;' disable>");

   -->
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
                        <div id="ct{{$modelo->id}}"  class="left">
                            <input type="number" min="1" class="enviar" id="cant{{$modelo->id}}" name="cantidad" value="{!! $row->qty!!}" style="width: 46px;" required>
                        </div>
                                <input type="hidden" class="enviar" name="oldcantidad" value="" id="oldcant{{$modelo->id}}">
                            @php
                                $car = 1;
                            @endphp
                            @break
                            @endif
                        @endif
                    @endforeach
                    @if($car==0)
                    <div id="ct{{$modelo->id}}"  class="left">
                            <input type="number" min="1" id="cant{{$modelo->id}}" class="enviar" name="cantidad" value="" style="width: 46px;" required>
                    </div>
                        @endif
                            @else
                            <div id="ct{{$modelo->id}}"  class="left">
                            <input type="number" min="1" id="cant{{$modelo->id}}" class="enviar" name="cantidad" value="" style="width: 46px;" required>
                            </div>
                            @endif
                            </td>
                            {{ Form::hidden('precio', $producto->precio) }}

                            <td class="tablamodelos">
                                
                                @isset($items)

                                @foreach($items as $item)
                            @if($item->id==$producto->id)
                            @if($item->options->codigo==$modelo->codigo)
                                <?php $shop = 1; ?>
                                <div id="carrito{{$modelo->id}}">
                                <button id="{{$producto->id}}" modelo="{{$modelo->id}}" class="enviar" class="bg-azul" href="" style="    position: relative;border-radius: 8px;padding: initial!important;    color: white;padding: 20px;background-color: green;
    border: none;width: 112px;height: 42px!important;"><span style="font-family: 'Asap';font-size: 11px;font-weight: bold;">AGREGADO</span></button>
                                </div>
                            @endif
                            @endif
                            @endforeach
                            @endisset
                            @if($shop==0)

                                <div id="carrito{{$modelo->id}}"  class="left">
                                <button id="{{$producto->id}}" modelo="{{$modelo->id}}" class="enviar" class="bg-azul" href="" style="    position: relative;border-radius: 8px;padding: initial!important;    color: white;padding: 20px;background-color: #F07D00;
    border: none;width: 112px;height: 42px!important;"><span style="font-family: 'Asap';font-size: 11px;font-weight: bold;">AGREGAR A CARRITO</span></button>
                                </div>
                            @endif
                            <?php $shop = 0; ?>
                            </td>
  
                            </td>
                        </tr>
@endforeach

                    
                    @endforeach
                   
                </tbody>
            </table>
            <div class="right"><a href="{{ route('carrito') }}">
<button class="enviar" class="bg-azul" href="" style="position: relative;bottom:95px;border-radius: 12px;padding: initial!important;color:white; padding: 20px; background-color: #3F3F3F; border: none; width: 181px;height: 42px!important;"><span style="font-family: 'Montserrat';font-size: 13px;font-weight: bold;">FINALIZAR COMPRA</span></button></a>
</div>

        </div>
    </div>
</body>

 
@endsection
@section('js')
<script class="init" type="text/javascript">
$("#registro").click(function(){
    var dato = $("#genre").val();
    var route = "/genero";
    var token = $("#token").val();

    $.ajax({
        url: route,
        headers: {'X-CSRF-TOKEN': token},
        type: 'POST',
        dataType: 'json',
        data:{genre: dato},

        success:function(){
            $("#msj-success").fadeIn();
        },
        error:function(msj){
            $("#msj").html(msj.responseJSON.genre);
            $("#msj-error").fadeIn();
        }
    });
});
    $(document).ready(function(){
        $('#getRequest').click(function(){
            $.get('getRequest', function(data){
                console.log(data);
            });
        });
    });    

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

  $('.enviar').click(function(){
    var id = $(this).attr('id');
    var modelo = $(this).attr('modelo');
    var cantidad = $('#cant'+modelo).val();
    var oldcantidad = $('#oldcant'+modelo).val();
    var suma = parseInt(cantidad) + parseInt(oldcantidad);
    if(cantidad>0)
    {
        $.ajax({
            url: '../carrito/add/'+id+'/'+cantidad+'/'+modelo,
            type: 'get',
            success:function(){
                $("#carrito"+modelo).html("<button id="+id+" modelo="+modelo+" class='enviar' href='' style='position: relative;border-radius: 8px;padding: initial!important;    color: white;padding: 20px;background-color: green;border: none;width: 112px;height: 42px!important;'><span style='font-family: Asap;font-size: 11px;font-weight: bold;'>AGREGADO</span></button>");

                alert("Se han agregado "+cantidad+" unidades con exito!..");
            },
            error:function(msj){
                alert("Se han agregado "+cantidad+" unidades con exito!..");
            }
        });
    }
  });
          
</script>

@endsection
