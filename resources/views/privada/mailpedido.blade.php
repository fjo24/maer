<!DOCTYPE html>
<html>
<body>
	<h2>Parpen</h2>
	<h3>Solicitud de Pedido</h3>
	<p>Enviado desde la web por: </p>

	Nombre de usuario: {{$username}}	<br>
	Nombre del cliente: {{$nombre }} {{ $apellido}}<br>
	Email: {{$emailcliente}}	<br>
	Razón Social: {{$social}}	<br>
	Cuit: {{$cuit}}	<br>
	Telefono: {{$telefono}}	<br>
	Dirección: {{$direccion}}	<br>
	<br>

	<h3>Datos del Producto</h3>
	<table>
		<thead>
			<tr>
				<th style="text-align: left;">Producto</th>
				<th>Cantidad</th>
				<th style="text-align: right;">Precio unitario</th>
			</tr>
		</thead>
		<tbody>
			@foreach($items as $producto)
				<tr>
					<td style="text-align: left;">{{ $producto->name }}</td>
					<td>{{ $producto->qty }}</td>
					<td>${{ $producto->price }}</td>
				</tr>
			@endforeach
		</tbody>
	</table>
		<h4>SubTotal:</h4>
		<p>${{ $subtotal }}</p>
		<h4>Iva:</h4>
		<p>${{ $subtotal*0.21 }}</p>

	<h4>Total:</h4>
		<p>${{ $total }}</p>
		<h4>Mensaje:</h4>
		<p>{{ $mensaje }}</p>

</body>
</html>