@extends('privada.templates.body')

@section('titulo', 'Maer')

@section('contenido')
<link href="{{ asset('css/privada/zproductos.css') }}" rel="stylesheet" type="text/css"/>
<link href="{{ asset('css/privada/detalle.css') }}" rel="stylesheet" type="text/css"/>
<div class="container" style="width: 80%; margin-bottom: 7%; margin-top: 5%;">
    <div class="lista_precios">
        Pedido de fecha {{ $pedido->fecha }}
    </div>
    <div class="center">
        <div class="row">
    <div class="col s12">
        <table class="highlight bordered">
            <thead>
                <th>
                    NOMBRE
                </th>
                <th>
                    CANTIDAD
                </th>
                <th>
                    PRECIO UNITARIO
                </th>
                <th>
                    IVA
                </th>
                <th>
                    TOTAL
                </th>
            </thead>
            <tbody>
                @foreach($pedido->productos as $producto)
                <tr>
                    <td>
                        {!!$producto->nombre!!}
                    </td>
                    <td>
                        {!!$producto->pivot->cantidad!!}
                    </td>
                    <td>
                        {!!$producto->pivot->costo/$producto->pivot->cantidad!!}
                    </td>
                    <td class="">
                        {!! $producto->iva .'%' !!}
                    </td>
                    <td>
                        {!!$producto->pivot->costo!!}
                    </td>
                </tr>
                @endforeach
                <tr style="border-top: 3px solid black;border-bottom: none;height:150%;color: #595959">
                                    <td colspan="3">
                                    <textarea id="mensaje" name="mensaje" class="materialize-textarea" placeholder="Mensaje"></textarea>
                                    </td>
                                    <td class="total fs24 azul bold">Subtotal</td>
                                    <td>{{ '$'.$pedido->subtotal }}</td>
                                </tr>
                                <tr style="border-bottom: none;">
                                    <td colspan="3"></td>
                                    <td class="total fs24 azul bold">
                                    @if(isset($pedido->descuento->porcentaje))
                                    Descuento({{ $pedido->descuento->porcentaje.'%' }})
                                    @else
                                    Descuento(0%)
                                    @endif
                                    </td>
                                    <td>{{ '$'.$descuento }}</td>
                                </tr>
                                <tr style="border-bottom: none;">
                                    <td colspan="3"></td>
                                    <td class="total fs24 azul bold">IVA</td>
                                    <td>{{ '$'.$iva}}</td>
                                </tr>
                                <tr style="border-bottom: none;">
                                    <td colspan="3"></td>
                                    <td class="total fs24 azul bold">Total (IVA incluido)</td>
                                    
                                    <td name>{{ '$'.$pedido->total }}</td>
                                </tr>
            </tbody>
        </table>
        <br>
        <a href="{{ route('historico') }}">
            <div class="col l12 s12 no-padding" href="">
                <button class="boton btn-large right" name="action" type="submit" style="">
                    VOLVER
                </button>
            </div>
        </a>
    </div>
</div>
    </div>
</div>
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
