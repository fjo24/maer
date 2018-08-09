@extends('privada.templates.body')

@section('titulo', 'Línea Maer')

@section('contenido')
<link href="{{ asset('css/privada/zproductos.css') }}" rel="stylesheet" type="text/css"/>
<link href="{{ asset('css/privada/zproductos2.css') }}" rel="stylesheet" type="text/css"/>
<link href="{{ asset('css/privada/descuentos.css') }}" rel="stylesheet" type="text/css"/>
<body>
<main class="zonaprivada">

	<div class="mipedido">CARRITO</div>

	<div class="container" style="width:87%;">

@if(isset($success))
	@if($success == 'Ha ocurrido un error al enviar el correo')
		<div class="col s12 card-panel red lighten-4 white-text text-darken-4" style="position: relative;top: 26px;height: 123px;text-align: center;font-size: 27px;">
		{{($success) }}
		</div>
	@endif

	@if($success == 'Pedido enviado correctamente')
		<div class="col s12 card-panel green lighten-4 black-text text-darken-4" style="height: 70px;margin-top: 4%;">
		{{($success) }}
		</div>
	@endif
@endif
<div class="row">
	<div class="col l12 m12 s12">
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

	  	<div class="row mb50" style="margin-top: 4.5%;">
				<div class="col s12">
	  			@if(Cart::count() > 0)

					<table class="highlight bordered">

						<thead style="border-bottom: 3px solid #000000;background-color: #FAFAFA;">

							<th></th>
							<th>IMAGEN</th>

							<th>DESCRIPCIÓN</th>

							<th>CATEGORIA</th>

							<th>RUBRO</th>

							<th>CANTIDAD</th>

							<th>PRECIO UNITARIO</th>

							<th>SUBTOTAL</th>

							<th>ELIMINAR</th>

						</thead>
						
						<tbody>
								@php
									$total = 0;
								@endphp
								@foreach(Cart::content()  as $row)
								<tr>
									
									<td></td>
									<td class="timagen " style="width: 95px; height: 85px;"><img class="responsive-img" src="{{ asset($row->options->imagen) }}"/></td>
									<td>{{ $row->name }}</td>
									<td>{{ $row->options->categoria }}</td>
									<td>{{ $row->options->rubro }}</td>
									<td>{{ $row->qty }}</td>
									<td>{{ '$'.$row->price }}</td>
									<td>{{ '$'.$row->price*$row->qty }}</td>
									<td>
										<a href="{{ url('carrito/delete/'.$row->rowId) }}">
											<i class="material-icons" style="color:lightgray;">cancel</i>
										</a>
									</td>
									@php
										$total += $row->price*$row->qty;
									@endphp
								</tr>
								@endforeach
								@if(Cart::count() > 0)
							{!! Form::open(['route'=>'carrito.enviar', 'method'=>'POST']) !!}
								<tr style="border-top: 3px solid black;border-bottom: none;height:150%;color: #595959">
									<td colspan="7">
							        <textarea id="mensaje" name="mensaje" class="materialize-textarea" placeholder="Mensaje"></textarea>
									</td>
									<td class="total fs24 azul bold">Subtotal</td>
									<td>{{ '$'.$total }}</td>
								</tr>
								<tr style="border-bottom: none;">
									<td colspan="7"></td>
									<td class="total fs24 azul bold">Descuento ({{ $desc .'%'}})</td>
									<td>{{ '$'.$descuento }}</td>
								</tr>
								<tr style="border-bottom: none;">
									<td colspan="7"></td>
									<td class="total fs24 azul bold">IVA 21%</td>
									<td>{{ '$'.$iva}}</td>
								</tr>
								<tr style="border-bottom: none;">
									<td colspan="7"></td>
									<td class="total fs24 azul bold">Total (IVA incluido)</td>
									
									<td name>{{ '$'.$totales }}</td>
								</tr>
								@endif
							</tbody>
						
					</table>
						<div class="row" style="margin-top: 4%;">
							    <div class="col s7">
							      <div class="row">
							        <div class="input-field col s12">

							        </div>
							      </div>
							    </div>
								<div class="col s5 right mt30">
									<div class="col s6">
									</div>
									<div class="col s6">
										<button class="enviar" class="bg-azul" href="#modal1" style="color:white; padding: 20px; background-color: #3F3F3F; border: none; width: 181px;border-radius: 6px;
    height: 42px!important;"><span style="font-family: 'Monserrat';font-size: 13px;position: relative;bottom: 8px;font-weight: bold;">REALIZAR PEDIDO</span></button></a>
									</div>
									
									  <!-- Modal Structure -->
  <div id="modal1" class="modal">
    <div class="modal-content">
      <h4>Modal Header</h4>
      <p>A bunch of text</p>
    </div>
    <div class="modal-footer">
      <a href="#!" class="modal-close waves-effect waves-green btn-flat">Agree</a>
    </div>
  </div>
									{!! Form::close() !!}
								</div>

									<a href="{{ url('/zonaprivada/productos') }}" style="position: relative;right: 22%;bottom: 41px;cursor: pointer;" class="right"><button class="boton seguircomprando" style="height: 42px;border: 1px solid #3F3F3F; color:#3F3F3F; background-color: white; padding: 20px; width: 181px;position: relative;border-radius: 6px;"><span style="font-family: 'lato';font-size: 13px;position: relative;bottom: 8px;font-weight: bold;">SEGUIR COMPRANDO</span></button></a>
						</div>
					@endif
				</div>

			</div>

		

  	</div>
 <!-- Modal Trigger -->
  


</main>


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