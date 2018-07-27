@extends('adm.layouts.frame')

@section('titulo', 'Redes sociales')

@section('contenido')
	    @if(count($errors) > 0)
		<div class="col s12 card-panel red lighten-4 red-text text-darken-4">
	  		<ul>
	  			@foreach($errors->all() as $error)
	  				<li>{!!$error!!}</li>
	  			@endforeach
	  		</ul>
	  	</div>
		@endif
		@if(session('success'))
		<div class="col s12 card-panel green lighten-4 green-text text-darken-4">
			{{ session('success') }}
		</div>
		@endif

		<div class="row">
			<div class="col s12">
				<table class="highlight bordered">
					<thead>
						<td>Nombre</td>
						<td>Link</td>
						<td class="text-right">Acciones</td>
					</thead>
					<tbody>
					@foreach($redes as $red)
						<tr>
							<td>{{ $red->nombre }}</td>
							<td>{{ $red->link }}</td>
							<td class="text-right">
								<a href="{{ route('redes.edit', $red->id) }}"><i class="material-icons">create</i></a>
							</td>
						</tr>
					@endforeach
					</tbody>
				</table>				
			</div>
		</div>
<script type="text/javascript" src="{{ asset('js/eliminar.js') }}"></script>

@endsection