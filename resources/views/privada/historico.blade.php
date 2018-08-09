@extends('privada.templates.body')

@section('titulo', 'Línea Maer')

@section('contenido')
<link href="{{ asset('css/privada/zproductos.css') }}" rel="stylesheet" type="text/css"/>
<div class="container" style="width: 80%; margin-bottom: 7%; margin-top: 5%;">
    <div class="lista_precios">
        Historico de Pedidos
    </div>
    <div class="center">
        <div class="row">
    <div class="col s12">
        <table class="highlight bordered">
            <thead>
                <th>
                    NUMERO
                </th>
                <th>
                    FECHA
                </th>
                <th>
                    SUBTOTAL
                </th>
                <th>
                    TOTAL
                </th>
                <th>
                    ACCIÓN
                </th>
            </thead>
            <tbody>
                @foreach($pedidos as $pedido)
                <tr>
                    <td>
                        {!!$pedido->id!!}
                    </td>
                    <td>
                        {!!$pedido->fecha!!}
                    </td>
                    <td>
                        {!!$pedido->subtotal!!}
                    </td>
                    <td>
                        {!!$pedido->total!!}
                    </td>
                    <td>
                        <a href="{{ route('detalle', $pedido->id)}}">
                            Ver detalle
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
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
