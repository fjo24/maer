@extends('adm.layouts.frame')

@section('titulo', 'Editar Banner\Calidad')

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
			{!!Form::model($banner, ['route'=>['bannerupdate',$banner->id], 'method'=>'PUT', 'files' => true])!!}
				<div class="row">
					<label class="col l12 s12" for="parrafo">Linea 1</label>
					<div class="input-field col s12">
				        <textarea id="texto" name="texto" class="materialize-textarea" required>{{$banner->texto}}</textarea>
				    </div>
					<div class="file-field input-field col l6 m6 s12">
						<div class="btn">
						    <span>Imagen</span>
						    {!! Form::file('imagen') !!}
						</div>
						<div class="file-path-wrapper">
						    {!! Form::text('imagen',null, ['class'=>'file-path']) !!}
						</div>
					</div>
				</div>
				<div class="col l12 s12 no-padding">
                    <button class="boton btn-large right" name="action" type="submit">
                Editar
            </button>
                </div>
			{!!Form::close()!!} 
			</div>
			</div>

@endsection